<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NuTrace</title>
        <link rel ="stylesheet" href="../client/how-to.css">
        <link rel="icon" type="image/png" href="../assets/images/main/nutrace_logo.png">
    </head>
    <body>
        <section id="sidebar">
            <a href="homepage.php" class="brand">
                <img class="logo-pic" src="../assets/images/main/nutrace_logo.png" width="25px" height="25px">
                <span>NuTrace</span>
            </a>
            <ul class="side-menu top">
                <li>
                    <a href="./dashboard.php">
                        <img class="navbar-pic" src="../assets/images/sidebar/white/home-icon.png" width="25px" height="20px">
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="./soilnutrient.php">
                        <img class="navbar-pic" src="../assets/images/sidebar/white/soil-icon.png" width="25px" height="25px">
                        <span class="text">Soil Nutrient</span>
                    </a>
                </li>
                <li>
                    <a href="./inventory.php">
                        <img class="navbar-pic" src="../assets/images/sidebar/white/record-icon.png" width="25px" height="25px">
                        <span class="text">Inventory</span>
                    </a>
                </li>
                <li>
                    <a href="./scheduler.php" id="onlink">
                        <img class="navbar-pic" src="../assets/images/sidebar/white/sched-icon.png" width="25px" height="25px">
                        <span class="text">Scheduler</span>
                    </a>
                </li>
                <li class="active">
                    <a href="../client/how-to.php">
                        <img class="navbar-pic" src="../assets/images/sidebar/green/how-to-select.png" width="25px" height="25px">
                        <span class="text">Learn More</span>
                    </a>
                </li>
            </ul>
            <ul class="side-menu">
                <li>
                    <a href=" " class="logout">
                        <div class="box">
                            <img class="navbar-pic" src="../assets/images/sidebar/white/logout-icon.png" width="25px" height="25px">
                            <a href="#logout" class="button"><span class="logout-text">Logout</span></a>
                        </div>
                        <div class="modal-overlay" id="logout">
                            <div class="modal-wrapper"> 
                                <h2>Are you sure you want to log out?</h2>
                                <h3>(Sigurado ka ba na nais mong umalis dito?)</h3>
                                <div class="content">
                                    <div class="buttons">
                                        <a href="../account-form/login.php"><button class="yes">YES</button></a>
                                        <a href="../client/how-to.php"><button class="no">NO</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </section>

        <section id="content">
            <nav class="profile">      
                <img class="menu-pic" src="../assets/images/sidebar/white/menu-icon.png" width="25px" height="25px">      
                <a class="user" href="#">Hello, <?php echo $_SESSION["fullname"]; ?>!</a>
                <a href="../sections/about.php" class="about-div">
                    <button class="about-btn" onmouseover="showPopup()" onmouseout="hidePopup()">
                        <img src="../assets/images/sidebar/white/about-icon.png" width="25px" height="25px">
                    </button>
                </a>
                <div id="popup">
                    <p>About Us</p>
                </div>          
                <style>
                    #popup {                        
                        right: 0;
                        padding: 5px;
                        margin-right: 70px;
                        border-radius: 3px;
                        font-family: 'Poppins-Bold';
                        display: none;
                        position: absolute;
                        background: #f1f1f1;
                    }
                    #popup::before {
                        content: "";
                        position: absolute;
                        top: 0;
                        right: -15px;
                        width: 0;
                        height: 0;
                        border-top: 14px solid transparent;
                        border-bottom: 20px solid transparent;
                        border-left: 16px solid #f1f1f1; /* Adjust the color if needed */
                    }
                </style>
                <script>
                    function showPopup() {
                        var popup = document.getElementById('popup');
                        popup.style.display = 'block';
                    }

                    function hidePopup() {
                        var popup = document.getElementById('popup');
                        popup.style.display = 'none';
                    }
                </script>
            </nav>
            <main class="main-content">
                <p class="p4">How to use the NuTrace device?</p>
                <p class="p5">(Paaano gamitin ang NuTrace?)</p>
                
                <div class="ac">
                    <input class="ac-input" id="ac-1" name="ac-1" type="checkbox" />
                    <label class="ac-label" for="ac-1">DEVICE</label>
                    
                    <article class="ac-text">
                        <div class="ac-sub">
                            <input class="ac-input" id="ac-2" name="ac-2" type="checkbox" />
                                <p class="paragraph">1. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <p class="paragraph">2. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </article>
                </div>
                  
                <div class="ac">
                    <input class="ac-input" id="ac-3" name="ac-3" type="checkbox" />
                    <label class="ac-label" for="ac-3">WEBSITE</label>
                      
                    <article class="ac-text">
                        <div class="ac-sub">
                            <input class="ac-input" id="ac-4" name="ac-4" type="checkbox" />
                              <p class="paragraph">1. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                              <p class="paragraph">2. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                              <p class="paragraph">3. Pellentesque eu tincidunt tortor aliquam nulla. Molestie a iaculis at erat pellentesque adipiscing commodo elit at.</p>
                              <p class="paragraph">4. Nibh tellus molestie nunc non. Et tortor consequat id porta nibh venenatis cras sed felis. Rhoncus mattis rhoncus urna neque viverra justo nec. </p>
                              <p class="paragraph">5. Fermentum leo vel orci porta non pulvinar neque. Eget dolor morbi non arcu.</p>
                        </div>
                    </article>
                </div>
      
                <div class="ac">
                    <input class="ac-input" id="ac-5" name="ac-5" type="checkbox" />
                    <label class="ac-label" for="ac-5">SOIL NUTRIENT SENSOR</label>
                      
                    <article class="ac-text">
                        <div class="ac-sub">
                            <input class="ac-input" id="ac-6" name="ac-6" type="checkbox" />
                              <p class="paragraph">1. In fermentum et sollicitudin ac orci phasellus egestas.</p>
                              <p class="paragraph">2. Diam vulputate ut pharetra sit amet aliquam id diam maecenas.</p>
                        </div>
                    </article>
                </div>
      
                <div class="ac">
                    <input class="ac-input" id="ac-7" name="ac-7" type="checkbox" />
                    <label class="ac-label" for="ac-7">OTHERS</label>
                      
                    <article class="ac-text">
                        <div class="ac-sub">
                            <input class="ac-input" id="ac-8" name="ac-8" type="checkbox" />
                              <p class="paragraph">1. A diam maecenas sed enim ut sem viverra aliquet eget. Scelerisque eleifend donec pretium vulputate sapien nec sagittis aliquam malesuada.</p>
                              <p class="paragraph">2. Massa eget egestas purus viverra accumsan in nisl nisi scelerisque. Tortor consequat id porta nibh venenatis cras sed. </p>
                              <p class="paragraph">3. Ut enim blandit volutpat maecenas. Pulvinar neque laoreet suspendisse interdum.</p>
                        </div>
                    </article>
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