<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Register in NuTrace</title>
		<link rel="stylesheet" type="text/css" href="../account-form/login.css">
		<link rel="icon" type="image/png" href="../assets/images/main/nutrace_logo.png">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,600;1,900&display=swap" rel="stylesheet">
		<!--Font Awesome Bootstrap-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>
    <body>
        <div class="container">
            <div class="back">
                <a href="account.html"><i class="fa-sharp fa-solid fa-chevron-left fa-sm" style="color: #25a22b;"></i> Back </a>
            </div>
			<div class="login">
				<div class="logo">
					<img src="../assets/images/main/nutrace_logo.png" width="80px" height="80px">
				</div>
				<h3> NuTrace </h3>
				<hr class="rounded">
				<h6 class="loginTitle">Login</h6>
			</div>
			
			<div class="form">
				<form action="#" method="post">
					<label>Email:</label><br>
					<input type="email" class="input" name="email" placeholder="juandelacruz@gmail.com" required><br>
					<label>Password:</label><br>
					<input type="password" class="input" name="password" placeholder="********"  maxlength="20" required><br>
                    <!-- <p class="p1"><u><a href="#" onclick="openforgotPass()">Forgot Password</u></p></a>
                    <p class="p2">Nakalimutan ang password</p> -->
                    <input type="submit" value="Log in" class="submitBtn">
                    <!-- <p class="p3">No account? <a href="../pages/signup.html">Sign up here</a></p><br> -->
				</form>
                <?php
                    // if (isset($_POST['email']) && isset($_POST['password'])){
                    //     function validate($data){
                    //         $data = trim($data);
                    //         $data = stripslashes($data);
                    //         $data = htmlspecialchars($data);
                    //         return $data;
                    //     }
                    //     $email      = validate($_POST['email']);
                    //     $password   = validate($_POST['password']);

                    //     if (empty($email)){
                    //         header("Location: login.php?error=Email is required.");
                    //         exit();
                    //     }
                    //     else if(empty($password)){
                    //         header("Location: login.php?error=Password is required.");
                    //         exit();
                    //     }
                    //     else{
                    //         echo 'Valid input';
                    //     }
                    // }
                    // else{
                    //     header("Location: login.php");
                    //     exit();
                    // }
                ?>
			</div>
            <!--For Popup-->
            <div class="forgotPass" id="forgotPass">
                <h3>Forgot Password</h3>
                <p>(Nakalimutan ang password)</p>
                <br>
                <p class="popup">Enter your contact number</p>
                <input type="text" name="contact" placeholder="09XXXXXXXXX" required><br>
                <button class="continueBtn" onclick="closeforgotPass()">Continue</button>
            </div>
		</div>		
    </body>
    <script>
        let forgotPass = document.getElementById("forgotPass");

        function openforgotPass()
        {
            forgotPass.classList.add("open-forgotPass");
        }
        function closeforgotPass()
        {
            forgotPass.classList.remove("open-forgotPass");
        }
    </script>
</html> 