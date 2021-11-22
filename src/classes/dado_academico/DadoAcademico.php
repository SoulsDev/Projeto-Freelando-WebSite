<?php
class DadoAcademico{
    private string $ensino;
    private string $nivel;
    private string $curso;
    private int $carga_horaria;
    private int $id_autonomo;
    
    public function __construct(string $ensino, string $nivel, string $curso, int $carga_horaria, int $id_autonomo){
        $this->ensino = $ensino;
        $this->nivel = $nivel;
        $this->curso = $curso;
        $this->carga_horaria = $carga_horaria;
        $this->id_autonomo = $id_autonomo;
    } 

    public function getEnsino() : string{
        return  $this->ensino;
    }
    public function setEnsino(string $ensino) : void{
        $this->ensino = $ensino; 
    }

    public function getNivel() : string{
        return  $this->nivel;
    }
    public function setNivel(string $nivel) : void{
        $this->nivel = $nivel; 
    }

    public function getCurso() : string{
        return  $this->curso;
    }
    public function setCurso(string $curso) : void{
        $this->curso = $curso; 
    }

    public function getCargaHoraria() : int{
        return  $this->carga_horaria;
    }
    public function setCargaHoraria(int $carga_horaria) : void{
        $this->carga_horaria = $carga_horaria; 
    }

    public function getIdAutonomo() : int{
        return  $this->id_autonomo;
    }
    public function setIDAutonomo(int $id_autonomo) : void{
        $this->id_autonomo = $id_autonomo; 
    }

    public function cadastrarDadoAcademico(
        string $ensino,
        string $nivel,
        string $curso,
        int $carga_horaria,
        int $id_autonomo
    ){
        try{
            include ('../conexao.php');
            $inserir = $con->prepare("CALL CADASTRAR_DADO_ACADEMICO(?, ?, ?, ?, ?)");
            $inserir->bindValue(1, $ensino);
            $inserir->bindValue(2, $nivel);
            $inserir->bindValue(3, $curso);
            $inserir->bindValue(4, $carga_horaria);
            $inserir->bindValue(5, $id_autonomo);
            $inserir->execute();    
            
        }catch(PDOException $e){
            echo 'Erro'.$e->getMessage();
        }
    }
}

?>