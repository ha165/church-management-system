<?php
include '../includes/header.php';
include '../includes/functions.php';

$id = htmlspecialchars($_POST["id"]);
$table = 'members';
$where = "ID_Number= $id";
$data=[
    'firstname' => strtoupper(htmlspecialchars($_POST["fname"])),
    'sirname'=> strtoupper(htmlspecialchars($_POST["sname"])),
    'age' =>htmlspecialchars($_POST["age"]),
    'gender'=>strtoupper(htmlspecialchars($_POST["gender"])),
    'residence'=> strtoupper(htmlspecialchars($_POST["residence"])),
    'phonenumber'=>htmlspecialchars($_POST["mobile"]),
    'emailadress' =>htmlspecialchars($_POST["email"]),
];
$result = updatedata($table,$data,$where);

if ($result){
    echo "<script type='text/javascript'> alert('Details Updated Sucessfuly');window.location.href='members.php'; </script>";
}else{
    echo "<script type='text/javascript'> alert('Details Failed to update');window.location.href='members.php'; </script>";
}
?>

