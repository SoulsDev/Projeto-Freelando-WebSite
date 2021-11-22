<?php

include_once 'Profissional.php';
include_once 'mensagemErro.php';

$nome = addslashes($_POST['nome']);
$cpf = addslashes($_POST['cpf']);
$genero = addslashes($_POST['genero']);
$dtNasc = addslashes($_POST['data_nascimento']);
$email = addslashes($_POST['email']);
$numCelular = addslashes($_POST['celular']);
$senha = addslashes($_POST['senha']);
$cep = addslashes($_POST['cep']);
$cidade = addslashes($_POST['cidade']);
$uf = addslashes($_POST['uf']);
$logradouro = addslashes($_POST['logradouro']);
$numero = addslashes($_POST['numero']);
$complemento = addslashes($_POST['complemento']);

$cpf = str_replace(".", "", $cpf);
$cpf = str_replace("-", "", $cpf);

$profissional = new Profissional($nome, $cpf, $dtNasc, $genero, $cep, $uf, $cidade, $logradouro, $numero, $complemento, $email, $senha, $numCelular);

$profissional->inserirProfissional(
    $profissional->getNome(), 
    $profissional->getCpf(), 
    $profissional->getDtNacs(), 
    $profissional->getGenero(), 
    $profissional->getCep(), 
    $profissional->getUf(), 
    $profissional->getCidade(), 
    $profissional->getLogradouro(), 
    $profissional->getNumero(), 
    $profissional->getComplemento(), 
    $profissional->getEmail(), 
    $profissional->getSenha(), 
    $profissional->getNumCelular(), 
    $profissional->getDataRegistro());


// $cursos = addslashes($_POST['cursos']);
// $cargos = addslashes($_POST['cargos']);

// $cursos = explode(';', $cursos);
// $cargos = explode(';', $cargos);


// foreach ($cursos as $value) {
//     // TODO usar procedure para adicionar ao banco de dados
//     $value = explode(',', $value);
//     $profissional->cadastrarDadoAcademico(
//         'ensino?',
//         $value[0],
//         $value[1],
//         40,
//         $profissional->getId
//     );
    
// }

// foreach ($cargos as &$value) {
//     // TODO usar procedure para adicionar ao banco de dados
//     echo ($value . "<br>");
// }


