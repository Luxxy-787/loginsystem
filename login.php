<?php
$login = false;
$showError = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
 include '_dbconnect.php';
 $email = $_POST["email"];
 $password = $_POST["password"];

 
  //  $sql ="Select * from users where username='$username' AND password='$password'";
   $sql ="Select * from users_data where email='$email'";
   $result = mysqli_query($conn, $sql);
   $num = mysqli_num_rows($result);
   if ($num == 1){
     while ($row = mysqli_fetch_assoc($result)){
       if (password_verify($password, $row['password'])){

            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['usernames'] = $usernames;
            header("Location: welcome.php");
          }
      }

  }
  else{
      $showError = "Invalid Credentials";
  }
}

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="login.css" />
    <title>Sign in</title>
  </head>
  <body>
  <?php 
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sucess!</strong> You are logged in
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <span aria-hidden="true">&times;</span>
</div>';
}
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <span aria-hidden="true">&times;</span>
</div>'; 
}
?>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="/signupform/login.php"
          class="sign-in-form" method="post"> 
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="email" name="email" id="email" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" id="password" required/>
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
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <a href="signup.php"><button class="btn transparent" id="sign-up-btn">
              Sign up
            </button></a>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
      </div>
    </div>
  </body>
</html>
