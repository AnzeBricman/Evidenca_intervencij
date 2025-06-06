<?php
include_once 'baza.php';
include_once 'session.php';
?>

<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Gasilci - Vodenje Intervencij</title>

</head>
<body>
	<?php
	include("header.php");
	?>
    <main>
        <div>
            <h2>Prijava</h2>
            <form action="login_preveri.php" method="post">
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required><br><br>
                <label for="geslo">Geslo:</label><br>
                <input type="password" id="geslo" name="geslo" required><br><br>
                <input type="submit" value="Prijava">
            </form>
        </div>
        <div>
            <p>Še nimate računa? O tem obvestite glavne v društvu!</p>
        </div>
    </main>

    
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

	<?php
	include("footer.php");
	?>
</body>
</html>
