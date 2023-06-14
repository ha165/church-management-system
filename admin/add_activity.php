<?php
include '../includes/header.php';
if(isset($_POST["add"])){
    $mysqli= require_once __DIR__ ."../../connection/connect.php";
    $sql= "INSERT INTO activity(title,description,venue,date) VALUES(?,?,?,?)";
    $stmt = $mysqli->stmt_init();
    if(!$stmt->prepare($sql)){
        die("SQL ERROR".$mysqli->error);
    }

    $title=htmlspecialchars($_POST["title"]);
    $description=htmlspecialchars($_POST["description"]);
    $venue=htmlspecialchars($_POST["venue"]);
    $date=htmlspecialchars($_POST["actdate"]);
    $stmt->bind_param("ssss",$title,$description,$venue,$date);

    if($stmt->execute()){
        header("Location:activity.php");
    }
}