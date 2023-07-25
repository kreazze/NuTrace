<?php
    date_default_timezone_set('Asia/Manila');
    
    $hostname     = "localhost";
    $username     = "u158858399_root"; 
    $password     = "+8IM3HNgT/f";
    $databasename = "u158858399_nutrace_server";
    
    $conn = new mysqli($hostname, $username, $password, $databasename);
    
    $query = sprintf("SELECT * FROM `soil_nutrients` ORDER BY id DESC LIMIT 1");
    
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    
    
    $array = array(
        'nitrogen' =>  $row["sn_nitrogen"] ?? 0,
        'phosphorus' =>  $row["sn_phosphorus"] ?? 0,
        'potassium' =>  $row["sn_potassium"] ?? 0,
        'moisture' =>  $row["sn_moisture"] ?? 0,
        'temperature' =>  $row["sn_temperature"] ?? 0,
        'ph' =>  $row["sn_ph"] ?? 0
    );
    
    echo json_encode($array);
?>