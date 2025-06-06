<?php
include_once 'baza.php';
include_once 'session.php';

$ime_drustvo = $_POST['ime_drustva'];
$kraj = $_POST['kraj'];

$sql = "INSERT INTO drustva (ime_drustvo, kraj) VALUES ('$ime_drustvo', '$kraj')";

if (mysqli_query($link, $sql)) {
    echo "<p>Društvo uspešno dodano!</p>";
    header("refresh:0; url=super_admin.php");
} else {
    echo "<p>Napaka pri dodajanju društva: " . mysqli_error($link) . "</p>";
    header("refresh:0; url=super_admin.php");
}

?>