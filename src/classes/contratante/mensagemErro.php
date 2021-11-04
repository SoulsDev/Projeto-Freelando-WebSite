<?php

session_start();

function setMensagemErro(string $erro) : void{
     $_SESSION['mensagem_erro'] = $erro;
}

function getMensagemErro() : ?string{
     if(isset($_SESSION['mensagem-erro'])){
          return $_SESSION['mensagem-erro'];
     }
     else{
          return null;
     }
}