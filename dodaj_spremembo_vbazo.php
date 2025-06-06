<?php
$naslov = $_POST['naslov'];
$opis = $_POST['opis'];
$datum = $_POST['datum'];
$id_uporabniki = $_POST['id_uporabniki'];
$id_drustvo = $_POST['id_drustvo'];

include_once 'baza.php';
include_once 'session.php';

$sql="INSERT INTO spremembe (naslov, opis, datum, id_uporabniki, id_drustvo)
        VALUES ('$naslov', '$opis', '$datum', '$id_uporabniki', '$id_drustvo')";
$result = mysqli_query($link, $sql);

if($result){
    header("location:admin.php");
} else {
    header("location:dodaj_spremembo.php");
    echo "<p>Napaka pri dodajanju spremembe.</p>";
}
