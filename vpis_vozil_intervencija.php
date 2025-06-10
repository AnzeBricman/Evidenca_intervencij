<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Vnos vozil intervencije</title>
</head>
<body>
    <?php
    include_once("baza.php");
    include_once("session.php");
    include_once("header.php");

    if(isset($_SESSION['id_intervencije'])){
        $id_intervencije = $_SESSION['id_intervencije'];
    }
    else {
        header("location:pregled_intervencij.php");
        exit;
    }
    
    $sql = "SELECT * FROM vozila WHERE id_drustvo = '{$_SESSION['id_drustvo']}'";
    $query = mysqli_query($link, $sql);
    ?>
<main>
    <h2>Dodaj vozila za intervencijo</h2>
    <form action="shrani_vozila.php" method="post">
        <input type="hidden" name="id_intervencije" value="<?php echo $id_intervencije; ?>">

        <?php 
            while($row = mysqli_fetch_assoc($query)) { ?>

            <div>
                <?php echo $row['ime']; ?> (<?php echo $row['cena_vozila_ura']; ?> €/h)<br>
                Ure uporabe: 
                <input type="number" name="vozila[<?php echo $row['id_vozila']; ?>]" step="0.1" min="0" value="0"><br>
            </div>
            <hr>

        <?php }?>

        <input type="submit" value="Shrani vozila">
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
