<?php
//Check to see if session has started
if (!isset($_SESSION)){
  session_start();
}

//Bring in database fann_get_total_connections
require('dbconnection.php');

//Create the SQL query
$sql = "SELECT * from fm_users";

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
        <th>Actions</th>
      </tr>

      <?php

//Loop through all table records
while($row = $result->fetch_assoc()) {
  echo "<tr>";
    echo "<td>" . $row['userid'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['password'] . "</td>";
    echo "<td>
      <form action=\"edituser.php\" method=\"get\">
        <input type=\"hidden\" name=\"id\" value=\"" . $row['userid'] . "\">
        <input type=\"submit\" value=\"edit\" name=\"edit\">
      </form>
      </td>";


    echo "<td>
          <form action=\"\" method=\"post\">
            <input name=\"id\" type=\"hidden\" value=\"" . $row['userid'] . "\">
            <input type=\"submit\" value=\"delete\" name=\"doom\">
          </form>
          </td>";
  echo "</tr>";
}
      ?>


  </body>
</html>

//Test
