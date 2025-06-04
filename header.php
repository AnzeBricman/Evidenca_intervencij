<?php
    include_once 'session.php';
?>
<header>
        <p id="prijava">
            <?php if (isset($_SESSION['idu'])):
                echo "Prijavljeni: " .$_SESSION['ime']. "  ".$_SESSION['priimek'];    ?>
                <span style="margin-left:20px;"><a href="odjava.php">Odjava</a></span>
                <?php else:?>
                <a href="login.php">Prijava uporabnika</a>
                <?php endif; ?>
        </p>

        <h1>Gasilci - Vodenje Intervencij</h1>
</header>
<nav>
    <ul>
        <li><a href="index.php">Domov</a></li>
        <li><a href="pregled_intervencij.php">Intervencije</a></li>
        <li><a href="uporabniki.php">Uporabniki</a></li>
		<li><a href="izpis_opreme_vozil.php">Vozila in oprema</a></li>
        <li><a href="#">Statistika</a></li>
		<!--<li><a href="baza.php">Baza</a></li>-->
        <li><a href="moj_profil.php">Moj profil</a></li>
		<?php 
		if (isset($_SESSION['id_vloga'])&& ($_SESSION['id_vloga'] == 2 || $_SESSION['id_vloga'] == 3)):
		echo"<li>"."<a href='admin.php'>"."Admin"."</a>"."</li>";
		endif;
        if (isset($_SESSION['id_vloga']) && $_SESSION['id_vloga'] == 3){
        echo "<li><a href='super_admin.php'>Superadmin</a></li>";
        }
		?>
    </ul>
</nav>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-image: url("slike/still-life-with-psychedelic-colored-background.jpg");
			background-size: cover;
			background-repeat: no-repeat;
			color: white;
        }
		#prijava{
			text-align: right;
			margin: 10px 20px;
			font-size: 14px;
		}
		header {
			background-color: rgba(179, 24, 24, 0.9);
			color: white;
			padding: 15px;
			text-align: center;
		}
		nav ul {
			list-style: none;
			padding: 0;
			background-color: rgba(139, 0, 0, 0.9);
		}
		nav ul li {
			margin: 0 15px;
		}
		nav ul li a {
			color: yellow;
			text-decoration: none;
			padding: 10px 15px;
			display: inline-block;
			font-weight: bold;
		}
		nav ul li a:hover {
			background-color: rgba(255, 69, 0, 0.8);
			border-radius: 5px;
		}
		
	</style>
