<?php
include_once("baza.php");
include_once("session.php");

if(isset($_SESSION['id_intervencije'])){
    $id_intervencije = $_SESSION['id_intervencije'];
}
else {
    header("location:pregled_intervencij.php");
    exit;
}

$sql = "SELECT * FROM uporabniki WHERE id_drustvo = '{$_SESSION['id_drustvo']}'";
$query = mysqli_query($link, $sql);
?>
<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Označi prisotne člane</title>
</head>
<body>
    <?php include_once("header.php"); ?>
<main>

        <h2>Označi prisotne člane</h2>
        <form action="shrani_prisotne.php" method="post">

            <input type="hidden" name="id_intervencije" value="<?= $id_intervencije ?>">
            <?php while($row = mysqli_fetch_assoc($query)): ?>

                <input type="checkbox" name="prisotni[]" value="<?= $row['id_uporabniki'] ?>">
                <?= $row['ime'] . ' ' . $row['priimek'] ?><br>
                
            <?php endwhile; ?>
            <br>
            <input type="submit" value="Shrani prisotnost">
        </form>
</main>
    <?php 
    include_once("footer.php"); 
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
