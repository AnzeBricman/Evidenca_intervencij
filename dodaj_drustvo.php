<?php 
include_once 'baza.php';
include_once 'session.php'; 
include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Super Admin - Upravljanje Društev</title>
</head>
<body>
    <main>
        <h2>Vnos drustva:</h2>
        <div id="dodaj_drustvo">
            <form action="dodaj_drustvo_preveri.php" method="post">
                <input type="text" name="ime_drustva" placeholder="Ime društva" required><br><br>
                <input type="text" name="kraj" placeholder="Kraj društva" required><br><br>
                <input type="submit" value="Dodaj društvo">
            </form>
        </div>
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
