   <?php
    session_start();
$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  require_once __DIR__ . "../../connection/connect.php";

  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  $password = $_POST['pass'];

  if (!$email || !$password ) {
    $is_invalid = true;
    exit;
  }

  $stmt = $mysqli->prepare("SELECT username, password FROM admin WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  if ($user) {
    if (password_verify($password, $user["password"])) {

      session_regenerate_id(true);

      $_SESSION["user_id"] = $user["username"];

      header("Location:dashboard.php");
      exit;
    }
  }

  $is_invalid = true;
}

?>

            <?php if (isset($_SESSION["user_id"])) : ?>
              <p>You are Logged In</p>
              <p> <a href="logout.php"> Log out</a> </p>
            <?php else: ?>
              <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style1.css">
  <script type="text/javascript" src="js/script.js"></script>
  <title>LOGIN</title>
</head>

<body>
  <div class="wrapper">
    <div class="form-wrapper sign-in">
      <?php if ($is_invalid) : ?>
        <em>Invalid Login</em>
      <?php endif; ?>
      <form action="" method="post">
        <h2>LOGIN</h2>
        <div class="input-group">
          <input type="email" name="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" required>
          <label for="">Email Address</label>
        </div>
        <div class="input-group">
          <input type="password" name="pass" required>
          <label for="">Password</label>
        </div>
        <button type="submit">Login</button>
        <div class="signup-link">
        </div>
      </form>
    </div>
  </div>

</body>

</html>
            <?php endif; ?>
      </body>
    </html>
