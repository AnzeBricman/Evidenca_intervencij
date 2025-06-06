<?php
include_once 'baza.php';
include_once 'session.php';

    
$idp=$_GET['id'];
$sql = "DELETE FROM intervencije_uporabniki WHERE id_uporabniki = $idp";
$query = mysqli_query($link, $sql);

if (!$query) {
    echo ('Napaka pri brisanju uporabnika: ' . mysqli_error($link));
    header("refresh:1; url=uporabniki.php");
}else{

    $sql2 = "DELETE FROM uporabniki WHERE id_uporabniki = $idp";

    $query2 = mysqli_query($link, $sql2);
    if (!$query2) {
        echo ('Napaka pri brisanju uporabnika: ' . mysqli_error($link));
        header("refresh:1; url=uporabniki.php");
    }else {
        echo ('Uporabnik uspešno izbrisan.');
        header("refresh:1; url=uporabniki.php");
    }
}

?>