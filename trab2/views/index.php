<?php
     require_once '../classes/usuario.inc';
     session_start();
     require_once 'includes/header.inc';
?>


<?php
          if(isset($_REQUEST['erro'])){ //isset verifica se foi setado 'erro'  
            if((int)($_REQUEST['erro']) == 1)
                echo "<b><font class='erro'>Login Incorreto</font>";
            else
                if((int)($_REQUEST['erro']) == 2)
                    echo "<b><font class='erro' style='color:white'>Por Favor, efetue o login</font>";
          }
?>


<div class="notepad">
  <div class="top"></div>
  <div class="paper" contenteditable="true">
    Bem Vindo <?php if(isset($_SESSION['usuario'])) echo $_SESSION['usuario']->getUsuario_nome() ?>! <br>
    Este é o trabalho 2 da disciplina de Desenvolvimento de Sistemas WEB.<br>
    Trabalho consistente em um gerenciador de e-mails/mensagens.<br>
    Realizado por Álvaro Moret Pinheiro, aluno do curso de Sistemas de Informação.<br>
    Mais informações minhas abaixo no footer e sobre o trabalho na descrição escrita do mesmo.<br>
    Obrigado por utilizar o nosso sistema!<br>
  </div>
</div>




<?php
     require_once 'includes/footer.inc';
?>