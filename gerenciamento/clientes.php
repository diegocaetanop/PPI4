 
<?php
    include '../PhpOO/conexao.php';

    include'../repositorios/validaLoginGerenciamento.php';

// Determinar localidade BR
    setlocale(LC_ALL, 'pt_BR');

include '../PhpOO/AlbunsVO.php';
include '../PhpOO/AlbunsDAO.php';
include '../config.php';

?>

<!doctype html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/clientes.css">
    <link rel="stylesheet" href="../css/gerenciamento.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <title>Clientes</title>
</head>

<body>
    <?php include '../repositorios/menuGerenciamento.php';    menuGerenciamento($path,$home,$clientes,$cadastro_cliente,$add_fotos,$alt_preco); // menu gerenciamento?>
    
    
    <section class="container-fluid">
        <h3>Clientes:</h3>
        <div id="pesquisar" class=" justify-content-sm-center">
        <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Pesquisar: ex: João Paulo da Silva" aria-describedby="basic-addon2" name="nome">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="pesquisar"><i class="fas fa-search"></i> Pesquisar</button>
                    </div>
                </div>
        </form>
        </div>
        <?php
        if(isset($_POST['excluir'])){
            require_once '../PhpOO/PessoaVO.php';
            require_once '../PhpOO/PessoaDAO.php';
            $pessoaDAO=new PessoaDAO();
            $pessoaVO=new PessoaVO();

            // exclui cliente
            if(isset($_POST['excluir'])){
                $pessoaVO->setIdPessoa($_POST['id']);
                $pessoaDAO->delete($pessoaVO,$conexao);
            }
        }
        if(isset($_POST['excluir_fotos'])){
            // exclui somente fotos do cliente
            require_once '../PhpOO/PessoaVO.php';
            require_once '../PhpOO/PessoaDAO.php';
            include '../repositorios/deleteFotos.php';

            $pessoaDAO=new PessoaDAO();
            $pessoaVO=new PessoaVO();

            $pessoaVO->setIdPessoa($_POST['id']);
            $pessoaVO->setNome($_POST['nome']);

            // deleta as fotos do cliente no diretorio albuns/
            deletar_fotos($pessoaVO,"Albuns/");

        }
        if (isset($_POST['editar'])){

            require_once '../PhpOO/PessoaVO.php';
            require_once '../PhpOO/PessoaDAO.php';
            $pessoaDAO=new PessoaDAO();
            $pessoaVO=new PessoaVO();

            $pessoaVO->setIdPessoa($_POST['id']);
            $pessoaVO->setNome($_POST['nome']);
            $pessoaVO->setCpf($_POST['cpf']);
            $pessoaVO->setEndereco($_POST['endereco']);
            $pessoaVO->setTelefone($_POST['numero']);
            $pessoaVO->setEmail($_POST['email']);

            if(isset($_POST['link_download'])){

                $albumVO=new AlbunsVO();
                $albumDAO=new AlbunsDAO();

                $albumVO->setIdPessoa($_POST['id']);
                $albumVO->setLinkDown($_POST['link_download']);
                $returnAlbum=$albumDAO->updateLinkDown($albumVO,$conexao);

                $albumVO->setNome($_POST['nome'].$_POST['id']);

                include '../PhpOO/PagamentoVO.php';
                include '../PhpOO/PagamentoDAO.php';

                $pagamentoVO=new PagamentoVO();
                $pagamentoDAO=new PagamentoDAO();

                $albumPagamento=$albumDAO->selectAlbumCliente($albumVO,$conexao);

                foreach ($albumPagamento as $album){
                    $idAlbum=$album->getIdAlbum();
                    $valor_total=$album->getValorTotal();
                }

                if($albumPagamento==true){

                    $pagamentoVO->setIdAlbum($idAlbum);
                    $pagamentoVO->setValorFinal($valor_total);
                    if(isset($_POST['data_pagamento']))
                        $pagamentoVO->setDataPagamento($_POST['data_pagamento']);
                    else
                        $pagamentoVO->setDataPagamento(null);
                    $retorno=$pagamentoDAO->selectPagamentoAlbum($pagamentoVO,$conexao);

                    if($retorno>0){
                        $returnPagamento=$pagamentoDAO->update($pagamentoVO,$conexao);
                    }else{
                        $returnPagamento=$pagamentoDAO->create($pagamentoVO,$conexao);
                    }
                }else{
                    echo"<script> alert('Usuario ainda nao tem um album postado.');window.location = 'clientes.php'; </script>";
                }
            }

            $resposta=$pessoaDAO->update($pessoaVO, $conexao);

            if(($resposta==1)&&($returnAlbum==1)&&($returnPagamento==1)){
                echo"<script> alert('Dados do usuario foram atualizados com SUCESSO.');window.location = 'clientes.php'; </script>";
            }else{
                if($resposta!=1)
                    echo"<script> alert('Dados do usuario NÃO foram atualizados.');window.location = 'clientes.php'; </script>";
                elseif ($returnPagamento!=1)
                    echo"<script> alert('Dados do pagamento do usuario NÃO foram atualizados.');window.location = 'clientes.php'; </script>";
            }
        }
        ?>
        <div class="row justify-content-sm-center">
                
              <?php
              // se clicar em pesquisar

                if (isset($_POST['pesquisar'])){

                    // caso pesquisar por algum cliente expecifico

                    require_once '../PhpOO/PessoaDAO.php';
                    require_once '../PhpOO/PessoaVO.php';

                    $selectClient=new PessoaDAO();
                    $pessoaVO=new PessoaVO();

                    $pessoaVO->setNome($_POST['nome']);

                    $client=$selectClient->selectClient($pessoaVO,$conexao);

                }else{

                // abertura normal da página caso nao seja pesquisado nome
                require_once '../PhpOO/PessoaDAO.php';
                require_once '../PhpOO/PessoaVO.php';

                $selectClient=new PessoaDAO();
                $client=$selectClient->read($conexao);

              }

              $albumVO=new AlbunsVO();
              $albumDAO=new AlbunsDAO();

              // lista os clientes
              if($client != 0){
                  foreach ($client as $clientes){

                      $id=$clientes->getIdPessoa();
                      $nome=$clientes->getNome();
                      $cpf=$clientes->getCpf();
                      $endereco=$clientes->getEndereco();
                      $email=$clientes->getEmail();
                      $numero=$clientes->getTelefone();

                      $albumVO->setIdPessoa($id);
                      $albumCliente=$albumDAO->read($albumVO,$conexao);

                      if($albumCliente!=null){

                          foreach ($albumCliente as $album){
                              $valor_base=$album->getValorBase();
                              $valor_total=$album->getValorTotal();
                              $qtde_fotos=$album->getQtdeFotos();
                              $escolhidas=$album->getEscolhas();
                              $dispo_esc=$album->getDispoEscolha();
                              $dispo_down=$album->getLinkDown();

                              /*if($valor_base==null){
                                  $valor_base=0.00;
                                  $valor_total=0.00;
                                  $qtde_fotos=0;
                              }

                              if(($valor_base!=null)&&($valor_total==null)){
                                  $valor_total=$valor_base;
                              }*/

                              if($dispo_esc=='S')
                                  $dispo_esc=' Sim';
                              else
                                  $dispo_esc=' Não';

                              if($dispo_down==null){
                                  $dispo_down=' Não';
                                  $link_down=null;
                              }else{
                                  $link_down=$dispo_down;
                                  $dispo_down=' Sim';
                              }
                          }
                      }else{
                          $escolhidas=null;
                          $dispo_esc=' Não';
                          $dispo_down=' Não';
                          $link_down=null;
                          $valor_base=0.00;
                          $valor_total=0.00;
                          $qtde_fotos=0;
                      }


                      echo "<div class='col-sm-6 col-md-4'>

                              <div class='card' style='color:#000'>
                                    <h6>Nome: $nome </h6>
                                    <h6>Email: $email </h6>
                                    <h6>Telefone: $numero </h6>
                                    <h6>Valor Base: $valor_base </h6>
                                    <h6>Valor Total: $valor_total </h6>
                                    <h6>Quantidade fotos escolhidas: $qtde_fotos </h6>
                                    <div class='direita'>
                                       <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#excluirModa$id' style='margin-bottom:5px' id='excluir'>
                                            Excluir <i class='fas fa-trash-alt'></i>
                                       </button> 
                                       <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#excluirModaFotos$id' style='margin-bottom:5px' id='excluir'>
                                            Excluir Fotos <i class='fas fa-camera-retro'></i>
                                       </button> 
                                       <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal-$id' id='editar'>
                                            Editar <i class='fas fa-user-edit'></i>
                                       </button>
                                   </div>
                              </div>



                              <!-- Modal excluir -->

                              <div class='modal fade' id='excluirModa$id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                <div class='modal-dialog' role='document'>
                                  <div class='modal-content'>
                                    <div class='modal-header' style='background-color:#ff5555;'>
                                      <h5 class='modal-title' id='exampleModalLabel'>Excluir cliente $nome id= $id</h5>
                                      <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                      </button>
                                    </div>
                                    <div class='modal-body'>
                                      <p style='color:black'>Tem certeza que deseja excluir este cliente? Todos os dados serão perdidos.</p>
                                    </div>
                                    <div class='modal-footer'>
                                      <form action='clientes.php' method='post'>
                                            <div id='passaValor'>
                                               <input type='number' value='$id' id='editar' name='id'>
                                               
                                            </div>
                                           <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                           <input type='submit' value='Apagar' name='excluir' class='btn btn-danger'>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                                <!-- Modal excluir Fotos -->

                              <div class='modal fade' id='excluirModaFotos$id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                <div class='modal-dialog' role='document'>
                                  <div class='modal-content'>
                                    <div class='modal-header' style='background-color:#ffc107;'>
                                      <h5 class='modal-title' id='exampleModalLabel'>Excluir fotos do cliente $nome id= $id</h5>
                                      <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                      </button>
                                    </div>
                                    <div class='modal-body'>
                                      <p style='color:black'>Tem certeza que deseja excluir as fotos deste cliente? Todos as fotos serão perdidas.</p>
                                    </div>
                                    <div class='modal-footer'>
                                      <form action='clientes.php' method='post'>
                                            <div id='passaValor'>
                                               <input type='number' value='$id' id='editar' name='id'>
                                               
                                               <input type='text' value='$nome' id='editar' name='nome'>
                                            </div>
                                           <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                           <input type='submit' value='Apagar Fotos' name='excluir_fotos' class='btn btn-warning'>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                              <!-- Modal editar -->

                              <div class='modal fade' id='exampleModal-$id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                <div class='modal-dialog' role='document'>
                                  <div class='modal-content'>
                                    <div class='modal-header' style='background-color:rgba(6, 190, 225, 0.90);'>
                                      <h5 class='modal-title' id='exampleModalLabel'>Editar cliente $nome id= $id</h5>
                                      <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                      </button>
                                    </div>
                                    <div class='modal-body justify-content-center'>
                                      <p style='color:black'>Tem certeza que deseja editar este cliente? Todos os dados ateriormente gravados serão perdidos.</p>
                                      <form action='clientes.php' method='post'>
                                      
                                      <div id='passaValor'><input type='number' value='' id='editar' name='preco_total'></div>
                                            
                                            <div id='passaValor' class='form-group'>
                                               <input type='number' value='$id' id='editar' name='id'>
                                               
                                               
                                            </div>
                                            <div class='form-group row'>
                                                <label class='col-sm-2 col-form-label'>Nome Completo:</label>
                                                <div class='col-sm-10'>
                                                    <input type='text' class='form-control' id='cpf' name='nome' placeholder='João da Rosa' value='$nome' required>
                                                </div>
                                            </div>
                                            <div class='form-group row'>
                                                <label class='col-sm-2 col-form-label'>CPF:</label>
                                                <div class='col-sm-10'>
                                                    <input type='number' class='form-control' id='cpf' name='cpf' placeholder='01999023354' value='$cpf' required readonly>
                                                </div>
                                            </div>
                                            <div class='form-group row'>
                                                <label class='col-sm-2 col-form-label'>Email:</label>
                                                <div class='col-sm-10'>
                                                    <input type='email' class='form-control' id='email' name='email' placeholder='exemplo@gmail.com' value='$email' required>
                                                </div>
                                            </div>
                                            <div class='form-group row'>
                                                <label class='col-sm-2 col-form-label'>Numero celular: (com DDD)</label>
                                                <div class='col-sm-10'>
                                                    <input type='number' class='form-control' id='numero' name='numero' placeholder='55999557722' value='$numero' required>
                                                </div>
                                            </div>
                                            <div class='form-group row'>
                                                <label class='col-sm-2 col-form-label'>Endereço com numero:(opcional)</label>
                                                <div class='col-sm-10'>
                                                    <input type='text' class='form-control' id='endereco' name='endereco' placeholder='Rua Marechal Floriano - 530' value='$endereco'>
                                                </div>
                                            </div>
                                            <div class='form-group row'>
                                                <label class='col-sm-2 col-form-label'>Link para download:</label>
                                                <div class='col-sm-10'>
                                                    <input type='text' class='form-control' id='link_download' name='link_download' value='$link_down'>
                                                </div>
                                            </div>
                                            <div class='form-group row'>
                                                <label class='col-sm-2 col-form-label'>Data do pagamento:</label>
                                                <div class='col-sm-10'>
                                                    <input type='date' class='form-control' name='data_pagamento'>
                                                </div>
                                            </div>
                                            <div class='form-group row'>
                                                <label class='col-sm-2 col-form-label'>Fotos esc:</label>
                                                <div class='col-sm-10'>
                                                    <input type='text' class='form-control' id='link_download' value='$escolhidas'>
                                                </div>
                                            </div>
                                            <div class='form-check form-check-inline'>
                                                <label class='form-check-label' for='inlineRadio1'>Fotos Disponíveis para escolha: </label>
                                                
                                                <label class='form-check-label' for='inlineRadio1'> $dispo_esc</label>
                                            </div>
                                            
                                            <div class='form-check form-check-inline'>
                                                <label class='form-check-label' for='dispoDown'>Fotos Disponíveis para download: </label>
                                                
                                                <label class='form-check-label' for='dispoDown'> $dispo_down</label>
                                            </div>
                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                                <input type='submit' value='Confirmar e editar' name='editar' class='btn btn-success'>
                                            </div>
                                        </form>
                                    </div>
                                    
                                  </div>
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