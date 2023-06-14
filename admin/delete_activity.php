<?php
include '../includes/header.php';
require_once __DIR__ . "../../connection/connect.php";
?>
<script type="text/javavscript" src="../js/script.js"></script>
<?php
if(isset($_POST['id'])) {
  $id = $_POST['id'];
    $stmt = $mysqli->prepare("DELETE FROM activity WHERE activityid= ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    echo "<script type='text/javascript'> alert('Data Succesfully deleted');window.location.href='activity.php'; </script>" ;

    echo "<script>}</script>";
    exit();
  }
?>
