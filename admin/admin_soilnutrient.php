<?php
    require_once('../server/session.php');

    // Check if user is not logged in, redirect to login page
    if (!isset($_SESSION["fullname"])) {
        header("Location: ../sections/homepage.php");
        exit();
    }

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
            <a href="../sections/homepage.php" class="brand">
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
                <p id="p4">Soil Nutrient Monitoring</p>
                <div id="upper-content">
                    <div id="main-left">
                        <p id="title">Eggplant Soil Nutrient Status</p>
                        <p id="p5" class="datetime">Date of monitoring: <span id="datetime"></span></p>
                        <div class="summary-tbl">
                            <div class="div1">
                                <table class="summary">
                                    <tbody>
                                        <tr class="fromSensor">
                                            <td class="head-table">Nitrogen</td>
                                        </tr>
                                        <tr class="fromSensor">
                                            <td class="values">20 PPM</td>
                                        </tr>
                                    </tbody>
                                </table>  
                                <table class="summary">
                                    <tbody>
                                        <tr class="fromSensor">
                                            <td class="head-table">Phosphorus</td>
                                        </tr>
                                        <tr class="fromSensor">
                                            <td class="values">20 PPM</td>
                                        </tr>
                                    </tbody>
                                </table>  
                            </div>
                            <div class="div1">
                                <table class="summary">
                                    <tbody>
                                        <tr class="fromSensor">
                                            <td class="head-table">Potassium</td>
                                        </tr>
                                        <tr class="fromSensor">
                                            <td class="values">20 PPM</td>
                                        </tr>
                                    </tbody>
                                </table>   
                                <table class="summary">
                                        <tr class="fromSensor">
                                            <td class="head-table">Temperature</td>
                                        </tr>
                                        <tr class="fromSensor">
                                            <td class="values">20 °C</td>
                                        </tr>
                                    </tbody>
                                </table>  
                            </div>
                            <div class="div1">
                                <table class="summary">
                                    <tbody>
                                        <tr class="fromSensor">
                                            <td class="head-table">Soil Moisture</td>
                                        </tr>
                                        <tr class="fromSensor">
                                            <td class="values">75 %</td>
                                        </tr>
                                    </tbody>
                                </table>      
                                <table class="summary">
                                    <tbody>
                                        <tr class="fromSensor">
                                            <td class="head-table">pH level</td>
                                        </tr>
                                        <tr class="fromSensor">
                                            <td class="values">6.5</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>       
                        </div>
                    </div>
                    <div id="main-right">
                        <p id="title">Legend</p>
                        <div class="legen-content">
                            <img class="legend-img" src="../assets/images/main/legend-small.png">
                        </div>
                    </div>
                </div>
                <div id="lower-content">
                    <div class="records-table">
                        <div class="lower-header">
                            <p id="title">Soil Monitoring Records</p>
                            <button class="btn">Download</button>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                <th>Date</th>
                                <th>Nitrogen (N)</th>
                                <th>Phosphorus (P)</th>
                                <th>Potassium (K)</th>
                                <th>Soil Moisture Level</th>
                                <th>Temperature Level</th>
                                <th>pH Level</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <?php
                                    //foreach($crops as $row){ ?>
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
                                    //} ?> -->
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
                        <div class="table-pagination">
                        <div class="pages">
                                <strong>PAGE <?= $page_no; ?> OF <?= $total_no_of_pages; ?> </strong>
                        </div>
                        <div aria-label="...">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a id="prev" class="page-link <?= ($page_no <= 1) ? 'disabled': ''; ?> " <?= ($page_no > 1) ? 'href=?page_no=' . $previous_page: ''; ?>>PREVIOUS</a>
                                </li>
                                
                                <?php 
                                    for ($counter = 1; $counter <= $total_no_of_pages; $counter++) { ?>
                                    <?php if ($page_no != $counter) {?>
                                            <li class="page-item"><a class="page-link" href="?page_no=<?= $counter; ?>"><?= $counter; ?></a></li>                                    
                                    <?php } else { ?>
                                            <li class="page-item"><a class="page-link active"><?= $counter; ?></a></li>
                                    <?php } ?>
                                <?php } ?>
                                

                                <li class="page-item">
                                    <a id="next" class="page-link <?= ($page_no >= $total_no_of_pages) ? 'disabled': ''; ?> " <?= ($page_no < $total_no_of_pages) ? 'href=?page_no='.$next_page: ''; ?>>NEXT</a>
                                </li>
                            </ul>
                        </div>
                    </div>  
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