<!DOCTYPE html>
<html lang="sl">
    <head>
        <meta charset="UTF-8">
        <title>Gasilci - Uporabniki</title>
    </head>
    <body>
        <?php
        include("header.php");
        include_once 'baza.php';
        include_once 'session.php';
        ?>
        <main>
            <div>
                <h2>Seznam uporabnikov</h2>
                <?php
                if (isset($_SESSION['id_vloga']) && $_SESSION['id_vloga'] == 2) {
                    echo "<p>Prijavljeni ste kot administrator.</p>";
                    echo "<p id='dodaj_uporabnika'>" . "<a href='dodaj_uporabnika.php'>Dodaj uporabnika"."</a>";
                    echo "</p>";
                } else if (isset($_SESSION['id_vloga']) && $_SESSION['id_vloga'] == 1) {
                    echo "<p>Prijavljeni ste kot uporabnik.</p>";
                }else if (isset($_SESSION['id_vloga']) && $_SESSION['id_vloga'] == 3) {
                    echo "<p>Prijavljeni ste kot superadmin.</p>";
                    echo "<p id='dodaj_uporabnika'>" . "<a href='dodaj_uporabnika.php'>Dodaj uporabnika"."</a>";
                    echo "</p>";
                } else {
                    echo "<p>Prijavljeni ste kot gost.</p>";
                }
               ?>
                
                <table id="uporabniki">
                    <tr>
                        <th>ID</th>
                        <th>Ime</th>
                        <th>Priimek</th>
                        <th>Email</th>
                        <th>Društvo</th>
                        <th>Vloga</th>
                        <?php
                        if (isset($_SESSION['id_vloga']) && $_SESSION['id_vloga'] == 2 ||$_SESSION['id_vloga'] == 3) {
                            echo "<th>Uredi</th>";
                            echo "<th>Izbriši</th>";
                        }
                        ?>
                    </tr>
                    <?php
                    if(isset($_SESSION['id_drustvo'])){
                        if($_SESSION['id_vloga'] == 3) {
                            $query = "SELECT * FROM uporabniki u INNER JOIN vloge v ON u.id_vloge = v.id_vloge INNER JOIN drustva d ON u.id_drustvo = d.id_drustvo";
                        } else if ($_SESSION['id_vloga'] == 1 || $_SESSION['id_vloga'] == 2) {
                            $query = "SELECT * FROM uporabniki u INNER JOIN vloge v ON u.id_vloge = v.id_vloge INNER JOIN drustva d ON u.id_drustvo = d.id_drustvo WHERE d.id_drustvo = '{$_SESSION['id_drustvo']}'";
                        }
                    } else {
                        echo "<p> Nimate dodeljenega veljavnega društva.</p>";
                        exit;
                    }
                    $result = mysqli_query($link, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id_uporabniki'] . "</td>";
                        echo "<td>" . $row['ime'] . "</td>";
                        echo "<td>" . $row['priimek'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['ime_drustvo'] . "</td>";
                        echo "<td>" . $row['ime_vloge'] . "</td>";
                         
                            if (isset($_SESSION['id_vloga']) && $_SESSION['id_vloga'] == 2 || $_SESSION['id_vloga'] == 3){
                                echo "<td><a href='uredi_uporabnika.php?id=" . $row['id_uporabniki'] . "'>Uredi</a></td>";
                                echo "<td><a href='izbris_uporabnika.php?id=" . $row['id_uporabniki'] . "'>Izbriši</a></td>";
                            } 
                        

                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
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
            #uporabniki {
                width: 100%;
                border-collapse: collapse;
                border: 1px solid white;
            }
            #uporabniki th, #uporabniki td {
                padding: 10px;
                text-align: left;
                border: 1px solid white;
            }
            #uporabniki th {
                background-color: rgba(139, 0, 0, 0.9);
            }
        </style>

        <?php
        include("footer.php");
        ?>
    </body>
</html>