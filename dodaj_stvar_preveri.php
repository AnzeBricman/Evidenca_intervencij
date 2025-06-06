<?php
require_once 'baza.php';
$ime=$_POST['ime'];
$opis=$_POST['cena_vozila_ura'];
$cena=$_POST['drustvo'];

$sql = "INSERT INTO vozila (ime, cena_vozila_ura, id_drustvo)
VALUES ('$ime', '$opis', '$cena')";
$result = mysqli_query($link, $sql);

if($result){
    header("location:izpis_opreme_vozil.php");
} else {
    header("location:dodaj_stvari.php");
    echo "<p>Napaka pri dodajanju vozila.</p>";
}

?>