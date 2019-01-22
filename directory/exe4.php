<?php
require_once("config.php");

$sql = new Sql();
$users = $sql->select("select * from users");
$file = fopen('backup.csv','a+');
foreach($users as $user){
    fwrite($file," \n ".$user['name'].'|'.$user['sex']);
}
fclose($file);
?>