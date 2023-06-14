<?php
session_start();
if(isset($_POST["add"])){
    $mysqli= require_once __DIR__ ."../../connection/connect.php";
    $sql= "INSERT INTO Teen(firstname,secondname,idnumber,relationship,age) VALUES(?,?,?,?,?)";
    $stmt = $mysqli->stmt_init();
    if(!$stmt->prepare($sql)){
        die("SQL ERROR".$mysqli->error);
    }

    $fname=htmlspecialchars($_POST["fname"]);
    $sname=htmlspecialchars($_POST["sname"]);
    $idnumber=htmlspecialchars($_POST["idnum"]);
    $relationship=htmlspecialchars($_POST["relationship"]);
    $age=htmlspecialchars($_POST["age"]);
    $stmt->bind_param("sssss",$fname,$sname,$idnumber,$relationship,$age);

    if($stmt->execute()){
        header("Location:Teen.php");
    }
}