<?php 


require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class TablaAdmin{

	/*=============================================
	Tabla Administradores
	=============================================*/ 

	public function mostrarTabla(){

		$respuesta = ControladorAdministradores::ctrMostrarAdministradores(null, null);

		// var_dump($respuesta);
		// return;

		if(count($respuesta) == 0){

			$datosJson = '{"data":[]}';

			echo $datosJson;

			return;

		}

		$datosJson = '{
	
		"data":[';

		foreach ($respuesta as $key => $value) {
			
			if($value["estado"] == 0){

				$estado = "<button class='btn btn-dark btn-sm btnActivar' estadoUsuario='1' idUsuario='".$value["id_u"]."'>Desactivado</button>";

			}else{

				$estado = "<button class='btn btn-info btn-sm btnActivar' estadoUsuario='0' idUsuario='".$value["id_u"]."'>Activado</button>";
			}


			// IMAGEN============================================================
			if($value["foto"] != ""){

				$foto = "<img src='".$value["foto"]."' class='rounded-circle' width='50px'>";

			}else{

				$foto = "<img src='vistas/img/usuarios/default/default.png' class='rounded-circle' width='50px'>";
			}
			// ==================================================================

			$acciones = "<div class='btn-group'><button class='btn btn-warning btn-sm editarUsuario' data-toggle='modal' data-target='#modalUsuarios' idUsuario='".$value["id_u"]."'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm eliminarUsuario' idUsuario='".$value["id_u"]."'><i class='fas fa-trash-alt'></i></button></div>";
		
		$datosJson .='[
				      "'.($key+1).'",
				      "'.$foto.'",
				      "'.$value["nombre"].'",
				      "'.$value["usuario"].'",
				      "'.$value["nombre_perfil"].'",
				      "'.$value["fecha"].'",
				      "'.$estado.'",
				      "'.$acciones.'"
				    ],';

		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson .= ']}';


		echo $datosJson;

	}

}

/*=============================================
Tabla Administradores
=============================================*/ 

$tabla = new TablaAdmin();
$tabla -> mostrarTabla();



