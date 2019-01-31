<?php


    echo ssl_crypt();

    

    //criptografia
    function ssl_crypt($data = ['nome' => 'David']){
        
        define('SECRET_IV', pack('a16','senha'));
        define('SECRET', pack('a16','senha'));
        
        $open_ssl = openssl_encrypt(
            json_encode($data), //dados que serão encriptados
            'AES-128-CBC',      //algoritmo
            SECRET,             //chave    
            0,                  //...
            SECRET_IV           //chave II
        );        
        return $open_ssl;
    }
    
    function ssl_decrypt($data){
        define('SECRET_IV', pack('a16','senha'));
        define('SECRET', pack('a16','senha'));

        $open_ssl = openssl_decrypt(
            $data, //dados que serão encriptados
            'AES-128-CBC',      //algoritmo
            SECRET,             //chave    
            0,                  //...
            SECRET_IV           //chave II
        );        
        return $open_ssl;
    }    
    
    function m_crypt($data = ['nome' => 'David'])
    {        
        define('SECRET', pack('a16','senha')); //converte para uma string com 16 caracteres
        $mcrypt = base64_encode(mcrypt_encrypt(               
            MCRYPT_RIJNDAEL_128, // algoritmo de criptografia a ser usado                
            SECRET,              // chave decrypt  
            json_encode($data),  // dados encriptados    
            MCRYPT_MODE_ECB      // modo de criptografia
        ));
        return $mcrypt;        
    }

    function m_decrypt($data){
        define('SECRET', pack('a16','senha')); //converte para uma string com 16 caracteres
        $decrypt = mcrypt_decrypt(               
            MCRYPT_RIJNDAEL_128, // algoritmo de criptografia a ser usado                
            SECRET,              // chave decrypt  
            base64_decode($data),// dados encriptados    
            MCRYPT_MODE_ECB      // modo de criptografia
        );
        return $decrypt;        
    }
    
    //xxs
    function remove_html($boo = true,$allow="")
    {
        //remove todas as tags, exceto as enviadas na variavel allow
        if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['xxs']))
            echo $boo?strip_tags($_POST['xxs'],$allow):$_POST['xxs'];
        echo "<form method='post'>";
        echo "<input type='text' name='xxs'>";
        echo "<button type='submit'>XXS</button>";
        echo "</form>";
        
    }

    //xxs
    function print_html($boo = true)
    {
        //imprime o texto html
        if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['xxs']))
            echo $boo?htmlentities($_POST['xxs']):$_POST['xxs'];
        echo "<form method='post'>";
        echo "<input type='text' name='xxs'>";
        echo "<button type='submit'>XXS</button>";
        echo "</form>";
        
    }


    //no-robots
    function captcha()
    {
        echo "<script src='https://www.google.com/recaptcha/api.js'></script>";
        echo "<form method='post'>";
        echo "<br><div class='g-recaptcha' data-sitekey='6Lc6PY4UAAAAAB5nlVEaE1lTOykmy_gFTDahTjNH'></div><br>";
        echo "<input type='email' name='captcha'>";
        echo "<button type='submit'>Robot</button>";
        echo "</form>";
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['captcha']))
        {            
            $ch = curl_init();
            //declara url
            curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
            //desabilita ssl
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            //gera a query string
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['secret'=>'6Lc6PY4UAAAAAEtUbHuDP8FA2K0N4MbepOwdsmFx','response' => $_POST["g-recaptcha-response"],'remoteip'=>$_SERVER['REMOTE_ADDR']]));
            //especifica que haverá retorno
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //executa
            $captcha = json_decode(curl_exec($ch));
            curl_close($ch);
            if($captcha->success)
                echo ':D';
            else    
                echo ':(';
        }
    }

   //0777
   function mk_dir($pasta,$per)
   {
       if(!is_dir($pasta)) mkdir($pasta,$per);
   }  
  
   //sql injection
   function select_msqli()
    {   
       if(!is_numeric($_GET['id']))
        {
            exit(":D");
        }
       $conn = mysqli_connect("localhost","root", "root","db");
       $condicao = isset($_GET['id'])?" where id = ".$_GET['id']:"";
       $sql = "SELECT * FROM user $condicao";
       $exec = mysqli_query($conn, $sql);
       while($resultado = mysqli_fetch_object($exec))
       { 
            echo $resultado->name."<br>";
   
        }
    }

   //command injection
   function form_cmd()
   {
        if($_SERVER["REQUEST_METHOD"] === 'POST')
        {
            echo "<pre>";
            echo system($_POST['cmd'],$retorno);
            echo $retorno;
            echo"</pre>";
        }
        echo "<form method='post'>";
        echo "<input type='text' name='cmd'>";
        echo "<button type='submit'>Shell</button>";
        echo "</form>";
   }
?>    