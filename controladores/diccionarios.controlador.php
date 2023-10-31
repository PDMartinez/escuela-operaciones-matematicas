<?php

Class ControladorDiccionarios{

	/*=============================================
		Mostrar la Palabra
	=============================================*/

	static public function ctrMostrarDiccionario($item, $valor){

		// var_dump($item);
		// var_dump($valor);
		// return;

		$tabla = "diccionario";

		$respuesta = ModeloDiccionarios::mdlMostrarDiccionario($tabla, $item, $valor);
		//var_dump($respuesta);
		return $respuesta;

	}

}