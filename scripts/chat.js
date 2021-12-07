function enviar() {
    var contrato = document.getElementById("contrato");

    contrato.style.display = "flex";

}

function fechar() {
    var contrato = document.getElementById("contrato");

    contrato.style.display = "none";

    document.getElementById('modal-texto').value = '';
    document.getElementById('input-preco').value = '';
}

/*     
               <div class="borda">
                      <p><strong>Você</strong></p>
                      <p class="texto" style="color: #000;">Peça um orçamento ou faça perguntas sobre este profissional.</p>
                      <p class="hora d-flex justify-content-end">00:00</p>
                    </div>
                </div>
*/

var btn = document.getElementById('enviarMsm');

btn.onclick = function(){


var yourMsm = document.getElementById("inputMsm").value;



const addMsm = (text) => {
    const item = document.createElement('div');
    item.classList.add('received_withd_msg');
    item.innerHTML = `
    <div class="borda" style="margin-bottom: 20px;">
        <p><strong>Você</strong></p>
        <p class="texto" style="color: #000;">${text}</p>
        <p class="hora d-flex justify-content-end">00:00</p>
    </div>
    `;
    document.getElementById('msm').appendChild(item);
}

addMsm(yourMsm);

}

const recebeMsm = () => {
    const item = document.createElement('div');
    item.classList.add('outgoing_msg');
    item.innerHTML = `
    <div class="sent_msg" style="margin-bottom: 20px;">
        <p><strong>Jubileu</strong></p>
        <p style="color: #000;">Hello World</p>
        <p class="hora d-flex justify-content-end">00:00</p>
    </div>
    `;
    document.getElementById('msm').appendChild(item);
}


function mudarTela(){
    var chat = document.getElementById("chat");
}