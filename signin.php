<?php
    session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  require_once __DIR__ . "/connection/connect.php";

  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  $password = $_POST['pass'];

  if(!$email || !$password){
    $message="alert";
    echo "<script type='text/javascript'>  alert('$message'); </script>" ;
   }  
  $stmt = $mysqli->prepare("SELECT phonenumber, password FROM members WHERE emailadress = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  if ($user) {
    if (password_verify($password, $user["password"])) {
     
      session_regenerate_id(true);

      $_SESSION["user_id"] = $user["phonenumber"];

      $username= $_SESSION["user_id"];
      $loginTime=date("Y-m-d H:i:s");
      
       $stmt = $mysqli->prepare("INSERT INTO loggin_session(phone,login_time) VALUES(?,?)");
       $stmt->bind_param("ss",$username,$loginTime);
       $stmt->execute();
       $result = $stmt->get_result();

      header("Location:members/dashboard.php");
    }
  }else{
    $message="The Email or Password entered is incorrect Try Again";
    $title="Friends Church";
    $message=str_replace('localhost', '',$message);
    echo "<script type='text/javascript'> alert('$title\\n\\n$message');window.location.href='index.php'; </script>" ;
  }
}

?>