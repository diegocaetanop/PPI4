<?php
    include '../PhpOO/conexao.php';
    include '../repositorios/validaUsuario.php';
    include '../PhpOO/PessoaVO.php';
    include '../PhpOO/PessoaDAO.php';
    include '../PhpOO/AlbunsVO.php';
    include '../PhpOO/AlbunsDAO.php';
    include '../PhpOO/MensagemVO.php';
    include '../PhpOO/MensagemDAO.php';
    include '../config.php';

    $mensagemVO= new MensagemVO();
    $mensagemDAO=new MensagemDAO();

    $mensagemVO->setIdDestino($_SESSION['id']);
    $total_mensagem=$mensagemDAO->countMessages($mensagemVO,$conexao);

    $pessoaVO= new PessoaVO();
    $pessoaDAO= new PessoaDAO();

    $albumVO=new AlbunsVO();
    $albumDAO= new AlbunsDAO();

    $pessoaVO->setIdPessoa($_SESSION['id']);

    $cliente=$pessoaDAO->selectClientSpecific($pessoaVO, $conexao);

    foreach ($cliente as $clientes){
        $id=$clientes->getIdPessoa();
        $nome=$clientes->getNome();
        $cpf=$clientes->getCpf();
        $endereco=$clientes->getEndereco();
        $email=$clientes->getEmail();
        $numero=$clientes->getTelefone();
    }

    $albumVO->setNome($nome.$id);
    $albumVO->setIdPessoa($id);

    $albumCliente=$albumDAO->selectAlbumCliente($albumVO,$conexao);

    if($albumCliente!=0){
        foreach ($albumCliente as $albumclientes){
            $id_album=$albumclientes->getIdAlbum();
            $nome_album=$albumclientes->getNome();
            $valor_base=$albumclientes->getValorBase();
            $disp_esc=$albumclientes->getDispoEscolha();
            $escolhidas=$albumclientes->getEscolhas();

            $qtde=$albumclientes->getQtdeFotos();
        }
    }else{
        $valor_base=0;
        $qtde=0;
    }


    if(($qtde<=0)){
        $link="#";
        $_SESSION['link']=$link;
    }else{
        $link='pagamento';
        $_SESSION['link']=$link;
    }
?>
<!doctype html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/usuario.css">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Minha Conta</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

 
</head>

<body>

    <?php include '../repositorios/menuUsuario.php';    menuUsuario($link,$path,$inicial,$escolha,$payment,$download); // menu usuario    ?>
    
    <section class="container-fluid">
        <div class=" cliente justify-content-center">
            <?php echo"<h5>$nome</h5>"?><br>
            
            <p class="txt-user">Preço base:	<?php if($valor_base==0){echo"Você ainda não possui um album com preço definido.";}else{echo"R$:$valor_base";}?></p>
        </div>
        <div class="row justify-content-center">
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <a class="nav-link escolher" href="./escolher"><i class="fas fa-images"></i> Escolher Fotos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link escolher" href="<?php echo $link;?>"><i class="fas fa-shopping-cart"></i> Pagamento</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link escolher" href="./baixar-fotos"><i class="fas fa-download"></i> Baixar Fotos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link escolher" href="./mensagens"><i class="fas fa-download"></i> Mensagens <span class="badge badge-light"><?php echo $total_mensagem; ?></span></a>
                </li>
            </ul>
    </section>

    
    <?php include '../repositorios/rodape.php';rodape();?>
    
    
    <script src="../js/bootstrap.js"></script>
    <script src="../js/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>
</html>