<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izpis opreme vozil</title>
</head>
<body>
        <?php
        include("header.php");
        include_once 'baza.php';
        include_once 'session.php';
        ?>
        <main>
            <div>
                <h2>Seznam vozil</h2>
                <?php
                if (isset($_SESSION['id_vloga']) && $_SESSION['id_vloga'] == 2) {
                    echo "<p>Prijavljeni ste kot administrator.</p>";
                    echo "<p id='dodaj_uporabnika'>" . "<a href='dodaj_stvari.php'>Dodaj opremo in vozila"."</a>";
                    echo "</p>";
                } else if (isset($_SESSION['id_vloga']) && $_SESSION['id_vloga'] == 1) {
                    echo "<p>Prijavljeni ste kot uporabnik.</p>";
                }else if (isset($_SESSION['id_vloga']) && $_SESSION['id_vloga'] == 3) {
                    echo "<p>Prijavljeni ste kot superadmin.</p>";
                    echo "<p id='dodaj_uporabnika'>" . "<a href='dodaj_stvari.php'>Dodaj opremo in vozila"."</a>";
                    echo "</p>";
                } else {    
                    echo "<p>Prijavljeni ste kot gost.</p>";
                }
               ?>
                
                <table class="oprema_vozila">
                    <tr>
                        <th>ID</th>
                        <th>Ime</th>
                        <th>Cena vozila na uro</th>
                        <th>Društvo</th>

                    </tr>
                    <?php
                    if(isset($_SESSION['id_drustvo'])){

                        if($_SESSION['id_vloga'] == 3) {
                            $query = "SELECT * FROM vozila u INNER JOIN drustva d ON u.id_drustvo = d.id_drustvo";

                        } else if ($_SESSION['id_vloga'] == 1 || $_SESSION['id_vloga'] == 2) {

                            $query = "SELECT * FROM vozila u INNER JOIN drustva d ON u.id_drustvo = d.id_drustvo WHERE d.id_drustvo = '{$_SESSION['id_drustvo']}'";
                        }
                    } else {
                        echo "<p> Nimate dodeljenega veljavnega društva.</p>";
                        exit;
                    }
                    $result = mysqli_query($link, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id_vozila'] . "</td>";
                        echo "<td>" . $row['ime'] . "</td>";
                        echo "<td>" . $row['cena_vozila_ura'] . "</td>";
                        echo "<td>" . $row['ime_drustvo'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>

            <div>
                <h2>Seznam opreme</h2>
                <table class="oprema_vozila">
                    <tr>
                        <th>ID</th>
                        <th>Ime</th>
                        <th>Cena opreme na uro</th>
                        <th>Društvo</th>

                    </tr>
                    <?php
                    if(isset($_SESSION['id_drustvo'])){

                    if($_SESSION['id_vloga'] == 3) {
                        $query = "SELECT * FROM oprema o INNER JOIN drustva d ON o.id_drustvo = d.id_drustvo";
                    } else if ($_SESSION['id_vloga'] == 1 || $_SESSION['id_vloga'] == 2) {
                        $query = "SELECT * FROM oprema o INNER JOIN drustva d ON o.id_drustvo = d.id_drustvo WHERE d.id_drustvo = '{$_SESSION['id_drustvo']}'";;
                    } else {
                        echo "<p> Nimate dodeljenega veljavnega društva.</p>";
                        exit;
                    }
                    
                    $result = mysqli_query($link, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id_oprema'] . "</td>";
                        echo "<td>" . $row['ime'] . "</td>";
                        echo "<td>" . $row['cena_na_uro'] . "</td>";
                        echo "<td>" . $row['ime_drustvo'] . "</td>";
                        echo "</tr>";
                    }
                    }
                    ?>
                </table>
        </main>
        <style>
            #dodaj_uporabnika {
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
            .oprema_vozila {
                width: 100%;
                border-collapse: collapse;
                border: 1px solid white;


            }
            .oprema_vozila th, .oprema_vozila td {
                padding: 10px;
                text-align: left;
                border: 1px solid white;
            }
            th {
                background-color: rgba(139, 0, 0, 0.9);
            }
        </style>

        <?php
        include("footer.php");
        ?>
    </body>
</html>