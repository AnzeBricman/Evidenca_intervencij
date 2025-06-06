<!DOCTYPE html>
<html lang="sl">
    <head>
    <meta charset="UTF-8">
    <title>Dodaj uporabnika</title>
    </head>
    <body>
        <?php
        include_once 'baza.php';
        include_once 'session.php';
        include_once 'header.php';
        ?>
        <main>
            <div id="dodaj_uporabnika">
                <h2>Dodaj uporabnika</h2>
                <form action="dodaj_uporabnika_preveri.php" method="post">
                    <input type="text" name="ime" placeholder="ime" required><br><br>
                    <input type="text" name="priimek" placeholder="priimek" required><br><br>
                    <input type="email"  name="email" placeholder="email" required><br><br>
                    <input type="password"  name="geslo" placeholder="geslo" required><br><br>
                    <select name="vloga" required>
                        <option value="1"> Uporabnik</option>
                        <option value="2"> Administrator</option>
                    </select><br><br>

                    <select name="drustvo" required>
                        <?php
                        if(isset($_SESSION['id_drustvo']) && isset($_SESSION['id_vloga'])) {
                            if ($_SESSION['id_vloga'] == 3) {

                                $sql = "SELECT * FROM drustva";
                            } else {
                                $sql = "SELECT * FROM drustva WHERE id_drustvo = '{$_SESSION['id_drustvo']}'";
                            }

                        } else {
                            echo "<p> Nimate dodeljenega veljavnega društva. Ali vloge.</p>";
                            exit;
                        }

                        $query = mysqli_query($link, $sql);
                        while ($row = mysqli_fetch_array($query)) {
                            echo '<option value="' . $row['id_drustvo'] . '">' . $row['ime_drustvo'] . '</option>';
                        }
                        ?>
                    </select><br><br>  

                    <input type="submit" value="Dodaj uporabnika">
                </form>
            </div>
        </main>
        <style>
            #dodaj_uporabnika{
                margin: 20px;
                text-align: center;
            }
        </style>
        <?php
        include_once 'footer.php';
        ?>
    </body>
</html>