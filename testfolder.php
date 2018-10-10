<?php
$testfolder = '/var/www/html/damian/PHP/test';

  if (file_exists($testfolder)) {
    echo "The folder $testfolder exists upon this material plane";
}
  else {
    echo "The folder $testfolder is lost to the void; we shall bring it to be. Umbasa.";
    $create = exec('mkdir test');
}

?>
