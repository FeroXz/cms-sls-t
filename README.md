# cms-sls-t

**Version:** 0.1.1

Dies ist ein beispielhaftes README, das als Platzhalter für das CMS‑Projekt dient.

## Überblick
Dieses Repository bildet den Ausgangspunkt für ein Content‑Management‑System, das später Inhalte, Benutzer und Daten verwalten soll. Geplante Ideen für die Weiterentwicklung sind:  
- Struktur für Seiten und Artikel  
- Verwaltung von Nutzern und Berechtigungen  
- Integration eines Genetik‑Rechners für Bartagamen‑Morphs  

## Schnellstart (Docker)
1. **Docker-Image bauen:**
   ```bash
   docker build -t cms-sls-t .
   ```
2. **Container starten (mit persistenter SQLite-Datei auf dem Host):**
   ```bash
   docker run --rm -p 8080:80 \
     -v "$(pwd)/cms.sqlite:/var/www/html/cms.sqlite" \
     --name cms-sls-t \
     cms-sls-t
   ```
   Die SQLite-Datei wird im Container unter `/var/www/html/cms.sqlite` erzeugt und durch das Volume-Mapping lokal als `./cms.sqlite` im Projektverzeichnis abgelegt.
3. **Im Browser öffnen:**
   Öffne `http://localhost:8080` in deinem Browser.
4. **Seite im CMS anlegen:**
   Fülle im Formular **"Add new page"** die Felder **Title** und **Content** aus und speichere mit **Save**. Anschließend erscheint die neue Seite in der Liste **Pages**.

## Checkliste (Neue Funktionen)
- [x] Docker-Image bauen und Container starten
- [x] Browser-Zugriff auf die CMS-Oberfläche
- [x] Seitenanlage über das CMS-Formular
- [x] Persistente SQLite-Datei über Volume-Mapping dokumentiert

## Hinweise
Dieses Projekt befindet sich noch im Aufbau. Dieses README kann erweitert werden, sobald weitere Details und Komponenten hinzugefügt werden.
