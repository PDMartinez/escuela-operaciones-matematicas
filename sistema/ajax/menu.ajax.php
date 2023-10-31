<?php

require_once "../controladores/menu.controlador.php";
require_once "../modelos/menu.modelo.php";

class AjaxMenu{

	/*=============================================
	Editar Menu
	=============================================*/	

	public $idMenu;

	public function ajaxMostrarMenu(){

		$respuesta = ControladorMenu::ctrMostrarMenu("id", $this->idMenu);

		echo json_encode($respuesta);

	}

	/*=============================================
	Eliminar Menu
	=============================================*/	

	public $idEliminar;
	public $rutaMenu;

	public function ajaxEliminarMenu(){

		$respuesta = ControladorMenu::ctrEliminarMenu($this->idEliminar, $this->rutaMenu);

		echo $respuesta;

	}


	/*=============================================
	Activar o desactivar menu
	=============================================*/	

	public $estadoMenu;

	public function ajaxActivarMenu(){

		$tabla = "menu";

		$item1 = "id";
		$valor1 = $this->idMenu;

		$item2 = "estado_menu";
		$valor2 = $this->estadoMenu;

		$respuesta = ModeloMenu::mdlActualizarMenu($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}


}


/*=============================================
Activar o desactivar menu
=============================================*/	

if(isset($_POST["estadoMenu"])){

	$activarMenu = new AjaxMenu();
	$activarMenu -> idMenu = $_POST["idMenu"];
	$activarMenu -> estadoMenu = $_POST["estadoMenu"];
	$activarMenu -> ajaxActivarMenu();

}


/*=============================================
Editar Menu
=============================================*/	

if(isset($_POST["idMenu"])){

	$editar = new AjaxMenu();
	$editar -> idMenu = $_POST["idMenu"];
	$editar -> ajaxMostrarMenu();

}

/*=============================================
Eliminar Menu
=============================================*/	

if(isset($_POST["idEliminar"])){

	$eliminar = new AjaxMenu();
	$eliminar -> idEliminar = $_POST["idEliminar"];
	$eliminar -> rutaMenu = $_POST["rutaMenu"];
	$eliminar -> ajaxEliminarMenu();

}