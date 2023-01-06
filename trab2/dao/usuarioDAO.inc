<?php
    require_once 'conexao.inc';
    require_once '../classes/usuario.inc';

    class usuarioDAO{
        private $con;

        function __construct(){
            $conexao = new Conexao();
            $this->con = $conexao->getConexao();
        }

        public function incluirUsuario(Usuario $usuario){
            $sql = $this->con->prepare("insert into usuario (nome, email, login, senha) values(:nome, :email, :login, :senha)");
            $sql->bindValue(':nome', $usuario->getUsuario_nome());
            $sql->bindValue(':email', $usuario->getUsuario_email());
            $sql->bindValue(':login', $usuario->getUsuario_login());
            $sql->bindValue(':senha', $usuario->getUsuario_senha());
            $sql->execute();
        }

        public function loginUsuario($login, $senha){
            
            $sql = $this->con->prepare("select * from usuario where (login = :login or email = :login) and senha = :senha");
            $sql->bindValue(':login', $login);
            $sql->bindValue(':senha', $senha);
            $sql->execute();
            
            if($sql->rowCount()){
                $row = $sql->fetch(PDO::FETCH_OBJ);
                $user = new Usuario();
                $user->setUsuario($row->nome, $row->email, $row->login, $row->senha);
                $user->setUsuario_id($row->idUsuario);
                session_start();
                $_SESSION['usuario'] = $user;
                return true;
            }else{
                return false;
            }
        }

        public function getUsuario($email){
            $sql = $this->con->prepare("select * from usuario where email = :email");
            $sql->bindValue(':email', $email);
            $sql->execute();
            $row = $sql->fetch(PDO::FETCH_OBJ);
            $user = new Usuario();
            $user->setUsuario($row->nome, $row->email, $row->login, $row->senha);
            $user->setUsuario_id($row->idUsuario);
            return $user;
        }

        public function getUsuarioNome($nome){
            $sql = $this->con->prepare("select * from usuario where nome = :nom");
            $sql->bindValue(':nom', $nome);
            $sql->execute();
            $row = $sql->fetch(PDO::FETCH_OBJ);
            $user = new Usuario();
            $user->setUsuario($row->nome, $row->email, $row->login, $row->senha);
            $user->setUsuario_id($row->idUsuario);
            return $user;
        }

        public function getUsuarios(){
            $sql = $this->con->prepare("select * from usuario where idUsuario != '0'");
            $sql->execute();
            $usuarios = array();
            while($row = $sql->fetch(PDO::FETCH_OBJ)){
                $user = new Usuario();
                $user->setUsuario($row->nome, $row->email, $row->login, $row->senha);
                $user->setUsuario_id($row->idUsuario);
                $usuarios[] = $user;
            }
            return $usuarios;
        }


    }