<?
    include '../repositorios/validaLoginGerenciamento.php';
    include '../PhpOO/conexao.php';
    include '../config.php';

?>
<!doctype html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/clientes.css">
    <link rel="stylesheet" href="../css/gerenciamento.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <title>Ordens de Serviço</title>
</head>

<body>
    <?php //include '../repositorios/menuGerenciamento.php';    menuGerenciamento();//menu gerenciamento?>
    
    
    <section class="container-fluid">
        <h3>Ordens de serviço:</h3>
        <div id="pesquisar" class=" justify-content-sm-center">
        <form action="" method="post">
            <div class="input-group mb-3" id="ordens">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Mês:</label>
                      </div>
                    <select class="custom-select" id="inputGroupSelect01" name="mes">
                        <option value="1">Janeiro</option>
                        <option value="2">Fevereiro</option>
                        <option value="3">Março</option>
                        <option value="4">Abril</option>
                        <option value="5">Maio</option>
                        <option value="6">Junho</option>
                        <option value="7">Julho</option>
                        <option value="8">Agosto</option>
                        <option value="9">Setembro</option>
                        <option value="10">Outubro</option>
                        <option value="11">Novembro</option>
                        <option value="12">Dezembro</option>
                        <option value="all" selected>Todos</option>
                      </select>
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Ano:</label>
                      </div>
                <select class="custom-select" id="inputGroupSelect01" name="ano">
                    <option value="all" selected>Todos</option>
                </select>
                <div class='col-sm-6 col-md-4'>

                    <div class='card' style='color:#000'>
                        <h6>Nº Ordem: $id</h6>
                        <h6>Nome: $nome_cliente </h6>
                        <h6>Data: $data</h6>
                        <h6>Valor Total: $preco_total </h6>

                    </div>

                </div>
            </div>
    </section>
       
    
 <?php include './repositorios/rodape.php';rodape();?>
    
     
    <script src="../js/bootstrap.js"></script>
    <script src="../js/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>
</html>