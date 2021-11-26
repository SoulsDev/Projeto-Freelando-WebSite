<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../medias/img/Group.svg" type="image/x-icon">
<!-- Bootstrap -->
    <link rel="stylesheet" href="../bootstrap-5.1.3/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../css/styles.css">

    <title>FreeLando | Logar</title>

</head>

<body class="my-login-page">


    <!-- EFEITO ANIMAÇÃO FUNDO -->
    <!-- <div class="area">
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
    </div> -->

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

            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>



    <section class="h-100 ">
        <div class="container-fluid h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">




                    <div class="card fat">

                        <div class="text-center ">
                            <img onclick="telaIndex()" class="formatoLogo" src="../medias/img/freelando.svg" alt="logo">
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <div class="card-body">
                                    <div class="row login">
                                        <button class="botaoLogin selecionado">Login</button>
                                        <button onclick="telaRegistrar()" class="botaoRegistrar desabilitado"> Registrar</button>
                                    </div>
                                </div>
                            </div>
                            <div style="display: flex; justify-content:center; color: red">
                            <?php
                                if(array_key_exists('erro', $_SESSION)){
                                    echo $_SESSION['erro'];
                                }
                            ?>
                            </div>
                            <form method="POST" class="my-login-validation" novalidate="" action="verifica_login.php">
                                <div class="form-group">

                                    <input id="email" type="email" class="form-control inputEmail" placeholder="EMAIL" name="email" value="" required autofocus>
                                    <div class="invalid-feedback">
                                        Email is invalid
                                    </div>
                                </div>

                                <div class="form-group">


                                    </label>
                                    <input id="password" type="password" class="form-control inputSenha" placeholder="SENHA" name="password" required data-eye>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>

                                    <div class="mt-2 align-self-start">
                                        <a class="esqueceusenha" href="register.html">Esqueceu a senha?</a>
                                    </div>
                                </div>





                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block botaoEntrar">
										ENTRAR
									</button>
                                </div>

                                <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                                    <div class="border-bottom w-100 ml-5"></div>
                                    <span class="px-2 small text-muted font-weight-bold text-muted">OU</span>
                                    <div class="border-bottom w-100 mr-5"></div>
                                </div>


                                <div class="row d-flex justify-content-around">
                                    <button class="loginfaceBtn">
                                        <img class="icon" width="20px" height="20px" src="../medias/img/facebook.png">
                                         Logar com o Facebook
                                        </button>


                                    <button class="logingoogleBtn">
                                        <img class="icon" width="20px" height="20px" src="../medias/img/google-white.png">
                                         Logar com o Google
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

</body>

</html>