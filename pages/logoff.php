<?php
    // unset($_SESSION['erro']);

    // unset($_SESSION['id_usuario']);
    // unset($_SESSION['nome_usuario']);
    // unset($_SESSION['email_usuario']);

    session_destroy();
    header('Location: telaLogin.php');
?>