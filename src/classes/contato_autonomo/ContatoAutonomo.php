<?php
class ContatoAutonomo{
    private string $telefone;
    private int $id_autonomo;
    
    public function __construct(string $telefone, int $id_autonomo){
        $this->telefone = $telefone;
        $this->id_autonomo = $id_autonomo;
    } 

    public function getTelefone() : string{
        return  $this->telefone;
    }
    public function setTelefone(string $telefone) : void{
        $this->telefone = $telefone; 
    }
    public function getIdAutonomo() : int{
        return  $this->id_autonomo;
    }
    public function setIDAutonomo(int $id_autonomo) : void{
        $this->id_autonomo = $id_autonomo; 
    }

    public function cadastrarContatoAutonomo(
        string $telefone,
        int $id_autonomo
    ){
        try{
            include ('../conexao.php');
            $inserir = $con->prepare("CALL CADASTRAR_TELEFONE_AUTONOMO(?, ?)");
            $inserir->bindValue(1, $telefone);
            $inserir->bindValue(2, $id_autonomo);
            $inserir->execute();    
            
        }catch(PDOException $e){
            echo 'Erro'.$e->getMessage();
        }
    }
}
?>