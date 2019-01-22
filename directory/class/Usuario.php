<?php
    class Usuario{
        private $id;
        private $deslogin;
        private $dessenha;
        private $dtcadastro;
        private $name;
        private $email;
        private $sex;                
        public function getDeslogin(){
            return $this->deslogin;
        }
        
        public function getDtcadastro(){
            return $this->dtcadastro;
        }

        public function getDessenha(){
            return $this->dessenha;
        }

        public function getId(){
            return $this->id;
        }        
        public function getName(){
            return $this->name;
        }
        public function getEmail(){
            return $this->email;
        }
        public function getSex(){
            return $this->sex;
        }        
        public function setId ($value){
            $this->id = $value;
        }
        public function setName ($value){
            $this->name = $value;
        }
        public function setEmail ($value){
            $this->email = $value;
        }
        public function setSex ($value){
            $this->sex = $value;
        }
        public function setDeslogin($value){
            $this->deslogin = $value;
        }
        public function setDessenha($value){
            $this->dessenha = $value;    
        }
        public function setDtcadastro($value){
            $this->dtcadastro = $value;
        }

        public static function getList(){
            $sql = new Sql();
            return $sql->select("select * from users order by created_at;");
        }
        
        public static function delete($user){
            $sql = new Sql();
            $sql->query("delete from users where id = ".$user->getID().";");
        }

        public static function search($login){

            $sql = new Sql();
            $resultado = $sql->select("select * from users where email like :search order by created_at;",
            array(':search'=>"%".$login."%"));
            $array;
            if(count($resultado) > 0)
                for($cont = 0; $cont < count($resultado);$cont++)
                {   
                    $user = new Usuario();
                    $user->setData($resultado[$cont]);    
                    $array[$cont] = $user;
                }
            else return null;         
            return $array;

        }

        public static function insert($user){

            $sql = new Sql();
           
            $sql->query("insert into users values(default, null,'".$user->getName()."', '".$user->getEmail().($sql->select('select id from users order by id desc;')[0]['id']+1)."', null,'".$user->getDessenha()."', null, null, null, null, null);");
        
            return $sql->select('select * from users where id = LAST_INSERTED_ID()');
            
        }

        public static function update($user){
            $sql = new Sql();
            $sql->query("update users set name='".$user->getName()."', email='".$user->getEmail()."' ,password='".$user->getDessenha()."' where id = '".$user->getId()."';");
       }

        

        public function setData($data){
                $this->setId($data['id']);
                $this->setName($data['name']);
                $this->setEmail($data['email']);
                $this->setSex($data['sex']);
                $this->setDtcadastro(new DateTime($data['created_at']));
                $this->setDeslogin($data['email']);
                $this->setDessenha($data['password']);
        }

        public function login($login){
            $array;
            if(count($array = $this->search($login)) > 0)
                $this->setData($array[0]);
            else
                throw new Exception("Email não encontrado");    
        }

        public static function loadById($id){
            $sql = new Sql();
            $result = $sql->select("select * from users where id = $id");            
            $user = new Usuario();
            if(isset($result[0]))
                $user->setData($result[0]);
            else throw new Exception("Usuario não encontrado");
            return $user;
        }
        public function __toString(){
            return json_encode(array(
                "id"=>$this->getId(),
                "name"=>$this->getName(),
                "sex"=>$this->getSex(),
                "email"=>$this->getEmail(),
                "dtcadastro"=>$this->getDtcadastro()->format("d|m|Y"),
                "deslogin"=>$this->getDeslogin(),
                "dessenha"=>$this->getDessenha()
            ));
        }
    }
?>