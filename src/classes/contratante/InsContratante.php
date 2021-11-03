<?php 

include_once 'Contratante.php';

$Contratante = new Contratante($_POST['name'], $_POST['email'], $_POST['password']);

$Contratante->inserirContratante($Contratante->getNome(), $Contratante->getEmail(), $Contratante->getSenha(), $Contratante->getDataRegistro(), $Contratante->getDataAlteracao());








