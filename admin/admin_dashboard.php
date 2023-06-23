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
        <title>NuTrace</title>
        <link rel ="stylesheet" href="../admin/admin_dashboard.css">
        <link rel="icon" type="image/png" href="../assets/images/main/nutrace_logo.png">
    </head>
    <body>
        <section id="sidebar">
            <a href="../sections/homepage.php" class="brand">
                <img class="logo-pic" src="../assets/images/main/nutrace_logo.png" width="25px" height="25px">
                <span>NuTrace</span>
            </a>
            <ul class="side-menu top">
                <li class="active">
                    <a href="../admin/admin_dashboard.php">
                        <img class="navbar-pic" src="../assets/images/sidebar/green/home-select.png" width="25px" height="20px">
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="../admin/admin_soilnutrient.php">
                        <img class="navbar-pic" src="../assets/images/sidebar/white/soil-icon.png" width="25px" height="25px">
                        <span class="text">Soil Nutrient</span>
                    </a>
                </li>
                <li>
                    <a href="../admin/admin_inventory.php">
                        <img class="navbar-pic" src="../assets/images/sidebar/white/record-icon.png" width="25px" height="25px">
                        <span class="text">Inventory</span>
                    </a>
                </li>
                <li>
                    <a href="../admin/admin_scheduler.php" id="onlink">
                        <img class="navbar-pic" src="../assets/images/sidebar/white/sched-icon.png" width="25px" height="25px">
                        <span class="text">Scheduler</span>
                    </a>
                </li>
                <li>
                    <a href="../admin/admin_how-to.php">
                        <img class="navbar-pic" src="../assets/images/sidebar/white/how-to-icon.png" width="25px" height="25px">
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
                                <div name="button" class="buttons">
                                    <a href="../server/logout.php"><button class="yes">YES</button></a>
                                    <a href="../admin/admin_dashboard.php"><button class="no">NO</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </section>
    
        <section id="content">
            <nav class="profile">      
                <img class="menu-pic" src="../assets/images/sidebar/white/menu-icon.png" width="25px" height="25px">      
                <a class="user" href="#">Hello, Admin <?php echo $_SESSION["fullname"]; ?>!</a>
                <a href="../admin/admin_about.php" class="about-div">
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
            <main id="main-content">
                <p id="p4">Magandang Araw!</p>
                <p id="p5"> Welcome to NuTrace, where innovation meets sustainable agriculture. This website is officially 
                            managed by Duran Farm located in San Idelfonso, Bulacan. NuTrace provided an integrated platform 
                            that combines advanced soil monitoring technology with comprehensive farm management tools to help 
                            farms go beyond their production capability.</p>
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
                            <div id="description-task">
                                <div id="section-task">
                                    <table>
                                        <thead>
                                            <tr>
                                            <th>Task</th>
                                            <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <td id="task">Maglagay ng fertilizer</td>
                                            <td class="status completed">Completed</td>
                                            </tr>
                                            <tr>
                                            <td id="task">Umani ng okra</td>
                                            <td class="status pending">Pending</td>
                                            </tr>
                                            <tr>
                                            <td id="task">Training registration</td>
                                            <td class="status pending">Pending</td>
                                            </tr>
                                            <tr>
                                            <td id="task">Magbungkal ng lupa</td>
                                            <td class="status completed">Completed</td>
                                            </tr>
                                            <tr>
                                            <td id="task">Compute plan production</td>
                                            <td class="status completed">Completed</td>
                                            </tr>
                                            <tr>
                                            <td id="task">Put fertilizer</td>
                                            <td class="status pending">Pending</td>
                                            </tr>
                                            <tr>
                                            <td id="task">Eggplant soil monitoring</td>
                                            <td class="status completed">Completed</td>
                                            </tr>
                                            <tr>
                                            <td id="task">Harvest</td>
                                            <td class="status completed">Completed</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <!--Eggplant Soil Nutrient Report-->
                    <div id="main-right">
                        <p id="title">Eggplant Soil Nutrient Report</p>
                        <div id="description-soil">
                            <p class="datetime">As of <span id="datetime"></span></p>
                            <div id="variables">
                                <div class="nut-divider">
                                    <p>Nitrogen</p>
                                    <progress class="prog1" value="50" max="100"></progress>
                                </div>
                                <div class="nut-divider">
                                    <p>Phosphorus</p>
                                    <progress class="prog2" value="20" max="100"></progress>
                                </div>
                                <div class="nut-divider">
                                    <p>Potassium</p>
                                    <progress class="prog3" value="30" max="100"></progress>
                                </div>
                                <div class="nut-divider">
                                    <p>Soil Moisture</p>
                                    <progress class="prog4" value="80" max="100"></progress>
                                </div>
                                <div class="nut-divider">
                                    <p>Temperature</p>
                                    <progress class="prog5" value="60" max="100"></progress>
                                </div>
                                <div class="nut-divider">
                                    <p>pH Level</p>
                                    <progress class="prog6" value="70" max="100"></progress>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Progress Report of the Week-->
                <div id="lower-content">
                    <div id="text-down">
                        <p id="title">Progress Report of the Week</p>
                        <div id="description-progress">
                            <div class="bar-graph">
                                <div class="bar" style="height: 120px;">
                                    <div class="indicator">Talong</div>
                                </div>
                                <div class="bar" style="height: 80px;">
                                    <div class="indicator">Okra</div>
                                </div>
                                <div class="bar" style="height: 160px;">
                                    <div class="indicator">Patola</div>
                                </div>
                                <div class="bar" style="height: 40px;">
                                    <div class="indicator">Mais</div>
                                </div>
                                <div class="bar" style="height: 40px;">
                                    <div class="indicator">Kamatis</div>
                                </div>
                                <div class="bar" style="height: 40px;">
                                    <div class="indicator">Crop-B</div>
                                </div>
                                <div class="bar" style="height: 40px;">
                                    <div class="indicator">Crop-C</div>
                                </div>
                                <!-- Add more bars as needed -->
                            </div>
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