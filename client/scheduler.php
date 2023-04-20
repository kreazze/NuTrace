<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta
        name="description"
        content="Stay organized with our user-friendly Calendar featuring events, reminders, and a customizable interface. Built with HTML, CSS, and JavaScript. Start scheduling today!"
        />
        <meta
        name="keywords"
        content="calendar, events, reminders, javascript, html, css, open source coding"
        />
        <title>NuTrace</title>
        <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
      integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
        <link rel ="stylesheet" href="../client/scheduler.css">
        <link rel="icon" type="image/png" href="../assets/images/main/nutrace_logo.png">
    </head>
    <body>
        <section id="sidebar">
            <a href="homepage.html" class="brand">
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
                <li class="active">
                    <a href="./scheduler.php" id="onlink">
                        <img class="navbar-pic" src="../assets/images/sidebar/green/sched-select.png" width="25px" height="25px">
                        <span class="text">Scheduler</span>
                    </a>
                </li>
            </ul>
            <ul class="side-menu">
                <li>
                  <a href="../account-form/login.php" class="logout">
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
                                <a href="scheduler.php"><button class="no">NO</button></a>
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
                <a class="user" href="#">Hello, User!</a>
            </nav>
            <main>
                <div class = "calendar-of-tasks">
                    <h1>Calendar of Tasks</h1>
                  </div>
                  <div class="container">
                    <div class="left">
                      <div class="calendar">
                        <div class="month">
                            <i class="fas fa-angle-left prev"></i>
                          <div class="date">december 2015</div>
                          <i class="fas fa-angle-right next"></i>
                        </div>
                        <div class="weekdays">
                          <div>Sun</div>
                          <div>Mon</div>
                          <div>Tue</div>
                          <div>Wed</div>
                          <div>Thu</div>
                          <div>Fri</div>
                          <div>Sat</div>
                        </div>
                        <div class="days"></div>
                        <div class = "goto-only">
                          <h6>Go To (Magpunta sa):</h6>
                        </div>
                        <div class = "add-task">
                          <h6>Add Task (Maglagay ng Gawain):</h6>
                        </div>
                        
                        <div class="goto-today">
                          <div class="goto">
                            <input type="text" placeholder="mm/yyyy" class="date-input" />
                            <button class="goto-btn">Go</button>
                          </div>
                          <button class="today-btn">Today</button>
                        </div>
                      </div>
                    </div>
                    <div class="right">
                      <div class="today-date">
                        <div class="event-day">wed</div>
                        <div class="event-date">12th december 2022</div>
                      </div>
                      <div class="events"></div>
                      <div class="add-event-wrapper">
                        <div class="add-event-header">
                          <div class="title">Add Event</div>
                          <i class="fas fa-times close"></i>
                        </div>
                        <div class="add-event-body">
                          <div class="add-event-input">
                            <input type="text" placeholder="Event Name" class="event-name" />
                          </div>
                          <div class="add-event-input">
                            <input
                              type="text"
                              placeholder="Event Time From"
                              class="event-time-from"
                            />
                          </div>
                          <div class="add-event-input">
                            <input
                              type="text"
                              placeholder="Event Time To"
                              class="event-time-to"
                            />
                          </div>
                        </div>
                        <div class="add-event-footer">
                          <button class="add-event-btn" name="add-event-btn">Add Event</button>
                        </div>
                      </div>
                    </div>
                    <button class="add-event">
                        <i class="fas fa-plus"></i> 
                    </button>
                  </div>
                  <script src="../js-files/calendar.js"></script>
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