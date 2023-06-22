<?php
	if(isset($_POST['submit']))
	{
		$fullname   = $_POST["fullname"];
		$contact    = $_POST["contact"];
		$email      = $_POST["email"];
		$password   = md5($_POST["password"]);
		$cpassword  = md5($_POST["cpassword"]);
		$user_type  = $_POST["user_type"];

		$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

		$conn = new mysqli("localhost", "root", "", "nutrace_server");
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$select = "SELECT * FROM tbl_users WHERE email = '$email'";
		$result = mysqli_query($conn, $select);

		$select1 = "SELECT * FROM tbl_admin WHERE email = '$email'";
		$result1 = mysqli_query($conn, $select1);

		if(mysqli_num_rows($result) > 0 || mysqli_num_rows($result1) > 0) {
			$error[] = "User Already Exists!";

			if (!isset($_POST["fullname"]) || trim($_POST["fullname"]) === '') {
				$errorOne = "Full name is required";
			}
			elseif (! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
				$errorTwo = "Valid email is required";
			}
			elseif (strlen($_POST["contact"]) !== 11) {
				$errorThree = "Invalid contact number";
			}
			elseif (strlen($_POST["password"]) < 8) {
					$errorFour = "Password must be at least 8 characters";
			}
			elseif (! preg_match("/[a-z]/i", $_POST["password"])) {
				$errorFive = "Password must contain at least one letter";			
			}
			elseif (! preg_match("/[0-9]/", $_POST["password"])) {
				$errorSix = "Password must contain at least one number";
			}
			elseif ($_POST["password"] !== $_POST["cpassword"]) {
				$errorSeven = "Password must match";
			}
		}
		else {
			if ($user_type === "user") {
				$insert = "INSERT INTO tbl_users (fullname, contact, email, password, cpassword, user_type) VALUES ('$fullname','$contact','$email','$password','$cpassword','$user_type')";

				mysqli_query($conn, $insert);
				$alert = "Registered Successfully!";
				header('location:../account-form/login.php');
				exit;
			}
			elseif ($user_type === "admin") {
				$insert = "INSERT INTO tbl_admin (fullname, contact, email, password, cpassword, user_type) VALUES ('$fullname','$contact','$email','$password','$cpassword','$user_type')";

				mysqli_query($conn, $insert);
				$alert = "Registered Successfully!";
				header('location:../admin/admin_login.php');
				exit;
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
					<img src="../assets/images/main/nutrace_logo.png" width="60px" height="60px">
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
						<?php if (!empty($errorOne)): ?>
							<div class="error-msg"><?php echo $errorOne; ?></div>
						<?php endif; ?>
						<?php if (!empty($errorTwo)): ?>
							<div class="error-msg"><?php echo $errorTwo; ?></div>
						<?php endif; ?>
						<?php if (!empty($errorThree)): ?>
							<div class="error-msg"><?php echo $errorThree; ?></div>
						<?php endif; ?>
						<?php if (!empty($errorFour)): ?>
							<div class="error-msg"><?php echo $errorFour; ?></div>
						<?php endif; ?>
						<?php if (!empty($errorFive)): ?>
							<div class="error-msg"><?php echo $errorFive; ?></div>
						<?php endif; ?>
						<?php if (!empty($errorSix)): ?>
							<div class="error-msg"><?php echo $errorSix; ?></div>
						<?php endif; ?>
						<?php if (!empty($errorSeven)): ?>
							<div class="error-msg"><?php echo $errorSeven; ?></div>
						<?php endif; ?>
						<?php if (!empty($alert)): ?>
							<div class="success-msg"><?php echo $alert; ?></div>
						<?php endif; ?>
					</div>
			
					<label>Full Name:</label><br>
					<input type="text" class="input" name="fullname" id="fullname" placeholder="Your Name" required><br>
					
					<label>Contact Number:</label><br>
					<input type="text" class="input" name="contact" id="contact" placeholder="09XXXXXXXXX" required><br>
					
					<label>Email:</label><br>
					<input type="email" class="input" name="email" id="email" placeholder="juandelacruz@gmail.com" required><br>
					
					<label>Password:</label><br>
					<input type="password" class="input" name="password" id="password" placeholder="Enter your password"  minlength="8" maxlength="20" required><br>

					<label for="password_confirmation">Confirm Password:</label><br>
					<input type="password" class="input" name="cpassword" id="c password" placeholder="Confirm your password" minlength="8" maxlength="20" required><br>

					<label>Account Type:</label><br>
					<select name="user_type" class="user_type">
							<option value="default" selected>Choose an account type..</option>
							<option value="user" class="user">User</option>
							<option value="admin" class="admin">Admin</option>
					</select>
					<br>
					<input type="submit" value="PROCEED" id="submit" name="submit" class="proceedBtn">
			</form>
		</div>		
	</body>
</html>