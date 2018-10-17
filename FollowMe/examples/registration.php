<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  // Grab POST data - Could be DANGEROUS, due to XSS or SQL injection
  $username = $_POST['username'];
    //Sanitize the username ($username) by removing tags
    $username = filter_var($username, FILTER_SANITIZE_STRING);
      // Trim whitespace from beginning and end of $username
      $username = trim($username);
        //Remove slashes from $username; no / allowed
        //$username = stripslashes($username);
        $username = str_replace("/","",$username);
        $username = str_replace("\\","",$username);
          //Remove white space from middle of string
          //$username = str_replace(' ', '',$username); // First param = string to look at, 2nd removes spaces, 3rd replaces spaces with nothing
            $username = preg_replace("/\s+/","", $username); //Removes tabs from username

  //Grab POST data - Password will be hashed so no need to sanitize
  $password = $_POST['password'];
  $password = password_hash($password, PASSWORD_BCRYPT);
  $sql = "INSERT INTO fm_users (username,password) VALUES ('$username','$password')";
  $conn->query($sql);
}
?>
