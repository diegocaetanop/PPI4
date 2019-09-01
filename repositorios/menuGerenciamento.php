<?php

function menuGerenciamento($path,$home,$clientes,$cadastro_cliente,$add_fotos,$alt_preco){
    echo"
        <nav class='navbar fixed-top navbar-expand-lg color-font bg-color'>
        
        <div class='conteiner container'>
        
            <a class='scroll navbar-brand' href='$home'><img src='$path"."img/LuisVinicius.png' id='logo' style='width: 60px;' alt='luis vinicius fotografias'>PPI</a>
            <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSite'> 

                <span class='navbar-toggler-icon'></span>

            </button>

            <div class='collapse navbar-collapse' id='navbarSite'>
                    <ul class='navbar-nav mr-auto'>
                        <li class='dropdown'>
                            <a class='alink dropdown-toggle' href='#' data-toggle='dropdown' id='navDrop'><i class='fas fa-users'></i> Clientes</a>
                            <div class='dropdown-menu'>
                                <a id='a' class='dropdown-item' href='$clientes'> Clientes</a>
                                <a id='a' class='dropdown-item' href='$cadastro_cliente'>Cadastrar Clientes</a>
                                <a id='a' class='dropdown-item' href='$clientes'>Editar Clientes</a>
                                <a id='a' class='dropdown-item' href='$clientes'>Excluir Clientes</a>
                            </div>
                        </li>
                        <li class='dropdown'>
                            <a class='alink dropdown-toggle' href='#' data-toggle='dropdown' id='navDrop'><i class='fas fa-images'></i> Fotos</a>
                            <div class='dropdown-menu'>
                                <a id='a' class='dropdown-item' href='$add_fotos'>Adicionar fotos de clientes</a>
                                <a id='a' class='dropdown-item' href='$alt_preco'>Alterar preço por fotos</a>
                            </div>
                        </li>
                        <!--<li class='dropdown'>
                            <a class='alink dropdown-toggle' href='#' data-toggle='dropdown' id='navDrop'><i class='fas fa-image'></i> Fotos do Site</a>
                            <div class='dropdown-menu'>
                                <a id='a' class='dropdown-item' href='http://localhost/ppi4sem/gerenciamento/upload_carrossel.php'>Fotos Carrossel Site</a>
                                <div class='dropdown-divider'></div>
                                <a id='a' class='dropdown-item' href='http://localhost/ppi4sem/gerenciamento/upload_casamentos.php'>Fotos Casamentos</a>
                                <a id='a' class='dropdown-item' href='http://localhost/ppi4sem/gerenciamento/upload_banner_casamentos.php'>Fotos Banner Casamentos</a>
                                <div class='dropdown-divider'></div>
                                <a id='a' class='dropdown-item' href='http://localhost/ppi4sem/gerenciamento/upload_books.php'>Fotos Books</a>
                                <a id='a' class='dropdown-item' href='http://localhost/ppi4sem/gerenciamento/upload_banner_books.php'>Fotos Banner Books</a>
                                <div class='dropdown-divider'></div>
                                <a id='a' class='dropdown-item' href='http://localhost/ppi4sem/gerenciamento/upload_formaturas.php'>Fotos Formaturas</a>
                                <a id='a' class='dropdown-item' href='http://localhost/ppi4sem/gerenciamento/upload_banner_formaturas.php'>Fotos Banner Formaturas</a>
                                <div class='dropdown-divider'></div>
                                <a id='a' class='dropdown-item' href='http://localhost/ppi4sem/gerenciamento/upload_outros.php'>Outros Produtos</a>
                                <a id='a' class='dropdown-item' href='http://localhost/ppi4sem/gerenciamento/upload_banner_outros.php'>Fotos Banner Outros</a>
                            </div>
                        </li>-->
                        <li class='dropdown'>
                            <a class='alink dropdown-toggle' href='#' data-toggle='dropdown' id='navDrop'><i class='far fa-calendar-alt'></i></i> Eventos</a>
                            <div class='dropdown-menu'>
                                <a id='a' class='dropdown-item' href='http://localhost/ppi4sem/gerenciamento/eventos.php'>Cadastrar Eventos</a>
                
                            </div>
                        </li>
                        
                        <li class='dropdown'>
                            <a class='alink dropdown-toggle' href='#' data-toggle='dropdown' id='navDrop'><i class='fas fa-clipboard-list'></i> Ordens de Serviço</a>
                            <div class='dropdown-menu'>
                                <a id='a' class='dropdown-item' href='ordem.php'>Listar Ordens</a>

                            </div>
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