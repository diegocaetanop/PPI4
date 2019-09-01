<?php
    include '../../PhpOO/conexao.php';
    include '../../repositorios/validaUsuario.php';
    include '../../PhpOO/PessoaVO.php';
    include '../../PhpOO/PessoaDAO.php';
    include '../../PhpOO/AlbunsVO.php';
    include '../../PhpOO/AlbunsDAO.php';
    include '../../PhpOO/FotoVO.php';
    include '../../PhpOO/FotoDAO.php';
    include '../../config.php';

    $pessoaVO=new PessoaVO();
    $pessoaDAO=new PessoaDAO();

    $albunsVO=new AlbunsVO();
    $albunsDAO=new AlbunsDAO();

    $fotoVO=new FotoVO();
    $fotoDAO=new FotoDAO();

    $pessoaVO->setIdPessoa($_SESSION['id']);
    $cliente=$pessoaDAO->selectClientSpecific($pessoaVO,$conexao);

    foreach ($cliente as $clientes){
        $id=$clientes->getIdPessoa();
        $nome=$clientes->getNome();
        $cpf=$clientes->getCpf();
        $endereco=$clientes->getEndereco();
        $email=$clientes->getEmail();
        $numero=$clientes->getTelefone();
    }

    $albunsVO->setIdPessoa($id);
    $albumCliente=$albunsDAO->read($albunsVO,$conexao);
    foreach ($albumCliente as $albumclientes){
        $id_album=$albumclientes->getIdAlbum();
        $nome_album=$albumclientes->getNome();
        $valor_base=$albumclientes->getValorBase();
        $disp_esc=$albumclientes->getDispoEscolha();
        $escolhidas=$albumclientes->getEscolhas();
        $qtde=$albumclientes->getQtdeFotos();
    }

    $preco_foto=$fotoDAO->read($conexao);

    $preco_final=$valor_base+($preco_foto*$qtde);
?>
<!doctype html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/pagamento.css">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Pagamento</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

 
</head>

<body>

    <?php include '../../repositorios/menuUsuario.php';    menuUsuario('',$path,$inicial,$escolha,$payment,$download); // menu usuario    ?>
    
    
    <section class="container-fluid">
        <h3>Pagamento:</h3>
        <div class="justify-content-sm-center">
            <div class="info">
                <div class="card">
                    <div class="card-header">
                        Informações do album:
                    </div>
                    <div class="card-body">
                        <h6><?php echo $nome; ?></h6>
                        <h6>Telefone: <?php echo $numero ?></h6>
                        <h6>Email: <?php echo $email?></h6>
                        <h6>Quantidade de fotos escolhidas: <?php echo $qtde ?></h6>
                        <h6>Valor unitario por foto: R$ <?php echo number_format( $preco_foto,2,',','.')?></h6>
                        <h6>Valor base do álbum: R$ <?php echo number_format($valor_base,2,',','.') ?></h6>
                        <h6>Valor total: R$ <?php echo number_format($preco_final,2,',','.'); ?></h6>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                          Continuar para pagamento
                        </button>
                    </div>
                </div>          
            </div>          
        </div>
       <!-- Button trigger modal -->
            

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Forma de pagamanto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                    
                  <div class="modal-body">
                      <p style="color:#1b1e21">Deseja continuar com o pagamento?</p>
                      <p style="color:#1b1e21">Se sim você será redirecionado para a pagina do PagSeguro, onde podera fazer o pagamento com segurança.</p>
                      <form action="processa_pagamento.php" method="post">
                          <div id="passaValor">
                              <input type="number" class="btn btn-success" value="<?php echo$id;?>" name="id">
                                <input type="number" class="btn btn-success" step="0.01" value="<?php echo number_format($preco_final,2,'.',''); ?>" name="preco_total">
                                <input type="text" class="btn btn-success" value="<?php echo $nome.$id; ?>" name="ref">
                                <input type="text" class="btn btn-success" value="<?php echo $nome; ?>" name="nome_comprador">
                                <input type="text" class="btn btn-success" value="<?php echo $email; ?>" name="email">
                          </div>
                          
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <input type="submit" class="btn btn-success" value="Ir para pagamento">
                        </div>
                      </form>  
                  </div>
                  
                </div>
              </div>
            </div>
        
    </section>

     <?php include '../../repositorios/rodape.php';rodape();?>
    
    
   <script src=../../"js/bootstrap.js"></script>
    <script src="../../js/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>