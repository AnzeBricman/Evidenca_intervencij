<?php
require_once 'baza.php';


ini_set('display_errors', 1);
error_reporting(E_ALL);

$id_intervencije = $_POST['intervencija_id'];
$cas_tip = $_POST['tip_časa'];

$query_ljudje = "SELECT COUNT(*) as stevilo_ljudi FROM intervencije_uporabniki WHERE id_intervencije = $id_intervencije";

$result_ljudje = mysqli_query($link, $query_ljudje);
$row_ljudje = mysqli_fetch_assoc($result_ljudje);
$stevilo_ljudi = $row_ljudje['stevilo_ljudi'];

$query_trajanje = "SELECT trajanje FROM intervencije WHERE id_intervencije = $id_intervencije";

$result_trajanje = mysqli_query($link, $query_trajanje);
$row_trajanje = mysqli_fetch_assoc($result_trajanje);

$st_ur = $row_trajanje['trajanje'];

if ($cas_tip == 1) {
    $cena_na_uro = 24;
} elseif ($cas_tip == 2) {
    $cena_na_uro = 30;
} elseif ($cas_tip == 3) {
    $cena_na_uro = 35;
}

if ($cas_tip == 1) {
    $tip='Delovnik med 6.in 18. uro';
} elseif ($cas_tip == 2) {
    $tip='Delovnik med 18. in 6. uro';
} elseif ($cas_tip == 3) {
    $tip='Ob nedeljah in praznikih';
}

$skupen_strosek = $stevilo_ljudi * $st_ur * $cena_na_uro;

    $stmt_insert = mysqli_prepare($link, "INSERT INTO intervencija_mostvo_cas (intervencija_id, cas_tip, cena_na_uro, stevilo, st_ur, skupen_strosek_ljudi)
        VALUES (?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt_insert, "issiid", $id_intervencije, $tip, $cena_na_uro, $stevilo_ljudi, $st_ur, $skupen_strosek);
    mysqli_stmt_execute($stmt_insert);


$sql1 = "SELECT SUM(skupen_strosek) FROM intervencije_oprema WHERE id_intervencije = $id_intervencije";
$result = mysqli_query($link, $sql1);
$oprema_strosek = mysqli_fetch_row($result)[0];

$sql2 = "SELECT SUM(cena_skupaj) FROM intervencije_vozila WHERE id_intervencije = $id_intervencije";
$result2 = mysqli_query($link, $sql2);
$vozila_strosek = mysqli_fetch_row($result2)[0];

$sql3 = "SELECT SUM(skupen_strosek_ljudi) FROM intervencija_mostvo_cas WHERE intervencija_id = $id_intervencije";
$result3 = mysqli_query($link, $sql3);
$mostvo_strosek = mysqli_fetch_row($result3)[0];


$skupaj = $oprema_strosek + $vozila_strosek + $mostvo_strosek;


echo "Skupen strošek: " . number_format($skupaj, 2) . " €";

$sql_update = "UPDATE intervencije SET strosek = $skupaj WHERE id_intervencije = $id_intervencije";
mysqli_query($link, $sql_update);


unset($_SESSION['id_intervencije']);
header("Location: podrobnosti_intervencije.php?idi=$id_intervencije");
exit();
?>