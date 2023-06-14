<?php
include '../includes/header.php';
if(isset($_POST["add"])){
    $mysqli= require_once __DIR__ ."../../connection/connect.php";
    $sql= "INSERT INTO members(ID_Number,firstname,sirname,age,gender,residence,phonenumber,emailadress) VALUES(?,?,?,?,?,?,?,?)";
    $stmt = $mysqli->stmt_init();
    if(!$stmt->prepare($sql)){
        die("SQL ERROR".$mysqli->error);
    }
    $idnumber=htmlspecialchars($_POST["idnumber"]);
    $fname=strtoupper(htmlspecialchars($_POST["fname"]));
    $sname=strtoupper(htmlspecialchars($_POST["sname"]));
    $age=htmlspecialchars($_POST["age"]);
    $gender=strtoupper(htmlspecialchars($_POST["gender"]));
    $residence=strtoupper(htmlspecialchars($_POST["residence"]));
    $phonenumber=htmlspecialchars($_POST["mobile"]);
    $emailadress=htmlspecialchars($_POST["email"]);

    $stmt->bind_param("ssssssss",$idnumber,$fname,$sname,$age,$gender,$residence,$phonenumber,$emailadress);

    if($stmt->execute()){
        header("Location:members.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <title>MEMBERS</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet"/>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
  
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
                <a href="logout.php">
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
        <div class="form-container">
            <h1>ADD MEMBERS</h1>
            <form method="post" action="">
                <div class="form-group">
                    <label for="idnumber">ID Number</label>
                    <input type="text" name="idnumber" class="form-control">
                </div>
                           
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Sir Name</label>
                        <input type="text" name="sname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input type="text" name="age" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <input type="text" name="gender"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Residence</label>
                        <input type="text" name="residence"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="mobile"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email Adress</label>
                        <input type="text" name="email"  class="form-control">
                    </div>
                    <div class="form-button">
                    <button type="submit" name="add" class="save-btn">Save Changes</button>
                    <a href="members.php">Close</a>
                    </div>
                   
            </form>
            </div>
    </section>
     <script src="../js/script.js"></script>
</body>
</html>
 
