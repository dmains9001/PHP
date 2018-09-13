<?php session_start() ?>
<!DOCTYPE html>
<html lang="en" dir="ltr"
<head>
<meta charset="utf-8">
<title></title>
</head>

<?php
$username = $_POST['username'];
$password = $_POST['password'];
?>

<body>
<form method="post" action="",>
<input type="text" name="username" placeholder="Username"> <br />
<input type="password" name="password">
<br>
<input type="submit" value="go">
<br>
<input type="submit" name="logout" value="logout">
</form>

<?php
if (isset($username) && isset($password)) {
  if ($username == "damian" && $password == "password") {
      $_SESSION['username'] = $username;
    }
}

echo "Logged in as: " . $_SESSION['username'];

?>

</body>
</html>
