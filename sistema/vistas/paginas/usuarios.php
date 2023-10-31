<?php

// var_dump($admin["nombre_perfil"]);
// return;

  if($admin["nombre_perfil"] != "DOCENTE"){

    echo '<script>

      window.location = "inicio";

    </script>';

    return;

  }

 ?>

<div class="content-wrapper" style="min-height: 717px;">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Usuarios</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Usuarios</li>

          </ol>

        </div>

      </div>

    </div><!-- /.container-fluid -->

  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">

      <div class="row">

        <div class="col-12">

          <div class="card card-info card-outline">

            <div class="card-header">

              <button class="btn btn-primary btn-sm btnNuevo" id="btnNuevo" data-toggle="modal" data-target="#modalUsuarios">Crear nuevo usuario</button>

            </div>

            <div class="card-body">
              
              <table class="table table-bordered table-striped dt-responsive tablaUsuarios" width="100%">
                
                <thead>
                  
                  <tr>
                    
                    <th style="width:10px">#</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Perfil</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acciones</th>

                  </tr>

                </thead>

                <tbody>
                  

                </tbody>

              </table>

            </div>


            <div class="card-footer">
       
            </div>

          </div>

        </div>

      </div>

    </div>

  </section>
  <!-- /.content -->

</div>


<!--=====================================
Modal Usuarios
======================================-->

<div class="modal fade" id="modalUsuarios" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">

  <div class="modal-dialog modal-lg">
    
    <div class="modal-content">

      <form method="post" name="formUsuarios" id="formUsuarios" onsubmit="return guardarFormulario()">
      <!-- <form method="post" name="formUsuarios" id="formUsuarios"> -->

        <input type="hidden" class="form-control" name="idUsuario" id="idUsuario" value="">

        <div class="modal-header bg-info">
          
          <h4 class="modal-title" id="titulo">Crear Usuario</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body">

          <!-- NOMBRE COMPLETO -->
          
          <div class="input-group mb-3">
             
            <div class="input-group-append input-group-text">
              
               <span class="fa fa-address-card"></span>

            </div>

            <input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Ingrese Nombre y Apellido" required>   

          </div>

          <!-- USUARIO -->

          <div class="input-group mb-3">
             
            <div class="input-group-append input-group-text">
              
               <span class="fa fa-user"></span>

            </div>

            <input type="text" class="form-control" name="txtUsuario" id="txtUsuario" placeholder="Ingresa el usuario" required>   

          </div>


          <!-- PERFIL DE USUARIO -->

          <div class="form-group">

            <div class="input-group-prepend">
              
              <div class="input-group-text"><i class="fa fa-tags"></i></div>
                
              <select class="form-control input-lg" id="cmbPerfil" name="cmbPerfil" required>
                      
                <option value="">Seleccionar Perfil</option>

                  <?php 

                    $item=null;
                    $valor=null;

                    $perfil = ControladorPerfiles::ctrMostrarPerfil(null, null);

                    foreach ($perfil as $key => $value) {

                      echo '<option value="'.$value["id_perfil"].'">'.$value["nombre_perfil"].'</option>';

                    }

                  ?>

              </select>

            </div>

          </div>

          <!-- CIUDAD DE USUARIO -->

          <div class="form-group">

            <div class="input-group-prepend">
              
              <div class="input-group-text"><i class="fa fa-map"></i></div>
                
                <select class="form-control input-lg" id="cmbCiudad" name="cmbCiudad" required>
                        
                  <option value="">Seleccionar la ciudad</option>

                    <?php 

                      $item=null;
                      $valor=null;

                      $ciudad = ControladorCiudades::ctrMostrarCiudad(null, null);

                      foreach ($ciudad as $key => $value) {

                        echo '<option value="'.$value["COD_CIUDAD"].'">'.$value["DESCRIPCION"].'</option>';

                      }

                    ?>

                </select>

            </div>

          </div> 

          <!-- CONTRASEÑA -->

          <div class="input-group mb-3">
             
            <div class="input-group-append input-group-text">
              
               <span class="fas fa-user-lock"></span>

            </div>

            <input type="password" class="form-control" name="txtContrasenya" id="txtContrasenya" placeholder="Ingrese una contraseña">
            <input type="hidden" class="form-control" name="txtContrasenyaActual" id="txtContrasenyaActual">   

          </div>

          <!-- REPETIR CONTRASEÑA -->

          <div class="input-group mb-3">
             
            <div class="input-group-append input-group-text">
              
               <span class="fas fa-user-lock"></span>

            </div>

            <input type="password" class="form-control" name="txtRepetirContrasenya" id="txtRepetirContrasenya" placeholder="Repita la contraseña">

          </div>

          <!-- <div class="alert alert-warning">
              <strong>ERROR:</strong>
              Las contraseñas no son iguales!
            </div> -->

        </div>

        <div class="modal-footer d-flex justify-content-between">
          
          <div>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>

          <div>
             <button type="submit" class="btn btn-primary btnGuardar" id="btnGuardar">Guardar</button>
          </div>

        </div>

      </form>

    </div>

  </div>

</div>


<script src="vistas/js/usuarios.js"></script>
