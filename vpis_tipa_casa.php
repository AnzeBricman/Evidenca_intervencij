<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Vpis tipa hiše</title>
</head>
<body>
    <?php
    include_once("header.php");
    include_once("baza.php");
    include_once("session.php");

    if(isset($_SESSION['id_intervencije'])){
        $id_intervencije = $_SESSION['id_intervencije'];
    }
    else {
        header("location:pregled_intervencij.php");
        exit;
    }
    ?>
<main>
    <h2>Vpis tipa časa</h2>
    <form action="vpis_tipa_casa_vbazo.php" method="post">
        <input type="hidden" name="intervencija_id" value="<?php echo $id_intervencije; ?>">
        <label for="tip_časa">Tip časa:</label><br>
        <select name="tip_časa" id="tip_časa" required>
            <option value="1">Delovnik med 6.in 18. uro</option>
            <option value="2">Delovnik med 18.in 6. uro</option>
            <option value="3">Ob nedeljah in praznikih</option>    
        </select><br><br>
        <input type="submit" value="Vnesi tip hiše">
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