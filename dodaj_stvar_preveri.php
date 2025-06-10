<?php
require_once 'baza.php';

$ime = $_POST['ime'];
$cena_vozila_ura = $_POST['cena_vozila_ura'];
$id_drustvo = $_POST['drustvo'];

$sql = "INSERT INTO vozila (ime, cena_vozila_ura, id_drustvo)
        VALUES (?, ?, ?)";

$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "sdi", $ime, $cena_vozila_ura, $id_drustvo);
$result = mysqli_stmt_execute($stmt);

if ($result) {
    header("Location: izpis_opreme_vozil.php");
    exit;
} else {
    echo "<p>Napaka pri dodajanju vozila: "."</p>";
    header("Location: dodaj_stvari.php");
}
?>
