<?php

class Conexao{
      
      private $servidor_mysql = 'localhost';
      private $nome_banco = 'webforum';
      private $usuario = 'root';
      private $senha = 'aluno'; 
      private $con;

      function Conexao(){
            
      }

      public function getConexao()
      {
            $this->con = new PDO("mysql:host=$this->servidor_mysql;dbname=$this->nome_banco","$this->usuario","$this->senha");
            return $this->con;
      }
}

?>