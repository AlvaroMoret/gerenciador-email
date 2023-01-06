<?php
    class Usuario{
        public $id;
        public $nome;
        public $email;
        public $login;
        public $senha;

        public function setUsuario($nome, $email, $login, $senha){
            $this->nome = $nome;
            $this->email = $email;
            $this->login = $login;
            $this->senha = $senha;
        }

        public function getUsuario_id(){
            return $this->id;
        }
        public function getUsuario_nome(){
            return $this->nome;
        }
        public function getUsuario_email(){
            return $this->email;
        }
        public function getUsuario_login(){
            return $this->login;
        }
        public function getUsuario_senha(){
            return $this->senha;
        }
        public function setUsuario_id($id){
            $this->id = $id;
        }
        public function setUsuario_nome($nome){
            return $this->nome = $nome;
        }
        public function setUsuario_email($email){
            return $this->email = $email;
        }
        public function setUsuario_login($login){
            return $this->login = $login;
        }
        public function setUsuario_senha($senha){
            return $this->senha = $senha;
        }

    }

?>