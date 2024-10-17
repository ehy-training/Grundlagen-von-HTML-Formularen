<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Einfaches Formular mit POST</title>
</head>

<body>
    <p><a href="./">Übersicht</a></p>
    <hr>
    
    <h1>Einfaches Formular</h1>

    <form action="" method="post">
        <label for="query">Gib einen Text ein:</label>
        <input type="text" id="query" name="query" required>
        <input type="submit" value="Absenden">
    </form>

    <h2>Ergebnis:</h2>
    <?php
    if (isset($_POST['query'])) {
        $query = htmlspecialchars($_POST['query']); // Schutz vor XSS-Angriffen
        echo "<p>Du hast folgendes eingegeben: $query</p>";
    }
    ?>

</body>

</html>
