<?php
require_once __DIR__ . "../../connection/connect.php";
 function insertdata($table, $data){
    global $mysqli;

    $columns = implode(', ', array_keys($data));
    $placeholders = implode(', ', array_fill(0, count($data), '?'));
    $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";
    $stmt = $mysqli->prepare($query);

    if(!$stmt){
        die("Prepare failed:" . $mysqli->error);
    }

    $values = array_values($data);
    $types = str_repeat('s',count($values));
    $stmt->bind_param($types,...$values);

    $result=$stmt->execute();

    if(!$result){
        die("Execution Failed".$stmt->error);
    }

    $stmt->close();

    return $result;
 }
 function selectdata($table,$columns="*",$jointable='',$joincondition='',$where=''){
    global $mysqli;
    $sql = "SELECT $columns FROM $table ";

    // Append the join caluse if joincondition is provided
    if(!empty($jointable) && !empty($joincondition)){
        $sql .= "INNER JOIN $jointable ON $joincondition ";
    }
    
    // Append Where clause condition if provided
    if (!empty($where)){
        $sql .= "WHERE $where";
    }

    //execute query and fetch the result
    $stmt= $mysqli->prepare($sql);
    $stmt->execute();
    $results=$stmt->get_result();
    $rows = $results->fetch_all(MYSQLI_ASSOC);

    return $rows;
    
 }


 function deledata($table,$where=''){
    
    global $mysqli;

    $sql = "DELETE FROM $table ";

    if(!empty($where)){
        $sql .= "WHERE $where";
    }

    $stmt =$mysqli->prepare($sql);
    $stmt->execute();
    $stmt->close();

    return $stmt;
 }
 

 function updatedata($table,$data,$where){
    global $mysqli;

    $setclause = "";

    foreach($data as $key => $value){
        $setclause .= "$key = ?, ";
    }
    $setclause = rtrim($setclause, ', ');

    $sql = "UPDATE $table SET $setclause WHERE $where";

    echo "Query:" . $sql . "<br>";

    $stmt = $mysqli->prepare($sql);

    if(!$stmt){
        die("Prepare failed" . $mysqli->error);
    }

    $values = array_values($data);
    $types = str_repeat('s',count($values));
    $stmt->bind_param($types, ...$values);

    $result = $stmt->execute();

    if(!$result){
        die("Execution failed". $stmt->error);
    }

    $stmt->close();
    return $result;
 }
 ?>