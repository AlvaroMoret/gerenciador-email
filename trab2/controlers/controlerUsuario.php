<?php

    require_once '../classes/usuario.inc';
    require_once '../dao/usuarioDAO.inc';


    $opcao = (int)$_REQUEST['opcao'];

    if($opcao == 1){ // Cadastra um novo usuário, inclui no banco e faz o login
        $nome = $_REQUEST['pNome'];
        $email = $_REQUEST['pEmail'];
        $login = $_REQUEST['pLogin'];
        $senha = $_REQUEST['pSenha'];

        $usuario = new Usuario();
        $usuario->setUsuario($nome, $email, $login, $senha);
        
        $usuarioDAO = new usuarioDAO();
        $usuarioDAO->incluirUsuario($usuario);
        
        header('Location: controlerUsuario.php?opcao=3&pLogin=' . $login . '&pSenha=' . $senha);
    }
    
    if($opcao == 2){ // Faz o logout do usuário
        session_start();
        $_SESSION['login'] = null;
        $_SESSION['logado'] = false;
        session_destroy();
        header('Location: ../views/index.php');
    }

    if($opcao == 3){ // Login do usuário
        $login = $_REQUEST['pLogin'];
        $senha = $_REQUEST['pSenha'];
        
        $usuarioDAO = new usuarioDAO();
        
        if($usuarioDAO->loginUsuario($login, $senha)){
            session_start();
            $_SESSION['logado'] = true;
            header('Location: ../views/index.php');
        }else{
            header('Location: ../views/index.php?erro=1');
        }
    }