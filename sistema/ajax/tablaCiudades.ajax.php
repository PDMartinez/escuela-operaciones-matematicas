<?php

require_once "../controladores/ciudades.controlador.php";
require_once "../modelos/ciudades.modelo.php";

class tablaCiudades{

	/*=============================================
	Tabla Ciudades
	=============================================*/ 

	public function mostrarTabla(){

		$ciudad = ControladorCiudades::ctrMostrarCiudad(null, null);

		if(count($ciudad)== 0){

 			$datosJson = '{"data": []}';

			echo $datosJson;

			return;

 		}

 		$datosJson = '{

	 	"data": [ ';

	 	foreach ($ciudad as $key => $value) {

	 		/*=============================================
			ACCIONES
			=============================================*/

			$acciones = "<div class='btn-group'><button class='btn btn-warning btn-sm editarCiudad' data-toggle='modal' data-target='#modalCiudades' idCiudad='".$value["COD_CIUDAD"]."'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm eliminarCiudad' idCiudad='".$value["COD_CIUDAD"]."'><i class='fas fa-trash-alt  text-white'></i></button></div>";	


			$datosJson.= '[
							
						"'.($key+1).'",
						"'.$value["DESCRIPCION"].'",
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
Tabla Categorias
=============================================*/ 

$tabla = new tablaCiudades();
$tabla -> mostrarTabla();


