<?php 

	class ControladorTareas{

		/*=============================================
			MOSTRAR TAREAS
		=============================================*/

		static public function ctrMostrarTarea($item, $valor, $var, $order){

			$tabla = "tareas";

			$respuesta = ModeloTareas::mdlMostrarTarea($tabla, $item, $valor, $var, $order);

			return $respuesta;

		}


		/*============================================================
			CREAR TAREA
 		==============================================================*/
		static public function ctrCrearTarea($datos){

			if(isset($datos["txtTarea"])){
				// var_dump($datos);
				// return;
				//validamos los datos nuevamente
				// if(preg_match('/^[a-zA-ZñÑáÁéÉíÍóÓúÚÃẼĨÑÕŨỸãẽĩõũỹ., ]+$/', $datos["txtGuarani"]) && preg_match('/^[a-zA-ZñÑáÁéÉíÍóÓúÚ., ]+$/', $datos["txtEspanyol"])){

				    $tabla="tareas";


				    $datos = array("idTarea" => $datos["idTarea"],
							"txtGrado" => $datos["txtGrado"],
							"txtMateria" => $datos["txtMateria"],
							"txtTarea" => $datos["txtTarea"],
							"txtVideo" => $datos["txtVideo"],
							"txtResultado" => $datos["txtResultado"]);
								    
				    $respuesta=ModeloTareas::mdlIngresarTarea($tabla, $datos);

					//SEPARAMOS EL ULTIMO ID GUARDADO
				    $id_tarea;
					$nombres = explode("/", $respuesta);
					$respuesta = $nombres[0];
					$id_tarea = $nombres[1];

					// var_dump($id_tarea);
					// return;

				    
				    if ($respuesta =='ok'){

						$arrResponse=array('status'=>true,'msg'=> 'Datos Guardado Correctamente','id_tarea'=>$id_tarea);

					}else if($respuesta =='exist'){

						$arrResponse=array('status'=>false,'msg'=> '¡Atención! El dato ya existe.');

					}else{

						$arrResponse=array('status'=>false,'msg'=> 'No es posible almacenar los datos.');
					}

					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON

					die(); //para parar la aplicacion

				// }else{

				// 	$arrResponse=array('status'=>false,'msg'=> '¡No se permiten caracteres especiales en ninguno de los campos!');

				// 	echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON

				// 	die();
				// }
				
			}

		}


		/*============================================================
			EDITAR TAREA
 		==============================================================*/
 		static public function ctrEditarTarea($datos){

			if(isset($datos["txtTarea"])){

				// var_dump($datos);
				// return;

				//validamos los datos nuevamente
				// if(preg_match('/^[a-zA-ZñÑáÁéÉíÍóÓúÚÃẼĨÑÕŨỸãẽĩõũỹ., ]+$/', $datos["txtTarea"])){

				    $tabla="tareas";

				    $datos = array("idTarea" => $datos["idTarea"],
							"txtGrado" => $datos["txtGrado"],
							"txtMateria" => $datos["txtMateria"],
							"txtTarea" => $datos["txtTarea"],
							"txtVideo" => $datos["txtVideo"],
							"txtResultado" => $datos["txtResultado"]);

				    $respuesta=ModeloTareas::mdlEditarTarea($tabla, $datos);
				    
				    if ($respuesta=='ok'){

						$arrResponse=array('status'=>true,'msg'=> 'Datos Actualizado correctamente','id_tarea'=>0);

					}else if($respuesta =='exist'){

						$arrResponse=array('status'=>false,'msg'=> '¡Atención! El dato ya existe. Verifique intérvalo de montos');

					}else{

						$arrResponse=array('status'=>false,'msg'=> 'No es posible Actualizar los datos.');

					}

					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON

					die();

				// }else{

				// 	$arrResponse=array('status'=>false,'msg'=> '¡No se permiten caracteres especiales en ninguno de los campos!');

				// 	echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON

				// 	die();
				// }
				
			}

		}

		/*============================================================
			BORRAR TAREA
 		==============================================================*/

		static public function ctrBorrarTarea($datos){

			$tabla ="tareas";
			$valor = $datos["idEliminar"];
			$item = "id_tarea";

			// var_dump($datos);
			// return;
				
			$respuesta = ModeloTareas::mdlEliminarTarea($tabla, $item, $valor);
				
			if ($respuesta=='ok'){

				// Eliminamos fotos de la galería
				if($datos["galeria"]!=""){

					unlink("../".$datos["galeria"]);

				}
				if($datos["galeria1"]!=""){

					unlink("../".$datos["galeria1"]);

				}

				$arrResponse=array('status'=>true,'msg'=> 'Datos Eliminado Correctamente');

			}else if($respuesta[0]==23000){

				$arrResponse=array('status'=>false,'msg'=> 'No es posible Eliminar el dato, el mismo está siendo usado.');

			}else{

				$arrResponse=array('status'=>false,'msg'=> $respuesta[2]);
			}

			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON
			die();
			
		}

		/*============================================================
			ACTUALIZAR TAREA
 		==============================================================*/
 		static public function ctrActualizarTarea($tabla, $item1, $valor1, $item2, $valor2){

				// var_dump($datos);
				// return;

				//validamos los datos nuevamente
				    
				    $respuesta=ModeloTareas::mdlActualizarTarea($tabla, $item1, $valor1, $item2, $valor2);
				    
				    if ($respuesta=='ok'){

						$arrResponse=array('status'=>true,'msg'=> 'Datos Actualizado correctamente');

					}else{

						$arrResponse=array('status'=>false,'msg'=> 'No es posible Actualizar los datos.');

					}

					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // convertimos en JSON

					die();
				

		}


	}
