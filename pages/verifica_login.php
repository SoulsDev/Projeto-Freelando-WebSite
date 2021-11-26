<?php
    // Verifica se as variaveis do post estão preenchidas
    include ('../src/classes/profissional/Profissional.php');
    include ('../src/classes/contratante/Contratante.php');

    $email = $_POST['email'];
    $senha = hash('sha256', $_POST['password']);
    // Realiza o primeiro teste de login enviando o email, senha e tabela a ser pesquisada

    $acesso = Profissional::login($email, $senha);
    session_start();

    // caso não haja resultado na primera busca ele segue para a segunda
    if(!$acesso){
        // Realiza o primeiro teste de login enviando o email, senha e tabela a ser pesquisada
        $acesso = Contratante::login($email, $senha);
        if(!$acesso){
            $_SESSION['erro'] = 'E-mail ou senha incorretos';
            header('Location: telaLogin.php');
            exit;
        }
        // TODO verificar se aq iremos pegar todos os dados do usuário
        $dados = Contratante::listar($email, $senha);
        while($row = $dados->fetch(PDO::FETCH_BOTH)) {
            var_dump($row);
        }
        //$_SESSION['tipo'] = 'contratante';
        //header('Location: integrador_para_back/test_login.php');
        exit;
    }
    // TODO verificar se aq iremos pegar todos os dados do usuário
    //$_SESSION['tipo'] = 'autonomo';
    $dados = Profissional::listar($email, $senha);
        while($row = $dados->fetch(PDO::FETCH_BOTH)) {
            var_dump($row);
        }
    //header('Location: integrador_para_back/test_login.php');
?>

