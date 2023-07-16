<?php
    require_once('../server/session.php');

    // Check if user is not logged in, redirect to login page
    if (!isset($_SESSION["fullname"])) {
        header("Location: ../sections/homepage.php");
        exit();
    }
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>About</title>
        <link rel ="stylesheet" href="../client/about.css">
        <link rel="icon" type="image/png" href="../assets/images/main/nutrace_logo.png">
    </head>
    <body> 
        <section id="content">
            <nav class="profile">            
                <img class="logo-pic" src="../assets/images/main/nutrace_logo.png" width="25px" height="25px">
                <label class="nav-title">NuTrace</label>
            </nav>
            <main class="main-content">
                <div class="buttons">
                    <a class="back-button"href="../client/dashboard.php"><button>BACK</button></a>
                </div>
                <p class="p4">About NuTrace</p>
                <p class="p5">(Tungkol sa NuTrace?)</p>
                <div id="first-content">
                    <div class="text-left">
                        <div class="title">
                            <p>NuTrace</p>
                        </div>
                        <div class="description">
                            <p class="paragraph"><b>NuTrace</b> (a compound word derived from "<i>nutrient</i>" and "<i>trace</i>") is a soil monitoring system developed by Computer 
                                Engineering students from the Polytechnic University of the Philippines as a partial fulfillment for their 
                                Design Project. NuTrace mainly focuses on providing a proactive solution to improve farm practices by enhancing 
                                the soil with the use of soil nutrient monitoring devices, namely the NPK sensor, pH level sensor, soil moisture 
                                sensor, and soil temperature sensor. These sensors generate data that is sent to a website application.</p>
                            <br>
                            <p class="paragraph">The <b>NuTrace Soil Nutrient Monitoring System</b> also includes a website application with different pages, including 
                                a dashboard, inventory, task scheduler, and its main feature, the soil nutrient monitoring page. This page allows 
                                farmers to view real-time soil nutrient levels gathered by the sensors. The system aims to introduce a digital 
                                farming method through the use of technology.</p>
                        </div>
                    </div>
                    <div class="img-right">
                        <img class="prototype" src="../assets/images/main/3d-prototype.png" width="370px" height="470px">
                    </div>
                </div>
                <div class="second-content">
                        <div class="title-team">
                            <p>NuTrace Team</p>
                        </div>
                        <div class="row">
                        <div class="dev-pic1">
                            <img src="../assets/images/main/delprado.jpg" width="180px" height="180px">
                        </div>
                        <div class="dev-content1">
                            <a href="https://www.facebook.com/kreasemdp" class="name">Kris Anne M. Del Prado</a>
                            <p class="email"><i>Computer Engineering Student, PUP-Manila</i></p><br>
                            <p class="email">krisannedelprado@gmail.com</p>
                            <p class="contact-num">+639451322540</p>
                        </div>
                        <div class="dev-pic2">
                            <img src="../assets/images/main/dioso.png" width="180px" height="180px">
                        </div>
                        <div class="dev-content1">
                            <a href="https://www.facebok.com/dianneyvory" class="name">Dianne Yvory E. Dioso</a>
                            <p class="email"><i>Computer Engineering Student, PUP-Manila</i></p><br>
                            <p class="email">dianneyvorydioso@gmail.com</p>
                            <p class="contact-num">+639454667320</p>
                        </div>
                    </div>
                    <div class="row">
                    <div class="dev-pic1">
                            <img src="../assets/images/main/goyena.jpg" width="180px" height="180px">
                        </div>
                        <div class="dev-content2">
                            <a href="https://www.facebook.com/crlmrgrt" class="name">Carla Margarita M. Goyena</a>
                            <p class="email"><i>Computer Engineering Student, PUP-Manila</i></p><br>
                            <p class="email">carlagoyena@gmail.com</p>
                            <p class="contact-num">+639758839038</p>
                        </div>
                        <div class="dev-pic2">
                            <img src="../assets/images/main/llido.jpg" width="180px" height="180px">
                        </div>
                        <div class="dev-content2">
                            <a href="https://www.facebook.com/queenniemariellido" class="name">Queennie Marie S. Llido</a>
                            <p class="email"><i>Computer Engineering Student, PUP-Manila</i></p><br>
                            <p class="email">llidomariequeennie@gmail.com</p>
                            <p class="contact-num">+639276841308</p>
                        </div>
                    </div>
                </div>
            </main>
        </section>
        <script src="../js-files/sidebar.js"></script>
    </body>
    <footer id="footer">
        <img class="pup-logo" src="../assets/images/main/pup-logo.png" width="50px" height="50px">
        <img class="ce-logo" src="../assets/images/main/ce-logo.png" width="50px" height="50px">
        <img class="coe-logo" src="../assets/images/main/coe-logo.png" width="50px" height="50px">
        <section class="footer-text">
            <p class="p1">Polytechnic University of the Philippines</p>                
            <p class="p2">College of Engineering</p>
            <p class="p3">Department of Computer Engineering</p>
        </section>
    </footer>
</html>