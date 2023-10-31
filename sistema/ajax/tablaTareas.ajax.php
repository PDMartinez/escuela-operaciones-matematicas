<?php

require_once "../controladores/tareas.controlador.php";
require_once "../modelos/tareas.modelo.php";

class TablaTareas{

	/*=============================================
	Tabla Tareas
	=============================================*/ 

	public function mostrarTabla(){

		$item=null;
    	$valor=null;
        $var=null;
        $order="id_tarea ASC";

		$tareas = ControladorTareas::ctrMostrarTarea($item, $valor, $var, $order);

		// var_dump($tareas);
		// return;

		if(count($tareas)== 0){

 			$datosJson = '{"data": []}';

			echo $datosJson;

			return;

 		}

 		$datosJson = '{

	 	"data": [ ';

	 	foreach ($tareas as $key => $value) {

	 			if($value["estado_tarea"]==1){
	 				$estado="<div class='btn-group'><button class='btn btn-success btn-sm btnActivar' idTarea='".$value["id_tarea"]."' estadoTarea=0>Activo</button></div>";	
	 			}else{

	 				$estado="<div class='btn-group'><button class='btn btn-danger btn-sm btnActivar' idTarea='".$value["id_tarea"]."' estadoTarea=1>Inactivo</button></div>";	
	 			}


	 			/*=============================================
	 	 		TRAEMOS LA IMAGEN DE LA TAREA
	  			=============================================*/ 
	  			$galeriaTarea = json_decode($value["img_tarea"], true);
	  			
	  			if ($galeriaTarea!="" && $galeriaTarea!=[""] && $galeriaTarea!=NULL){

		  			
		  			//var_dump($galeriaTarea);
					foreach ($galeriaTarea as $indice => $valor) {
					
						$imagenTarea = "<img src='".$valor."'width='60px'>";

					}

				}else{

					$galeriaTarea = json_decode("[]", true);
					$imagenTarea = "<td><img src='vistas/img/tareas/default/sinImagen.png'class='img-thumbnail'width='40px'></td>";

					//var_dump($imagenTarea);
		
				}

				/*=============================================
	 	 		TRAEMOS LA IMAGEN DEL RESULTADO
	  			=============================================*/ 
	  			$galeriaResultado = json_decode($value["img_resultado"], true);
	  			
	  			if ($galeriaResultado!="" && $galeriaResultado!=[""] && $galeriaResultado!=NULL){

		  			
		  			//var_dump($galeriaResultado);
					foreach ($galeriaResultado as $indice => $valor) {
					
						$imagenResultado = "<img src='".$valor."'width='60px'>";

					}

				}else{

					$galeriaResultado = json_decode("[]", true);
					$imagenResultado = "<td><img src='vistas/img/tareas/default/sinImagen.png'class='img-thumbnail'width='40px'></td>";

					//var_dump($imagenResultado);
		
				}

				// var_dump($valor);
		  		//return;
	
			/*=============================================
			ACCIONES
			=============================================*/

			$acciones = "<div class='btn-group'><button class='btn btn-warning btn-sm editarTarea' data-toggle='modal' data-target='#modalTareas' idTarea='".$value["id_tarea"]."' galeriaTarea='".implode(",", $galeriaTarea)."' galeriaResultado='".implode(",", $galeriaResultado)."'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm eliminarTarea' idTarea='".$value["id_tarea"]."' galeriaTarea='".implode(",", $galeriaTarea)."' galeriaResultado='".implode(",", $galeriaResultado)."'><i class='fas fa-trash-alt'></i></button></div>";	

			$datosJson.= '[


						"'.($key+1).'",
						"'.$value["descripcion_tarea"].'",
						"'.$value["descripcion_grado"].'",
						"'.$value["descripcion_materia"].'",
						"'.$imagenTarea.'",
						"'.$imagenResultado.'",
						"'.$value["resultado"].'",
						"'.$value["fecha"].'",
						"'.$estado.'",
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
Tabla Tareas
=============================================*/ 

$tabla = new TablaTareas();
$tabla -> mostrarTabla();

