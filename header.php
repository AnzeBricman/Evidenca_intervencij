<?php
    include_once 'session.php';
?>
<header>
        <p id="prijava">
            <?php if (isset($_SESSION['idu'])):
                echo "Prijavljeni: " .$_SESSION['ime']. "  ".$_SESSION['priimek'];    ?>
                <span><a href="odjava.php">Odjava</a></span>
                <?php else:?>
                <a href="login.php">Prijava uporabnika</a>
                <?php endif; ?>
        </p>

        <h1>Gasilci - Vodenje Intervencij</h1>
</header>

<table id="navigacija">
    <tr>
        <td><a href="index.php">Domov</a></td>
        <?php 
        if(isset($_SESSION['id_vloga']) ){?>
        <td><a href="pregled_intervencij.php">Intervencije</a></td>
        <td><a href="uporabniki.php">Uporabniki</a></td>
		<td><a href="izpis_opreme_vozil.php">Vozila in oprema</a></td>
        <td><a href="moj_profil.php">Moj profil</a></td>
        <?php }?>

		<?php 
		if (isset($_SESSION['id_vloga'])&& ($_SESSION['id_vloga'] == 2 || $_SESSION['id_vloga'] == 3)):
		echo"<td>"."<a href='admin.php'>"."Admin"."</a>"."</td>";
		endif;
        if (isset($_SESSION['id_vloga']) && $_SESSION['id_vloga'] == 3){
        echo "<td><a href='super_admin.php'>Superadmin</a></td>";
        }
		?>
    </tr>

</table>

	<style>

		body {
			font-family: Arial, sans-serif;
			background-image: url("slike/still-life-with-psychedelic-colored-background.jpg");
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
			text-align: center
        }
        #navigacija {
            width: 100%;
            background-color: rgba(139, 0, 0, 0.9);
            color: white;
            text-align: center;
        }
        #navigacija td {
            padding:5px;
            text-align: center;
        }
        #navigacija a{
            color: white;
            text-decoration: none;
        }
        #navigacija a:hover {
            text-decoration: underline;
        }

    @media (max-width: 1000px) {
        #prijava {
            text-align: center;
            font-size: 30px;
        }

        header {
            font-size: 20px;
            padding: 10px;
        }

        #navigacija td {
            font-size: 30px;
            padding: 8px 2px;
        }
    }        

	
	</style>