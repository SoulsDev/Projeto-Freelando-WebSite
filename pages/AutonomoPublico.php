<?php
    session_start();
    include"navbar.php";
    include('../src/classes/profissional/Profissional.php');
    include('../src/classes/postagem/Postagem.php');
    $autonomo = Profissional::getProfissional($_GET['id']);
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $autonomo['c_nome'] ?> | Freelando</title>

    <link rel="shortcut icon" href="../medias/img/Group.svg" type="image/x-icon">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../bootstrap-5.1.3/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../css/styles_autonomopub.css">
</head>

<body>

   



        <div class="container bg-white shadow-lg ">

            <div class="row">

                <div class=" row container-header ">

                    <div class="col-4 usuario-foto d-flex flex-column justify-content-center">
                        <img src="<?php echo $autonomo['c_imagem_perfil'] ?>" class="rounded-circle">
                    </div>

                    <div class="col-6 dados-usuario d-flex flex-column justify-content-center ">


                        <h1><?php echo $autonomo['c_nome'] ?></h1>

                        <div class="d-flex flex-row align-items-center justify-content-start flex-nowrap">

                            <img class="btn m-10" src="../medias/img/btn-seguir.svg">
                            <img class="btn m-10" src="../medias/img/btn-chat.svg">

                            <div class="m-10 d-flex flex-nowrap ">
                                <img class="btn " src="../medias/img/star.svg">
                                <img class="btn " src="../medias/img/star.svg">
                                <img class="btn " src="../medias/img/star.svg">
                            </div>

                            <div class="m-10 d-flex flex-nowrap ">
                                <strong>Perto de você</strong>
                            </div>



                        </div>

                    </div>


                </div>

                <div class="col-12 line">
                </div>


                <div class="col-3 d-flex flex-column container-info">

                    <div class="container-dados">




                        <h2>Interesses:</h2>


                        <ul>
                        <?php
                        $consulta = Profissional::listar_minhas_experiencias($_GET['id']);
                        while($row = $consulta->fetch(PDO::FETCH_BOTH)) {
                            ?>
                            <li>
                            <?php
                                echo $row['c_nome'];
                            ?>
                            </li>
                            <?php
                        }
                        ?>
                        </ul>


                    </div>

                    <div class="container-dados">



                        <h2>Cursos & Formações:</h2>

                        <ul>
                        <?php
                        $consulta = Profissional::listar_meus_conhecimentos($_GET['id']);
                        while($row = $consulta->fetch(PDO::FETCH_BOTH)) {
                            ?>
                            <li>
                            <?php
                                echo $row['c_curso'];
                            ?>
                            </li>
                            <?php
                        }
                        ?>
                        </ul>


                    </div>

                </div>

                <div class="col-9 d-flex flex-column justify-content-center align-items-center container-pub">
                <?php
                    foreach(Postagem::listarMinhasPostagens($_GET['id']) as $postagem){
                        $convertido_para_array = iterator_to_array($postagem);
                ?>  
                <div class="cardbox shadow-lg bg-white">

                    <div class="cardbox-heading">

                        <!--/ dropdown -->
                        <div class="media m-0">
                            <div class="d-flex mr-3">
                                <a href=""><img class="img-fluid rounded-circle" src="<?php echo $autonomo['c_imagem_perfil'] ?>" alt="User"></a>
                            </div>

                            <div class="media-body">
                                <p class="m-0"><?php echo $autonomo['c_nome'];?></p>
                                <small><span><i class="icon ion-md-time"></i><?php echo $convertido_para_array['dt_registro'] ?></span></small>
                            </div>

                            <div class="d-flex mr-3">
                                <a href=""><img class="img-fluid link" src="../medias/img/link-2.svg" alt="User"></a>
                            </div>


                        </div>

                        <div class="media m-0">
                            <p class="m-0 title-postagem"><?php echo $convertido_para_array['conteudo'] ?></p>
                        </div>



                        <!--/ media -->
                    </div>
                    <!--/ cardbox-heading -->

                    <div class="cardbox-item">
                            <?php
                                if(isset($convertido_para_array['arquivo_path'])){
                                    $ext = explode('.', $convertido_para_array['arquivo_path']);

                                    if ($ext[3] == "mp4"){
                                        ?>
                                        <video width="320" height="240" controls>
                                            <source src="<?php echo $convertido_para_array['arquivo_path'];?>" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                        <?php
                                    }else{
                                        ?>
                                        <img 
                                            src="<?php echo $convertido_para_array['arquivo_path'];?>" 
                                            alt="Image"
                                            class="img-fluid cardbox-img">
                                    <?php
                                    }                                    
                                }
                            ?>
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
                <?php
                    }
                ?>


                </div>


            </div>

        </div>



        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="../bootstrap-5.1.3/dist/js/bootstrap.min.js"></script>

</body>




</html>