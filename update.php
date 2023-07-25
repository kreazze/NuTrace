<?php
    date_default_timezone_set('Asia/Manila');
    
    $hostname     = "localhost";
    $username     = "root"; 
    $password     = "";
    $databasename = "nutrace_server";
    
    $conn = new mysqli($hostname, $username, $password, $databasename);
    
    
    $sn_nitrogen    = $_GET["nitrogen"];
    $sn_phosphorus  = $_GET["phosphorus"];
    $sn_potassium   = $_GET["potassium"];
    $sn_moisture    = $_GET["moisture"];
    $sn_temperature = $_GET["temperature"];
    $sn_ph          = $_GET["ph"];

    $query = sprintf("INSERT INTO `soil_nutrients` (`sn_date`, `sn_nitrogen`, `sn_phosphorus`, `sn_potassium`, `sn_moisture`, `sn_temperature`, `sn_ph`) VALUES(now(),'%s','%s','%s','%s','%s','%s')", $sn_nitrogen, $sn_phosphorus, $sn_potassium, $sn_moisture, $sn_temperature, $sn_ph);
    $conn->query($query);
    echo 'Success';
?>