<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  require('dbconnection.php');
  $sql = "SELECT * FROM fm_users";
  $checktable = $conn->query($sql);
  if (mysqli_num_rows($checktable) < 1 ) {
    $sql = "CREATE TABLE IF NOT EXISTS fm_users (
      userid INT AUTO_INCREMENT,
      email VARCHAR(255),
      password VARCHAR(255),
      PRIMARY KEY(userid)
    )";
    $maketable = $conn->query($sql);
  }
  $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
      $email = trim($email);
        $email = str_replace("/","",$email);
        $email = str_replace("\\","",$email);
            $email = preg_replace("/\s+/","", $email); //Removes tabs from username

  //Grab POST data - Password will be hashed so no need to sanitize
  $password = $_POST['password'];
  $password = password_hash($password, PASSWORD_BCRYPT);
  $sql = "INSERT INTO fm_users (email,password) VALUES ('$email','$password')";
  $conn->query($sql);
}
?>
