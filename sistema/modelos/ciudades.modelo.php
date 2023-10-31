<?php

require_once "conexion.php";

class ModeloCiudades{

	/*=============================================
	Mostrar Ciudad
	=============================================*/

	static public function mdlMostrarCiudad($tabla, $item, $valor){

		if($item != null && $valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY COD_CIUDAD DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;

	}

	/*=============================================
	Registro Ciudades
	=============================================*/

	static public function mdlRegistroCiudad($tabla, $datos){

		// var_dump($datos);
		// return;

		// CONSULTAR SI YA HAY UN REGISTRO CON EL MISMO NOMBRE
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE DESCRIPCION = :ciudad");

		$stmt->bindParam(":ciudad", $datos["txtCiudad"], PDO::PARAM_STR);

		$stmt -> execute();

		$cuenta = $stmt->rowCount();

		// var_dump($cuenta);
		// return;

		if($cuenta <= 0){

			$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla (DESCRIPCION) VALUES (:ciudad)");

			$stmt->bindParam(":ciudad", $datos["txtCiudad"], PDO::PARAM_STR);

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
	Editar Ciudad
	=============================================*/

	static public function mdlEditarCiudad($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET DESCRIPCION = :ciudad WHERE COD_CIUDAD = :id");

		$stmt->bindParam(":ciudad", $datos["txtCiudad"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["txtIdCiudad"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";
    	
		}

		$stmt-> close();

		$stmt = null;

	}

	/*=============================================
	Validar existencia de de ciudad
	=============================================*/

	static public function mdlValidarCiudad($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;

	}

	/*=============================================
	Eliminar Categoria
	=============================================*/

	static public function mdlEliminarCiudad($tabla, $id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE COD_CIUDAD = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			// echo "\nPDO::errorInfo():\n";
   //  		print_r(Conexion::conectar()->errorInfo());
			"\nPDO::errorInfo():\n";
			return ($stmt->errorInfo());

		}

		$stmt -> close();

		$stmt = null;

	}


}