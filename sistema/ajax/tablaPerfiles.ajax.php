<?php

require_once "../controladores/perfiles.controlador.php";
require_once "../modelos/perfiles.modelo.php";

class tablaPerfiles{

	/*=============================================
	Tabla Perfiles
	=============================================*/ 

	public function mostrarTabla(){

		$perfiles = ControladorPerfiles::ctrMostrarPerfil(null, null);

		if(count($perfiles)== 0){

 			$datosJson = '{"data": []}';

			echo $datosJson;

			return;

 		}

 		$datosJson = '{

	 	"data": [ ';

	 	foreach ($perfiles as $key => $value) {

	 		/*=============================================
			ACCIONES
			=============================================*/

			$acciones = "<div class='btn-group'><button class='btn btn-warning btn-sm editarPerfil' data-toggle='modal' data-target='#modalPerfiles' idPerfil='".$value["id_perfil"]."'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm eliminarPerfil' idPerfil='".$value["id_perfil"]."'><i class='fas fa-trash-alt  text-white'></i></button></div>";	


			$datosJson.= '[
							
						"'.($key+1).'",
						"'.$value["nombre_perfil"].'",
						"'.$value["descripcion_perfil"].'",
						"'.$acciones.'"
						
				],';

		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']

		}';

		echo $datosJson;

	}

}

/*=============================================
Tabla Perfiles
=============================================*/ 

$tabla = new tablaPerfiles();
$tabla -> mostrarTabla();


