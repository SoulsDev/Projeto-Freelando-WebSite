<?php
    $servidor_bd_sql = "Localhost";
    $usuario_bd_sql = "root";
    //$senha_bd_sql = "root";
    $senha_bd_sql = "gustavogugu123";
    $banco = "freelando";

    try {
        $con = new PDO("mysql:host=$servidor_bd_sql;dbname=$banco", $usuario_bd_sql, $senha_bd_sql);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
?>
