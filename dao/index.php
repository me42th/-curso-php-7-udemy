<?php

    require_once("config.php");
    $root = new Usuario();
    //Carrega um usuário
    //$root->loadById(1);
    //echo $root;
    foreach(Usuario::getList() as $user){
         print_r($user);echo"<br>";echo"<br>";
    }    
    
?>