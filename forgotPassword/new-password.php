<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Reset Password</title>
        <link rel="stylesheet" type="text/css" href="../forgotPassword/pass_style.css">
        <link rel="icon" type="image/png" href="../assets/images/main/nutrace_logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>
    <body>
        <!-- code verification -->
        <div class="overlay" id="newPass">
            <div class="wrapper" style="width: 500px;"> 
                <a class="close" href="../forgotPassword/forgot_pass.php">&times;</a>
                <h4>Forgot Password</h4>
                <div class="content">
                    <div class="popup-container">
                        <form action="reset-password.php" method="POST" class="add-pop" onSubmit="closeForm(event)">
                            <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
                            <input class="email-text" placeholder="New password" type="password" name="new_pass" required>
                            <input class="email-text" placeholder="Confirm new password" type="password" name="new_pass" required>
                            <a href="../forgotPassword/new_pass.php"><button type="submit" class="change" name="change">CHANGE</button>
                        </form>
                        <script>
                            function closeForm(event) {
                                event.preventDefault();
                                document.getElementById('newPass').style.display = 'none';
                                window.location.href = "../admin/admin_login.php";
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <?php
            $token = $_GET["token"];
            $token_hash = hash("sha256", $token);
            $conn = require __DIR__."/../server/connect.php";

            $sql = "SELECT * FROM tbl_users WHERE reset_token_hash = ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("s", $token_hash);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            if ($user === null) {
                die("token not found");
            }

            if (strtotime($user["reset_token_expires_at"]) <= time()) {
                die("token has expired");
            }
        ?>
    </body>
</html>
