<?php
// Verbindung zur SQLite-Datenbank herstellen oder eine neue erstellen
$database = new SQLite3('contacts.db');

// Wenn die Tabelle nicht existiert, erstelle sie
$query = 'CREATE TABLE IF NOT EXISTS contacts (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    email TEXT NOT NULL,
    message TEXT NOT NULL,
    submitted_at DATETIME DEFAULT CURRENT_TIMESTAMP
)';
$database->exec($query);

// Daten aus dem Formular erhalten
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// SQL-Insert-Abfrage zum Speichern der Formulardaten
$stmt = $database->prepare('INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)');
$stmt->bindValue(':name', $name, SQLITE3_TEXT);
$stmt->bindValue(':email', $email, SQLITE3_TEXT);
$stmt->bindValue(':message', $message, SQLITE3_TEXT);

// Führe die Abfrage aus
$result = $stmt->execute();


// Überprüfen, ob die Daten erfolgreich gespeichert wurden
if ($result) {
    echo "<p>Vielen Dank, Ihre Nachricht wurde erfolgreich gesendet!</p>";
} else {
    echo "<p>Es gab ein Problem beim Senden Ihrer Nachricht.</p>";
}

// Zeige einen Button, der den Benutzer zurück zum Kontaktformular bringt
echo '<form action="contact-form.html" method="get">';
echo '<button type="submit">OK</button>';
echo '</form>';

// Schließen der Datenbankverbindung
$database->close();
?>
