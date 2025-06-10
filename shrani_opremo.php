<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once("baza.php");

$id_intervencije = $_POST['id_intervencije'];

if (isset($_POST['oprema'])) {
    $oprema = $_POST['oprema'];
} else {
    $oprema = [];
}


foreach ($oprema as $id_oprema => $data) {
    $stmt_cena = mysqli_prepare($link, "SELECT cena_na_uro FROM oprema WHERE id_oprema = ?");

    $stmt_insert = mysqli_prepare($link, "INSERT INTO intervencije_oprema 
    (id_oprema, id_intervencije, kolicina_uporabe, ure_uporabe, skupen_strosek) VALUES (?, ?, ?, ?, ?)");


    if (isset($data['kolicina'])) {
        $kolicina = $data['kolicina'];
    } else {
        $kolicina = 0;
    }

    if (isset($data['ure'])) {
        $ure = $data['ure'];
    } else {
        $ure = 0;
    }

    if ($kolicina > 0 && $ure > 0) {

        mysqli_stmt_bind_param($stmt_cena, "i", $id_oprema);
        mysqli_stmt_execute($stmt_cena);
        mysqli_stmt_bind_result($stmt_cena, $cena_na_uro);
        mysqli_stmt_fetch($stmt_cena);
        mysqli_stmt_close($stmt_cena);

        if ($cena_na_uro !== null) {
            $skupen_strosek = $kolicina * $ure * $cena_na_uro;

            mysqli_stmt_bind_param($stmt_insert, "iiidd", $id_oprema, $id_intervencije, $kolicina, $ure, $skupen_strosek);
            mysqli_stmt_execute($stmt_insert);
        }
    }
}


header("Location: vpis_vozil_intervencija.php");
exit();
?>
