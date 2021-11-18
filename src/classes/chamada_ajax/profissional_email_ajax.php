<?php

include_once('../conexao.php');
include_once('../profissional/Profissional.php');

$email=filter_input(INPUT_POST,'email',FILTER_SANITIZE_SPECIAL_CHARS);

$verificando = Profissional::consultaEmail($email);

echo $verificando;