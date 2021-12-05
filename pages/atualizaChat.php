<?php
include_once('C:/xampp/htdocs/Projeto-Freelando-WebSite/src/classes/conexao/mongo_con.php');
include_once('C:/xampp/htdocs/Projeto-Freelando-WebSite/src/classes/chat/Chat.php');

$chat = new Chat();

$row = $chat->listarChat();

// $a = count((array)$row);

//for($i = 0; $i < count((array)$row); $i++){


foreach ($row as $key) {
        echo '<div class="sent_msg" style="margin-bottom: 10px;" id="sent_msg">';
                echo "<p><strong>".$key['nome']."</strong></p>";
                echo '<p class="texto" style="color: #000;">'.$key['mensagem'].'</p>';
                echo '<p class="hora d-flex justify-content-end">'.$key['h_mensagem'].'</p>';
        echo '</div>';
}


//}


?>