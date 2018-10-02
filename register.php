<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  require('dbconnection.php');
  // Grab POST data - Could be DANGEROUS, due to XSS or SQL injection
  $username = $_POST['username'];
    //Sanitize the username ($username) by removing tags
    $username = filter_var($username, FILTER_SANITIZE_STRING);
      // Trim whitespace from beginning and end of $username
      $username = trim($username);
        //Remove slashes from $username; no / allowed
        $username = stripslashes($username);
          //Remove white space from middle of string
          $username = str_replace(' ', '',$username); // First param = string to look at, 2nd removes spaces, 3rd replaces spaces with nothing
          
  //Grab POST data - Password will be hashed so no need to sanitize
  $password = $_POST['password'];
  $password = password_hash($password, PASSWORD_BCRYPT);
  $sql = "INSERT INTO users (username,password) VALUES ('$username','$password')";
  $conn->query($sql);
}

include('navbar.php');

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="post" action="">
      <input type="text" name="username"> <br>
      <input type="password" name="password"><br>
      <input type="submit">
    </form>
  </body>
</html>
