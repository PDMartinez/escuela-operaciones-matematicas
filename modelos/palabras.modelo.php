<?php

require_once "conexion.php";

Class ModeloPalabras{

	/*=============================================
		MOSTRAR PALABRAS
	=============================================*/
	
	static public function mdlMostrarPalabra($tabla, $item, $valor){

		// var_dump($item, $valor, $tabla);
		// return;

		if ($item != "" && $valor != ""){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item LIKE '$valor%' ORDER BY guarani ASC");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY guarani ASC");

			$stmt -> execute();

			return $stmt -> fetchAll();

			$stmt -> close();

			$stmt = null;

		}

	}

}