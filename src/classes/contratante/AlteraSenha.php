<?php
    include ('Contratante.php');
    session_start();
    $id = $_POST['user_id'];
    $email = $_POST['user_email'];
    $velha_senha = hash('sha256', $_POST['senha']);
    $nova_senha = hash('sha256', $_POST['confirmsenha']);

    $troca = Contratante::alterar_senha($id, $email, $velha_senha, $nova_senha);
    if($troca == false){
        $_SESSION['erro'] = "Sua senha antiga esta errada";
        header('Location: ../../../pages/perfilContratante.php');    
    }else{
        unset($_SESSION['erro']);
        header('Location: ../../../pages/perfilContratante.php');
    }
?>
