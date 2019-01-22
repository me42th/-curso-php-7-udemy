<?php
    if(!is_dir('images'))   //verifica se existe pasta com esse nome 
        mk_dir('images'); 
    foreach(scandir('images') as $item){ //lista arquivos da pasta num array
          if($item == '.' || $item == '..')
            continue;
          unlink("images".DIRECTORY_SEPARATOR.$item);   //    
    }
  
?>