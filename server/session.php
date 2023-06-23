<!-- Require this session.php to restrict access on pages unless logged in-->

<?php

// Start the session
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to the login page or any other page as desired
    header('Location: ../account-form/account.php');
    echo '<script type ="text/JavaScript">';  
    echo 'alert("You must log in first.")';  
    echo '</script>';  
    exit;
}
?>
