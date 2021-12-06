<?php
class Contratante{
    private string $nome;
    private string $foto_perfil;
    private string $email;
    private string $senha;
    private string $dtRegistro;
    private string $dtAlteracao;

    

    public function __construct(string $nome, string $email, string $senha){
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha; 
        $this->foto_perfil = '../medias/img/icone_padrao.jpg';
        $this->dtRegistro =  date("Y-m-d H:i:s");
        $this->dtAlteracao =  date("Y-m-d H:i:s");
    } 


    public function getNome() : string{
        return  $this->nome;
    }
    public function setNome(string $nome) : void{
        $this->nome = $nome; 
    }

    public function getFotoPerfil() : string{
        return  $this->foto_perfil;
    }
    public function setFotoPerfil(string $foto_perfil) : void{
        $this->foto_perfil = $foto_perfil; 
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


    public function inserirContratante(string $nome, string $foto_perfil, string $email, string $senha, String $dtRegistro){
        try{
            include ('../conexao.php');
            $inserir = $con->prepare("CALL Cadastrar_Contratante(?, ?, ?, ?, ?)");
            $inserir->bindValue(1, $nome);
            $inserir->bindValue(2, $foto_perfil);
            $inserir->bindValue(3, $email);
            $inserir->bindValue(4, $senha);
            $inserir->bindValue(5, $dtRegistro);
            $inserir->execute();    
            
        }catch(PDOException $e){
            echo 'Erro'.$e->getMessage();
        }
    }   

    public static function consultaEmail($email) : bool{

        try{
            include('C:/xampp/htdocs/Projeto-Freelando-WebSite/src/classes/conexao.php');
            $consultar = $con->prepare("SELECT * FROM contratantes WHERE c_email = ? ");
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

    public static function login(string $email, string $senha){
        include ('C:/xampp/htdocs/Projeto-Freelando-WebSite/src/classes/conexao.php');
        $consulta = $con->prepare("CALL LOGIN_CONTRATANTE(?, ?)");
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
        $consulta = $con->prepare("CALL LISTAR_CONTRATANTE(?, ?)");
        $consulta->bindValue(1, $email);
        $consulta->bindValue(2, $senha);
        $consulta->execute();

        return $consulta;
    }
} 