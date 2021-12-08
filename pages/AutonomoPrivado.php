<?php
    session_start();
    include('../src/classes/postagem/Postagem.php');
    include('../src/classes/profissional/Profissional.php');
    include('../src/classes/cargo/Cargo.php');
    include('../src/classes/dado_academico/DadoAcademico.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="titulo">João Franco | Freelando</title>

    <link rel="shortcut icon" href="../medias/img/Group.svg" type="image/x-icon">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../bootstrap-5.1.3/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../css/styles_autonomopv.css">
    <link rel="stylesheet" href="../css/modal.css">
</head>

<body>


    <?php
    
    include"navbar.php";
    
    
    ?>
    <div class="container bg-white shadow-lg ">

        <div class="row">


            <div class=" row container-header ">

                <div class="col-3 usuario-foto d-flex flex-column justify-content-center">
                    <img src="<?php echo $_SESSION['foto_perfil'] ?>"alt="sunil" class="foto-perfil rounded-circle" id="current_photo">
                <form action="../src/classes/profissional/AlteraFoto.php" method="POST" id="form_photo" enctype="multipart/form-data" style="display:none;">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['id_usuario'] ?>">
                    <input type="file" name="user_photo" id="user_photo">
                </form>
                </div>

                <div class="col-7 dados-usuario d-flex flex-column justify-content-center ">
                    <div class="d-flex align-items-end justify-content-end">
                        <img id="edit-dadospessoais" name="edit-dadospessoais" class="btn p-0" src="../medias/img/editar.svg" alt="User">
                    </div>


                    <h1><?php echo $_SESSION['nome_usuario']; ?></h1>
                    <p>Eletricista | lorem | Lorem </p>
                    <p>300 seguidores <strong><br><?php 
                        echo $_SESSION['rua_usuario']." ". 
                        $_SESSION['numero_endereco_usuario']. " ". 
                        $_SESSION['complemento_endereco_usuario']. ", ". 
                        $_SESSION['cidade_usuario']. "-".
                        $_SESSION['uf_usuario'];
                        ?></strong></p>

                </div>


            </div>

            <div class="col-12 line">
            </div>


            <div class="col-3 d-flex flex-column">

                <div class="container-dados">


                    <div class="d-flex align-items-end justify-content-end">
                        <img id="edit-interesses" class="img-fluid btn p-0" src="../medias/img/editar.svg" alt="User">
                    </div>

                    <h2>Interesses:</h2>
                    <ul>
                        <?php
                        $consulta = Profissional::listar_minhas_experiencias($_SESSION['id_usuario']);
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

                    <div class="d-flex align-items-end justify-content-end">
                        <img id="edit-formacoes" name="edit-formacoes" class="img-fluid btn p-0" src="../medias/img/editar.svg" alt="User">
                    </div>

                    <h2>Cursos & Formações:</h2>

                    <ul>
                        <?php
                        $consulta = Profissional::listar_meus_conhecimentos($_SESSION['id_usuario']);
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

            <div class="col-9 d-flex flex-column justify-content-center align-items-center">


                <div class="container-btn">
                    <button id="novo-publicacao" name="novo-publicacao" onclick="" type="button" class="btn-publicacao">Adicionar Publicação</button>
                </div>
                <?php
                    foreach(Postagem::listarMinhasPostagens($_SESSION['id_usuario']) as $postagem){
                        $convertido_para_array = iterator_to_array($postagem);
                ?>  
                <div class="cardbox shadow-lg bg-white">

                    <div class="cardbox-heading">

                        <!--/ dropdown -->
                        <div class="media m-0">
                            <div class="d-flex mr-3">
                                <a href=""><img class="img-fluid rounded-circle" src="<?php echo $_SESSION['foto_perfil'] ?>" alt="User"></a>
                            </div>

                            <div class="media-body">
                                <p class="m-0"><?php echo $_SESSION['nome_usuario'];?></p>
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


    <!-- MODAL -->

    <!-- modal da publicação -->
    <div id="modal-publicacao" class="modal-container">
        <div class="modal">
            <div class="conteudo-modal ">
                <div class=" d-flex justify-content-end align-items-end w-100">
                    <img name="btn-fechar" src=" ../medias/img/btnclose.svg " alt=" botao " class=" botao-close ">
                </div>

                <h1 class="h1-pu ">Nova publicação</h1>

                <div class="line-modal"></div>
            </div>
            <form method="POST" action="../src/classes/postagem/InsPostagem.php" enctype="multipart/form-data">
                <div class="caixa-de-texto flex-column">
                    <textarea name="caixa-texto" id="caixa " rows="7 " class="caixa " placeholder="Descrição da publicação "></textarea>
                    <input type="file" id="file" name="file" style="display:none;">
                    <div class="d-flex w-100 position-relative anexo-img" id="anexar_arquivo">
                        <img class="btn m-0 p-0 " src="../medias/img/anexo-imagem.svg">
                    </div>
                    
                </div>


                <button class="botao-publicar ">Publicar</button>
            </form>
        </div>

    </div>


    <!-- modal interesse -->
    <div id="modal-interesse" class="modal-container-2">

        <div class="modal-2">

            <div class="conteudo-modal-2">


                <div class=" d-flex justify-content-end align-items-end " style="width: 100%;">
                    <img name="btn-fechar" src=" ../medias/img/btnclose.svg " alt=" botao " class=" botao-close ">
                </div>


                <div class="tab ">

                    <div class="container-2 ">

                        <div class="formulario-2 ">

                            <div class="titulo-2 ">
                                <p>Interesse</p>
                            </div>

                            <div class="campos-input-pequeno ">


                                <label class="label " for="area_profissao ">Área</label>

                                <select name="area_profissao" id="area_profissao " class="input" onchange="listarProfissoes(this.value)">
                                    <option style="width: 100%; " value=" " disabled selected>Selecione</option>
                                    <?php 
                                        $listaArea = Cargo::listaArea();
                                        while($row = $listaArea->fetch(PDO::FETCH_BOTH)) {
                                    ?>
                                        <option value="<?php echo $row['n_id'];?>">
                                            <?php echo $row['c_nome']; ?>
                                        </option>
                                    <?php
                                        }
                                    ?>

                                </select>
                                <div></div>
                            </div>

                            <div class="campos-input-pequeno ">

                                <label class="label " for="profissao">Profissão<span
                                        style="color: rgb(145, 145, 145) ">*</span></label>

                                <select name="profissao" id="profissao" class="input ">
                                    <option value=" " disabled selected>Selecione</option>
                                    <?php 
                                        $listaArea = Cargo::listaProfissoes();
                                        while($row = $listaArea->fetch(PDO::FETCH_BOTH)) {
                                            ?>
                                            <option value="<?php echo $row['n_id']; ?>"
                                            area="<?php echo $row['n_id_area']; ?>" 
                                            class = "profissoes_dinamico"
                                            style="display:none;"
                                            ><?php 
                                                    echo $row['c_nome'];
                                                ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                <div></div>

                            </div>

                            <div class="campos-input-pequeno ">

                                <labe class="label " for="nivel_experiencia ">Nível de experiência<span style="color: rgb(145, 145, 145) ">*</span></labe>

                                <select name="nivel_experiencia " id="nivel_experiencia" class="input ">
                                    <option value=" " disabled selected>Selecione</option>
                                    <option value=6>6 meses</option>
                                    <option value=9>9 meses</option>
                                    <option value=12>1 ano</option>
                                    <option value=24>2 ano</option>
                                    <option value=36>3 ano</option>
                                    <option value=48>4 ano</option>
                                    <option value=60>5 anos</option>
                                    <option value=61>Mais</option>


                                </select>
                                <div></div>
                            </div>


                            <div class="container-btn-form2 ">
                                <img name="btncargo-cancelar" id="btncargo-cancelar" class="btn-deletecargo" src="../medias/img/btn-x.png " alt="adicionar ">
                                <img name="btncargo-add " id="btncargoadd " class="btn-addcargo " src="../medias/img/btn-add.png " alt="adicionar " onclick="addCargo();">

                            </div>

                        </div>

                        <div class="formulario-2 ">
                            
                            <div class="titulo-2 ">
                                <p>Cargos cadastrados</p>
                            </div>
                            <form action="../src/classes/cargo/AdicionaCargo.php" method="POST">
                            <ul class="cargo-list" id="cargo_ul">
                                <input type="hidden" name="cargos" id="lista-cargos">
                                <input type="hidden" name="id" value="<?php echo $_SESSION['id_usuario'] ?>">
                                <?php
                                    $experiencias = Cargo::listaMinhaExperiencias($_SESSION['id_usuario']);
                                    
                                    while($row = $experiencias->fetch(PDO::FETCH_BOTH)) {
                                        ?>
                                            <li>
                                                <a id="cargo " name="cargo "> <?php echo $row['c_nome']; ?>
                                                </a>
                                            </li>
                                        <?php
                                    }
                                ?>
                                    <!-- <a id="cargo " name="cargo ">Exemplo
                                         <img onclick=" " id="cargo-apagar " name="cargo-apagar "
                                            style="cursor: pointer; " src="../medias/img/btn-x2.svg ">
                                    </a> -->
                            </ul>

                        </div>
                    </div>
                    <div class="botao-publi ">
                        <button class="cancelar" id="cancelar_cargo">Cancelar</button>
                        
                        <input type="submit" class="confirmar" value="confirmar">
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>


    <!-- modal-3 -->
    <div id="modal-formacao" class="modal-container-3">
        <div class=" modal-3 ">
            <div class=" conteudo-modal-3 ">


                <div class=" d-flex justify-content-end align-items-end w-100">
                    <img name="btn-fechar" src=" ../medias/img/btnclose.svg " alt=" botao " class=" botao-close ">
                </div>

                <form action="../src/classes/dado_academico/AdicionaDadoAcademico.php" method="POST">

                <input type="hidden" name="id" value="<?php echo $_SESSION['id_usuario'] ?>">
                <div class=" tab ">

                    <div class=" container-3 ">

                        <div class=" formulario-3 ">

                            <div class=" titulo-3 ">
                                <p>Formação acadêmica</p>
                            </div>

                            <div class=" campos-input-pequeno " id="ensino_form_div ">

                                <labe class=" label-2 " for=" ensino ">Ensino<span style=" color: rgb(145, 145, 145) ">*</span>
                                </labe>

                                <select class=" input-2 " id="ensino" name=" ensino ">
                                    <option value=" " disabled selected>Selecione</option>
                                    <option>Fundamental</option>
                                    <option>Médio</option>
                                    <option>Superior</option>

                                </select>
                                <div></div>
                            </div>


                        </div>

                        <div class=" formulario-3 ">

                            <div class=" titulo-3 ">
                                <p>Graduação</p>
                            </div>

                            <div class=" campos-input-pequeno " id=" graducao_form_div ">

                                <labe class=" label-2 " for=" instituicao ">Instituição<span style=" color: rgb(145, 145, 145) ">*</span></labe>

                                <input class=" input-2 " name=" instituicao " id=" instituicao " list=" dtlist-instituicao " Placeholder=" Insira sua Instituição ">
                                <div class=" invalid-feedback ">
                                    Preencha este campo
                                </div>
                                <datalist id=" dtlist-instituicao ">
                                    <option value=" USP ">
                                    <option value=" UNIP ">
                                    <option value=" UNINOVE ">
                                    <option value=" FMU ">
                                    <option value=" Safari ">
                                </datalist>

                            </div>


                            <div class=" campos-input-pequeno ">

                                <labe class=" label-2 " for=" curso_graducao ">Curso<span style=" color: rgb(145, 145, 145) ">*</span></labe>

                                <input class=" input-2 " name=" curso_graducao " id="curso_graducao" list=" dtlist-curso_graducao " Placeholder=" Insira o Curso ">
                                <div class=" invalid-feedback ">
                                    Preencha este campo
                                </div>
                                <datalist id="dtlist-curso_graducao">
                                    <option value=" Exemplo ">
                                    <option value=" Exemplo2 ">
                                    <option value=" Exemplo3 ">
                                    <option value=" Exemplo4 ">


                                </datalist>
                            </div>


                        </div>

                        <div class=" formulario-4 ">

                            <div class=" titulo-4 ">
                                <p>Cursos</p>
                            </div>

                            <div class=" campos-input-pequeno ">

                                <labe class="label" for="nivel_curso">Nível<span style=" color: rgb(145, 145, 145) ">*</span>
                                </labe>

                                <select class="input" name="nivel_curso" id="nivel_curso">
                                    <option value=" " disabled selected>Selecione</option>
                                    <option>Tecnólogo</option>
                                    <option>Técnico</option>

                                </select>
                                <div></div>
                            </div>

                            <div class=" campos-input-pequeno ">

                                <labe class=" label " for="curso">Curso<span style=" color: rgb(145, 145, 145) ">*</span>
                                </labe>

                                <input class=" input " name="curso_profissionalizante" id="curso_profissionalizante" list="curso" Placeholder=" Insira o Curso" value="">
                                <div class=" invalid-feedback ">
                                    Preencha este campo
                                </div>

                                <datalist name="curso" id="curso">
                                    <option>Eletricista</option>
                                    <option>Desenvolvedor</option>
                                    <option>Mecânico Automotivo</option>
                                    <option>Pedreiro</option>
                                    <option>Manicure</option>

                                </datalist>

                            </div>

                            <div class=" campos-input-pequeno ">

                                <labe class=" label " for="cargahoraria_curso">Carga horária<span style=" color: rgb(145, 145, 145) ">*</span>
                                </labe>

                                <select class=" input " name="cargahoraria_curso" id="cargahoraria_curso">
                                    <option value=" " disabled selected>Selecione</option>
                                    <option value="40">40 horas</option>
                                    <option value="80">80 horas</option>
                                    <option value="120">120 horas</option>
                                    <option value="200">200 horas</option>
                                    <option value="260">260 horas</option>
                                    <option value="360">360 horas</option>
                                    <option value="400">400 horas</option>
                                    <option value="102">Mais</option>

                                </select>
                                <div></div>
                            </div>


                            <div class=" container-btn-form2 ">
                                <img class=" btn-deletecurso " src=" ../medias/img/btn-x.png " alt=" adicionar ">
                                <img class=" btn-addcurso " src=" ../medias/img/btn-add.png " alt=" adicionar " onclick="addCurso()">

                            </div>

                        </div>

                        <div class=" formulario-4 ">

                            <div class=" titulo-4 ">
                                <p>Cursos cadastrados</p>
                            </div>
                            <!-- CAMPO DE ITENS DO CURSOS CADASTRADOS -->
                            <input type="hidden" name="cursos" id="lista-cursos">
                            <ul class=" curso-list " id="curso_ul">
                                <?php
                                    $experiencias = DadoAcademico::listaMeusDados($_SESSION['id_usuario']);
                                    
                                    while($row = $experiencias->fetch(PDO::FETCH_BOTH)) {
                                        ?>
                                            <li>
                                                <a id=" curso " name=" curso "> <?php echo $row['c_nome']; ?>
                                                </a>
                                            </li>
                                        <?php
                                    }
                                ?>
                                    <!-- <a id=" curso " name=" curso ">Exemplo 1
                                        <img onclick=" " id=" curso-apagar " name=" curso-apagar "
                                            style=" cursor: pointer; " src=" ../medias/img/btn-x2.svg ">
                                    </a> -->
                            </ul>

                        </div>


                    </div>

                    <div class=" botao-publi-2 ">
                        <button class=" cancelar" id="cancelar_curso">Cancelar</button>
                        <input type="submit" value="confirmar" class="confirmar">
                    </div>


                </div>
            </form>


            </div>
        </div>

    </div>


    <!-- modal-4 -->
    <div id="modal-dadospessoais" class=" modal-container-4">
        <div class=" modal-4 ">

            <div class=" conteudo-modal ">

                <div class=" d-flex justify-content-end align-items-end w-100">
                    <img name="btn-fechar" src=" ../medias/img/btnclose.svg " alt=" botao " class=" botao-close ">
                </div>


                <!-- <h1 class=" h1 ">Mudar foto de perfil</h1>
            </div>
            <div class=" caixa-de-texto-4 ">
                <textarea name=" caixa-texto " id=" caixa " rows=" 5 " class=" caixa-4 " placeholder=" Eletricista | Lorem | Lorem | Lorem | Lorem "></textarea>
            </div> -->

            <form action="../src/classes/profissional/AlteraEndereco.php" method="POST">
                <div class=" input-4 ">
                    <p class=" endereco ">
                        <strong>
                            Endereço
                        </strong>
                    </p>

                    <span class=" cep-texto ">CEP</span><input type=" number " name="cep" id="cep" class=" cep" value="<?php echo $_SESSION['cep_usuario'] ?>">
                    <br>
                    <span class=" numero-texto ">N°</span><input type=" number " name="numero" id="numero" class=" numero" value="<?php echo $_SESSION['numero_endereco_usuario'] ?>">
                    <br>
                    <span class=" numero-texto ">Complemento</span><input type="text" name="complemento" id="complemento" class=" numero" value="<?php echo $_SESSION['complemento_endereco_usuario'] ?>">
                    <input class="form-control outline" type="hidden" name="logradouro" id="logradouro" value="<?php echo $_SESSION['rua_usuario']; ?>">
                    <input class="form-control outline" type="hidden" name="uf" id="uf" value="<?php echo $_SESSION['uf_usuario']; ?>">
                    <input class="form-control outline" type="hidden" name="cidade" id="cidade" value="<?php echo $_SESSION['cidade_usuario']; ?>">
                </div>



                <div class=" botao-publi-4 ">
                    <button class=" cancelar ">Cancelar</button>
                    <input type="submit" class="confirmar" value="Confirmar">
                </div>
            </form>
        </div>



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

            window.onload = function(){
                document.getElementById('username').innerHTML = '<?php echo $_SESSION['nome_usuario'] ?>';
                document.getElementById('titulo').innerHTML = '<?php echo $_SESSION['nome_usuario']." | Freelando" ?>';
                
            }

            input_file = document.getElementById('file');
            document.getElementById('anexar_arquivo').addEventListener('click', () => {
                input_file.click();
            })

            input_file.addEventListener('change', ()=> {
                if(input_file.files <= 0){
                    return;
                }

                var reader = new FileReader();

                reader.onload = () => {
                    document.getElementById('imagem').src = reader.result;
                }

                reader.readAsDataURL(input_file.files[0]);
            })
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="../bootstrap-5.1.3/dist/js/bootstrap.min.js"></script>
        <script src="../scripts/modal_autonomopv.js"></script>

        <script>
            function listarProfissoes(area_id) {
                profissoes = document.getElementsByClassName("profissoes_dinamico");
                for (let item of profissoes) {
                    item.style.display = "none";
                    atributo = item.getAttribute('area');
                    if (atributo == area_id) {
                        item.style.display = "block";
                    }
                }
            }

            document.getElementById('current_photo').addEventListener('click', function(){
                document.getElementById('user_photo').click();
            })

            document.getElementById('user_photo').addEventListener('change', function(){
                document.getElementById('form_photo').submit();
            })

            function addCargo() {
                profissao = document.getElementById('profissao');
                tempo_atuacao = document.getElementById('nivel_experiencia');

                lista = document.getElementById('cargo_ul');

                indice = lista.children.length + 1;

                link = document.createElement('a');
                link.setAttribute('name', 'cargo');
                link.innerHTML = profissao.options[profissao.selectedIndex].text;

                item = document.createElement('li');
                item.setAttribute('id', 'item_' + indice);
                item.appendChild(link);


                lista.appendChild(item);

                document.getElementById("lista-cargos").value = document.getElementById("lista-cargos").value + profissao.value + "," + tempo_atuacao.value + ";";
            }



            function addCurso() {
                nivel_curso = document.getElementById('nivel_curso');
                nome_curso = document.getElementById('curso_profissionalizante');
                duracao = document.getElementById('cargahoraria_curso');

                lista = document.getElementById('curso_ul');

                indice = lista.children.length + 1;

                link = document.createElement('a');
                link.setAttribute('name', 'curso_' + indice);
                link.innerHTML = nome_curso.value;

                item = document.createElement('li');
                item.setAttribute('id', 'curso_' + indice);
                item.appendChild(link);


                lista.appendChild(item);
                document.getElementById("lista-cursos").value = document.getElementById("lista-cursos").value + nivel_curso.value + "," + nome_curso.value + "," + duracao.value + ";";
            }
            
            document.getElementById("cancelar_cargo").addEventListener("click", function(event){
                event.preventDefault();
                document.getElementById('lista-cargos').value="";
                document.getElementById('modal-interesse').classList.remove('ativo');
            });

            document.getElementById("cancelar_curso").addEventListener("click", function(event){
                event.preventDefault();
                document.getElementById('lista-cursos').value="";
                document.getElementById('modal-interesse').classList.remove('ativo');
            });
        </script>

</body>
</html>