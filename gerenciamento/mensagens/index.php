<?php
include '../../repositorios/validaLoginGerenciamento.php';
include '../../PhpOO/MensagemVO.php';
include '../../PhpOO/MensagemDAO.php';
include '../../PhpOO/PessoaVO.php';
include '../../PhpOO/PessoaDAO.php';
include '../../PhpOO/conexao.php';
include '../../config.php';

$pessoaVO=new PessoaVO();
$pessoDAO=new PessoaDAO();
$pessoaVO->setIdPessoa($_SESSION['id']);
$cliente=$pessoDAO->selectClientSpecific($pessoaVO,$conexao);

foreach ($cliente as $client){
    $id=$client->getIdPessoa();
    $nome=$client->getNome();
}

$mensagemVO= new MensagemVO();
$mensagemDAO=new MensagemDAO();

$mensagemVO->setIdDestino($_SESSION['id']);
//$mensagemVO->setIdOrigem(1);
$mensagem=$mensagemDAO->select($mensagemVO,$conexao);

    if(isset($_POST['responder'])||isset($_POST['nova_msg'])){
        // função para evitar possiveis hacks
        function clear($input){
            global $conexao;
            //sql
            $var= mysqli_escape_string($conexao, $input);
            //xss
            $var= htmlspecialchars($var);
            return $var;
        }
        $mensagemVO->setIdDestino($_POST['destino']);
        $mensagemVO->setMensagem(clear($_POST['mensagem']));
        $mensagemVO->setAssunto(clear($_POST['assunto']));
        $mensagemVO->setIdOrigem($_SESSION['id']);
        $mensagemVO->setNomeCliente($nome);

        $retorno=$mensagemDAO->create($mensagemVO,$conexao);
        if($retorno==true){
            echo"<script>alert('Mensagem enviada com sucesso.');window.location = 'index.php';</script></script>";
            //header('location:index.php');
        }
        else{
            echo "<script>alert('Mensagem não enviada.');</script>";
        }
    }

?>

<!doctype html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/gerenciamento.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ"
        crossorigin="anonymous">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <title>Luis Vinicius Fotografias</title>

</head>

<body>
    <!-- tirar apartir do body para desbloquer click direito do mouse -->

    <?php include '../../repositorios/menuGerenciamento.php'; menuGerenciamento($path,$home,$clientes,$cadastro_cliente,$add_fotos,$alt_preco) /* include './global.php'; menu site*/ ?>
<section>
    <div class="container">
        <h4 class="p-2">Caixa de entrada</h4><hr>
        <div class="row">
            <aside class="col-md-2">
                <ul class="list-group">
                    <li class="list-group-item"><a href="enviadas/" class="btn btn-info">Enviadas</a></li>
                </ul>
            </aside>
            <div class="col-md-10" style="border: solid 1px #ccc;border-radius: 3px"> 
                <h5 class="m-2 pl-3">Mensagens recebidas<hr></h5>
                <ul>
                    <?php

                    if($mensagem>0){

                        foreach ($mensagem as $mensagens){
                            $id_mensagem=$mensagens->getIdMensagem();
                            $assunto=$mensagens->getAssunto();
                            $message=$mensagens->getMensagem();
                            $id_destino=$mensagens->getIdDestino();
                            $id_origem=$mensagens->getIdOrigem();
                            $nome_cliente=$mensagens->getNomeCliente();
                            $previa=substr($message,0,15);

                            echo"
                                <a href='' data-toggle='modal' data-target='#exampleModa{$id_mensagem}'>
                        <li class='list-group-item'>
                            <div class='row'>
                                <div class='col-md-4'>{$assunto}</div>
                                <div class='col-md-4'><span> | </span>{$nome_cliente}</div>
                                <div class='col-md-4'><span> | </span>{$previa} ...</div>
                            </div>
                        </li></a>
                    <div class='modal fade' id='exampleModa{$id_mensagem}' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                        <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabel'>Nova Mensagem</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                  <span aria-hidden='true'>&times;</span>
                                </button>
                              </div>
                              <div class='modal-body'>
                                <form action='' method='post'>
                                      <div class='form-group'>
                                        <label for='recipient-name' class='col-form-label'>Destino:</label>
                                        <input type='text' name='destino' class='form-control' id='recipient-name' readonly value='$id_origem' style='display: none;'>
                                        <input type='text' class='form-control' id='recipient-name' readonly value='{$nome_cliente}'>
                                      </div>
                                      <div class='form-group'>
                                        <label for='message-text' class='col-form-label'>Assunto:</label>
                                        <input type='text' name='assunto' class='form-control' id='recipient-name' value='{$assunto}'>
                                      </div>
                                    <div class='form-group'>
                                        <label for='message-text' class='col-form-label'>Mensagem Anterior:</label>
                                        <textarea class='form-control'  id='message-text' readonly>{$message}</textarea>
                                      </div>
                                    
                                    <div class='form-group'>
                                        <label for='message-text' class='col-form-label'>Mensagem:</label>
                                        <textarea class='form-control' name='mensagem' id='message-text'></textarea>
                                      </div>
                                    
                                  </div>
                                  <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                    <input type='submit' name='responder' class='btn btn-primary' value='Responder Mensagem'>
                                </form>
                              </div>
                            </div>
                      </div>
                    </div>
                    
                            ";
                        }
                    }else{
                        echo "<a href='' id='erro' data-toggle='modal' data-target='#exampleModalErro' style='display: none'>aaaaaa</a>
<div class='modal fade' id='exampleModalErro' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                        <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabel'>Ops... um erro ocorreu.</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                  <span aria-hidden='true'>&times;</span>
                                </button>
                              </div>
                              <div class='modal-body'>
                                <div class='row'>
                                    <div class='col-md-6'>
                                        <img src='../../img/mensagem.png' style='width: 100%'>
                                    </div>
                                    <div class='col-md-6'>
                                        <p class='m-1 text-dark'> Você ainda nâo recebeu nenhuma mensagem, ou ainda não foi respondido, caso não tenha enviado uma mensagem envie agora mesmo. </p>
                                    </div>
                                </div>                                  
                              </div>
                              <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                    <a data-toggle='modal' data-target='#exempleModal' href='' class='btn btn-primary'>Escrever mensagem</a>
                            </div>
                      </div>
                    </div>";
                    }

                    ?>
                </ul>

            </div>
        </div>
    </div>
    <div class='modal fade' id='exempleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Nova Mensagem</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='modal-body'>
                    <form action='index.php' method='post'>
                        <div class='form-group'>
                            <label for='recipient-name' class='col-form-label'>Destino:</label>
                            <input type='text' class='form-control' id='recipient-name' readonly value='luisfotografias.com.br'>
                        </div>
                        <div class='form-group'>
                            <label for='message-text' class='col-form-label'>Assunto:</label>
                            <input type='text' name='assunto' class='form-control' id='recipient-name'>
                        </div>

                        <div class='form-group'>
                            <label for='message-text' class='col-form-label'>Messagem:</label>
                            <textarea class='form-control' name='mensagem' id='message-text'></textarea>
                        </div>

                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                    <input type='submit' name='responder' class='btn btn-primary' value='Enviar'>
                </div>
                    </form>

            </div>
        </div>
    </div>
</section>
    <footer>
        <div class="contatoRodape justify-content-center">
            <div id="divRodape">
                <h6>
                    <a class="a" href="https://www.facebook.com/luistochero/" target="_blank">Facebook</a>
                </h6>
                <h6>
                    <a class="a" href="">Instagram</a>
                </h6>
                <h6>E-mail:<a class="a" href="mailto:luistochero@hotmail.com"> luistochero@hotmail.com</a></h6>
            </div>
            <div id="divRodape2">
                <h6>Telefone: <a class="a" href="tel:(55) 3314-2311">(55) 3314-2311</a></h6>
                <h6>Celular: xx xxxxx-xxxx</h6>
                <h6>Endereço: xxxxxx xxxxxxx xxxxxx xxxxxxxxx</h6>
            </div>
        </div>
        <p id="pFooter">Desenvolvido por
            <a href="" class="a">Alisson Stochero</a>
        </p>
    </footer>





    <script src="../../jquery-3.2.1.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            $('#erro').trigger('click');
        });
    </script>
    <script src="../../js/scrolling.js"></script>

    <script src="../../js/wow.js"></script>
    <script src="../../js/wow-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>

</body>

</html>