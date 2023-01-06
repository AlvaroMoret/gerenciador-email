<?php
    require_once 'conexao.inc';
    require_once '../classes/mensagem.inc';

    class mensagemDAO{
        private $con;

        function __construct(){
            $conexao = new Conexao();
            $this->con = $conexao->getConexao();
        }

        function getUsuario($id){
            $sql = $this->con->prepare("select nome from usuario where idUsuario = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();
            $user = $sql->fetch(PDO::FETCH_OBJ);
            return $user->nome;
        }

        public function incluirMensagem(Mensagem $mensagem, $remetente, $destinatario){
            $sql = $this->con->prepare("insert into mensagem (titulo, conteudo, lido, idEnvia, idRecebe) values(:tit, :cont, :lido, :env, :rec)");
            $sql->bindValue(':tit', $mensagem->getMensagem_titulo());
            $sql->bindValue(':cont', $mensagem->getMensagem_conteudo());
            $sql->bindValue(':lido', 0);
            $sql->bindValue(':env', $remetente);
            $sql->bindValue(':rec', $destinatario);
            $sql->execute();
        }

        public function setLida($id){
            $sql = $this->con->prepare("update mensagem set lido = 1 where id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();
        }

        public function getMensagens($id, $opcao, $filtro){
            if($opcao == 3){
                if(isset($filtro) && $filtro != '0'){
                    $sql = $this->con->prepare("select * from mensagem where idRecebe = :id and idEnvia = :filtro");
                    $sql->bindValue(':filtro', $filtro);
                }else{
                    $sql = $this->con->prepare("select * from mensagem where idRecebe = :id");
                }
            }else if($opcao == 4){
                if(isset($filtro) && $filtro != 0){                    
                    $sql = $this->con->prepare("select * from mensagem where idEnvia = :id and idRecebe = :filtro");
                    $sql->bindValue(':filtro', $filtro);
                }else{
                    $sql = $this->con->prepare("select * from mensagem where idEnvia = :id");
                }
            }

            $sql->bindValue(':id', $id);
            $sql->execute();
            $mensagens = array();
            while($row = $sql->fetch(PDO::FETCH_OBJ)){
                $mensagem = new Mensagem();
                $mensagem->setMensagem($row->titulo, $row->conteudo, $this->getUsuario($row->idEnvia), $this->getUsuario($row->idRecebe));
                $mensagem->setMensagem_id($row->id);
                $mensagem->setMensagem_lido($row->lido);
                $mensagens[] = $mensagem;
            }
            return $mensagens;
        }

        public function getMensagem($id){
            $sql = $this->con->prepare("select * from mensagem where id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();
            $row = $sql->fetch(PDO::FETCH_OBJ);
            $mensagem = new Mensagem();
            $mensagem->setMensagem($row->titulo, $row->conteudo, $this->getUsuario($row->idEnvia), $this->getUsuario($row->idRecebe));
            $mensagem->setMensagem_id($row->id);
            $mensagem->setMensagem_lido($row->lido);
            return $mensagem;

        }

        public function excluirMensagem($id, $opcao){
            if($opcao == 2){
                    $sql = $this->con->prepare("update mensagem set idRecebe = 0 where id = :id");
                    $sql->bindValue(':id', $id);
                    $sql->execute();
            }else{
                    $sql = $this->con->prepare("update mensagem set idEnvia = 0 where id = :id");
                    $sql->bindValue(':id', $id);
                    $sql->execute();
                }

            $mensagem = $this->getMensagem($id);
            if($mensagem->getMensagem_destinatario() == $mensagem->getMensagem_remetente()){
                $sql = $this->con->prepare("delete from mensagem where id = :id");
                $sql->bindValue(':id', $id);
                $sql->execute();
            }
        }




    }
?>