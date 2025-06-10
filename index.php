<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Gasilci - Vodenje Intervencij</title>
</head>
<body>

<?php
include_once 'session.php';
include("header.php");
require_once 'baza.php';
?>

<main>
    <h2>Dobrodošli v sistemu za vodenje gasilskih intervencij</h2>
    <p>
        Naša aplikacija omogoča beleženje gasilskih intervencij, spremljanje opreme, vozil in analiziranje podatkov.
        Gasilska društva lahko enostavno dodajajo nove intervencije, upravljajo s podatki o uporabnikih ter spremljajo stroške opreme in vozil.
    </p>
    <p>
        Ključne funkcionalnosti vključujejo:
        <ul>
            <li>Dodajanje in upravljanje intervencij</li>
            <li>Evidenca gasilcev, njihovih vlog in aktivnosti</li>
            <li>Upravljanje vozil in izračun stroškov njihove uporabe</li>
            <li>Sledenje uporabi gasilske opreme na intervencijah</li>
            <li>Samodejni izračun stroškov in analiza podatkov</li>
        </ul>
    </p>
</main>


<?php include("footer.php"); ?>

</body>
</html>
    <style>
        main {
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.6);
            margin: 20px auto;
            width: 80%;
            border-radius: 10px;
            text-align: center;
        }

        @media (max-width: 1000px) {
           main {
                width: 90%;
            }
        }
    </style>
