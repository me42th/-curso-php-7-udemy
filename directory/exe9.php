<form method="post" enctype="multipart/form-data">

    <input type="file" name="fileUpload">
    <button type="submit">Send</button>
</form>
<?php
    // Verifico qual o tipo da requisição
    if($_SERVER["REQUEST_METHOD"] === "POST")
    {
        // Capturo o arquivo enviado pelo formulário
        $file = $_FILES['fileUpload'];
        // Verifico se houve algum erro
        if($file["error"])
        {
            echo 'a';
            throw new Exception("Error: ".$file["error"]);
        }
        // Determino qual a pasta o php armazenará os arquivos
        $dirUploads = "uploads";
        if(!is_dir($dirUploads))
        {
            mkdir($dirUploads);
        }
        // Transfiro os arquivos para a pasta indicada
        if(move_uploaded_file($file["tmp_name"],$dirUploads.DIRECTORY_SEPARATOR.$file["name"])){
            echo "Sucesso";    
        } else {
            echo 'b';
            throw new Exception("Não foi possível realizar o upload");
        }
    }    
?>