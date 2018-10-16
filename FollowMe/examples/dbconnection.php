<?php
  // Setting up the Database Connection
  $db_host = 'localhost'; //Database is install on PHP server
  $db_user = 'damian'; //name to login to MySQL
  $db_password = 'southhills#'; //password to login to MySQL
  $db_name = 'damian'; //name of the database within MySQL
  $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  ?>
