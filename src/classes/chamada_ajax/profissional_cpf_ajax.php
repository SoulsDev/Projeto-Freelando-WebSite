<?php

include_once('../conexao.php');
include_once('../profissional/Profissional.php');

$cpf=filter_input(INPUT_POST,'cpf',FILTER_SANITIZE_SPECIAL_CHARS);

$verificando = Profissional::consultaCPF($cpf);

echo $verificando;