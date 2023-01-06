<?php
    session_start();

    $estado = $_SESSION['logado'];
    if(!$estado || !isset($_SESSION['logado']))
        header("Location: index.php?erro=2");

?>