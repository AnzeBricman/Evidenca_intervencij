<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Dodaj stvari</title>
</head>
<body>
    <?php
    include_once 'baza.php';
    include_once 'session.php';
    include_once 'header.php';
    ?>
    <main>
        <div id="dodaj_vozila">
            <h2>Dodaj vozila</h2>
            <form action="dodaj_stvar_preveri.php" method="post">
                <input type="text" name="ime" placeholder="ime" required><br><br>
                <input type="text" name="cena_vozila_ura" placeholder="cena vozila na uro" required><br><br>
                <select name="drustvo" required>
                    <?php
                    
                    $sql = "SELECT * FROM drustva WHERE id_drustvo = '{$_SESSION['id_drustvo']}'";

                    $query = mysqli_query($link, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                        echo '<option value="' . $row['id_drustvo'] . '">' . $row['ime_drustvo'] . '</option>';
                    }
                    ?>
                </select><br><br>
                <input type="submit" value="Dodaj stvar">
            </form>
        </div>
        <div id="dodaj_opremo">
            <h2>Dodaj opremo</h2>
            <form action="dodaj_opremo_preveri.php" method="post">
                <input type="text" name="ime" placeholder="ime" required><br><br>
                <input type="text" name="cena_opreme_ura" placeholder="cena opreme na uro" required><br><br>
                <select name="drustvo" required>
                    <?php
                    $sql = "SELECT * FROM drustva WHERE id_drustvo = '{$_SESSION['id_drustvo']}'";
                    $query = mysqli_query($link, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                        echo '<option value="' . $row['id_drustvo'] . '">' . $row['ime_drustvo'] . '</option>';
                    }
                    ?>
                </select><br><br>
                <input type="submit" value="Dodaj stvar">
            </form>
        </div>
    </main>

    <?php
    include_once 'footer.php';
    ?>
</html>
    <style>
    main {
        padding: 20px;
        text-align: center;
        background-color: rgba(0, 0, 0, 0.6);
        margin: 20px auto;
        width: 80%;
        border-radius: 10px;
    }

    </style>