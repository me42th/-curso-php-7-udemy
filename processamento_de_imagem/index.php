<?php

    thumbnail();
    
    function thumbnail(){
        header("Content-type: image/jpeg");
        $file = "img".DIRECTORY_SEPARATOR."wallpaper.jpg";
        $new_width = 256;
        $new_height = 256;
       
        //largura e altura antigos v1
        $data = getimagesize($file);
        $width = $data[0];    
        $height = $data[1];    

        //largura e altura antigos v2
        list($old_width,$old_height) = getimagesize($file);

        //true collors
        $new_image = imagecreatetruecolor($new_width,$new_height);
        $old_image = imagecreatefromjpeg($file);

        // nova img, original img, crop x new, crop y new, crop x old, crop y old,new width, new height, old width, old hight
        imagecopyresampled($new_image, $old_image, 0,0,0,0,$new_width,$new_height,$old_width,$old_height);

        imagejpeg($new_image);

        imagedestroy($old_image);
        imagedestroy($new_image);

    }


    function com_img_font($nome){
        $image = imagecreatefromjpeg("img".DIRECTORY_SEPARATOR."certificado.jpg"); // com img
        $titleColor = imagecolorallocate($image,0,0,0);
        $gray = imagecolorallocate($image,100,100,100);
        // imagem, tamanho, angulo, direita, topo, cor, fonte, texto
        imagettftext($image, 32, 0, 150, 150,$titleColor,"fonts".DIRECTORY_SEPARATOR."Bevan".DIRECTORY_SEPARATOR."Bevan-Regular.ttf" ,"CERTIFICADO" );
        // imagem, tamanho, angulo, direita, topo, cor, fonte, texto
        imagettftext($image, 32, 0, 150, 350,$titleColor,"fonts".DIRECTORY_SEPARATOR."Playball".DIRECTORY_SEPARATOR."Playball-Regular.ttf" ,$nome );
        
        imagestring($image, 3, 440, 570, utf8_decode("Concluído em: ").date("d/m/Y"),$titleColor);
        //header-response
        header("Content-type: image/jpeg");
        imagejpeg($image);
        imagedestroy($image);

    }

    function com_img($nome){
        $image = imagecreatefromjpeg("img".DIRECTORY_SEPARATOR."certificado.jpg"); // com img
        $titleColor = imagecolorallocate($image,0,0,0);
        $gray = imagecolorallocate($image,100,100,100);
        // imagem, tamanho [1,5], direita, topo, texto, cor
        imagestring($image, 5, 450, 150, "CERTIFICADO",$titleColor);
        imagestring($image, 5, 440, 350, $nome,$titleColor);
        imagestring($image, 3, 440, 370, utf8_decode("Concluído em: ").date("d/m/Y"),$titleColor);
        //header-response
        header("Content-type: image/jpeg");
        imagejpeg($image);
        imagedestroy($image);
    }

    function gd(){
        header("Content-Type: image/png");
        $image = imagecreate(256,256); // largura px/altura px
        $black = imagecolorallocate($image,0,0,0); // rgb
        $red = imagecolorallocate($image,255,0,0); // rgb
        imagestring($image,5,60,120,"CURSO PHP",$red); // tamanho[1,5], direita, topo, texto,cor
        imagepng($image);
        imagedestroy($image);
    }

?>