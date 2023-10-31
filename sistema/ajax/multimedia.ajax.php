<?php
require_once "../modelos/tareas.modelo.php";
	#RECIBIR ARCHIVOS MULTIMEDIA
#-----------------------------------------------------------
	if(isset($_FILES["file"])){

		// var_dump($_POST['rutavieja']);
		// return null;

	/*=============================================
	SUBIR MULTIMEDIA
	=============================================*/

	if(isset($_FILES["file"]["tmp_name"]) && $_FILES["file"]["tmp_name"] !="" ){
			
			$guardarRuta=[];
			
			$directorio = "../vistas/img/".$_POST["carpeta"];
			$destino;

			if (!file_exists($directorio)){

				mkdir($directorio, 0755);
					
			}
		
		   	if($_POST["ruta"] != ""){

			   	$ruta = array();
					
				$aleatorio = md5(uniqid(rand(),true));

				$destino=strtolower($directorio."/".$aleatorio.".jpg");

				array_push($ruta, $destino);

				array_push($guardarRuta, substr($ruta[0], 3));

			}

			// var_dump($_POST['tabla'], $_POST['foto_columna'], json_encode($guardarRuta), $_POST['token_columna'], $_POST['token']);
			// return;
			
			
			$actualizar=ModeloTareas::mdlActualizarVarios($_POST['tabla'], $_POST['foto_columna'], json_encode($guardarRuta), $_POST['token_columna'], $_POST['token'], $_POST['rutavieja']);

			if($actualizar=="ok"){

					/*TAMAÑO DE IMAGEN
					=============================================*/
					function compress($source, $destination, $quality) {

						$info = getimagesize($source);

						if ($info['mime'] == 'image/jpeg'){

							$image = imagecreatefromjpeg($source);
							imagejpeg($image, $destination, $quality);
							return $destination;

						}elseif ($info['mime'] == 'image/gif'){

							$image = imagecreatefromgif($source);
							imagegif($image, $destination, $quality);
							return $destination;

						}elseif ($info['mime'] == 'image/png'){
						    	
							$image = imagecreatefrompng($source);
							imagepng($image, $destination, 9);
							return $destination;
						}
					}

					/*=============================================*/


					$tamaño=filesize($_FILES["file"]["tmp_name"]);
					$comprimir;


					$ruta = compress($_FILES["file"]["tmp_name"], $destino, 100);

					if(file_exists($ruta)){
					
						$mensaje=array('status'=>200,'msg'=> 'Archivos subido con Éxito');
						echo json_encode($mensaje,JSON_UNESCAPED_UNICODE);
						die();

					}else{

						$mensaje=array('status'=>400,'msg'=> 'Hubo un error al subir el archivo');
						echo json_encode($mensaje,JSON_UNESCAPED_UNICODE);
						die();
					
					}


				}


	}




}
	