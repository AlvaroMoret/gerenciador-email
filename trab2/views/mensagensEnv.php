<?php
     require_once '../classes/usuario.inc';
     require_once '../classes/mensagem.inc';
     require_once 'includes/autenticar.inc';
     require_once 'includes/header.inc';
?>


<head>

        <link rel="stylesheet" type="text/css" href="css/mencss.css">

</head>

<body>
    <br>

    <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn">Destinatario</button>
        <div id="myDropdown" class="dropdown-content">
            <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
            <a href="../controlers/controlerMensagem.php?opcao=4&filtro=0">Todos</a>
            <?php 
                $usuarios = $_SESSION['vUsuarios'];
                foreach($usuarios as $usuario){
                    echo '<a href="../controlers/controlerMensagem.php?opcao=4&filtro=' . $usuario->getUsuario_id() . '">' . $usuario->getUsuario_nome() . '</a>';
                }
            ?>
        </div>
    </div>

        <?php
            echo "<div class='containermens'>";
            if(!isset($_SESSION['vMensagens']) || count($_SESSION['vMensagens']) == 0){
                echo "<div class='typing'>Você não enviou nenhuma mensagem</div>";
            }else{
                $mensagens = $_SESSION['vMensagens'];
                foreach($mensagens as $mensagem){
                    if($mensagem->getMensagem_lido() == 1){
        ?>
                <a class="hidden" href="../controlers/controlerMensagem.php?opcao=8&id=<?php echo $mensagem->getMensagem_id() ?>" target="_blank">
                <div class="card read">
                        <h3 class="card__title">Assunto: <?php echo $mensagem->getMensagem_titulo() ?></h3>
                        <div class="card__date">destinatario: <?php echo $mensagem->getMensagem_destinatario() ?></div>
                        <div class="exclude">
                            <a href='../controlers/controlerMensagem.php?opcao=5&pId=<?php echo $mensagem->getMensagem_id() ?>' class='excla'>
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                    width="17" height="23"
                                    viewBox="0 0 172 172"
                                    style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M65.84375,1.34375c-2.23062,0 -4.03125,1.80062 -4.03125,4.03125c0,2.23063 1.80063,4.03125 4.03125,4.03125h40.3125c2.23062,0 4.03125,-1.80062 4.03125,-4.03125c0,-2.23063 -1.80063,-4.03125 -4.03125,-4.03125zM32.25,20.15625c-9.63469,0 -17.46875,7.83406 -17.46875,17.46875c0,9.63469 7.83406,17.46875 17.46875,17.46875h103.46875v84.65625c0,12.59094 -10.25281,22.84375 -22.84375,22.84375h-53.75c-12.59094,0 -22.84375,-10.25281 -22.84375,-22.84375v-69.875c0,-2.23062 -1.80062,-4.03125 -4.03125,-4.03125c-2.23062,0 -4.03125,1.80063 -4.03125,4.03125v69.875c0,17.03875 13.8675,30.90625 30.90625,30.90625h53.75c17.03875,0 30.90625,-13.8675 30.90625,-30.90625v-85.13916c7.68625,-1.8275 13.4375,-8.73521 13.4375,-16.98584c0,-9.63469 -7.83406,-17.46875 -17.46875,-17.46875zM32.25,28.21875h107.5c5.18687,0 9.40625,4.21937 9.40625,9.40625c0,5.18688 -4.21938,9.40625 -9.40625,9.40625h-107.5c-5.18688,0 -9.40625,-4.21937 -9.40625,-9.40625c0,-5.18688 4.21937,-9.40625 9.40625,-9.40625zM67.1875,73.90625c-2.23062,0 -4.03125,1.80063 -4.03125,4.03125v61.8125c0,2.23063 1.80063,4.03125 4.03125,4.03125c2.23062,0 4.03125,-1.80062 4.03125,-4.03125v-61.8125c0,-2.23062 -1.80063,-4.03125 -4.03125,-4.03125zM104.8125,73.90625c-2.23062,0 -4.03125,1.80063 -4.03125,4.03125v61.8125c0,2.23063 1.80063,4.03125 4.03125,4.03125c2.23062,0 4.03125,-1.80062 4.03125,-4.03125v-61.8125c0,-2.23062 -1.80063,-4.03125 -4.03125,-4.03125z"></path></g></g>
                                </svg>
                            </a>
                        </div>
                        <div class="card__arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="15" width="15">
                                <path fill="#fff" d="M13.4697 17.9697C13.1768 18.2626 13.1768 18.7374 13.4697 19.0303C13.7626 19.3232 14.2374 19.3232 14.5303 19.0303L20.3232 13.2374C21.0066 12.554 21.0066 11.446 20.3232 10.7626L14.5303 4.96967C14.2374 4.67678 13.7626 4.67678 13.4697 4.96967C13.1768 5.26256 13.1768 5.73744 13.4697 6.03033L18.6893 11.25H4C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75H18.6893L13.4697 17.9697Z"></path>
                            </svg>
                        </div>
                    </div></a>

            <?php
                    }else{ //se a mensagem for não lida            
            ?>
                <a class="hidden" href="../controlers/controlerMensagem.php?opcao=8&id=<?php echo $mensagem->getMensagem_id() ?>" target="_blank">
                <div class="card">
                    <h3 class="card__title">Assunto: <?php echo $mensagem->getMensagem_titulo() ?></h3>
                    <div class="card__date">Destinatario: <?php echo $mensagem->getMensagem_destinatario() ?></div>
                    <div class="exclude">
                        <a href='../controlers/controlerMensagem.php?opcao=5&pId=<?php echo $mensagem->getMensagem_id() ?>' class='excla'>
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                width="17" height="23"
                                viewBox="0 0 172 172"
                                style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M65.84375,1.34375c-2.23062,0 -4.03125,1.80062 -4.03125,4.03125c0,2.23063 1.80063,4.03125 4.03125,4.03125h40.3125c2.23062,0 4.03125,-1.80062 4.03125,-4.03125c0,-2.23063 -1.80063,-4.03125 -4.03125,-4.03125zM32.25,20.15625c-9.63469,0 -17.46875,7.83406 -17.46875,17.46875c0,9.63469 7.83406,17.46875 17.46875,17.46875h103.46875v84.65625c0,12.59094 -10.25281,22.84375 -22.84375,22.84375h-53.75c-12.59094,0 -22.84375,-10.25281 -22.84375,-22.84375v-69.875c0,-2.23062 -1.80062,-4.03125 -4.03125,-4.03125c-2.23062,0 -4.03125,1.80063 -4.03125,4.03125v69.875c0,17.03875 13.8675,30.90625 30.90625,30.90625h53.75c17.03875,0 30.90625,-13.8675 30.90625,-30.90625v-85.13916c7.68625,-1.8275 13.4375,-8.73521 13.4375,-16.98584c0,-9.63469 -7.83406,-17.46875 -17.46875,-17.46875zM32.25,28.21875h107.5c5.18687,0 9.40625,4.21937 9.40625,9.40625c0,5.18688 -4.21938,9.40625 -9.40625,9.40625h-107.5c-5.18688,0 -9.40625,-4.21937 -9.40625,-9.40625c0,-5.18688 4.21937,-9.40625 9.40625,-9.40625zM67.1875,73.90625c-2.23062,0 -4.03125,1.80063 -4.03125,4.03125v61.8125c0,2.23063 1.80063,4.03125 4.03125,4.03125c2.23062,0 4.03125,-1.80062 4.03125,-4.03125v-61.8125c0,-2.23062 -1.80063,-4.03125 -4.03125,-4.03125zM104.8125,73.90625c-2.23062,0 -4.03125,1.80063 -4.03125,4.03125v61.8125c0,2.23063 1.80063,4.03125 4.03125,4.03125c2.23062,0 4.03125,-1.80062 4.03125,-4.03125v-61.8125c0,-2.23062 -1.80063,-4.03125 -4.03125,-4.03125z"></path></g></g>
                            </svg>
                        </a>
                    </div>
                    <div class="card__arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="15" width="15">
                            <path fill="#fff" d="M13.4697 17.9697C13.1768 18.2626 13.1768 18.7374 13.4697 19.0303C13.7626 19.3232 14.2374 19.3232 14.5303 19.0303L20.3232 13.2374C21.0066 12.554 21.0066 11.446 20.3232 10.7626L14.5303 4.96967C14.2374 4.67678 13.7626 4.67678 13.4697 4.96967C13.1768 5.26256 13.1768 5.73744 13.4697 6.03033L18.6893 11.25H4C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75H18.6893L13.4697 17.9697Z"></path>
                        </svg>
                    </div>
                </div></a>

            <?php
                    }
                }
                echo "</div>";
            }      
            ?>


</body>

<script>
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    function filterFunction() {
        var input, filter, ul, li, a, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        div = document.getElementById("myDropdown");
        a = div.getElementsByTagName("a");
        for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "";
            } else {
            a[i].style.display = "none";
            }
        }
    }

</script>

<?php
     require_once 'includes/footer.inc';
?>