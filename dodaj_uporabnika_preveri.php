<?php
require_once 'baza.php'; 

$ime = $_POST['ime'];
$priimek = $_POST['priimek'];
$mail = $_POST['email'];
$geslo = $_POST['geslo'];
$vloga = $_POST['vloga'];
$drustvo = $_POST['drustvo'];

$hashed_password = password_hash($geslo, PASSWORD_DEFAULT);

$sql_check = "SELECT id_uporabniki FROM uporabniki WHERE email = ?";

$stmt_check = mysqli_prepare($link, $sql_check);
mysqli_stmt_bind_param($stmt_check, "s", $mail);
mysqli_stmt_execute($stmt_check);
mysqli_stmt_store_result($stmt_check);

if (mysqli_stmt_num_rows($stmt_check) == 0) {
    $sql_insert = "INSERT INTO uporabniki (ime, priimek, email, geslo, id_drustvo, id_vloge) 
                   VALUES (?, ?, ?, ?, ?, ?)";

    $stmt_insert = mysqli_prepare($link, $sql_insert);
    mysqli_stmt_bind_param($stmt_insert, "ssssii", $ime, $priimek, $mail, $hashed_password, $drustvo, $vloga);
    $result = mysqli_stmt_execute($stmt_insert);

    if ($result) {đ
        header("Location: uporabniki.php");
        exit;
    } else {
        echo "Napaka pri dodajanju uporabnika: " . mysqli_error($link);
        header("refresh:3; url=dodaj_uporabnika.php");
        exit;
    }
} else {
    echo "Uporabnik s tem e-poštnim naslovom že obstaja.";
    header("refresh:3; url=dodaj_uporabnika.php");
    exit;
}
?>
