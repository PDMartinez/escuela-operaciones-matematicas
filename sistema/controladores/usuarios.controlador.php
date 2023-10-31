<?php

class ControladorAdministradores{

	/*=============================================
	Ingreso Administradores
	=============================================*/

	public function ctrIngresoAdministradores(){

		if(isset($_POST["ingresoUsuario"])){
			
			if(preg_match('/^[a-zA-Z0-9@.]+$/', $_POST["ingresoUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingresoPassword"])){

			   	$encriptarPassword = crypt($_POST["ingresoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

			   	$tabla1 = "usuarios";
				$tabla2 = "perfiles";
			    $item = "usuario";
			    $valor = $_POST["ingresoUsuario"];

				$respuesta = ModeloAdministradores::mdlMostrarAdministradores($tabla1, $tabla2, $item, $valor);
				
				if($respuesta["usuario"] == $_POST["ingresoUsuario"] && $respuesta["password"] == $encriptarPassword){

					if($respuesta["estado"] == 1){

						// if($respuesta["nombre_perfil"] == "ADMINISTRADOR"){

							$_SESSION["validarSesionBackend"] = "ok";
					 		$_SESSION["idBackend"] = $respuesta["id_u"];

					 		echo '<script>

								window.location = "'.$_SERVER["REQUEST_URI"].'";

					 		</script>';

				 		// }else{

			 			// 	echo "<div class='alert alert-danger mt-3 small'>ERROR: No eres administrador</div>";

			 			// }

			 		}else{

			 			echo "<div class='alert alert-danger mt-3 small'>ERROR: El usuario está desactivado</div>";

			 		}

				}else{

					echo "<div class='alert alert-danger mt-3 small'>ERROR: Usuario y/o contraseña incorrectos</div>";
				}	

			}else{

				echo "<div class='alert alert-danger mt-3 small'>ERROR: No se permiten caracteres especiales</div>";

			}

		}

	}

	/*=============================================
	Mostrar Administradores
	=============================================*/

	static public function ctrMostrarAdministradores($item, $valor){

		$tabla1 = "usuarios";
		$tabla2 = "perfiles";

		$respuesta = ModeloAdministradores::mdlMostrarAdministradores($tabla1, $tabla2, $item, $valor);

		return $respuesta;

	}

	/*============================================================
			GUARDAR USUARIOS
 	==============================================================*/
	static public function ctrGuardarUsuario($datos){

			if(isset($datos["txtNombre"])){
				// var_dump($datos);
				// return;

				if(! preg_match('/^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ. ]+$/', $datos["txtNombre"])){

					$arrResponse=array('status'=>false,'msg'=> '¡No se permiten caracteres especiales en Nombre!');

					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON
					die();
					return;

				}

				if(! preg_match('/^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ. ]+$/', $datos["txtUsuario"])){

					$arrResponse=array('status'=>false,'msg'=> '¡No se permiten caracteres especiales en Usuario!');

					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON
					die();
					return;

				}

				if(! preg_match('/^[0-9]+$/', $datos["cmbPerfil"])){

					$arrResponse=array('status'=>false,'msg'=> '¡No se permiten caracteres especiales en Perfil!');

					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON
					die();
					return;

				}

				if(! preg_match('/^[0-9]+$/', $datos["cmbCiudad"])){

					$arrResponse=array('status'=>false,'msg'=> '¡No se permiten caracteres especiales en Ciudad!');

					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON
					die();
					return;

				}

				if(! preg_match('/^[a-zA-Z0-9]+$/', $_POST["txtContrasenya"])){

					$arrResponse=array('status'=>false,'msg'=> '¡No se permiten caracteres especiales en Contraseña!');

					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON
					die();
					return; 			

			   	}

			   	$password = crypt($_POST["txtContrasenya"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$'); 

				$tabla="usuarios";

				$datos = array("txtNombre" => $datos["txtNombre"],
							"txtUsuario" => $datos["txtUsuario"],
							"cmbPerfil" => $datos["cmbPerfil"],
							"cmbCiudad" => $datos["cmbCiudad"],
							"txtContrasenya" => $password,
							"estado" => $datos["estado"]);
								    
				$respuesta=ModeloAdministradores::mdlGuardarUsuario($tabla, $datos);
				    
				if ($respuesta =='ok'){

					$arrResponse=array('status'=>true,'msg'=> 'Datos Guardado Correctamente');

				}else if($respuesta =='exist'){

					$arrResponse=array('status'=>false,'msg'=> '¡Atención! El mombre de usuario ya existe.');

				}else{

					$arrResponse=array('status'=>false,'msg'=> 'No es posible almacenar los datos.');
				}

				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON

				die(); //para parar la aplicacion
				
			}

	}

	/*============================================================
			EDITAR USUARIOS
 	==============================================================*/
	static public function ctrEditarUsuario($datos){

			if(isset($datos["txtNombre"])){
				// var_dump($datos);
				// return;

				if(! preg_match('/^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ. ]+$/', $datos["txtNombre"])){

					$arrResponse=array('status'=>false,'msg'=> '¡No se permiten caracteres especiales en Nombre!');

					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON
					die();
					return;

				}

				if(! preg_match('/^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ. ]+$/', $datos["txtUsuario"])){

					$arrResponse=array('status'=>false,'msg'=> '¡No se permiten caracteres especiales en Usuario!');

					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON
					die();
					return;

				}

				if(! preg_match('/^[0-9]+$/', $datos["cmbPerfil"])){

					$arrResponse=array('status'=>false,'msg'=> '¡No se permiten caracteres especiales en Perfil!');

					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON
					die();
					return;

				}

				if(! preg_match('/^[0-9]+$/', $datos["cmbCiudad"])){

					$arrResponse=array('status'=>false,'msg'=> '¡No se permiten caracteres especiales en Ciudad!');

					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON
					die();
					return;

				}

			   	if($_POST["txtContrasenya"] != ""){

			   		if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["txtContrasenya"])){

			   			$password = crypt($_POST["txtContrasenya"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');  			

			   		}else{

			   			$arrResponse=array('status'=>false,'msg'=> '¡No se permiten caracteres especiales en Contraseña!');

						echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON
						die();
						return; 

			   		}

			   	}else{

			   		$password = $_POST["txtContrasenyaActual"];
			   	}


				$tabla="usuarios";

				$datos = array("txtIdUsuario" => $datos["txtIdUsuario"],
							"txtNombre" => $datos["txtNombre"],
							"txtUsuario" => $datos["txtUsuario"],
							"cmbPerfil" => $datos["cmbPerfil"],
							"cmbCiudad" => $datos["cmbCiudad"],
							"txtContrasenya" => $password,
							"estado" => $datos["estado"]);
								    
				$respuesta=ModeloAdministradores::mdlEditarUsuario($tabla, $datos);
				    
				if ($respuesta =='ok'){

					$arrResponse=array('status'=>true,'msg'=> 'Datos Guardado Correctamente');

				}else if($respuesta =='exist'){

					$arrResponse=array('status'=>false,'msg'=> '¡Atención! El mombre de usuario ya existe.');

				}else{

					$arrResponse=array('status'=>false,'msg'=> 'No es posible almacenar los datos.');
				}

				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON

				die(); //para parar la aplicacion
				
			}

	}

	/*=============================================
	Eliminar Administrador
	=============================================*/

	static public function ctrEliminarUsuario($id){

		$tabla = "usuarios";

		$respuesta = ModeloAdministradores::mdlEliminarUsuario($tabla, $id);

		if ($respuesta=='ok'){

			$arrResponse=array('status'=>true,'msg'=> 'Datos Eliminado Correctamente');

		}else if($respuesta[0]==23000){

			$arrResponse=array('status'=>false,'msg'=> 'No es posible Eliminar el dato, el mismo está siendo usado.');

		}else{

			$arrResponse=array('status'=>false,'msg'=> $respuesta[2]);

		}

		echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON
		die();

	}

}