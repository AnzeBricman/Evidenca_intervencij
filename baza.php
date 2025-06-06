<?php
$host="sh3.neoserv.si";
$user="bricman_bricman";
$password="Anze.Anze11";
$database="bricman_evidenca_intervencij";
$link=mysqli_connect($host, $user, $password, $database)
    or die("nemorem do baze");

mysqli_set_charset($link, "utf8");
?>