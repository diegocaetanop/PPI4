<?php

function menuSite($path){
    echo"
        <nav class='navbar fixed-top navbar-expand-lg color-font bg-color'>
        
        <div class='conteiner container'>
        
            <a class='scroll navbar-brand' href='../#home'  title='Luis fotografias'><img src='$path"."img/LuisVinicius.png' id='logo' style='width: 60px;' alt='luis vinicius fotografias'>PPI</a>
            <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSite'> 

                <span class='navbar-toggler-icon'></span>

            </button>

            <div class='collapse navbar-collapse' id='navbarSite'>
                    <ul class='navbar-nav mr-auto'>
                        <li class='nav-item'>
                            <a class='scroll nav-link' href='../#home' title='Inicio'>Inicio</a>
                        </li>
                        <li class='nav-item'>
                            <a class='scroll nav-link' href='../#sobre' title='Sobre'>Sobre</a>
                        </li>
                        <li class='nav-item'>
                            <a class='scroll nav-link' href='../#servico' title='Serviços'>Serviços</a>
                        </li>
                        <li class='nav-item'>
                            <a class='scroll nav-link' href='../#contatos' title='Contato'>Contatos</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='./login' title='login'>Login</a>
                        </li>
                    </ul>
                    
                    <ul class='navbar-nav ml-auto'>
                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='#' data-toggle='dropdown' id='navDrop' title='Sociais'>Social</a>
                            <div class='dropdown-menu'>
                                <a id='a' class='dropdown-item' target='_blank' href='https://www.facebook.com/luistochero/' title='Facebook'>Facebook</a>
                                <a id='a' class='dropdown-item' target='_blank' href='https://www.facebook.com/luistochero/' title='Instagram'>Instagram</a>
                            </div>
                        </li>
                    </ul>
                    
                </div>
        </div>
    </nav>
    ";
}