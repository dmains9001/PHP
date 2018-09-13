<?php
// Sets up a database connection
$db_host = 'localhost';
$db_user = 'damian'; //name to login to mysql
$db_password = 'southhills#'; //password to login to mysql
$db_name = 'damian'; //name of the database within mysql

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
