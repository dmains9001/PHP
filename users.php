<?php
//Check to see if session has started
if (!isset($_SESSION)){
  session_start();
}
//If user is not logged in, send them to login page
if (!isset($_SESSION['username'])){
  header('Location: login.php');
}
//Bring in database fann_get_total_connections
require('dbconnection.php');
//Create the SQL query
$sql = "SELECT * from users";

//Execute the SQL query
$result = $conn->query($sql);

//Close DB connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <table>
      <tr>
        <th>User ID</th>
        <th>Username</th>
        <th>Password Hash</th>
      </tr>

      <?php

//Loop through all table records
while($row = $result->fetch_assoc()) {
  echo "<tr>";
    echo "<td>" . $row['userid'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['password'] . "</td>";
  echo "</tr>";
}
      ?>


  </body>
</html>
