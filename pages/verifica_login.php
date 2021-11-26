<?php
    include ('../src/classes/login.php');

    $email = $_POST['email'];
    $senha = $_POST['password'];
    $senha = hash('sha256', $senha);

    $acesso = consulta_login($email, $senha, 'autonomos');

    if(!$acesso){
        $acesso = consulta_login($email, $senha, 'contratantes');
        echo "contratante";
        if(!$acesso){
            // adicionar os erros na sessão?
            echo "retornar pra pagina de login com erros";
            header('Location: telaLogin.html');
        }
    }
    
?>

