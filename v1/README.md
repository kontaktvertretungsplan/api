# Kontakt:Vertretungsplan Daten API [Version: 1]
Dokumentation der Schnittstelle, über die Kontakt:Vertretungsplan die Stundenpläne bezieht

## Stundeplan API
Über diese Schnittstelle wird der Stundenplan abgerufen.

### Abfrage Werte
Kontakt:Vertretungsplan ersetzt ein der Abfrage URL folgende Patterns:

Pattern | Beispiel Wert | Bemerkung
------- | ------------- | ---------
`%y` | `2018` | Jahr
`%m` | `12` | Monat
`%d` | `31` | Tag

Diese definieren den gewünschten Tag, für den der Stundenplan abgerufen werden soll.

### Beispiel Antwort Daten

```
{
  "ok": true,
  "result": {
    "status": "ok",
    "date": {
      "year": "2018",
      "month": "01",
      "day": "01"
    },
    "plan": {
      "1": {
        "5a": {
          "ge": {
            "lesson-id": "5a\\/ge",
            "lesson": "Geschichte",
            "teacher-id": "MÜLL",
            "teacher": "Herr Müller",
            "room-id": "002",
            "room": "Geschichtsraum",
            "status": "ok",
            "note": ""
          }
        },
        "9a": {
          "fr": {
            "lesson-id": "9a\\/fr",
            "lesson": "Franz\\u00f6sisch",
            "teacher-id": "MEIE",
            "teacher": "Frau Meier",
            "room-id": "107",
            "room": "Französischraum",
            "status": "changed",
            "note": "Raum\\u00e4nderung"
          },
          "la": {
            "lesson-id": "9a\\/la",
            "lesson": "Latein",
            "teacher-id": "SCHM",
            "teacher": "Frau Schmidt",
            "room-id": "201",
            "room": "Lateinraum",
            "status": "ok",
            "note": ""
          }
        }
      }
      "2": {
        "10b": {
          "bi": {
            "lesson-id": "10b\\/bi",
            "lesson": "Biologie",
            "status": "canceled",
            "note": "bi mit Herr Maier fällt aus"
          }
        }
      }
    },
    "note": [
      {
        "0": "Alles fällt aus"
      },
      {
        "0": "In der Mittagspause gibt es Kuchen für alle"
      }
    ]
  }
}
```

## Klassen API

### Beispiel Antwort

```
{
  "ok": true,
  "result": {
    "status": "ok",
    "date": {
      "year": "2018",
      "month": "03",
      "day": "02"
    },
    "classes": [
      {
        "name": "5a"
      },
      {
        "name": "5b"
      },
      {
        "name": "6a"
      },
      {
        "name": "6b"
      },
      {
        "name": "7a"
      },
      {
        "name": "7b"
      },
      {
        "name": "8a"
      },
      {
        "name": "8b"
      },
      {
        "name": "9a"
      },
      {
        "name": "9b"
      },
      {
        "name": "9c"
      },
      {
        "name": "10a"
      },
      {
        "name": "10b"
      },
      {
        "name": "11a",
        "courses": [
          "de",
          "ma",
          "eng",
        ]
      },
      {
        "name": "11b",
        "courses": [
          "de",
          "ma",
          "eng",
        ]
      },
      {
        "name": "12a",
        "courses": [
          "de",
          "ma",
          "eng",
        ]
      },
      {
        "name": "12b",
        "courses": [
          "de",
          "ma",
          "eng",
        ]
      }
    ]
  }
}
```
