<?php
  require_once('../server/session.php');

  // Check if the user is not logged in, redirect to the login page
  if (!isset($_SESSION["fullname"])) {
    header("Location: ../sections/homepage.php");
    exit();
  }

  include('../server/connect.php');

  if (isset($_POST['parameter']) && isset($_POST['value'])) {
    $parameter = $_POST['parameter'];
    $value = $_POST['value'];

    // Map the parameter to the corresponding table
    $tables = [
      'Nitrogen' => 'nitrogen',
      'Phosphorus' => 'phosphorus',
      'Potassium' => 'potassium',
      'SoilMoisture' => 'soil_moisture',
      'SoilTemp' => 'soil_temperature',
      'pH' => 'ph'
    ];

    // Check if the parameter exists in the mapping
    if (array_key_exists($parameter, $tables)) {
      $table = $tables[$parameter];

      // Insert the data into the corresponding table
      $query = "INSERT INTO $table (value) VALUES ('$value')";
      $query_run = mysqli_query($conn, $query);
      if ($query_run) {
        // Data inserted successfully
        echo 'Data inserted successfully.';
      } else {
        // Failed to insert data
        echo 'Failed to insert data.';
      }
    } else {
      // Invalid parameter
      echo 'Invalid parameter.';
    }
  } else {
    // Invalid request
    echo 'Invalid request.';
  }
?>
