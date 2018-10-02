<a href=users.php>Users</a> |
<a href=upload.php>Upload</a> |
<a href=register.php>Register</a> |
<a href=login.php>Login</a> |

<?php echo (basename($_SERVER['PHP_SELF']) == "users.php") ? "<a href='users.php'> <strong>Users</strong></a>":
"<a href='users.php'>Users</a>"; ?>
