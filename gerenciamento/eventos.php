<?php include '../config.php'; ?>
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
    <?php include '../repositorios/menuGerenciamento.php'; menuGerenciamento($path,$home,$clientes,$cadastro_cliente,$add_fotos,$alt_preco);?>
    <section>
    <div class="container-fluid">
        <div class="row justify-content-center">

            <form action="" method="post" class="formulario-login">
                <h3>Cadastrar evento na agenda</h3>
                <?php
                if(isset($_POST['marcar'])){
                    include '../PhpOO/conexao.php';
                    include '../PhpOO/EventosDAO.php';
                    include '../PhpOO/EventosVO.php';

                    $eventosVO=new EventosVO();
                    $eventosDAO=new EventosDAO();

                    $eventosVO->setDataEvento($_POST['data_evento']);
                    $retorno=$eventosDAO->create($eventosVO,$conexao);
                    if($retorno==1){
                        echo"<div class='alert alert-success' role='alert'>
                      Sucesso data está marcada!
                    </div>";
                    }else
                        echo "<div class='alert alert-danger' role='alert'>
                      Não foi possivel marcar nesta data, já está reservada!
                    </div>";
                }
                if(isset($_POST['desmarcar'])){
                    include '../PhpOO/conexao.php';
                    include '../PhpOO/EventosDAO.php';
                    include '../PhpOO/EventosVO.php';

                    $eventosVO=new EventosVO();
                    $eventosDAO=new EventosDAO();

                    $eventosVO->setDataEvento($_POST['data_evento']);
                    $retorno=$eventosDAO->delete($eventosVO,$conexao);
                    if($retorno==1){
                        echo"<div class='alert alert-success' role='alert'>
                      A data foi desmarcada!
                    </div>";
                    }else
                        echo "<div class='alert alert-danger' role='alert'>
                      Não foi possivel desmarcar esta data!
                    </div>";
                }
                ?>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Data do evento </label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="data_evento" placeholder="dd/mm/aaaa" required>
                    </div>
                </div>
                
                  
                <input type="submit" value="Marcar" class="enviar" name="marcar">
                <input type="submit" value="Desmarcar" class="enviar" name="desmarcar">
            </form>
        </div>
    </div>
    </section>
        

    <?php include '../repositorios/rodape.php'; rodape();?>
     
    <script src="../js/bootstrap.js"></script>
    <script src="../js/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>
</html>