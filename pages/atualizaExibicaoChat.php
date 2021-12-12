<?php 
header('Content-Type: application/json');
include_once('C:/xampp/htdocs/Projeto-Freelando-WebSite/src/classes/conexao/mongo_con.php');
include_once('C:/xampp/htdocs/Projeto-Freelando-WebSite/src/classes/chat/Chat.php');


$chat = new Chat();
$row = $chat->listarChat();
// Descobrir como trazer as informações do mongo em formato de array



echo json_encode($row);
?>