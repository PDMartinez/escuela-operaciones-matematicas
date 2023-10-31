<?php

class ControladorMenu{

	/*=============================================
	Mostrar Menu
	=============================================*/

	static public function ctrMostrarMenu($item, $valor){

		$tabla = "menus";

		$respuesta = ModeloMenu::mdlMostrarMenu($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	Registro de Menu
	=============================================*/

	public function ctrRegistroMenu(){



		if(isset($_POST["tituloMenu"])){

			
			$tabla = "menus";

			$datos = array('tituloMenu' =>strtoupper($_POST['tituloMenu']),
							'rutaMenu' =>strtolower($_POST['rutaMenu']));
			//var_dump($datos);
			$respuesta = ModeloMenu::mdlRegistroMenu($tabla,$datos);

			if($respuesta == "ok"){

				echo '<script>

					swal({
						type:"success",
					  	title: "¡CORRECTO!",
					  	text: "¡El registro ha sido creada exitosamente!",
					  	showConfirmButton: true,
						confirmButtonText: "Cerrar"
					  
					}).then(function(result){

							if(result.value){   
							    window.location = "menu";
							  } 
					});

				</script>';

			}	

		}

	}

	/*=============================================
	Editar Menu
	=============================================*/

	public function ctrEditarMenu(){
				
		if(isset($_POST["idMenu"])){

					
				$tabla = "menus";
				$datos = array('tituloMenu' =>strtoupper($_POST['EditartituloMenu']),
							'rutaMenu' => strtolower($_POST['EditarrutaMenu']),
							'id'=>$_POST["idMenu"]);
				var_dump($datos);
				$respuesta = ModeloMenu::mdlEditarMenu($tabla, $datos);

				if($respuesta == "ok"){

					echo '<script>

						swal({
							type:"success",
						  	title: "¡CORRECTO!",

						  	text: "¡El Menu ha sido actualizada!",
						  	showConfirmButton: true,
							confirmButtonText: "Cerrar"
						  
						}).then(function(result){

								if(result.value){   
								    history.back();
								  } 
						});

					</script>';

				}
		

		}	

	}

	/*=============================================
	Eliminar Menu
	=============================================*/

	static public function ctrEliminarMenu($id, $ruta){
		
		$tabla = "menus";

		$respuesta = ModeloMenu::mdlEliminarMenu($tabla, $id);

		return $respuesta;

	}

}