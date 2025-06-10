<?php
$naslov = $_POST['naslov'];
$opis = $_POST['opis'];
$datum = $_POST['datum'];
$id_uporabniki = $_POST['id_uporabniki'];
$id_drustvo = $_POST['id_drustvo'];

include_once 'baza.php';
include_once 'session.php';

$sql = "INSERT INTO spremembe (naslov, opis, datum, id_uporabniki, id_drustvo)
        VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "sssii", $naslov, $opis, $datum, $id_uporabniki, $id_drustvo);
$result = mysqli_stmt_execute($stmt);

if ($result) {
    header("Location: admin.php");
    exit;
} else {
    echo "<p>Napaka pri dodajanju spremembe:". "</p>";
    header("Location: dodaj_spremembo.php");
}
?>
