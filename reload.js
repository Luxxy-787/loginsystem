function redirectToLogin() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      window.location.href = "login.php"; // redirect to login.php
      window.close(); // close the current window
    }
  };
  xhttp.open("GET", "login.php", true);
  xhttp.send();
}

function redirectToSignup() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      window.location.href = "signup.php"; // redirect to login.php
      window.close(); // close the current window
    }
  };
  xhttp.open("GET", "signup.php", true);
  xhttp.send();
}
