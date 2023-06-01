<?php
    session_start();

    if (isset($_POST['submit'])) {
        $email = $_POST["email"];
        $password = md5($_POST["password"]);
        $fullname = $_POST["fullname"];

        $conn = new mysqli("localhost", "root", "", "nutrace_server");
        $email = $conn->real_escape_string($email); // Sanitize the email input

        $select = "SELECT * FROM tbl_admin WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($select);

        $select1 = "SELECT * FROM tbl_admin WHERE email = '$email'";
		$result1 = mysqli_query($conn, $select1);

        if ($result1->num_rows > 0) {
            $row = $result1->fetch_assoc();
            $_SESSION["email"] = $row["email"];
            $_SESSION["fullname"] = $row["fullname"];
            header('Location: http://localhost/NuTrace/admin/admin_dashboard.php');
            exit();
        }   else if ($result1 == $result) {
            $errorAccount = "The email you entered is an User account!";
        } 
        else {
            $error = "Incorrect email or password!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>NuTrace</title>
		<link rel="stylesheet" type="text/css" href="../admin/admin_login.css">
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
            <form action="admin_login.php" class="form" method="post">
                <div class="error">
                    <?php if (!empty($error)): ?>
                        <div class="error-msg"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <?php if (!empty($errorAccount)): ?>
                        <div class="error-msg"><?php echo $errorAccount; ?></div>
                    <?php endif; ?>
                </div>
                <label class="tb-title">Email:</label><br>
				<input type="email" class="input" name="email" placeholder="juandelacruz@gmail.com" required><br>
				
                <label class="tb-title">Password:</label><br>
				<input type="password" class="input" id="pass" name="password" placeholder="********"  maxlength="20" required>
			    
                <input type="checkbox" onclick="showPassword()">
                <script>
                    function showPassword() {
                        var show = document.getElementById("pass");
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