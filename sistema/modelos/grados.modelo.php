<?php

require_once "conexion.php";

class ModeloGrados{

	/*=============================================
	Mostrar Grados
	=============================================*/

	static public function mdlMostrarGrado($tabla, $item, $valor){

		if($item != null && $valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_grado DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;

	}

	/*=============================================
	Registro Grados
	=============================================*/

	static public function mdlRegistroGrado($tabla, $datos){

		// var_dump($datos);
		// return;

		// CONSULTAR SI YA HAY UN REGISTRO CON EL MISMO NOMBRE
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE descripcion_grado = :grado");

		$stmt->bindParam(":grado", $datos["txtgrado"], PDO::PARAM_STR);

		$stmt -> execute();

		$cuenta = $stmt->rowCount();

		// var_dump($cuenta);
		// var_dump($tabla);
		// return;

		if($cuenta <= 0){

			$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla (descripcion_grado, estado_grado) VALUES (:grado, 1)");

			$stmt->bindParam(":grado", $datos["txtGrado"], PDO::PARAM_STR);

			 // var_dump($stmt);

			if ($stmt-> execute()){

				return "ok";

			}else{

			   	return "error";
			}
				
		}else{

			return "exist";

		}

	}

	/*=============================================
	Editar Grado
	=============================================*/

	static public function mdlEditarGrado($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET descripcion_grado = :grado WHERE id_grado = :id");

		$stmt->bindParam(":grado", $datos["txtGrado"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["idGrado"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";
    	
		}

		$stmt-> close();

		$stmt = null;

	}

	/*=============================================
	Eliminar Grado
	=============================================*/

	static public function mdlEliminarGrado($tabla, $id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_grado = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

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