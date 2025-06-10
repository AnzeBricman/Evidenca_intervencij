<?php
include_once("baza.php");
include_once("session.php");
include_once("header.php");
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Moj profil</title>
</head>
<body>
    <main>
    <div id="profil">

            <h2>Moj profil</h2>
        
            <h2>Podatki o profilu</h2>
             <?php
            if (isset($_SESSION['idu'])) {
                $id_uporabnika = $_SESSION['idu'];

                $sql = "SELECT * FROM uporabniki u INNER JOIN drustva d ON d.id_drustvo = u.id_drustvo WHERE u.id_uporabniki = '$id_uporabnika'";
                $query = mysqli_query($link, $sql);
                $row = mysqli_fetch_assoc($query);



                if ($row) {
                    echo "<p>Ime: " . ($row['ime']) . "</p>";
                    echo "<p>Priimek: " . ($row['priimek']) . "</p>";
                    echo "<p>Email: " . ($row['email']) . "</p>";
                    echo "<p>Društvo: " . ($row['ime_drustvo']) . "</p>";
                } else {
                    echo "<p>Podatki o uporabniku niso na voljo.</p>";
                }
                
                echo "<p id='spremeni_kodo'>" . "<a href='spremeni_geslo.php'>Spremeni svoje geslo"."</a>";

            } else {
                echo "<p>Uporabnik ni prijavljen.</p>";
            }
            ?>
    </div>
    </main>
    <?php
    include_once("footer.php");
    ?>
</body>
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
    #spremeni_kodo {
        margin: 20px;
    }
</style>
