<?php
class Foto{
    private string $caminho;
    private int $id_autonomo;
    
    public function __construct(string $caminho, int $id_autonomo){
        $this->caminho = $caminho;
        $this->id_autonomo = $id_autonomo;
    } 

    public function getCaminho() : string{
        return  $this->caminho;
    }
    public function setCaminho(string $caminho) : void{
        $this->caminho = $caminho; 
    }
    public function getIdAutonomo() : int{
        return  $this->id_autonomo;
    }
    public function setIDAutonomo(int $id_autonomo) : void{
        $this->id_autonomo = $id_autonomo; 
    }

}
?>