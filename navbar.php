echo "<br />"";
echo "<a href=users.php>Users</a>";
echo "<a href=upload.php>Upload</a>";
echo "<a href=register.php>Register</a>";
echo "<a href=login.php>Login</a>";


}
<?php echo (basename($_SERVER['PHP_SELF']) == "users.php") ? "<a href='users.php'> <strong>Users</strong></a>":
"<a href='users.php'>Users</a>";
<br />
echo (basename($_SERVER['PHP_SELF']) == "upload.php") ? "<a href='upload.php'> <strong>Upload</strong></a>":
"<a href='upload.php'>Upload</a>";
<br />
echo (basename($_SERVER['PHP_SELF']) == "register.php") ? "<a href='users.php'> <strong>Register</strong></a>":
"<a href='register.php'>Register</a>";
<br />
echo (basename($_SERVER['PHP_SELF']) == "login.php") ? "<a href='users.php'> <strong>Login</strong></a>":
"<a href='login.php'>Login</a>";
<br />
