<?php
    
    try{
        $servidor_bd_sql = "Localhost";
        $usuario_bd_sql = "root";
        //$senha_bd_sql = "";
        //TODO comentar antes de comitar
        $senha_bd_sql = "Cyh941069833*";
        $banco = "freelando";

        $con = new PDO("mysql:host=$servidor_bd_sql;dbname=$banco", $usuario_bd_sql, $senha_bd_sql);
    }
    catch(Exception $e ){
        echo 'Erro '.$e->getMessage();
    }
    
    try{
        require '../../vendor/autoload.php';
        $mongo_client = new MongoDB\Client("mongodb://localhost:27017");
        $collection = $mongo_client->freelando->postagem;  // seleciona o banco do mongo -> seleciona a coleção do mongo 

    }
    catch(Exception $e ){
        echo 'Erro '.$e->getMessage();
    }

    

?>
