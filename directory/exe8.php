<?php
    $filename = "images".DIRECTORY_SEPARATOR.'imagem.png';

    // starta stream dos bites e converte em base 64
    $base64 = base64_encode(file_get_contents($filename));

    // identifica qual o mimetype do arquivo
    $fileinfo = new finfo(FILEINFO_MIME_TYPE);
    $mimetype = $fileinfo->file($filename);

    $base64encode = "data:".$mimetype.";base64,".$base64;    
  
?>

<img src="<?=$base64encode;?>">
<a href="<?=$base64encode;?>" target="_blank">Link</a>