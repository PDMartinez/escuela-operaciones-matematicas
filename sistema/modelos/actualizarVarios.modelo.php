<?php 
 require_once "conexion.php";
/**
 * 
 */
class ModeloVarios
{
	const METHOD="AES-256-CBC";
	const SECRET_KEY='$danilo@2023';
	const SECRET_IV='101712';

	/*=============================================
	ACTUALIZAR VARIOS
	=============================================*/

	static public function mdlActualizarVarios($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1=:$item1 WHERE $item2=:$item2");
		
		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute())
		{
			return "ok";
		
		}else

		{
			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	
}
