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

    <div class="conteudo-perfil">

        <div class="container perfil-fundo">

            <div class="row align-items-center d-flex flex-row"
                style="border-bottom: solid 2px orange; padding:20px; padding-left: 0px;">

                <img src="../medias/img/asta.jpg" alt="sunil" class="foto-perfil">
                <span class="h3" style="width: 200px;">Asta</span>

            </div>

            <div class="row">

                <div class="col-md-3" style="border-right: solid orange 2px; padding-top: 22px;" id="links_ativos">

                    <div class="d-flex flex-row clicavel" onclick="TornarAtivo(0)">
                        <div class="menu-perfil" style="margin-left: -12px;"></div>
                        <div class="menu-item-perfil fonte-violeta h5">Dados pessoais</div>
                    </div>
                    <div class="d-flex flex-row clicavel" onclick="TornarAtivo(1)">
                        <div style="margin-left: -12px;"></div>
                        <div class="menu-item-perfil h5">Senha de acesso</div>
                    </div>
                    <div class="d-flex flex-row clicavel" onclick="TornarAtivo(2)">
                        <div  style="margin-left: -12px;"></div>
                        <div class="menu-item-perfil h5">Endereço</div>
                    </div>

                </div>

                <div class="col-md-9 form-perfil">
                    
                    <form action="" name="contrata1" style="padding-right: 150px;">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nome" class="h5">Nome</label>
                                <input class="form-control" type="text" id="nome" name="nome">
                            </div>

                            <div class="form-group">
                                <label for="email" class="h5">Email</label>
                                <input class="form-control" type="email" id="email" name="email">
                            </div>

                            <button class="btn btn-primary" type="submit" style="background-color: blueviolet; width: 100px;">Confirmar</button>
                        </div>
                    </form>
                    

                    
                    <form action="" name="contrata2" style="padding-right: 150px;" class="d-none">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nome" class="h5">Senha</label>
                                <input class="form-control" type="password" id="senha" name="senha">
                            </div>

                            <div class="form-group">
                                <label for="email" class="h5">Nova senha</label>
                                <input class="form-control" type="password" id="confirmsenha" name="confirmsenha">
                            </div>

                            <button type="submit" class="btn btn-primary" type="submit" style="background-color: blueviolet; 
                            width: 100px;">Confirmar</button>
                        </div>
                    </form>



                    <form action="" name="contrata3" class="d-none">

                        <div class="row ">

                            <div class="form-group col-md-3" id="cep_form_div">
                                <labe for="cep" class="h5">CEP<span style="color: rgb(145, 145, 145)">*</span></labe>
                                <input class="form-control" type="text" name="cep" id="cep" onblur="pesquisacep(this.value);">
                            </div>

                            <div class="invalid-feedback">
                                Preencha este campo
                            </div>

                            <div class="form-group col-md-6">
                                <labe for="cidade" class="h5">Cidade<span style="color: rgb(145, 145, 145)">*</span></labe>
                                <input class="form-control" type="text" name="cidade" id="cidade" disabled>
                                <div></div>
                            </div>
                        </div>




                        <div class="row ">
                            <div class="form-group col-md-3">
                                <labe for="uf" class="h5">UF<span style="color: rgb(145, 145, 145)">*</span></labe>
                                <input class="form-control" type="text" name="uf" id="uf" disabled>
                        
                                <div></div>
                            </div>

                            <div class="form-group col-md-6">

                                <labe for="logradouro" class="h5">Logradouro<span style="color: rgb(145, 145, 145)">*</span></labe>
                                <input class="form-control" type="text" name="logradouro" id="logradouro" disabled>
                                <div></div>
    
                            </div>
                        </div>



                        <div class="row ">
                            <div class="form-group col-md-3" id="numero_form_div">
                                <labe for="numero" class="h5">Número<span style="color: rgb(145, 145, 145)">*</span></labe>
                                <input class="form-control" type="text" name="numero" id="numero">
                                <div class="invalid-feedback">
                                    Preencha este campo
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <labe for="complemento" class="h5">Complemento</labe>
                                <input class="form-control" type="text" name="complemento" id="complemento">
                                <div></div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" type="submit" style="background-color: blueviolet; 
                        width: 100px;">Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>