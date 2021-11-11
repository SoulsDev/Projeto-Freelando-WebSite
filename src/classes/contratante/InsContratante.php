<?php

include_once 'Contratante.php';
include_once 'mensagemErro.php';

$nome = $_POST['name'];
$email = $_POST['email'];
$senha = $_POST['password'];

$contratante = new Contratante($nome, $email, $senha);
$consulta = $contratante-> consultaEmail($email);

if($consulta){
     setMensagemErro("Email já cadastrado");
     header('Location: ../../../pages/CadastroContratante.php');
}
else{
     $contratante->inserirContratante($contratante->getNome(), $contratante->getEmail(), $contratante->getSenha(), $contratante->getDataRegistro(), $contratante->getDataAlteracao());
}


