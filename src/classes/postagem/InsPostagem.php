<?php 
include_once('Postagem.php');

$autonomo_id = $_POST['autonomo_id'];
$conteudo = $_POST['postagem_corpo'];

if(is_uploaded_file($_FILES['file']['tmp_name'])) {
    var_dump($_FILES['file']);
    echo '<br>Tem arquivo';
}


//$Postagem = new Postagem($autonomo_id, $conteudo);
//$Postagem->inserirPostagem($Postagem->getAutonomo(), $Postagem->getConteudo(), $Postagem->getDataRegistro());
//header('Location: ../../../pages/integrador_para_back/listar_postagem.php');