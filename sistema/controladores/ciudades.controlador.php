<?php

class ControladorCiudades{

	/*=============================================
	Mostrar Carreras
	=============================================*/

	static public function ctrMostrarCiudad($item, $valor){

		$tabla = "ciudades";

		$respuesta = ModeloCiudades::mdlMostrarCiudad($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	Registro de Carreras
	=============================================*/

	public function ctrRegistroCiudad($datos){

		if(isset($datos["txtCiudad"])){

			if(! preg_match('/^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ. ]+$/', $datos["txtCiudad"])){

				$arrResponse=array('status'=>false,'msg'=> '¡No se permiten caracteres especiales en Ciudad!');

				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON
				die();
				return;

			}

			$tabla="ciudades";

			$datos= array("txtCiudad"=>$datos["txtCiudad"]);
								    
			$respuesta=ModeloCiudades::mdlRegistroCiudad($tabla, $datos);
				    
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
	Editar Ciudades
	=============================================*/

	public function ctrEditarCiudad($datos){

		if(isset($datos["idCiudad"])){

			if(preg_match('/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/',$datos["nombreCiudad"])){

			   	$tabla = "ciudades";

			   	$datos = array("id"=> $datos["idCiudad"],
			   		           "ciudad" => strtoupper($datos["nombreCiudad"]));

				$respuesta = ModeloCiudades::mdlEditarCiudad($tabla, $datos);

				if ($respuesta =='ok'){

					$arrResponse=array('status'=>true,'msg'=> 'Datos Guardado Correctamente');

				}else if($respuesta =='exist'){

					$arrResponse=array('status'=>false,'msg'=> '¡Atención! El dato ya existe.');

				}else{

					$arrResponse=array('status'=>false,'msg'=> 'No es posible almacenar los datos.');
				}

				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON
				die(); //para parar la aplicacion

			}else{

			 	$arrResponse=array('status'=>false,'msg'=> '¡No se permiten caracteres especiales en ninguno de los campos!');
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON
					die();

			}	

		}

		if(isset($datos["txtCiudad"])){

			if(! preg_match('/^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ. ]+$/', $datos["txtCiudad"])){

				$arrResponse=array('status'=>false,'msg'=> '¡No se permiten caracteres especiales en Ciudad!');

				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON
				die();
				return;

			}

			$tabla="ciudades";

			$datos= array("txtCiudad"=>$datos["txtCiudad"],
						"txtIdCiudad"=>$datos["txtIdCiudad"]);
								    
			$respuesta=ModeloCiudades::mdlEditarCiudad($tabla, $datos);
				    
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
	Validar existencia de ciudades
	=============================================*/

	static public function ctrValidarCiudad($item, $valor){

		$tabla = "ciudades";

		$respuesta = ModeloCiudades::mdlValidarCiudad($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	Eliminar Categoria
	=============================================*/

	static public function ctrEliminarCiudad($id){
		
	
		$tabla = "ciudades";

		$respuesta = ModeloCiudades::mdlEliminarCiudad($tabla, $id);

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