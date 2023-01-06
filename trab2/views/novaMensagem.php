
<html>

<?php
     require_once '../classes/usuario.inc';
     require_once 'includes/autenticar.inc';
     require_once 'includes/header.inc';
?>

    <head>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/cadForm.css">

    </head>
    <body> 


    <div class="form">

    <div class="tab-content">
        <div id="signup">   
            <h2>Mensagem</h2>
            
            <form action="../controlers/controlerMensagem.php?opcao=1" method="post">
                
                <div class="field-msg">
                    <select name="pDest" id="pDest" required>
                        <option value="" class="ph" hidden>Selecione o destinatário</option>
                    <?php 
                        $usuarios = $_SESSION['vUsuarios'];
                        foreach($usuarios as $usuario){
                            echo '<option value=' . $usuario->getUsuario_email() . '">' . $usuario->getUsuario_nome() . " - " . $usuario->getUsuario_email() . '</option>';
                        }
                    ?>
                </div><br>
        
                <div class="field-msg">
                    <input type="text" name="pAssunto" required autocomplete="off" id="pAssunto" placeholder="Assunto"/>
                </div>
                
                <div class="field-msg">
                    <textarea type="text" name="pMsg" required autocomplete="off" id="pMsg" placeholder="Mensagem"></textarea>
                </div>
                
                <input type="submit" class="button button-block"/>
                    
                    </form>
                    
                </div>
                
                <div id="login"></div> <!-- /form -->       
            
        
        
        </div><!-- tab-content -->
    
    </div> <!-- /form -->
    </body>
    <?php
        if(isset($_REQUEST['pDest']) && isset($_REQUEST['pAssunto'])){
        ?>

            <script>
                var dest = '<?php echo $_REQUEST['pDest']; ?>';
                var assunto = "RESPOSTA: <?php echo $_REQUEST['pAssunto']; ?>";
                document.getElementById("pDest").value = dest;
                document.getElementById("pAssunto").value = assunto;
            </script>


    <?php
        }
    ?>
    
    
    <?php
        require_once 'includes/footer.inc';
    ?>
</html>