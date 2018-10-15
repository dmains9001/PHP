<?php
$output = shell_exec('ls -lah');
echo "<pre>$output</pre>";

//pwd = print working directory
$pwd = shell_exec('pwd');
echo "<pre>$pwd</pre>";

?>



<?php
$folder = file_exists("test");

if ($folder){
  $folder = is_dir("test");
  if ($folder) {
    echo "test exists, and is folder" . "</br>"  . "</br>";

    //getting files from folder test
    $testArray = scandir("test/");

    //printing out the array of files
    foreach ($testArray as $key=>$value) {
      if ($value == "." || $value == "..") {
        continue;
      }
      echo $value . "<br/>";
    }

  }
  else{
    echo "test exisits and is file";
  }
}
else{
  echo"making test now";
  mkdir("test");
}
?>

<?php

$output = shell_exec('w');
echo "<pre>$output</pre>";

 ?>





<!-- $filename = '/var/www/html/damian/PHP/test';

//checks for files and directories

//isdir

if (file_exists($filename)) {
    echo "The file $filename";
    echo "<br>- exists";
} else {
    echo "The file $filename";
      echo "<br>- does not exist";
} -->

<?php
$users = shell_exec("w");
$usersExploded = explode("/n", $users);
foreach ($usersExploded as $key => $value)
{
  if ($key == "0" || $key => "1") { continue; }
  $username = substr($value, 0, strpos($value, ' '));
  echo $username . "<br>";
}
