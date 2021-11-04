<?php

include_once('mensagemErro.php');

function validaContratante(String $email) : bool{
     
          include_once('../conexao.php');

          $consulta = $con->prepare("SELECT * FROM contratante WHERE email = '$email'");
          $consulta->execute();
          
          while($row = $consulta->fetch(PDO::FETCH_BOTH)){
               ////////////////////////////

          }
          if($row == 0){
               setMensagemErro('Deu bom');
               return true;
          }
          else{
               setMensagemErro('Deuurim');
               return false;
          }
}