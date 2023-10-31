<?php

require_once "conexion.php";

class ModeloMenu{

	/*=============================================
	Mostrar Menu
	=============================================*/

	static public function mdlMostrarMenu($tabla, $item, $valor){

		if($item != null && $valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY ID ASC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;

	}

	/*=============================================
	Registro Menu
	=============================================*/

	static public function mdlRegistroMenu($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(TITULO,MENU) VALUES (:tituloMenu,:rutaMenu)");

		$stmt->bindParam(":tituloMenu", $datos['tituloMenu'], PDO::PARAM_STR);
		$stmt->bindParam(":rutaMenu", $datos['rutaMenu'], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	Editar Menu
	=============================================*/

	static public function mdlEditarMenu($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET TITULO=:tituloMenu,MENU=:rutaMenu WHERE ID = :id");

		$stmt->bindParam(":tituloMenu", $datos['tituloMenu'], PDO::PARAM_STR);
		$stmt->bindParam(":rutaMenu", $datos['rutaMenu'], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos['id'], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());

		}

		$stmt-> close();

		$stmt = null;

	}

	/*=============================================
	Eliminar Menu
	=============================================*/

	static public function mdlEliminarMenu($tabla, $id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE ID = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());

		}

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	Actualizar menu
	=============================================*/

	static public function mdlActualizarMenu($tabla, $item1, $valor1, $item2, $valor2){

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