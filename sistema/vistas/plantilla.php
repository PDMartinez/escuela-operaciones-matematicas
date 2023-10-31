<?php 
session_start();
$ruta = ControladorRuta::ctrRuta();
$rutaBackend = ControladorRuta::ctrRutaBackend();

// var_dump($rutaBackend);
// return;
if(isset($_SESSION["idBackend"])){

	$admin = ControladorAdministradores::ctrMostrarAdministradores("id_u", $_SESSION["idBackend"]);

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<!-- <meta charset="UTF-8"> -->
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>Sistema Enseñanza</title>
	<link rel="icon" href="vistas/img/plantilla/aprendizaje_logo.png">
	
	<!--=====================================
	VÍNCULOS CSS
	======================================-->
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" integrity="zmfNZmXoNWBMemUOo1XUGFfc0ihGGLYdgtJS3KCr/l0=">

	<!-- <link rel="stylesheet" href="vistas/css/plugins/estilos.css">
	<link rel="stylesheet" href="vistas/css/plugins/font-awesome.css"> -->

	 <!-- Google Font: Source Sans Pro -->
  	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<!-- Theme style AdmninLTE -->
  	<link rel="stylesheet" href="vistas/css/plugins/adminlte.min.css">

  	<!-- DataTables -->
	<link rel="stylesheet" href="vistas/css/plugins/dataTables.bootstrap4.min.css">	
	<link rel="stylesheet" href="vistas/css/plugins/responsive.bootstrap.min.css">
	
	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="vistas/css/plugins/bootstrap-datepicker.standalone.min.css">

	<!-- daterange picker -->
  	<link rel="stylesheet" href="vistas/css/plugins/daterangepicker/daterangepicker.css">

	 <!-- fullCalendar -->
	<link rel="stylesheet" href="vistas/css/plugins/fullcalendar.min.css">

	<!-- Morris chart -->
  	<link rel="stylesheet" href="vistas/css/plugins/morris.css">

  	  <!-- Tempusdominus Bootstrap 4 -->
 	<link rel="stylesheet" href="vistas/js/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

 	<!-- <link rel="stylesheet" href="vistas/css/plugins/estilos.css"> -->
	

	<!-- jdSlider -->
	<!-- <link rel="stylesheet" href="vistas/css/plugins/jquery.jdSlider.css"> -->
	<!--=====================================
	VÍNCULOS JAVASCRIPT
	======================================-->

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
	<!-- jQuery -->
	<!-- <script src="vistas/js/plugins/jquery/jquery.min.js"></script>
 -->
	<!-- <script src="/path/to/cdn/jquery.slim.min.js"></script> -->

	
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	
	<!-- AdminLTE App -->
	<script src="vistas/js/plugins/adminlte.min.js"></script>

	<!-- DataTables 
	https://datatables.net/-->
  	<script src="vistas/js/plugins/jquery.dataTables.min.js"></script>
  	<script src="vistas/js/plugins/dataTables.bootstrap4.min.js"></script> 
	<script src="vistas/js/plugins/dataTables.responsive.min.js"></script>
  	<script src="vistas/js/plugins/responsive.bootstrap.min.js"></script>	

  	<!-- SWEET ALERT 2 -->	
	<!-- https://sweetalert2.github.io/ -->
	<script src="vistas/js/plugins/sweetalert2.all.js"></script>

	<!-- CKEDITOR -->
	<!-- https://ckeditor.com/ckeditor-5/#classic -->
	<script src="vistas/js/plugins/ckeditor.js"></script>

	<!-- bootstrap color picker 
	https://farbelous.github.io/bootstrap-colorpicker/v2/-->
  	<!-- <script src="vistas/js/plugins/bootstrap-colorpicker.min.js"></script> -->

  	<!-- iCheck -->
	<!-- http://icheck.fronteed.com/ -->
	<script src="vistas/js/plugins/icheck.min.js"></script>

	<!-- Pano -->
	<!-- https://www.jqueryscript.net/other/360-Degree-Panoramic-Image-Viewer-with-jQuery-Pano.html -->
	<script src="vistas/js/plugins/jquery.pano.js"></script>

	<!-- bootstrap datepicker -->
	<!-- https://bootstrap-datepicker.readthedocs.io/en/latest/ -->
	<script src="vistas/js/plugins/bootstrap-datepicker.min.js"></script>

	<!-- fullCalendar -->
	<!-- https://momentjs.com/ -->
	<script src="vistas/js/plugins/moment.js"></script>
	<!-- https://fullcalendar.io/docs/background-events-demo -->	
	<script src="vistas/js/plugins/fullcalendar.min.js"></script>

	<!-- Morris.js charts -->
	<!-- https://morrisjs.github.io/morris.js/ -->
	<script src="vistas/js/plugins/raphael-min.js"></script>
	<script src="vistas/js/plugins/morris.min.js"></script>

	 <!-- Dar formato a los numeros -->
  	<script src="vistas/js/plugins/jquerynumber.min.js"></script>

  	<!-- InputMask -->
	<script src="vistas/js/plugins/moment/moment.min.js"></script>
	<script src="vistas/js/plugins/inputmask/jquery.inputmask.min.js"></script>
  	
  	<!-- Tempusdominus Bootstrap 4 -->
	<script src="vistas/js/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

	<!-- Incluir la biblioteca de YouTube -->
    <script src="https://www.youtube.com/iframe_api"></script>
 
	<style>
		
	.fc-today{
		background:rgba(255,255,255,0) !important;
	}
	
	</style>

</head>

<?php if (!isset($_SESSION["validarSesionBackend"])): 

	include "paginas/login.php";

?>

<?php else: ?>

<body class="hold-transition sidebar-mini sidebar-collapse">

	<div class="wrapper">

		<?php 

		include "paginas/modulos/header.php";

		include "paginas/modulos/menu.php";

		/*=============================================
		Navegación de páginas
		=============================================*/
		
		if(isset($_GET["pagina"])){

			// var_dump($_GET["pagina"]);
			// return;

			if($_GET["pagina"] == "inicio" ||
			   $_GET["pagina"] == "usuarios" ||
			   $_GET["pagina"] == "perfiles" ||
			   $_GET["pagina"] == "ciudades" ||
			   $_GET["pagina"] == "materias" ||
			   $_GET["pagina"] == "grados" ||
			   $_GET["pagina"] == "tareas" ||
			   $_GET["pagina"] == "salir"){

				include "paginas/".$_GET["pagina"].".php";

			}else{

				include "paginas/error404.php";

			}


		}else{

			include "paginas/inicio.php";

		}

		include "paginas/modulos/footer.php";


		?>


	</div>
	<script>
		
		//Date and time picker
  // $('.reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
  
	</script>
<!-- JS ======================================================= --> 
 
	<script src="vistas/js/plantilla.js"></script>

</body>

<?php endif ?>

</html>