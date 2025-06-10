<?php
include_once("baza.php");

$id_intervencije = $_POST['id_intervencije'];
$vozila = $_POST['vozila'];

$sql_select = "SELECT cena_vozila_ura FROM vozila WHERE id_vozila = ?";
$stmt_select = mysqli_prepare($link, $sql_select);

$sql_insert = "INSERT INTO intervencije_vozila (id_vozila, id_intervencije, ure_uporabe, cena_skupaj) VALUES (?, ?, ?, ?)";
$stmt_insert = mysqli_prepare($link, $sql_insert);

foreach ($vozila as $id_vozila => $ure) {
    if ($ure > 0) {

        mysqli_stmt_bind_param($stmt_select, "i", $id_vozila);
        mysqli_stmt_execute($stmt_select);
        
        mysqli_stmt_bind_result($stmt_select, $cena_na_uro);
        mysqli_stmt_fetch($stmt_select);
        mysqli_stmt_reset($stmt_select);

        $skupen_strosek = $ure * $cena_na_uro;

        mysqli_stmt_bind_param($stmt_insert, "iiid", $id_vozila, $id_intervencije, $ure, $skupen_strosek);
        mysqli_stmt_execute($stmt_insert);
    }
}

header("Location: vpis_tipa_casa.php");
exit();
?>
