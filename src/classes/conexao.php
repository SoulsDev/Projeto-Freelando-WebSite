<?php
    try{
    $servidor_bd_sql = "Localhost";
    $usuario_bd_sql = "root";
    //$senha_bd_sql = "";
    $senha_bd_sql = "Cyh941069833*";
    $banco = "freelando";

    $cn = new PDO("mysql:host=$servidor_bd_sql;dbname=$banco", $usuario_bd_sql, $senha_bd_sql);
    }catch(Exception $e ){
        echo 'Erro '.$e->getMessage();
    }
?>