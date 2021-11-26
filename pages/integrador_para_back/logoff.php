<?php
    unset($_SESSION['tipo']);
    session_destroy();
    header('Location: ../telaLogin.php');
?>