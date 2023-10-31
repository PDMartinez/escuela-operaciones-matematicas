<?php

require_once "../controladores/grados.controlador.php";
require_once "../modelos/grados.modelo.php";

class tablaGrados{

	/*=============================================
	Tabla Grados
	=============================================*/ 

	public function mostrarTabla(){

		$grado = ControladorGrados::ctrMostrarGrado(null, null);

		if(count($grado)== 0){

 			$datosJson = '{"data": []}';

			echo $datosJson;

			return;

 		}

 		$datosJson = '{

	 	"data": [ ';

	 	foreach ($grado as $key => $value) {

	 		/*=============================================
			ACCIONES
			=============================================*/

			$acciones = "<div class='btn-group'><button class='btn btn-warning btn-sm editarGrado' data-toggle='modal' data-target='#modalGrados' idGrado='".$value["id_grado"]."'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm eliminarGrado' idGrado='".$value["id_grado"]."'><i class='fas fa-trash-alt  text-white'></i></button></div>";


			$datosJson.= '[
							
						"'.($key+1).'",
						"'.$value["descripcion_grado"].'",
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
Tabla Grados
=============================================*/ 

$tabla = new tablaGrados();
$tabla -> mostrarTabla();


