<?php

require_once "../controladores/materias.controlador.php";
require_once "../modelos/materias.modelo.php";

class tablaMaterias{

	/*=============================================
	Tabla Materias
	=============================================*/ 

	public function mostrarTabla(){

		$materia = ControladorMaterias::ctrMostrarMateria(null, null);

		if(count($materia)== 0){

 			$datosJson = '{"data": []}';

			echo $datosJson;

			return;

 		}

 		$datosJson = '{

	 	"data": [ ';

	 	foreach ($materia as $key => $value) {

	 		/*=============================================
			ACCIONES
			=============================================*/

			$acciones = "<div class='btn-group'><button class='btn btn-warning btn-sm editarMateria' data-toggle='modal' data-target='#modalMaterias' idMateria='".$value["id_materia"]."'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm eliminarMateria' idMateria='".$value["id_materia"]."'><i class='fas fa-trash-alt  text-white'></i></button></div>";


			$datosJson.= '[
							
						"'.($key+1).'",
						"'.$value["descripcion_materia"].'",
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
Tabla Materias
=============================================*/ 

$tabla = new tablaMaterias();
$tabla -> mostrarTabla();


