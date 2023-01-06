<?php

    require_once '../classes/usuario.inc';
    require_once '../classes/mensagem.inc';
    require_once '../dao/mensagemDAO.inc';
    require_once '../dao/usuarioDAO.inc';

    $opcao = (int)$_REQUEST['opcao'];


    if($opcao == 1){ //manda nova mensagem
        session_start();
        $assunto = $_REQUEST['pAssunto'];
        $conteudo = $_REQUEST['pMsg'];
        
        $remetente = $_SESSION['usuario'];
        $usuarioDAO = new usuarioDAO();
        $destinatario = $usuarioDAO->getUsuario($_REQUEST['pDest']);
        

        $mensagem = new Mensagem();
        $mensagem->setMensagem($assunto, $conteudo, $remetente->getUsuario_nome(), $destinatario->getUsuario_nome());
        $mensagemDAO = new mensagemDAO();
        $mensagemDAO->incluirMensagem($mensagem, $remetente->getUsuario_id(), $destinatario->getUsuario_id());
        
        header('Location: ../views/index.php');

    }

    if($opcao == 2 || $opcao == 5){ //excluir mensagem
        $mensagemDAO = new mensagemDAO();
        $mensagemDAO->excluirMensagem($_REQUEST['pId'], $opcao);
        if($opcao == 5)
            header('Location: controlerMensagem.php?opcao=4');
        else
            header('Location: controlerMensagem.php?opcao=3');
    }

    if($opcao == 3 || $opcao == 4 || $opcao == 9){ //pega mensagens
            session_start();
            $usuario = $_SESSION['usuario'];
            $usuarioDAO = new usuarioDAO();
            $usuarios = $usuarioDAO->getUsuarios();
            $_SESSION['vUsuarios'] = $usuarios;
            if($opcao == 9){
                header('Location: ../views/novaMensagem.php');
            }
            $mensagens = array();
            $mensagemDAO = new mensagemDAO();
            $mensagens = $mensagemDAO->getMensagens($usuario->getUsuario_id(), $opcao, $_REQUEST['filtro']);
            $_SESSION['vMensagens'] = $mensagens;

            if($opcao == 3)
                header('Location: ../views/mensagens.php');
            else
                header('Location: ../views/mensagensEnv.php');
        
    }

    if($opcao == 6 || $opcao == 8){ //pega 1 mensagem
        session_start();
        $mensagemDAO = new mensagemDAO();
        if($opcao == 6){
            $mensagemDAO->setLida($_REQUEST['id']);
        }
        $mensagem = $mensagemDAO->getMensagem($_REQUEST['id']);
        $_SESSION['msg'] = $mensagem;
        header('Location: ../views/msgCompleta.php');
    }

    if($opcao == 7){ //responder mensagem
        session_start();
        $mensagemDAO = new mensagemDAO();
        $usuarioDAO = new usuarioDAO();
        $mensagem = $mensagemDAO->getMensagem($_REQUEST['id']);
        if($mensagem->getMensagem_remetente() == $_SESSION['usuario']->getUsuario_nome()){
            $usuario = $usuarioDAO->getUsuarioNome($mensagem->getMensagem_destinatario());
        }else{
            $usuario = $usuarioDAO->getUsuarioNome($mensagem->getMensagem_remetente());
        }
        header('Location: ../views/novaMensagem.php?pDest=' . $usuario->getUsuario_email() . '&pAssunto=' . $mensagem->getMensagem_titulo());
    }

?>