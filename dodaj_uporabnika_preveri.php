<?php
    require_once 'baza.php'; 
    $ime=$_POST['ime'];
    $priimek=$_POST['priimek'];
    $mail=$_POST['email'];
    $geslo=$_POST['geslo'];
    $geslo2=sha1($geslo);
    $vloga=$_POST['vloga'];
    $drustvo=$_POST['drustvo'];
    
    echo''.$ime.'  '.$priimek.'  '.$mail.'  '.$geslo2.'  '.$drustvo.'  ';

    $sql = "SELECT * FROM uporabniki WHERE email LIKE '$mail'";
    $result = mysqli_query($link, $sql);
    $results_string= mysqli_fetch_assoc($result);

    if($results_string==NULL){
        $sql = "INSERT INTO uporabniki (ime, priimek, email, geslo, id_drustvo, id_vloge) 
        VALUES ('$ime', '$priimek', '$mail', '$geslo2','$drustvo', '$vloga')";
        $result = mysqli_query($link, $sql);
    
        if($result){
            header("refresh:0; url=uporabniki.php");
        } else {
            header("location:dodaj_uporabnika.php");
        }
    } else {
        echo "Uporabnik z tem mailom je ze vpisan";
        header("refresh:2; url=dodaj_uporabnika.php");
    }
    



?>