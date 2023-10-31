<?php 

	require_once "conexion.php";

	class ModeloTareas{
		
		/*============================================================
			MOSTRAR TAREAS
 		==============================================================*/

		static public function mdlMostrarTarea($tabla, $item, $valor, $var, $order){

			if($valor != null && $var!=null){

				$stmt = Conexion::conectar()->prepare("SELECT id_tarea, t.id_grado, t.id_materia, descripcion_grado, descripcion_materia, descripcion_tarea, video_tarea, img_tarea, img_resultado, resultado, date_format(fecha_tarea, '%d-%m-%Y %H:%i:%s') AS fecha, estado_tarea FROM tareas AS t INNER JOIN grados AS g ON t.id_grado = g.id_grado INNER JOIN materias AS m ON t.id_materia = m.id_materia WHERE $item = :$item ORDER BY $order ");
	           			
				$stmt -> bindParam(":$item",  $valor, PDO::PARAM_STR);

				$stmt -> execute();
				
				return $stmt -> fetch();

			}else if($valor != null && $var==null){

				$stmt = Conexion::conectar()->prepare("SELECT id_tarea, descripcion_grado, descripcion_materia, descripcion_tarea, video_tarea, img_tarea, img_resultado, resultado, date_format(fecha_tarea, '%d-%m-%Y %H:%i:%s') AS fecha, estado_tarea FROM tareas AS t INNER JOIN grados AS g ON t.id_grado = g.id_grado INNER JOIN materias AS m ON t.id_materia = m.id_materia WHERE $item = :$item ORDER BY $order ");
	           			
				$stmt -> bindParam(":$item",  $valor, PDO::PARAM_STR);

				$stmt -> execute();
				
				return $stmt -> fetchAll();
			
			}else{

	 			$stmt=Conexion::conectar()->prepare("SELECT id_tarea, descripcion_grado, descripcion_materia, descripcion_tarea, video_tarea, img_tarea, img_resultado, resultado, date_format(fecha_tarea, '%d-%m-%Y %H:%i:%s') AS fecha, estado_tarea FROM tareas AS t INNER JOIN grados AS g ON t.id_grado = g.id_grado INNER JOIN materias AS m ON t.id_materia = m.id_materia ORDER BY $order");

	 			$stmt->execute();

	 			return $stmt-> fetchAll();
	 		}

	 		$stmt-> close();
			$stmt= null;
		}


		/*============================================================
			CREAR TAREA
 		==============================================================*/
		static public function mdlIngresarTarea($tabla, $datos){

			// var_dump($datos);
			// return;
			// CONSULTAR SI YA HAY UN REGISTRO CON EL MISMO NOMBRE

			// $stmt = Conexion::conectar()->prepare("SELECT * FROM diccionario WHERE guarani = :guarani");

			// $stmt->bindParam(":guarani", $datos["txtGuarani"], PDO::PARAM_STR);

			// $stmt -> execute();

			// $cuenta = $stmt->rowCount();

			// if($cuenta <= 0){

				$connection = Conexion::conectar();

				$stmt = $connection->prepare("INSERT INTO $tabla(id_grado, id_materia, descripcion_tarea, video_tarea, resultado, estado_tarea) VALUES (:grado, :materia, :tarea, :video, :resultado, 1)");

				$stmt->bindParam(":grado", $datos["txtGrado"], PDO::PARAM_INT);
				$stmt->bindParam(":materia",$datos["txtMateria"],PDO::PARAM_INT);
				$stmt->bindParam(":tarea",$datos["txtTarea"],PDO::PARAM_STR);
				$stmt->bindParam(":video",$datos["txtVideo"],PDO::PARAM_STR);
				$stmt->bindParam(":resultado",$datos["txtResultado"],PDO::PARAM_STR);

			 	// var_dump($stmt);

			   if ($stmt-> execute()){

			   		$id = $connection->lastInsertId();

					return "ok/".$id;

			   }else{

			   		return "\nPDO::errorInfo():\n";
    				print_r(Conexion::conectar()->errorInfo());
			   }
				
			// }else{

			// 	return "exist";

			// }

		}

		/*=============================================
			EDITAR TAREA
		=============================================*/

		static public function mdlEditarTarea($tabla, $datos){

			// var_dump($datos);
			// return;

			// CONSULTAR SI YA HAY UN REGISTRO CON EL MISMO NOMBRE

			$stmt = Conexion::conectar()->prepare("SELECT * FROM tareas WHERE descripcion_tarea = :descripcion_tarea AND id_tarea != :idTarea");

			$stmt->bindParam(":descripcion_tarea", $datos["descripcion_tarea"], PDO::PARAM_STR);
			$stmt->bindParam(":idTarea", $datos["idTarea"],PDO::PARAM_INT);

			$stmt -> execute();

			$cuenta = $stmt->rowCount();

			// var_dump($cuenta);
			// return;

			if($cuenta <= 0){

				$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET id_grado = :grado, id_materia = :materia, descripcion_tarea = :tarea, video_tarea = :video, resultado = :resultado WHERE id_tarea = :idTarea");

				$stmt->bindParam(":idTarea", $datos["idTarea"], PDO::PARAM_INT);
				$stmt->bindParam(":grado", $datos["txtGrado"], PDO::PARAM_INT);
				$stmt->bindParam(":materia",$datos["txtMateria"],PDO::PARAM_INT);
				$stmt->bindParam(":tarea",$datos["txtTarea"],PDO::PARAM_STR);
				$stmt->bindParam(":video",$datos["txtVideo"],PDO::PARAM_STR);
				$stmt->bindParam(":resultado",$datos["txtResultado"],PDO::PARAM_STR);


				if($stmt -> execute()){

					return "ok";
				
				}else{

					echo "\nPDO::errorInfo():\n";
		    		print_r(Conexion::conectar()->errorInfo());

				}

				$stmt -> close();
				$stmt = null;

			}else{
				
				return "exist";

			}

		}

		/*=============================================
			ELIMINAR TAREA
		=============================================*/

		static public function mdlEliminarTarea($tabla, $item, $valor){

			// var_dump($tabla, $item, $valor);
			// return;

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $item = :valor");
			$stmt -> bindParam(":valor", $valor, PDO::PARAM_STR);
			$stmt -> execute();

			if($stmt -> execute()){

				return "ok";
								
			}else{
								
				"\nPDO::errorInfo():\n";
				return ($stmt->errorInfo());
			}

		}


		/*=============================================
		ACTUALIZAR TAREA
		=============================================*/

		static public function mdlActualizarTarea($tabla, $item1, $valor1, $item2, $valor2){

			// var_dump($tabla, $item1, $valor1, $item2, $valor2);
			// return;

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

			$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

			if($stmt -> execute()){

				return "ok";
			
			}else{

				"\nPDO::errorInfo():\n";
				return ($stmt->errorInfo());

			}

			$stmt -> close();

			$stmt = null;

		}

		/*=============================================
		ACTUALIZAR varios
		=============================================*/

		static public function mdlActualizarVarios($tabla, $item1, $valor1, $item2, $valor2, $rutaVieja){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1=:$item1 WHERE $item2=:$item2");
			
			$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

			if($stmt -> execute()){

				if($rutaVieja != ""){

					unlink("../".$rutaVieja);

				}

				return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;

		}


	}
