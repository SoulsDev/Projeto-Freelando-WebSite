function enviar(){
    var contrato = document.getElementById("contrato");

    contrato.style.display="flex";

}

function fechar(){
    var contrato = document.getElementById("contrato");

    contrato.style.display="none";

    document.getElementById('modal-texto').value='';
    document.getElementById('input-preco').value='';
}