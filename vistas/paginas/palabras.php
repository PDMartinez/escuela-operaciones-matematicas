<header class="tm-header" id="tm-header">

        <div class="tm-header-wrapper">

            <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="tm-site-header">
                <div class="mb-3 mx-auto tm-site-logo"><i class="fa fa-book fa-3x"></i></div>
                <h2 class="text-center">TRADUCTOR GUARANI - ESPAÑOL</h2>
            </div>

            <hr>

            <nav class="tm-nav" id="tm-nav">  

                <ul>

                    <li class="tm-nav-item">
                        <a href="inicio" class="tm-nav-link">
                            <i class="fas fa-home"></i>
                            Inicio
                        </a>
                    </li>

                    <li class="tm-nav-item active">
                        <a href="palabras" class="tm-nav-link">
                            <i class="fas fa-pen"></i>
                            Diccionario de Palabras
                        </a>
                    </li>

                    <!-- <li class="tm-nav-item">
                        <a href="imagenes" class="tm-nav-link">
                            <i class="fas fa-users"></i>
                            Diccionario de Imagenes
                        </a>
                    </li> -->

                    <li class="tm-nav-item">
                        <a href="contacto" class="tm-nav-link">
                            <i class="far fa-comments"></i>
                            Contacto
                        </a>
                    </li>

                </ul>

            </nav>

            <div class="tm-mb-65">

                <a rel="nofollow" href="https://fb.com/templatemo" class="tm-social-link">
                    <i class="fab fa-facebook tm-social-icon"></i>
                </a>

                <a href="https://twitter.com" class="tm-social-link">
                    <i class="fab fa-twitter tm-social-icon"></i>
                </a>

                <a href="https://instagram.com" class="tm-social-link">
                    <i class="fab fa-instagram tm-social-icon"></i>
                </a>

                <a href="https://linkedin.com" class="tm-social-link">
                    <i class="fab fa-linkedin tm-social-icon"></i>
                </a>

            </div>

            <p class="tm-mb-80 pr-5 text-white">
                Esta es una aplicación que tiene la finalidad de corregir palabras del idioma Guaraní y traducirlos al Español
            </p>
        </div>
        
</header>

    <div class="container-fluid" style="background-color:#E9EBEC;">
        <main class="tm-main">
            <!-- Search form -->
            <div class="row tm-row">
                <div class="col-12">
                    <form method="GET" class="form-inline tm-mb-80 tm-search-form">                
                        <input class="form-control tm-search-input" name="txtBuscar" id="txtBuscar" type="text" placeholder="Buscar por nombre..." aria-label="Search" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        <button class="tm-search-button" type="button" id="btnBuscar">
                            <i class="fas fa-search tm-search-icon" aria-hidden="true"></i>
                        </button>                                
                    </form>
                </div>                
            </div>            

            <div class="row tm-row" class="margin-auto">

                <div class="col-lg-12 tm-post-col">

                    <h2 class="tm-color-primary tm-post-title">Listado de Palabras</h2>
                    <hr class="tm-hr-primary tm-mb-45">

                    <div id="listadoPalabra">

                        <p style="display: block;" id="listando">
                            <font style="vertical-align: inherit;">Listando datos...</font>
                        </p> 


                    </div>

                               
                </div>

            </div>

            <?php

                    include "footer.php";

            ?>

        </main>

    </div>

<script src="vistas/js/palabras.js"></script>
