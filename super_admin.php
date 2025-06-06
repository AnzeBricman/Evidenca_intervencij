<?php 
include("header.php");
include_once 'session.php';
include_once 'baza.php';
?>

<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Super Admin - Upravljanje Društev</title>
</head>
<body>
    <main>
        <h2>Super Admin - Upravljanje Društev</h2>
        <p>Na tej strani lahko upravljate z gasilskimi društvi.</p>
        <p id="dodaj_drustvo"><a href="dodaj_drustvo.php" >Dodaj Društvo</a></p> 
        
                <table id="drustva">
                    <tr>
                        <th>ID drustvo</th>
                        <th>Ime drustvo</th>
                        <th>Kraj</th>
                    </tr>
                    <?php
                    if(isset($_SESSION['id_vloga'])){
                        if($_SESSION['id_vloga'] == 3) {
                            $query = "SELECT * FROM drustva";
                        }
                    } else {
                        echo "<p> Nimate dodeljene veljavne vloge.</p>";
                        exit;
                    }

                    $result = mysqli_query($link, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id_drustvo'] . "</td>";
                        echo "<td>" . $row['ime_drustvo'] . "</td>";
                        echo "<td>" . $row['kraj'] . "</td>";                        
                        echo "</tr>";
                    }
                    ?>
                </table>
    </main>

</body>
</html>
        <style>
            #dodaj_drustvo {
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
            #drustva {
                width: 100%;
                border-collapse: collapse;
                border: 1px solid white;
            }
            #drustva th, #drustva td {
                padding: 10px;
                text-align: left;
                border: 1px solid white;
            }
            #drustva th {
                background-color: rgba(139, 0, 0, 0.9);
            }
        </style>