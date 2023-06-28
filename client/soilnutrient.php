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
        <link rel ="stylesheet" href="../client/soilnutrient.css">
        <link rel="icon" type="image/png" href="../assets/images/main/nutrace_logo.png">
        <!-- Add Firebase SDK -->
        <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-database.js"></script>
    </head>
    <body class="container">
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
                <li class="active">
                    <a href="./soilnutrient.php">
                        <img class="navbar-pic" src="../assets/images/sidebar/green/soil-select.png" width="25px" height="25px">
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
                    <a href="./how-to.php">
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
                                        <a href="../client/soilnutrient.php"><button class="no">NO</button></a>
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
                <p id="p4">Soil Nutrient Monitoring</p>
                <div id="upper-content">
                    <div id="main-left">
                        <p id="eggplant-title">Eggplant Soil Nutrient Status</p>
                        <p id="p5" class="datetime">Date of monitoring: <span id="datetime"></span></p>
                        <div class="summary-tbl">
                            <div class="div1">
                                <table class="summary" id="nitrogen-table">
                                    <thead class="fromSensor">
                                        <th class="head-table">Nitrogen <i class="unit">(ppm)</i></th>
                                    </thead>
                                    <tbody id="nitrogen-body" class="values">
                                    </tbody>
                                </table>  
                                <table class="summary" id="moisture-table">
                                    <thead class="fromSensor">
                                        <th class="head-table">Soil Moisture <i class="unit">(%)</i></th>
                                    </thead>
                                    <tbody id="moisture-body" class="values">
                                    </tbody>
                                </table>      
                            </div>
                            <div class="div1">
                                <table class="summary" id="potassium-table">
                                    <thead class="fromSensor">
                                        <th class="head-table">Potassium <i class="unit">(ppm)</i></th>
                                    </thead>
                                    <tbody id="potassium-body" class="values">
                                    </tbody>
                                </table>   
                                <table class="summary" id="temp-table">
                                    <thead class="fromSensor">
                                        <th class="head-table">Temperature <i class="unit">(°C)</i></th>
                                    </thead>
                                    <tbody id="temp-body" class="values">
                                    </tbody>
                                </table>  
                            </div>
                            <div class="div1">
                                <table class="summary" id="phosphorus-table">
                                    <thead class="fromSensor">
                                        <th class="head-table">Phosphorus <i class="unit">(ppm)</i></th>
                                    </thead>
                                    <tbody id="phosphorus-body" class="values">
                                    </tbody>
                                </table>  
                                <table class="summary" id="ph-table">
                                    <thead class="fromSensor">
                                        <th class="head-table">pH level</th>
                                    </thead>
                                    <tbody id="ph-body" class="values">
                                    </tbody>
                                </table>
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

                            // Clear the table bodies
                            var nitrogenBody = document.getElementById("nitrogen-body");
                            var phosphorusBody = document.getElementById("phosphorus-body");
                            var potassiumBody = document.getElementById("potassium-body");
                            var moistureBody = document.getElementById("moisture-body");
                            var tempBody = document.getElementById("temp-body");
                            var phBody = document.getElementById("ph-body");
                            nitrogenBody.innerHTML = "";
                            phosphorusBody.innerHTML = "";
                            potassiumBody.innerHTML = "";
                            moistureBody.innerHTML = "";
                            tempBody.innerHTML = "";
                            phBody.innerHTML = "";

                            // Iterate over the data and create table rows for each parameter
                            for (var key in data) {
                                if (data.hasOwnProperty(key)) {
                                    var row = document.createElement("tr");
                                    var valueCell = document.createElement("td");
                                    valueCell.textContent = data[key];
                                    valueCell.id = key + "-value"; // Set ID for value cell

                                    var npk_thresholds = [
                                        { maxValue: 10, className: "low" },
                                        { maxValue: 20, className: "medium-low" },
                                        { maxValue: 40, className: "normal" },
                                        { maxValue: 60, className: "medium-high" },
                                        { maxValue: 100, className: "high" },
                                    ];
                                    var moisture_thresholds = [
                                        { maxValue: 30, className: "low" },
                                        { maxValue: 59, className: "dry" },
                                        { maxValue: 90, className: "moist" },
                                        { maxValue: 100, className: "wet" },
                                        { maxValue: 200, className: "xtrm-wet" },
                                    ];
                                    var temp_thresholds = [
                                        { maxValue: 15, className: "low" },
                                        { maxValue: 23, className: "medium-low" },
                                        { maxValue: 32, className: "normal" },
                                        { maxValue: 35, className: "medium-high" },
                                        { maxValue: 100, className: "high" },
                                    ];
                                    var pH_thresholds = [
                                        { maxValue: 5.4, className: "low" },
                                        { maxValue: 6.8, className: "normal" },
                                        { maxValue: 7.5, className: "high" },
                                    ];

                                    // Add CSS class based on amount
                                    if (key === "Nitrogen") {
                                        valueCell.classList.add(getAmountClass(data[key], npk_thresholds));
                                    } else if (key === "Phosphorus") {
                                        valueCell.classList.add(getAmountClass(data[key], npk_thresholds));
                                    } else if (key === "Potassium") {
                                        valueCell.classList.add(getAmountClass(data[key], npk_thresholds));
                                    } else if (key === "SoilMoisture") {
                                        valueCell.classList.add(getAmountClass(data[key], moisture_thresholds));
                                    } else if (key === "SoilTemp") {
                                        valueCell.classList.add(getAmountClass(data[key], temp_thresholds));
                                    } else if (key === "pH") {
                                        valueCell.classList.add(getAmountClass(data[key], pH_thresholds));
                                    }

                                    row.appendChild(valueCell);

                                    // Append the row to the corresponding table based on the parameter
                                    if (key === "Nitrogen") {
                                        nitrogenBody.appendChild(row);
                                    } else if (key === "Phosphorus") {
                                        phosphorusBody.appendChild(row);
                                    } else if (key === "Potassium") {
                                        potassiumBody.appendChild(row);
                                    } else if (key === "SoilMoisture") {
                                        moistureBody.appendChild(row);
                                    } else if (key === "SoilTemp") {
                                        tempBody.appendChild(row);
                                    } else if (key === "pH") {
                                        phBody.appendChild(row);
                                    }
                                }
                            }
                        })
                        // Function to determine the CSS class based on amount
                        function getAmountClass(amount, thresholds) {
                            for (var i = 0; i < thresholds.length; i++) {
                                if (amount <= thresholds[i].maxValue) {
                                    return thresholds[i].className;
                                }
                            }
                            if (amount > thresholds[thresholds.length - 1].maxValue) {
                                return "high";
                            }
                            return ""; // Default class if no threshold matches
                        }
                    </script>

                    <div id="main-right">
                        <p id="title">Legend</p>
                        <div class="legen-content">
                            <img class="legend-img" src="../assets/images/main/legend-small.png">
                        </div>
                    </div>
                </div>
                <div id="lower-content">
                    <div class="records-table">
                        <p id="title">Soil Nutrient Monitoring Guide</p>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th class="low-medium4"> </th>
                                    <th class="low-medium1">LOW TO MEDIUM LOW</th>
                                    <th class="normal">NORMAL</th>
                                    <th class="medium-high">MEDIUM HIGH TO HIGH</th>
                                </tr>
                                <tr>
                                    <th>Nitrogen</th>
                                    <td>To correct a nitrogen deficiency, consider planting nitrogen-rich plants like beans and peas nearby. Adding used and rinsed coffee grounds to the soil to promote nitrogen production. Rinsing the grounds will not affect acid levels of the soil. A plant with plenty of nitrogen available to it will appear leafy green.</td>
                                    <td>Maintain</td>
                                    <td>Using <i>Mulch</i> for removing excess Nitrogen in Soil. You can lay mulch over the soil with too much nitrogen to help draw out some of the excess nitrogen in the soil.</td>
                                </tr>
                                <tr>
                                    <th>Phosphorus</th>
                                    <td>• Add fertilizer such as ammonium phosphate <br>
                                    • You can add bone meal directly to the soil. You can also add used fish tank water to the soil if it does not contain saltwater.</td>
                                    <td>Maintain</td>
                                    <td>Avoiding the addition of phosphorus for several growing seasons will help reduce the amount present in the soil.</td>
                                </tr>
                                <tr>
                                    <th>Potassium</th>
                                    <td>You can use banana peels and bury it an inch to your soil.</td>
                                    <td>Maintain</td>
                                    <td>To reduce potassium in soil, use only products with a low number or a zero in the K position or skip the fertilizer entirely. <br> Loosen the soil with a garden fork or shovel, then water deeply to dissolve and flush out the surplus in potassium-rich soil. Allow the soil to dry completely, then repeat two or three more times.</td>
                                </tr>

                                <tr>
                                    <th class="low-medium5"> </th>
                                    <th class="low-medium2">EXTREMELY DRY TO DRY</th>
                                    <th class="normal">MOIST</th>
                                    <th class="medium-high1">WET TO EXTREMELY WET</th>
                                </tr>
                                <tr>
                                    <th>Soil Moisture</th>
                                    <td>• Cover your soil with a blanket of organic material such as straw, leaves, shredded paper or cardboard, or bark. This will moderate soil temperature, prevent runoff and evaporation, and hold moisture in the for longer periods between waterings.<br>
                                    • Less frequent, deeper waterings are more effective for most plants than frequent, shallow waterings. Plant roots will grow stronger and healthier, and you will not need to water as often. To check whether it’s time to water, push your finger down into the soil. If it is still moist a knuckle or two deep, then it doesn’t need water yet. If it’s dry, then give the soil a nice long, deep soak so that the water reaches the root zone.
                                    </td>
                                    <td>Maintain</td>
                                    <td>• Stop Watering and Allow Time To Pass<br>
                                    • Place plants in the windy area and low humidity<br>
                                    • Ensure There Are Drainage Holes At The Bottom of Your Plant<br>
                                    • Remove Any Mulch From The Top of The Soil</td>
                                </tr>

                                <tr>
                                    <th class="low-medium4"> </th>
                                    <th class="low-medium1">LOW TO MEDIUM LOW</th>
                                    <th class="normal">NORMAL</th>
                                    <th class="medium-high">MEDIUM HIGH TO HIGH</th>
                                </tr>
                                <tr>
                                    <th>Soil Temperature</th>
                                    <td>The soil temperature under waterlogged soil condition is very low and in order to increase the soil temperature under such condition it is essential to drain out the excess water from the field. The removal of water in this way lowers its specific heat and thus increase the soil temperature.</td>
                                    <td>Maintain</td>
                                    <td>• Since the sun is the source of most soil heat, shading the soil keeps it cooler during the day. You can shade soil with ground covers or other plants, or with structures. <br>
                                    • Water in the soil conducts heat rapidly. Dry surface soil insulates the soil below. Water the soil in the spring to help the day’s heat be conducted to the depths.</td>
                                </tr>
                            </tbody>
                        </table>       
                    </div>  
                </div>                
            </main>
        </section>
        <script src="../js-files/sidebar.js"></script>
        <script src="../js-files/realtime.js"></script>
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