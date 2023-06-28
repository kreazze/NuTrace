<?php
  $hostname     = "localhost";
  $username     = "u158858399_root", 
  $password     = "?QKZg9PRv4Ns",
  $databasename = "u158858399_nutrace_server";

  $conn = new mysqli($hostname, $username, $password, $databasename);

  if ($conn->connect_error) {
    $error_message = "Connection failed: " . $conn->connect_error;
  }
?>