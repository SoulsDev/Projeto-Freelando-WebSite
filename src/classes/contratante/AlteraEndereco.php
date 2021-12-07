<?php
    include ('Contratante.php');
    session_start();
    $id = $_POST['user_id'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];

    Contratante::alterar_endereco($id, $cep, $uf, $cidade, $logradouro, $numero, $complemento);

    $_SESSION['cep_usuario'] = $cep;
    $_SESSION['uf_usuario'] = $uf;
    $_SESSION['cidade_usuario'] = $cidade;
    $_SESSION['rua_usuario'] = $logradouro;
    $_SESSION['numero_endereco_usuario'] = $numero;
    $_SESSION['complemento_endereco_usuario'] = $complemento;

    header('Location: ../../../pages/perfilContratante.php');
?>
