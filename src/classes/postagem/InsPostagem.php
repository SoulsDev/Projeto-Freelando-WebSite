<?php 


$nome = $_POST['postagem_corpo'];

echo $nome;
echo get_current_user(); 

// header('Location: ../../../pages/CadastroContratante.php');


// $Contratante = new Contratante($nome, $email, $senha);


// $Contratante->inserirContratante($Contratante->getNome(), $Contratante->getEmail(), $Contratante->getSenha(), $Contratante->getDataRegistro(), $Contratante->getDataAlteracao());
