<?php
include '../includes/header.php';
require_once __DIR__ . "../../connection/connect.php";
if (isset($_POST['change'])) {
 
    if ($_POST["new_password"] !== $_POST["confirm_password"]) {
        echo "<script type='text/javascript'> alert('New Password Dont Match'); window.location.href='settings.php'; </script>";
    }
    
    // Get the current password from the database
    $stmt = $mysqli->prepare("SELECT password FROM members WHERE phonenumber=?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $current_password = $row['password'];
  
    // Check if the current password entered by the user matches the one in the database
    if (password_verify($_POST['current_password'], $current_password)) {
      // Hash the new password
      $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
  
      // Update the user's password in the database
      $stmt = $mysqli->prepare("UPDATE members SET password=? WHERE phonenumber=?");
      $stmt->bind_param("si", $new_password, $user_id);
      $stmt->execute();
      // Redirect the user to the dashboard with a success message
      echo "<script type='text/javascript'> alert('Password Updated Successfully'); window.location.href='settings.php'; </script>";
      exit();
    } else {
      // Display an error message if the current password is incorrect
      echo "<script type='text/javascript'> alert('Current Password is incorrect'); window.location.href='settings.php'; </script>";
    }
  }
?>
