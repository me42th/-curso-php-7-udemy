<?php

    require_once("config.php");
    $root = new Usuario();
    //Carrega um usuário
    //$root->loadById(1);
    //echo $root;
    foreach(Usuario::search('@gmail') as $user){
        var_dump($user);
    }    
    
?>