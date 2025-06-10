<?php
include_once 'baza.php';
include_once 'session.php';

$id_uporabnika = $_SESSION['idu'];

$staro_geslo = $_POST['trenutno_geslo'];
$novo_geslo = $_POST['novo_geslo'];
$potrdi_novo_geslo = $_POST['potrdi_novo_geslo'];


if ($novo_geslo !== $potrdi_novo_geslo) {
    echo "<p>Nova gesla se ne ujemata. Prosim, poskusite znova.</p>";
    header("refresh:1; url=spremeni_geslo.php");
    exit;
}

$sql = "SELECT geslo FROM uporabniki WHERE id_uporabniki = ?";
$stmt = mysqli_prepare($link, $sql);

mysqli_stmt_bind_param($stmt, "i", $id_uporabnika);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $geslo_hash);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

if (!$geslo_hash) {
    echo "<p>Uporabnik ni najden.</p>";
    header("refresh:2; url=spremeni_geslo.php");
    exit;
}

if (!password_verify($staro_geslo, $geslo_hash)) {
    echo "<p>Trenutno geslo ni pravilno. Prosim, poskusite znova.</p>";
    header("refresh:2; url=spremeni_geslo.php");
    exit;
}

$novo_geslo_hash = password_hash($novo_geslo, PASSWORD_DEFAULT);

$update_sql = "UPDATE uporabniki SET geslo = ? WHERE id_uporabniki = ?";
$stmt_update = mysqli_prepare($link, $update_sql);
mysqli_stmt_bind_param($stmt_update, "si", $novo_geslo_hash, $id_uporabnika);

if (mysqli_stmt_execute($stmt_update)) {
    echo "<p>Geslo uspešno spremenjeno.</p>";
    header("refresh:2; url=moj_profil.php");
} else {
    echo "<p>Napaka pri posodabljanju gesla. Prosim, poskusite znova.</p>";
    header("refresh:2; url=spremeni_geslo.php");
}

mysqli_stmt_close($stmt_update);
exit;
?>
