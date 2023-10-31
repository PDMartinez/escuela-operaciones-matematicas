<?php

require_once "../controladores/diccionarios.controlador.php";
require_once "../modelos/diccionarios.modelo.php";

class AjaxBuscador{


	/*=============================================
	BUSCAR PALABRA SIMILAR
	=============================================*/	

	public function ajaxMostrarPalabra(){

		$item = "guarani";
		$valor = $this->palabra;
		$respuesta = ControladorDiccionarios::ctrMostrarDiccionario($item, $valor);

		echo json_encode($respuesta);//se imprime para que se pueda ver en el js
		// var_dump($respuesta);

	}


}

///////////////////////////////////////////////////////////////////////


/*================================================
	MOSTRAR GUIAS
==================================================*/
if(isset($_POST["palabra"])){

	$mostrar = new AjaxBuscador();
	$mostrar -> palabra = $_POST["palabra"];
	$mostrar -> ajaxMostrarPalabra();

}

