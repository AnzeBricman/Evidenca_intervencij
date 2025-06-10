<?php
require_once 'baza.php';
require_once 'session.php';

$id_intervencije = $_POST['id_intervencije'];
$prisotni = $_POST['prisotni'];

$stmt = mysqli_prepare($link, "INSERT INTO intervencije_uporabniki (id_intervencije, id_uporabniki) VALUES (?, ?)");

foreach ($prisotni as $id_uporabnika) {
    mysqli_stmt_bind_param($stmt, "ii", $id_intervencije, $id_uporabnika);
    mysqli_stmt_execute($stmt);
}

header("location:vpis_opreme_intervencija.php");
exit;
?>
