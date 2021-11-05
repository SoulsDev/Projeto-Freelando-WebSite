<?php 
include_once('../conexao.php');

$nome = $_POST['postagem_corpo'];

echo $nome;
echo get_current_user(); 

$result = $collection->insertOne( [ 'name' => 'Hinterland', 'brewery' => 'BrewDog' ] );        
echo "Inserted with Object ID '{$result->getInsertedId()}'";

// header('Location: ../../../pages/CadastroContratante.php');


// $Contratante = new Contratante($nome, $email, $senha);


// $Contratante->inserirContratante($Contratante->getNome(), $Contratante->getEmail(), $Contratante->getSenha(), $Contratante->getDataRegistro(), $Contratante->getDataAlteracao());
