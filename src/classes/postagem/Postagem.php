<?php
class Postagem{
    private int $autonomo_id;
    private $conteudo;
    private string $dtRegistro;

    public function __construct(int $autonomo_id, $conteudo)
    {
        $this->autonomo_id = $autonomo_id;
        $this->conteudo = $conteudo;
        $this->dtRegistro =  date("Y-m-d H:i:s");
    } 


    public function getAutonomo() : string
    {
        return  $this->autonomo_id;
    }

    public function setAutonomo(string $autonomo_id) : void
    {
        $this->autonomo_id = $autonomo_id; 
    }

    public function getConteudo() : string
    {
        return  $this->conteudo;
    }

    public function setConteudo(string $conteudo) : void
    {
        $this->conteudo = $conteudo; 
    }

    public function getDataRegistro() : string
    {
        return  $this->dtRegistro;
    }

    public function setDataRegistro(string $dtRegistro) : void
    {
        $this->dtRegistro = $dtRegistro; 
    }


    public function inserirPostagem(int $autonomo_id, $conteudo, String $dtRegistro){
        include_once '../conexao.php';
        try{
            
            $inserir = $db_mongo->prepare("CALL Cadastrar_Contratante(?, ?, ?, ?, ?)");
            $inserir->bindValue(1, $nome);
            $inserir->bindValue(2, $email);
            $inserir->bindValue(3, $senha);
            $inserir->bindValue(4, $dtRegistro);
            $inserir->bindValue(5, $dtAlteracao);
            $inserir->execute();    


            $insertOneResult = $collection->insertOne([

                'name' => $_POST['name'],
         
                'detail' => $_POST['detail'],
         
            ]);

        }catch(PDOException $e){
            echo "email ja cadastrado";
            echo 'Erro'.$e->getMessage();
        }
    }   

} 