<?php

    $con = new mysqli('localhost','root','root','goat_coin');
   // var_dump($con);
    if($con->connect_error)
        echo $con->connect_error;
        

?>