<?php
    include ('Contratante.php');
    session_start();
    $id = $_POST['user_id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    Contratante::alterar_dados_pessoais($id, $nome, $email);

    $_SESSION['nome_usuario'] = $nome;
    $_SESSION['email_usuario'] = $email;

    header('Location: ../../../pages/perfilContratante.php');
?>
