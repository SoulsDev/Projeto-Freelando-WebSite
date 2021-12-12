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


$('#formMsm').submit(function (e) {
    e.preventDefault();

    var mensagem = $('#inputMsm').val();

    //console.log(mensagem);

    $.ajax({

        url: 'http://localhost/Projeto-Freelando-WebSite/pages/inserir.php',
        method: 'POST',
        data: { mensagem: mensagem },
        dataType: 'json'

    }).done(function (result) {
        $('#inputMsm').val('');
        $("#msm").ready(function(){
            $("#msm").animate({ scrollTop: 10000000 }, 3000);
            });
        console.log(result);
    });

});

$("#msm").ready(function(){
    $("#msm").animate({ scrollTop: 10000000 }, 3000);
    });


// function getMensagem() {
//     $.ajax({
//         url: 'http://localhost/Projeto-Freelando-WebSite/pages/atualizaExibicaoChat.php',
//         method: 'GET',
//         dataType: 'json'
//     }).done(function (result) {
//         console.log(result);
//         $('.outgoing_msg').prepend();
//     });
// }

// getMensagem();





/*
               <div class="borda">
                      <p><strong>Você</strong></p>
                      <p class="texto" style="color: #000;">Peça um orçamento ou faça perguntas sobre este profissional.</p>
                      <p class="hora d-flex justify-content-end">00:00</p>
                    </div>
                </div>
*/

// var btn = document.getElementById('enviarMsm');

// btn.onclick = function(){


//     document.getElementById("falso").setAttribute("value","verdadeiro");

//     document.getElementById("formMsm").submit();

// }

// window.onload(function(){

//     document.getElementById("falso").setAttribute("value","falso");


// });

// const recebeMsm = () => {
//     const item = document.createElement('div');
//     item.classList.add('received_withd_msg');
//     item.innerHTML = `
//     <div class="borda" style="margin-bottom: 20px;">
//         <p><strong>Você</strong></p>
//         <p class="texto" style="color: #000;">${text}</p>
//         <p class="hora d-flex justify-content-end">00:00</p>
//     </div>
//     `;
//     document.getElementById('msm').appendChild(item);
// }


// var input = document.getElementById("inputMsm");
// input.addEventListener("keyup", function(event) {
//   if (event.keyCode === 13) {
//    event.preventDefault();
//    btn.click();
//   }
// });




