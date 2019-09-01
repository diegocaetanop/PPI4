
<?php
include './PhpOO/conexao.php';

include'repositorios/validaLoginGerenciamento.php';
    // Determinar localidade BR
    setlocale(LC_ALL, 'pt_BR');

    
?>

<!doctype html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/clientes.css">
    <link rel="stylesheet" href="css/gerenciamento.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <title>Carrossel</title>
</head>

<body>
    <?php include './repositorios/menuGerenciamento.php';    menuGerenciamento();//menu gerenciamento?>
    
    
    <section class="container-fluid">
        <h3>Insira as fotos do banner na sessão Books do site:</h3>
        <?php
            if(isset($_POST['enviar'])){
                          
                $diretorio="img/Books/banner";
               
                if(!is_dir($diretorio)){ 
                    echo "Pasta $diretorio nao existe";
                }else{
                    $arquivo = isset($_FILES['foto']) ? $_FILES['foto'] : FALSE;
                    // arquivo recebe as fotos pelo FILES
                    $arquivo = isset($_FILES['foto']) ? $_FILES['foto'] : FALSE;
                    include './repositorios/uploadFotos.php';// inclui a função encarregada pelo upload
                    uploadFotos($arquivo,$diretorio);// usa a função passando os arquivos e o destino como paramentro
                }
            }    
    
        ?>
            <div class="row justify-content-sm-center">
              <?php
		
                        echo "<div class='col-sm-6 col-md-4'>

                                  <div class='card' style='color:#000'>
                                        
                                        
                                            <form action='' method='post' enctype='multipart/form-data'>
                                                
                                               <input type='file' name='foto[]' multiple='multiple'>
                                               
                                               <input type='submit' value='Enviar' id='enviar' name='enviar' class='btn-success'>
                                            </form>
                                       
                                  </div>

                            </div>"
                        ;
                 
             ?>
            </div>
    </section>
       
    
<?php include './repositorios/rodape.php';rodape();?>
    
     
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>
</html>
