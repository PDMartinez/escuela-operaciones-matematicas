<?php

require_once "conexion.php";

Class ModeloDiccionarios{

	/*=============================================
		Mostrar la Palabra
	=============================================*/
	
	static public function mdlMostrarDiccionario($tabla, $item, $valor){

		// var_dump($tabla);
		// var_dump($item);
		// var_dump($valor);
		// return;

		// $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
		$stmt = Conexion::conectar()->prepare("SELECT guarani, espanyol, foto, oracion, traductor_corrector.levenshtein(guarani,:$item) AS 'levenshtein' FROM diccionario ORDER BY Levenshtein ASC LIMIT 1;");

		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();


		$stmt -> close();

		$stmt = null;

	}

}