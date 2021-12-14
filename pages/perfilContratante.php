<?php
    session_start();
?>

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
    
    include "navbar.php";

    ?>

    <div class="conteudo-perfil ">

        <div class="container perfil-fundo shadow-lg" style="background-color:#fff;">

            <div class="row align-items-center d-flex flex-row"
                style="border-bottom: solid 2px #ff6d3c; padding:20px; padding-left: 0px;">

                <img src="<?php echo $_SESSION['foto_perfil'] ?>" alt="sunil" class="foto-perfil" id="current_photo">
                <form action="../src/classes/contratante/AlteraFoto.php" method="POST" id="form_photo" enctype="multipart/form-data" style="display:none;">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['id_usuario'] ?>">
                    <input type="file" name="file" id="file">
                </form>
                <span class="h3 arial" style="width: 200px;"><?php echo $_SESSION['nome_usuario'] ?></span>
                <!-- style="border-bottom: solid 2px #ff6d3c; padding:20px; padding-left: 0px;"> -->
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
                    
                    <form action="../src/classes/contratante/AlteraDadosPessoais.php" name="contrata1" class="formulario" style="padding-right: 150px;" method="POST">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['id_usuario'] ?>">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nome" class="h5 verdana">Nome</label>
                                <input class="form-control outline" type="text" id="nome" name="nome" value="<?php echo $_SESSION['nome_usuario'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="email" class="h5 verdana">Email</label>
                                <input class="form-control outline" type="email" id="email" name="email" value="<?php echo $_SESSION['email_usuario'] ?>">


                                
                            </div>

                            <button class="btn verdana outline" type="submit" style="background-color: #ff6d3c; width: 100px; border: none; color: #fff;">
                            Confirmar</button>
                        </div>
                    </form>
                    

                    
                    <form action="../src/classes/contratante/AlteraSenha.php" name="contrata2" style="padding-right: 150px;" class="d-none formulario" method="POST">
                        <input type="hidden" name="user_id" value=<?php echo $_SESSION['id_usuario'] ?>>   
                        <input type="hidden" name="user_email" value="<?php echo $_SESSION['email_usuario'] ?>">   
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nome" class="h5 verdana">Senha</label>
                                <input class="form-control outline" type="password" id="senha" name="senha">
                            </div>
                            
                                <?php 
                                    
                                    if(isset($_SESSION['erro'])){
                                        if(array_key_exists('erro', $_SESSION)){
                                            ?>
                                            <div class="invalid-feedback" style="display: block">
                                            <?php
                                                echo $_SESSION['erro'];
                                            ?>
                                            </div>
                                            <?php
                                        }
                                    }
                                ?>
                            

                            <div class="form-group">
                                <label for="email" class="h5 verdana">Nova senha</label>
                                <input class="form-control outline" type="password" id="confirmsenha" name="confirmsenha">
                            </div>

                            <button type="submit" class="btn verdana outline" type="submit" style="background-color: #ff6d3c; width: 100px; border: none; color: #fff
                            ;">Confirmar</button>
                        </div>
                    </form>



                    <form action="../src/classes/contratante/AlteraEndereco.php" name="contrata3" class="d-none formulario" method="POST" id="formulario_endereco">
                        <input type="hidden" name="user_id" value=<?php echo $_SESSION['id_usuario'] ?>>
                        <div class="row ">

                            <div class="form-group col-md-3" id="cep_form_div">
                                <label for="cep" class="h5 verdana">CEP<span style="color: rgb(145, 145, 145)">*</span></label>
                                <input class="form-control outline" type="text" name="cep" id="cep" onblur="pesquisacep(this.value);" value="<?php echo $_SESSION['cep_usuario']; ?>">
                            </div>

                            <div class="invalid-feedback">
                                Preencha este campo
                            </div>

                            <div class="form-group col-md-6">
                                <labe for="cidade" class="h5 verdana">Cidade<span style="color: rgb(145, 145, 145)">*</span></labe>
                                <input class="form-control outline" type="text" name="cidade" id="cidade" disabled value="<?php echo $_SESSION['cidade_usuario']; ?>">
                                <div></div>
                            </div>
                        </div>




                        <div class="row ">
                            <div class="form-group col-md-3">
                                <labe for="uf" class="h5 verdana">UF<span style="color: rgb(145, 145, 145)">*</span></labe>
                                <input class="form-control outline" type="text" name="uf" id="uf" disabled value="<?php echo $_SESSION['uf_usuario']; ?>">
                        
                                <div></div>
                            </div>

                            <div class="form-group col-md-6">

                                <labe for="logradouro" class="h5 verdana">Logradouro<span style="color: rgb(145, 145, 145)">*</span></labe>
                                <input class="form-control outline" type="text" name="logradouro" id="logradouro" disabled value="<?php echo $_SESSION['rua_usuario']; ?>">
                                <div></div>
    
                            </div>
                        </div>



                        <div class="row ">
                            <div class="form-group col-md-3" id="numero_form_div">
                                <labe for="numero" class="h5 verdana">Número<span style="color: rgb(145, 145, 145)">*</span></labe>
                                <input class="form-control outline" type="text" name="numero" id="numero" value="<?php echo $_SESSION['numero_endereco_usuario']; ?>">
                                <div class="invalid-feedback verdana">
                                    Preencha este campo
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <labe for="complemento" class="h5 verdana">Complemento</labe>
                                <input class="form-control outline" type="text" name="complemento" id="complemento" value="<?php echo $_SESSION['complemento_endereco_usuario']; ?>">
                                <div></div>
                            </div>
                        </div>

                        <button type="submit" class="btn verdana outline" type="submit" style="background-color: #ff6d3c; width: 100px; border: none; color: #fff;" id="formulario_alterar_endereco">
                            Confirmar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('logradouro').value = (conteudo.logradouro);
        // TODO adicionar o input pra podermos fazer o radar
        //document.getElementById('bairro').value=(conteudo.bairro);
        document.getElementById('cidade').value = (conteudo.localidade);
        document.getElementById('uf').value = (conteudo.uf);
    } //end if.
    else {
        //CEP não Encontrado.
        alert("CEP não encontrado.");
    }
}


function pesquisacep(valor) {
    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {

            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            alert("Formato de CEP inválido.");
        }
    }
}


document.getElementById('formulario_alterar_endereco').addEventListener('click', function(event){
    event.preventDefault();
    document.getElementById('logradouro').disabled = false;
    document.getElementById('cidade').disabled = false;
    document.getElementById('uf').disabled = false;
    document.getElementById('formulario_endereco').submit();    
})

document.getElementById('current_photo').addEventListener('click', function(){
    document.getElementById('file').click();
})

document.getElementById('file').addEventListener('change', function(){
    document.getElementById('form_photo').submit();
})


</script>

</html>