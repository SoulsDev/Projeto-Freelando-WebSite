<?php 
    include_once('../../src/classes/postagem/Postagem.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prototipo tela de postagem</title>
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="../bootstrap-5.1.3/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../css/styles.css">


</head>
<body class="my-login-page">
    <section class="h-100 ">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="card fat">
                        <?php
                            foreach(Postagem::listarPostagens() as $postagem){
                                echo "autonomo_id: $postagem->autonomo<br>";
                                echo "data de publicação: $postagem->dt_registro<br>";
                                echo "Conteudo: $postagem->conteudo<br><br>";
                            }
                            
                       ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../bootstrap-5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="../scripts/scripts.js"></script>
    <script src="../scripts/form_validation.js"></script>

</body>

</html>
</html>