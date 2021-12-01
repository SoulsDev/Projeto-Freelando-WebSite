<?php 
    //include_once('../src/classes/contratante/validaContratante.php');
    session_start();    
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
                        <form method="POST" action="../../src/classes/postagem/InsPostagem.php" enctype="multipart/form-data">
                            
                                <textarea name="postagem_corpo" class="form-control" id="postagem_corpo" cols="30" rows="10"></textarea>
                                <input type="file" id="file" name="file">
                            <img src="" alt="" id="imagem">
                            <input type="hidden" name="autonomo_id" value= <?php echo $_SESSION['id_usuario'] ?>>
                            
                                <input type="submit" value="enviar">
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


</body>
<script>
    input_file = document.getElementById("file");
    button = document.getElementById("a");
    
    button.addEventListener('click', () => {
        input_file.click();
    })
    

    input_file.addEventListener('change', ()=> {

        if(input_file.files <= 0){
            return;
        }
        
        var reader = new FileReader();

        reader.onload = () => {
            document.getElementById('imagem').src = reader.result;
        }

        reader.readAsDataURL(input_file.files[0]);
    })

</script>
</html>