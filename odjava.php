<?php
include_once 'session.php';
session_destroy();
header("refresh:0; url=index.php");

?>