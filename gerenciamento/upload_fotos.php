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
    <title>Carrossel</title>
</head>

<body>
    <?php include '../repositorios/menuGerenciamento.php';    menuGerenciamento($path,$home,$clientes,$cadastro_cliente,$add_fotos,$alt_preco);//menu gerenciamento?>
    
    
    <section class="container-fluid">
        <h3>Insira as fotos do Cliente:</h3>
        <?php
            if(isset($_POST['enviar'])){
                $nome=$_POST['nome'];
                $id=$_POST['id'];
                $preco=$_POST['preco_base'];
                
                include '../PhpOO/AlbunsVO.php'; // inclui a classe albuns
                include '../PhpOO/AlbunsDAO.php';
                
                $a=new AlbunsVO();
                $albumDAO=new AlbunsDAO();
                //$a->setIdAlbum();
                $a->setIdPessoa($id);
                $a->setNome($nome.$id);
                $a->setValorBase($preco);
                
                /*$id_album=$a->getId_album();
                $id_cliente=$a->getId_cliente();
                $nome_album=$a->getNome_album();
                $preco_base=$a->getPreco_base();*/

                $nome_album=strtoupper($a->getNome());
                $diretorio="../Albuns/$nome_album";
                
                // se diretorio nao existe ele cria e faz uma insert no banco com as informações do album vinculado ao cliente
                if(!is_dir($diretorio)){
                    mkdir("../Albuns/$nome_album");
                    $retorno=$albumDAO->create($a,$conexao);
                    if($retorno==true)
                        echo "<div class='text-center' style='background-color:palegreen;padding:5px;border-radius:5px;margin-bottom:10px'><p style='color:#fff'>Sucesso ao criar album.</p></div><br>";
                    else
                        echo "<div class=\"alert alert-primary\" role=\"alert\">Erro ao criar album.</div><br>";;
                }else{
                    // se exite ele so faz um update do preco base do album

                    $result= $albumDAO->update($a,$conexao);
                    if($result==true)
                        echo"<div class='text-center' style='background-color:palegreen;padding:5px;border-radius:5px;margin-bottom:10px'><p style='color:#fff'>Sucesso ao atualizar preço do album</p></div>";
                    else
                        echo "<div class=\"alert alert-primary\" role=\"alert\">Erro ao atualizar</div><br>";
                }
                
              
                if(!is_dir($diretorio)){ 
                    echo "Pasta $diretorio nao existe";
                }else{
                    
                    // arquivo recebe as fotos pelo FILES
                    $arquivo = isset($_FILES['foto']) ? $_FILES['foto'] : FALSE;
                    include '../repositorios/uploadFotos.php';// inclui a função encarregada pelo upload
                    uploadZip($arquivo,$diretorio);// usa a função passando os arquivos e o destino como paramentro
                    extractFoto($diretorio);
                     
                }
            }    
    
        ?>
            <div class="row justify-content-sm-center">
              <?php
		        include'../PhpOO/PessoaVO.php';
		        include '../PhpOO/PessoaDAO.php';
		        $pessoaVO=new PessoaVO();
		        $pessoaDAO=new PessoaDAO();

		        $pessoaVO->setIdPessoa($id=$_GET['cod']);

		        $client=$pessoaDAO->selectClientSpecific($pessoaVO,$conexao);

		        foreach ($client as $clientes){
		            $id=$clientes->getIdPessoa();
                    $nome=$clientes->getNome();
                    $telefone=$clientes->getTelefone();
                    $email=$clientes->getEmail();
                    $endereco=$clientes->getEndereco();
                    echo "<div class='col-sm-6 col-md-4'>

                                  <div class='card' style='color:#000'>
                                        <h6>Nome: $nome </h6>
                                        <h6>Email: $email </h6>
                                        <h6>Endereço: $endereco </h6>
                                        <h6>Numero: $telefone </h6>
                                        <div>
                                            <form action='' method='post' enctype='multipart/form-data'>
                                                <div id='passaValor'>
                                                   <input type='number' value='$id' id='editar' name='id'>
                                                   <input type='text' value='$nome' id='editar' name='nome'>
                                                </div>
                                                <label>Preço base deste album:</label>
                                                <input type='number' name='preco_base' placeholder='100.00' step='0.01' required><br>
                                               <input type='file' name='foto[]' multiple='multiple' >
                                               
                                               <input type='submit' value='Enviar' name='enviar' class='btn btn-info'>
                                            </form>
                                       </div>
                                  </div>

                            </div>"
                    ;
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