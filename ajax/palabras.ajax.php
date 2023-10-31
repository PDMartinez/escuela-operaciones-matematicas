<?php

require_once "../controladores/palabras.controlador.php";
require_once "../modelos/palabras.modelo.php";

class AjaxPalabra{


	/*=============================================
	BUSCAR PALABRA SIMILAR
	=============================================*/	

	public function ajaxMostrarPalabra(){

		$item = "guarani";
		$valor = $this->palabra;
		$respuesta = ControladorPalabras::ctrMostrarPalabra($item, $valor);

		echo json_encode($respuesta);//se imprime para que se pueda ver en el js
		// var_dump($respuesta);

	}


}

///////////////////////////////////////////////////////////////////////


/*================================================
	MOSTRAR PALABRAS
==================================================*/
if(isset($_POST["palabra"])){

	$mostrar = new AjaxPalabra();
	$mostrar -> palabra = $_POST["palabra"];
	$mostrar -> ajaxMostrarPalabra();

}

