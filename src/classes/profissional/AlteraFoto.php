<?php
    include ('Profissional.php');

    if(is_uploaded_file($_FILES['use_photo']['tmp_name'])) {
        session_start();
        $id = $_POST['user_id'];

        // codigo para gerar uma chave uuid aleatoria
        $data = random_bytes(16);
        assert(strlen($data) == 16);
    
        // Set version to 0100
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    
        // Output the 36 character UUID.
        $_new_name = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    
        $FileType = strtolower(pathinfo($_FILES['use_photo']['name'],PATHINFO_EXTENSION));
    
        $target_dir = "C:/xampp/htdocs/Projeto-Freelando-WebSite/medias_usuario/fotos/";
        $target_file = $target_dir . basename($_new_name).".". $FileType;
    
        move_uploaded_file($_FILES["use_photo"]["tmp_name"], $target_file);
    
        $caminho_relativo = "../medias_usuario/fotos/".basename($_new_name).".". $FileType;
    
    
        Profissional::alterar_foto($id, $caminho_relativo);
        $_SESSION['foto_perfil'] = $caminho_relativo;
    }
    header('Location: ../../../pages/AutonomoPrivado.php');
?>