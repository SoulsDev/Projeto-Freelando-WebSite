<?php 

class Chat{
    public static function listarChat(){
        try{
            include('C:/xampp/htdocs/Projeto-Freelando-WebSite/src/classes/conexao/mongo_con.php');
            $colecao = $mongo_db->chat;
            return $colecao->find();

        }catch(PDOException $e){
            echo 'Erro'.$e->getMessage();
        }
    }
}



?>