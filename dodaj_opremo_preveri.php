<?php
require_once 'baza.php';
$ime=$_POST['ime'];
$opis=$_POST['cena_opreme_ura'];
$cena=$_POST['drustvo'];

$sql = "INSERT INTO oprema (ime, cena_na_uro, id_drustvo)
VALUES ('$ime', '$opis', '$cena')";
$result = mysqli_query($link, $sql);

if($result){
    header("location:izpis_opreme_vozil.php");
} else {
    header("location:dodaj_stvari.php");
}
?>