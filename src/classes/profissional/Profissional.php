<?php
class Profissional{
    private string $nome;
    private string $email;
    private string $senha;
    private string $dtRegistro;
    private string $dtAlteracao;
    private string $cpf;
    private string $genero;
    private string $dtNasc;
    private string $numCelular;
    private string $cep;
    private string $cidade;
    private string $uf;
    private string $logradouro;
    private string $numero;
    private string $complemento;
    
    public function __construct(string $nome, string $cpf, string $dtNasc, string $genero, string $cep, string $uf, string $cidade, string $logradouro, string $numero, string $complemento, string $email, string $senha, string $numCelular){
        $this->nome = $nome;
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
        $this->numCelular = $numCelular;
        $this->dtRegistro =  date("Y-m-d H:i:s");
    } 

    public function getComplemento() : string{
        return  $this->complemento;
    }
    public function setComplemento(string $complemento) : void{
        $this->complemento = $complemento; 
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

    public function getNumCelular() : string{
        return  $this->numCelular;
    }
    public function setNumCelular(string $numCelular) : void{
        $this->numCelular = $numCelular; 
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


    public function inserirProfissional(string $nome, string $cpf, string $dtNasc, string $genero, string $cep, string $uf, string $cidade, string $logradouro, string $numero, string $complemento, string $email, string $senha, string $numCelular ,String $dtRegistro){

        if($genero == 'Masculino'){
            $genero = 1;
        }
        else{
            $genero = 2;
        }

        try{
            include ('../conexao.php');
            $inserir = $con->prepare("CALL Cadastrar_Autonomo(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $inserir->bindValue(1, $nome);
            $inserir->bindValue(2, $cpf);
            $inserir->bindValue(3, $dtNasc);
            $inserir->bindValue(4, $genero);
            $inserir->bindValue(5, $cep);
            $inserir->bindValue(6, $uf);
            $inserir->bindValue(7, $cidade);
            $inserir->bindValue(8, $logradouro);
            $inserir->bindValue(9, $numero);
            $inserir->bindValue(10, $complemento);
            $inserir->bindValue(11, $email);
            $inserir->bindValue(12, $senha);
            $inserir->bindValue(13, $dtRegistro);
            $inserir->execute();    
            
        }catch(PDOException $e){
            echo 'Erro'.$e->getMessage();
        }
        // try{

        //     include ('../conexao.php');
        //     $consultar = $con->prepare("SELECT * FROM autonomo");
        //     $consultar->execute();
        //     $row = $consultar->rowCount();
        //     $idContratante = $row + 1;
        //     $idContratante+=1;
        //     $inserir = $con->prepare("CALL Cadastrar_telefone_autonomo(?, ?)");
        //     $inserir->bindValue(1, $numCelular);
        //     $inserir->bindValue(2, $idContratante);
        //     $inserir->execute();
        // }catch(PDOException $e){
        //     echo 'Erro'.$e->getMessage();
        // }
    }   

    public static function consultaEmail($email) : bool{
        try{
            include('C:/xampp/htdocs/Projeto-Freelando-WebSite/src/classes/conexao.php');
            $consultar = $con->prepare("SELECT * FROM autonomo WHERE c_email_autonomo = ? ");
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

     }
     catch(PDOException $e){
          echo 'Erro'.$e->getMessage(); 
     }
    }

    public static function consultaCpf($cpf) : bool{
        try{
            include('../conexao.php');
            $consultar = $con->prepare("SELECT * FROM autonomo WHERE c_cpf_autonomo = ?");
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
} 