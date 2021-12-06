<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../medias/img/Group.svg" type="image/x-icon">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../bootstrap-5.1.3/dist/css/bootstrap.css">

    <link rel="stylesheet" href="../css/styles_publicacao.css">



    <title>Freelando</title>
</head>


<body>


    <?php
    
    include"navbar.php";
    
    
    ?>


        <section class="container-geral" style="">
            <div class="container p-0">
                <div class="row d-flex justify-content-start conteudo-geral bg-white shadow-lg border-radius p-0 m-0">




                    <div class="col-lg-8 m-0 p-0 offset-lg-1 publicacao bg-white">

                        <div class="cardbox ">

                            <div class="cardbox-heading">

                                <!--/ dropdown -->
                                <div class="media m-0">
                                    <div class="d-flex mr-3">
                                        <a href=""><img class="img-fluid rounded-circle" src="../medias/img/user.png" alt="User"></a>
                                    </div>

                                    <div class="media-body">
                                        <p class="m-0">João Franco</p>

                                        <small><span><i class="icon ion-md-time"></i> 10 horas atrás</span></small>



                                    </div>

                                    <div class="d-flex mr-3">
                                        <a href=""><img class="img-fluid link" src="../medias/img/link-2.svg" alt="User"></a>
                                    </div>


                                </div>

                                <div class="media m-0">
                                    <p class="m-0 title-postagem">Olá, se precisar de um eletricista pode contar comigo. Entre em contato!
                                    </p>
                                </div>



                                <!--/ media -->
                            </div>
                            <!--/ cardbox-heading -->

                            <div class="cardbox-item">
                                <img class="img-fluid cardbox-img" src="../medias/img/eletrica.png" alt="Image">
                            </div>
                            <!--/ cardbox-item -->
                            <div class="cardbox-base">
                                <ul class="d-flex align-items-center">

                                    <li>
                                        <a href=""><img class="img-fluid" src="../medias/img/like.png" alt="User"></a>
                                    </li>

                                    <li>
                                        <a href=""><img class="img-fluid" src="../medias/img/comentarios.png" alt="User"></a>
                                    </li>



                                </ul>

                            </div>



                        </div>

                    </div>
                    <!--/ col-lg-6 -->


                    <div class="col-lg-7 mesgs  bg-white m-0 p-0" style=" width: 33%;">

                        <div class=" d-flex justify-content-end align-items-end container-fechar  w-100 p-2">
                            <img name="btn-fechar" src=" ../medias/img/btnclose.svg " alt=" botao " class=" botao-close ">
                        </div>


                        <div class="msg_history p-3 m-0">
                            <div class="incoming_msg">
                                <div class="incoming_msg_img"> <img src="../medias/img/user-minato.png" alt="sunil"> </div>
                                <div class="received_msg">
                                    <div class="received_withd_msg">
                                        <p>Duvido realizar um serviço mais rápido que o meu
                                        </p>
                                        <span class="time_date"> 22:01 AM | Ontem</span>
                                    </div>
                                </div>
                            </div>



                            <div class="incoming_msg">
                                <div class="incoming_msg_img"> <img class="rounded-circle user_img" src="../medias/img/user-levi.png" alt="sunil"> </div>
                                <div class="received_msg">
                                    <div class="received_withd_msg">
                                        <p>É melhor voce trabalhar direito</p>
                                        <span class="time_date"> 10:58 AM | Hoje</span>
                                    </div>
                                </div>
                            </div>


                            <div class="incoming_msg">
                                <div class="incoming_msg_img"> <img class="rounded-circle user_img" src="../medias/img/user-sla.png" alt="sunil"> </div>
                                <div class="received_msg">
                                    <div class="received_withd_msg">
                                        <p>Coé! Quanto fica pra arrumar um chuveiro queimado?</p>
                                        <span class="time_date"> 10:58 AM | Hoje</span>
                                    </div>
                                </div>
                            </div>

                            <div class="incoming_msg">
                                <div class="incoming_msg_img "> <img class="rounded-circle user_img" src="../medias/img/user-dv.png" alt="sunil">
                                </div>
                                <div class="received_msg">
                                    <div class="received_withd_msg">
                                        <p>Meu mestre pode ajudar vc com geração de energia.</p>
                                        <span class="time_date"> 11:01 AM | Hoje</span>
                                    </div>
                                </div>
                            </div>


                            <div class="incoming_msg">
                                <div class="incoming_msg_img"> <img src="../medias/img/user-cav.png" alt="sunil"> </div>
                                <div class="received_msg">
                                    <div class="received_withd_msg">
                                        <p>Glória ao sol irmãos!!</p>
                                        <span class="time_date"> 09:28 AM | Hoje</span>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="type_msg">
                            <div class="input_msg_write px-2">

                                <button class="enviar-botao" type="button">
                                <img class="fa fa-search form-control-feedback img" src="../medias/img/contratp.png"
                                    alt="mão" id="enviar" onclick="enviar()">
                            </button>

                                <input type="text" class="write_msg" placeholder="Escreva um comentário...">

                                <button class="msg_send_btn" type="button">
                                <img src="../medias/img/enviar.png" alt="icone">
                            </button>

                            </div>
                        </div>
                    </div>
                    <!--/ col-lg-3 -->

                </div>
                <!--/ row -->
            </div>
            <!--/ container -->
        </section>




        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>

        <script src="../bootstrap-5.1.3/dist/js/bootstrap.min.js"></script>

</body>

</html>