<?php
require_once 'baza.php';

$ime = $_POST['ime'];
$cena_na_uro = $_POST['cena_opreme_ura'];
$id_drustvo = $_POST['drustvo'];

$sql = "INSERT INTO oprema (ime, cena_na_uro, id_drustvo)
        VALUES (?, ?, ?)";

$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "sdi", $ime, $cena_na_uro, $id_drustvo);
$result = mysqli_stmt_execute($stmt);

if ($result) {
    header("Location: izpis_opreme_vozil.php");
} else {
    header("Location: dodaj_stvari.php");
}
?>
