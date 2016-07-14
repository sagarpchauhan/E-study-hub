<?php
$servername = "localhost";
$username = "root";
$password = "";

$connect = mysql_connect("localhost", "root", "") or
die (" check your server connection.");

mysql_select_db ("bookstore");

?>