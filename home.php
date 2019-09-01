<!doctype html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ"
        crossorigin="anonymous">
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <title>Luis Vinicius Fotografias</title>



</head>

<body>
    <!-- tirar apartir do body para desbloquer click direito do mouse -->

    <?php

    include 'config.php';
    include './repositorios/menuSite.php'; menuSite($path); /* menu site*/ ?>

    <header id="home">
        <!--  Carrossel -->
        <div id="carrossel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="8000" >
            <ol class="carousel-indicators">
                <li data-target="#carroussel" data-slide-to="0" class="active"></li>
                <li data-target="#carroussel" data-slide-to="1"></li>
                <li data-target="#carroussel" data-slide-to="2"></li>
                <li data-target="#carroussel" data-slide-to="3"></li>

            </ol>
            <div class="carousel-inner">
                <div id="conteudo" class="carousel-caption d-none d-sm-block">
                    <h1 id="carrossel" class='wow fadeInDown' data-wow-delay='.5s'>Luis Fotografias</h1>
                    <h3 id="carrossel" class='wow fadeInLeft' data-wow-delay='.5s'>Eternizando seus melhores momentos.</h3>
                    <p class='wow fadeInUp' data-wow-delay='.5s' id='carrossel'>Eternizando o seu melhor momento. Reserve sua data e venha fazer uma visita</p>
                </div>
                <div class="carousel-item active">
                    <img src="img/carrossel/img0.jpg" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="img/carrossel/img1.jpg" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="img/carrossel/img2.jpg" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="img/carrossel/img3.jpg" class="d-block w-100">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carrossel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carrossel" role="button" data-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="sr-only">Proximo</span>
            </a>
        </div>
    </header>

    <div class="sobre" id="sobre">
        <div class="texto">
            <h3>Sobre</h3>
            <hr style="height: 1px; background-color:#2E3842;">
            <p class="pSobre wow fadeInLeft">
                Com muito amor, carinho e qualidade, nosso objetivo é registrar seus melhores momentos de forma sutil, inovando e fugindo do tradicional. Com fotos artísticas, planejadas e tratadas com dedicação, cada momento tem sua vida, sua energia e magia. Cada momento é único, singular. Jamais acontecerá de novo e tem que ser valorizado. Sentimos com intensidade e amor, mas é dificil guardá-los simplesmente na memória. Quando guardamos as imagens destes momentos, os detalhes se perdem e é exatamente ai que eu da Luis Fotografias entro para registrá-los de forma sutíl. Nada melhor que trazer a emoção a tona através da imagem. Sou <strong>Luis Vinicius Stochero</strong>, amo fotografia e a reação que ela provoca nas pessoas.
            </p>
            <p class="pSobre wow fadeInLeft">Entre em contato conosco e agende seu evento.</p>
            <hr style="height: 1px; background-color:#2E3842;">
            <a href="#contatos" class="scroll btn btn-outline-info" title="Entre em contato">Entre em contato</a>
        </div>
        <div class="image">
            <img src="img/vinicius.jpg" alt="imagem Luis Fotografias,Luis Vinicius Stochero" title="Luis Vinicius Stochero">
        </div>
    </div>


    <section class="container-fluid text-center" id="servico">
        <h3>Serviços</h3>
        <br>
        <div class="row justify-content-sm-center">

            <div class="col-sm-6 col-md-6 col-lg-3 wow fadeInLeft" data-wow-duration='1.5s'>
                <a href="casamentos/" style="text-decoration:none" title="Fotos de casamentos">
                    <div class="service card border-info">

                        <img class="card-img-top" src="img/casamento.jpg">
                        <div class="card-body">
                            <h4 class="card-title">Casamentos</h4>
                            <button type="button" class="btn btn-outline-info">Ver mais
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>

                    </div>
                </a>

            </div>

            <div class="col-sm-6 col-md-6 col-lg-3 wow fadeInLeft" data-wow-duration='1.5s'>
                <a href="formaturas/" style="text-decoration:none" title="Foto formaturas">
                    <div class="service card border-info">

                        <img class="card-img-top" src="img/formaturas.jpg">
                        <div class="card-body">
                            <h4 class="card-title">Formaturas</h4>
                            <button type="button" class="btn btn-outline-info">Ver mais
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>

                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 wow fadeInRight" data-wow-duration='1.5s'>
                <a href="books/" style="text-decoration:none" title="Book's">
                    <div class="service card border-info">

                        <img class="card-img-top" src="img/books.jpg">
                        <div class="card-body">
                            <h4 class="card-title">Book's</h4>
                            <button type="button" class="btn btn-outline-info">Ver mais
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>

                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 wow fadeInRight" data-wow-duration='1.5s'>
                <a href="outros-produtos/" style="text-decoration:none" title="Foto produtos">
                    <div class="service card border border-info">

                        <img class="card-img-top" src="img/foto-produtos.jpg">
                        <div class="card-body">
                            <h4 class="card-title">Foto Produtos</h4>
                            <button type="button" class="btn btn-outline-info">Ver mais
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>

                    </div>
                </a>
            </div>

        </div>

    </section>


    <div class="text-center" id="social">
        
        <h3>Verifique a disponibilidade na data que deseja.</h3>
        <div class="linha justify-content-sm-center">
            <form method="post" id="eventos">
                <div id="mensagem-evento"></div>
                <input type="date" name="datah">
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>

    <section class="container-fluid text-center" id="contatos">
        <h3>Contato</h3>
        <br>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="border border-info wow fadeInLeft" id="localizacao" data-wow-duration='1.5s' data-wow-delay='0.5s'>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d878.1884121267702!2d-54.27735317081405!3d-28.30578581816092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjjCsDE4JzIwLjgiUyA1NMKwMTYnMzYuNSJX!5e0!3m2!1spt-BR!2sbr!4v1533148131176" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4 class="pb-1 display-4">
                        Fale conosco</h4>
                    <div class="dropdown-divider pb-3"></div>

                    <div>
                        <div class="icon-block pb-3">
                            <span class="icon-block__icon">
                                <span class="mbri-letter mbr-iconfont"></span>
                            </span>
                            <h4 class="icon-block__title align-left mbr-fonts-style display-5">
                                Não hesite em nos contatar</h4>
                        </div>

                        <div class="icon-contacts">
                            <h5 class="align-left mbr-fonts-style display-7">Contato:</h5>
                            <p class=" align-left mbr-fonts-style display-7" id='form'>
                                Celular: 000 0000 001
                                <br> Email: <a href="mailto:luistochero@hotmail.com"> luistochero@hotmail.com</a>
                            </p>
                        </div>
                    </div>
                    <div data-form-type="formoid">
                        <div data-form-alert="" hidden="">Obrigado por entrar em contato.</div>
                        <form class="block mbr-form" action="" method="post">
                            <?php
                            if(isset($_POST['enviar'])){
                                $nome=$_POST['nome'];
                                $celular=$_POST['celular'];
                                $email=$_POST['email'];
                                $mensagem=$_POST['mensagem'];
                                
                                //chama função para enviar mensagem de contato

                                include'./repositorios/emailContato.php';
                                enviaEmail($email,$nome,$celular,$mensagem);
                            }
                        ?>
                                <div class="row">
                                    <div class="col-md-6 multi-horizontal" data-for="name">
                                        <input type="text" class="form-control input" name="nome" data-form-field="nome" placeholder="Seu nome" required="" id="name-form4-11">
                                    </div>
                                    <div class="col-md-6 multi-horizontal" data-for="phone">
                                        <input type="number" class="form-control input" name="celular" data-form-field="celular" placeholder="Celular" required=""
                                            id="phone-form4-11">
                                    </div>
                                    <div class="col-md-12" data-for="email">
                                        <input type="email" class="form-control input" name="email" data-form-field="Email" placeholder="Email" required="" id="email-form4-11">
                                    </div>
                                    <div class="col-md-12" data-for="message">
                                        <textarea class="form-control input" name="mensagem" rows="3" data-form-field="Messagem" placeholder="Mensagem" style="resize:none"
                                            id="message-form4-11"></textarea>
                                    </div>
                                    <div class="input-group-btn col-md-12" style="margin-top: 10px;">
                                        <button type="submit" name="enviar" class="btn btn-outline-success">

                                            Enviar Mensagem
                                            <i class="fas fa-share-square"></i>
                                        </button>
                                    </div>
                                </div>
                        </form>
                    </div>
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





    <script src="jquery-3.2.1.min.js" type="text/javascript"></script>

    <script>
        $(function() {

            // quando o formulario for submetido
            $('form').on('submit', function (e) {
                e.preventDefault(); // ele pega o evento padrão

                //alert("iuiyiuyiuyiuyiuyiuy");
                var datah = $("input[name='datah']").val();

                // aqui começa o ajax
                $.ajax({

                    type: 'POST', // diz q os dados do formulario serão metodo post
                    url: 'http://localhost/ppi4sem/repositorios/searchEvent.php', // diz para onde os dados serão enviados
                    data: {
                        'data_evento':datah
                    },
                    //até aqui, data são os dados do formulário (lado cliente)

                    //abaixo, os dados provém do formulário
                    success: function (data) {

                        data = data.toString(); // converte o conteudo de dados para string
                        data = data.trim();
                        //alert(data);

                        // se os dados foram inseridos com sucesso,
                        if (data =="1") {
                            $("#mensagem-evento").empty();
                            $("#mensagem-evento").append("<div class='alert alert-danger' role='alert'>Desculpe, há um evento marcado para esta data.</div>"); //mostra mesnsagem de successo
                        }



                        if (data == "0") {
                            $("#mensagem-evento").empty();
                            $("#mensagem-evento").append("<div class='alert alert-primary'>A data está livre, entre em contato e marque seu evento.<a href='#contatos' class='scroll btn btn-outline-info' title='Entre em contato'>Entre em contato</a></div>"); //mostra mesnsagem de successo
                        }

                    },
                    error: function (data) {
                        if (data !== "1") {

                            $("#mensagem-evento").empty();
                            $("#mensagem-evento").append("Erro ao processar formulário");
                            //$('#spinner').hide();

                        }

                    }
                })
            });

        });
    </script>
    <script src="js/scrolling.js"></script>

    <script src="js/wow.js"></script>
    <script src="js/wow-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>

</body>

</html>