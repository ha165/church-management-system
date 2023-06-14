<?php
include '../includes/header.php';
include '../includes/functions.php';
require_once __DIR__ . "../../connection/connect.php";

if(isset($_POST['id'])) {
  $id = $_POST['id'];
  $table='tithe';
  $where="titheid = $id";
  if(isset($_POST['confirmed']) && $_POST['confirmed'] === 'true'){
    deledata($table,$where);
    header('Location:tithe.php');
  }else{
    echo "<script type='text/javascript' src='../js/script.js'></script>";
  }
  
}
?>
