<?php

session_start();

define('SITEURL', 'http://localhost/Restaurant/');

$conn = mysqli_connect('localhost', 'root', '','mca') or die(mysqli_error());

$db_select = mysqli_select_db($conn, 'mca') or die(mysqli_error());

?>


