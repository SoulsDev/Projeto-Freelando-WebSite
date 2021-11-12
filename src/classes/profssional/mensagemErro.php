<?php

session_start();

function setMensagemErro(string $erro) : void{
     $_SESSION['mensagem_erro'] = $erro;
}

function getMensagemErro() : ?string{
     if(isset($_SESSION['mensagem_erro'])){
          return $_SESSION['mensagem_erro'];
     }
     else{
          return null;
     }
}

function destroiMensagemErro(){
      session_destroy();
}