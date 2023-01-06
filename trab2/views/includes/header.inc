<link href='https://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/header.css">

<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
        $_REQUEST['erro']= null;
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>
    
    <?php
        if(!isset($_SESSION['logado']) || $_SESSION['logado'] == false){
            echo '<a href="cadastroForm.php" class="btn_nav">Criar Conta</a>';
            echo '<a href="#" class="btn_nav" onclick="openForm()">Login</a>';
        }else{
            echo '<a href="../controlers/controlerUsuario.php?opcao=2" class="btn_nav">Logout</a>';
            echo '<a href="../controlers/controlerMensagem.php?opcao=9" class="btn_nav">Nova Mensagem</a>';
            echo '<a href="../controlers/controlerMensagem.php?opcao=3" class="btn_nav">Minhas Mensagens</a>';
            echo '<a href="../controlers/controlerMensagem.php?opcao=4" class="btn_nav">Mensagens Enviadas</a>';
        }
    ?>
    <a href="index.php" class="btn_nav">Home</a>

    <div class="form-popup" id="myForm" method="post">
        <form action="../controlers/controlerUsuario.php" class="form-container">

            <input type="text" class="inpLog" placeholder="Login ou Email" name="pLogin" required>
            <input type="password" class="inpLog" placeholder="Senha" name="pSenha" required>
            <input type="hidden" name="opcao" value="3">
            <button type="submit" class="btn">Login</button>
            <button type="reset" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>


    