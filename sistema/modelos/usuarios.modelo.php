<?php

require_once "conexion.php";

class ModeloAdministradores{

	/*=============================================
	Mostrar Usuarios
	=============================================*/
	static public function mdlMostrarAdministradores($tabla1, $tabla2, $item, $valor){

		if($item != null && $valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla1 AS u INNER JOIN $tabla2 AS p ON u.id_perfil = p.id_perfil WHERE $item = :$item");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla1 AS u INNER JOIN $tabla2 AS p ON u.id_perfil = p.id_perfil");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;

	}

	/*============================================================
		GUARDAR USUARIOS
 	==============================================================*/
	static public function mdlGuardarUsuario($tabla, $datos){

		// var_dump($datos);
		// return;

		// CONSULTAR SI YA HAY UN REGISTRO CON EL MISMO NOMBRE Y USUARIO
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE usuario = :usuario AND estado = 1");

		$stmt->bindParam(":usuario", $datos["txtUsuario"], PDO::PARAM_STR);
		// $stmt->bindParam(":contrasenya", $datos["txtContrasenya"], PDO::PARAM_STR);

		$stmt -> execute();

		$cuenta = $stmt->rowCount();

		// var_dump($cuenta);
		// return;

		if($cuenta <= 0){

			$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, usuario, password, id_perfil, id_ciudad, estado) VALUES (:nombre, :usuario, :contrasenya, :perfil, :ciudad, 1)");

			$stmt->bindParam(":nombre",($datos["txtNombre"]),PDO::PARAM_STR);
			$stmt->bindParam(":usuario", $datos["txtUsuario"], PDO::PARAM_STR);
			$stmt->bindParam(":contrasenya", $datos["txtContrasenya"], PDO::PARAM_STR);
			$stmt->bindParam(":perfil",($datos["cmbPerfil"]),PDO::PARAM_STR);
			$stmt->bindParam(":ciudad", $datos["cmbCiudad"], PDO::PARAM_STR);

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
		EDITAR USUARIO
	=============================================*/

	static public function mdlEditarUsuario($tabla, $datos){

		// var_dump($datos);
		// return;

		// CONSULTAR SI YA HAY UN REGISTRO CON EL MISMO NOMBRE Y USUARIO
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE usuario = :usuario AND estado = 1 AND id_u != :id");

		$stmt->bindParam(":usuario", $datos["txtUsuario"], PDO::PARAM_STR);
		$stmt->bindParam(":id",($datos["txtIdUsuario"]),PDO::PARAM_STR);

		$stmt -> execute();

		$cuenta = $stmt->rowCount();

		// var_dump($cuenta);
		// return;

		if($cuenta <= 0){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, usuario = :usuario, password = :contrasenya, id_perfil = :perfil, id_ciudad = :ciudad WHERE id_u = :id");

			$stmt->bindParam(":id",($datos["txtIdUsuario"]),PDO::PARAM_INT);
			$stmt->bindParam(":nombre",($datos["txtNombre"]),PDO::PARAM_STR);
			$stmt->bindParam(":usuario", $datos["txtUsuario"], PDO::PARAM_STR);
			$stmt->bindParam(":contrasenya", $datos["txtContrasenya"], PDO::PARAM_STR);
			$stmt->bindParam(":perfil",($datos["cmbPerfil"]),PDO::PARAM_INT);
			$stmt->bindParam(":ciudad", $datos["cmbCiudad"], PDO::PARAM_INT);

			// var_dump($stmt);

			if($stmt -> execute()){

				return "ok";

			}else{

				return "error";
				// echo "\nPDO::errorInfo():\n";
    // 			print_r(Conexion::conectar()->errorInfo());

			}

		}else{

			return "exist";

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	Eliminar Administrador
	=============================================*/

	static public function mdlEliminarUsuario($tabla, $id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_u = :id");

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
	Activar Usuario
	=============================================*/

	static public function mdlActivarUsuario($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item2 = :$item2 WHERE $item1 = :$item1");

		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());

		}

		$stmt -> close();

		$stmt = null;

	}

}