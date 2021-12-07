<?php
class Filtro{
    private string $palavra;
    
    public function __construct(string $palavra){
        $this->palavra = $palavra;
    } 

    public function getPalavra() : string{
        return  $this->palavra;
    }
    public function setPalavra(string $palavra) : void{
        $this->palavra = $palavra; 
    }
   
    public static function BuscarPorNome(string $palavra){
        include ('C:/xampp/htdocs/Projeto-Freelando-WebSite/src/classes/conexao.php');
        $consulta = $con->prepare("CALL FILTRA_AUTONOMO_NOME(?)");
        $consulta->bindValue(1, $palavra);
        $consulta->execute();

        return $consulta;

    }
} 