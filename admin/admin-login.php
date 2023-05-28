<?php

    if(isset($_POST['submit']))
    {
		$conn = new mysqli('localhost','root','', 'nutrace_server');

        // $fullname   = $_POST["fullname"];
		// $contact    = $_POST["contact"];
		$email      = $_POST["email"];
		$password   = md5($_POST["password"]);
		// $cpassword	= md5($_POST["cpassword"]);
		// $user_type	= $_POST["user_type"];

		$select  = "SELECT * FROM tbl_users WHERE email = '$email' && password ='$password' ";
		$result 	= mysqli_query($conn,$select);

		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_array($result);

            if($row["user_type"] === 'admin'){
                $_SESSION['admin_name'] = $row["fullname"];
                header('location:admin_dashboard.php');
            }
            elseif($row["user_type"] === 'user'){
                $_SESSION["user_name"] = $row["fullname"];
                header('location:dashboard.php');
            }
		}else{
            $error[]    = 'Incorrect email or password!!';
        }
	}
?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>NuTrace</title>
		<link rel="stylesheet" type="text/css" href="../admin/admin-login.css">
		<link rel="icon" type="image/png" href="../assets/images/main/nutrace_logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>
    <body>
        <div class="container">
        <div class="back">
                <a href="../account-form/account.php"><i class="fa-sharp fa-solid fa-chevron-left fa-sm" style="color: #25a22b;"></i> Back </a>
            </div>
			<div class="login">
				<div class="logo-title">
					<img src="../assets/images/main/nutrace_logo.png" width="60px" height="60px">
                    <h3>NuTrace</h3>
                </div> 
				<hr class="rounded">
                <p class="greet"> Welcome Back, Admin!</p>
			</div>
            <form class="form" method="post">
                <div class="error">
						<?php
						if(isset($error)){
							foreach($error as $error){
								echo '<span class="error-msg">'.$error.'</span>';
							};
						}
						?>
				</div>
                <label class="tb-title">Email:</label><br>
				<input type="email" class="input" name="email" placeholder="juandelacruz@gmail.com" required><br>
				<label class="tb-title">Password:</label><br>
				<input type="password" class="input" id="showPass" name="password" placeholder="********"  maxlength="20" required>
			    <input type="checkbox" onclick="showPassword()">
                <script>
                    function showPassword() {
                        var show = document.getElementById("showPass");
                        if (show.type === "password") {
                            show.type = "text";
                        }
                        else {
                            show.type = "password";
                        }
                    }
                </script>
                <label class="displayPass">Show Password &nbsp;</label>
                <br>
                <input type="submit" value="LOGIN" name="submit" class="submitBtn">
                <p class="p3">No account? <a href="../account-form/signup.php">Sign up here</a></p><br>
                
            </form>
		</div>
    </body>
</html> 