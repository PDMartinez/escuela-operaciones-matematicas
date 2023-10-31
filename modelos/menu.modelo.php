<?php

require_once "conexion.php";

Class ModeloMenus{

	/*=============================================
	MOSTRAR BARRIOS CON INNER
	=============================================*/
	
	static public function MdlMostrarBarrios($tabla1, $tabla2, $tabla3, $item, $valor){

		// var_dump($tabla1, $tabla2, $tabla3, $item, $valor);

		if ($item!=""){

			$stmt = Conexion::conectar()->prepare("SELECT g.COD_GUIA, b.DESCRIPCION FROM guias AS g INNER JOIN ciudades AS c ON g.COD_CIUDAD = c.COD_CIUDAD INNER JOIN barrios AS b ON g.COD_BARRIO = b.COD_BARRIO WHERE $item = $valor");

			// $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			// $stmt -> bindParam(":$item",  $valor, PDO::PARAM_STR);

			$stmt -> execute();
				
			return $stmt -> fetchAll();


		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}
	
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

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;

	}
}