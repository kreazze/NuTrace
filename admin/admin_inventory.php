<?php
    require_once('../server/session.php');

    // Check if user is not logged in, redirect to login page
    if (!isset($_SESSION["fullname"])) {
        header("Location: ../sections/homepage.php");
        exit();
    }
    
    include('../sections/inventory-export.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inventory</title>
        <link rel ="stylesheet" href="../admin/admin_inventory.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
        <link rel="icon" type="image/png" href="../assets/images/main/nutrace_logo.png">
        <!-- Bootstrap -->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> 
    </head>
    <body class="container">
        <section id="sidebar">
            <a href="../sections/homepage.php" class="brand">
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
                <li>
                    <a href="../admin/admin_how-to.php">
                        <img class="navbar-pic" src="../assets/images/sidebar/white/how-to-icon.png" width="25px" height="25px">
                        <span class="text">Learn More</span>
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
                                    <a href="../server/logout.php"><button class="yes">YES</button></a>
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
            <main class="main-content">
                <title>Inventory</title>
                <p id="datetime"></p>
                <p class="p4">Crop Harvest Inventory</p>
                <div id="buttons">
                    <a href="#divAdd"><button class=tableBtn id="add-btn">+ ADD</button></a>
                    <form action="../sections/inventory-export.php" method="post">					
                        <button type="submit" id="dl-btn" name='export_data'><img id='dl-img' src="../assets/images/sidebar/white/download-icon.png" width="25px" height="25px"></button>
                    </form>
                    <button class="tableBtn" type="button" id="refresh-btn">REFRESH</button>
                    <script>
                        document.getElementById('refresh-btn').addEventListener('click', function() {
                            location.reload();
                        });
                    </script>
                </div>

                <!-- Add Item -->
                <div class="overlay" id="divAdd">
                    <div class="wrapper"> 
                        <a class="close" href="#">&times;</a>
                        <h4>Add Item</h4>
                        <h6>(Magdagdag sa listahan)</h6>
                        <div class="content">
                            <div class="popup-container">
                                <form class="add-pop" onSubmit="closeForm()" method="POST">
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
                                    <button class="cancel" onclick="closeForm()">CANCEL</button>
                                </form>
                                <script>
                                    function closeForm() {
                                        document.getElementById('divAdd').style.display = 'none';
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                    <?php
                        $sql = "SELECT * FROM tbl_inventory";
                        $conn = new mysqli("localhost", "root", "", "nutrace_server");
                        $crops = mysqli_query($conn, $sql);
                        $rowcount = mysqli_num_rows($crops);

                        if(isset($_POST['add']))
                        {
                            $date       = $_POST['date'];
                            $croptype   = $_POST['croptype'];
                            $quantity   = $_POST['quantity'];
                            $harvester  = $_POST['harvester'];

                            $query = "INSERT INTO tbl_inventory (date, croptype, quantity, harvester, status) VALUES ('$date','$croptype','$quantity','$harvester','Pending')";
                            $conn = new mysqli("localhost", "root", "", "nutrace_server");
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
                </div>

                <!-- Edit Item -->
                <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        if (isset($_POST['edit'])) {
                            $id = $_POST['id'];
                            $query = "SELECT * FROM tbl_inventory WHERE id = '$id'";
                            $conn = new mysqli("localhost", "root", "", "nutrace_server");
                            $query_run = mysqli_query($conn, $query);

                            foreach ($query_run as $row) { ?>
                                <div class="overlay" id="divEdit">
                                    <div class="wrapper"> 
                                        <a class="close" href="#">&times;</a>
                                        <h4>Edit Item</h4>
                                        <div class="content">
                                            <div class="popup-container">
                                                <form class="add-pop" action="../admin/admin_inventory-edit.php" method="POST">
                                                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                                    <label>Date</label> <label class="tagalog">(Petsa)</label>
                                                    <input placeholder="MM/DD/YYYY" type="date" name="edit_date" value="<?php echo $row['date']; ?>" required>
                                                    <label>Crop Type</label> <label class="tagalog">(Uri ng Tanim)</label>
                                                    <select class="sBtn-text" name="edit_croptype" id="croptype" required>
                                                        <option value="Kamatis" <?php if ($row['croptype'] == 'Kamatis') echo 'selected'; ?>>Kamatis</option>
                                                        <option value="Mais" <?php if ($row['croptype'] == 'Mais') echo 'selected'; ?>>Mais</option>
                                                        <option value="Okra" <?php if ($row['croptype'] == 'Okra') echo 'selected'; ?>>Okra</option>
                                                        <option value="Patola" <?php if ($row['croptype'] == 'Patola') echo 'selected'; ?>>Patola</option>
                                                        <option value="Talong" <?php if ($row['croptype'] == 'Talong') echo 'selected'; ?>>Talong</option>
                                                    </select>
                                                    <label>Quantity</label> <label class="tagalog">(Dami)</label>
                                                    <div class="qty">
                                                        <input type="number" name="edit_quantity" placeholder="In Kilogram (kg)" value="<?php echo $row['quantity']; ?>" required>
                                                    </div>
                                                    <label>Name of harvester</label> <label class="tagalog">(Pangalan ng umani)</label>
                                                    <input placeholder="Full Name (e.g. John Dela Cruz)" name="edit_harvester" type="text" value="<?php echo $row['harvester']; ?>" required>
                                                    <button type="submit" class="edit" name="edit">EDIT</button>
                                                    <button class="cancel" onclick="close()">CANCEL</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    }
                ?>

                <div id="inventory-content">
                    <table id="inventory-table">
                        <thead>
                            <th id="table-title">Date</th>      
                            <th id="table-title">Crop Type</th>	
                            <th id="table-title">Quantity</th>									
                            <th id="table-title">Name of Harvestor</th>
                            <th id="table-title">Status</th>
                            <th id="table-title" class="th-action">Action</th>
                        </thead>
                        <tbody class="table-contents">
                            <?php
                                $query = "SELECT * FROM tbl_inventory WHERE status='Pending' ORDER BY id ASC";
                                $conn = new mysqli("localhost", "root", "", "nutrace_server");
                                $result = mysqli_query($conn, $query);
                                $rowcount = mysqli_num_rows($result);

                                while ($row = mysqli_fetch_array($result)) { ?>
                                    <tr>
                                        <td><?php echo $row['date']; ?></td>
                                        <td><?php echo $row['croptype']; ?></td>
                                        <td><?php echo $row['quantity']; ?></td>
                                        <td><?php echo $row['harvester']; ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                        <td>
                                            <form action="#divEdit" method="POST" style="display: inline;">
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                                                <input type="submit" name="edit" id="edit" value="EDIT">                                                
                                            </form>                                      
                                            <form action="../admin/admin_inventory.php" method="POST" style="display: inline;"> 
                                                <input class="form-action" type="hidden" name="id" value="<?php echo $row['id']; ?>" />          
                                                <input class="form-action" type="submit" name="approve" id="approve" value="APPROVE">
                                                <input class="form-action" type="submit" name="decline" id="decline" value="DECLINE">
                                            </form>    
                                        </td>
                                    </tr>
                                    <?php 
                                    } if (mysqli_num_rows($result) == 0) { ?>
                                        <tr> <td colspan="7">There are no entries.</td></tr>  
                                        <?php   
                                } ?>
                                <?php     
                                if (isset($_POST['approve']) || isset($_POST['decline'])) {
                                    $id = $_POST['id'];
                                    $status = isset($_POST['approve']) ? 'Approved' : 'Declined';
                                    $select = "UPDATE tbl_inventory SET status='$status' WHERE id='$id'";
                                    $conn = new mysqli("localhost", "root", "", "nutrace_server");
                                    $result = mysqli_query($conn, $select);
                                    
                                    if ($result) {
                                        echo "<script>alert('Status updated to $status.');</script>";
                                    } else {
                                        echo "<script>alert('Failed to update status.');</script>";
                                    }
                                    echo "<script>if (window.history.replaceState) {
                                        window.history.replaceState(null, null, window.location.href);
                                    }</script>";
                                    echo "<script>window.location.reload();</script>";
                                }
                            ?>
                        </tbody>
                    </table>
                    <strong id="total-entries">TOTAL PENDING ENTRIES: <?php echo $rowcount; ?></strong>
                </div>                

                <div id="inventory-content">
                    <table id="inventory-table">
                        <thead>
                            <th id="table-title">Date</th>      
                            <th id="table-title">Crop Type</th>	
                            <th id="table-title">Quantity</th>									
                            <th id="table-title">Name of Harvestor</th>
                            <th id="table-title">Status</th>
                        </thead>
                        <tbody class="table-contents">
                            <?php
                                // get page number
                                 if (isset($_GET['page_no']) && $_GET['page_no'] !== "") {
                                    $page_no = $_GET['page_no'];
                                } else {
                                    $page_no = 1;
                                }

                                // total rows to display
                                $total_records_per_page = 10;
                                // get the page offset for the LIMIT query;
                                $offset = ($page_no - 1) * $total_records_per_page;
                                // get previous page
                                $previous_page = $page_no - 1;
                                // get next page;
                                $next_page = $page_no + 1;

                                //get the total count of records
                                $conn = new mysqli("localhost", "root", "", "nutrace_server");
                                $result_count = mysqli_query($conn, "SELECT COUNT(*) as total_records FROM nutrace_server.tbl_inventory") or die(mysqli_error($conn));
                                // total records
                                $records = mysqli_fetch_array($result_count);
                                // store total_records to a variable
                                $total_records = $records['total_records'];
                                // get total records
                                $total_no_of_pages = ceil($total_records / $total_records_per_page);

                                $query = "SELECT * FROM tbl_inventory WHERE status = 'Approved' OR status = 'Declined'";
                                $conn = new mysqli("localhost", "root", "", "nutrace_server");
                                $result = mysqli_query($conn,$query);
                                $rowcount = mysqli_num_rows($result);
                                
                                $sql = "SELECT * FROM tbl_inventory WHERE status != 'Pending' LIMIT $offset, $total_records_per_page";
                                $conn = new mysqli("localhost", "root", "", "nutrace_server");
                                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                                while ($row = mysqli_fetch_array($result)) { ?>
                                    <tr>
                                        <td><?php echo $row['date']; ?></td>
                                        <td><?php echo $row['croptype']; ?></td>
                                        <td><?php echo $row['quantity']; ?></td>
                                        <td><?php echo $row['harvester']; ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                    </tr>
                                    <?php
                                } if (mysqli_num_rows($result) == 0) {
                                    ?>
                                    <tr> <td colspan="6">There are no entries.</tr>  
                                    <?php
                                } ?>
                        </tbody>
                    </table>
                    <strong id="total-entries">TOTAL ENTRIES: <?php echo $rowcount; ?></strong>
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