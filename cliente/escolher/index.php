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

    foreach ($albumCliente as $Albumclientes){
        $id_album=$Albumclientes->getIdAlbum();
        $nome_album=$Albumclientes->getNome();
        $valor_base=$Albumclientes->getValorBase();
        $disp_esc=$Albumclientes->getDispoEscolha();
        $escolhidas=$Albumclientes->getEscolhas();

        $qtde=$Albumclientes->getQtdeFotos();
    }

    $fotoDAO=new FotoDAO();
    $valor_foto=$fotoDAO->read($conexao);


                if(($qtde==0)||($qtde== NULL)||($qtde=='')){
                    $link="";
                }else{
                    $link='../pagamento';
                }
                
                // acessa o album do cliente e conta quantas imagens tem
                
		$pasta = '../../Albuns'.'/'.$nome.$id.'/'; // acessa a pasta das fotos
		$arquivos = glob("$pasta{*.jpg,*.JPG,*.png,*.gif,*.bmp}", GLOB_BRACE); // quais imagens serão aceitas
		
		$i = 0;
		
		foreach($arquivos as $img){ // conta a quantidade de imagns  
                    $i++;
		}

?>
<!doctype html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/escolher.css">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Escolha suas fotos</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

 
</head>

<body>

    <?php include '../../repositorios/menuUsuario.php';    menuUsuario($link,$path,$inicial,$escolha,$payment,$download); // menu usuario    ?>
    
    
    <section class="container-fluid text-center">
        <h3>Escolha Suas fotos:</h3>


        <form action="" method="POST">
            <?php

            // se usuario ja fez uma escolha de foto antes ele da um aviso ao usuario
            
                if($qtde>0){
                    echo "<div class='container' style='width=50px;background-color:#ff5555;border-radius: 5px;'><p style='color:#fff'>Você ja fez uma escolha anterior, refazer as escolhas irá substituir a escolha feita anteriormente.</p></div>";
                }
            ?>

            <div class="fixo">
                <div class="row">
                    <div class="col-sm-4">Preço\foto:</div>
                    <div class="col-sm-4">Valor base:<span id="base"><?php echo $valor_base;?></span></div>
                    <div class="col-sm-4">Valor Total:<span id="result"></span></div>
                </div>
            </div>
            <div class="row">



             <?php
             
                        if($i==0){ // se $i==0 ele avisa q o upload das fotos dele nao foram feitas ainda
                            echo "
                                    <div class='col-sm-6 col-md-4'>
                                      <div style='width=50px;background-color:#ff5555;padding:5px;'><p style='color:#fff'>Suas fotos ainda não foram disponibilizadas para escolha.</p></div>
                              </div>
                            ";
			}else{
                            
                            // faz o print das imagens e suas estruturas de acordo com a quantidade de fotos lidas ao carregar a pag
			
                            for($j=1;$j<$i;$j++){
                                echo"
                                         <div class='col-sm-6 col-md-4'>
                                          <a href='#img00$j' style='text-decoration:none'>
                                          <div class='card'>

                                                  <img class='card-img-top' src='$pasta"."img ($j).jpg'>
                                                  <div class='card-body'>
                                                  <label class='btn btn-info'>Escolher <input type='checkbox' id='info' class='badgebox'  name='img$j' value='{$valor_foto}'><span class='badge badge-light'>&check;</span></label>
                                                        <!--<label class='check'>Escolher
                                                                <input class='' type='checkbox' name='img$j' value='{$valor_foto}'>
                                                                
                                                        </label>-->
                                                  </div>

                                          </div>
                                        </a>
                                  </div>
                                ";
                            }
                            echo "</div><input type='submit' value='Confirmar' id='enviar' name='enviar'>";
                            

                            // faz o print do ligthbox referante a cada foto
        
                            for($j=0;$j<$i;$j++){
                                echo"
                                    <a href='#_' class='lightbox' id='img00$j'>
                                            <div> 
                                                <img class='medium' src='$pasta"."img ($j).jpg'/> 
                                            </div>
                                    </a>
				";
                            }
                        }
				
	if(isset($_POST['enviar'])){
	    if($qtde>=0)
	        $qtde=0;
		$foto=0;
		for($i=0;$i<$j;$i++){
                        if(!isset($_POST["img$i"])){
                            $_POST["img$i"]=false;
                            $condicao=$_POST["img$i"];
                            echo $condicao;
                        }else{
                            $condicao=$_POST["img$i"];

                            //echo $condicao;
                            if($condicao==true){
                                $foto.=(" img($i),      \n");
                                $qtde++;
                            }
                        }


		}
		if($qtde>0){
                    // CRIA UM ARQUIVO TXT COM AS FOTOS SELECIONADAS
                    /*  $fp = fopen("$pasta fotos.txt", "a");

                        // Escreve "exemplo de escrita" no bloco1.txt
                        $escreve = fwrite($fp,$foto);

                        // Fecha o arquivo
                        fclose($fp);
                    */
                    $a= new AlbunsVO();
                    $albumDAO=new AlbunsDAO();

                    $a->setEscolhas($foto);
                    $a->setQtdeFotos($qtde);
                    $a->setValorTotal(($qtde*$valor_foto)+$valor_base);
                    $a->setIdPessoa($id);

                    $result=$albumDAO->updateEscolhas($a,$conexao);

                    if($result==1){
                        echo "<div class='text-center' style='background-color:palegreen;padding:5px;border-radius:5px'><p style='color:#000'>Sucesso $qtde fotos foram selecionadas.</p></div><br>";
                        echo "<a href='../pagamento' id='pagamento' class='btn-primary'>Pagamento</a>";
                    }
		}else{
                    echo "<div class='text-center' style='background-color:#ff5555;padding:5px;border-radius:5px'><p style='color:#000'>Erro: selecione pelo menos uma foto.</p></div>";

                }
	}

        
    
			 ?>
        
            
        </form>
    </section>

   <?php include '../../repositorios/rodape.php';rodape();?>


    <script src="../../js/bootstrap.js"></script>
    <script src="../../js/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="../../js/soma.js"></script>
</body>
</html>