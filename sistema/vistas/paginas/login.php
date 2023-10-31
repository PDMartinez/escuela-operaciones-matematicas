<body class="hold-transition login-page">

  <div class="login-box">

    <div class="login-logo">

      <!-- <div class="mb-6 mx-auto tm-site-logo"><i class="fa fa-book fa-3x"></i></div> -->
      <img src="vistas/img/plantilla/aprendizaje_login.png" width="200px" height="150px">

        <!-- <a href="<?php echo $ruta?>">TRADUCTOR GUARANI-ESPAÑOL</a> -->
    
      </div>

    <div class="card">

      <div class="card-body login-card-body">

        <p class="login-box-msg">Iniciar Sesión</p>

        <form method="post">

          <div class="input-group mb-3">

            <input type="text" class="form-control" placeholder="Usuario" name="ingresoUsuario">

            <div class="input-group-append">

              <div class="input-group-text">

                <span class="fas fa-user"></span>

              </div>

            </div>

          </div>

          <div class="input-group mb-3">

            <input type="password" class="form-control" placeholder="Password" name="ingresoPassword">

            <div class="input-group-append">

              <div class="input-group-text">

                <span class="fas fa-lock"></span>

              </div>

            </div>

          </div>        

          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button> 

          <?php

          $ingreso = new ControladorAdministradores();
          $ingreso -> ctrIngresoAdministradores(); 


          ?>   
   
        </form>

      </div>
      <!-- /.login-card-body -->
    </div>

  </div>
  <!-- /.login-box -->

</body>

<div class="disclaimer">We support Ukraine and condemn war. Push Russian government to act against war. Be brave, vocal and show your support to Ukraine. Follow the latest news <a title="https://www.bbc.com/news/live/world-europe-60517447" target="_blank" href="https://www.bbc.com/news/live/world-europe-60517447" style="color: black;"><b>HERE</b></a></div>

<script type="text/javascript">
  /*=============================================
   QUITAR PUBLICIDAD
  =============================================*/

  $(document).ready(function (){
   
      document.querySelectorAll('.disclaimer')[0].style.visibility = 'hidden';

  })
  
</script>