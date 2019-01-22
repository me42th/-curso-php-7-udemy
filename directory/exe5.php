<?php

$file = fopen("teste.txt","w+"); // cria o arquivo

fclose($file);
unlink('teste.txt'); // deleta o arquivo

?>