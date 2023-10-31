<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"> -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <!-- <link rel="stylesheet" href="../style2.css"> -->
    <link rel="stylesheet" href="../style3.css">
    <!-- <link rel='stylesheet' href='https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css'><link rel="stylesheet" href="../style2.css"> -->
    <!-- <link rel="stylesheet" href="gotop.css"> -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   
    <title>Sistema Aprendizaje</title>
    <link rel="icon" href="../sistema/vistas/img/plantilla/aprendizaje_logo.png">
  </head>

  <header class="container" id="header" style="text-align: center;">

      <a href="../index.php"><span class="parpadea text"><i class="menu-icon ion-md-notifications"></i><strong> SALIR</strong></a><strong></strong>

  </header>
  
  <!-- <body style="background: url(../images/fondo_index.png) no-repeat fixed center #333;"> -->
    <body>

    <div class="container">

      <!-- <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0"><img src="../images/num_header2.png" width="339" height="147" alt=""/>&nbsp; &nbsp;</h1> -->
      <hr class="mt-2 mb-5">

      <h3 class="text-primary text-lg-left text">SELECCIONE LA RESPUESTA CORRECTA!!!</h3>

      <div class="row text-center text-lg-left mx-auto">

        <?php
          if (isset($_GET['id'])) {
            $id = $_GET['id'];
            require_once '../conexion.php';
            
            $tareas = $conexion->prepare("SELECT * FROM tareas WHERE id_materia = $id ORDER BY RAND() LIMIT 1");
            $tareas->execute();
            
            $resultados = $tareas->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($resultados as $key => $value) {

              $img_tarea = json_decode($value['img_tarea'], true); // Decodifica a un array asociativo

              if ($img_tarea !== null) {

                echo'<div class="col-6 col-md-3 mb-3">
                        <a href="#" data-toggle="modal" class="video" data-target="#modal" data-url="../sistema/'.$img_tarea[0].'">
                            <img class="img-fluid z-depth-1 border border-primary" src="../sistema/'.$img_tarea[0].'" alt="video">
                        </a>
                    </div>';
              }

            }

            echo'<div class="col-4 col-md-4 mb-4">';

            foreach ($resultados as $key => $value) {

              $img_tarea = json_decode($value['img_tarea'], true);

              $min = $value['resultado']-10;
              $max = $value['resultado']+10;
              $cantidad_numeros = 5;

              $numeros_generados = [];

              while (count($numeros_generados) < $cantidad_numeros) {
                  $numero_aleatorio = mt_rand($min, $max);
                  
                  //if (!in_array($numero_aleatorio, $numeros_generados)) {
                    //if (!in_array($value['resultado'], $numeros_generados)) {
                      $numeros_generados[] = $numero_aleatorio;
                    //}
                  //}
              }

              $posicion = mt_rand(0, 4);

              $numeros_generados[$posicion] = $value['resultado'];


              if ($img_tarea !== null) {

                foreach ($numeros_generados as $numero) {
                  
                  echo'<button type="button" class="btn btn-outline-secondary btn-rounded btn-lg mb-2 respuesta" style="font-size: 1.5rem; padding:10px 70px;" data-dismiss="modal" resultado="'.$value['resultado'].'" imgResultado='.$value['img_resultado'].' respuesta="'.$numero.'">'.$numero.'</button>';
                }

              }

            }

          }
        ?>

        <button type="button" class="btn btn-outline-primary btn-rounded btn-lg mb-2 d-none solucion" data-toggle="modal" data-target="#modal" style="font-size: 1.5rem; padding:10px 40px;" data-dismiss="modal">Ver Solución</button>

        </div>

      </div>

      <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center"> <!-- Agregamos la clase "text-center" al modal-body -->
                  <h1>RESPUESTA</h1>
                    <div class="col-6 col-md-6 mb-6 mx-auto"> <!-- Agregamos la clase "mx-auto" para centrar horizontalmente el div -->
                        <a href="#" data-toggle="modal" class="video" data-target="#modal" data-url="../sistema/vistas/img/tareas/8f1a6008d726557e8bbdde3d7f7fcc0e.jpg">
                            <img class="img-fluid z-depth-1 border border-primary" src="../sistema/vistas/img/tareas/default/sinImagen.png" alt="video"> <!-- Quitamos las clases w-100 y h-100 para que la imagen no ocupe todo el ancho y alto -->
                        </a>
                    </div>
                    <br>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4 salir" data-dismiss="modal">X</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Correcta -->
    <div class="modal fade" id="modalCorrecta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center">
                  <h1>RESPUESTA CORRECTA</h1>
                    <div class="col-6 col-md-6 mb-6 mx-auto">
                        <a href="#" data-toggle="modal" class="video" data-target="#modal" data-url="../sistema/vistas/img/tareas/8f1a6008d726557e8bbdde3d7f7fcc0e.jpg">
                            <img class="img-fluid z-depth-1" src="../sistema/vistas/img/tareas/default/correcta.gif" alt="video"> 
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Inorrecta -->
    <div class="modal fade" id="modalIncorrecta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center">
                  <h1>RESPUESTA INCORRECTA</h1>
                    <div class="col-6 col-md-6 mb-6 mx-auto">
                        <a href="#" data-toggle="modal" class="video" data-target="#modal" data-url="../sistema/vistas/img/tareas/8f1a6008d726557e8bbdde3d7f7fcc0e.jpg">
                            <img class="img-fluid z-depth-1" src="../sistema/vistas/img/tareas/default/incorrecta.gif" alt="video"> 
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    </div>

    <div class="go-top-container">
      <div class="go-top-button">
        <i class="fas fa-chevron-up"></i>

      </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="../script.js"></script>
    <script src="../gotop.js"></script>
    <script src="../menu.js"></script>
    <script src="./index.js"></script>

  </body>
</html>