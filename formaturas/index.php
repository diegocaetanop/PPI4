<?php

$pasta = '../img/Formaturas/'; // acessa a pasta das fotos
    $arquivos = glob("$pasta{*.jpg,*.JPG,*.png,*.gif,*.bmp}", GLOB_BRACE); // quais imagens serão aceitas
    $i = 0;
    foreach($arquivos as $img){ // conta a quantidade de imagns  
	$i++;
    }
?>
<!doctype html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/galeria.css">
    <link rel="stylesheet" href="../css/casamentos.css">
    <link rel="stylesheet" href="../css/escolher.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Formaturas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">

 
</head>

<body>

   <!-- Barra de navegação -->
   <nav class="navbar fixed-top navbar-expand-lg color-font bg-color">

       <div class="conteiner container">

           <a class="scroll navbar-brand" href="../"><img src="../img/LuisVinicius.png" id="logo" style="width: 60px;" alt="luis vinicius fotografias">Luis Fotografias</a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">

               <span class="navbar-toggler-icon"></span>

           </button>

           <div class="collapse navbar-collapse" id="navbarSite">
               <ul class="navbar-nav mr-auto">
                   <li class="nav-item">
                       <a class="scroll nav-link" href="../">Inicio</a>
                   </li>
                   <li class="nav-item">
                       <a class="scroll nav-link" href="../">Sobre</a>
                   </li>
                   <li class="nav-item">
                       <a class="scroll nav-link" href="../">Serviços</a>
                   </li>
                   <li class="nav-item">
                       <a class="scroll nav-link" href="../">Contatos</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="../login">Login</a>
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
    
    <section class="container-fluid text-center">
    <!-- slider -->
        <div class="container">
            
            <div id="carouselExampleControls" class="carousel slide banner" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                      <img class="imgBanner" src="../img/Formaturas/banner/img0.jpg" alt="First slide">
                  </div>
                  <div class="carousel-item">
                      <img class="imgBanner" src="../img/Formaturas/banner/img1.jpg" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                      <img class="imgBanner" src="../img/Formaturas/banner/img2.jpg" alt="Third slide">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
            
        </div>
    <h3>Fotos de formaturas</h3>
        <hr style="height: 1px; background-color:#2E3842;width: 84%">
        <!-- menu -->
        <div class="container mb-3">
            <div class="container mb-3">
                <ul class="nav nav-pills nav-justified">
                    <li class="nav-item mr-2">
                        <a class="nav-link btn btn-outline-info" href="../casamentos">Casamentos</a>
                    </li>
                    <li class="nav-item mr-2">
                        <a class="nav-link btn btn-outline-info active" href="../formaturas">Formaturas</a>
                    </li>
                    <li class="nav-item mr-2">
                        <a class="nav-link btn btn-outline-info" href="../books">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-info" href="../outros-produtos">Outros Produtos</a>
                    </li>
                </ul>
            </div>
        </div>
     <!-- gallery -->
    <div class="container">
        <div class="row justify-content-sm-center">
            <?php
                for($j=0;$j<$i;$j++){
                    echo"
                       <div class='col-sm-6 col-md-4 col-lg-3 item pb-3'><a href='$pasta"."img$j.jpg' data-lightbox='photos'><img class='img-fluid' src='$pasta"."img$j.jpg' alt='foto de formatura'></a></div>
                    ";
                }
            ?>
        </div>
    </div>
    </section>
    
    <footer>
        <div class="contatoRodape justify-content-center">
            <div  id="divRodape">
                <h6><a class="a" href="https://www.facebook.com/luistochero/">Facebook</a></h6>
                <h6><a class="a" href="#">Instagram</a></h6>
                <h6>E-mail: luisvinicius@hotmail.com</h6>
            </div>
            <div id="divRodape2">
                <h6>Telefone: xx xxxxx-xxxx</h6>
                <h6>Celular: xx xxxxx-xxxx</h6>
                <h6>Endereço: xxxxxx xxxxxxx xxxxxx xxxxxxxxx</h6> 
            </div>
        </div>
        <p id="pFooter">Desenvolvido por <a href="#" class="a">Alisson Stochero</a></p>
    </footer>
    
   <script src="../jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
</body>
</html>