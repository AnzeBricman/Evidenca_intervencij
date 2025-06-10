<?php

include_once 'session.php';
require_once 'baza.php'; 

$mail = $_POST['email'];
$geslo = $_POST['geslo'];

$sql = "SELECT * FROM uporabniki WHERE email = ?";


$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "s", $mail);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {

    if (password_verify($geslo, $row['geslo'])) {
        $_SESSION['ime'] = $row['ime'];
        $_SESSION['priimek'] = $row['priimek'];
        $_SESSION['log'] = true;
        $_SESSION['idu'] = $row['id_uporabniki'];
        $_SESSION['id_drustvo'] = $row['id_drustvo'];
        $_SESSION['id_vloga'] = $row['id_vloge'];

        header("Location: index.php");
        exit;
    } else {
        echo "Napačno geslo.";
        header("refresh:3; url=login.php");
        exit;
    }
} else {
    echo "Uporabnik s tem e-poštnim naslovom ne obstaja.";
    header("refresh:3; url=login.php");
    exit;
}
?>
