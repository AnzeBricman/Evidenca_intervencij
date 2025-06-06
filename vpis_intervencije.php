<!DOCTYPE html>
<html lang="sl">
<head>
  <meta charset="UTF-8">
  <title>Vnos intervencije</title>
</head>
<body>
    <?php
    include_once("header.php");
    include_once("baza.php");
    include_once("session.php");
    ?>

  <h2>Vnos intervencije</h2>
  <form action="vpis_intervencije_vbazo.php" method="post">

    <label for="zaporedna_st">Zaporedna št.:</label><br>
    <input type="number" id="zaporedna_st" name="zaporedna_st"><br><br>

    <label for="datum">Datum:</label><br>
    <input type="date" id="datum" name="datum"><br><br>

    <label for="aktiviranje">Aktiviranje:</label><br>
    <input type="datetime-local" id="aktiviranje" name="aktiviranje"><br><br>

    <label for="izvoz">Izvoz:</label><br>
    <input type="datetime-local" id="izvoz" name="izvoz"><br><br>

    <label for="prihod">Prihod:</label><br>
    <input type="datetime-local" id="prihod" name="prihod"><br><br>

    <label for="odhod">Odhod:</label><br>
    <input type="datetime-local" id="odhod" name="odhod"><br><br>

    <label for="vrnitev">Vrnitev:</label><br>
    <input type="datetime-local" id="vrnitev" name="vrnitev"><br><br>

    <label for="zakljucek">Zaključek:</label><br>
    <input type="datetime-local" id="zakljucek" name="zakljucek"><br><br>

    <label for="trajanje">Trajanje (v urah):</label><br>
    <input type="number" id="trajanje" name="trajanje"><br><br>

    
    <label for="id_vodje">Vodja intervencije:</label><br>
    <select name="vodja" id="id_vodje" required>
        <?php
        $sql = "SELECT * FROM uporabniki WHERE id_drustvo = '{$_SESSION['id_drustvo']}' ";
        $query = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_array($query)) {
        echo '<option value="' . $row['id_uporabniki'] . '">' . $row['ime']." ".$row['priimek'] . '</option>';
        }
        ?>
    </select><br><br>

    <label for="id_drustvo">Društvo:</label><br>
    <select name="drustvo" id="id_drustvo" required>
        <?php
        $sql = "SELECT * FROM drustva WHERE id_drustvo = '{$_SESSION['id_drustvo']}' ";
        $query = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_array($query)) {
        echo '<option value="' . $row['id_drustvo'] . '">' . $row['ime_drustvo']. '</option>';
        }
        ?>
    </select><br><br>

    <label for="naslov">Naslov:</label><br>
    <input type="text" id="naslov" name="naslov"><br><br>

    <label for="opis">Opis:</label><br>
    <textarea id="opis" name="opis" rows="4" cols="40"></textarea><br><br>

    <input type="submit" value="Vnesi intervencijo">
  </form>

</body>
</html>
