<!doctype html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bootstrap.css">

    <title>Login</title>

</head>

<body>

    <!-- Barra de navegação -->
    <nav class="navbar fixed-top navbar-expand-lg color-font bg-color">
        
        <div class="conteiner container">
        
            <a class="scroll navbar-brand" href="http://localhost/ppi4sem/">PPI</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite"> 

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarSite">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="scroll nav-link" href="../">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="scroll nav-link" href="../index.php#sobre">Sobre</a>
                        </li>
                        <li class="nav-item">
                            <a class="scroll nav-link" href="../index.php#servico">Serviços</a>
                        </li>
                        <li class="nav-item">
                            <a class="scroll nav-link" href="../index.php#contatos">Contatos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Login</a>
                        </li>
                    </ul>
                    
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">Social</a>
                            <div class="dropdown-menu">
                                <a id="a" class="dropdown-item" target="_blank" href="https://www.facebook.com/luistochero/">Facebook</a>
                            </div>
                        </li>
                    </ul>
                    
                </div>
        </div>
    </nav>
    <!-- Fim da Barra de navegação -->

    <div id="login">
        <div class="container-fluid">

            <div class="row justify-content-center">

                <form action="" method="post" class="formulario-login">
                    <h3>Login</h3>
                    <?php

                    
			if(isset($_POST['logar'])){
                            
                            include '../PhpOO/conexao.php';

                            // função para evitar possiveis hacks
                            function clear($input){
                                global $conexao;
                                //sql
                                $var= mysqli_escape_string($conexao, $input);
                                //xss
                                $var= htmlspecialchars($var);
                                return $var;
                            }


                            $email= clear($_POST['email']);
                            $senha= clear($_POST['senha']);
                            
                            // inclui a conexao com o BD
                            
                            
                            // inclui a classe cliente
                            include '../PhpOO/PessoaVO.php';
                            include '../PhpOO/PessoaDAO.php';
                            
                            $pessoaVO=new PessoaVO();
                            $pessoaDAO=new PessoaDAO();
                            
                            $pessoaVO->setEmail($email);
                            $pessoaVO->setSenha($senha);

                            $retorno=$pessoaDAO->loginCliente($pessoaVO, $conexao);
                            if($retorno==1){
                                header('location:../cliente');
                            }
			}
			
?>
                        <label>Email:.</label>
                        <input type="text" id="email" name="email" placeholder="jao@gmail.com" class="input" required>
                        <br>
                        <label>Senha:</label>
                        <input type="password" id="senha" name="senha" placeholder="Senha de Usuário" class="input" required>
                        <br>
                        <input type="submit" value="Entrar" class="enviar btn btn-lg btn-info" name="logar">
                </form>
            </div>
        </div>
    </div>
    <footer>
        <div class="contatoRodape justify-content-center">
            <div id="divRodape">
                <h6>
                    <a class="a" href="https://www.facebook.com/luistochero/">Facebook</a>
                </h6>
                <h6>
                    <a class="a" href="#">Instagram</a>
                </h6>
                <h6>E-mail: luisvinicius@hotmail.com</h6>
            </div>
            <div id="divRodape2">
                <h6>Telefone: xx xxxxx-xxxx</h6>
                <h6>Celular: xx xxxxx-xxxx</h6>
                <h6>Endereço: xxxxxx xxxxxxx xxxxxx xxxxxxxxx</h6>
            </div>
        </div>
        <p id="pFooter">Desenvolvido por
            <a href="#" class="a">Alisson Stochero</a>
        </p>
    </footer>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>

</body>

</html>