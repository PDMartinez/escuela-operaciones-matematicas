<?php

class ControladorMaterias{

	/*=============================================
	Mostrar Materias
	=============================================*/

	static public function ctrMostrarMateria($item, $valor){

		$tabla = "materias";

		$respuesta = ModeloMaterias::mdlMostrarMateria($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	Registro de Materias
	=============================================*/

	public function ctrRegistroMateria($datos){

		if(isset($datos["txtMateria"])){

			if(! preg_match('/^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ. ]+$/', $datos["txtMateria"])){

				$arrResponse=array('status'=>false,'msg'=> '¡No se permiten caracteres especiales en Materia!');

				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON
				die();
				return;

			}

			$tabla="materias";

			$datos= array("txtMateria"=>$datos["txtMateria"]);
								    
			$respuesta=ModeloMaterias::mdlRegistroMateria($tabla, $datos);
				    
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
	Editar Materias
	=============================================*/

	public function ctrEditarMateria($datos){

		if(isset($datos["txtIdMateria"])){

			if(preg_match('/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/',$datos["txtMateria"])){

			   	$tabla = "materias";

			   	$datos = array("idMateria"=> $datos["txtIdMateria"],
			   		           "txtMateria" => strtoupper($datos["txtMateria"]));

				$respuesta = ModeloMaterias::mdlEditarMateria($tabla, $datos);

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
	Eliminar Materias
	=============================================*/

	static public function ctrEliminarMateria($id){
		
		$tabla = "materias";

		$respuesta = ModeloMaterias::mdlEliminarMateria($tabla, $id);

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

	/*=============================================
	Validar existencia de ciudades
	=============================================*/

	// static public function ctrValidarCiudad($item, $valor){

	// 	$tabla = "ciudades";

	// 	$respuesta = ModeloCiudades::mdlValidarCiudad($tabla, $item, $valor);

	// 	return $respuesta;

	// }

}