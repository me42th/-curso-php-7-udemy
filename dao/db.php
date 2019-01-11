<?php

    $con = new mysqli('localhost','root','root','goat_coin');
   // var_dump($con);
    if($con->connect_error)
        echo $con->connect_error;
    
    function insert($desc,$enum){         
        global $con;   
        $stmt = $con->prepare("INSERT INTO transac values(default,?,?,null,null,null,null)");    
        $stmt->bind_param("si",$desc,$enum);
        $stmt->execute();
    }
    

    function select($value){
        global $con;
        $result = $con->query("SELECT * FROM transac where id = $value");
        return $result->fetch_array();
    }


?>

