<?php

include_once 'Contratante.php';
include_once 'mensagemErro.php';

// nunca vii não

$nome = addslashes($_POST['name']); //addslaches impede SQLInjection;
$email = addslashes($_POST['email']);
$senha = addslashes(hash('sha256', $_POST['password'])); // Sha1 ta funcionando. // 256 que num vai // teria que ficar azul

$contratante = new Contratante($nome, $email, $senha);
$consulta = $contratante-> consultaEmail($email); /// Aqui terminamo.

if($consulta){
     setMensagemErro("Email já cadastrado");
     header('Location: ../../../pages/CadastroContratante.php');
}
else{
     $contratante->inserirContratante($contratante->getNome(),
                                   $contratante->getFotoPerfil(), 
                                   $contratante->getEmail(), 
                                   $contratante->getSenha(), 
                                   $contratante->getDataRegistro(), 
                                   $contratante->getDataAlteracao());
     header('Location: ../../../pages/telaLogin.php');
}


