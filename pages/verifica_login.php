<?php
    session_start();
    // Verifica se as variaveis do post estão preenchidas
    include ('../src/classes/profissional/Profissional.php');
    include ('../src/classes/contratante/Contratante.php');

    $email = $_POST['email'];
    $senha = hash('sha256', $_POST['password']);
    // Realiza o primeiro teste de login enviando o email, senha e tabela a ser pesquisada

    $acesso = Profissional::login($email, $senha);
    

    // caso não haja resultado na primera busca ele segue para a segunda
    if(!$acesso){
        // Realiza o primeiro teste de login enviando o email, senha e tabela a ser pesquisada
        $acesso = Contratante::login($email, $senha);
        if(!$acesso){
            $_SESSION['erro'] = 'E-mail ou senha incorretos';
            header('Location: telaLogin.php');
            exit;
        }
        $dados = Contratante::listar($email, $senha);
        while($row = $dados->fetch(PDO::FETCH_BOTH)) {
            $_SESSION['tipo'] = 'contratante';
            $_SESSION['id_usuario'] = $row['n_id'];
            $_SESSION['nome_usuario'] = $row['c_nome'];
            $_SESSION['email_usuario'] = $row['c_email'];
            $_SESSION['foto_perfil'] = $row['c_imagem_perfil'];
            $_SESSION['cep_usuario'] = $row['c_cep'];
            $_SESSION['uf_usuario'] = $row['c_uf'];
            $_SESSION['cidade_usuario'] = $row['c_cidade'];
            $_SESSION['rua_usuario'] = $row['c_logradouro'];
            $_SESSION['numero_endereco_usuario'] = $row['n_numero_contratante'];
            $_SESSION['complemento_endereco_usuario'] = $row['c_complemento'];
        }
        header('Location: home.php');
        exit;
    }
    $dados = Profissional::listar($email, $senha);
        while($row = $dados->fetch(PDO::FETCH_BOTH)) {
            $_SESSION['tipo'] = 'autonomo';
            $_SESSION['id_usuario'] = $row['n_id'];
            $_SESSION['nome_usuario'] = $row['c_nome'];
            $_SESSION['foto_perfil'] = $row['c_imagem_perfil'];
            $_SESSION['email_usuario'] = $row['c_email'];
            $_SESSION['cpf_usuario'] = $row['c_cpf'];
            $_SESSION['genero_usuario'] = $row['c_genero'];
            $_SESSION['nascimento_usuario'] = $row['d_nascimento'];
            $_SESSION['cep_usuario'] = $row['c_cep'];
            $_SESSION['uf_usuario'] = $row['c_uf'];
            $_SESSION['cidade_usuario'] = $row['c_cidade'];
            $_SESSION['rua_usuario'] = $row['c_logradouro'];
            $_SESSION['numero_endereco_usuario'] = $row['n_numero_autonomo'];
            $_SESSION['complemento_endereco_usuario'] = $row['c_complemento'];
            $_SESSION['registro_usuario'] = $row['d_registro'];
            $_SESSION['alteracao_usuario'] = $row['d_alteracao'];
        }
    header('Location: home.php');
?>



