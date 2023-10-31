<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxAdministradores{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/	

	public function ajaxMostrarAdministradores(){

		$item = "id_u";
		$valor = $this->idAdministrador;

		$respuesta = ControladorAdministradores::ctrMostrarAdministradores($item, $valor);

		echo json_encode($respuesta);

	}


	/*=============================================
	GUARDAR Y EDITAR USUARIOS
	=============================================*/	

	public function ajaxGuardarUsuarios(){

		if($this->txtIdUsuario != ""){

			$datos = array("txtIdUsuario" => $this->txtIdUsuario,
							"txtNombre" => $this->txtNombre,
							"txtUsuario" => $this->txtUsuario,
							"cmbPerfil" => $this->cmbPerfil,
							"cmbCiudad" => $this->cmbCiudad,
							"txtContrasenya" => $this->txtContrasenya,
							"txtContrasenyaActual" => $this->txtContrasenyaActual,
							"estado" => $this->estado);

			// var_dump($datos);
			// return;
			
			$editar = ControladorAdministradores::ctrEditarUsuario($datos);
				
			echo json_encode($editar,JSON_UNESCAPED_UNICODE); // convertimos en JSON
			die();

		}else{

			$datos = array("txtNombre" => $this->txtNombre,
							"txtUsuario" => $this->txtUsuario,
							"cmbPerfil" => $this->cmbPerfil,
							"cmbCiudad" => $this->cmbCiudad,
							"txtContrasenya" => $this->txtContrasenya,
							"txtContrasenyaActual" => $this->txtContrasenyaActual,
							"estado" => $this->estado);

			// var_dump($datos);
			// return;
		
			$respuesta = ControladorAdministradores::ctrGuardarUsuario($datos);

			echo json_encode($respuesta,JSON_UNESCAPED_UNICODE); // convertimos en JSON
			die();

		}

	}

	/*=============================================
	Activar o desactivar Usuario
	=============================================*/	

	public function ajaxActivarUsuario(){

		$tabla = "usuarios";

		$item1 = "id_u";
		$valor1 = $this->idUsuario;

		$item2 = "estado";
		$valor2 = $this->estadoUsuario;

		$respuesta = ModeloAdministradores::mdlActivarUsuario($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}

	/*=============================================
	Eliminar Usuario
	=============================================*/	

	public function ajaxEliminarUsuario(){

		$respuesta = ControladorAdministradores::ctrEliminarUsuario($this->idEliminar);

		echo $respuesta;

	}

}

/*=============================================
Editar Usuarios
=============================================*/
if(isset($_POST["idUsuario"])){

	$editar = new AjaxAdministradores();
	$editar -> idAdministrador = $_POST["idUsuario"];
	$editar -> ajaxMostrarAdministradores();

}

/*=============================================
GUARDAR Y EDITAR USUARIOS
=============================================*/	

if(isset($_POST["txtNombre"])){

	// var_dump($_POST["txtNombre"]);
	// return;

	$Guardar = new AjaxAdministradores();
	$Guardar -> txtIdUsuario = $_POST["txtIdUsuario"];
	$Guardar -> txtNombre = $_POST["txtNombre"];
	$Guardar -> txtUsuario = $_POST["txtUsuario"];
	$Guardar -> cmbPerfil = $_POST["cmbPerfil"];
	$Guardar -> cmbCiudad = $_POST["cmbCiudad"];
	$Guardar -> txtContrasenya = $_POST["txtContrasenya"];
	$Guardar -> txtContrasenyaActual = $_POST["txtContrasenyaActual"];
	$Guardar -> estado = $_POST["estado"];

	$Guardar -> ajaxGuardarUsuarios();

}

/*=============================================
Activar o desactivar Usuario
=============================================*/	

if(isset($_POST["estadoActivarUsuario"])){

	// var_dump($_POST["idActivarUsuario"]);
	// var_dump($_POST["estadoActivarUsuario"]);
	// return;

	$activarAdmin = new AjaxAdministradores();
	$activarAdmin -> idUsuario = $_POST["idActivarUsuario"];
	$activarAdmin -> estadoUsuario = $_POST["estadoActivarUsuario"];
	$activarAdmin -> ajaxActivarUsuario();

}

/*=============================================
Eliminar Administrador
=============================================*/	

if(isset($_POST["idEliminar"])){

	$eliminar = new AjaxAdministradores();
	$eliminar -> idEliminar = $_POST["idEliminar"];
	$eliminar -> ajaxEliminarUsuario();

}