<?php
    echo 'start';
    require_once("config.php");
    $root = new Usuario();
 
    $root->loadById(1);
    

    echo 'end';
    
?>