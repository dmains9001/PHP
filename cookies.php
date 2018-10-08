<?php
$cookie_name = "user";
$cookie_value = "bob";
//setcookie($cookie_name, $cookie_value, time() + 86400 * 30, "/");
//86400 seconds = 1 day

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      if(isset($_COOKIE['user']))
      {
        echo "You have been here before.";
      }

      else
      {
        echo "This is your first visit.";
        //setcookie($cookie_name, $cookie_value, time() + 86400 * 30, "/");
        setcookie($cookie_name, $cookie_value, time() + (60), "/");
      }
      if(isset($_COOKIE['lastvisit']))
      {
      $last = $_COOKIE['lastvisit']; }
      $year = 31536000 + time() ;

      setcookie($lastvisit, time (), $year) ;
      if (isset ($last))
      {
        $change = time () - $last;
        if ( $change > 86400)
        echo "You last visited on ". date("m/d/y",$last);

    ?>
  </body>
</html>
