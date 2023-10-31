<?php

class ControladorGrados{

	/*=============================================
	Mostrar Grados
	=============================================*/

	static public function ctrMostrarGrado($item, $valor){

		$tabla = "grados";

		$respuesta = ModeloGrados::mdlMostrarGrado($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	Registro de Grados
	=============================================*/

	public function ctrRegistroGrado($datos){

		if(isset($datos["txtGrado"])){

			if(! preg_match('/^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ. ]+$/', $datos["txtGrado"])){

				$arrResponse=array('status'=>false,'msg'=> '¡No se permiten caracteres especiales en Grado!');

				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON
				die();
				return;

			}

			$tabla="grados";

			$datos= array("txtGrado"=>$datos["txtGrado"]);
								    
			$respuesta=ModeloGrados::mdlRegistroGrado($tabla, $datos);
				    
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
	Editar Grados
	=============================================*/

	public function ctrEditarGrado($datos){

		if(isset($datos["txtIdGrado"])){

			if(preg_match('/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/',$datos["txtGrado"])){

			   	$tabla = "grados";

			   	$datos = array("idGrado"=> $datos["txtIdGrado"],
			   		           "txtGrado" => strtoupper($datos["txtGrado"]));

				$respuesta = ModeloGrados::mdlEditarGrado($tabla, $datos);

				if ($respuesta =='ok'){

					$arrResponse=array('status'=>true,'msg'=> 'Datos Guardado Correctamente');

				}else if($respuesta =='exist'){

					$arrResponse=array('status'=>false,'msg'=> '¡Atención! El dato ya existe');

				}else{

					$arrResponse=array('status'=>false,'msg'=> 'No es posible almacenar los datos');
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
	Eliminar Grados
	=============================================*/

	static public function ctrEliminarGrado($id){
		
		$tabla = "grados";

		$respuesta = ModeloGrados::mdlEliminarGrado($tabla, $id);

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