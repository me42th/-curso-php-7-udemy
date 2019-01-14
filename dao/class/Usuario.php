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

        public static function search($login){

            $sql = new Sql();
            return $sql->select("select * from users ");

        }

        public function loadById($id){
            $sql = new Sql();
            $result = $sql->select("select * from users where id = $id");            
            if(isset($result[0])){
                $row = $result[0];
                $this->setId($row['id']);
                $this->setName($row['name']);
                $this->setEmail($row['email']);
                $this->setSex($row['sex']);
                $this->setDtcadastro(new DateTime($row['created_at']));
                $this->setDeslogin($row['name']);
                $this->setDessenha($row['password']);
            }
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