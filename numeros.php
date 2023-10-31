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
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./style2.css">
   <link rel="stylesheet" href="./style3.css">
    <link rel='stylesheet' href='https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css'><link rel="stylesheet" href="./style2.css">
    <link rel="stylesheet" href="gotop.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   
    <title>Sistema Aprendizaje</title>
    <link rel="icon" href="./sistema/vistas/img/plantilla/aprendizaje_logo.png">
  </head>
  <header class="header" id="header">
	<nav class="navbar container">
		<a href="./index.php" class=""><h3>Ir a Inicio</h3></a>
		<div class="menu" id="menu">
			<ul class="menu-list">
				<li class="menu-item">
					<a href="./index.php" class="menu-link is-active">
						<i class="menu-icon ion-md-home"></i>
						<span class="menu-name">INICIO</span>
					</a>
				</li>
				<?php
			    require_once 'conexion.php'; // Incluir el archivo de conexión
			    
			    $tareas = $conexion->prepare("SELECT * FROM materias");
			    $tareas->execute();
			    
			    $resultados = $tareas->fetchAll(PDO::FETCH_ASSOC);
			    
			    foreach ($resultados as $key => $value) {
			                        
			      echo '
			      			<li class="menu-item">
										<a href="./numeros.php?id='.$value["id_materia"].'" class="menu-link">
					          <i class="menu-icon ion-md-hand"></i>
											<span class="menu-name">'.$value["descripcion_materia"].'</span>
										</a>
									</li>
								 ';
			    }
				?>
			</ul>
		</div>
		<?php
			if (isset($_GET['id'])) {
			  $id = $_GET['id'];
				echo'<a href="./trivia/index.php?id='.$id.'"><span class="parpadea text"><i class="menu-icon ion-md-notifications"></i><strong> PRACTICAR</strong></a><strong></strong>';
			}
		?>
	</nav>
</header>
  <body>


<div class="container">

  <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0"><img src="images/num_header2.png" width="339" height="147" alt=""/>&nbsp; &nbsp;</h1>
	
	<hr class="mt-2 mb-5">

	<h3 class="text-primary text-center text">Te presento algunos ejemplos de ejercicios que puede resolver, seleccione cualquiera de ellos para ver el tutorial. BUENA SUERTE!!!</h3>
	<br>
	<hr class="mt-2 mb-5">

	<div class="row text-center text-lg-left">

		<?php
			if (isset($_GET['id'])) {
			    $id = $_GET['id'];
			    require_once 'conexion.php'; // Incluir el archivo de conexión
			    
			    $tareas = $conexion->prepare("SELECT * FROM tareas WHERE id_materia = $id LIMIT 3");
			    $tareas->execute();
			    
			    $resultados = $tareas->fetchAll(PDO::FETCH_ASSOC);

			    foreach ($resultados as $key => $value) {
			      $img_tarea = json_decode($value['img_tarea'], true); // Decodifica a un array asociativo
				    if ($img_tarea !== null) {
				        echo '
				            <div class="col-6 col-md-4 mb-4">
				                <a href="#" data-toggle="modal" class="video" data-target="#modal" data-url="sistema/'.$img_tarea[0].'" keyVideo="'.$value['video_tarea'].'">
				                    <img class="img-fluid z-depth-1 border border-primary" src="sistema/'.$img_tarea[0].'" alt="video">
				                </a>
				            </div>
				        ';
				    }
			    }
			    
			} else {
			    echo "ID no especificado.";
			}
			?>

		<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

          <div class="modal-body mb-0 p-0">
          	<br>
          	<h2 class="text-center" style="color: greenyellow;">VIDEO EXPLICATIVO</h2>
          	<!-- Contenedor del reproductor -->
	          <div class="row">
	            <div class="col-md-12 d-flex justify-content-center" id="playerCabecera">
	              <div id="player" class=""></div>
	            </div>
	          </div>
	          <br>

          </div>

          <div class="modal-footer justify-content-right">
            
            <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4 salir" data-dismiss="modal">X</button>

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

<!-- /.container -->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="script.js"></script>
	<script src="gotop.js"></script>
  <script src="menu.js"></script>
  <script src="https://www.youtube.com/iframe_api"></script>


  <script type="text/javascript">

  	$(document).on("click", ".video", function(){

  		var keyVideo = $(this).attr("keyVideo");

  		$("#player").remove();
		  $("#playerCabecera").append('<div id="player" class=""></div>');
		    
		    var player = new YT.Player('player', {
		            height: '360',
		            width: '640',
		            videoId: `${keyVideo}`, // Reemplaza VIDEO_ID_AQUÍ por el ID del vídeo de YouTube que deseas reproducir
		            playerVars: {
		                'autoplay': 0, // Autoplay 1=activado, 0=desactivado
		                'controls': 1, // Mostrar controles del reproductor
		                'rel': 0, // Evitar videos relacionados al final
		            },
		            events: {
		                // 'onReady': onPlayerReady, // Función a ejecutar cuando el reproductor esté listo
		                // 'onStateChange': onPlayerStateChange // Función a ejecutar cuando cambie el estado del reproductor
		            }
		      });

  	})

  	$(document).on("click", ".salir", function(){
  		$("#player").remove();
  	})
	  	
  </script>

  </body>
</html>