<?php

require_once "../controladores/grados.controlador.php";
require_once "../modelos/grados.modelo.php";

class AjaxGrados{

	/*=============================================
	Consultar Grado
	=============================================*/	

	public $idGrado;
	public $validarMaterias;
	
	public function ajaxMostrarGrado(){
		if(isset($_POST["validarGrados"])){
			$item="descripcion_grado";
			$valor=$this->validarGrados;
		}else{
			$item="id_grado";
			$valor=$this->idGrado;
		}

		$respuesta = ControladorGrados::ctrMostrarGrado($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	GUARDAR Y EDITAR GRADOS
	=============================================*/	

	public $strNombre;
	
	public function ajaxGuardarGrado(){

		if($this->txtIdGrado != ""){

			$datos = array("txtGrado" => strtoupper($this->txtGrado),
							"txtIdGrado" => strtoupper($this->txtIdGrado));

			$editar = ControladorGrados::ctrEditarGrado($datos);
				
			echo json_encode($editar,JSON_UNESCAPED_UNICODE); // convertimos en JSON
			die();

		}else{

			$datos = array("txtGrado" => strtoupper($this->txtGrado));
	
			$respuesta = ControladorGrados::ctrRegistroGrado($datos);

			echo json_encode($respuesta,JSON_UNESCAPED_UNICODE); // convertimos en JSON
			die();

		}

	}

	/*=============================================
	Eliminar Grados
	=============================================*/	

	public $idEliminar;
	
	public function ajaxEliminarGrado(){

		$respuesta = ControladorGrados::ctrEliminarGrado($this->idEliminar);
		echo $respuesta;

	}


}

/*=============================================
Consultar Grado
=============================================*/	

if(isset($_POST["idGrado"])){

	$consultar = new AjaxGrados();
	$consultar -> idGrado = $_POST["idGrado"];
	$consultar -> ajaxMostrarGrado();

}

/*=============================================
Guardar y Editar Grados
=============================================*/	

if(isset($_POST["txtGrado"])){

	$Guardar = new AjaxGrados();
	$Guardar -> txtIdGrado = $_POST["txtIdGrado"];
	$Guardar -> txtGrado = $_POST["txtGrado"];
	$Guardar -> ajaxGuardarGrado();

}

/*=============================================
Eliminar Grados
=============================================*/	

if(isset($_POST["idEliminar"])){

	$eliminar = new AjaxGrados();
	$eliminar -> idEliminar = $_POST["idEliminar"];
	$eliminar -> ajaxEliminarGrado();

}

