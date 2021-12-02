<?php
    session_start();
    include_once('../src/classes/postagem/Postagem.php');
    include_once('../src/classes/profissional/Profissional.php');
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
    <link rel="stylesheet" href="../css/styles_home.css">

    <title>Freelando</title>
</head>
<body>


    <?php  
    include"navbar.php";

    ?>

    <section class="hero">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 offset-lg-2 publicacao">
                    <?php
                            foreach(Postagem::listarPostagens() as $postagem){
                                $convertido_para_array = iterator_to_array($postagem);
                    ?>

                    <div class="cardbox shadow-lg bg-white">

                        <div class="cardbox-heading">
                            <?php
                                $autor = Profissional::getProfissional($convertido_para_array['autonomo']);
                                
                            ?>
                            <!--/ dropdown -->
                            <div class="media m-0">
                                <div class="d-flex mr-3">
                                    <a href=""><img class="img-fluid rounded-circle" src="<?php echo $autor['c_imagem_perfil'] ?>" alt="User"></a>
                                </div>

                                <div class="media-body">
                                    <p class="m-0"><?php echo $autor['c_nome'];?></p>
                                    <small><span><i class="icon ion-md-time"></i><?php echo $convertido_para_array['dt_registro'];?></span></small>
                                </div>

                                <div class="d-flex mr-3">
                                    <a href=""><img class="img-fluid link" src="../medias/img/link-2.svg" alt="User"></a>
                                </div>


                            </div>
                            <div class="media m-0">
                                <p class="m-0 title-postagem"><?php echo $convertido_para_array['conteudo'];?>
                                </p>
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




                    <!--/ cardbox -->

                </div>
                <!--/ col-lg-6 -->
                <div class="col-lg-3 order ">
                    <div class="shadow-lg  categoria">

                        <div class="categoria-top">
                            <p>Navegue por Categoria</p>
                        </div>

                        <ul>
                            <li>
                                <a>Construção/ Reforma</a>
                            </li>

                            <li>
                                <a>Design/Tecnologia</a>
                            </li>

                            <li>
                                <a>Mecânica</a>
                            </li>

                        </ul>

                    </div>
                </div>
                <!--/ col-lg-3 -->

            </div>
            <!--/ row -->
        </div>
        <!--/ container -->
    </section>

    <script>
    window.onload = function(){
        document.getElementById('username').innerHTML = '<?php echo $_SESSION['nome_usuario'] ?>';
        }
    </script>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>

    <script src="../bootstrap-5.1.3/dist/js/bootstrap.min.js"></script>

</body>

</html>