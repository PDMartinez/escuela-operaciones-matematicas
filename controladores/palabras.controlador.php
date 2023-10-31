<?php

Class ControladorPalabras{

	/*=============================================
	MOSTRAR PALABRAS
	=============================================*/

	static public function ctrMostrarPalabra($item, $valor){

		// var_dump($item, $valor);
		// return;

		$tabla = "diccionario";

		$respuesta = ModeloPalabras::mdlMostrarPalabra($tabla, $item, $valor);
		// var_dump($respuesta);
		return $respuesta;

	}


}