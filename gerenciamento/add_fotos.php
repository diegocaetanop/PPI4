 <?php include('../PhpOO/conexao.php') ?>
<?php
   include '../repositorios/validaLoginGerenciamento.php';
include '../config.php';
    // Determinar localidade BR
    setlocale(LC_ALL, 'pt_BR');


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
    <title>Upload de fotos dos clientes</title>
</head>

<body>
    <?php include '../repositorios/menuGerenciamento.php';    menuGerenciamento($path,$home,$clientes,$cadastro_cliente,$add_fotos,$alt_preco);//menu gerenciamento?>
    
    
    <section class="container-fluid">
        <h3>Upload de fotos dos clientes:</h3>
        <div id="pesquisar" class=" justify-content-sm-center">
        <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Pesquisar: ex: João Paulo da Silva" aria-describedby="basic-addon2" name="nome_cliente">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="pesquisar"><i class="fas fa-search"></i> Pesquisar</button>
                    </div>
                </div>
        </form>
        </div>
        <div class="row justify-content-sm-center">
        <?php
            
            if(isset($_POST['pesquisar'])){

                        echo "<div class='col-sm-6 col-md-4'>

                                          <div class='card' style='color:#000'>
                                                <h6>Nome: $nome_completo </h6>
                                                <h6>Email: $email </h6>
                                                
                                                <h6>Telefone celular: $numero </h6>
                                                <div class='direita'>
                                                    <form action='upload_fotos.php' method='get'>
                                                        <div id='passaValor'>
                                                           <input type='number' value='$id' id='editar' name='cod'>
                                                           <input type='text' value='$nome_completo' id='editar' name='client'>
                                                        </div>
                                                       <input type='submit' value='Adicionar Fotos' id='editar' name='add' class='btn btn-info'>
                                                       
                                                    </form>
                                               </div>
                                          </div>

                            </div>"
                        ;
            }
        ?>
        </div>
            <div class="row justify-content-sm-center">
              <?php
              include '../PhpOO/PessoaDAO.php';
              include '../PhpOO/PessoaVO.php';

              $pessoaVO=new PessoaVO();
              $pessoaDAO=new PessoaDAO();

              $client=$pessoaDAO->read($conexao);

              if($client!=0){
                  foreach ($client as $clientes){
                      $id=$clientes->getIdPessoa();
                      $nome=$clientes->getNome();
                      $telefone=$clientes->getTelefone();
                      $email=$clientes->getEmail();
                      echo "<div class='col-sm-6 col-md-4'>

                                          <div class='card' style='color:#000'>
                                                <h6>Nome: $nome </h6>
                                                <h6>Email: $email </h6>
                                                
                                                <h6>Telefone celular: $telefone </h6>
                                                <div class='direita'>
                                                    <form action='upload_fotos.php' method='get'>
                                                        <div id='passaValor'>
                                                           <input type='number' value='$id' id='editar' name='cod'>
                                                           
                                                        </div>
                                                       <input type='submit' value='Adicionar Fotos' id='editar' name='add' class='btn btn-info'>
                                                       
                                                    </form>
                                               </div>
                                          </div>

                            </div>"
                      ;
                  }
              }

             ?>
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