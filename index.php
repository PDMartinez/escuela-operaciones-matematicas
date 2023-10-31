<!doctype html>

<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="./style_index.css">
    <link rel="stylesheet" href="./style_indexfinal.css">
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
		<!-- <a href="./index.php" class="brand">Sistema Aprendizaje</a>  -->
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
			    
			    $materias = $conexion->prepare("SELECT * FROM materias");
			    $materias->execute();
			    
			    $resultados = $materias->fetchAll(PDO::FETCH_ASSOC);
			    
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
		<!-- <a href="./trivia/index.html"><span class="parpadea text"><i class="menu-icon ion-md-notifications"></i><strong> PRACTICAR</strong></a><strong></strong> -->
		<!-- <a href="./email/g/index.php"><span class=""><i class="fas fa-envelope"></i><strong> MENSAJE</strong></a><strong></strong> -->
	</nav>
</header>

<body>

<div class="container">

  <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0"><img src="images/num_header2.png" width="363" height="147" alt=""/>&nbsp; &nbsp;</h1>

	<hr class="mt-2 mb-5">

	<div class="row text-center text-lg-left">

	<?php
    require_once 'conexion.php'; // Incluir el archivo de conexión
    
    $materias = $conexion->prepare("SELECT * FROM materias");
    $materias->execute();
    
    $resultados = $materias->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($resultados as $key => $value) {
                        
      echo '
					  <div class="col-lg-4 col-md-6 mb-4">  
			        <td>
			        	<a href="./numeros.php?id='.$value["id_materia"].'">
			        		<div class="gradient-border"id="box">
				        		<i class="fa-solid fa-hand"></i>
				        		<strong>'.$value["descripcion_materia"].'</strong>
			        		</div>
			        	</a>
			        </td>
					  </div>
					 ';
    }
	?>
   
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
  <!-- <script src="http://code.jquery.com/jquery-latest.js"></script> -->
  </body>
</html>