var currentTab = 0; // A guia atual é definida para ser a primeira guia (0)
showTab(currentTab); // Exibe a guia atual

const email_regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

var cpf_input = document.getElementById('cpf');

var birth_input = document.getElementById('data_nascimento');

var today = new Date();

birth_input.setAttribute('max', (today.getFullYear() - 18) + '-' + (today.getMonth() + 1) + '-' + today.getDate());

// Validação e mascara para input CPF
cpf_input.addEventListener('keydown', function(event) {
    // Verifica se o que foi digitado não é um numero ou não é digito delete ou backspace
    if (isNaN(event.key) && (event.keyCode !== 8 && event.keyCode !== 46)) {
        // O caractere digitado não é adicionado ao input
        event.preventDefault()
    }
    // A mascara só deve ser usada quando a tecla não for a tecla delete ou backspace
    // Caso contrario fica num loop eterno
    if (event.keyCode !== 8 && event.keyCode !== 46) {
        if (cpf_input.value.length === 3 || cpf_input.value.length === 7) {
            cpf_input.value = cpf_input.value + '.'
        }
        if (cpf_input.value.length === 11) cpf_input.value = cpf_input.value + '-'
    }
})


function showTab(n) {
    // Esta função irá exibir a guia especificada do formulário ...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    // ... e corrija os botões Anterior / Próximo:

    // if (n != 0) {
    //     document.getElementById("prevRegistrar").style.display = "none";
    // } else {
    //     document.getElementById("prevRegistrar").style.display = "inline";
    // }

    // console.log("" + n);

    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById('cidade').disabled = false;
        document.getElementById('uf').disabled = false;
        document.getElementById('logradouro').disabled = false;
        document.getElementById("nextBtn").innerHTML = "Confirmar";
    } else {
        document.getElementById('cidade').disabled = true;
        document.getElementById('uf').disabled = true;
        document.getElementById('logradouro').disabled = true;
        document.getElementById("nextBtn").innerHTML = "Avançar";
    }
    // ... e execute uma função que exibirá o indicador de etapa correto:
    fixStepIndicator(n)
}

function nextPrev(n) {

    // Esta função descobrirá qual guia exibir
    var x = document.getElementsByClassName("tab");
    // Saia da função se algum campo da guia atual for inválido:
    if (n == 1 && !validateForm()) {
        return false;
    }
    // Ocultar a guia atual:
    x[currentTab].style.display = "none";
    x[currentTab].classList.remove("block");
    // Aumentar ou diminuir a guia atual em 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
        // se você chegou ao final do formulário ...
        document.getElementById("regForm").submit();
        return false;
    }
    // Caso contrário, exiba a guia correta:
    showTab(currentTab);
}

function validateForm() {
    // Esta função trata da validação dos campos do formulário
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByClassName("campos-input");
    // Um loop que verifica cada campo de entrada na guia atual:
    for (i = 0; i < y.length; i++) {
        y[i].children[1].style.border = "1px solid #000";
        y[i].children[2].style.display = "none";
    }

    for (i = 0; i < y.length; i++) {

        // Se um campo estiver vazio ...
        if (y[i].children[1].value == "") {
            // complemento é um campo opcional
            if (y[i].children[1].id !== 'complemento' && y[i].children[1].id !== 'cidade' && y[i].children[1].id !== 'uf' && y[i].children[1].id !== 'logradouro') {
                // adiciona uma classe "inválida" ao campo:
                y[i].children[1].style.border = "1px solid #dc3545";
                y[i].children[2].style.display = "block";
                // e definir o status válido atual para falso
                valid = false;
            }
        }
        if (y[i].children[1].id === 'email') {
            // Caso o email informado não tenha ao menos um '@', '.', dois digitos apos o ponto, e ao menos um char antes do @ ele não 
            // é um email válido 
            if (!(email_regex.test(y[i].children[1].value.toLowerCase()))) {
                y[i].children[1].style.border = "1px solid #dc3545";
                y[i].children[2].style.display = "block";
                y[i].children[2].innerHTML = 'O e-mail deve conter ao menos um "@" e um ".".';
                valid = false;
            }
        }
        // validação de cpf deve pedir para ser do tamanho máximo do campo
        if (y[i].children[0].id === 'cpf') {
            if (y[i].children[1].value.length === 14) {
                valid = true;
            } else {
                y[i].children[1].style.border = "1px solid #dc3545";
                y[i].children[2].style.display = "block";
                y[i].children[2].innerHTML = 'O CPF deve ter 11 dígitos';
                valid = false;
            }
        }
    }
    // Se o status válido for verdadeiro, marque a etapa como concluída e válida:
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // retorna o status válido
}


function fixStepIndicator(n) {
    // Esta função remove a classe "ativa" de todas as etapas ...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    // ... e adiciona a classe "ativa" na etapa atual:

    if (n < 3) {
        x[n + 1].className = x[n + 1].className.replace(" finish", "");
    }

    x[n].className += " active";
}

function addCargo(){
    b = document.getElementById('profissao');
    c = document.getElementById('nivel_experiencia');

    lista = document.getElementById('cargo_ul');

    indice = lista.children.length + 1;

    link = document.createElement('a');
    link.setAttribute('name', 'cargo');
    link.innerHTML = b.options[b.selectedIndex].text;

    item = document.createElement('li');
    item.setAttribute('id', 'item_'+indice);
    item.appendChild(link);

    
    lista.appendChild(item);

    document.getElementById("lista-cargos").value= document.getElementById("lista-cargos").value + b.value + "," + c.value +";";
}



function addCurso(){
    a = document.getElementById('nivel_curso');
    b = document.getElementById('curso');
    c = document.getElementById('cargahoraria_curso');

    lista = document.getElementById('curso_ul');

    indice = lista.children.length + 1;

    link = document.createElement('a');
    link.setAttribute('name', 'curso_'+indice);
    link.innerHTML = b.value;

    item = document.createElement('li');
    item.setAttribute('id', 'curso_'+indice);
    item.appendChild(link);

    
    lista.appendChild(item);
    document.getElementById("lista-cursos").value= document.getElementById("lista-cursos").value + a.value + ","+ b.value + "," + c.value +";";
}

function listarProfissoes(area_id){
    profissoes = document.getElementsByClassName("profissoes_dinamico");
    for (let item of profissoes) {
        item.style.display="none";
        atributo = item.getAttribute('area');
        if(atributo == area_id){
            item.style.display="block";
        }
    }
}


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
