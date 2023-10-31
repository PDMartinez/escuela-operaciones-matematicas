<?php

require_once "../controladores/tareas.controlador.php";
require_once "../modelos/tareas.modelo.php";

class AjaxTareas{

	/*=============================================
	GUARDAR TAREA
	=============================================*/	

	public function ajaxGuardarTareas(){

		if(($this->idTarea) != ""){

			$datos = array("idTarea" => $this->idTarea,
							"txtGrado" => $this->txtGrado,
							"txtMateria" => $this->txtMateria,
							"txtTarea" => $this->txtTarea,
							"txtVideo" => $this->txtVideo,
							"txtResultado" => $this->txtResultado);
			
			// var_dump($datos);
			// return;

			$respuesta = ControladorTareas::ctrEditarTarea($datos);
				
			echo json_encode($respuesta,JSON_UNESCAPED_UNICODE); // convertimos en JSON

			die();

		}else{

			$datos = array("idTarea" => $this->idTarea,
							"txtGrado" => $this->txtGrado,
							"txtMateria" => $this->txtMateria,
							"txtTarea" => $this->txtTarea,
							"txtVideo" => $this->txtVideo,
							"txtResultado" => $this->txtResultado);
				// var_dump($datos);
				// return;

				$respuesta = ControladorTareas::ctrCrearTarea($datos);
				
				echo json_encode($respuesta,JSON_UNESCAPED_UNICODE); // convertimos en JSON

				die();

		}

	}


	/*=============================================
	EDITAR TAREAS
	=============================================*/	

	public function ajaxEditarTarea(){

		$item="id_tarea";
    	$valor=$this->idTarea;
        $var=1;
        $order="id_tarea ASC";

		$respuesta = ControladorTareas::ctrMostrarTarea($item, $valor, $var, $order);

		echo json_encode($respuesta);//se imprime para que se pueda ver en el js
		// var_dump($respuesta);

	}

	/*=============================================
	Eliminar TAREAS
	=============================================*/	

	public function ajaxEliminarTarea(){
		

		$datos = array( "idEliminar" => $this->idEliminar,
						"galeria" => $this->galeria,
						"galeria1" => $this->galeria1);

		// var_dump($datos);
		// return;

		$respuesta = ControladorTareas::ctrBorrarTarea($datos);

		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);

		die();
	}


	/*=============================================
	ACTIVAR TAREA
	=============================================*/	

	public function ajaxActivarTarea(){

		$tabla = "tareas";

		$item1 = "estado_tarea";
		$valor1 = $this->activarTarea;

		$item2 = "id_tarea";
		$valor2 = $this->activarId;

		$respuesta = ControladorTareas::ctrActualizarTarea($tabla, $item1, $valor1, $item2, $valor2);

		echo json_encode($respuesta);

		die();

	}


}

///////////////////////////////////////////////////////////////////////

/*=============================================
	GUARDAR y EDITAR TAREAS
=============================================*/	

if(isset($_POST["txtTarea"])){

	$Guardar = new AjaxTareas();
	$Guardar -> idTarea = $_POST["idTarea"];
	$Guardar -> txtGrado = $_POST["txtGrado"];
	$Guardar -> txtMateria = $_POST["txtMateria"];
	$Guardar -> txtTarea = $_POST["txtTarea"];
	$Guardar -> txtVideo = $_POST["txtVideo"];
	$Guardar -> txtResultado = $_POST["txtResultado"];
	
	$Guardar -> ajaxGuardarTareas();

}

/*================================================
	EDITAR/MOSTRAR TAREA
==================================================*/
if(isset($_POST["idTarea"])){

	$editar = new AjaxTareas();
	$editar -> idTarea = $_POST["idTarea"];
	$editar -> ajaxEditarTarea();

}

/*=============================================
	Eliminar Diccionario
=============================================*/	

if(isset($_POST["idEliminar"])){

	$eliminar = new AjaxTareas();
	$eliminar -> idEliminar = $_POST["idEliminar"];
	$eliminar -> galeria = $_POST["galeria"];
	$eliminar -> galeria1 = $_POST["galeria1"];
	$eliminar -> ajaxEliminarTarea();

}

/*=============================================
	ACTIVAR TAREA
=============================================*/	

if(isset($_POST["activarTarea"])){

	$activarTarea = new AjaxTareas();
	$activarTarea -> activarTarea = $_POST["activarTarea"];
	$activarTarea -> activarId = $_POST["activarId"];
	$activarTarea -> ajaxActivarTarea();

}

/*=============================================
 VALIDAR QUE NO SE REPITA EL NOMBRE
=============================================*/	

if(isset($_POST["validarTitulo"])){

	$validar = new AjaxGuias();
	$validar -> validarTitulo = $_POST["validarTitulo"];
	$validar -> ajaxValidarGuia();

}
