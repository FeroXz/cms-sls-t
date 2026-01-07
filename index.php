<?php
// Simple PHP CMS with SQLite
$dbFile = __DIR__ . '/cms.sqlite';
try {
    $db = new PDO('sqlite:' . $dbFile);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec('CREATE TABLE IF NOT EXISTS pages (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT NOT NULL,
        content TEXT NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )');
} catch (Exception $e) {
    die('Error connecting to the database: ' . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['title']) && !empty($_POST['content'])) {
    $stmt = $db->prepare('INSERT INTO pages (title, content) VALUES (:title, :content)');
    $stmt->execute([
        ':title' => $_POST['title'],
        ':content' => $_POST['content']
    ]);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

if (isset($_GET['page'])) {
    $stmt = $db->prepare('SELECT * FROM pages WHERE id = :id');
    $stmt->execute([':id' => (int) $_GET['page']]);
    $page = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($page) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title><?php echo htmlspecialchars($page['title']); ?></title>
        </head>
        <body>
            <h1><?php echo htmlspecialchars($page['title']); ?></h1>
            <p><?php echo nl2br(htmlspecialchars($page['content'])); ?></p>
            <p><a href="<?php echo $_SERVER['PHP_SELF']; ?>">Back to list</a></p>
        </body>
        </html>
        <?php
        exit;
    } else {
        echo 'Page not found.';
        exit;
    }
}

$pages = $db->query('SELECT id, title, created_at FROM pages ORDER BY created_at DESC')->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple CMS</title>
</head>
<body>
    <h1>Simple CMS</h1>
    <h2>Add new page</h2>
    <form method="post">
        <label>Title:<br><input type="text" name="title" required></label><br><br>
        <label>Content:<br><textarea name="content" rows="10" cols="50" required></textarea></label><br><br>
        <button type="submit">Save</button>
    </form>
    <h2>Pages</h2>
    <ul>
        <?php foreach ($pages as $p): ?>
            <li>
                <a href="?page=<?php echo htmlspecialchars($p['id']); ?>">
                    <?php echo htmlspecialchars($p['title']); ?>
                </a>
                (<?php echo $p['created_at']; ?>)
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
