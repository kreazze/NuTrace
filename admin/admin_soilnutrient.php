<?php
    //wala pang sensor...
    session_start();
    include('../server/connect.php');

    $sql = "SELECT * FROM soil_nutrients";
    $nutrients = mysqli_query($conn, $sql);
    //$rowcount = mysqli_num_rows($nutrients);
    if(isset($_POST['add']))
    {
        $sn_date            = $_POST['sn_date'];
        $sn_nitrogen        = $_POST['sn_nitrogen'];
        $sn_phosphorous     = $_POST['sn_phosphorous'];
        $sn_potassium       = $_POST['sn_potassium'];
        $sn_moisture        = $_POST['sn_moisture'];
        $sn_temperature     = $_POST['sn_nitrogen'];
        $sn_ph              = $_POST['sn_phosphorous'];


        $query = "INSERT INTO tbl_inventory (sn_date, sn_nitrogen, sn_phosphorous, sn_potassium, sn_moisture, sn_temperature, sn_ph) VALUES ('$sn_date','$sn_nitrogen','$sn_phosphorous','$sn_potassium','$sn_moisture','$sn_temperature','$sn_ph')";

        $query_run = mysqli_query($conn, $query);
        if($query_run)
        {
            
        }
        else{
            //insert code to inform that sensor is NOT working
        }
    }
?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NuTrace</title>
        <link rel ="stylesheet" href="../admin/admin_soilnutrient.css">
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
                    <a href="./admin_dashboard.php">
                        <img class="navbar-pic" src="../assets/images/sidebar/white/home-icon.png" width="25px" height="20px">
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li class="active">
                    <a href="./admin_soilnutrient.php">
                        <img class="navbar-pic" src="../assets/images/sidebar/green/soil-select.png" width="25px" height="25px">
                        <span class="text">Soil Nutrient</span>
                    </a>
                </li>
                <li>
                    <a href="./admin_inventory.php">
                        <img class="navbar-pic" src="../assets/images/sidebar/white/record-icon.png" width="25px" height="25px">
                        <span class="text">Inventory</span>
                    </a>
                </li>
                <li>
                    <a href="./admin_scheduler.php" id="onlink">
                        <img class="navbar-pic" src="../assets/images/sidebar/white/sched-icon.png" width="25px" height="25px">
                        <span class="text">Scheduler</span>
                    </a>
                </li>
                <li>
                    <a href="./admin_how-to.php">
                        <img class="navbar-pic" src="../assets/images/sidebar/white/how-to-icon.png" width="25px" height="25px">
                        <span class="text">Learn More</span>
                    </a>
                </li>
            </ul>
            <ul class="side-menu">
                <li>
                    <a href="../account-form/login.php" class="logout">
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
                                        <a href="../admin/admin_soilnutrient.php"><button class="no">NO</button></a>
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
            <div class="head-title">
                <div class="left">
                    <h1>Soil Nutrient Monitoring</h1>
                </div>
            </div>
            <hr>
            <div class="part1">
                <h1>Eggplant (Talong) Soil Nutrient Status</h1>
            </div>
            <main>
                <div class="date-time">
                    <h2>Date of monitoring:</h2><br>
                    <h2>[date here]</h2>
                </div>
                <div class="summary-tbl">
                    <table class="summary"> <!--How to change color-->
                        <tr class="fromSensor">
                            <th class="head-table">Nitrogen</th>                              
                            <th class="head-table">Soil Temperature</th>
                        </tr>
                            <tr class="fromSensor">
                            <td class="values">20 ppm</td>
                            <td class="values">20°C</td>
                        </tr>
                        <tr class="fromSensor">                              
                            <th class="head-table">Phosphorus</th>
                            <th class="head-table">Soil Moisture</th>
                        </tr>
                        <tr class="fromSensor">
                            <td class="values">20 ppm</td>
                            <td class="values">75%</td>
                        </tr>
                        <tr class="fromSensor">                              
                            <th class="head-table">Potassium</th>
                            <th class="head-table">Soil pH level</th>
                        </tr>
                        <tr class="fromSensor">
                            <td class="values">20 ppm</td>
                            <td class="values">6.5</td>
                        </tr>                              
                    </table>                
                </div>
            </main>
            <div class="legend">
                <div class="legend-title">
                    <h1>Legend</h1>
                </div>
                <div class="legend-img">
                    <img src="../assets/images/main/legend-small.png" alt="legend" width="88%" height="88%">
                </div>
            </div>
            <div class="part2">
                <h1>Soil Monitoring Records</h1>
                <button class="btn"><i class="fa fa-cloud-download">Download as file</i></button>
            </div>
            <table class="table">
                <thead>
                    <tr>
                     <th>Date</th>
                     <th>Nitrogen</th>
                     <th>Phosphorus</th>
                     <th>Potassium</th>
                     <th>Moisture</th>
                     <th>Temp</th>
                     <th>pH</th>
                    </tr>
                </thead>
                <tbody>
                            <!-- <?php
                                //foreach($crops as $row){
                                    ?>
                                    <tr>
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php echo $row['croptype']; ?></td>
                                    <td><?php echo $row['quantity']; ?></td>
                                    <td><?php echo $row['harvester']; ?></td>
                                    <td>
                                    <button class="btn btn-warning mb-1" id="editItemBtn">Edit Info</button>
                                    <button class="btn btn-danger mb-1" id="deleteBtn">Delete</button>
                                    </td>
                                    </tr>
                                    <?php
                                //}
                            ?> -->
                      <tr>
                            <td data-label="Date">04/04/23</td>
                            <td data-label="Nit">Normal</td>
                            <td data-label="Pho">Medium Low</td>
                            <td data-label="Pot">Medium High</td>
                            <td data-label="Moisture">Extremely Wet</td>
                            <td data-label="Temp">High</td>
                            <td data-label="pH">Low</td>
                      </tr>
           
                      <tr>
                            <td data-label="Date">04/04/23</td>
                            <td data-label="Nit">Normal</td>
                            <td data-label="Pho">Medium Low</td>
                            <td data-label="Pot">Medium High</td>
                            <td data-label="Moisture">Extremely Wet</td>
                            <td data-label="Temp">High</td>
                            <td data-label="pH">Low</td>
                      </tr>
           
                      <tr>
                            <td data-label="Date">04/04/23</td>
                            <td data-label="Nit">Normal</td>
                            <td data-label="Pho">Medium Low</td>
                            <td data-label="Pot">Medium High</td>
                            <td data-label="Moisture">Extremely Wet</td>
                            <td data-label="Temp">High</td>
                            <td data-label="pH">Low</td>
                      </tr>
           
                      <tr>
                            <td data-label="Date">04/04/23</td>
                            <td data-label="Nit">Normal</td>
                            <td data-label="Pho">Medium Low</td>
                            <td data-label="Pot">Medium High</td>
                            <td data-label="Moisture">Extremely Wet</td>
                            <td data-label="Temp">High</td>
                            <td data-label="pH">Low</td>
                      </tr>
                </tbody>
              </table>
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