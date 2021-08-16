<?php
$showAlert = false;
$showError = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $usernames = $_POST["usernames"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    //  $exists=false;


    //  Check whether Email is already Exists
    $existSql = "SELECT * FROM users_data WHERE email = '$email'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows >0){
              // exists =  true;
        $showError = "Email already exists, Try using login";
    }
    else{
        // $exists  = false;
        if(($password == $cpassword)){
          $hash = password_hash($password, PASSWORD_DEFAULT);
          $sql ="INSERT INTO `users_data` ( `usernames`, `email`, `password`, `dt`) VALUES ('$usernames', '$email', '$hash', current_timestamp())";
          $result = mysqli_query($conn, $sql);
          if ($result) {
            
              $login = true;
              session_start();
              $_SESSION['loggedin'] = true;
              $_SESSION['email'] = $email;
              $_SESSION['usernames'] = $usernames;
              header("Location: welcome.php");
            }
          }
          
    else{
        $showError = "Passwords does not match";
    }

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
    <link rel="stylesheet" href="signup.css" />
    <title>Sign up</title>
  </head>
  <body>
  <?php 
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sucess!</strong> Your account is now created and you can login
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
          <form action="/signupform/signup.php" class="sign-up-form" method="post">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="usernames" id="usernames" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="email" id="email" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" id="password" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="cpassword" id="cpassword" required/>
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
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <a href="login.php"><button class="btn transparent" id="sign-in-btn">
                Sign in
              </button></a>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>
  </body>
</html>
