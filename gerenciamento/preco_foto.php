<?php

include '../PhpOO/conexao.php';

include'../repositorios/validaLoginGerenciamento.php';
include '../config.php';
        

?>
<!doctype html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/cadastro_cliente.css">
    <link rel="stylesheet" href="../css/gerenciamento.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <title>Atualizar preço por foto</title>

 
</head>

<body>

    <?php include '../repositorios/menuGerenciamento.php';    menuGerenciamento($path,$home,$clientes,$cadastro_cliente,$add_fotos,$alt_preco);//menu gerenciamento?>
    
    <section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <form action="" method="post" class="formulario-login">
                <h3>Cadastrar preço por foto</h3>
                <?php

                include '../PhpOO/FotoVO.php';
                include '../PhpOO/FotoDAO.php';

                $fotoVO=new FotoVO();
                $fotoDAO= new FotoDAO();

                $preco_foto=$fotoDAO->read($conexao);

                if(isset($_POST["atualizar"])){
                    $preco=$_POST['valor'];


                    $fotoVO=new FotoVO();
                    $fotoDAO= new FotoDAO();

                    $fotoVO->setIdFoto(1);
                    $fotoVO->setValorFoto($preco);

                    $result=$fotoDAO->update($fotoVO,$conexao);

                    if($result==true)
                        echo"<div class='text-center' style='background-color:palegreen;padding:5px;border-radius:5px;margin-bottom:10px'><p style='color:#fff'>Sucesso ao atualizar preço por foto</p></div>";
                    else
                        echo "<div class=\"alert alert-primary\" role=\"alert\">Erro ao atualizar</div>";


                }
                ?>
                <h6>Preço unitario atual por foto: R$ <?php echo $preco_foto ?></h6>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alterar para: R$ </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nome_completo" name="valor" placeholder="10.00" step="0.01" required>
                    </div>
                </div>
                
                  
                <input type="submit" value="Atualizar" class="enviar" name="atualizar">
            </form>
        </div>
    </div>
    </section>
        
<?php include '../repositorios/rodape.php';rodape();?>
    
     
    <script src="../js/bootstrap.js"></script>
    <script src="../js/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>
</html>