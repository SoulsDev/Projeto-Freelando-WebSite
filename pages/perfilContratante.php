<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

    <meta charset="utf-8">

    <title>FreeLando | Perfil</title>
    <link rel="shortcut icon" href="../medias/img/Group.svg" type="image/x-icon">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="../scripts/jquery.mask.js"></script>
    <script src="../scripts/script_perfilContrat.js"></script>

    <!-- bootstrap -->
    <link rel="stylesheet" href="../bootstrap-5.1.3/dist/css/bootstrap.css">

    <link rel="stylesheet" href="../css/style_perfilContrat.css">

</head>

<body>

    <?php 
    
    include "navbar.html";

    ?>

    <div class="conteudo-perfil ">

        <div class="container perfil-fundo shadow-lg" style="background-color:#fff;">

            <div class="row align-items-center d-flex flex-row"
                style="border-bottom: solid 2px #ff6d3c; padding:20px; padding-left: 0px;">
                <img src="../medias/img/asta.jpg" alt="sunil" class="foto-perfil">
                <span class="h3 arial" style="width: 200px;">Asta</span>

            </div>

            <div class="row">

                <div class="col-md-3" style="border-right: solid #ff6d3c 2px; padding-top: 22px;" id="links_ativos">

                    <div class="d-flex flex-row clicavel" onclick="TornarAtivo(0)">
                        <div class="menu-perfil" style="margin-left: -12px;"></div>
                        <div class="menu-item-perfil fonte-violeta h5 verdana">Dados pessoais</div>
                    </div>
                    <div class="d-flex flex-row clicavel" onclick="TornarAtivo(1)">
                        <div style="margin-left: -12px;"></div>
                        <div class="menu-item-perfil h5 verdana">Senha de acesso</div>
                    </div>
                    <div class="d-flex flex-row clicavel" onclick="TornarAtivo(2)">
                        <div  style="margin-left: -12px;"></div>
                        <div class="menu-item-perfil h5 verdana">Endereço</div>
                    </div>

                </div>

                <div class="col-md-9 form-perfil">
                    
                    <form action="" name="contrata1" style="padding-right: 150px;">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nome" class="h5 verdana">Nome</label>
                                <input class="form-control outline" type="text" id="nome" name="nome">
                            </div>

                            <div class="form-group">
                                <label for="email" class="h5 verdana">Email</label>
                                <input class="form-control outline" type="email" id="email" name="email">
                            </div>

                            <button class="btn verdana outline" type="submit" style="background-color: #ff6d3c; width: 100px; border: none; color: #fff
                            ;">Confirmar</button>
                        </div>
                    </form>
                    

                    
                    <form action="" name="contrata2" style="padding-right: 150px;" class="d-none">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nome" class="h5 verdana">Senha</label>
                                <input class="form-control outline" type="password" id="senha" name="senha">
                            </div>

                            <div class="form-group">
                                <label for="email" class="h5 verdana">Nova senha</label>
                                <input class="form-control outline" type="password" id="confirmsenha" name="confirmsenha">
                            </div>

                            <button type="submit" class="btn verdana outline" type="submit" style="background-color: #ff6d3c; width: 100px; border: none; color: #fff
                            ;">Confirmar</button>
                        </div>
                    </form>



                    <form action="" name="contrata3" class="d-none">

                        <div class="row ">

                            <div class="form-group col-md-3" id="cep_form_div">
                                <label for="cep" class="h5 verdana">CEP<span style="color: rgb(145, 145, 145)">*</span></label>
                                <input class="form-control outline" type="text" name="cep" id="cep" onblur="pesquisacep(this.value);">
                            </div>

                            <div class="invalid-feedback">
                                Preencha este campo
                            </div>

                            <div class="form-group col-md-6">
                                <labe for="cidade" class="h5 verdana">Cidade<span style="color: rgb(145, 145, 145)">*</span></labe>
                                <input class="form-control outline" type="text" name="cidade" id="cidade" disabled>
                                <div></div>
                            </div>
                        </div>




                        <div class="row ">
                            <div class="form-group col-md-3">
                                <labe for="uf" class="h5 verdana">UF<span style="color: rgb(145, 145, 145)">*</span></labe>
                                <input class="form-control outline" type="text" name="uf" id="uf" disabled>
                        
                                <div></div>
                            </div>

                            <div class="form-group col-md-6">

                                <labe for="logradouro" class="h5 verdana">Logradouro<span style="color: rgb(145, 145, 145)">*</span></labe>
                                <input class="form-control outline" type="text" name="logradouro" id="logradouro" disabled>
                                <div></div>
    
                            </div>
                        </div>



                        <div class="row ">
                            <div class="form-group col-md-3" id="numero_form_div">
                                <labe for="numero" class="h5 verdana">Número<span style="color: rgb(145, 145, 145)">*</span></labe>
                                <input class="form-control outline" type="text" name="numero" id="numero">
                                <div class="invalid-feedback verdana">
                                    Preencha este campo
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <labe for="complemento" class="h5 verdana">Complemento</labe>
                                <input class="form-control outline" type="text" name="complemento" id="complemento">
                                <div></div>
                            </div>
                        </div>

                        <button type="submit" class="btn verdana outline" type="submit" style="background-color: #ff6d3c; width: 100px; border: none; color: #fff
                        ;">Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>