<?php

function menuUsuario($link,$path,$inicial,$escolha,$payment,$download){
    echo"
        <nav class='navbar fixed-top navbar-expand-lg color-font bg-color'>
        
        <div class='conteiner container'>
        
            <a class='scroll navbar-brand' href='$inicial'><img src='$path"."img/LuisVinicius.png' id='logo' style='width: 60px;' alt='luis vinicius fotografias'>PPI</a>
            <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSite'> 

                <span class='navbar-toggler-icon'></span>

            </button>

            <div class='collapse navbar-collapse' id='navbarSite'>
                    <ul class='navbar-nav mr-auto'>
                        <li class='nav-item'>
                            <a class='scroll nav-link' href='$inicial'><i class='fas fa-home'></i> Inicio</a>
                        </li>
                        <li class='nav-item'>
                            <a class='scroll nav-link' href='$escolha"."escolher'><i class='fas fa-images'></i> Escolher Fotos</a>
                        </li>
                        <li class='nav-item'>
                            <a class='scroll nav-link' href='$payment"."pagamento'><i class='fas fa-shopping-cart'></i> Pagamento</a>
                        </li>
                        <li class='nav-item'>
                            <a class='scroll nav-link' href='$download"."baixar-fotos'><i class='fas fa-download'></i> Baixar Fotos</a>
                        </li>
                        
                    </ul>
                    
                    <ul class='navbar-nav ml-auto'>
                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='#' data-toggle='dropdown' id='navDrop'><i class='fas fa-cogs'></i> Opçoes</a>
                            <div class='dropdown-menu'>
                                <a id='a' class='dropdown-item' href='http://localhost/ppi4sem/repositorios/logout.php'><i class='fas fa-sign-out-alt'></i> Sair</a>
                            </div>
                        </li>
                    </ul>
                    
                </div>
        </div>
    </nav>
    ";
}

