<?php
    class Usuario{
        private $id;
        private $name;
        private $email;
        private $sex;
        
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
        public function loadById($id){
            $sql = new Sql();
            $result = $sql->query("truncate users");
            var_dump($result);
            if(isset($results[0])){
                $row = $result[0];
                $this->setId($row['id']);
                $this->setName($row['name']);
                $this->setEmail($row['email']);
                $this->setSex($row['sex']);

            }

        }
        public function __toString(){
            return json_encode(array(
                "id"=>$this->getId(),
                "name"=>$this->getName(),
                "sex"=>$this->getSex(),
                "email"=>$this->getEmail()
            ));
        }

    }
?>