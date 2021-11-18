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

echo "<script>alert('a')</script>";
$profissional = new Profissional($nome, $cpf, $dtNasc, $genero, $cep, $uf, $cidade, $logradouro, $numero, $complemento, $email, $senha, $numCelular);
echo "<script>alert('b')</script>";
$profissional->inserirProfissional($profissional->getNome(), $profissional->getCpf(), $profissional->getDtNacs(), $profissional->getGenero(), $profissional->getCep(), $profissional->getUf(), $profissional->getCidade(), $profissional->getLogradouro(), $profissional->getNumero(), $profissional->getComplemento(), $profissional->getEmail(), $profissional->getSenha(), $profissional->getNumCelular(), $profissional->getDataRegistro());

echo "<script>alert('a')</script>";




