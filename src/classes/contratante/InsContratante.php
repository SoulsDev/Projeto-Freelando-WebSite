<?php 

include_once 'Contratante.php';

$nome = $_POST['name'];
$email = $_POST['email'];
$senha = $_POST['senha'];

//$senha = md5($senha);

// include_once '../conexao.php';

// $consulta = $cn->prepare("select * from contratante");

// $exibe = $consulta->fetch(PDO::FETCH_ASSOC);

// print_r($exibe);


$Contratante = new Contratante($nome, $email, $senha);


$Contratante->inserirContratante($Contratante->getNome(), $Contratante->getEmail(), $Contratante->getSenha(), $Contratante->getDataRegistro(), $Contratante->getDataAlteracao());








