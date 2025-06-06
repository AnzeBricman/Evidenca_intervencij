<?php
    include_once("baza.php");
    include_once("session.php");
    include_once("header.php");
    $idp=$_GET['id'];

    $sql = "SELECT * FROM uporabniki WHERE id_uporabniki = $idp";
    $query = mysqli_query($link, $sql);

    $row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Spremeni podatke o uporabniku</title>
</head>
<body>
    <h2>Vnos predmeta</h2>

    <form method="get" action="uredi_uporabnika_vbazo.php">
        <input type="hidden" name="id_p" value="<?php echo $idp; ?>">
    	<input type="text" name = "ime"  value="<?php echo($row['ime'])?>" placeholder = "Ime" required><br>
        <input type="text" name = "priimek" value="<?php echo($row['priimek'])?>" placeholder = "Priimek" required><br>
    	<input type="text" name = "email"  value="<?php echo($row['email'])?>" placeholder = "Email" required><br>
        <select name="vloga" required>
            <option value="1" <?php if($row['id_vloge'] == 1) echo 'selected'; ?>>Uporabnik</option>
            <option value="2" <?php if($row['id_vloge'] == 2) echo 'selected'; ?>>Administrator</option>

        </select>

        <input type="submit" value="Vnesi">
    </form>


    <p>
        <a href="index.php">Domov</a>
    </p>
</body>

</html>