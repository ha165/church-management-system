<?php
  session_start();
  ?>
<!DOCTYPE html>
<html lang="en">

      <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate" />
        <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/login.css" />
        <script type="text/javascript" src="js/script.js"></script>
        <title>LOGIN OR SIGNUP</title>
      </head>
      <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin">
          <form action="signin.php" Method="POST" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" name="email" placeholder="Email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password"  placeholder="Password" name="pass">
            </div>
            <input type="submit" value="Login" class="btn solid" />
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
        <div class="signup">
          <form action="signup.php" method="POST" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="number" class="form-control" name="idnumber" placeholder="ID Number" required>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" class="form-control" name="fname" placeholder="First Name" required>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" class="form-control" name="sname" placeholder="Second Name" required>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="number" class="form-control" placeholder="Age" name="age" required>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="gender" placeholder="Gender" required>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Residence" name="residence" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="number" class="form-control" placeholder="Phone Number" name="pnum" required>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email"  class="form-control" placeholder="Email" name= "email" required>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" class="form-control" placeholder="Password" name="pass" required>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" class="form-control" placeholder="Confirm PassWord" name="confirmpass" required>
            </div>
            <input type="submit" class="btn" value="Sign up" />
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Welcome to Dandora Friends Church!
              Register Your Details..
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="images/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              If Youre One of Us,Click The Button to Log In
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="images/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="js/app.js"></script>
  </body>

      </html>
           