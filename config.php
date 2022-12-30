<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "soundwave";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
