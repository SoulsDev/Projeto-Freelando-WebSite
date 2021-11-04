<?php

    try{
    $servidor = "Localhost";
    $usuario = "root";
    $password = "root";
    $banco = "freelando";

    $cn = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $password);
    }catch(Exception $e ){
        echo 'Erro '.$e->getMessage();
    }


?>