<?php 
    include_once('../../src/classes/postagem/Postagem.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prototipo tela de postagem</title>



</head>
<body class="my-login-page">
    <section class="h-100 ">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="card fat">
                        <?php
                            foreach(Postagem::listarPostagens() as $postagem){
                                $convertido_para_array = iterator_to_array($postagem);
                                echo "autonomo_id:". $convertido_para_array['autonomo']. "<br>";
                                echo "data de publicação:". $convertido_para_array['dt_registro']."<br>";
                                echo "Conteudo:". $convertido_para_array['conteudo']."<br>";
                                
                                if(isset($convertido_para_array['arquivo_path'])){
                                    $ext = explode('.', $convertido_para_array['arquivo_path']);

                                    if ($ext[5] == "mp4"){
                                        ?>
                                        <video width="320" height="240" controls>
                                            <source src="<?php echo $convertido_para_array['arquivo_path'];?>" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video> <br><br>
                                        <?php
                                    }else{
                                        ?>
                                        <img 
                                            src="<?php echo $convertido_para_array['arquivo_path'];?>" 
                                            alt=""> <br><br>
                                    <?php
                                    }
                                    
                                }
                            }
                       ?> 
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




</body>

</html>
</html>