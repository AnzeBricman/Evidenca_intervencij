<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Dodaj opremo za intervencijo</title>
</head>
<body>
<?php
include_once("baza.php");
include_once("session.php");
include_once("header.php");

if (isset($_SESSION['id_intervencije'])) {
    $id_intervencije = $_SESSION['id_intervencije'];
} else {
    header("location:pregled_intervencij.php");
    exit;
}

$sql = "SELECT * FROM oprema";
$query = mysqli_query($link, $sql);
?>
<main>
<h2>Dodaj opremo za intervencijo</h2>
<form action="shrani_opremo.php" method="post">
    <input type="hidden" name="id_intervencije" value="<?php echo $id_intervencije; ?>">

    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
        <div>
            <?php echo $row['ime']; ?> (<?php echo $row['cena_na_uro']; ?> €/h)<br>

            Količina: <input type="number" name="oprema[<?php echo $row['id_oprema']; ?>][kolicina]" min="0" value="0"><br>

            Ure uporabe: <input type="number" name="oprema[<?php echo $row['id_oprema']; ?>][ure]" step="0.1" min="0" value="0"><br>
        </div>
        <hr>
    <?php } ?>

    <input type="submit" value="Shrani opremo">
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