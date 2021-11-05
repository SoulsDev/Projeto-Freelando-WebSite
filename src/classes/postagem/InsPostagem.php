<?php 
include_once('Postagem.php');

$autonomo_id = $_POST['autonomo_id'];
$conteudo = $_POST['postagem_corpo'];


$Postagem = new Postagem($autonomo_id, $conteudo);
$Postagem->inserirPostagem($Postagem->getAutonomo(), $Postagem->getConteudo(), $Postagem->getDataRegistro());
// header('Location: ../../../pages/CadastroContratante.php');