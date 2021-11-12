var currentTab = 0; // A guia atual é definida para ser a primeira guia (0)
showTab(currentTab); // Exibe a guia atual



function showTab(n) {
    // Esta função irá exibir a guia especificada do formulário ...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    // ... e corrija os botões Anterior / Próximo:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Confirmar";
    } else {
        document.getElementById("nextBtn").innerHTML = "Avançar";
    }
    // ... e execute uma função que exibirá o indicador de etapa correto:
    fixStepIndicator(n)
}

function nextPrev(n) {

    // Esta função descobrirá qual guia exibir
    var x = document.getElementsByClassName("tab");
    // Saia da função se algum campo da guia atual for inválido:
    if (n == 1 && !validateForm()) return false;
    // Ocultar a guia atual:
    x[currentTab].style.display = "none";
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
    y = x[currentTab].getElementsByTagName("input");
    // Um loop que verifica cada campo de entrada na guia atual:
    for (i = 0; i < y.length; i++) {
        // Se um campo estiver vazio ...
        if (y[i].value == "dshf") {
            // adiciona uma classe "inválida" ao campo:
            y[i].className += " invalid";
            // e definir o status válido atual para falso
            valid = false;
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