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
			
			<form class="form" action="../server/insertUser.php" name="form" method="post">
					<label>Full Name:</label><br>
					<input type="text" class="input" name="fullname" id="fullname" placeholder="Your Name" required><br>
					
					<label>Contact Number:</label><br>
					<input type="text" class="input" name="contact" id="contact" placeholder="09XXXXXXXXX" required><br>
					
					<label>Email:</label><br>
					<input type="email" class="input" name="email" id="email" placeholder="juandelacruz@gmail.com" required><br>
					
					<label>Password:</label><br>
					<input type="password" class="input" name="password" id="password" placeholder="********"  maxlength="20" required><br>
					
					<input type="submit" value="PROCEED" id="submit" name="proceedBtn" class="proceedBtn">
			</form>
		</div>		
	</body>
</html>