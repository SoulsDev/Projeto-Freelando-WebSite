<?php
class Contratante{
    private string $nome;
    private string $email;
    private string $senha;
    private string $dtRegistro;
    private string $dtAlteracao;

    public function __construct(string $nome, string $email, string $senha)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha; 
        $this->dtRegistro =  date("Y-m-d H:i:s");
        $this->dtAlteracao =  date("Y-m-d H:i:s");
    } 


    public function getNome() : string
    {
        return  $this->nome;
    }

    public function setNome(string $nome) : void
    {
        $this->nome = $nome; 
    }

    public function getEmail() : string
    {
        return  $this->email;
    }

    public function setEmail(string $email) : void
    {
        $this->email = $email; 
    }

    public function getSenha() : string
    {
        return  $this->senha;
    }

    public function setSenha(string $senha) : void
    {
        $this->senha = $senha; 
    }

    public function getDataRegistro() : string
    {
        return  $this->dtRegistro;
    }

    public function setDataRegistro(string $dtRegistro) : void
    {
        $this->dtRegistro = $dtRegistro; 
    }

    public function getDataAlteracao() : string
    {
        return  $this->dtAlteracao;
    }

    public function setDataAlteracao(string $dtAlteracao) : void
    {
        $this->dtAlteracao = $dtAlteracao; 
    }


    public function inserirContratante(string $nome, string $email, string $senha, String $dtRegistro, String $dtAlteracao){
        include_once '../conexao.php';
        try{
            
            $inserir = $con->prepare("CALL Cadastrar_Contratante(?, ?, ?, ?, ?)");
            $inserir->bindValue(1, $nome);
            $inserir->bindValue(2, $email);
            $inserir->bindValue(3, $senha);
            $inserir->bindValue(4, $dtRegistro);
            $inserir->bindValue(5, $dtAlteracao);
            $inserir->execute();    

        }catch(PDOException $e){
            echo "email ja cadastrado";
            echo 'Erro'.$e->getMessage();
        }
    }   

} 