<?php

    try{
    $servidor = "Localhost";
    $usuario = "root";
    $senha = "";
    $banco = "freelando";

    $cn = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    }catch(Exception $e ){
        echo 'Erro '.$e->getMessage();
    }


?>