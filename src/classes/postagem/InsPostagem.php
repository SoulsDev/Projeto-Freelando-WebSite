<?php 
include_once('../conexao/con_test.php');

$nome = $_POST['postagem_corpo'];

echo $nome;
echo get_current_user(); 

$result = $collection->insertOne( [ 'name' => 'Hinterland', 'brewery' => 'BrewDog' ] );        
echo "Inserted with Object ID '{$result->getInsertedId()}'";

// header('Location: ../../../pages/CadastroContratante.php');