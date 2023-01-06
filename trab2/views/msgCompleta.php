<?php
     require_once '../classes/mensagem.inc';
     require_once '../classes/usuario.inc';
     require_once 'includes/autenticar.inc';
     require_once 'includes/header.inc';

     if(!isset($_SESSION['msg'])){
         header('Location: ../views/index.php');
     }
     $msg = $_SESSION['msg'];
?>

<head>

        <link rel="stylesheet" type="text/css" href="css/mencss.css">

</head>

<!-- MOSTRA MENSAGEM COMPLETA -->

    <div class="cardmsg">
        <div class="cardmsg2">
            
            <?php   
                    echo "<div class='text-title'><h2>" . $msg->getMensagem_titulo() . "</h2></div>";
                    echo "<div class='text-inf'><h3>REMETENTE: " . $msg->getMensagem_remetente() . "</h3>";
            ?>

            <div class="text-exclude">
                
                <?php
                    if($_SESSION['usuario']->getUsuario_nome() == $msg->getMensagem_remetente()){    
                        echo "<a href='../controlers/controlerMensagem.php?opcao=5&pId=" . $msg->getMensagem_id() . "' class='text-excla'>";
                    }else{
                        echo "<a href='../controlers/controlerMensagem.php?opcao=2&pId=" . $msg->getMensagem_id() . "' class='text-excla'>";
                    }
                ?>

                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                        width="40" height="30"
                        viewBox="0 0 172 172"
                        style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M65.84375,1.34375c-2.23062,0 -4.03125,1.80062 -4.03125,4.03125c0,2.23063 1.80063,4.03125 4.03125,4.03125h40.3125c2.23062,0 4.03125,-1.80062 4.03125,-4.03125c0,-2.23063 -1.80063,-4.03125 -4.03125,-4.03125zM32.25,20.15625c-9.63469,0 -17.46875,7.83406 -17.46875,17.46875c0,9.63469 7.83406,17.46875 17.46875,17.46875h103.46875v84.65625c0,12.59094 -10.25281,22.84375 -22.84375,22.84375h-53.75c-12.59094,0 -22.84375,-10.25281 -22.84375,-22.84375v-69.875c0,-2.23062 -1.80062,-4.03125 -4.03125,-4.03125c-2.23062,0 -4.03125,1.80063 -4.03125,4.03125v69.875c0,17.03875 13.8675,30.90625 30.90625,30.90625h53.75c17.03875,0 30.90625,-13.8675 30.90625,-30.90625v-85.13916c7.68625,-1.8275 13.4375,-8.73521 13.4375,-16.98584c0,-9.63469 -7.83406,-17.46875 -17.46875,-17.46875zM32.25,28.21875h107.5c5.18687,0 9.40625,4.21937 9.40625,9.40625c0,5.18688 -4.21938,9.40625 -9.40625,9.40625h-107.5c-5.18688,0 -9.40625,-4.21937 -9.40625,-9.40625c0,-5.18688 4.21937,-9.40625 9.40625,-9.40625zM67.1875,73.90625c-2.23062,0 -4.03125,1.80063 -4.03125,4.03125v61.8125c0,2.23063 1.80063,4.03125 4.03125,4.03125c2.23062,0 4.03125,-1.80062 4.03125,-4.03125v-61.8125c0,-2.23062 -1.80063,-4.03125 -4.03125,-4.03125zM104.8125,73.90625c-2.23062,0 -4.03125,1.80063 -4.03125,4.03125v61.8125c0,2.23063 1.80063,4.03125 4.03125,4.03125c2.23062,0 4.03125,-1.80062 4.03125,-4.03125v-61.8125c0,-2.23062 -1.80063,-4.03125 -4.03125,-4.03125z"></path></g></g>
                    </svg>
                </a>
            </div>
            </div>

            <?php
                    echo "<div class='text-inf'><h3>DESTINATARIO: " . $msg->getMensagem_destinatario() . "</h3>";
            ?>
            <div class="text-exclude arrow">
                <a href='../controlers/controlerMensagem.php?opcao=7&id=<?php echo $msg->getMensagem_id() ?>' class='text-excla'>
                <img src="https://img.icons8.com/ios/30/ffffff/reply-all-arrow.png"/>
                </a>
            </div>
            </div>
            <?php  
                    echo "<div class='text-msg'><h3>" . $msg->getMensagem_conteudo() . "</h3></div>";
            ?>
        </div>
    </div>






<?php
     require_once 'includes/footer.inc';
?>