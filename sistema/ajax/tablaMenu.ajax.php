<?php

require_once "../controladores/menu.controlador.php";
require_once "../modelos/menu.modelo.php";

class TablaMenu{

	/*=============================================
	Tabla Menu
	=============================================*/ 

	public function mostrarTabla(){

		$Menu = ControladorMenu::ctrMostrarMenu(null, null);

		if(count($Menu)== 0){

 			$datosJson = '{"data": []}';

			echo $datosJson;

			return;

 		}

 		$datosJson = '{

	 	"data": [ ';

	 	foreach ($Menu as $key => $value) {


			/*=============================================
			ACCIONES
			=============================================*/

			$acciones = "<div class='btn-group'><button class='btn btn-warning btn-sm editarMenu' data-toggle='modal' data-target='#editarMenu' idMenu='".$value["ID"]."'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm eliminarMenu' idMenu='".$value["ID"]."'><i class='fas fa-trash-alt'></i></button></div>";	


			$datosJson.= '[
							
						"'.($key+1).'",
						"'.$value["TITULO"].'",
						"'.$value["MENU"].'",
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
Tabla Banner
=============================================*/ 

$tabla = new TablaMenu();
$tabla -> mostrarTabla();

