<?php
require_once '../repositorios/validaLoginGerenciamento.php';
include '../config.php';
include '../PhpOO/conexao.php';
include '../PhpOO/MensagemVO.php';
include '../PhpOO/MensagemDAO.php';

$mensagemVO= new MensagemVO();
$mensagemDAO=new MensagemDAO();

$mensagemVO->setIdDestino($_SESSION['id']);
$total_mensagem=$mensagemDAO->countMessages($mensagemVO,$conexao);
?>
<!doctype html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/gerenciamento.css">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Gerenciamento</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

 
</head>

<body>

   <?php include '../repositorios/menuGerenciamento.php';    menuGerenciamento($path,$home,$clientes,$cadastro_cliente,$add_fotos,$alt_preco);//menu gerenciamento?>
    

<section class="container-fluid text-center" id="servico">
    <div class="menu">
    <ul class="ul">
        <li class="li dropdown">
            <a class="alink dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop"><i class='fas fa-users'></i> Clientes</a>
            <div class="dropdown-menu">
                <a id="a" class="dropdown-item" href="clientes.php"> Clientes</a>
                <a id="a" class="dropdown-item" href="cadastro_cliente.php">Cadastrar Clientes</a>
                <a id="a" class="dropdown-item" href="clientes.php">Editar Clientes</a>
                <a id="a" class="dropdown-item" href="clientes.php">Excluir Clientes</a>
            </div>
        </li>
        <li class="li dropdown">
            <a class="alink dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop"><i class='fas fa-images'></i> Fotos</a>
            <div class="dropdown-menu">
                <a id="a" class="dropdown-item" href="add_fotos.php">Adicionar fotos de clientes</a>
                <a id="a" class="dropdown-item" href="preco_foto.php">Alterar preço por fotos</a>
            </div>
        </li>
        <!--<li class="li dropdown">
            <a class="alink dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop"><i class='fas fa-image'></i> Fotos do Site</a>
            <div class="dropdown-menu">
                <a id="a" class="dropdown-item" href="upload_carrossel.php">Fotos Carrossel Site</a>
                <div class="dropdown-divider"></div>
                <a id="a" class="dropdown-item" href="upload_casamentos.php">Fotos Casamentos</a>
                <a id="a" class="dropdown-item" href="upload_banner_casamentos.php">Fotos Banner Casamentos</a>
                <div class="dropdown-divider"></div>
                <a id="a" class="dropdown-item" href="upload_books.php">Fotos Books</a>
                <a id="a" class="dropdown-item" href="upload_banner_books.php">Fotos Banner Books</a>
                <div class="dropdown-divider"></div>
                <a id="a" class="dropdown-item" href="upload_formaturas.php">Fotos Formaturas</a>
                <a id="a" class="dropdown-item" href="upload_banner_formaturas.php">Fotos Banner Formaturas</a>
                <div class="dropdown-divider"></div>
                <a id="a" class="dropdown-item" href="upload_outros.php">Outros Produtos</a>
                <a id="a" class="dropdown-item" href="upload_banner_outros.php">Fotos Banner Outros</a>
            </div>
        </li>-->
        <li class="li dropdown">
            <a class="alink dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop"><i class="far fa-calendar-alt"></i></i> Eventos</a>
            <div class="dropdown-menu">
                <a id="a" class="dropdown-item" href="eventos.php">Cadastrar Eventos</a>

            </div>
        </li>
        <li class='li dropdown'>
            <a class='alink dropdown-toggle' href='./mensagens'><i class="fas fa-comment"></i> Mensagens <span class='badge badge-light'><?php echo $total_mensagem; ?></span></a>
        </li>
        <li class="li dropdown">
            <a class="alink dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop"><i class='fas fa-clipboard-list'></i> Ordens de Serviço</a>
            <div class="dropdown-menu">
                <a id="a" class="dropdown-item" href="ordem.php">Listar Ordens</a>
                
            </div>
        </li>
    </ul>
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