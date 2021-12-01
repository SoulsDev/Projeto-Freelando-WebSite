<?php
include_once('C:/xampp/htdocs/Projeto-Freelando-WebSite/src/classes/conexao/mongo_con.php');
include_once('C:/xampp/htdocs/Projeto-Freelando-WebSite/src/classes/chat/Chat.php');

foreach (Chat::listarChat() as $key) {
    echo "<p><strong>".$key['nome']."</strong></p>";
    echo '<p class="texto" style="color: #000;">'.$key['mensagem'].'</p>';
    echo '<p class="hora d-flex justify-content-end">00:00</p>';
}
?>