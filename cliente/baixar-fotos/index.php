<?php
	include '../../PhpOO/conexao.php';
    include '../../repositorios/validaUsuario.php';
    include '../../PhpOO/AlbunsVO.php';
    include '../../PhpOO/AlbunsDAO.php';
    include '../../config.php';

    $albumVO=new AlbunsVO();
    $albumDAO=new AlbunsDAO();

    $albumVO->setIdPessoa($_SESSION['id']);
    $albumCliente=$albumDAO->read($albumVO,$conexao);

    foreach ($albumCliente as $album){
        $link_down=$album->getLinkDown();
    }

?>
<!doctype html>
<html lang="pt-br">
<head>
    
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/usuario.css">
    
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Retirar Minhas fotos</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

 
</head>

<body>

    <?php include '../../repositorios/menuUsuario.php';    menuUsuario('../pagamento',$path,$inicial,$escolha,$payment,$download); // menu usuario    ?>
    
    
    <section class="container-fluid">
        <h4>Download das fotos:</h4>
        <div>
            
            <div class='container'>
                <?php
                    if($link_down!=null){
                        echo "
                        <div class='erro'>
                            <div class='row'>
                                <div class='col-md-6'>
                                        <img src='../../img/download.png' style='width: 100%;'>
                                </div>
                                <div class='col-md-6'>
                                    <h6 class='font-weight-bold text-primary mt-3 p-2'>Suas fotos estão disponíveis para download baixe agora mesmo.</h6>
                                    <a href='$link_down' class='btn btn-outline-primary'>
                                            <div class=''>
                                                <i class='fas fa-download'></i> Baixar fotos
                                            </div>
                                    </a>
                                </div>
                                    
                            </div>
                        </div>
                        ";
                    }else{
                        echo "<div class='erro' '>
                                <div class='row'>
                                    <div class='col-md-6'>
                                        <img src='../../img/download.png' style='width: 100%'>
                                    </div>
                                    <div class='col-md-6'>
                                        <h6 class='font-weight-bold text-primary'>Ops! suas fotos ainda não estão diponiveis para download.</h6>
                                        <p class='m-1 text-dark'> Com a busca da perfeição em suas 
                                        fotos e sua satisfação em ter seus melhores registrados as vezes isso pode demorar um pouco mais que o esperado. </p>
                                        <p class='font-weight-bold text-primary m-1'>Você recebrá um aviso ao disponibilizarmos as fotos para o download.</p>
                                    </div>
                                </div>
                              </div>";
                    }
                ?>
            </div>
        </div>
    </section>

    
    
    
    
    <?php include '../../repositorios/rodape.php';rodape();?>
    
    
    <script src="../../js/bootstrap.js"></script>
    <script src="../../js/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>
</html>
