<?php 
    include_once('../src/classes/contratante/validaContratante.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela do contratante</title>
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="../bootstrap-5.1.3/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../css/styles.css">


</head>
<body class="my-login-page">

    <div class="area">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>



    <section class="h-100 ">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">




                    <div class="card fat">

                        <div class="text-center ">
                            <img onclick="telaIndex()" class="formatoLogo" src="../medias/img/freelando.svg" alt="logo">
                        </div>

                            <form method="POST" action="../src/classes/contratante/InsContratante.php" class="my-login-validation need-validate" novalidate="">
                                <div class="form-group">
                                    <input id="name" type="text" class="form-control inputEmail" placeholder="Nome" name="name" value="" required autofocus minlength="8">
                                    <div class="invalid-feedback">
                                        Preencha seu nome completo
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input id="email" type="email" class="form-control inputEmail" placeholder="Email" name="email" value="" required autofocus>
                                    <div class="invalid-feedback">
                                        Email inválido
                                        <?php
                                            if($validador){
                                                echo getMensagemErro();
                                            }

                                            else{
                                                echo "Tanto faz saporra";
                                            }
                                        ?>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <input id="name" type="password" class="form-control inputSenha" placeholder="Senha" name="senha" required data-eye minlength="6">
                                    
                                    <div class="invalid-feedback">
                                        Preencha sua senha
                                        <br>
                                        Seua senha deve ter no mínino 6 dígitos
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div>
                                        <input type="checkbox" class="checkboxes" id="checkbox" name="checkbox" checked>
                                        <a class="chebox-text" href="#">Aceito termos de uso</a>
                                        
                                    </div>
                                </div>





                                <div class="form-group">
                                    <button type="#" class="btn btn-primary btn-block botaoEntrar">
										CADASTRAR
									</button>
                                </div>


                            </form>
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