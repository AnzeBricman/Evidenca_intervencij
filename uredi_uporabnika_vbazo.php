<?php
include_once 'baza.php';

$idp=$_GET['id_p'];
$ime=$_GET['ime'];
$priimek=$_GET['priimek'];
$email=$_GET['email'];
$vloga=$_GET['vloga'];





$sql = "UPDATE uporabniki SET ime='$ime', priimek='$priimek' , email='$email' , id_vloge = '$vloga' WHERE id_uporabniki = $idp";
$query = mysqli_query($link, $sql);
if($query){
    header("refresh:1; url=uporabniki.php");
    echo "uspešen update";
}
?>