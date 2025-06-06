<?php
include_once 'baza.php';
include_once 'session.php';


$staro_geslo = $_POST['trenutno_geslo'];
$novo_geslo = $_POST['novo_geslo'];
$potrdi_novo_geslo = $_POST['potrdi_novo_geslo'];
$id_uporabnika = $_SESSION['idu'];
$staro_geslo = sha1($staro_geslo);
$novo_geslo = sha1($novo_geslo);
$potrdi_novo_geslo = sha1($potrdi_novo_geslo);


if ($novo_geslo !== $potrdi_novo_geslo) {
    echo "<p>Nova gesla se ne ujemata. Prosim, poskusite znova.</p>";
    header("refresh:1; url=spremeni_geslo.php");
    exit;
}

$query = "SELECT geslo FROM uporabniki WHERE id_uporabniki = '$id_uporabnika'";
$result = mysqli_query($link, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $staro_geslo_baza = $row['geslo'];
        
        if($staro_geslo_baza == $staro_geslo){
            $update_query = "UPDATE uporabniki SET geslo = '$novo_geslo' WHERE id_uporabniki = '$id_uporabnika'";
            $vbazo = mysqli_query($link, $update_query);
            if ($vbazo) {
                echo "<p>Geslo uspešno spremenjeno.</p>";
                header("refresh:1; url=moj_profil.php");
                exit;

            } else {
                echo "<p>Napaka pri posodabljanju gesla. Prosim, poskusite znova.</p>";
                header("refresh:1; url=spremeni_geslo.php");
                exit;
            }

        }else{
            echo "<p>Trenutno geslo ni pravilno. Prosim, poskusite znova.</p>";
            header("refresh:1; url=spremeni_geslo.php");
            exit;
        }

    } else {
        echo "<p>Uporabnik ni najden.</p>";
        header("refresh:1; url=spremeni_geslo.php");
    }

}else{
    echo "<p>Napaka pri pridobivanju gesla. Prosim, poskusite znova.</p>";
    header("refresh:1; url=spremeni_geslo.php");
    exit;
}

?>