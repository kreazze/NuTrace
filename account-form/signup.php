<?php

    if(isset($_POST['submit']))
    {
		$conn = new mysqli('localhost','root','', 'nutrace_server');

        $fullname   = $_POST["fullname"];
		$contact    = $_POST["contact"];
		$email      = $_POST["email"];
		$password   = md5($_POST["password"]);
		$cpassword	= md5($_POST["cpassword"]);
		$user_type	= $_POST["user_type"];

		$select  = "SELECT * FROM tbl_users WHERE email = '$email' && password ='$password' ";
		$result 	= mysqli_query($conn,$select);

		if(mysqli_num_rows($result) > 0){
			$error[] = 'User Already Exist!';
		}
		else{
			if($password != $cpassword){
			   $error[] = 'Password do not matched!';
			}
			else{
			   $insert = "INSERT INTO tbl_users (fullname, contact, email, password, cpassword, user_type) VALUES ('$fullname','$contact','$email','$password','$cpassword','$user_type')";

			   mysqli_query($conn, $insert);
			   $alert ="<script>alert('Registered Successfully!'');</script>";
					echo $alert;
			   header('location:../account-form/login.php');

			   
			}
		 }
	}
?>
<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>NuTrace</title>
		<link rel="stylesheet" type="text/css" href="../account-form/signup.css">
		<link rel="icon" type="image/png" href="../assets/images/main/nutrace_logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	</head>
	<body>
		<div class="container">
			<div class="back">
                <a href="account.php"><i class="fa-sharp fa-solid fa-chevron-left fa-sm" style="color: #25a22b;"></i> Back </a>
            </div>
			<div class="register">
				<div class="logo-title">
					<img src="../assets/images/main/nutrace_logo.png" width="80px" height="80px">
					<h3>NuTrace</h3>
				</div>
				<hr class="rounded">
				<h6 class="regTitle">Registration Form</h6>
			</div>
			
			<form class="form" name="form" method="post">
					<div class="error">
						<?php
						if(isset($error)){
							foreach($error as $error){
								echo '<span class="error-msg">'.$error.'</span>';
							};
						}
						?>
					</div>
			
					<label>Full Name:</label><br>
					<input type="text" class="input" name="fullname" id="fullname" placeholder="Your Name" required><br>
					
					<label>Contact Number:</label><br>
					<input type="text" class="input" name="contact" id="contact" placeholder="09XXXXXXXXX" required><br>
					
					<label>Email:</label><br>
					<input type="email" class="input" name="email" id="email" placeholder="juandelacruz@gmail.com" required><br>
					
					<label>Password:</label><br>
					<input type="password" class="input" name="password" id="password" placeholder="Enter your password"  maxlength="20" required><br>

					<label>Confirm Password:</label><br>
					<input type="password" class="input" name="cpassword" id="password" placeholder="Confirm your password"  maxlength="20" required><br>

					<select name="user_type">
							<option value="user" class="user">User</option>
							<option value="admin" class="admin">Admin</option>
					</select>
					<br>
					<input type="submit" value="PROCEED" id="submit" name="submit" class="proceedBtn">
			</form>
		</div>		
	</body>
</html>