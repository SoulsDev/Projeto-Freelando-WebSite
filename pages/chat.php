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

  <!-- Bootstrap -->
  <link rel="stylesheet" href="../bootstrap-5.1.3/dist/css/bootstrap.css">

  <!-- style css -->
  <link rel="stylesheet" href="../css/chat.css">

  <script src="../scripts/jquery.js"></script>

  <!-- Script -->
  <script type="text/javascript">
		function ajax(){
			var req = new XMLHttpRequest();
			req.onreadystatechange = function(){
				if (req.readyState == 4 && req.status == 200) {
						document.getElementById('outgoing_msg').innerHTML = req.responseText;
				}
			}
			req.open('GET', 'atualizaChat.php', true);
			req.send();
		}
	
		setInterval(function(){ajax();}, 1000);
	</script>

  <script>
      $('#msm').ready(function() {

        $('#msm').scrollTop($('#msm').height());

      });
  </script>

</head>

<body>

    <?php
    include"navbar.php";
    include('C:/xampp/htdocs/Projeto-Freelando-WebSite/src/classes/conexao.php');
    $consulta = $con->query('select c_nome, c_imagem_perfil, n_id from autonomos');
    ?>


  <div class="container">


    <div class="card-body d-flex justify-content-center p-0">
      <div class="messaging">
        <div class="inbox_msg">


          <div class="inbox_people">
            <div class="inbox_chat">
              <div class="chat_list active_chat">
              <?php while($exibe = $consulta->fetch(PDO::FETCH_ASSOC)){?>
                <a href="chat.php?id=<?php echo $exibe['n_id'];?>">
                <div class="chat_people mb-2" style="cursor: pointer;">
                  <div class="chat_img" id="contato">
                    <img src="<?php echo $exibe['c_imagem_perfil'];?>" alt="sunil" class="img">
                    <span id="nomeContato" class="h1"><?php echo $exibe['c_nome'];?></span>
                    <input value="<?php $exibe['n_id']; ?>" type="hidden" name="idContato">
                  </div>
                </div>
                </a>
              <?php }?>
              </div>
            </div>
          </div>



          <div class="imagem-chat row">
            
            <?php 

            $id = $_GET['id'];

            if(!isset($id)){
              header("Location:chat.php");
            }else{
              $consulta = $con->query("select * from autonomos where n_id = '$id'");
              $autonomo = $consulta->fetch(PDO::FETCH_ASSOC);
            }
            ?>

            <div class="foto-perfil d-flex align-items-center">
              <img src="<?php echo $autonomo['c_imagem_perfil']; ?>" alt="sunil" width="100px" height="100px" class="imagem-perfil">
              <div class="conteudo">
                <span class="h1 h1-1"><?php echo $autonomo['c_nome']; ?></span>
                <span class="span"><?php echo 'SIM';?></span>
              </div>
            </div>



          </div>


          <div class="mesgs" >
            <div class="msg_history" >
              <div class="incoming_msg">

              </div>
              <div class="incoming_msg">


                <div id="msm" style="overflow: scroll; height: 290px;">

                  <!--  mensagem da pessoa -->
                  <div class="received_withd_msg" style="margin-bottom: 10px;">
                      <div class="borda" id="carregaMsm">

                      </div>
                  </div>


                    <!-- Sua mensagem -->
                  <div class="outgoing_msg d-flex flex-column align-items-end" style="padding-right: 20px;" id="outgoing_msg">



                  </div>

                </div>
                <!-- Input da mensagem -->
                <div class="type_msg">
                  <div class="input_msg_write form-group has-search">


                    <button class="enviar-botao" type="button">
                      <img class="fa fa-search form-control-feedback img" src="../medias/img/aperto-de-mao 1.svg" alt="mão" id="enviar" onclick="enviar()">
                    </button>

                    <form id="formMsm">

                      <input type="text" class="write_msg" id="inputMsm" name="mensagem">

                      <button class="msg_send_btn"  type="submit" id="enviarMsm">
                        <img src="../medias/img/enviar.svg" alt="icone">
                      </button>

                    </form>
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




          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
          </script>

          <script src="../bootstrap-5.1.3/dist/js/bootstrap.min.js"></script>


          <script src="../scripts/chat.js" defer></script>
</body>

</html>