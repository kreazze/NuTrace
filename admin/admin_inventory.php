<?php
    session_start();
    include('../server/connect.php');

    $sql = "SELECT * FROM tbl_inventory";
    $crops = mysqli_query($conn, $sql);
    $rowcount = mysqli_num_rows($crops);
    if(isset($_POST['add']))
    {
        $date       = $_POST['date'];
        $croptype   = $_POST['croptype'];
        $quantity   = $_POST['quantity'];
        $harvester  = $_POST['harvester'];

        $query = "INSERT INTO tbl_inventory (date, croptype, quantity, harvester, status) VALUES ('$date','$croptype','$quantity','$harvester','Pending')";

        $query_run = mysqli_query($conn, $query);
        if($query_run)
        {
            $_SESSION['alert'] = 'The item is under review.';
            echo "<script>if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }</script>";
            echo "<script>window.location.reload();</script>";        
        }
        else{
            $_SESSION['alert'] = 'An error occurred.';
            echo "<script>if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }</script>";
            echo "<script>window.location.reload();</script>";        
        }

        if (isset($_SESSION['alert'])) {
            $alertMessage = $_SESSION['alert'];
            unset($_SESSION['alert']);
        }        
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NuTrace</title>
        <link rel ="stylesheet" href="../admin/admin_inventory.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
        <link rel="icon" type="image/png" href="../assets/images/main/nutrace_logo.png">
        <!-- Bootstrap -->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> 
    </head>
    <body class="container">
        <section id="sidebar">
            <a href="#" class="brand">
                <img class="logo-pic" src="../assets/images/main/nutrace_logo.png" width="25px" height="25px">
                <span>NuTrace</span>
            </a>
            <ul class="side-menu top">
                <li>
                    <a href="../admin/admin_dashboard.php">
                        <img class="navbar-pic" src="../assets/images/sidebar/white/home-icon.png" width="25px" height="25px">
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="../admin/admin_soilnutrient.php">
                        <img class="navbar-pic" src="../assets/images/sidebar/white/soil-icon.png" width="25px" height="25px">
                        <span class="text">Soil Nutrient</span>
                    </a>
                </li>
                <li class="active">
                    <a href="../admin/admin_inventory.php">
                        <img class="navbar-pic" src="../assets/images/sidebar/green/record-select.png" width="25px" height="25px">
                        <span class="text">Inventory</span>
                    </a>
                </li>
                <li>
                    <a href="../admin/admin_scheduler.php" id="onlink">
                        <img class="navbar-pic" src="../assets/images/sidebar/white/sched-icon.png" width="25px" height="25px">
                        <span class="text">Scheduler</span>
                    </a>
                </li>
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
                                    <a href="../account-form/login.php"><button class="yes">YES</button></a>
                                    <a href="../admin/admin_inventory.php"><button class="no">NO</button></a>
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
                <a class="user" href="#">Hello, Admin!</a>
            </nav>
            <main class="main-content">
                <title>Inventory</title>
                <p id="datetime"></p>
                <p class="p4">Crop Harvest Inventory</p>
                <div id="buttons">
                    <a href="#divAdd"><button class=tableBtn id="add-btn">+ ADD</button></a>
                    <button id="dl-btn"><img id='dl-img' src="../assets/images/sidebar/white/download-icon.png" width="25px" height="25px"></button>
                    <button class="tableBtn" type="button" id="refresh-btn">Refresh</button>
                    <script>
                        document.getElementById('refresh-btn').addEventListener('click', function() {
                            location.reload();
                        });
                    </script>
                    <div class="overlay" id="divAdd">
                        <div class="wrapper"> 
                            <a class="close" href="#">&times;</a>
                            <h4>Add Item</h4>
                            <h6>(Magdagdag sa listahan)</h6>
                            <div class="content">
                                <div class="popup-container">
                                    <form class="add-pop"method="POST">
                                        <label>Date</label> <label class="tagalog">(Petsa)</label>
                                        <input placeholder="MM/DD/YYYY" type="date" name="date" required>
                                        <label>Crop Type</label> <label class="tagalog">(Uri ng Tanim)</label>
                                        <select class="sBtn-text" name="croptype"id="croptype" required>
                                                <option class="options"> Select Crop </option>
                                                <option value="kamatis"> Kamatis </option>
                                                <option value="mais"> Mais </option>
                                                <option value="okra"> Okra </option>
                                                <option value="patola"> Patola </option>
                                                <option value="talong"> Talong </option>
                                        </select>
                                        <label>Quantity</label> <label class="tagalog">(Dami)</label>
                                        <div class="qty">
                                            <input type="number" name="quantity" placeholder="In Kilogram (kg)" required>
                                        </div>
                                        <label>Name of harvester</label><label class="tagalog">(Pangalan ng umani)</label>
                                        <input placeholder="First Name & Last Name" name="harvester" type="text" required>
                                        <button type="submit" class="add" name="add">ADD</button>
                                        <button class="cancel" onclick="close()">CANCEL</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="inventory-content">
                    <table id="inventory-table">
                        <thead>
                            <th id="table-title">ID <span id="table-titleslash">(Pagkakakilanlan)</span></th>      
                            <th id="table-title">Date <span id="table-titleslash">(Petsa)</span></th>      
                            <th id="table-title">Crop Type <span id="table-titleslash">(Uri ng Tanim)</span></th>	
                            <th id="table-title">Quantity <span id="table-titleslash">(Dami)</span></th>									
                            <th id="table-title">Name of Harvestor <span id="table-titleslash">(Pangalan ng Umani)</span></th>
                            <th id="table-title">Status <span id="table-titleslash">(Maaaring Gawin)</span></th>
                        </thead>
                        <tbody class="table-contents">
                            <?php
                                $query = "SELECT * FROM tbl_inventory WHERE status='Pending' ORDER BY id ASC";
                                $result = mysqli_query($conn, $query);
                                $rowcount = mysqli_num_rows($result);

                                if ($rowcount > 0) {
                                    while ($row = mysqli_fetch_array($result)) { ?>
                                        <tr>
                                            <th scope="row"><?php echo $row['id'];?></th>
                                            <td><?php echo $row['date']; ?></td>
                                            <td><?php echo $row['croptype']; ?></td>
                                            <td><?php echo $row['quantity']; ?></td>
                                            <td><?php echo $row['harvester']; ?></td>
                                            <td>
                                                <form action="../admin/admin_inventory.php" method="POST">
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                                                    <input type="submit" name="accept" value="approve">
                                                    <input type="submit" name="decline" value="decline">    
                                                </form>
                                            </td>    
                                        </tr>
                                        <?php
                                    } 
                                } else {
                                ?>  <tr> <td colspan="6">There are no entries.</td></tr>  
                                    <?php   
                                } ?>
                        </tbody>
                    </table>
                    <?php     
                        if (isset($_POST['accept'])) {
                            $id = $_POST['id'];
                            $select = "UPDATE tbl_inventory SET status='Accepted' WHERE id='$id'";
                            $result = mysqli_query($conn,$select);
                            echo "<script>if (window.history.replaceState) {
                                window.history.replaceState(null, null, window.location.href);
                            }</script>";
                            echo "<script>window.location.reload();</script>";
                        
                        }
                        if (isset($_POST['decline'])) {
                            $id = $_POST['id'];
                            $select = "UPDATE tbl_inventory SET status='Declined' WHERE id='$id'";
                            $result = mysqli_query($conn,$select);
                            echo "<script>if (window.history.replaceState) {
                                window.history.replaceState(null, null, window.location.href);
                            }</script>";
                            echo "<script>window.location.reload();</script>";
                        
                        }
                    ?>
                </div>                

                <div id="inventory-content">
                    <table id="inventory-table">
                        <thead>
                            <th id="table-title">ID <span id="table-titleslash">(Pagkakakilanlan)</span></th>      
                            <th id="table-title">Date <span id="table-titleslash">(Petsa)</span></th>      
                            <th id="table-title">Crop Type <span id="table-titleslash">(Uri ng Tanim)</span></th>	
                            <th id="table-title">Quantity <span id="table-titleslash">(Dami)</span></th>									
                            <th id="table-title">Name of Harvestor <span id="table-titleslash">(Pangalan ng Umani)</span></th>
                            <th id="table-title">Status <span id="table-titleslash">(Maaaring Gawin)</span></th>
                        </thead>
                        <tbody class="table-contents">
                            <?php
                                $query = "SELECT * FROM tbl_inventory";
                                $result = mysqli_query($conn,$query);
                                $rowcount = mysqli_num_rows($result);

                                while ($row = mysqli_fetch_array($result)) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['id'];?></th>
                                        <td><?php echo $row['date']; ?></td>
                                        <td><?php echo $row['croptype']; ?></td>
                                        <td><?php echo $row['quantity']; ?></td>
                                        <td><?php echo $row['harvester']; ?></td>
                                        <td><?php echo $row['action']; ?></td>
                                    </tr>
                                    <?php 
                                } if (mysqli_num_rows($result) == 0) {
                                    ?>
                                    <tr> <td colspan="6">There are no entries.</tr>  
                                    <?php
                                } ?>
                        </tbody>
                    </table>
                    <p class="refresh"><strong>Total: <?php echo $rowcount; ?></strong></p>
                </div> 
                <?php mysqli_close($conn); ?>
            </main>
        </section>
        <script src="../js-files/sidebar.js"></script>
        <script src="../js-files/realtime.js"></script>
        <script src="../js-files/popup-add.js"></script>
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