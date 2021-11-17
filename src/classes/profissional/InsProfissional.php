<?php

include_once 'Contratante.php';
include_once 'mensagemErro.php';

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$genero = $_POST['genero'];
$dtNasc = $_POST['data_nascimento'];
$email = $_POST['email'];
$numCelular = $_POST['celular'];
$senha = $_POST['senha'];
$cep = $_POST['cep'];

$contratante = new Contratante($nome, $email, $senha);
//$consulta = $contratante-> consultaEmail($email);

//if($consulta){
//     setMensagemErro("Email já cadastrado");
//     header('Location: ../../../pages/CadastroContratante.php');
//}
//else{
     $contratante->inserirContratante($contratante->getNome(), $contratante->getEmail(), $contratante->getSenha(), $contratante->getDataRegistro(), $contratante->getDataAlteracao());
//}


