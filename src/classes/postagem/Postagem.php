<?php
class Postagem{
    private int $autonomo_id;
    private string $conteudo;
    private string $arquivo;
    private string $dtRegistro;

    public function __construct(int $autonomo_id, string $conteudo, string $arquivo = NULL)
    {
        $this->autonomo_id = $autonomo_id;
        $this->conteudo = $conteudo;
        $this->dtRegistro =  date("Y-m-d H:i:s");

        if($arquivo){
            $this->arquivo = $arquivo;
        }
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

    public function getArquivo() : string
    {
        return  $this->arquivo;
    }

    public function setArquivo(string $arquivo) : void
    {
        $this->arquivo = $arquivo; 
    }



    public function inserirPostagem(int $autonomo_id, string $conteudo, string $dtRegistro, string $arquivo = NULL){
        try{
            include_once('../conexao/mongo_con.php');
            $colecao = $mongo_db->postagem;

            if($arquivo){
                $result = $colecao->insertOne( 
                    [ 
                        'autonomo' => $autonomo_id, 
                        'conteudo' => $conteudo,
                        'arquivo_path' => $arquivo,
                        'dt_registro' => $dtRegistro
                    ]
                );  
            }else{
                $result = $colecao->insertOne( 
                    [ 
                        'autonomo' => $autonomo_id, 
                        'conteudo' => $conteudo,
                        'dt_registro' => $dtRegistro
                    ]
                );  
            }         

        }catch(PDOException $e){
            echo 'Erro'.$e->getMessage();
        }
    }   

    public static function listarPostagens(){
        try{
            include_once('C:/xampp/htdocs/Projeto-Freelando-WebSite/src/classes/conexao/mongo_con.php');
            $colecao = $mongo_db->postagem;
            return $colecao->find();

        }catch(PDOException $e){
            echo 'Erro'.$e->getMessage();
        }
    }

    public static function listarMinhasPostagens(int $autonomo_id){
        try{
            include_once('C:/xampp/htdocs/Projeto-Freelando-WebSite/src/classes/conexao/mongo_con.php');
            $colecao = $mongo_db->postagem;
            return $colecao->find(array('autonomo'=>$autonomo_id));

        }catch(PDOException $e){
            echo 'Erro'.$e->getMessage();
        }
    }

} 