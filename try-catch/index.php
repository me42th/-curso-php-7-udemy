<?php

echo $_GET['abc'];


//exemplo 3
//configura qual nivel de alerta
//o php deve emitir
function config_error(){
    error_reporting(E_ALL);
    set_error_handler("error_handler");
    
}

// exemplo 2
function error_handler($code,$message,$file,$line){
    echo json_encode(
        array(  'code'=>$code,
                'msg'=>$message,
                'file'=>$file,
                'line'=>$line)
    );
}

// exemplo 1
function trie(){
    try{
        throw new Exception("texto",42);
    }catch(Exception $ex){
        echo json_encode(array(
            "msg" => $ex->getMessage(),
            "line" => $ex->getLine(),
            "file" => $ex->getFile(),
            "code" => $ex->getCode()
        ));
    }
}

?>