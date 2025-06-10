<!DOCTYPE html>
<html lang="sl">
    <head>
        <meta charset="UTF-8">
        <title>Gasilci - Admin</title>
    </head>
    <body>
        <?php

        include("header.php");
        include_once 'baza.php';
        include_once 'session.php';
        ?>
        <main>
        <h2>ADMIN view</h2>
        <div id="dodaj_spremembo">
            <p><a href="dodaj_spremembo.php">Dodaj spremembo</a></p>
        </div>

        <table id="spremembe">
            <tr>
                <th>Naslov</th>
                <th>Opis</th>
                <th>Datum</th>
                <th>Oseba</th>

                <?php
                    if(isset($_SESSION['id_drustvo'])){
                        $query = "SELECT s.*, u.ime, u.priimek
                        FROM spremembe s 
                        INNER JOIN uporabniki u ON u.id_uporabniki = s.id_uporabniki 
                        INNER JOIN drustva d ON u.id_drustvo = d.id_drustvo 
                        WHERE d.id_drustvo = '{$_SESSION['id_drustvo']}'";;
                    } else {
                        echo "<p> Nimate dodeljenega veljavnega društva.</p>";
                        exit;
                    }
                    $result = mysqli_query($link, $query);
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['naslov'] . "</td>";
                        echo "<td>" . $row['opis'] . "</td>";
                        echo "<td>" . $row['datum'] . "</td>";
                        echo "<td>" . $row['ime']." ". $row['priimek'] . "</td>";
                        echo "</tr>";
                    }
                    ?>

            </tr>
        </table>
        </main>
        
        <style>
            #dodaj_spremembo {
                margin: 20px;
                text-align: right;
            }
            main {
                padding: 20px;
                text-align: center;
                background-color: rgba(0, 0, 0, 0.6);
                margin: 20px auto;
                width: 80%;
                border-radius: 10px;
            }
            #spremembe {
                width: 100%;
                border-collapse: collapse;
                border: 1px solid white;
            }
            #spremembe th, #spremembe td {
                padding: 10px;
                text-align: left;
                border: 1px solid white;
            }
            #spremembe th {
                background-color: rgba(139, 0, 0, 0.9);
            }
        </style>

        <?php
        include "footer.php";
        ?>
    </body>

</html>