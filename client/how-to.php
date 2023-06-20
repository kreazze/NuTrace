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
            <a href="../sections/homepage.php" class="brand">
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
                <a href="../client/about.php" class="about-div">
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
                <p class="p4">NUTRACE</p>
                <p class="p5">MANUAL AND INFORMATION GUIDE</p>
                
                <div class="ac">
                    <input class="ac-input" id="ac-1" name="ac-1" type="checkbox" />
                    <label class="ac-label" for="ac-1">KEY INFORMATION</label>
                    
                    <article class="ac-text">
                        <div class="ac-sub">
                            <input class="ac-input" id="ac-2" name="ac-2" type="checkbox" />
                                <p class="paragraph"><b>NuTrace</b> is a 2-in-1 device and system that can be utilize for farm management:</p>
                                <p class="paragraph">1. It has a developed online system for managing the farm data such as inventory and scheduler for crop production and harvest.</p>
                                <p class="paragraph">2. It offers a soil nutrient monitoring system capable of accurately determining the nutrient and variable levels present in the loam soil utilized for cultivating eggplants.</p>
                                <p class="indented-paragraph">The following are the elements that are being monitored by NuTrace:</p>
                                <p class="indented-paragraph">- <b>Soil Nutrients</b>: <i>Nitrogen (N)</i>, <i>Phosphorus (P)</i>, and <i>Potassium (K)</i></p>
                                <p class="indented-paragraph">- <b>Soil Temperature</b></p>
                                <p class="indented-paragraph">- <b>Soil Moisture</b></p>
                                <p class="indented-paragraph">- <b>pH Level</b></p>
                        </div>
                    </article>
                </div>
                  
                <div class="ac">
                    <input class="ac-input" id="ac-3" name="ac-3" type="checkbox" />
                    <label class="ac-label" for="ac-3">NUTRACE WEBSITE</label>
                      
                    <article class="ac-text">
                        <div class="ac-sub">
                            <input class="ac-input" id="ac-4" name="ac-4" type="checkbox" />
                            <p class="paragraph">The NuTrace website has both <u><b>USER</b></u> and <u><b>ADMIN</b></u> account type.</p>
                            <p class="paragraph"><b>NOTE</b>: Farmer and other staff can only create their account as USER, while an authorized personnel is allowed to create an acccount as ADMIN.</p>

                            <p class="paragraph">To create a <u>USER</u> account:</p>
                            <div class="website-paragraph">
                                <p class="paragraph">1. Go to https://www.sitename.com</p>
                                <p class="paragraph">2. Click the <i>"REGISTER"</i> button, then fill up the details needed.</p>
                                <p class="paragraph">3. Choose the User as the account type, and you will be automatically redirected to the USER login page.</p>
                                <p class="paragraph">4. Login with your details, then click <i>"Submit"</i>.</p>
                            </div>

                            <p class="paragraph">To create an <u>ADMIN</u> account:</p>
                            <div class="website-paragraph">
                                <p class="paragraph">1. Go to https://www.sitename.com</p>
                                <p class="paragraph">2. Click the <i>"REGISTER"</i> button, then fill up the details needed.</p>
                                <p class="paragraph">3. Choose the User as the account type, and you will be automatically redirected to the ADMIN login page.</p>
                                <p class="paragraph">4. Login with your details, then click <i>"Submit"</i>.</p>
                            </div>  

                            <p class="paragraph">Content of NuTrace Website:</p>
                            <div class="website-paragraph">
                                <p class="paragraph">• <b>Dashboard</b> - Realtime weather, soil nutrient monitoring, today's task, & progress report</p>
                                <p class="paragraph">• <b>Soil Nutrient</b> - Detailed monitoring of soil nutrients </p>
                                <p class="paragraph">• <b>Inventory</b> - Database for crop harvest</p>
                                <p class="paragraph">• <b>Scheduler</b> - Utilization of calendar for reminding of the crop production.</p>
                            </div>            
                            <p class="paragraph"><b>NOTE</b>: All created accounts should be kept confidential and remembered thorougly by its users/admin.</p>            
                        </div>
                    </article>
                </div>
      
                <div class="ac">
                    <input class="ac-input" id="ac-5" name="ac-5" type="checkbox" />
                    <label class="ac-label" for="ac-5">KIOSK DEVICE</label>
                      
                    <article class="ac-text">
                        <div class="ac-sub">
                            <input class="ac-input" id="ac-6" name="ac-6" type="checkbox" />
                            <div class="sensor-content">
                                <h1>KEY DESCRIPTION</h1>
                                <img src="../assets/images/main/key-description.png" width="720px" height="630px">
                                <table class="sensor-table">
                                    <thead>
                                        <tr>
                                            <th>NuTrace Sensors</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="sensors">NPK + pH Sensor <img class="sensors" src="../assets/images/main/npk_ph-sensor.png" width="200px" height="200px"></td>
                                            <td>This sensor conduct all the soil nutrients (NPK) and the pH level of the water in the loam soil.</td>
                                        </tr>
                                        <tr>
                                            <td class="sensors">Soil Temperature Sensor <img class="sensors" src="../assets/images/main/temp-sensor.png" width="200px" height="200px"></td>
                                            <td>Monitors soil temperature of the loam soil.</td>
                                        </tr>
                                        <tr>
                                            <td class="sensors">Soil Moisture Sensor <img class="sensors" src="../assets/images/main/moisture-sensor.png" width="200px" height="200px"></td>
                                            <td>Detects soil moisture particles in the soii.</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p class="paragraph">*All sensors are powered by a microntroller called "<b>ESP32</b>".</p>
                            </div>
                    </article>
                </div>
      
                <div class="ac">
                    <input class="ac-input" id="ac-7" name="ac-7" type="checkbox" />
                    <label class="ac-label" for="ac-7">AGREEMENT</label>
                      
                    <article class="ac-text">
                        <div class="ac-sub">
                            <input class="ac-input" id="ac-8" name="ac-8" type="checkbox" />
                                <div class="logos">
                                    <img src="../assets/images/main/pup-logo.png" width="100px" height="100px">
                                    <img src="../assets/images/main/nutrace_logo.png" width="100px" height="100px">
                                    <img src="../assets/images/main/duranfarm-logo.png" width="100px" height="100px">
                                </div>
                                <div id="agreement-paragraph1">
                                    <p class="agreement-paragraph"><b>Polytechnic University of the Philippines</b></p>
                                    <p class="agreement-paragraph">A. Mabini Campus, Anonas Street, Sta. Mesa, Manila, Philippines</p>
                                    <p class="agreement-paragraph">Hereinafter referred to as "<b>PUP</b>"</p>
                                </div>
                                <div id="agreement-paragraph1">
                                    <p class="agreement-paragraph"><b>Duran Farm</b></p>
                                    <p class="agreement-paragraph">2XRR+FCX, Salupungan-Basuit Road, San Idelfonso, Bulacan</p>
                                    <p class="agreement-paragraph">Hereinafter referred to as "<b>Duran Farm</b>"</p>
                                </div>
                                <div id="agreement-paragraph2">
                                    <p class="agreement-paragraph">- Collectively referred to as "<b>the Parties</b>" -</p>
                                </div>
                                <p class="paragraph">Hereby, the established MOA between the PUP and Duran Farm concludes 
                                    the deployment of the research study for business sustainability title <b>NuTrace: 
                                    A Soil Nutrient Monitoring Device/System for Eggplant (Solanum Melongena).</b></p>
                                <p class="paragraph">The Research Study aims to innovate farming through the use of digitized 
                                    farm management tool system and monitoring device that utilizes Internet-of-Things (IoT) 
                                    and cloud-based data for monitoring and tracking farm data. This enables Duran Farm to adapt 
                                    technological tools for managing their crops and productivity in an innovative way.</p>
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