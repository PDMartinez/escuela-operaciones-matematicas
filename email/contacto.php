
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
  

<?php

//Comprobamos que se haya presionado el boton enviar
if(isset($_POST['enviar'])){
	//Guardamos en variables los datos enviados
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$telefono = $_POST['telefono'];
	$mensaje = $_POST['mensaje'];
	//$datos=filter_input_array(INPUT_POST, FILTER_DEFAULT);
	
	///Validamos del lado del servidor que el nombre y el email no estén vacios
	if($nombre == ''){
		echo "Debe ingresar su Nombre";
		//$datos='';
		//$retorna=['status'=> false, 'msg'=>"error"];
	}else if($email == ''){
		echo "Debe ingresar su dirección de Email";
		//$datos='';
		//$retorna=['status'=> false, 'msg'=>"error"];
	}else if($telefono == ''){
		echo "Debe ingresar un Numero de Telefono";
		//$datos='';
		//$retorna=['status'=> false, 'msg'=>"error"];
	}else if($mensaje == ''){
		echo "Debe ingresar el mensaje que desea enviar";
		//$datos='';
		//$retorna=['status'=> false, 'msg'=>"error"];
	}else{
		//$datos==['status'=> true, 'msg'=>"exito"];
		//$retorna=['status'=> true, 'msg'=>"exito"];
		$para = "lsenhas2023@gmail.com";//Email al que se enviará
		$asunto = "NUEVO MENSAJE DE USUARIO DE LA APLICACIÓN MÓVIL SEÑAPP PARAGUAY";//Puedes cambiar el asunto del mensaje desde aqui
	//Este sería el cuerpo del mensaje
	$mensaje = "
		<table border='1' cellspacing='4' cellpadding='3'>
		  <tr>
			<td width='30%' align='left' bgcolor='#f0efef'><strong>NOMBRE:</strong></td>
			<td width='80%' align='left'>$nombre</td>
		  </tr>
		  <tr>
			<td align='left' bgcolor='#f0efef'><strong>E-MAIL:</strong></td>
			<td align='left'>$email</td>
		  </tr>
		  <tr>
			<td align='left' bgcolor='#f0efef'><strong>TELEFONO:</strong></td>
			<td align='left'>$telefono</td>
		  </tr>
		  <tr>
			<td align='left' bgcolor='#f0efef'><strong>MENSAJE:</strong></td>
			<td align='left'>$mensaje</td>
		  </tr>
	</table>	
";	
	
//Cabeceras del correo
    $headers = "From: $email  $nombre\r\n"; //Quien envia?
    $headers .= "X-Mailer: PHP5\n";
    $headers .= 'MIME-Version: 1.0' . "\n";
	$headers .= "X-Mailer: PHP5\n";
    $headers .= 'Content-type: text/html; charset=ISO 8859-1' . "\r\n"; // ISO 8859-1 es para que acepte la letra ñ y acentos.
	
//Comprobamos que los datos enviados a la función MAIL de PHP estén bien y si es correcto enviamos
	//echo json_encode($retorna);
	if(mail($para, $asunto ,$mensaje, $headers)){
		echo json_encode("exito");
		// echo "Su Mensaje se ha Enviado Correctamente.";
		// echo "<br />";
		// echo '<a href="../index.php">Volver a SEÑAPP PARAGUAY</a>';
		// echo '<script> Swal.fire({
        //  					icon: "success",
        //  					title: "Exito",
        //  					text: "¡Su Email fue enviado correctamente!",
        //  					showConfirmButton: true,
        //  					confirmButtonText: "Cerrar"
        //  				}).then(function(result){
        //     			 if(result.value){                   
        //      			 	window.location = "index.html";
        //     			 }
        //  });
        // </script>';
	}else{
		echo json_encode("error");
		// echo "Hubo un Error en el Envío... Inténtelo más tarde";
	}
}
}	
?>
