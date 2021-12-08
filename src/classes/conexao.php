<?php
    $servidor_bd_sql = "Localhost";
    $usuario_bd_sql = "root";
    $senha_bd_sql = "root";
    //$senha_bd_sql = "Cyh941069833*";
    $banco = "freelando";

    try {
        $con = new PDO("mysql:host=$servidor_bd_sql;dbname=$banco", $usuario_bd_sql, $senha_bd_sql);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    
    // try{
    //     require '../../vendor/autoload.php';
    //     $mongo_client = new MongoDB\Client;
    //     $collection = $mongo_client->freelando->postagem;  // seleciona o banco do mongo -> seleciona a coleção do mongo 

    //     echo "<script>alert('a') </script>";
    // }
    // catch(Exception $e ){
    //     echo 'Erro '.$e->getMessage();
    // }
?>
