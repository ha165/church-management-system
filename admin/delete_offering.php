<?php
include '../includes/header.php';
require_once __DIR__ . "../../connection/connect.php";

if(isset($_POST['id'])) {
  $id = $_POST['id'];
  $stmt = $mysqli->prepare("DELETE FROM offering WHERE offerid = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();

  header("Location: offer.php");
  exit();
}
?>
