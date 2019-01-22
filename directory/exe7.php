<?php
    $filename = "usuarios.csv";
    // verifica se o arquivo existe
    if(file_exists($filename)){ 
        $file = fopen($filename,"r"); // apenas leitura 
        $headers = explode(',',fgets($file)); // implode()
       
        $array_data = array();
        $rowArray = array();
       
        while($row = fgets($file)){
            $rowData = explode(',',$row);
            unset($rowArray);
            for($cont = 0;$cont < count($headers);$cont++){
                $rowArray[$headers[$cont]] = $rowData[$cont];
            }
            $array_data[] = $rowArray;           
        }
        var_dump($array_data);
        fclose($file);

    }
?>