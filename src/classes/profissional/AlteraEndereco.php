<?php
    include ('Profissional.php');

    session_start();

    $cep = addslashes($_POST['cep']);
    $numero = addslashes($_POST['numero']);
    $complemento = addslashes($_POST['complemento']);
    $logradouro = addslashes($_POST['logradouro']);
    $uf = addslashes($_POST['uf']);
    $cidade = addslashes($_POST['cidade']);

    Profissional::alterar_endereco($_SESSION['id_usuario'], $cep, $uf, $cidade, $logradouro, $numero, $complemento);

    $_SESSION['cep_usuario'] = $cep;
    $_SESSION['uf_usuario'] = $uf;
    $_SESSION['cidade_usuario'] = $cidade;
    $_SESSION['rua_usuario'] = $logradouro;
    $_SESSION['numero_endereco_usuario'] = $numero;
    $_SESSION['complemento_endereco_usuario'] = $complemento;

    header('Location: ../../../pages/AutonomoPrivado.php');
?>