
<?php
session_start();
if (isset($_SESSION["user_id"])){
    require_once __DIR__ . "/connection/connect.php";
    $phone= $_SESSION["user_id"];
    $logoutTime= date("Y-m-d H:i:s");
    
     $stmt = $mysqli->prepare("UPDATE loggin_session SET logout_time = ? WHERE phone= ? AND logout_time = '' ");
     $stmt->bind_param("is",$phone,$logouTime);
     $stmt->execute();

    session_destroy();
    $stmt->close(); 
    $mysqli->close(); 
    header("location:index.php");
    exit;
}else{
    echo "<script type='text/javascript'> alert('Youre Not Logged IN Login First'); window.location.href 'index.php'; </script>";
}

 ?>
