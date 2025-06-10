<?php
include_once 'baza.php';

$idp = $_GET['id_p'];
$ime = $_GET['ime'];
$priimek = $_GET['priimek'];
$email = $_GET['email'];
$vloga = $_GET['vloga'];

$sql = "UPDATE uporabniki SET ime = ?, priimek = ?, email = ?, id_vloge = ? WHERE id_uporabniki = ?";

$stmt = mysqli_prepare($link, $sql);

if (!$stmt) {
    die("Priprava stavka ni uspela: " . mysqli_error($link));
}

mysqli_stmt_bind_param($stmt, "sssii", $ime, $priimek, $email, $vloga, $idp);

if (mysqli_stmt_execute($stmt)) {
    echo "Uspešen update";
    header("refresh:1; url=uporabniki.php");
} else {
    echo "Napaka pri posodobitvi: " . mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);
?>
