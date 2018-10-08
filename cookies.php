<?php
if(isset($_COOKIE['lastvisit']))
{
$visit = $_COOKIE['lastvisit']; }
$year = 31536000 + time() ;

setcookie(lastvisit, time (), $year) ;
if (isset ($visit))
{
$change = time () - $visit;
if ( $change > 86400)
{
echo "You were last here on ". date("m/d/y",$visit) ;

}
}
else
{
echo "This is your first time here";

}
?>
