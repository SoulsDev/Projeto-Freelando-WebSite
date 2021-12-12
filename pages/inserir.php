<?php 
header('Content-Type: application/json');

session_start();

include_once('../src/classes/conexao/mongo_con.php');
$colecao = $mongo_db->chat;

$nome = $_SESSION['nome_usuario'];
$mensagem = $_POST['mensagem'];
$dtRegistro =  date("H:i");


$result = $colecao->insertOne( 
  [ 
      'nome' => $nome, 
      'mensagem' => $mensagem,
      'h_mensagem' => $dtRegistro
  ]
);

echo json_encode('provavelmente foi');

?>