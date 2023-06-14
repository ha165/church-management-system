<?php
include '../includes/header.php';
include '../includes/functions.php';

$id = htmlspecialchars($_POST["id"]);
$table='offering';
$where="offerid = $id";
$data = array(
    "trcode" => strtoupper(htmlspecialchars($_POST["trcode"])),
    "amount" => htmlspecialchars($_POST["amount"]),
    "mobile" => htmlspecialchars($_POST["mobile"]),
    "paytime" => htmlspecialchars($_POST["paytime"])
);
$result = updatedata($table,$data,$where);

if($result){
    echo "<script type='text/javascript'> alert('Details Updated Sucessfuly');window.location.href='offer.php'; </script>" ;
    exit;
}
echo "<script type='text/javascript'> alert('Failed to update Data');window.location.href='offer.php'; </script>" ;

?>

