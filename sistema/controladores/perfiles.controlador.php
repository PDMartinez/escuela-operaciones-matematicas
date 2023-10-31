<?php

Class ControladorPerfiles{

	/*=============================================
	MOSTRAR PERFILES
	=============================================*/

	static public function ctrMostrarPerfil($item, $valor){

		$tabla = "perfiles";

		$respuesta = ModeloPerfiles::mdlMostrarPerfil($tabla, $item, $valor);
		// var_dump($respuesta);
		return $respuesta;

	}

	/*============================================================
			GUARDAR PERFILES
 	==============================================================*/
	static public function ctrGuardarPerfil($datos){

			if(isset($datos["txtPerfil"])){
				// var_dump($datos);
				// return;

				if(! preg_match('/^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ. ]+$/', $datos["txtPerfil"])){

					$arrResponse=array('status'=>false,'msg'=> '¡No se permiten caracteres especiales en Perfil!');

					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON
					die();
					return;

				}

				if(! preg_match('/^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ. ]+$/', $datos["txtDescripcionPerfil"])){

					$arrResponse=array('status'=>false,'msg'=> '¡No se permiten caracteres especiales en la Descripción del Perfil!');

					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON
					die();
					return;

				}

				$tabla="perfiles";

				$datos= array("txtPerfil"=>$datos["txtPerfil"],
								"txtDescripcionPerfil"=>$datos["txtDescripcionPerfil"]);
								    
				$respuesta=ModeloPerfiles::mdlGuardarPerfil($tabla, $datos);
				    
				if ($respuesta =='ok'){

					$arrResponse=array('status'=>true,'msg'=> 'Datos Guardado Correctamente');

				}else if($respuesta =='exist'){

					$arrResponse=array('status'=>false,'msg'=> '¡Atención! El dato ya existe.');

				}else{

					$arrResponse=array('status'=>false,'msg'=> 'No es posible almacenar los datos.');
				}

				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON

				die(); //para parar la aplicacion
				
			}

	}

	/*=============================================
		EDITAR PERFIL
	=============================================*/

	static public function ctrEditarPerfil($datos){

		if(isset($datos["txtPerfil"])){

				// var_dump($datos);
				// return;

				if(! preg_match('/^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ. ]+$/', $datos["txtPerfil"])){

					$arrResponse=array('status'=>false,'msg'=> '¡No se permiten caracteres especiales en Perfil!');

					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON
					die();
					return;

				}

				if(! preg_match('/^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ. ]+$/', $datos["txtDescripcionPerfil"])){

					$arrResponse=array('status'=>false,'msg'=> '¡No se permiten caracteres especiales en la Descripción del Perfil!');

					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON
					die();
					return;

				}

				$tabla="perfiles";

				$datos= array("txtPerfil"=>$datos["txtPerfil"],
								"txtDescripcionPerfil"=>$datos["txtDescripcionPerfil"],
								"txtIdPerfil"=>$datos["txtIdPerfil"]);
								    
				$respuesta=ModeloPerfiles::mdlEditarPerfil($tabla, $datos);
				    
				if ($respuesta =='ok'){

					$arrResponse=array('status'=>true,'msg'=> 'Datos Guardado Correctamente');

				}else if($respuesta =='exist'){

					$arrResponse=array('status'=>false,'msg'=> '¡Atención! El dato ya existe.');

				}else{

					$arrResponse=array('status'=>false,'msg'=> 'No es posible almacenar los datos.');
				}

				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON

				die(); //para parar la aplicacion
				
			}

	}

	/*=============================================
		ELIMINAR PERFIL
	=============================================*/

	static public function ctrEliminarPerfil($datos){

		// var_dump($datos);
		// return;

		if(isset($datos)){

			$tabla ="perfiles";
			$valor = $datos;
			$item = "id_perfil";
			
			$respuesta = ModeloPerfiles::mdlEliminarPerfil($tabla,$item, $valor);

			// var_dump($respuesta);
			// return;
			
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

}