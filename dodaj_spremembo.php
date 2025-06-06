<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Dodaj spremembo</title>
</head>
<body>
    <?php
    include("header.php");
    include_once 'baza.php';
    include_once 'session.php';
    ?>
    <main>
        <h2>Dodaj spremembo</h2>
        <form action="dodaj_spremembo_vbazo.php" method="post">
            <label for="naslov">Naslov:</label><br>
            <input type="text" id="naslov" name="naslov" required><br><br>

            <label for="opis">Opis:</label><br>
            <textarea id="opis" name="opis" required></textarea><br><br>

            <label for="datum">Datum:</label><br>
            <input type="date" id="datum" name="datum" required><br><br>

            <input type="hidden" name="id_uporabniki" value="<?php echo $_SESSION['idu']; ?>">
            <input type="hidden" name="id_drustvo" value="<?php echo $_SESSION['id_drustvo']; ?>">

            <input type="submit" value="Dodaj spremembo">
        </form>
    </main>    
</html>
