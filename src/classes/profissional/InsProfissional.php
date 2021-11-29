<?php

include_once 'Profissional.php';
include_once '../dado_academico/DadoAcademico.php';
include_once '../cargo/Cargo.php';
include_once '../contato_autonomo/ContatoAutonomo.php';
include_once 'mensagemErro.php';

$nome = addslashes($_POST['nome']);
$cpf = addslashes($_POST['cpf']);
$genero = addslashes($_POST['genero']);
$dtNasc = addslashes($_POST['data_nascimento']);
$email = addslashes($_POST['email']);
$numCelular = addslashes($_POST['celular']);
$senha = addslashes(hash('sha256', $_POST['senha']));
$cep = addslashes($_POST['cep']);
$cidade = addslashes($_POST['cidade']);
$uf = addslashes($_POST['uf']);
$logradouro = addslashes($_POST['logradouro']);
$numero = addslashes($_POST['numero']);
$complemento = addslashes($_POST['complemento']);

$cpf = str_replace(".", "", $cpf);
$cpf = str_replace("-", "", $cpf);

$cep = str_replace("-", "", $cep);

$numCelular = str_replace("-", "", $numCelular);
$numCelular = str_replace("(", "", $numCelular);
$numCelular = str_replace(")", "", $numCelular);

$profissional = new Profissional($nome, $cpf, $dtNasc, $genero, $cep, $uf, $cidade, $logradouro, $numero, $complemento, $email, $senha);

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
        $profissional->getDataRegistro()
    );



$contato_autonomo = new ContatoAutonomo($numCelular, $id);

$contato_autonomo->cadastrarContatoAutonomo(
    $contato_autonomo->getTelefone(),
    $contato_autonomo->getIdAutonomo(),
);

$cursos = addslashes($_POST['cursos']);
$cargos = addslashes($_POST['cargos']);

$cursos = explode(';', $cursos);
$cargos = explode(';', $cargos);

$experiencia_profissional = new Cargo(0, 0, $id);

for($i=0; $i<(count($cargos)-1); $i++){
    $itens = explode(',', $cargos[$i]);
    
    $experiencia_profissional->setProfissao($itens[0]);
    $experiencia_profissional->setExperiencia($itens[1]);

    $experiencia_profissional->cadastrarCargo(
        $experiencia_profissional->getProfissao(),
        $experiencia_profissional->getExperiencia(),
        $experiencia_profissional->getIdAutonomo()
    );
}

$dado_academico = new DadoAcademico('ensino', 'inicial', 'inicial', 0, $id);

for($i=0; $i<(count($cursos)-1); $i++){
    $itens = explode(',', $cursos[$i]);

    $dado_academico->setNivel($itens[0]);
    $dado_academico->setCurso($itens[1]);
    $dado_academico->setCargaHoraria($itens[2]);

    $dado_academico->cadastrarDadoAcademico(
        $dado_academico->getEnsino(),
        $dado_academico->getNivel(),
        $dado_academico->getCurso(),
        $dado_academico->getCargaHoraria(),
        $dado_academico->getIdAutonomo()
    );
}

header('Location: ../../../pages/telaLogin.php');

