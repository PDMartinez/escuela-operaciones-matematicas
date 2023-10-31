    <header class="tm-header"  id="tm-header">

        <div class="tm-header-wrapper">

            <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="tm-site-header">
                <div class="mb-3 mx-auto tm-site-logo"><i class="fa fa-book fa-3x" ></i></div>
                <h2 class="text-center"><b>TRADUCTOR GUARANI - ESPAÑOL<b></h2>
            </div>

            <hr>

            <nav class="tm-nav" id="tm-nav">  

                <ul>

                    <li class="tm-nav-item active">
                        <a href="inicio" class="tm-nav-link">
                            <i class="fas fa-home"></i>
                            Inicio
                        </a>
                    </li>

                    <li class="tm-nav-item">
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

                <a rel="nofollow" href="#" class="tm-social-link">
                    <i class="fab fa-facebook tm-social-icon"></i>
                </a>

                <a href="#" class="tm-social-link">
                    <i class="fab fa-twitter tm-social-icon"></i>
                </a>

                <a href="#" class="tm-social-link">
                    <i class="fab fa-instagram tm-social-icon"></i>
                </a>

                <a href="#" class="tm-social-link">
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

                            <h1 class="tm-color-primary" style="color: #000;"><center><b>Traductor y Corrector de Palabras Guarani - Español</b></center></h1>

                            <hr class="tm-hr-primary tm-mb-45">
                            <br>

                            <div class="mb-4">
                                <center>
                                    <button class="tm-btn tm-btn-primary tm-btn-small btn-sm butt-mesas letra">Ã</button>
                                    <button class="tm-btn tm-btn-primary tm-btn-small btn-sm butt-mesas letra">Ẽ</button>
                                    <button class="tm-btn tm-btn-primary tm-btn-small btn-sm butt-mesas letra">Ĩ</button>
                                    <button class="tm-btn tm-btn-primary tm-btn-small btn-sm butt-mesas letra">Ñ</button>
                                    <button class="tm-btn tm-btn-primary tm-btn-small btn-sm butt-mesas letra">Õ</button>
                                    <button class="tm-btn tm-btn-primary tm-btn-small btn-sm butt-mesas letra">Ũ</button>
                                    <button class="tm-btn tm-btn-primary tm-btn-small btn-sm butt-mesas letra">Ỹ</button>
                                </center>
                            </div>

                            <div class="form-inline tm-mb-80 tm-search-form row">

                                <input class="form-control tm-search-input" name="buscador" id="buscador" type="text" placeholder="INGRESE UNA PALABRA" aria-label="Search" style="text-transform:uppercase;" value="" onkeyup="javascript:this.value=this.value.toUpperCase();">
                            
                                <button class="tm-search-button btnBuscar" type="button">

                                    <i class="fas fa-search tm-search-icon" aria-hidden="true"></i>

                                </button>

                            </div>

                            <hr>

                            <form action="" class="">

                                <div class="col-md-6 col-12 tm-color-gray tm-copyright" style="display: block;" id="mensaje">

                                    <font style="vertical-align: inherit;">

                                        <font style="vertical-align: inherit;">
                                            Mostrando resultados...
                                        </font>

                                    </font>

                                </div>

                                <div style="display: none;" id="respuesta" class="margin-auto">

                                    <h2 class="tm-color-primary tm-post-title mb-10">RESULTADO</h2>

                                    <div class="row tm-row tm-mb-45">
                                        <div class="col-12">
                                            <hr>
                                            <!-- <img src="img/about-01.jpg" alt="Imagen" class="img-fluid"> -->
                                            <img alt="Imagen" alt="Imagen" class="img-fluid foto col-md-8 mx-auto d-block">
                                        </div>
                                    </div>

                                    <!-- <img alt="Imagen" class="img-fluid foto col-md-8 mx-auto d-block"> -->

                                    <div class="row">

                                        <div class="col-lg-6 mx-auto d-block">
                                            <label class="tm-color-primary tituloGuarani"></label>
                                            <input class="form-control" name="guarani" id="guarani" type="text" disabled>
                                        </div>

                                        <div class="col-lg-6 mx-auto d-block">
                                            <label class="tm-color-primary">Traducción al Español:</label>
                                            <input class="form-control" name="espanyol" id="espanyol" type="text" disabled>
                                        </div>

                                    </div>

                                    <div id="oracionPrincipal" class="">

                                        <div class="form-group col-md-12 mx-auto d-block" id="oracion">

                                            <label class="tm-color-primary">Te presento una Oración:</label> 

                                          <textarea class="form-control txtOracion" rows="3" id="txtOracion" name="txtOracion" style="width: 100%" disabled></textarea>

                                        </div>

                                    </div>

                                    <div class="text-right">

                                        <button class="tm-btn tm-btn-primary tm-btn-small btnLimpiar" type="button">Limpiar</button>                        
                                    </div>

                                </div>

                            </form>       
                
                <?php

                    include "footer.php";

                ?>

            </main>

        </div>

        <script src="vistas/js/inicio.js"></script>

        <style type="text/css">
            .butt-mesas {
              -webkit-border-radius: 4;
              -moz-border-radius: 4;
              border-radius: 6px;
              text-shadow: 1px 1px 15px #666666;
              /*font-family: Arial;*/
              color: black;
              /*font-size: 30px;*/
              padding: 10px 13px;
              /*background: #88dd77;*/
              border: solid #000000 1px;
              text-decoration: none;
              margin-bottom: 3px
              /*width: 100%;*/
            }

            .butt-mesas:hover {
              /*background: #9ae288;*/
              text-shadow: 1px 1px 15px #666666;
              text-decoration: none;
            }
        </style>
