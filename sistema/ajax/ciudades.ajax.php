<?php

require_once "../controladores/ciudades.controlador.php";
require_once "../modelos/ciudades.modelo.php";

class AjaxCiudades{

	/*=============================================
	Editar Carreras
	=============================================*/	

	public $idCiudad;
	
	public $validarCiudades;
	
	public function ajaxMostrarCiudad(){
		if(isset($_POST["validarCiudades"])){
			$item="DESCRIPCION";
			$valor=$this->validarCiudades;
		}else{
			$item="COD_CIUDAD";
			$valor=$this->idCiudad;
		}

		$respuesta = ControladorCiudades::ctrMostrarCiudad($item,$valor);

		echo json_encode($respuesta);

	}


	/*=============================================
	Eliminar Ciudades
	=============================================*/	

	public $idEliminar;
	
	public function ajaxEliminarCiudad(){

		$respuesta = ControladorCiudades::ctrEliminarCiudad($this->idEliminar);
		echo $respuesta;

	}

	/*=============================================
		GUARDAR Y EDITAR CIUDADES
	=============================================*/	

	public $strNombre;
	
	public function ajaxGuardarCiudad(){

		if($this->txtIdCiudad != ""){

			$datos = array("txtCiudad" => strtoupper($this->txtCiudad),
							"txtIdCiudad" => strtoupper($this->txtIdCiudad));

			$editar = ControladorCiudades::ctrEditarCiudad($datos);
				
			echo json_encode($editar,JSON_UNESCAPED_UNICODE); // convertimos en JSON
			die();

		}else{

			$datos = array("txtCiudad" => strtoupper($this->txtCiudad));
	
			$respuesta = ControladorCiudades::ctrRegistroCiudad($datos);

			echo json_encode($respuesta,JSON_UNESCAPED_UNICODE); // convertimos en JSON
			die();

		}

	}


	/*=============================================
	Editar ciudades
	=============================================*/	

	public $EditarNombre;

	public $idCiudadEditar;
	
	public function ajaxEditarCiudad(){

		$datos = array("nombreCiudad" => strtoupper($this->EditarNombre),
						"idCiudad"=>$this->idCiudadEditar);
	
		$respuesta = ControladorCiudades::ctrEditarCiudad($datos);

		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE); // convertimos en JSON
		die();

	}


}

/*=============================================
Consultar ciudades
=============================================*/	

if(isset($_POST["idCiudad"])){

	$consultar = new AjaxCiudades();
	$consultar -> idCiudad = $_POST["idCiudad"];
	$consultar -> ajaxMostrarCiudad();

}


/*=============================================
Eliminar Ciudades
=============================================*/	

if(isset($_POST["idEliminar"])){

	$eliminar = new AjaxCiudades();
	$eliminar -> idEliminar = $_POST["idEliminar"];
	$eliminar -> ajaxEliminarCiudad();

}

/*=============================================
GUARDAR Y EDITAR CIUDADES
=============================================*/	

if(isset($_POST["txtCiudad"])){

	$Guardar = new AjaxCiudades();
	$Guardar -> txtIdCiudad = $_POST["txtIdCiudad"];
	$Guardar -> txtCiudad = $_POST["txtCiudad"];
	$Guardar -> ajaxGuardarCiudad();

}


/*=============================================
Modificar ciudades
=============================================*/	

if(isset($_POST["EditarNombre"])){

	$editar = new AjaxCiudades();
	$editar -> EditarNombre = $_POST["EditarNombre"];
	$editar -> idCiudadEditar = $_POST["idCiudadEditar"];
	$editar -> ajaxEditarCiudad();
	
}

/*=============================================
Validar datos repetidos
=============================================*/	

if(isset($_POST["validarCiudades"])){

	$consultar = new AjaxCiudades();
	$consultar -> validarCiudades = $_POST["validarCiudades"];
	$consultar -> ajaxMostrarCiudad();

}
