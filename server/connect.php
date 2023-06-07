<?php
  $hostname     = "localhost";
  $username     = "root";
  $password     = "";
  $databasename = "nutrace_server";

  $conn = new mysqli($hostname, $username, $password, $databasename);

  if ($conn->connect_error) {
    $error_message = "Connection failed: " . $conn->connect_error;
  }
?>