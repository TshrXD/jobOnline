<?php

$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "db_jobonline";

$db_connect = mysqli_connect($db_host,$db_username,$db_password,$db_name) or die("Database connection error.");
?>