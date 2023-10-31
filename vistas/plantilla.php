
<?php

    $ruta = ControladorRuta::ctrRuta();
    $servidor = ControladorRuta::ctrServidor();

    // var_dump($ruta);
    // return;
    
?>

<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Traductor</title>
        <link rel="icon" href="vistas/img/plantilla/paraguayLogo.png">

        <link rel="stylesheet" href="assets/fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/templatemo-xtra-blog.css" rel="stylesheet">

        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/templatemo-script.js"></script>

        <!-- CKEDITOR -->
        <!-- https://ckeditor.com/ckeditor-5/#classic -->
        <script src="sistema/vistas/js/plugins/ckeditor.js"></script>

    </head>

    <body>

        <?php

            /*===========================================
                CABECERA Y MENU LATERAL
            ============================================*/

            // include "paginas/inicio.php";

            /*===========================================
                PAGINA DE INICIO
            ============================================*/

            if(isset($_GET["ruta"])){

                if($_GET["ruta"] == "inicio" ||
                    $_GET["ruta"] == "palabras"){

                    include "paginas/".$_GET["ruta"].".php";

                }

            }else{

                echo '<script>

                window.location = "'.$ruta.'";

                </script>';


            }


        ?>

    <script src="vistas/js/plantilla.js"></script>

    </body>

</html>