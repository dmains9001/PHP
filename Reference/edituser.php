<?php
if (!isset($_SESSION)){
  session_start();
}

if (!isset($_SESSION['username'])){
  header('Location: login.php');

  // require('navbar.php'); < ---- Adds in the navbar
}

if (isset($_GET['id']) && $_GET['edit']=="edit") {
  require('dbconnection.php'); //Brings in database connection
  $sql = "SELECT * from users where userid = " . $_GET['id']; //"id" is int datatype; don't quote "" it.
  $result = $conn->query($sql);

  //Starts the form
  echo "<form action=\"\" method=\"post\">";

  while ($row = $result->fetch_assoc()) {
    echo "<input name=\"userid\" type=\"text\" disabled value=\"" . $row['userid'] . "\">";
    echo "<br />";
    echo "<input name=\"username\" type=\"text\" value=\"" . $row['username'] . "\">";
    echo "<br />";
    echo "<input name=\"password\" type=\"text\" value=\"" . $row['password'] . "\">";
    echo "<input type=\"submit\" name=\"submit\" value=\"change\">";
    echo "<br />";
  }

echo "</form>";

} else {
  echo "Something went wrong.";
}



?>