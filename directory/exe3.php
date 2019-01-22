<?php
    $file = fopen('log.txt','a+'); // + indica que o arquivo deve ser criado
    
    fwrite($file, date(" Y-m-d H:i:s")."  \n");

    fclose($file);
?>