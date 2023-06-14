<?php

define("ERROR_FIRST_NAME", "First Name is Required");
define("ERROR_INVALID_EMAIL", "Enter Valid Email");
define("ERROR_SHORT_PASSWORD", "Password Must Be at least 8 Characters Long");
define("ERROR_NO_LETTER_PASSWORD", "password must contain at least one letter");
define("ERROR_NO_NUMBER_PASSWORD", "password must contain at least one number");
define("ERROR_PASSWORD_MISMATCH", "password must match");
define("ERROR_PHONE_NUMBER_EXISTS", "The Phone Number Already Exist");

function validate_password($password) {
    if (strlen($password) < 8) {
        return ERROR_SHORT_PASSWORD;
    }
    if (!preg_match("/[a-z]/i", $password)) {
        return ERROR_NO_LETTER_PASSWORD;
    }
    if (!preg_match("/[0-9]/", $password)) {
        return ERROR_NO_NUMBER_PASSWORD;
    }
    return "";
}

function validate_email($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ERROR_INVALID_EMAIL;
    }
    return "";
}

/* validate form */

$error_message = validate_email($_POST['email']) . validate_password($_POST['pass']);

if (!empty($error_message)) {
    die($error_message);
}

if ($_POST["pass"] !== $_POST["confirmpass"]) {
    die(ERROR_PASSWORD_MISMATCH);
}

$mysqli = require __DIR__ . "../../connection/connect.php";

$sql = "INSERT INTO admin(username, email,phonenumber, password) VALUES (?, ?, ?, ?)";
$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL ERROR: " . $mysqli->error);
}

$username = htmlspecialchars($_POST["username"]);
$email = htmlspecialchars($_POST["email"]);
$phonenumber = htmlspecialchars($_POST["phonenumber"]);
$password_hash = password_hash($_POST["pass"], PASSWORD_DEFAULT);

$stmt->bind_param("ssss", $username, $email, $phonenumber, $password_hash);

if ($stmt->execute()) {
    header("Location:login.php");
} else {
    ?>
    <script type="text/javascript">
        alert("<?php echo ERROR_PHONE_NUMBER_EXISTS ?>");
        window.location.href='signup.html';
    </script>
    <?php
}
?>
