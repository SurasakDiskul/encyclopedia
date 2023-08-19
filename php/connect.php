<?php
$host = "localhost";
$username = "cjautoin_chjadmin";
$password = "333cjChowjung";
$dbname = "cjautoin_sa";

$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
	error_reporting(E_ALL ^ E_NOTICE);
	error_reporting( error_reporting() & ~E_NOTICE );
}
error_reporting(E_ALL ^ E_NOTICE);
	error_reporting( error_reporting() & ~E_NOTICE );
session_start();