<?php 
include_once('Postagem.php');
session_start();

$autonomo_id = $_SESSION['id_usuario'];
$conteudo = $_POST['caixa-texto'];

if(is_uploaded_file($_FILES['file']['tmp_name'])) {

    // codigo para gerar uma chave uuid aleatoria
    $data = random_bytes(16);
    assert(strlen($data) == 16);

    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    $_new_name = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));

    $FileType = strtolower(pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION));

    if($FileType == "mp4"){
      $target_dir = "C:/xampp/htdocs/Projeto-Freelando-WebSite/medias_usuario/videos/";
      $target_file = $target_dir . basename($_new_name).".". $FileType;
      //$uploadOk = 1;
  
      move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
  
      $caminho_relativo = "../medias_usuario/videos/".basename($_new_name).".". $FileType;
    }else{
      $target_dir = "C:/xampp/htdocs/Projeto-Freelando-WebSite/medias_usuario/fotos/";
      $target_file = $target_dir . basename($_new_name).".". $FileType;
      //$uploadOk = 1;
      // Allow certain file formats
      if($FileType != "jpg" && $FileType != "png" && $FileType != "jpeg"
      && $FileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        //$uploadOk = 0;
      }
  
      move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
  
      $caminho_relativo = "../medias_usuario/fotos/".basename($_new_name).".". $FileType;
    }

    $Postagem = new Postagem($autonomo_id, $conteudo, $caminho_relativo);
    $Postagem->inserirPostagem($Postagem->getAutonomo(), $Postagem->getConteudo(), $Postagem->getDataRegistro(), $Postagem->getArquivo());
}else{
    $Postagem = new Postagem($autonomo_id, $conteudo);
    $Postagem->inserirPostagem($Postagem->getAutonomo(), $Postagem->getConteudo(), $Postagem->getDataRegistro());
}




header('Location: ../../../pages/AutonomoPrivado.php');