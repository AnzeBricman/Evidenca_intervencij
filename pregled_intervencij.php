<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Pregled intervencij</title>
    
</head>
<body>
    <?php
    include("header.php");
    include_once 'baza.php';
    include_once 'session.php';
    ?>

        <main>
            <div>
                <h2>Seznam intervencij</h2>
                <?php
                if (isset($_SESSION['id_vloga']) && $_SESSION['id_vloga'] == 2) {
                    echo "<p>Prijavljeni ste kot administrator.</p>";
                    echo "<p id='Dodaj_novo_intervencijo'>" . "<a href='vpis_intervencije.php'>Dodaj novo intervencijo"."</a>";
                    echo "</p>";
                } else if (isset($_SESSION['id_vloga']) && $_SESSION['id_vloga'] == 1) {
                    echo "<p>Prijavljeni ste kot uporabnik.</p>";
                }else if (isset($_SESSION['id_vloga']) && $_SESSION['id_vloga'] == 3) {
                    echo "<p>Prijavljeni ste kot superadmin.</p>";
                    echo "<p id='Dodaj_novo_intervencijo'>" . "<a href='vpis_intervencije.php'>Dodaj novo intervencijo"."</a>";
                    echo "</p>";
                }else {    
                    echo "<p>Prijavljeni ste kot gost.</p>";
                }
               ?>
                
                <table id="intervencije">
                    <tr>
                        <th>Zaporedna st.</th>
                        <th>Datum</th>
                        <th>Naslov</th>
                        <th>Opis</th>
                        <th>Podrobnosti</th>
                    </tr>
                    <?php
                    if(isset($_SESSION['id_drustvo'])){

                        if($_SESSION['id_vloga'] == 3) {
                            $query = "SELECT * FROM intervencije i INNER JOIN drustva d ON i.id_drustvo = d.id_drustvo";
                        } else if ($_SESSION['id_vloga'] == 1 || $_SESSION['id_vloga'] == 2) {
                            $query = "SELECT * FROM intervencije i INNER JOIN drustva d ON i.id_drustvo = d.id_drustvo WHERE d.id_drustvo = '{$_SESSION['id_drustvo']}'";
                        }

                    } else {
                        echo "<p> Nimate dodeljenega veljavnega društva.</p>";
                        exit;
                    }
                    $result = mysqli_query($link, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['zaporedna_st'] . "</td>";
                        echo "<td>" . $row['datum'] . "</td>";
                        echo "<td>" . $row['naslov'] . "</td>";
                        echo "<td>" . $row['opis'] . "</td>";
                        echo '<td><a href="podrobnosti_intervencije.php?idi='.$row['id_intervencije'].'">Podrobnosti</a></td>';
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>

        </main>
        <style>
            #Dodaj_novo_intervencijo {
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
            #intervencije {
                width: 100%;
                border-collapse: collapse;
                border: 1px solid white;
            }
            #intervencije th, #intervencije td {
                padding: 10px;
                text-align: left;
                border: 1px solid white;
            }
            #intervencije th {
                background-color: rgba(139, 0, 0, 0.9);
            }
        </style>

        <?php
        include("footer.php");
        ?>
    </body>
</html>