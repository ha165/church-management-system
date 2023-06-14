<?php
include '../includes/header.php';
include '../includes/functions.php';
require_once __DIR__ . "../../connection/connect.php";
$table = 'teen';
$column = '*';
$jointable= 'members';
$joincondition='teen.parent_number = members.phonenumber';

$result = selectdata($table,$column,$jointable,$joincondition,'');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <title>Teen</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
            <img src="../images/logo.png" alt="">
            </div>
          <span class="logo_name">FRIENDS QUAKERS</span>
        </div>
        <div class="menu-items">
            <ul class="nav-links">
                <li> <a href="dashboard.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
                <div class="dropdown" id="mydropdown">
                    <li>
                         <a href="members.php">
                              <i class="uil uil-money-withdraw"></i>
                              <span class="link-name">Members</span>
                         </a>
                    </li>
                    <div class="dropdown-content">
                        <a href="Teen.php">Teen</a>
                        <a href="male.php">Male</a>
                         <a href="female.php">Female</a>
                    </div>
                </div>
                <li> <a href="tithe.php">
                <i class="uil uil-money-withdraw"></i>
                    <span class="link-name">Tithe</span>
                </a></li>
                <li> <a href="kipawa.php">
                <i class="uil uil-money-withdraw"></i>
                    <span class="link-name">Giving</span>
                </a></li>
                <li> <a href="offer.php">
                <i class="uil uil-coins"></i>
                    <span class="link-name">Offering</span>
                </a></li>
                <li> <a href="activity.php">
                <i class="uil uil-clipboard-notes"></i>
                    <span class="link-name">Activity</span>
                </a></li>
                <li> <a href="settings.php">
                <i class="uil uil-setting"></i>
                    <span class="link-name">Settings</span>
                </a></li>
            </ul>
            <ul class="logout-mode">
            <li>
                <a href="../logout.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">LogOut</span>
                </a>
            </li>
            <li class="mode">
                <a href="">
                    <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>
                <div class="mode-toggle">
                     <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"> </i>
            <div class="search-box">
            <i class="uil uil-search"> </i>
                <input type="text" placeholder="search here...">
            </div>
            <img src="../images/logo.png" alt="">
        </div>
        <div class="table-container">
        <label  for="tithe">Teen Details</label>
            <div class="button-container">
                  <button class="add-data-button">Add Data</button>
                  <form action="tithe_report.php">
                  <button type="submit" class="print-data-button">Print</button>
                  </form>
            </div>
            <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Parent Name</th>
                            <th>First Name</th>
                            <th>Second Name</th>
                            <th>Parent ID</th>
                            <th>Age</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($result as $row){
                                echo "<tr>";
                                echo "<td>".$row['tid']."</td>";
                                echo "<td>".$row['firstname']."</td>";
                                echo "<td>".$row['fname']."</td>";
                                echo "<td>".$row['sname']."</td>";
                                echo "<td>".$row['ID_Number']."</td>";
                                echo "<td>".$row['age']."</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
            </table>
            <div id="pagination-container"></div>
        </div>
        
    </section>
    <script src="../js/script.js"></script>
     <script src="../js/datatables.js"></script>
</body>
</html>
