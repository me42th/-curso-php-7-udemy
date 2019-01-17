<?php

    require_once("config.php");
    //$root = new Usuario();
    //Carrega um usuário
    //$root->loadById(1);
    //echo $root;
    foreach(Usuario::search('@gmail') as $user){
         Usuario::insert($user);        
    }
    //$user = Usuario::loadById(1);
    //$user->setEmail($_GET['email']);  
    //Usuario::update($user);  
    
    //Usuario::delete(Usuario::loadById($_GET['id']));
    echo 'sucesso';
?>