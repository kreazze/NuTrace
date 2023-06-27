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
        <link rel ="stylesheet" href="../client/dashboard.css">
        <link rel="icon" type="image/png" href="../assets/images/main/nutrace_logo.png">
        <!-- Add Firebase SDK -->
        <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-database.js"></script>
    </head>
    <body class="container">
        <script type="module">
            // Import the functions you need from the SDKs you need
            import { initializeApp } from "https://www.gstatic.com/firebasejs/9.22.2/firebase-app.js";
            import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.22.2/firebase-analytics.js";
            // TODO: Add SDKs for Firebase products that you want to use
            // https://firebase.google.com/docs/web/setup#available-libraries

            // Your web app's Firebase configuration
            // For Firebase JS SDK v7.20.0 and later, measurementId is optional
            const firebaseConfig = {
                apiKey: "AIzaSyCH6RkFBG6hvPotKfA7A6YpzExaPfdvtxo",
                authDomain: "nutrace-71753.firebaseapp.com",
                databaseURL: "https://nutrace-71753-default-rtdb.asia-southeast1.firebasedatabase.app",
                projectId: "nutrace-71753",
                storageBucket: "nutrace-71753.appspot.com",
                messagingSenderId: "329028247407",
                appId: "1:329028247407:web:352e03863a647c9e8d929a",
                measurementId: "G-N22ST53E6B"
            };

            // Initialize Firebase
            const app = initializeApp(firebaseConfig);
            const analytics = getAnalytics(app);
        </script>
        <section id="sidebar">
            <a href="../sections/homepage.php" class="brand">
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
                <li>
                    <a href="../client/how-to.php">
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
                                    <div class="buttons">
                                        <a href="../server/logout.php"><button class="yes">YES</button></a>
                                        <a href="../client/dashboard.php"><button class="no">NO</button></a>
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
                                    <div class="display">
                                        <p><b>Nitrogen</b> -</p>
                                        <span id="progress-nitrogen-text" class="progress-text">0%</span>
                                    </div>
                                    <progress id="progress-nitrogen" class="prog1" value="0" max="100"></progress>
                                </div>
                                <div class="nut-divider">
                                    <div class="display">
                                        <p><b>Phosphorus</b> -</p>
                                        <span id="progress-phosphorus-text" class="progress-text">0%</span>
                                    </div>
                                    <progress id="progress-phosphorus" class="prog2" value="0" max="100"></progress>
                                </div>
                                <div class="nut-divider">
                                    <div class="display">
                                        <p><b>Potassium</b> -</p>
                                        <span id="progress-potassium-text" class="progress-text">0%</span>
                                    </div>
                                    <progress id="progress-potassium" class="prog3" value="0" max="100"></progress>
                                </div>
                                <div class="nut-divider">
                                    <div class="display">
                                        <p><b>Soil Moisture</b> -</p>
                                        <span id="progress-moisture-text" class="progress-text">0%</span>
                                    </div>
                                    <progress id="progress-moisture" class="prog4" value="0" max="100"></progress>
                                </div>
                                <div class="nut-divider">
                                    <div class="display">
                                        <p><b>Temperature</b> -</p>
                                        <span id="progress-temp-text" class="progress-text">0%</span>
                                    </div>
                                    <progress id="progress-temp" class="prog5" value="0" max="100"></progress>
                                </div>
                                <div class="nut-divider">
                                    <div class="display">
                                        <p><b>pH Level</b> -</p>
                                        <span id="progress-ph-text" class="progress-text">0%</span>
                                    </div>
                                    <progress id="progress-ph" class="prog6" value="0" max="100"></progress>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        // Initialize Firebase
                        var firebaseConfig = {
                            apiKey: "AIzaSyCH6RkFBG6hvPotKfA7A6YpzExaPfdvtxo",
                            authDomain: "nutrace-71753.firebaseapp.com",
                            databaseURL: "https://nutrace-71753-default-rtdb.asia-southeast1.firebasedatabase.app",
                            projectId: "nutrace-71753",
                            storageBucket: "nutrace-71753.appspot.com",
                            messagingSenderId: "329028247407",
                            appId: "1:329028247407:web:f47c5b574053215e8d929a",
                            measurementId: "G-K2M665SDHS"
                        };
                        firebase.initializeApp(firebaseConfig);

                        // Get a reference to the database
                        var database = firebase.database().ref("Sensors");

                        // Read data from the Firebase Realtime Database
                        database.on("value", function(snapshot) {
                            var data = snapshot.val();

                            // Update the datetime element
                            var datetimeElement = document.getElementById("datetime");
                            var currentDatetime = new Date();
                            datetimeElement.textContent = currentDatetime.toLocaleString();

                            // Update the progress bars for each parameter
                            updateProgressBar("Nitrogen", data["Nitrogen"], "progress-nitrogen", "progress-nitrogen-text");
                            updateProgressBar("Phosphorus", data["Phosphorus"], "progress-phosphorus", "progress-phosphorus-text");
                            updateProgressBar("Potassium", data["Potassium"], "progress-potassium", "progress-potassium-text");
                            updateProgressBar("SoilMoisture", data["SoilMoisture"], "progress-moisture", "progress-moisture-text");
                            updateProgressBar("SoilTemp", data["SoilTemp"], "progress-temp", "progress-temp-text");
                            updateProgressBar("pH", data["pH"], "progress-ph", "progress-ph-text");
                        });

                        // Function to update the progress bar for a given parameter
                        function updateProgressBar(parameter, value, progressBarId, progressTextId) {
                            var progressBar = document.getElementById(progressBarId);
                            var progressText = document.getElementById(progressTextId);

                            // Convert value to percentage
                            var percentage = Math.round((value / keyMaxValue(parameter)) * 100);
                            progressBar.value = percentage;
                            progressText.textContent = percentage + "%";

                            // Set the CSS class based on the percentage value
                            progressBar.classList.add(getAmountClass(percentage));
                        }

                        // Function to determine the maximum value for a given parameter
                        function keyMaxValue(key) {
                            if (key === "Nitrogen" || key === "Phosphorus" || key === "Potassium") {
                                return 100; // Maximum value for Nitrogen, Phosphorus, and Potassium
                            } else if (key === "SoilMoisture") {
                                return 200; // Maximum value for Soil Moisture
                            } else if (key === "SoilTemp") {
                                return 100; // Maximum value for Soil Temperature
                            } else if (key === "pH") {
                                return 10; // Maximum value for pH
                            }
                            return 0; // Default max    imum value
                        }

                        // Function to determine the CSS class based on the percentage value
                        function getAmountClass(percentage) {
                            if (percentage <= 25) {
                                return "low";
                            } else if (percentage <= 50) {
                                return "medium-low";
                            } else if (percentage <= 75) {
                                return "medium-high";
                            } else {
                                return "high";
                            }
                        }
                    </script>
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