<?php
include_once 'baza.php';
include_once 'session.php';
include_once 'header.php';

?>
<DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Spremeni geslo</title>
</head>
<body>
<main>
    <div id="spremeni_geslo">
        <h2>Spremeni geslo</h2>

        <form method="post" action="spremeni_geslo_vbazo.php">
            <label for="trenutno_geslo">Trenutno geslo:</label>
            <input type="password" name="trenutno_geslo" required><br>

            <label for="novo_geslo">Novo geslo:</label>
            <input type="password" name="novo_geslo" required><br>

            <label for="potrdi_novo_geslo">Potrdi novo geslo:</label>
            <input type="password" name="potrdi_novo_geslo" required><br>

            <input type="submit" value="Spremeni geslo">
        </form>    
</main>

    <?php
    include_once 'footer.php';
    ?>
</body>
</html>
<style>
    main {
        padding: 20px;
        text-align: center;
        background-color: rgba(0, 0, 0, 0.6);
        margin: 20px auto;
        width: 80%;
        border-radius: 10px;
    }

</style>