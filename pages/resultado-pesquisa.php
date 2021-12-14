<?php
    session_start();
    include('../src/classes/filtro_pesquisa/Filtro.php');
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
    <link rel="stylesheet" href="../css/teste.css">

    <title>Freelando</title>
</head>
<body>
    <?php include "navbar.php"; ?>

    <section class="hero">
        <div class="container conteudo">
            <?php
                $busca = Filtro::BuscarPorNome($_POST['pesquisa']);

                while($row = $busca->fetch(PDO::FETCH_BOTH)) {
                    ?>
            <div class="row">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                      <div class="col-md-3">
                        <div class="icone-perfil">
                            <a href="AutonomoPublico.php?id=<?php echo $row['n_id'] ?>" style="text-decoration: none; color: #000;">
                            <img src="<?php echo $row['c_imagem_perfil'] ?>" class="img-fluid rounded-start" alt="" width="80px"> <br>
                            <span class="userName"><?php echo $row['c_nome'] ?></span>
                            </a>
                            <!-- <div class="icon-level">
                                <img src="../medias/img/level-up.png" alt="" width="25px">
                                <p class="level">Nível 28</p>
                            </div> -->
                        </div>
                      </div>
                      <div class="col-md-9">
                        <div class="card-body">
                            <p class="card-text icons-int">
                                <span class="seguir">seguir</span> 
                                <img class="icon-chat1" src="../medias/img/chat-1.svg" alt="" width="30px">
                                <img src="../medias/img/star-1.svg" alt="" width="20px">
                                <img src="../medias/img/star-1.svg" alt="" width="20px">
                                <img src="../medias/img/star-1.svg" alt="" width="20px">
                            </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="col-lg-3 marg-cat">
                    <div class="categoria">
                        <div class="categoria-top">
                            <p>Navegue por categoria</p>
                        </div>
                        <ul>
                            <li>
                                <a>Construção/ Reforma</a>
                            </li>
                            <li>
                                <a>Odontologia</a>
                            </li>
                            <li>
                                <a>Mecânica</a>
                            </li>
                        </ul>
                    </div>
                </div> -->
    


            </div>
                    <?php
                }
            ?>

            
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