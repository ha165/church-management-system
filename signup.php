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

if (empty($_POST['fname'])) {
    die(ERROR_FIRST_NAME);
}

$error_message = validate_email($_POST['email']) . validate_password($_POST['pass']);

if (!empty($error_message)) {
    die($error_message);
}

if ($_POST["pass"] !== $_POST["confirmpass"]) {
    die(ERROR_PASSWORD_MISMATCH);
}

$mysqli = require __DIR__ . "/connection/connect.php";

$sql = "INSERT INTO members(ID_Number, firstname, sirname, age, gender, residence, phonenumber, emailadress, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL ERROR: " . $mysqli->error);
}

$idnumber = htmlspecialchars($_POST["idnumber"]);
$fname = htmlspecialchars($_POST["fname"]);
$sname = htmlspecialchars($_POST["sname"]);
$age = htmlspecialchars($_POST["age"]);
$gender = htmlspecialchars($_POST["gender"]);
$residence = htmlspecialchars($_POST["residence"]);
$pnum = htmlspecialchars($_POST["pnum"]);
$email = htmlspecialchars($_POST["email"]);
$password_hash = password_hash($_POST["pass"], PASSWORD_DEFAULT);

$stmt->bind_param("sssssssss", $idnumber, $fname, $sname, $age, $gender, $residence, $pnum, $email, $password_hash);

if ($stmt->execute()) {
    header("Location:index.php");
} else {
    ?>
    <script type="text/javascript">
        alert("<?php echo ERROR_PHONE_NUMBER_EXISTS ?>");
        window.location.href='signup.html';
    </script>
    <?php
}
?>
