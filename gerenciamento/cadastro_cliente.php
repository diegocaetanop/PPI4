<?php
// faz a verificação de login
    include '../repositorios/validaLoginGerenciamento.php';
include '../config.php';
?>
<!doctype html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/cadastro_cliente.css">
    <link rel="stylesheet" href="../css/gerenciamento.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <title>Cadastrar cliente</title>

 
</head>

<body>

    <?php include '../repositorios/menuGerenciamento.php';    menuGerenciamento($path,$home,$clientes,$cadastro_cliente,$add_fotos,$alt_preco);//menu gerenciamento?>
    
    <section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <form action="" method="post" class="formulario-login">
                <h3>Cadastrar cliente</h3>
                
                <?php
                    if(isset($_POST["cadastrar"])){
                        
                        // inclusao e uso da conexao com BD e class cliente
                        
                        include('../PhpOO/conexao.php');
                        include '../PhpOO/PessoaVO.php';
                        include '../PhpOO/PessoaDAO.php';
                        $cliente=new PessoaVO();
                        $clienteDAO=new PessoaDAO();
                        
                        $nomecompleto=$_POST['nome_completo'];
                        $cpf=$_POST['cpf'];
                        $email=$_POST['email'];
                        $endereco=$_POST['endereco'];
                        $numero=$_POST['numero'];
                        $senha1=$_POST['senha1'];
                        $senha2=$_POST['senha2'];
                        
                        // verifica e a senha e a confirmação de senha correspondem
                        if($senha1!=$senha2){
                            echo "<div style='width=50px;background-color:#ff5555;padding:5px;border-radius:10px;'><p style='color:#fff'>Falha no cadastro as senhas não correspondem.</p></div>";
                        } else {

                            // inclui função de criptografia de senhas
                            include '../repositorios/criptoSenha.php';

                            $cliente->setNome($nomecompleto);
                            $cliente->setCpf($cpf);
                            $cliente->setEmail($email);
                            $cliente->setEndereco($endereco);
                            $cliente->setTelefone($numero);
                            $cliente->setSenha(criptoSenha($senha1));

                            $result=$clienteDAO->create($cliente,$conexao);

                            if($result == true){
                                echo "<div class='text-center' style='background-color:palegreen;padding:5px;border-radius:5px'><p style='color:#000'>Cliente cadastrado com successo.</p></div>";
                                //inclui função de enviar email
                                include '../repositorios/email.php';
                                // envia email para o cliente confirmando cadastro
                                enviaEmail($email, $nomecompleto,$senha1);
                            }else {
                                echo "<div class='text-center' style='background-color:#ff5555;padding:5px;border-radius:5px'><p style='color:#000'>Falha ao cadastrar cliente.</p></div>";

                            }
                        }
                    }
                ?>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nome Completo:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nome_completo" name="nome_completo" placeholder="João da Rosa" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">CPF:</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="cpf" name="cpf" placeholder="01999023354" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="exemplo@gmail.com" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Numero celular: (com DDD)</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="numero" name="numero" placeholder="55999557722" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Endereço com numero:(opcional)</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Rua Marechal Floriano - 530">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Senha para Login:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="senha1" name="senha1" placeholder="Sua senha" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Confirme sua senha:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="senha2" name="senha2" placeholder="Sua senha" required>
                    </div>
                </div>
                  
                <input type="submit" value="Cadastrar" class="enviar btn-info" name="cadastrar">
            </form>
        </div>
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