<?php 
    include ('../src/classes/cargo/Cargo.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <meta charset="utf-8">
    <link href="../css/style_cadpro.css" rel="stylesheet" type="text/css">
    <title>FreeLando | Cadastro do profissional</title>
    <link rel="shortcut icon" href="../medias/img/Group.svg" type="image/x-icon">

</head>
<script>
    function checkEmail(){
        let input = document.querySelector('#email');
        let ajax=new XMLHttpRequest();
        let params='email='+input.value;
        ajax.open('POST','../src/classes/chamada_ajax/profissional_email_ajax.php');
        ajax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
        ajax.onreadystatechange=function(){
            if(ajax.status===200 && ajax.readyState===4){
                let json=ajax.responseText;
                if(json ==  1){
                    document.getElementById('error_message_email_div').innerHTML = "Este email já esta sendo utilizado"
                    document.getElementById('error_message_email_div').style.display="block"
                    input.style.border = "1px solid #dc3545";
                    document.getElementById('nextBtn').disabled = true;
                } else{
                    document.getElementById('nextBtn').disabled = false;
                    document.getElementById('error_message_email_div').style.display="none"
                    input.style.border = "1px solid rgb(0, 0, 0);";
                }
            }
        };
        ajax.send(params);
    }
    function checkCPF(){
        let input = document.querySelector('#cpf');
        let ajax=new XMLHttpRequest();
        var cpf = input.value;
        cpf = cpf.replaceAll(".", "");
        cpf = cpf.replace('-', '');
        let params='cpf='+cpf;
        ajax.open('POST','../src/classes/chamada_ajax/profissional_cpf_ajax.php');
        ajax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
        ajax.onreadystatechange=function(){
            if(ajax.status===200 && ajax.readyState===4){
                let json=ajax.responseText;
                console.log(json);
                if(json ==  1){
                    document.getElementById('error_message_cpf_div').innerHTML = "Este CPF já esta sendo utilizado"
                    document.getElementById('error_message_cpf_div').style.display="block"
                    input.style.border = "1px solid #dc3545";
                    document.getElementById('nextBtn').disabled = true;
                } else{
                    document.getElementById('nextBtn').disabled = false;
                    document.getElementById('error_message_cpf_div').style.display="none"
                    input.style.border = "1px solid rgb(0, 0, 0);";
                }
            }
        };
        ajax.send(params);
    }
</script>
<body>

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

    <section>


        <div class="margem"> </div>

        <form id="regForm" method="POST" action="../src/classes/profissional/InsProfissional.php">



            <div class="barra-line">
                <div class="line"></div>

            </div>


            <div class="barra-progresso">
                <div class="step">
                    <div class="circulo">
                        <span>1</span>
                    </div>
                    <p>Dados </p>
                    <p>pessoais</p>
                    <p>⠀⠀⠀⠀</p>
                </div>

                <div class="step">
                    <div class="circulo">
                        <span>2</span>
                    </div>

                    <p>Dados </p>
                    <p>profissionais</p>
                    <p>⠀⠀⠀⠀</p>

                </div>

                <div class="step">
                    <div class="circulo">
                        <span>3</span>
                    </div>

                    <p>Informações</p>
                    <p>acadêmicas</p>
                    <p>⠀⠀⠀⠀</p>

                </div>

                <div class="step">
                    <div class="circulo">
                        <span>4</span>
                    </div>

                    <p>Confirmação</p>
                    <p>e</p>
                    <p>validação</p>

                </div>


            </div>


            <!-- primeira parte do formulário -->
            <div class="tab">

                <div class="formulario">

                    <div class="titulo">
                        <p>Informações gerais</p>
                    </div>

                    <div class="conteudo-formulario">

                        <div class="campos-input" id="nome_form_div">

                            <labe for="nome">Nome Completo<span style="color: rgb(145, 145, 145)">*</span>

                            </labe>
                            <input type="text" name="nome" id="nome">
                            <div class="invalid-feedback">
                                Preencha com seu nome
                            </div>
                        </div>

                        <div class="campos-input" id="cpf_form_div">

                            <labe for="cpf">CPF<span style="color: rgb(145, 145, 145)">*</span></labe>
                            <input type="text" name="cpf" id="cpf" maxlength="14" onblur="checkCPF(this.value)">
                            <div id="error_message_cpf_div" class="invalid-feedback">
                                Preencha com seu CPF
                            </div>

                        </div>

                        <div class="campos-input">

                            <labe for="genero">Genêro<span style="color: rgb(145, 145, 145)">*</span></labe>




                            <select name="genero" id="genero">
                                <option>Masculino</option>
                                <option>Feminino</option>
                                <option>Outros</option>
                            </select>
                            <div></div>

                        </div>

                        <div class="campos-input" id="dt_nasc_form_div">

                            <labe for="data_nascimento">Data de Nascimento<span style="color: rgb(145, 145, 145)">*</span></labe>
                            <input type="date" name="data_nascimento" id="data_nascimento">

                            <div class="invalid-feedback">
                                Preencha com sua data de nascimento
                            </div>

                        </div>

                        <div class="campos-input" id="email_form_div">

                            <labe for="email">Email<span style="color: rgb(145, 145, 145)">*</span></labe>
                            <input type="email" name="email" id="email" onblur="checkEmail(this.value)">
                            <div id="error_message_email_div" class="invalid-feedback">
                                Preencha com seu email
                            </div>

                        </div>

                        <div class="campos-input" id="celular_form_div">

                            <labe for="celular">Celular<span style="color: rgb(145, 145, 145)">*</span></labe>
                            <input type="tel" name="celular" id="celular">
                            <div class="invalid-feedback">
                                Preencha com um número de celular válido
                            </div>
                        </div>

                        <div class="campos-input" id="senha_form_div">

                            <labe for="senha">Senha<span style="color: rgb(145, 145, 145)">*</span></labe>
                            <input type="password" name="senha" id="senha">
                            <div class="invalid-feedback">
                                Preencha este campo
                            </div>
                        </div>



                    </div>


                </div>


                <div class="formulario">

                    <div class="titulo">
                        <p>Endereço</p>
                    </div>

                    <div class="conteudo-formulario">

                        <div class="campos-input" id="cep_form_div">

                            <labe for="cep">CEP<span style="color: rgb(145, 145, 145)">*</span></labe>
                            <input type="text" name="cep" id="cep" onblur="pesquisacep(this.value);">
                            <div class="invalid-feedback">
                                Preencha este campo
                            </div>

                        </div>

                        <div class="campos-input">

                            <labe for="cidade">Cidade<span style="color: rgb(145, 145, 145)">*</span></labe>
                            <input type="text" name="cidade" id="cidade" disabled>
                            <div></div>

                        </div>


                        <div class="campos-input">

                            <labe for="uf">UF<span style="color: rgb(145, 145, 145)">*</span></labe>
                            <input type="text" name="uf" id="uf" disabled>
                            <div></div>

                        </div>

                        <div class="campos-input">

                            <labe for="logradouro">Logradouro<span style="color: rgb(145, 145, 145)">*</span></labe>
                            <input type="text" name="logradouro" id="logradouro" disabled>
                            <div></div>

                        </div>

                        <div class="campos-input" id="numero_form_div">

                            <labe for="numero">Número<span style="color: rgb(145, 145, 145)">*</span></labe>
                            <input type="text" name="numero" id="numero">
                            <div class="invalid-feedback">
                                Preencha este campo
                            </div>
                        </div>

                        <div class="campos-input">

                            <labe for="complemento">Complemento</labe>
                            <input type="text" name="complemento" id="complemento">
                            <div></div>
                        </div>
                    </div>




                </div>




            </div>


            <!-- segunda parte do formulário -->
            <div class="tab">

                <div class="container-2">

                    <div class="formulario-2">

                        <div class="titulo-2">
                            <p>Interesse</p>
                        </div>

                        <div class="campos-input-pequeno">

                            <labe for="area_profissao">Área</labe>

                            <select name="area_profissao" id="area_profissao" onchange="listarProfissoes()">
                                <option value="">Selecione</option>
                                    <?php 
                                        $listaArea = Cargo::listaArea();
                                        while($row = $listaArea->fetch(PDO::FETCH_BOTH)) {
                                            ?>
                                            <option value="
                                                <?php 
                                                    echo $row['n_id'];
                                                ?>
                                            ">
                                                <?php 
                                                    echo $row['c_nome'];
                                                ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                            </select>

                            <div></div>
                        </div>

                        <div class="campos-input-pequeno">

                            <labe for="profissao">Profissão<span style="color: rgb(145, 145, 145)">*</span></labe>

                            <select name="profissao" id="profissao">
                                <option value="">Selecione</option>
                                <?php 
                                    $listaArea = Cargo::listaProfissoes();
                                    while($row = $listaArea->fetch(PDO::FETCH_BOTH)) {
                                        ?>
                                        <option value="
                                            <?php 
                                                echo $row['n_id']; 
                                            ?>
                                        "
                                        area="
                                            <?php 
                                                echo $row['n_id_area'];                                  
                                            ?>
                                        " style="display:none;"
                                        >
                                            <?php 
                                                echo $row['c_nome'];
                                            ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                            </select>
                            <div></div>

                        </div>

                        <div class="campos-input-pequeno">

                            <labe for="nivel_experiencia">Nível de experiência<span style="color: rgb(145, 145, 145)">*</span></labe>

                            <select name="nivel_experiencia" id="nivel_experiencia">
                                <option value=6>6 meses</option>
                                <option value=9>9 meses</option>
                                <option value=12>1 ano</option>
                                <option value=24>2 ano</option>
                                <option value=36>2 ano</option>
                                <option value=48>3 ano</option>
                                <option value=60>4 ano</option>
                                <option value=61>Mais</option>


                            </select>
                            <div></div>
                        </div>


                        <div class="container-btn-form2">
                            <img name="btncargo-add" id="btncargoadd" class="btn-addcargo" src="../medias/img/btn-add.png" alt="adicionar"  onclick="addCargo();">

                        </div>

                    </div>

                    <div class="formulario-2">

                        <div class="titulo-2">
                            <p>Cargos cadastrados</p>
                        </div>
                        <input type="hidden" name="cargos" id="lista-cargos">
                        <ul class="cargo-list" id="cargo_ul">

                        </ul>





                    </div>




                </div>

            </div>




            <!-- terceira parte do formulário -->
            <div class="tab">

                <div class="container-3">

                    <div class="formulario-3">

                        <div class="titulo-3">
                            <p>Formação acadêmica</p>
                        </div>

                        <div class="campos-input-pequeno"  id="ensino_form_div">

                            <labe for="ensino">Ensino<span style="color: rgb(145, 145, 145)">*</span></labe>

                            <select id="ensino" name="ensino">
                                <option>Fundamental</option>
                                <option>Médio</option>
                                <option>Superior</option>

                            </select>
                           <div></div>
                        </div>


                    </div>

                    <div class="formulario-3">

                        <div class="titulo-3">
                            <p>Graduação</p>
                        </div>

                        <div class="campos-input-pequeno" id="graducao_form_div">

                            <labe for="instituicao">Instituição<span style="color: rgb(145, 145, 145)">*</span></labe>

                            <input name="instituicao" id="instituicao" list="dtlist-instituicao">
                            <div class="invalid-feedback">
                                Preencha este campo
                            </div>
                            <datalist id="dtlist-instituicao">
                                <option value="USP">
                                <option value="UNIP">
                                <option value="UNINOVE">
                                <option value="FMU">
                                <option value="Safari">
                            </datalist>
                            
                        </div>


                        <div class="campos-input-pequeno">

                            <labe for="curso_graducao">Curso<span style="color: rgb(145, 145, 145)">*</span></labe>

                            <input name="curso_graducao" id="curso_graducao" list="dtlist-curso_graducao">
                            <div class="invalid-feedback">
                                Preencha este campo
                            </div>
                            <datalist id="dtlist-curso_graducao">
                                <option value="Exemplo">
                                <option value="Exemplo2">
                                <option value="Exemplo3">
                                <option value="Exemplo4">


                            </datalist>
                        </div>


                    </div>

                    <div class="formulario-3">

                        <div class="titulo-3">
                            <p>Cursos</p>
                        </div>

                        <div class="campos-input-pequeno">

                            <labe for="nivel_curso">Nível<span style="color: rgb(145, 145, 145)">*</span></labe>

                            <select name="nivel_curso" id="nivel_curso">
                                <option>Tecnólogo</option>
                                <option>Técnico</option>

                            </select>
                            <div></div>
                        </div>

                        <div class="campos-input-pequeno">

                            <labe for="curso">Curso<span style="color: rgb(145, 145, 145)">*</span></labe>

                            <select name="curso" id="curso">
                                <option>Eletricista</option>
                                <option>Desenvolvedor</option>
                                <option>Mecânico Automotivo</option>
                                <option>Pedreiro</option>
                                <option>Manicure</option>

                            </select>
                            <div></div>
                        </div>

                        <div class="campos-input-pequeno">

                            <labe for="cargahoraria_curso">Carga horária<span style="color: rgb(145, 145, 145)">*</span>
                            </labe>

                            <select name="cargahoraria_curso" id="cargahoraria_curso">
                                <option value=40>40 horas</option>
                                <option value=80>80 horas</option>
                                <option value=120>120 horas</option>
                                <option value=200>200 horas</option>
                                <option value=260>260 horas</option>
                                <option value=360>360 horas</option>
                                <option value=400>400 horas</option>
                                <option value=401>Mais</option>

                            </select>
                            <div></div>
                        </div>


                        <div class="container-btn-form2">
                            <img class="btncurso-add btn-click" src="../medias/img/btn-add.png" alt="adicionar" onclick="addCurso()">

                        </div>

                    </div>

                    <div class="formulario-3">

                        <div class="titulo-3">
                            <p>Cursos cadastrados</p>
                        </div>
                        <input type="hidden" name="cursos" id="lista-cursos">
                        <ul class="curso-list" id="curso_ul">
                            
                        </ul>
                    </div>



                </div>

            </div>





            <!-- quarta parte do foormário -->
            <div class="tab">
                <div class="container-4">
                    <h1>Adicione fotos ou vídeos para que as pessoas possam ver sua experiência e nível do seu serviço
                    </h1>

                    <div class="container-zona-arquivo">

                        <div class="arquivos-list">

                        </div>

                        <div class="selecionar-arquivo">
                            <img name="btnarquivo-add btn-click" id="btnmedia-add" src="../medias/img/btn-add2.png" alt="Carregar Arquivos">
                            <p>Carregue seus arquivos.</p>
                            <p>pressionando o botão ou.</p>
                            <p>solte-os aqui.</p>
                        </div>

                    </div>
                </div>
                </p>
            </div>









            <!-- botões -->
            <div class="container-btns">

                <button class="botao-cancelar" type="button" id="prevBtn" onclick="nextPrev(-1)">Voltar</button>
                <button class="botao-avancar" type="button" id="nextBtn" onclick="nextPrev(1)">Avançar</button>

            </div>



        </form>


    </section>
    <script src="../scripts/script-cadpro.js"></script>
    <script src="../scripts/scripts.js"></script>
</body>

</html>