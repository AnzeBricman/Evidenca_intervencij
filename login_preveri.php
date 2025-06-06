<?php
    include_once 'session.php';
    require_once 'baza.php'; 
    $mail=$_POST['email'];
    $geslo=$_POST['geslo'];

    $upime= mysqli_real_escape_string($link, $mail);
    $geslo2= mysqli_real_escape_string($link, $geslo);
    $geslo3=sha1($geslo2);


    //echo''.$mail.'  '.$geslo.'  ';
   //$sqll= sprintf("SELECT * FROM lastniki". "WHERE uime = '%s' AND geslo = '%s'",$upime, $geslo3);
    $sqll = sprintf("SELECT * FROM uporabniki"." WHERE email='%s' AND geslo='%s'", $upime, $geslo3);


    $query=mysqli_query($link,$sqll);
    $row=mysqli_fetch_array($query);


    if(mysqli_num_rows($query)===1){

        //echo "Prijava uspešna <br>";
        $_SESSION['ime']=$row['ime'];
        $_SESSION['priimek']=$row['priimek'];
        $_SESSION['log']=true;
        $_SESSION['idu']=$row['id_uporabniki'];
        $_SESSION['id_drustvo']=$row['id_drustvo'];
        $_SESSION['id_vloga']=$row['id_vloge'];
        //echo "Prijavljeni: " .$_SESSION['ime']. "  ".$_SESSION['priimek'];
        header("refresh:0; url=index.php");
    } else {
        header("refresh:3; url=login.php");
        echo "Napacni podatki";

    }

?>