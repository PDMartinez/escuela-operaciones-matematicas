<?php

require_once "conexion.php";

class ModeloMaterias{

	/*=============================================
	Mostrar Materias
	=============================================*/

	static public function mdlMostrarMateria($tabla, $item, $valor){

		if($item != null && $valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_materia DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;

	}

	/*=============================================
	Registro Materias
	=============================================*/

	static public function mdlRegistroMateria($tabla, $datos){

		// var_dump($datos);
		// return;

		// CONSULTAR SI YA HAY UN REGISTRO CON EL MISMO NOMBRE
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE descripcion_materia = :materia");

		$stmt->bindParam(":materia", $datos["txtMateria"], PDO::PARAM_STR);

		$stmt -> execute();

		$cuenta = $stmt->rowCount();

		// var_dump($cuenta);
		// return;

		if($cuenta <= 0){

			$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla (descripcion_materia, estado_materia) VALUES (:materia, 1)");

			$stmt->bindParam(":materia", $datos["txtMateria"], PDO::PARAM_STR);

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
	Editar Materias
	=============================================*/

	static public function mdlEditarMateria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET descripcion_materia = :materia WHERE id_materia = :id");

		$stmt->bindParam(":materia", $datos["txtMateria"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["idMateria"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";
    	
		}

		$stmt-> close();

		$stmt = null;

	}

	/*=============================================
	Eliminar Materias
	=============================================*/

	static public function mdlEliminarMateria($tabla, $id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_materia = :id");

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

	/*=============================================
	Validar existencia de de ciudad
	=============================================*/

	// static public function mdlValidarCiudad($tabla, $item, $valor){

	// 	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

	// 	$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

	// 	$stmt -> execute();

	// 	return $stmt -> fetchAll();

	// 	$stmt-> close();

	// 	$stmt = null;

	// }


}