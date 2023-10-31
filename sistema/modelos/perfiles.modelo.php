<?php 

	require_once "conexion.php";

	class ModeloPerfiles{
		
		/*============================================================
					MOSTRAR PERFILES
 		==============================================================*/

		static public function mdlMostrarPerfil($tabla, $item, $valor){

			if($item != null && $valor!=null){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ");
		           			
				$stmt -> bindParam(":$item",  $valor, PDO::PARAM_STR);

				$stmt -> execute();
					
				return $stmt -> fetch();
				
			}else{

		 		$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla");

		 		$stmt->execute();

		 		// var_dump($stmt);

		 		return $stmt-> fetchAll();
		 	}

		 	$stmt-> close();
			$stmt= null;

		}


		/*============================================================
					GUARDAR PERFILES
 		==============================================================*/
		static public function mdlGuardarPerfil($tabla, $datos){

			// var_dump($datos);
			// return;

			// CONSULTAR SI YA HAY UN REGISTRO CON EL MISMO NOMBRE
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE nombre_perfil = :perfil AND estado = 1");

			$stmt->bindParam(":perfil", $datos["txtPerfil"], PDO::PARAM_STR);

			$stmt -> execute();

			$cuenta = $stmt->rowCount();

			// var_dump($cuenta);
			// return;

			if($cuenta <= 0){

				$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_perfil, descripcion_perfil, estado) VALUES (:perfil, :descripcionPerfil, 1)");

				$stmt->bindParam(":perfil",($datos["txtPerfil"]),PDO::PARAM_STR);
				$stmt->bindParam(":descripcionPerfil", $datos["txtDescripcionPerfil"], PDO::PARAM_STR);

			 	// var_dump($stmt);

			   if ($stmt-> execute()){

					return "ok";

			   }else{

			   		return "error";
			   }
				
			}else{

				return "exist";

			}

			$stmt -> close();

			$stmt = null;

		}

		/*=============================================
					EDITAR PERFIL
		=============================================*/

		static public function mdlEditarPerfil($tabla, $datos){

			// var_dump($datos);
			// return;

			$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET nombre_perfil = :perfil, descripcion_perfil = :descripcionPerfil WHERE id_perfil = :idPerfil");
				
				$stmt->bindParam(":perfil",($datos["txtPerfil"]),PDO::PARAM_STR);
				$stmt->bindParam(":descripcionPerfil", $datos["txtDescripcionPerfil"], PDO::PARAM_STR);
				$stmt->bindParam(":idPerfil",($datos["txtIdPerfil"]),PDO::PARAM_INT);


			if($stmt -> execute()){

				return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;

		}

		/*=============================================
				ELIMINAR PERFIL
		=============================================*/

		static public function mdlEliminarPerfil($tabla, $item, $valor){

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $item = :valor");
			$stmt -> bindParam(":valor", $valor, PDO::PARAM_STR);
			$stmt -> execute();

			if($stmt -> execute()){

				return "ok";
								
			}else{							
				"\nPDO::errorInfo():\n";
				return ($stmt->errorInfo());
			}

			$stmt -> close();

			$stmt = null;

		}

	}
