<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>@yield('titulo', 'Início')</title>
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    <?php 
        ;

        $usuario
    ?>
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> &nbsp @yield('titulo_pagina')</div>
        <!--<div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>-->
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
                <a href="#" class="nav_logo"> 
                    <img src="" class="img-sidebar"
                        id="logo_sidebar">
                </a>

                <div class="nav_list"> 
                    <a href="{{ route('inicio') }}" class="nav_link">
                        <i class="bi bi-house-door-fill nav_icon"></i>
                        <span class="nav_name">Início</span>
                    </a>
                    
                    <a href="{{ route('clientes.index') }}" class="nav_link"> 
                        <i class='bx bx-user nav_icon'></i> 
                        <span class="nav_name">Clientes</span> 
                    </a> 
                    
                    @if (\Illuminate\Support\Facades\Auth::user()->administrador == 1)
                        <a href="{{ route('produtos.index') }}" class="nav_link"> 
                            <i class='bx bxs-package nav_icon'></i> 
                            <span class="nav_name">Produtos</span> 
                        </a> 

                        <a href="{{ route('fornecedores.index') }}" class="nav_link">     
                            <i class='bi bi-truck nav_icon'></i> 
                            <span class="nav_name">Fornecedores</span> 
                        </a> 
                        
                        <a href="{{ route('funcionarios.index') }}" class="nav_link"> 
                            <i class='bi bi-briefcase nav_icon'></i> 
                            <span class="nav_name">Funcionários</span> 
                        </a> 
                    @endif
                    
                    <a href="{{ route('vendas.carrinho') }}" class="nav_link">
                        <i class='bi bi-cart nav_icon'></i> 
                        <span class="nav_name">Vendas</span> 
                    </a> 
                </div>
            </div> 
            
            <a href="{{ route('login.logout') }}" class="nav_link">
                 <i class='bx bx-log-out nav_icon'></i> 
                 <span class="nav_name">Logout</span> 
            </a>
        </nav>
    </div>




    <!--Container Main start-->
    <div class="height-100 container-main">
        @yield('content')
    </div>
    <!--Container Main end-->





    <script>
        document.addEventListener("DOMContentLoaded", function(event) 
        {
            const showNavbar = (toggleId, navId, bodyId, headerId, logosidebarId) =>{
            const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId),
            logosidebar = document.getElementById(logosidebarId)
        
            // Validate that all variables exist
            if(toggle && nav && bodypd && headerpd)
            {
                toggle.addEventListener('click', ()=>{
                // show navbar
                    nav.classList.toggle('show')
                    // change icon
                    toggle.classList.toggle('bx-x')
                    // add padding to body
                    bodypd.classList.toggle('body-pd')
                    // add padding to header
                    headerpd.classList.toggle('body-pd')

                    if (logosidebar.getAttribute('src') == '/View/Assets/Img/Geral/logo.png')
                    {
                        logosidebar.setAttribute('src', '/View/Assets/Img/Geral/logo_icone_branca.png');
                    } 
                    else if (logosidebar.getAttribute('src') == '/View/Assets/Img/Geral/logo_icone_branca.png')
                    {
                        logosidebar.setAttribute('src', '/View/Assets/Img/Geral/logo.png');
                    }
                    
                })
            }
        }
        
        showNavbar('header-toggle','nav-bar','body-pd','header','logo_sidebar')
        
        /*===== LINK ACTIVE =====*/
        const linkColor = document.querySelectorAll('.nav_link')
        
        function colorLink()
        {
            if(linkColor)
            {
                linkColor.forEach(l=> l.classList.remove('active'))
                this.classList.add('active')
            }
        }

        linkColor.forEach(l=> l.addEventListener('click', colorLink))
            // Your code to run since DOM is loaded and ready
        });
    </script>
    
</body>
</html>
