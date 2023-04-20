<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Register in NuTrace</title>
		<link rel="stylesheet" type="text/css" href="../account-form/login.css">
		<link rel="icon" type="image/png" href="../assets/images/main/nutrace_logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>
    <body>
        <div class="container">
        <div class="back">
                <a href="#"><i class="fa-sharp fa-solid fa-chevron-left fa-sm" style="color: #25a22b;"></i> Back </a>
            </div>
			<div class="login">
				<div class="logo-title">
					<img src="../assets/images/main/nutrace_logo.png" width="60px" height="60px">
                    <h3>NuTrace</h3>
                </div> 
				<hr class="rounded">
			</div>
            <form class="form" action="#" method="post">
                <label>Email:</label><br>
				<input type="email" class="input" name="email" placeholder="juandelacruz@gmail.com" required><br>
				<label>Password:</label><br>
				<input type="password" class="input" name="password" placeholder="********"  maxlength="20" required><br>
                <!-- 
                <p class="p1"><u><a href="#" onclick="openforgotPass()">Forgot Password</u></p></a>
                <p class="p2">Nakalimutan ang password</p>
                -->
			</form>
            <div class="checkPass">
                <label>Show Password &nbsp;</label>
                <input type="checkbox" onclick="showPassword()">
            </div>
            <script>
                function showPassword() {
                    var show = document.getElementById('showPass');
                    if (show.type == 'password') {
                        show.type = 'text';
                    }
                    else {
                        show.type = 'password';
                    }
                }
            </script>
            <div>
                <input type="submit" value="LOGIN" class="submitBtn">
                <p class="p3">No account? <a href="../account-form/signup.html">Sign up here</a></p><br>
			</div>
			<div class="form">
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