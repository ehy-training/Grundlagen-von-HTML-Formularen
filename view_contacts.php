<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <p><a href="./">Übersicht</a></p>
    <hr>

<?php
$database = new SQLite3('contacts.db');

// Zeigt alle Einträge aus der Tabelle 'contacts' an
$results = $database->query('SELECT * FROM contacts');

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Name</th><th>E-Mail</th><th>Nachricht</th><th>Datum</th></tr>";

while ($row = $results->fetchArray()) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['message'] . "</td>";
    echo "<td>" . $row['submitted_at'] . "</td>";
    echo "</tr>";
}
echo "</table>";

// Schließen der Datenbankverbindung
$database->close();
?>

<p><a href="contact-form.html">Neuen Kontakt eingeben</a></p>

</body>
</html>

