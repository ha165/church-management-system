<?php
include '../includes/header.php';
require_once __DIR__ . "../../connection/connect.php";

if(isset($_POST['id'])) {
  $id = $_POST['id'];
  $stmt = $mysqli->prepare("DELETE FROM members WHERE ID_Number = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
   
  header("Location: members.php");
  exit();
}
?>
