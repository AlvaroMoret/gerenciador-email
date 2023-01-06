<html>

    <head>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/cadForm.css">
        <script>
            function labelize(idLabel, idInput){
                if(document.getElementById(idInput).value == ""){
                    document.getElementById(idLabel).style.top = "-15px";
                    document.getElementById(idLabel).style.fontSize = "22px";                
                }else{
                    document.getElementById(idLabel).style.top = "-55px";                
                    document.getElementById(idLabel).style.fontSize = "17px";                
                }
            }
        </script>
    </head>
    <body> 
        
    <div class="form">
    
    <div class="tab-content">
        <div id="signup">   
            <h1>Cadastrar</h1>
            
            <form action="../controlers/controlerUsuario.php?opcao=1" method="post">
                
                <div class="top-row">
                    <div class="field-wrap">
                        <label for="pNome" id="lNome" class="label font-weight-semibold">Nome<span class="req">*</span></label>
                        <input type="text" name="pNome" required autocomplete="off" id="pNome" onkeyup="labelize('lNome', 'pNome')"/>
                    </div>
                    
                    <div class="field-wrap">
                        <label id="lLogin" for="pLogin" class="label font-weight-semibold">Login<span class="req">*</span></label>
                        <input type="text" name="pLogin" required autocomplete="off" id="pLogin" onkeyup="labelize('lLogin', 'pLogin')"/>
                    </div>
                </div>
        
        <div class="field-wrap">
            <label id="lEmail" for="pEmail" class="label font-weight-semibold">Email<span class="req">*</span></label>
            <input type="email" name="pEmail" required autocomplete="off" id="pEmail" onkeyup="labelize('lEmail', 'pEmail')"/>
        </div>
        
        <div class="field-wrap">
            <label id="lSenha" for="pSenha" class="label font-weight-semibold">Senha<span class="req">*</span></label>
            <input type="password" name="pSenha" required autocomplete="off" id="pSenha" onkeyup="labelize('lSenha', 'pSenha')"/>
        </div>
        
        <button type="submit" class="button button-block">Cadastrar</button>
            
            </form>
            
        </div>
        
        <div id="login"></div>        
            
        
        
        </div><!-- tab-content -->
    
    </div> <!-- /form -->
    </body>
</html>