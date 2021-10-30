<?php 

include_once 'conexao.php';



$user = $_POST['name'];
$email = $_POST['email'];  // recebendo o valor do campo select, valor numérico
$senha = $_POST['password'];


try{
    
    $inserir = $cn->prepare("insert into cliente values(?, ?, ?, ?, ?)");
    $inserir->bindValue(1, 'null');
    $inserir->bindValue(2, $user);
    $inserir->bindValue(3, $email);
    $inserir->bindValue(4, $senha);
    $inserir->bindValue(5, 'null');
    $inserir->execute();
    header('Location:../pages/CadastroProfissional.html');
       
}catch(PDOException $e){
    echo 'Erro'.$e->getMessage();
}