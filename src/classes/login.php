<?php
    
    function consulta_login(string $email, string $senha, string $tabela) :bool{
        include ('conexao.php');
        $consulta_autonomo = $con->prepare("SELECT count(*) FROM $tabela WHERE c_email=? AND c_senha=?");
        $consulta_autonomo->bindValue(1, $email);
        $consulta_autonomo->bindValue(2, $senha);
        $consulta_autonomo->execute(); 
    
        while($row = $consulta_autonomo->fetch(PDO::FETCH_BOTH)) {
            if ($row['count(*)'] ==0){
                return false;
            }else{
                return true;
            }
        }
    }


?>