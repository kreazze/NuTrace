<!DOCTYPE html>

<html>
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Register in NuTrace</title>
		<link rel="stylesheet" type="text/css" href="../account-form/signup.css">
		<link rel="icon" type="image/png" href="../assets/images/main/nutrace_logo.png">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,600;1,900&display=swap" rel="stylesheet">
		<!--Font Awesome Bootstrap-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	</head>
	<body>
		<div class="container">
			<div class="register">
				<div class="logo">
					<img src="../assets/images/main/nutrace_logo.png" width="250px" height="250px">
				</div>
				<h1> NuTrace </h1>
			</div>
            <div>
                <a href="../client/about.html"><button class="homepage"> Go to homepage </button></a>
		</div>		
	</body>
</html>
<?php
    //For Signup page
    $fullname   = $_POST['fullname'];
    $contact    = $_POST['contact'];
    $email      = $_POST['email'];
    $password   = $_POST['password'];

    $conn = new mysqli('localhost','root','', 'nutrace_server');

    // Check connection and add to db
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else {
        $stmt = $conn->prepare("INSERT INTO tbl_user(fullname, contact, email, password) VALUES(?, ?, ?, ?)");
        $stmt->bind_param("siss", $fullname, $contact, $email, $password);
        $stmt->execute();
            //echo 'Registered Successfully...';
            $alert ="<script>alert('Registered Successfully!');</script>";
			echo $alert;
        $stmt->close();
        $conn->close();
        }
?>
