<?php

require_once 'baza.php';
require_once 'session.php';

$zaporedna_st = $_POST['zaporedna_st'];
$datum = $_POST['datum'];
$aktiviranje = $_POST['aktiviranje'];
$izvoz = $_POST['izvoz'];
$prihod = $_POST['prihod'];
$odhod = $_POST['odhod'];
$vrnitev = $_POST['vrnitev'];
$zakljucek = $_POST['zakljucek'];
$id_vodja = $_POST['vodja'];
$id_drustvo = $_POST['drustvo'];
$naslov = $_POST['naslov'];
$opis = $_POST['opis'];
$skupaj_ur = $_POST['trajanje'];

$sql = "INSERT INTO intervencije 
        (zaporedna_st, datum, aktiviranje, izvoz, prihod, odhod, vrnitev, zakljucek, naslov, opis, trajanje, skupaj_ur, id_vodja, id_drustvo)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($link, $sql);

if (!$stmt) {
    die("Napaka pri pripravi izjave: " . mysqli_error($link));
}

mysqli_stmt_bind_param($stmt, "isssssssssddii", 
    $zaporedna_st, $datum, $aktiviranje, $izvoz, $prihod, $odhod, $vrnitev, $zakljucek, $naslov, $opis, $skupaj_ur, $skupaj_ur, $id_vodja, $id_drustvo
);

if (mysqli_stmt_execute($stmt)) {
    $id_intervencije = mysqli_insert_id($link);
    $_SESSION['id_intervencije'] = $id_intervencije;
    header("Location: vpis_uporabnikov_intervencije.php");
    exit();
} else {
    echo "Napaka pri vnosu: ";
    header("refresh:3; url=pregled_intervencij.php");
    exit();
}

?>
