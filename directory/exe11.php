<?php

$dir1 = "folder_01";
$dir2 = "folder_02";
if(!is_dir($dir1)) mkdir($dir1);
if(!is_dir($dir2)) mkdir($dir2);
$filename = "README.txt";
if(!file_exists($dir1.DIRECTORY_SEPARATOR.$filename) && !file_exists($dir2.DIRECTORY_SEPARATOR.$filename))
{
    fopen($dir1.DIRECTORY_SEPARATOR.$filename,"w+");
    fclose();
}
// movo de uma pasta
else if(!file_exists($dir2.DIRECTORY_SEPARATOR.$filename)){
    rename($dir1.DIRECTORY_SEPARATOR.$filename,$dir2.DIRECTORY_SEPARATOR.$filename);
// para outra, similar a muttex
} else {
    rename($dir2.DIRECTORY_SEPARATOR.$filename,$dir1.DIRECTORY_SEPARATOR.$filename);
}
?>