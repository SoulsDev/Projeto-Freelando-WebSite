<?php
    unset($_SESSION['tipo']);
    unset($_SESSION['erro']);
    session_destroy();
    header('Location: ../telaLogin.php');
?>