<?php

include_once 'Profissional.php';
include_once '../dado_academico/DadoAcademico.php';
include_once '../cargo/Cargo.php';
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

$id= $profissional->inserirProfissional(
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
        $profissional->getDataRegistro()
    );

$cursos = addslashes($_POST['cursos']);
$cargos = addslashes($_POST['cargos']);

$cursos = explode(';', $cursos);
$cargos = explode(';', $cargos);

for($i=0; $i<(count($cargos)-1); $i++){
    $itens = explode(',', $cargos[$i]);
    
    $dado_academico = new Cargo($itens[0], $itens[1], $id);

    $dado_academico->cadastrarCargo(
        $dado_academico->getProfissao(),
        $dado_academico->getExperiencia(),
        $dado_academico->getIdAutonomo()
    );
}

for($i=0; $i<(count($cursos)-1); $i++){
    $itens = explode(',', $cursos[$i]);
    
    $dado_academico = new DadoAcademico('ensino', $itens[0], $itens[1], $itens[2], $id);

    $dado_academico->cadastrarDadoAcademico(
        $dado_academico->getEnsino(),
        $dado_academico->getNivel(),
        $dado_academico->getCurso(),
        $dado_academico->getCargaHoraria(),
        $dado_academico->getIdAutonomo()
    );
}


