<?php

    $con = new mysqli('localhost','root','root','goat_coin');
   // var_dump($con);
    if($con->connect_error)
        echo $con->connect_error;
    $stmt = $con->prepare("INSERT INTO transac values(default,?,?,null,null,null,null)");    
    $stmt->bind_param("si",$desc,$enum);
    $desc = "texto";
    $enum = 1;    
    $stmt->execute();

?>