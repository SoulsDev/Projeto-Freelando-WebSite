<?php

try{
        require 'vendor/autoload.php';
        $mongo_client = new MongoDB\Client;
        $mongo_db = $mongo_client->freelando;  // seleciona o banco do mongo 

    }
    catch(Exception $e ){
        echo 'Erro '.$e->getMessage();
    }
?>