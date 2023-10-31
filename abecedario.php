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
   
    <title>Aprendé el Abecedario en Lenguaje de Señas</title>
  </head>
  <header class="header" id="header">
	<nav class="navbar container">
		<a href="./index.php" class="brand">SEÑAPP PARAGUAY</a>
		<div class="menu" id="menu">
			<ul class="menu-list">
				<li class="menu-item">
					<a href="./index.php" class="menu-link is-active">
						<i class="menu-icon ion-md-home"></i>
						<span class="menu-name">Inicio</span>
					</a>
				</li>
				<li class="menu-item">
					<a href="./numeros.php" class="menu-link">
          <i class="menu-icon ion-md-hand"></i>
						<span class="menu-name">Números</span>
					</a>
				</li>
				<li class="menu-item">
					<a href="./abecedario.php" class="menu-link">
						<i class="menu-icon ion-md-school"></i>
						<span class="menu-name">Abecedario</span>
					</a>
				</li>
				<li class="menu-item">
					<a href="./dias.php" class="menu-link">
						<i class="menu-icon ion-md-hourglass"></i>
						<span class="menu-name">Días</span>
					</a>
				</li>
				<li class="menu-item">
					<a href="./meses.php" class="menu-link">
						<i class="menu-icon ion-md-calendar"></i>
						<span class="menu-name">Meses</span>
					</a>
				</li>
        <li class="menu-item">
					<a href="./frases.php" class="menu-link">
						<i class="menu-icon ion-md-chatbubbles"></i>
						<span class="menu-name">Frases</span>
					</a>
				</li>
			</ul>
		</div>
		<a href="./trivia/index.html"><span class="parpadea text"><i class="menu-icon ion-md-notifications"></i><strong> TRIVIA</strong></a><strong></strong>
	</nav>
</header>
  <body>


<div class="container">

  <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0"><img src="images/abcedario_header1.png" width="339" height="147" alt=""/>&nbsp; &nbsp;</h1>
	

	<hr class="mt-2 mb-5">

	<div class="row text-center text-lg-left">
  
  <?php
  include("data_abecedario.php");
	foreach ($info as $key=>$value){
		?>
    
	     <!-- Grid column -->
		  <div class="col-6 col-md-4 mb-4"> <!--Col-6 Col-md-4 es para que salga 2 columnas mb-4 es para que deje espacio entre filas -->
			<a href="#" data-toggle="modal" data-target="#modal4" data-url="<?=$value['url_video']?>" >
				<img class="img-fluid z-depth-1" src="<?=$value['url_imagen']?>" alt="video">
			</a>
		  </div>
		<!-- Grid column -->	 
		<?php
	}
  ?>
    <!--Modal: Name-->
    <div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">

        <!--Content-->
        <div class="modal-content">

          <!--Body-->
          <div class="modal-body mb-0 p-0">

            <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
              <iframe class="embed-responsive-item" src=""
                allowfullscreen></iframe>
            </div>

          </div>

          <!--Footer-->
          <div class="modal-footer justify-content-right">
            
            

            <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">X</button>

          </div>

        </div>
        <!--/.Content-->

      </div>
    </div>
    <!--Modal: Name-->
	
	
	
    
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