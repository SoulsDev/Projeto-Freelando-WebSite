<?php 

// include_once 'Contratante.php';
include_once 'validaContratante.php';

$nome = $_POST['name'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$validador = validaContratante($email);

 header('Location: ../../../pages/CadastroContratante.php');


// $Contratante = new Contratante($nome, $email, $senha);


// $Contratante->inserirContratante($Contratante->getNome(), $Contratante->getEmail(), $Contratante->getSenha(), $Contratante->getDataRegistro(), $Contratante->getDataAlteracao());
