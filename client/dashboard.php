<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NuTrace</title>
        <link rel ="stylesheet" href="../client/dashboard.css">
        <link rel="icon" type="image/png" href="../assets/images/main/nutrace_logo.png">
    </head>
    <body>
        <section id="sidebar">
            <a href="homepage.html" class="brand">
                <img class="logo-pic" src="../assets/images/main/nutrace_logo.png" width="25px" height="25px">
                <span>NuTrace</span>
            </a>
            <ul class="side-menu top">
                <li class="active">
                    <a href="./dashboard.php">
                        <img class="navbar-pic" src="../assets/images/sidebar/green/home-select.png" width="25px" height="20px">
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
            </ul>
            <ul class="side-menu">
                <li>
                    <a href="../account-form/login.php" class="logout">
            </ul>
            <ul class="side-menu">
                <li>
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
                                    <a href="../account-form/login.html"><button class="yes">YES</button></a>
                                    <a href="dashboard.php"><button class="no">NO</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </section>
    
        <section id="content">
            <nav id="profile">  
                <img id="menu-pic" src="../assets/images/sidebar/white/menu-icon.png" width="25px" height="25px">          
                <a id="user" href="#">Hello, User!</a>
            </nav>
            <main id="main-content">
                <p id="p4">Magandang Araw!</p>
                <p id="p5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco 
                    laboris nisi ut aliquip ex ea commodo consequat.</p>
                <div id="upper-content">
                    <div id="main-left">
                        <!--Weather-->
                        <div id="container">
                            <p id="title">Weather</p>
                            <div id="weather-content">
                                <div id="location">
                                    <img id="loc-img" src="../assets/images/weather/location.png" alt="" width="20px" height="20px">
                                    <p> - </p>
                                </div>
                                <div id="notification"></div>
                                <div id="weather-value">
                                    <div id="value">
                                        <p id="temperature-value">--°C</p>
                                        <p id="temperature-description">-</p>
                                    </div>
                                    <div id="weather-icon">
                                        <img src="../assets/images/weather/unknown.png" alt="">                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Today's task-->
                        <div id="text-left2">
                            <p id="title">Today's Task</p>
                            <div id="description">
                                <p>Paragraph 1. Device description. By students of PUP eme eme. Features. Why we come up to this study. Objectives.</p>
                            </div>
                        </div>
                    </div>
                    <!--Eggplant Soil Nutrient Report-->
                    <div id="main-right">
                        <p id="title">Eggplant Soil Nutrient Report</p>
                        <div id="description">
                            <p>As of <span id="datetime"></span></p>
                            <div id="variables">
                                <div>
                                    <p>Nitrogen</p>
                                </div>
                                <div>
                                    <p>Phosphorus</p>
                                </div>
                                <div>
                                    <p>Potassium</p>
                                </div>
                                <div>
                                    <p>Soil Moisture</p>
                                </div>
                                <div>
                                    <p>Temperature</p>
                                </div>
                                <div>
                                    <p>pH Level</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Progress Report of the Week-->
                <div id="lower-content">
                    <div id="text-down">
                        <p id="title">Progress Report of the Week</p>
                        <div id="description">
                            <p>Paragraph 1. Device description. By students of PUP eme eme.  
                                Features. Why we come up to this study. Objectives.</p>
                                <br><br><br><br><br><br><br><br><br>
                        </div> 
                    </div>
                </div>
            </main>
        </section>
        <script src="../js-files/weather.js"></script>
        <script src="../js-files/sidebar.js"></script>
        <script src="../js-files/realtime.js"></script>
    </body>
    <footer id="footer">
        <img id="pup-logo" src="../assets/images/main/pup-logo.png" width="50px" height="50px">
        <img id="ce-logo" src="../assets/images/main/ce-logo.png" width="50px" height="50px">
        <img id="coe-logo" src="../assets/images/main/coe-logo.png" width="50px" height="50px">
        <section id="footer-text">
            <p id="p1">Polytechnic University of the Philippines</p>                
            <p id="p2">College of Engineering</p>
            <p id="p3">Department of Computer Engineering</p>
        </section>
    </footer>
</html>