<?php
    $images = scandir("images");
    
    $data = array();
    foreach($images as $img){
        if(in_array($img,array('.','..'))){
            continue;
        }
        $filename = "images".DIRECTORY_SEPARATOR.$img;
        $info = pathinfo($filename);
        $info['size'] = filesize($filename);
        $info['modified'] = date("d/m/Y H:i:s", filemtime($fileneame));
        $info['url'] = "http://localhost/curso-udemy/directory/".$filename;
        array_push($data, $info);
     
    }
    var_dump($data);
?>