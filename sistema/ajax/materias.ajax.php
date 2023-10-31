<?php

require_once "../controladores/materias.controlador.php";
require_once "../modelos/materias.modelo.php";

class AjaxMaterias{

	/*=============================================
	Editar Materias
	=============================================*/	

	public $idMateria;
	public $validarMaterias;
	
	public function ajaxMostrarMateria(){
		if(isset($_POST["validarMaterias"])){
			$item="DESCRIPCION";
			$valor=$this->validarMaterias;
		}else{
			$item="id_materia";
			$valor=$this->idMateria;
		}

		$respuesta = ControladorMaterias::ctrMostrarMateria($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	GUARDAR Y EDITAR MATERIAS
	=============================================*/	

	public $strNombre;
	
	public function ajaxGuardarMateria(){

		if($this->txtIdMateria != ""){

			$datos = array("txtMateria" => strtoupper($this->txtMateria),
							"txtIdMateria" => strtoupper($this->txtIdMateria));

			$editar = ControladorMaterias::ctrEditarMateria($datos);
				
			echo json_encode($editar,JSON_UNESCAPED_UNICODE); // convertimos en JSON
			die();

		}else{

			$datos = array("txtMateria" => strtoupper($this->txtMateria));
	
			$respuesta = ControladorMaterias::ctrRegistroMateria($datos);

			echo json_encode($respuesta,JSON_UNESCAPED_UNICODE); // convertimos en JSON
			die();

		}

	}

	/*=============================================
	Eliminar Materias
	=============================================*/	

	public $idEliminar;
	
	public function ajaxEliminarMateria(){

		$respuesta = ControladorMaterias::ctrEliminarMateria($this->idEliminar);
		echo $respuesta;

	}


	/*=============================================
	Editar Materias
	=============================================*/	

	// public $EditarNombre;

	// public $idCiudadEditar;
	
	// public function ajaxEditarCiudad(){

	// 	$datos = array("nombreCiudad" => strtoupper($this->EditarNombre),
	// 					"idCiudad"=>$this->idCiudadEditar);
	
	// 	$respuesta = ControladorCiudades::ctrEditarCiudad($datos);

	// 	echo json_encode($respuesta,JSON_UNESCAPED_UNICODE); // convertimos en JSON
	// 	die();

	// }


}

/*=============================================
Consultar Materias
=============================================*/	

if(isset($_POST["idMateria"])){

	$consultar = new AjaxMaterias();
	$consultar -> idMateria = $_POST["idMateria"];
	$consultar -> ajaxMostrarMateria();

}

/*=============================================
Guardar y Editar Materias
=============================================*/	

if(isset($_POST["txtMateria"])){

	$Guardar = new AjaxMaterias();
	$Guardar -> txtIdMateria = $_POST["txtIdMateria"];
	$Guardar -> txtMateria = $_POST["txtMateria"];
	$Guardar -> ajaxGuardarMateria();

}

/*=============================================
Eliminar Materias
=============================================*/	

if(isset($_POST["idEliminar"])){

	$eliminar = new AjaxMaterias();
	$eliminar -> idEliminar = $_POST["idEliminar"];
	$eliminar -> ajaxEliminarMateria();

}


/*=============================================
Modificar ciudades
=============================================*/	

// if(isset($_POST["EditarNombre"])){

// 	$editar = new AjaxCiudades();
// 	$editar -> EditarNombre = $_POST["EditarNombre"];
// 	$editar -> idCiudadEditar = $_POST["idCiudadEditar"];
// 	$editar -> ajaxEditarCiudad();
	
// }

/*=============================================
Validar datos repetidos
=============================================*/	

// if(isset($_POST["validarCiudades"])){

// 	$consultar = new AjaxCiudades();
// 	$consultar -> validarCiudades = $_POST["validarCiudades"];
// 	$consultar -> ajaxMostrarCiudad();

// }
