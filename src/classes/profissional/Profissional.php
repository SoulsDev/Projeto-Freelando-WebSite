<?php
class Profissional{
    private string $nome;
    private string $foto_perfil;
    private string $email;
    private string $senha;
    private string $dtRegistro;
    private string $dtAlteracao;
    private string $cpf;
    private string $genero;
    private string $dtNasc;
    private string $cep;
    private string $cidade;
    private string $uf;
    private string $logradouro;
    private string $numero;
    private string $complemento;
    
    public function __construct(string $nome, string $cpf, string $dtNasc, string $genero, string $cep, string $uf, string $cidade, string $logradouro, string $numero, string $complemento, string $email, string $senha){
        $this->nome = $nome;
        $this->foto_perfil = '../medias/img/icone_padrao.jpg';
        $this->cpf = $cpf;
        $this->dtNasc = $dtNasc;
        $this->genero = $genero;
        $this->cep = $cep;
        $this->uf = $uf;
        $this->cidade = $cidade;
        $this->logradouro = $logradouro;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->email = $email;
        $this->senha = $senha;
        $this->dtRegistro =  date("Y-m-d H:i:s");
    } 

    public function getComplemento() : string{
        return  $this->complemento;
    }
    public function setComplemento(string $complemento) : void{
        $this->complemento = $complemento; 
    }

    public function getFotoPerfil() : string{
        return  $this->foto_perfil;
    }
    public function setFotoPerfil(string $foto_perfil) : void{
        $this->foto_perfil = $foto_perfil; 
    }

    public function getNumero() : string{
        return  $this->numero;
    }
    public function setNumero(string $numero) : void{
        $this->numero = $numero; 
    }

    public function getLogradouro() : string{
        return  $this->logradouro;
    }
    public function setLogradouro(string $logradouro) : void{
        $this->logradouro = $logradouro; 
    }

    public function getUf() : string{
        return  $this->uf;
    }
    public function setUf(string $uf) : void{
        $this->uf = $uf; 
    }

    public function getCidade() : string{
        return  $this->cidade;
    }
    public function setCidade(string $cidade) : void{
        $this->cidade = $cidade; 
    }

    public function getCep() : string{
        return  $this->cep;
    }
    public function setCep(string $cep) : void{
        $this->cep = $cep; 
    }

    public function getDtNacs() : string{
        return  $this->dtNasc;
    }
    public function setDtNacs(string $dtNasc) : void{
        $this->dtNasc = $dtNasc; 
    }

    public function getGenero() : string{
        return  $this->genero;
    }
    public function setGenero(string $genero) : void{
        $this->genero = $genero; 
    }

    public function getCpf() : string{
        return  $this->cpf;
    }
    public function setCpf(string $cpf) : void{
        $this->cpf = $cpf; 
    }

    public function getNome() : string{
        return  $this->nome;
    }
    public function setNome(string $nome) : void{
        $this->nome = $nome; 
    }

    public function getEmail() : string{
        return  $this->email;
    }
    public function setEmail(string $email) : void{
        $this->email = $email; 
    }

    public function getSenha() : string{
        return  $this->senha;
    }
    public function setSenha(string $senha) : void{
        $this->senha = $senha; 
    }

    public function getDataRegistro() : string{
        return  $this->dtRegistro;
    }
    public function setDataRegistro(string $dtRegistro) : void{
        $this->dtRegistro = $dtRegistro; 
    }

    public function getDataAlteracao() : string{
        return  $this->dtAlteracao;
    }
    public function setDataAlteracao(string $dtAlteracao) : void{
        $this->dtAlteracao = $dtAlteracao; 
    }


    public function inserirProfissional(
        string $nome, 
        string $foto,
        string $cpf, 
        string $dtNasc, 
        string $genero, 
        string $cep, 
        string $uf, 
        string $cidade, 
        string $logradouro, 
        string $numero, 
        string $complemento, 
        string $email, 
        string $senha, 
        String $dtRegistro) : int{

        if($genero == 'Masculino'){
            $genero = 1;
        }
        else{
            $genero = 2;
        }

        try{
            include ('../conexao.php');
            $inserir = $con->prepare("CALL Cadastrar_Autonomo(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $inserir->bindValue(1, $nome);
            $inserir->bindValue(2, $foto);
            $inserir->bindValue(3, $cpf);
            $inserir->bindValue(4, $dtNasc);
            $inserir->bindValue(5, $genero);
            $inserir->bindValue(6, $cep);
            $inserir->bindValue(7, $uf);
            $inserir->bindValue(8, $cidade);
            $inserir->bindValue(9, $logradouro);
            $inserir->bindValue(10, $numero);
            $inserir->bindValue(11, $complemento);
            $inserir->bindValue(12, $email);
            $inserir->bindValue(13, $senha);
            $inserir->bindValue(14, $dtRegistro);
            $inserir->execute();    
            
            $consulta = $con->prepare("SELECT n_id FROM autonomos WHERE c_cpf=?");
            $consulta->bindValue(1, $cpf);
            $consulta->execute();         
        
            while($row = $consulta->fetch(PDO::FETCH_BOTH)) {
                $user_id =  $row['n_id']; 
            }

            return $user_id;

        }catch(PDOException $e){
            echo 'Erro'.$e->getMessage();
        }
    }   

    public static function consultaEmail($email) : bool{
        try{
            include('C:/xampp/htdocs/Projeto-Freelando-WebSite/src/classes/conexao.php');
            $consultar = $con->prepare("SELECT * FROM autonomos WHERE c_email = ? ");
            $consultar->bindValue(1, $email);
            $consultar->execute();
            $row = $consultar->rowCount();

            if($row != 0){
                $inserir = '';
                $con = '';
                return true;
            }
            else{
                return false;
            }

        }catch(PDOException $e){
            echo 'Erro'.$e->getMessage(); 
        }
    }

    public static function consultaCpf($cpf) : bool{
        try{
            include('../conexao.php');
            $consultar = $con->prepare("SELECT * FROM autonomos WHERE c_cpf = ?");
            $consultar->bindValue(1, $cpf);
            $consultar->execute();
            $row = $consultar->rowCount();

            if($row != 0){
                $inserir = '';
                $con = '';
                return true;
            }
            else{
                return false;
            }

     }
     catch(PDOException $e){
          echo 'Erro'.$e->getMessage(); 
     }
    }

    public static function login(string $email, string $senha){
        include ('C:/xampp/htdocs/Projeto-Freelando-WebSite/src/classes/conexao.php');
        $consulta = $con->prepare("CALL LOGIN_AUTONOMO(?, ?)");
        $consulta->bindValue(1, $email);
        $consulta->bindValue(2, $senha);
        $consulta->execute();

        while($row = $consulta->fetch(PDO::FETCH_BOTH)) {
            if ($row['count(n_id)'] ==0){
                return false;
            }else{
                return true;
            }
        }
    }

    public static function listar(string $email, string $senha){
        include ('C:/xampp/htdocs/Projeto-Freelando-WebSite/src/classes/conexao.php');
        $consulta = $con->prepare("SELECT 
                                        n_id,
                                        c_nome,
                                        c_imagem_perfil,
                                        c_cpf,
                                        c_genero,
                                        d_nascimento,
                                        c_cep,
                                        c_uf,
                                        c_cidade,
                                        c_logradouro,
                                        n_numero_autonomo,
                                        c_complemento,
                                        c_email,
                                        d_registro,
                                        d_alteracao        
         FROM autonomos WHERE c_email= ? AND c_senha= ?");
         
        $consulta->bindValue(1, $email);
        $consulta->bindValue(2, $senha);
        $consulta->execute();

        return $consulta;
    }

    public static function getProfissional(int $id){
        include ('C:/xampp/htdocs/Projeto-Freelando-WebSite/src/classes/conexao.php');
        $consulta = $con->prepare("SELECT 
                                        c_nome,
                                        c_imagem_perfil      
         FROM autonomos WHERE n_id= ?");
         
        $consulta->bindValue(1, $id);
        $consulta->execute();

        while($row = $consulta->fetch(PDO::FETCH_BOTH)) {
            return $row;
        }
    }

    public static function alterar_endereco(int $id, string $cep, string $uf, string $cidade, string $logradouro, int $numero_autonomo, string $complemento = null){
        include ('C:/xampp/htdocs/Projeto-Freelando-WebSite/src/classes/conexao.php');
        $alteracao = $con->prepare("CALL ALTERAR_ENDERECO_AUTONOMO(?, ?, ?, ?, ?, ?, ?)");
        $alteracao->bindValue(1, $id);
        $alteracao->bindValue(2, $cep);
        $alteracao->bindValue(3, $uf);
        $alteracao->bindValue(4, $cidade);
        $alteracao->bindValue(5, $logradouro);
        $alteracao->bindValue(6, $numero_autonomo);
        $alteracao->bindValue(7, $complemento);
        $alteracao->execute();

        return $alteracao;
    }

    public static function alterar_foto(int $id, string $foto){
        include ('C:/xampp/htdocs/Projeto-Freelando-WebSite/src/classes/conexao.php');
        
        $alteracao = $con->prepare("CALL ALTERAR_FOTO_AUTONOMO(?, ?)");
        $alteracao->bindValue(1, $id);
        $alteracao->bindValue(2, $foto);
        $alteracao->execute();
        return $alteracao;
    }

    public static function listar_minhas_experiencias(int $id){
        include ('C:/xampp/htdocs/Projeto-Freelando-WebSite/src/classes/conexao.php');
        
        $consulta = $con->prepare("CALL LISTAR_DADO_DO_PROFISSIONAL(?)");
        $consulta->bindValue(1, $id);
        $consulta->execute();
        return $consulta;
    }

    public static function listar_meus_conhecimentos(int $id){
        include ('C:/xampp/htdocs/Projeto-Freelando-WebSite/src/classes/conexao.php');
        
        $consulta = $con->prepare("CALL LISTAR_DADO_DO_ACADEMICO(?)");
        $consulta->bindValue(1, $id);
        $consulta->execute();
        return $consulta;
    }
   
} 