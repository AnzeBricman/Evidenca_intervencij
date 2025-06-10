<?php
include_once("baza.php");
include_once("session.php");
include_once("header.php");

$id_intervencije = $_GET['idi'];
?>

<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Podrobnosti intervencije</title>
</head>
<body>
<main>
<h2>Podrobnosti intervencije #<?php echo $id_intervencije; ?></h2>

<?php
$sql_intervencija = "
    SELECT i.*, d.ime_drustvo,u.ime,u.priimek
    FROM intervencije i
    INNER JOIN drustva d ON i.id_drustvo = d.id_drustvo
    INNER JOIN uporabniki u on i.id_vodja = u.id_uporabniki
    WHERE i.id_intervencije = $id_intervencije
";
$result_intervencija = mysqli_query($link, $sql_intervencija);

if ($row = mysqli_fetch_assoc($result_intervencija)) {
    echo "<h3>Osnovni podatki</h3>";
    echo "<ul>";
    echo "<li>Zaporedna številka: " . $row['zaporedna_st'] . "</li>";
    echo "<li>Datum: " . $row['datum'] . "</li>";
    echo "<li>Naslov: " . $row['naslov'] . "</li>";
    echo "<li>Opis: " . $row['opis'] . "</li>";
    echo "<li>Aktiviranje: " . $row['aktiviranje'] . "</li>";
    echo "<li>Izvoz: " . $row['izvoz'] . "</li>";
    echo "<li>Prihod: " . $row['prihod'] . "</li>";
    echo "<li>Odhod: " . $row['odhod'] . "</li>";
    echo "<li>Vrnitev: " . $row['vrnitev'] . "</li>";
    echo "<li>Zaključek: " . $row['zakljucek'] . "</li>";
    echo "<li>Trajanje: " . $row['trajanje'] . "</li>";
    echo "<li>Vodja: " . $row['ime']." ".$row['priimek']. "</li>";
    echo "<li>>Društvo: " . $row['ime_drustvo'] . "</li>";
    echo "</ul>";
} else {
    echo "<p>Podatki o intervenciji niso bili najdeni.</p>";
}
?>

<?php 
$sql_prisotni = "
    SELECT u.ime, u.priimek
    FROM intervencije_uporabniki iu
    INNER JOIN uporabniki u ON iu.id_uporabniki = u.id_uporabniki
    WHERE iu.id_intervencije = $id_intervencije";

$result_prisotni = mysqli_query($link, $sql_prisotni);

echo "<h3>Prisotni člani</h3><table class='oprema'>
<tr>
    <th>Ime</th>
    <th>Priimek</th>
</tr>";
while ($row = mysqli_fetch_assoc($result_prisotni)) {
    echo "<tr>
        <td>{$row['ime']}</td>
        <td>{$row['priimek']}</td>
    </tr>";
}
echo "</table>";
?>


<?php
$sql_oprema = "
    SELECT o.ime, io.kolicina_uporabe, io.ure_uporabe, io.skupen_strosek
    FROM intervencije_oprema io
    INNER JOIN oprema o ON o.id_oprema = io.id_oprema
    WHERE io.id_intervencije = $id_intervencije
";
$result_oprema = mysqli_query($link, $sql_oprema);

echo "<h3>Uporabljena oprema</h3><table class='oprema'>

<tr>
    <th>Ime</th>
    <th>Količina</th>
    <th>Ure uporabe</th>
    <th>Skupen strošek</th>
</tr>";

while ($row = mysqli_fetch_assoc($result_oprema)) {
    echo "<tr>
        <td>{$row['ime']}</td>
        <td>{$row['kolicina_uporabe']}</td>
        <td>{$row['ure_uporabe']}</td>
        <td>{$row['skupen_strosek']} €</td>
    </tr>";
}
echo "</table>";
?>

<?php
$sql_vozila = "
    SELECT v.ime, iv.ure_uporabe, iv.cena_skupaj
    FROM intervencije_vozila iv
    JOIN vozila v ON v.id_vozila = iv.id_vozila
    WHERE iv.id_intervencije = $id_intervencije
";
$result_vozila = mysqli_query($link, $sql_vozila);

echo "<h3>Uporabljena vozila</h3><table class='oprema'>
<tr>
    <th>Ime</th>
    <th>Ure uporabe</th>
    <th>Skupen strošek</th>
</tr>";
while ($row = mysqli_fetch_assoc($result_vozila)) {
    echo "<tr>
        <td>{$row['ime']}</td>
        <td>{$row['ure_uporabe']}</td>
        <td>{$row['cena_skupaj']} €</td>

    </tr>";
}
echo "</table>";
?>



<?php

$sql_strosek = "
SELECT im.cas_tip, im.cena_na_uro, im.stevilo, im.st_ur, im.skupen_strosek_ljudi, iv.strosek
FROM intervencija_mostvo_cas im
JOIN intervencije iv ON iv.id_intervencije = im.intervencija_id
WHERE im.intervencija_id = $id_intervencije";

$result_mostvo = mysqli_query($link, $sql_strosek);

echo "<h3>Strošek moštva</h3><table class='oprema'>
<tr>
    <th>Tip časa</th>
    <th>Cena na uro</th>
    <th>Št. ljudi</th>
    <th>Št. ur</th>
    <th>Skupen strošek ljudi</th>
    <th>Skupen strošek celotne intervencije</th>
</tr>";
while ($row = mysqli_fetch_assoc($result_mostvo)) {
    echo "<tr>
        <td>{$row['cas_tip']}</td>
        <td>{$row['cena_na_uro']}</td>
        <td>{$row['stevilo']}</td>
        <td>{$row['st_ur']} </td>
        <td>{$row['skupen_strosek_ljudi']} €</td>
        <td>{$row['strosek']} €</td>
    </tr>";
}
echo "</table>";
?>
</main>

<?php include("footer.php"); ?>
</body>

<style>
    .oprema th, .oprema td {
        padding: 10px;
        text-align: left;
        border: 1px solid white;
        border-collapse: collapse;
    }
</style>
</html>
