<?php

require_once "../controladores/perfiles.controlador.php";
require_once "../modelos/perfiles.modelo.php";

class AjaxPerfiles{

	/*=============================================
	MOSTRAR PERFILES
	=============================================*/	

	public function ajaxMostrarPerfil(){

		$item="id_perfil";
		$valor=$this->idPerfil;

		// var_dump($this->idPerfil);
		// return;

		$respuesta = ControladorPerfiles::ctrMostrarPerfil($item,$valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	GUARDAR PERFILES
	=============================================*/	

	public function ajaxGuardarPerfil(){

		if($this->txtIdPerfil != ""){

			$datos = array("txtPerfil" => strtoupper($this->txtPerfil),
							"txtDescripcionPerfil" => strtoupper($this->txtDescripcionPerfil),
							"txtIdPerfil" => strtoupper($this->txtIdPerfil));

			
			$editar = ControladorPerfiles::ctrEditarPerfil($datos);
				
			echo json_encode($editar,JSON_UNESCAPED_UNICODE); // convertimos en JSON
			die();

		}else{

			$datos = array("txtPerfil" => strtoupper($this->txtPerfil),
							"txtDescripcionPerfil" => strtoupper($this->txtDescripcionPerfil));

			// var_dump($datos);
			// return;
		
			$respuesta = ControladorPerfiles::ctrGuardarPerfil($datos);

			echo json_encode($respuesta,JSON_UNESCAPED_UNICODE); // convertimos en JSON
			die();

		}

	}


	/*=============================================
	ELIMINAR PERFILES
	=============================================*/	
	
	public function ajaxEliminarPerfil(){

		$respuesta = ControladorPerfiles::ctrEliminarPerfil($this->idEliminar);
		echo $respuesta;

	}

	/*=============================================
	MODIFICAR PERFILES
	=============================================*/	

	public function ajaxEditarPerfil(){

		$datos = array("nombreBarrio" => strtoupper($this->EditarNombre),
						"idBarrio"=>$this->idBarrioEditar);
	
		$respuesta = ControladorBarrios::ctrEditarBarrio($datos);

		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE); // convertimos en JSON
		die();

	}


}

/*=============================================
MOSTRAR PERFILES
=============================================*/	

if(isset($_POST["idPerfil"])){

	$consultar = new AjaxPerfiles();
	$consultar -> idPerfil = $_POST["idPerfil"];
	$consultar -> ajaxMostrarPerfil();

}


/*=============================================
ELIMINAR PERFILES
=============================================*/	

if(isset($_POST["idEliminar"])){

	$eliminar = new AjaxPerfiles();
	$eliminar -> idEliminar = $_POST["idEliminar"];
	$eliminar -> ajaxEliminarPerfil();

}

/*=============================================
GUARDAR Y EDITAR PERFILES
=============================================*/	

if(isset($_POST["txtPerfil"])){

	// var_dump($_POST["txtIdPerfil"]);
	// return;

	$Guardar = new AjaxPerfiles();
	$Guardar -> txtPerfil = $_POST["txtPerfil"];
	$Guardar -> txtDescripcionPerfil = $_POST["txtDescripcionPerfil"];
	$Guardar -> txtIdPerfil = $_POST["txtIdPerfil"];

	$Guardar -> ajaxGuardarPerfil();

}


/*=============================================
MODIFICAR PERFILES
=============================================*/	

if(isset($_POST["EditarNombre"])){

	$editar = new AjaxBarrios();
	$editar -> EditarNombre = $_POST["EditarNombre"];
	$editar -> idBarrioEditar = $_POST["idBarrioEditar"];
	$editar -> ajaxEditarBarrio();
	
}
