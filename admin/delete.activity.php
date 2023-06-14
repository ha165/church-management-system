<?php
include '../includes/header.php';
require_once __DIR__ . "../../connection/connect.php";

if(isset($_POST['id'])) {
  $id = $_POST['id'];
  $stmt = $mysqli->prepare("DELETE FROM activity WHERE activityd = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();

  header("Location: tithe.php");
  exit();
}
?>
