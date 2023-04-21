<?php

//testing only for login page
$conn = new mysqli('localhost','root','', 'nutrace_server');

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>