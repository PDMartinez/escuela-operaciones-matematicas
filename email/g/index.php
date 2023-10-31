<?php 
  require_once 'contacto.php';
 ?>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Envio de Correo Electrónico | Envío de Mensaje</title>
  <link rel='stylesheet' href='https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css'><link rel="stylesheet" href="./stily2.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css'><link rel="stylesheet" href="./stily2.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link rel="stylesheet" href="style3.css">
</head>
<body>
<!-- partial:index.partial.html -->
<section>
  
  <div class="box">
    
    <div class="square" style="--i:0;"></div>
    <div class="square" style="--i:1;"></div>
    <div class="square" style="--i:2;"></div>
    <div class="square" style="--i:3;"></div>
    <div class="square" style="--i:4;"></div>
    <div class="square" style="--i:5;"></div>
    
   <div class="container"> 
      <div class="form"> 
        <b><h2><i class="fas fa-envelope"></i>ENVÍE SU MENSAJE</h2></b>
        <form id="formulario" class="form-inline" role="form" method="POST"  title="Formulario de Contacto">
          <b><h3><i class="menu-icon ion-md-person"></i> Ingrese su Nombre:</h3></b>
        <input class="form-control name=" name="nombre" type="text" required="required" id="nombre" placeholder="Nombre" tabindex="1" title="nombre" style="width: 300px; height: 40px;">
       
      <br>
        <br>
        <b><h3></h3><i class="menu-icon ion-md-at"></i> Ingrese su E-Mail:</h3></b>
        <input class="form-control name=" name="email" type="email" required="required" id="email" placeholder="Email" tabindex="2" title="email" style="width: 300px; height: 40px;">
        <br>
        <br>
        <b><h3></h3><i class="menu-icon ion-md-tablet-portrait"></i> Ingrese su Teléfono:</h3></b>
        <input class="form-control name=" name="telefono" type="text" required="required" id="telefono" placeholder="Teléfono" tabindex="3" title="telefono" style="width: 300px; height: 40px;">
        <br>
        <br>
        <b><h3></h3><i class="menu-icon ion-md-list-box"></i> Escriba su Mensaje:</h3></b>
        <textarea class="form-control name=" name="mensaje" rows="4" required="required" id="mensaje" placeholder="Mensaje" style="width: 300px; height: 100px;" tabindex="6"></textarea>
        <br>
        <br>
        <div class="inputBx">
          <i class="fas fa-envelope"></i> <input type="submit" name="enviar" tabindex="7" value="   Enviar">
          <?php 
            $registro = contactocontrol::contactlsenhas();
            if($registro == 'ok'){
              echo '<script> Swal.fire({
                  					icon: "success",
                  					title: "¡Éxito!",
                 					  text: "¡Su Email fue enviado correctamente!",
                  					showConfirmButton: true,
                            footer:"Muchas Gracias por Contactarnos",
                  					confirmButtonText: "Aceptar"
                  				});
                    </script>';
           }else{
                if($registro == "nok"){
                  echo '<script> Swal.fire({
                            icon: "error",
                            title: "¡Opsss!",
                            text: "¡No se pudo enviar su mensaje al correo!",
                            showConfirmButton: true,
                            footer:"Intente más tarde",
                            confirmButtonText: "Aceptar"
                          });
                        </script>';
                 }
           }
           $registro='';
          ?>
        </div>
       
        
      </form>
 

      </form>
      <p>*Este mensaje se enviará al Desarrollador</p>
      <br></br>
      <h4><a href="../../index.php"style="text-decoration:none" style="text-align:center"><span class="parpadea text"><i class="fas fa-chevron-circle-left"></i> Volver a Señapp Paraguay</span></a></h4>
      <p></p>
      
  </div>
    
  </div>
</section>
<!-- partial -->
<script src="scripts.js"></script>
  
 

</body>
</html>

