# cms-sls-t

Dies ist ein beispielhaftes README, das als Platzhalter für das CMS‑Projekt dient.

## Version
0.1.1

## Überblick
Dieses Repository bildet den Ausgangspunkt für ein Content‑Management‑System, das später Inhalte, Benutzer und Daten verwalten soll. Geplante Ideen für die Weiterentwicklung sind:  
- Struktur für Seiten und Artikel  
- Verwaltung von Nutzern und Berechtigungen  
- Integration eines Genetik‑Rechners für Bartagamen‑Morphs  

## Docker
Dieses Projekt kann in einem Docker-Container mit PHP und Apache gestartet werden.

```bash
docker build -t cms-sls-t .
docker run --rm -p 8080:80 cms-sls-t
```

Anschließend ist die Anwendung unter `http://localhost:8080` erreichbar.

## Checkliste
- [x] Dockerfile für PHP-Apache inkl. SQLite-Unterstützung hinzugefügt

## Hinweise
Dieses Projekt befindet sich noch im Aufbau. Dieses README kann erweitert werden, sobald weitere Details und Komponenten hinzugefügt werden.
