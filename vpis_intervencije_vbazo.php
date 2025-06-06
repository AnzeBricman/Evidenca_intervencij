<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'baza.php';
require_once 'session.php';
$zaporedna_st=$_POST['zaporedna_st'];
$datum=$_POST['datum'];
$aktiviranje=$_POST['aktiviranje'];
$izvoz=$_POST['izvoz'];
$prihod=$_POST['prihod'];
$odhod=$_POST['odhod'];
$vrnitev=$_POST['vrnitev'];
$zakljucek=$_POST['zakljucek'];
$alarmiranje=$_POST['alarmiranje'];
$strosek=$_POST['strosek'];
$id_vodja=$_POST['vodja'];
$id_drustvo=$_POST['drustvo'];
$naslov=$_POST['naslov'];
$opis=$_POST['opis'];
$skupaj_ur=$_POST['trajanje'];


$sql = "INSERT INTO intervencije (zaporedna_st, datum, aktiviranje, izvoz, prihod, odhod, vrnitev, zakljucek, naslov, opis, alarmiranje, trajanje, strosek, skupaj_ur, id_vodja, id_drustvo)
VALUES ('$zaporedna_st', '$datum', '$aktiviranje', '$izvoz', '$prihod', '$odhod', '$vrnitev', '$zakljucek', '$naslov', '$opis', '$alarmiranje', '$skupaj_ur', '$strosek', '$skupaj_ur', '$id_vodja', '$id_drustvo')";
$result = mysqli_query($link, $sql);

if($result){
        $id_intervencije = mysqli_insert_id($link);
        $_SESSION['id_intervencije'] = $id_intervencije;
    
    header("location:vpis_uporabnikov_intervencije.php");
} else {
    header("location:pregled_intervencij.php");
}
?>