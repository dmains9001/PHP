<?php
session_start();
require('dbconnection.php');

if (isset($_POST['username'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

//SQL statement to execute. Surround variables with single quotes
$sql = "SELECT username, password FROM users where username = '$username'";

//Execute the SQL and return array to $result
$result = $conn->query($sql);

//Extraction of the returned query info
while ($row = $result->fetch_assoc()) {
  //$row['username'] and $row['password'] is value from database
  if ($username == $row['username'] && password_verify($password == $row['password']) ) {
    $_SESSION['username'] = $username;

    } //closes if statement
  } //closes while loop
} //closes POST condition
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

<?php


if (isset($_POST['logout'])){
  unset($_SESSION['username']);
}

  <body>

  <a href="register.php">Register</a>

  <?php
  if( isset($_SESSION['username']) ) {
    echo "<a href=\"upload.php\"> | Upload</a>";
  }
  ?>

  <a href="upload.php"> | Upload</a>
  <br />


  <form method="post" action="",>
  <input type="text" name="username" placeholder="Username"> <br />
  <input type="password" name="password">
  <br>
  <input type="submit" value="go">
  <br>
  <input type="submit" name="logout" value="logout">
  </form>

</body>
</html>

?>

<?php

echo "User logged in.";

?>


?>
