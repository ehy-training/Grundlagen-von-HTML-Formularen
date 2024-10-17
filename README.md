# Grundlagen von HTML-Formularen

Enno Hyttrek, Oktober 2024
ehy-training@gmail.com

Version: 1.0.0

## Was sind HTML-Formulare?

HTML-Formulare sind eine Möglichkeit, Daten von Benutzern zu erfassen und an einen Server zu senden. Sie bestehen aus einer Vielzahl von Eingabeelementen wie Textfeldern, Schaltflächen, Dropdown-Menüs und Kontrollkästchen, die es dem Benutzer ermöglichen, Informationen einzugeben und abzusenden.

Formulare sind ein zentrales Element jeder Website, die mit Benutzereingaben arbeitet, wie z.B. Kontaktformulare, Anmelde- und Registrierungsseiten oder Suchfelder.

## Wofür werden sie benötigt?

HTML-Formulare werden verwendet, um Informationen von Benutzern zu sammeln und diese an den Server zu senden. Typische Anwendungsfälle sind:

- **Registrierung und Anmeldung**: Benutzer können ihre persönlichen Daten wie Namen, E-Mail-Adresse und Passwort eingeben.
- **Kontaktformulare**: Benutzer können Nachrichten an die Website-Betreiber senden.
- **Produktbestellungen**: Nutzer können Produkte auswählen, bestellen und Zahlungsinformationen angeben.
- **Suche**: Formulare können als Suchfeld dienen, um Daten auf der Website oder im Internet zu durchsuchen.

## Welches sind die wichtigsten Typen von HTML-Formularen?

Es gibt verschiedene Typen von Eingabefeldern, die in HTML-Formularen verwendet werden. Die gängigsten sind:

- **Textfelder**: Für einfache Texteingaben.
```html
  <input type="text" name="username" placeholder="Dein Benutzername">
```

- **Passwortfelder**: Verbergen die Benutzereingabe, wie z.B. bei Passwörtern.
```html
<input type="password" name="password" placeholder="Dein Passwort">
```

- **E-Mail-Felder**: Zum Erfassen von E-Mail-Adressen.
```html
<input type="email" name="email" placeholder="Deine E-Mail-Adresse">
```

- **Kontrollkästchen (Checkboxes)**: Ermöglichen die Auswahl mehrerer Optionen.
```html
<input type="checkbox" name="newsletter" value="subscribe"> Newsletter abonnieren
```

- **Radio-Buttons**: Lassen den Benutzer eine von mehreren Optionen auswählen.
```html
<input type="radio" name="gender" value="male"> Männlich
<input type="radio" name="gender" value="female"> Weiblich
```

- **Dropdown-Menüs**: Ermöglichen die Auswahl einer Option aus einer Liste.
```html
<select name="country">
<option value="germany">Deutschland</option>
<option value="france">Frankreich</option>
</select>
```

- **Dateiupload**: Ermöglicht dem Benutzer das Hochladen von Dateien.
```html
<input type="file" name="profile_picture">
```

## Wie und wohin werden die Daten übertragen?

Die Daten, die über ein HTML-Formular eingegeben werden, können auf verschiedene Arten übertragen werden:

- **GET-Methode**: Die Daten werden als URL-Parameter an den Server gesendet.
```html
<form action="/submit" method="get">
<input type="text" name="query">
<input type="submit" value="Suchen">
</form>
```
  Diese Methode ist sichtbar in der URL und eignet sich für kleinere Datenmengen, z.B. Suchanfragen.

- **POST-Methode**: Die Daten werden im Nachrichtentext der Anfrage gesendet, was sicherer ist und sich für größere Datenmengen eignet.
```html
<form action="/submit" method="post">
<input type="text" name="username">
<input type="submit" value="Absenden">
</form>
```

### Datenverarbeitung mit PHP und MySQL (Beispiel)

Wenn die Daten an einen Server gesendet werden, können sie von einem Server-Skript (z.B. PHP) verarbeitet und in einer Datenbank (z.B. MySQL) gespeichert werden:

```php
<?php
// Verbindung zur MySQL-Datenbank herstellen
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formular_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Eingabedaten verarbeiten und in die Datenbank speichern
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];

  $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
  $conn->query($sql);
}
?>
```

Die Daten aus dem Formular können dann in der MySQL-Datenbank gespeichert werden.

## Wie und wofür benutzt man JavaScript in HTML-Formularen?

JavaScript wird häufig verwendet, um Formulare zu validieren, bevor sie an den Server gesendet werden. Dies kann verhindern, dass fehlerhafte Daten an den Server gesendet werden, und dem Benutzer sofortiges Feedback geben.

Ein einfaches Beispiel für die Formularvalidierung:

```html
<form onsubmit="return validateForm()" method="post">
  <input type="text" id="name" name="name" placeholder="Dein Name">
  <input type="submit" value="Absenden">
</form>

<script>
  function validateForm() {
    var name = document.getElementById("name").value;
    if (name == "") {
      alert("Name darf nicht leer sein");
      return false;
    }
    return true;
  }
</script>
```

In diesem Beispiel zeigt das Formular eine Warnung an, wenn der Benutzer keinen Namen eingibt.

## Was ist bei HTML-Strukturierung und CSS-Styling von Formularen zu beachten?

Es ist wichtig, dass HTML-Formulare sauber strukturiert und klar verständlich sind. Ein gut strukturiertes Formular enthält:

- **Labels**: Jedes Eingabefeld sollte mit einem `<label>`-Element versehen sein, um klarzustellen, was der Benutzer eingeben soll.
  ```html
  <label for="username">Benutzername:</label>
  <input type="text" id="username" name="username">
  ```

- **Feldgruppen**: Verwende `<fieldset>` und `<legend>`, um verwandte Formularfelder zusammenzufassen.
  ```html
  <fieldset>
    <legend>Persönliche Daten</legend>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name">
  </fieldset>
  ```

Beim Styling von Formularen sollte darauf geachtet werden, dass die Felder gut lesbar und zugänglich sind. Ein einfaches Beispiel für CSS:

```css
input[type="text"], input[type="email"] {
  width: 100%;
  padding: 10px;
  margin: 5px 0;
  box-sizing: border-box;
}
```

## Gedanken zur Nutzerfreundlichkeit und Barrierefreiheit von HTML-Formularen

Um HTML-Formulare benutzerfreundlich und barrierefrei zu gestalten, sollten folgende Punkte beachtet werden:

- **Eingabefelder richtig beschriften**: Verwende immer `<label>`-Elemente, um Eingabefelder zu beschriften. Dies verbessert die Zugänglichkeit, insbesondere für Benutzer mit Bildschirmlesegeräten.

- **Klare Fehlermeldungen**: Wenn ein Fehler auftritt (z.B. ein erforderliches Feld fehlt), sollte das Formular eine verständliche und freundliche Fehlermeldung anzeigen.

- **Tab-Reihenfolge**: Achte darauf, dass die Reihenfolge der Eingabefelder logisch und einfach zu navigieren ist, insbesondere für Benutzer, die die Tastatur verwenden.

- **Visuelle Hinweise**: Verwende visuelle Hinweise, um den Status eines Feldes anzuzeigen, z.B. wenn es fokussiert ist oder einen Fehler enthält.

- **Barrierefreie Farbkontraste**: Achte auf ausreichende Kontraste bei Formularfeldern, damit auch Personen mit Sehbehinderungen die Inhalte gut erkennen können.

Barrierefreie und gut gestaltete Formulare tragen zu einer besseren Benutzererfahrung bei und machen es allen Nutzern leicht, die Daten einzugeben und abzuschicken.
