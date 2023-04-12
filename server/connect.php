<?php
$hostname     = "localhost";
$username     = "root";
$password     = "";
$databasename = "db_nutrace";

$conn = new mysqli($hostname, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>