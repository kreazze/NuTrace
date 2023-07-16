<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Forgot Password</title>
        <link rel="stylesheet" type="text/css" href="../forgotPassword/pass_style.css">
        <link rel="icon" type="image/png" href="../assets/images/main/nutrace_logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>
    <body>
        <!-- code verification -->
        <div class="overlay" id="codeVerify">
            <div class="wrapper" style="width: 500px;"> 
                <a class="close" href="../forgotPassword/forgot_pass.php">&times;</a>
                <h4>Code Verification</h4>
                <div class="content">
                    <div class="popup-container">
                        <form class="add-pop" onSubmit="closeForm(event)" method="POST">
                            <p class="error-msg">We’ve sent an OTP on your email <br> (Nagpadala kami ng OTP sa iyong email)</p>
                            <input class="email-text" placeholder="Enter OTP code" type="tel" name="contact_num" required>
                            <a href="../forgotPassword/new-password.php"><button type="submit" class="submit" name="submit">SUBMIT</button>
                        </form>
                        <script>
                            function closeForm(event) {
                                event.preventDefault();
                                document.getElementById('codeVerify').style.display = 'none';
                                window.location.href = "../admin/admin_login.php";
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
