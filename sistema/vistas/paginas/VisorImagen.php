<head>
	<!-- <link rel="stylesheet" href="vistas/css/plugins/font-awesome.css"> -->
	<link rel="stylesheet" href="vistas/css/plugins/estilos.css">
	<script src="vistas/js/plugins/main.js"></script>

</head>
	<div class="slideshow">

 
		<ul class="slider">
			
			 <?php 
				 if(isset($_GET["idPasante"])){

				 	$item="ID_PASANTE";
				 	$valor=$_GET["idPasante"];

					$Pasantias = ControladorPasantias::ctrMostrarPasantia($item,$valor);

					// var_dump($Pasantias["FOTOS"]);
				 
				    $galeria = json_decode($Pasantias["FOTOS"], true);
				     }

				  if(isset($_GET["verIdSimposios"])){

				 	$item="ID_SIMPOSIO";
				 	$valor=$_GET["verIdSimposios"];

					$Simposios = ControladorSimposios::ctrMostrarSimposio($item,$valor);

					// var_dump($Simposios["FOTOS"]);
				 
				    $galeria = json_decode($Simposios["FOTOS"], true);
				     }

				      if(isset($_GET["idExtensiones"])){

				 	$item="ID_EXTENSION";
				 	$valor=$_GET["idExtensiones"];

					$Simposios = ControladorExtensiones::ctrMostrarExtension($item,$valor);

					// var_dump($Simposios["FOTOS"]);
				 
				    $galeria = json_decode($Simposios["IMAGEN"], true);
				     }

				    if(isset($_GET["idExpo"])){

				 	$item="ID_EXPO";
				 	$valor=$_GET["idExpo"];

					$Simposios = ControladorExpocarreras::ctrMostrarExpocarrera($item,$valor);

					// var_dump($Simposios["FOTOS"]);
				 
				    $galeria = json_decode($Simposios["IMAGEN"], true);
				     }
				    
				    

				    
					?>

						<?php foreach ($galeria as $key => $value): ?>
					
						<li >
				                
				          <img src="<?php echo $value; ?>" >
				     
				        </li>				 

					<?php endforeach ?>


			</ul>

		<ol class="pagination">
			
		</ol>
	
		<div class="left">
			<span class="fas fa-chevron-circle-left"></span>
		<!-- 	<i class="fas fa-chevron-circle-left"></i> -->
			<!-- <i class="fas fa-university"></i> -->
		</div>

		<div class="right">
			<span class="fas fa-chevron-circle-right"></span>
			<!-- <i class="fas fa-chevron-circle-right"></i> -->
		</div>

	</div>