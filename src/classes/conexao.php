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
        $mongo_database = "freelando";
        $con_mongo = new MongoClient(); // cliente mongo, ele conecta por padrão no localhost, caso queira pode 
        // inserir o endereço e porta
        $db_mongo = $con_mongo->$mongo_database; // seleciona o banco do mongo
    }
    catch(Exception $e ){
        echo 'Erro '.$e->getMessage();
    }

    

?>
