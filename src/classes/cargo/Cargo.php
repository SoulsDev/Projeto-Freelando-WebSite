<?php
class Cargo{
    private int $profissao;
    private int $experiencia;
    private int $id_autonomo;

    
    public function __construct(int $profissao, int $experiencia, int $id_autonomo){
        $this->profissao = $profissao;
        $this->experiencia = $experiencia;
        $this->id_autonomo = $id_autonomo;
    } 

    public function getProfissao() : int{
        return  $this->profissao;
    }
    public function setProfissao(int $profissao) : void{
        $this->profissao = $profissao; 
    }

    public function getExperiencia() : int{
        return  $this->experiencia;
    }
    public function setExperiencia(int $experiencia) : void{
        $this->experiencia = $experiencia; 
    }
    public function getIdAutonomo() : int{
        return  $this->id_autonomo;
    }
    public function setIDAutonomo(int $id_autonomo) : void{
        $this->id_autonomo = $id_autonomo; 
    }

    public function cadastrarCargo(
        int $profissao,
        int $experiencia,
        int $id_autonomo
    ){
        try{
            include ('../conexao.php');
            $inserir = $con->prepare("CALL CADASTRAR_DADO_PROFISSIONAL(?, ?, ?)");
            $inserir->bindValue(1, $profissao);
            $inserir->bindValue(2, $experiencia);
            $inserir->bindValue(3, $id_autonomo);
            $inserir->execute();    
            
        }catch(PDOException $e){
            echo 'Erro'.$e->getMessage();
        }
    }

    public static function listaArea(){
        try{
            include('C:/xampp/htdocs/Projeto-Freelando-WebSite/src/classes/conexao.php');
            $listar = $con->prepare("CALL LISTAR_AREAS()");
            $listar->execute();  

            return $listar;
            

        }catch(PDOException $e){
            echo 'Erro'.$e->getMessage(); 
        }
    }
    
    public static function listaProfissoes(){
        try{
            include('C:/xampp/htdocs/Projeto-Freelando-WebSite/src/classes/conexao.php');
            $listar = $con->prepare("SELECT * FROM profissoes;");
            $listar->execute();  

            return $listar;
            

        }catch(PDOException $e){
            echo 'Erro'.$e->getMessage(); 
        }
    }

    public static function listaMinhaExperiencias(int $id){
        try{
            include('C:/xampp/htdocs/Projeto-Freelando-WebSite/src/classes/conexao.php');
            $listar = $con->prepare("CAll LISTAR_DADO_DO_PROFISSIONAL(?)");
            $listar->bindValue(1, $id);
            $listar->execute();  

            return $listar;
            

        }catch(PDOException $e){
            echo 'Erro'.$e->getMessage(); 
        }
    }
}

?>