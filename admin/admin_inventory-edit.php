<?php
    require_once('../server/session.php');

    // Check if user is not logged in, redirect to login page
    if (!isset($_SESSION["fullname"])) {
        header("Location: ../sections/homepage.php");
        exit();
    }
    include('../server/connect.php');

    if (isset($_POST['edit'])) {
        $id = $_POST['edit_id'];

        $date = $_POST['edit_date'];
        $croptype = $_POST['edit_croptype'];
        $quantity = $_POST['edit_quantity'];
        $harvester = $_POST['edit_harvester'];
        
        $statusQuery = "SELECT status FROM tbl_inventory WHERE id='$id'";
        $conn = new mysqli("localhost", "u158858399_root", "?QKZg9PRv4Ns", "u158858399_nutrace_server");
        $statusResult = mysqli_query($conn, $statusQuery);
        $row = mysqli_fetch_assoc($statusResult);
        $status = $row['status'];

        if ($status === 'Declined') {
            $query = "UPDATE tbl_inventory SET date='$date', croptype='$croptype', quantity='$quantity', harvester='$harvester', status='Pending' WHERE id='$id' ";
        } else {
            $query = "UPDATE tbl_inventory SET date='$date', croptype='$croptype', quantity='$quantity', harvester='$harvester' WHERE id='$id' ";
        }

        $query_run = mysqli_query($conn, $query);
    
        if ($query_run) {
            $_SESSION['success'] = "Your data is updated!";
            header('location: ../admin/admin_inventory.php');
        } else {
            $_SESSION['status'] = "Your data is not updated!";
            header('location: ../admin/admin_inventory.php');
        }
    }
?>