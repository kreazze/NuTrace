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
        <!-- forgot password -->
        <div class="overlay" id="forgotPass">
            <div class="wrapper" style="width: 500px;">
                <a class="close" href="../admin/admin_login.php">&times;</a>
                <h4>Forgot Password</h4>
                <h6>(Nakalimutan ang password)</h6>
                <div class="content">
                    <div class="popup-container">
                        <form action="forgot_pass.php" method="POST" class="add-pop">
                            <input class="email-text" placeholder="Enter your email address" type="email" name="email" required>
                            <a href="../forgotPassword/new-password.php"><button type="submit" class="continue" name="continue">CONTINUE</button></a>
                            <a href="../admin/admin_login.php"><button class="cancel">CANCEL</button></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
            if (isset($_POST['continue'])) {
                $email = $_POST['email'];

                $token = bin2hex(random_bytes(16));
                $token_hash = hash("sha256", $token);
                $expiry = date("Y-m-d H:i:s", time() + 60 * 30);
                $conn = require __DIR__."/../server/connect.php";
                    
                $sql = "UPDATE tbl_users SET reset_token_hash = ?, reset_token_expires_at = ? WHERE email = ?";
                $stmt= $conn->prepare($sql);
                $stmt->bind_param("sss", $token_hash, $expiry, $email);
                $stmt->execute();

                if ($conn->affected_rows) {
                    $mail = require __DIR__ . "/../forgotPassword/mailer.php";

                    $mail->setFrom("duranfarm.nutrace@gmail.com");
                    $mail->addAddress($email);
                    $mail->Subject = "Password Reset";
                    $mail->Body = <<<END
                    Click <a href="https://nutrace.website/forgotPassword/new-password.php?token=$token">here</a> to reset your password.
                    END;
                
                    try {
                        $mail->send();
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
                    }
                }
                echo "Message sent, please check your inbox.";

                $_SESSION['alert'] = 'Please wait for an OTP code sent to your phone';
                echo "<script>if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }</script>";
                echo "<script>window.location.href = '../admin/admin_login.php';</script>";
                exit; // Optional: to stop executing the rest of the code
            }
        ?>
    </body>
</html>
