<?php

include_once('../conexao.php');
include_once('../contratante/Contratante.php');

$email=filter_input(INPUT_POST,'email',FILTER_SANITIZE_SPECIAL_CHARS);

$verificando = Contratante::consultaEmail($email);

echo $verificando;