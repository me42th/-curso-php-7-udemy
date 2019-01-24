<?php

$data = array('empresa' => 'teste', 'pessoa' => 'alguem');
// cria um cookie


print_r(get_cookie("NOME_DO_COOKIE"));

function set_cookie($nome,$array){
    // cria um cookie
    setcookie($nome,json_encode($array),time()+60*60*60);
}

function get_cookie($nome){
    if(isset($_COOKIE[$nome])){
        return json_decode($_COOKIE[$nome],true);
    } else {
        throw new Exception("Cookie 404");
    }

}

?>


