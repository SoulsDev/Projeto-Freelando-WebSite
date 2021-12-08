<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../medias/img/logo-tocha.svg" type="image/x-icon">
  <title>FreeLando | Tela chat</title>

  <!-- bootstrap -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../bootstrap-5.1.3/dist/css/bootstrap.css">


  <!-- style css -->
  <link rel="stylesheet" href="../css/chat.css">
</head>

<body>

    <?php
    include"navbar.php";
    ?>


  <div class="container">


    <div class="card-body d-flex justify-content-center p-0">
      <div class="messaging">
        <div class="inbox_msg">
          <div class="inbox_people">
            <div class="inbox_chat">
              <div class="chat_list active_chat">
                <div class="chat_people">
                  <div class="chat_img">
                    <img src="../medias/img/semfoto.png" alt="sunil" class="img">
                    <span class="h1">Geraldão derivia</span>
                  </div>
                </div>
              </div>
            </div>
          </div>



          <div class="imagem-chat row">
            <div class="foto-perfil d-flex align-items-center">
              <img src="../medias/img/semfoto.png" alt="sunil" width="100px" height="100px" class="imagem-perfil">
              <div class="conteudo">
                <span class="h1 h1-1">Geraldão derivia</span>
                <span class="span">Dj</span>
              </div>




            </div>



          </div>


          <div class="mesgs">
            <div class="msg_history">
              <div class="incoming_msg">

              </div>
              <div class="incoming_msg">


                <div id="msm">

                  <!-- Sua mensagem -->
                  <div class="received_withd_msg">
                    <div class="borda">
                      <p><strong>Você</strong></p>
                      <p class="texto" style="color: #000;">Peça um orçamento ou faça perguntas sobre este profissional.</p>
                      <p class="hora d-flex justify-content-end">00:00</p>
                    </div>
                  </div>


                  <!-- Mensagem da pessoa -->
                  <div class="outgoing_msg">
                    <div class="sent_msg">
                      <p><strong>Jubileu</strong></p>
                      <p style="color: #000;">Hello World</p>
                      <p class="hora d-flex justify-content-end">00:00</p>
                    </div>
                  </div>

                </div>


                <!-- Input da mensagem -->
                <div class="type_msg">
                  <div class="input_msg_write form-group has-search">


                    <button class="enviar-botao" type="button">
                      <img class="fa fa-search form-control-feedback img" src="../medias/img/aperto-de-mao 1.svg" alt="mão" id="enviar" onclick="enviar()">
                    </button>

                    <input type="text" class="write_msg" id="inputMsm">

                    <button class="msg_send_btn" type="button" id="enviarMsm">
                      <img src="../medias/img/enviar.svg" alt="icone">
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- modal -->
          <div class="modal-contrato" id="contrato">
            <div class="modal">
              <div class="conteudo-modal">



                <div class="fechar-modal">
                  <img src="../medias/img/marca-x (1).png" alt="x" width="30px" height="30px" class="fechar" onclick="fechar()" id="fechar">
                </div>


                <span>
                  <strong>
                    Descrição
                  </strong>
                </span>

                <div class="caixa">
                  <textarea row="8" id="modal-texto" class="modal-texto" placeholder=""></textarea>
                </div>

                <span class="preco">
                  <strong>
                    Sugestão de preço:
                  </strong>
                </span>

                <input type="number" class="input-preco" id="input-preco" name="input-preco" placeholder=" R$ 250,00">

                <div class="buttn">
                  <button class="botao">Propor contrato</button>
                </div>
              </div>
            </div>
          </div>

          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
          </script>

          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
          </script>

          <script src="../bootstrap-5.1.3/dist/js/bootstrap.min.js"></script>



          <script src="../scripts/chat.js" defer></script>
</body>

</html>