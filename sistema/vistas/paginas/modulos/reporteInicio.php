<!-- 
<?php
/*============================================================
           SIMPOSIOS EMITIDOS
=================================================================*/
$item=null;
$valor=null;
$Simposios=ControladorSimposios::ctrMostrarSimposio($item,$valor);
$Simposio=count($Simposios);




/*============================================================
            PASANTIAS EMITIDOS
=================================================================*/
$item=null;
$valor=null;
$Pasantias=ControladorPasantias::ctrMostrarPasantia($item,$valor);
$Pasantia=count($Pasantias);

/*============================================================
            EXPO CARRERA
=================================================================*/
$item=null;
$valor=null;
$Expocarreras=ControladorExpocarreras::ctrMostrarExpocarrera($item,$valor,$valor1);
$Expocarrera=count($Expocarreras);

/*============================================================
            EXTENSIONES
=================================================================*/
$item=null;
$valor=null;
$valor1=0;
$Extensiones=ControladorExtensiones::ctrMostrarExtension($item,$valor,$valor1);
$Extension=count($Extensiones);


?> -->

<!-- ============================================================
            SIMPOSIOS
================================================================= -->
<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-info">
    
    <div class="inner">
      
      <h3 id="Simposios"><?php echo ($Simposio); ?></h3>

      <p>CANTIDAD SIMPOSIOS</p>
    
    </div>
    
    <div class="icon">
      
      <i class="ion ion-clipboard"></i>
    
    </div>

    <a href="simposios" class="small-box-footer">
              
              Más info <i class="fa fa-arrow-circle-right"></i>
            
            </a>
   
  </div>

</div>

<!-- ============================================================
            PASANTIAS
================================================================= -->
<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-yellow">
    
    <div class="inner">
      
      <h3 id="Pasantias"><?php echo ($Pasantia); ?></h3>

      <p>CANTIDAD DE PASANTIAS</p>
    
    </div>
    
    <div class="icon">
      
      <i class="ion ion-clipboard"></i>
    
    </div>

    <a href="pasantias" class="small-box-footer">
              
              Más info <i class="fa fa-arrow-circle-right"></i>
            
            </a>
  
  </div>

</div>


<!-- ============================================================
            EXPO-CARRERA
================================================================= -->
<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-green">
    
    <div class="inner">
    
      <h3><?php echo ($Expocarrera); ?></h3>

      <p>CANTIDAD DE EXPO-CARRERA</p>
    
    </div>
    
    <div class="icon">
    
      <i class="ion ion-clipboard"></i>
    
    </div>
    <a href="expocarreras" class="small-box-footer">
      
      Más info <i class="fa fa-arrow-circle-right"></i>
    
    </a>
   

  </div>

</div>


<!-- ============================================================
            EXTENSIONES
================================================================= -->
<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-red">
    
    <div class="inner">
    
      <h3><?php echo ($Extension); ?></h3>

      <p>CANTIDAD DE EXTENSIONES</p>
    
    </div>
    
    <div class="icon">
    
      <i class="ion ion-clipboard"></i>
    
    </div>
    <a href="extensiones" class="small-box-footer">
      
      Más info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>