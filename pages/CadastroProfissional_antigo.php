<?php 
    include ('../src/classes/cargo/Cargo.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <meta charset="utf-8">
    
    <title>FreeLando | Cadastro do profissional</title>
    <link rel="shortcut icon" href="../medias/img/Group.svg" type="image/x-icon">

    <link href="../css/style_cadpro.css" rel="stylesheet" type="text/css">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="../scripts/jquery.mask.js"></script>

    <script>
        $(document).ready(function(){
        $("#cpf").mask("999.999.999-99", {placeholder: "___.___.___-__"});
        $('#celular').mask('(00)00000-0000');
        $('#cep').mask('00000-000');
    })
    </script>
    

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

                            <select name="area_profissao" id="area_profissao" onchange="listarProfissoes(this.value)">
                                <option value="">Selecione</option>
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

                        <div class="campos-input-pequeno">

                            <labe for="profissao">Profissão<span style="color: rgb(145, 145, 145)">*</span></labe>

                            <select name="profissao" id="profissao">
                                <option value="">Selecione</option>
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






                    <div class="container-termos-uso">
                        <input type="checkbox" id="termos" name="termos" checked>
                        <label>Li estou de acordo com o

                            <a id="labeltermos" style="color: #ff6d3c; cursor: pointer;">
                                Termo de Uso e Políticade Privacidade
                            </a>

                        </label>
                    </div>



            <!-- botões -->
            <div class="container-btns">

                <button class="botao-cancelar" type="button" id="prevBtn" onclick="nextPrev(-1)">Voltar</button>
                <button class="botao-avancar" type="button" id="nextBtn" onclick="nextPrev(1)">Avançar</button>

            </div>

            <!-- Modal Termos de Uso -->

            <div id="termosUso" class="modal-container">
                <div class="modal">
                    <h1>Termos de uso</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae tempus enim, ut elementum justo. Morbi congue pretium libero eget dapibus. Quisque non dapibus augue, nec accumsan enim. Nulla et risus non libero maximus venenatis.
                        Sed aliquet ligula ut porta vehicula. Pellentesque eros ex, congue vel arcu nec, hendrerit cursus augue. In hac habitasse platea dictumst. Donec iaculis mauris risus, in pellentesque neque accumsan condimentum. Aenean ut ante a
                        erat dapibus tristique eget id metus. Ut sit amet aliquet velit. Proin id luctus purus. Proin at rhoncus risus. Vestibulum pretium vel tortor faucibus pretium. Nunc elementum, ligula a varius dictum, ligula eros pharetra ligula,
                        eu placerat mi lectus at nunc. Proin semper pulvinar nisl, et condimentum nisi maximus vel. Pellentesque consequat tellus in dictum mattis. Duis elementum dignissim tempus. Nulla imperdiet vitae massa vel fermentum. Aenean convallis
                        tellus in tellus vestibulum, et mattis nibh porta. Morbi tincidunt ante sed diam ultricies, sed posuere ante maximus. Curabitur tempus imperdiet purus, et venenatis magna aliquet sit amet. Aliquam ut ex convallis, consequat quam
                        vitae, facilisis orci. Mauris quis hendrerit lacus. Sed viverra tincidunt mauris et rhoncus. Sed sed massa a odio suscipit suscipit nec sit amet tellus. Etiam eu semper elit, consectetur pretium turpis. Etiam nulla neque, bibendum
                        a tincidunt quis, pulvinar eget eros. Mauris imperdiet diam at iaculis tincidunt. Vestibulum malesuada ex ut iaculis euismod. Phasellus laoreet augue ac est imperdiet sollicitudin. Fusce maximus dui vitae nibh bibendum semper.
                        Praesent eget magna augue. Aliquam pharetra risus quis dolor facilisis condimentum. Maecenas vel tincidunt tellus, sit amet sagittis purus. Ut diam neque, pharetra in nisl a, hendrerit tempor purus. Phasellus purus turpis, finibus
                        in maximus ac, vehicula et magna. Mauris id sagittis magna. Curabitur pellentesque quam metus, quis finibus lectus mollis vel. Proin feugiat magna mi, id sodales libero auctor sit amet. Aliquam blandit magna felis, in tincidunt
                        sem iaculis in. Proin ullamcorper cursus dui ut imperdiet. Etiam nec nibh in ante mollis dapibus eu quis metus. Ut posuere, tellus sit amet lacinia vehicula, ligula orci rutrum tortor, non tristique tellus enim ac eros. Aliquam
                        iaculis eros orci, eget egestas ante euismod at. Donec sit amet viverra est, condimentum pharetra mauris. Vivamus elit ipsum, imperdiet at laoreet ut, aliquet quis tortor. Fusce tincidunt nisl convallis enim finibus rhoncus. Vestibulum
                        nec ligula hendrerit, volutpat turpis eu, tempus lectus. Cras suscipit nisi eget tellus maximus rhoncus. Duis sed euismod magna. Cras nec interdum mauris, vel vulputate ligula. Aliquam imperdiet justo non orci vulputate, vitae
                        volutpat nisl congue. Duis a sem ut diam tincidunt pharetra. Duis rhoncus magna id dui pulvinar porttitor. In aliquam nunc sit amet mollis cursus. Ut euismod magna in eros condimentum suscipit. Class aptent taciti sociosqu ad litora
                        torquent per conubia nostra, per inceptos himenaeos. Sed non elit non velit auctor vestibulum quis vel nisi. Mauris aliquet sit amet nibh et faucibus. Curabitur sed libero eget mi rhoncus commodo a a urna. In hac habitasse platea
                        dictumst. Phasellus sagittis, lectus vitae fringilla porta, nunc ex convallis est, sit amet interdum nunc odio quis augue. Suspendisse id erat magna. Aenean tempor enim in tortor viverra, et faucibus enim rhoncus. Integer sed velit
                        in nulla malesuada pretium. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras pharetra libero non congue blandit. Etiam molestie ac sem ac mattis. Proin a bibendum mauris. Proin a posuere
                        ipsum. Maecenas fermentum ante nec urna aliquam, in finibus urna malesuada. Donec varius mi ac efficitur dictum. Maecenas et metus in lorem hendrerit tempus. Nunc commodo mauris vitae porta bibendum. Sed rhoncus, neque id mollis
                        aliquet, leo mauris mollis purus, in mollis nisl elit at purus. Vivamus lobortis leo a egestas consectetur. Quisque laoreet ornare arcu. Nam molestie, eros in interdum accumsan, quam mauris gravida massa, eu sollicitudin est ante
                        in metus. Suspendisse potenti. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nam lobortis diam magna, vel interdum mi congue eget. Nunc facilisis velit ac viverra sagittis. Nullam lectus
                        mauris, interdum quis semper in, volutpat ultrices mi. Maecenas iaculis et orci at eleifend. Ut consectetur ipsum ut magna molestie, vitae vestibulum dolor tempor.</p>

                    <button class="botao-avancar" type="button" id="okTermos" onclick="">OK</button>

                </div>

            </div>


            <!-- Modal perguntas -->

            <div id="questoes" class="modal-container2">

                <div class="modal2">

                    <div class="titulo">
                        <h2>Prove que sabe dessa área respondendo a pergunta: </h2>
                        <p name="tentativa" id="tentativa">Tentativa : 0</p>

                    </div>

                    <p>Pergunta:</p>
                    <input type="text">
                    <button>Confirmar</button>

                </div>

            </div>

        </form>


    </section>
    <script src="../scripts/script-cadpro.js"></script>
    <script src="../scripts/scripts.js"></script>
</body>

</html>