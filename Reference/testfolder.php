<?php
$testfolder = '/var/www/html/damian/PHP/test';

  if (file_exists($testfolder)) {
    echo "The folder $testfolder exists upon this material plane.";
      $foldertest = is_dir("test");
        if ($foldertest) {
          echo " Test is a folder for the storage of lesser files.";
        }
        else {
          echo "Test is a lesser file. Pathetic.";
        }
}
  else {
    echo "The folder $testfolder is lost to the void; we shall bring it to be.";
    $create = exec('mkdir test');
}

?>
