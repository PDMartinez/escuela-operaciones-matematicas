<div class="content-wrapper" style="min-height: 717px;">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Tareas</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Ejercicios</li>

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

          <!-- Default box -->
          <div class="card card-info card-outline">

            <div class="card-header">

              <button class="btn btn-primary btn-sm btnNuevo" id="btnNuevo" data-toggle="modal" data-target="#modalTareas">Registrar nuevo ejercicio</button> 
            </div>
            <!-- /.card-header -->

            <div class="card-body">
              
              <table class="table table-bordered table-striped dt-responsive tablaTareas" width="100%">
                
                <thead>

                  <tr>
                    <th style="width:10px">#</th>
                    <th>Tarea</th>
                    <th>Grado</th>
                    <th>Materia</th>
                    <th>Imagen Tarea</th>
                    <th>Imagen Resultado</th>
                    <th>Resultado</th>
                    <th>Fecha</th>
                    <th>estado</th>
                    <th style="width:100px">Acciones</th>          
                  </tr>   

                </thead>

                <tbody>
               
                </tbody>

              </table>

            </div>
            <!-- /.card-body -->

          </div>
          <!-- /.card -->

        </div>

      </div>

    </div>

  </section>
  <!-- /.content -->

</div>

<!--=====================================
MODAL AGREGAR
======================================-->

<div class="modal fade" id="modalTareas" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">


      <form method="post" name="formTareas" id="formTareas" onsubmit="return guardarFormulario()">

        <input type="hidden" class="form-control" name="idUsuario" id="idUsuario" value="<?php echo $admin["id_u"] ?>"> 
        <input type="hidden" class="form-control" name="idTarea" id="idTarea" value="">  
        
        <!-- Modal Header -->
        <div class="modal-header bg-info">

          <h4 class="modal-title" id="titulo">Nueva Tarea</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <!-- Modal body -->
        <div class="modal-body" id="modalBody" style="display: block;">

          
          <!-- =============================================================== -->

          <!-- INPUT DE DONDE SE DIVIDE LOS TEXTOS -->
          <div class="row">

            <!-- PRIMERA FILA -->
            <div class="form-group col-md-6">

              <div class="form-group">

                <label class="control-label">Grado Académico</label>

                <label class="control-label" style="color:red">*</label>

                  <?php

                    echo '<select class="form-control select2 seleccionarGrado" name="cmbGrado" id="cmbGrado" style="width: 100%;" required="">

                        <option value="">Seleccione Grado</option>';

                        $grados = ControladorGrados::ctrMostrarGrado(null, null);

                        foreach ($grados as $key => $value) {
                        
                          echo '<option value="'.$value["id_grado"].'">'.$value["descripcion_grado"].'</option>';
                        
                        }

                    echo '</select>';    

                  ?>

              </div>

            </div>

            <!-- SEGUNDA FILA -->
            <div class="form-group col-md-6">

              <div class="form-group">

                <label class="control-label">Materia</label>

                <label class="control-label" style="color:red">*</label>
                       
                <?php

                    echo '<select class="form-control select2 seleccionarMateria" name="cmbMateria" id="cmbMateria" style="width: 100%;" required="">

                        <option value="">Seleccione Materia</option>';

                        $materias = ControladorMaterias::ctrMostrarMateria(null, null);

                        foreach ($materias as $key => $value) {
                        
                          echo '<option value="'.$value["id_materia"].'">'.$value["descripcion_materia"].'</option>';
                        
                        }

                    echo '</select>';    

                  ?>

              </div>

            </div>

          </div>

          <!-- INPUT DE DONDE SE DIVIDE LOS TEXTOS -->
          <div class="row">

            <!-- PRIMERA FILA -->
            <div class="form-group col-md-12">

              <!-- DESCRIPCIÓN -->
              <label class="control-label">Escriba una descripción del ejercicio</label>
              <label class="control-label" style="color:red">*</label>

              <div id="tareaPrincipal">

                <div class="form-group" id="tarea"> 

                  <textarea class="form-control txtTarea" rows="5" id="txtTarea" name="txtTarea" style="width: 100%" required></textarea>

                </div>

              </div>

            </div>

          </div>

          <!-- ======================================================================== -->

          <!-- IMAGENES -->

          <div class="row">

            <div class="form-group col-md-6">

              <div class="form-group">

                <input type="hidden" class="inputNuevaGaleria">
                <input type="hidden" class="inputGaleria">
                <input type="hidden" class="inputAntiguaGaleria">
                <input type="hidden" class="inputAntiguaGaleriaEstatica">

                <div class="btn btn-default btn-file">

                    <i class="fas fa-paperclip"></i> Adjuntar imagen representativa del ejercicio

                    <input type="file" name="galeria" id="galeria">
                   
                </div>

              </div>

              <img class="vistaGaleria img-thumbnail" width="250px">

              <p class="help-block small">Dimensiones: 480px * 382px | Peso Max. 2MB | Formato: JPG o PNG</p>

            </div>

            <div class="form-group col-md-6">

              <div class="form-group">

                <input type="hidden" class="inputNuevaGaleria1">
                <input type="hidden" class="inputGaleria1">
                <input type="hidden" class="inputAntiguaGaleria1">
                <input type="hidden" class="inputAntiguaGaleriaEstatica1">

                <div class="btn btn-default btn-file">

                    <i class="fas fa-paperclip"></i> Adjuntar imagen representativa del resultado

                    <input type="file" name="galeria1" id="galeria1">
                   
                </div>

              </div>

              <img class="vistaGaleria1 img-thumbnail" width="250px">

              <p class="help-block small">Dimensiones: 480px * 382px | Peso Max. 2MB | Formato: JPG o PNG</p>

            </div>

          </div>

          <!-- Contenedor del reproductor -->
          <div class="row">
            <div class="col-md-12 d-flex justify-content-center" id="playerCabecera">
              <div id="player" class=""></div>
            </div>
          </div>
          <br>
          <!-- INPUT DE DONDE SE DIVIDE LOS TEXTOS -->
          <div class="row">

            <!-- PRIMERA FILA -->
            <div class="form-group col-md-6">

              <label class="control-label">Video Explicativo</label>
              <label class="control-label" style="color:red">*</label>

              <div class="input-group mb-3">

                <div class="input-group-prepend">
                  <span class="p-2 bg-secondary rounded-left small">https://www.youtube.com/watch?v=</span>
                </div>

                <input type="text" class="form-control agregarVideo" name="txtVideo" id="txtVideo" placeholder="Vh3oHGIucrs" required>

              </div>

            </div>

            <!-- SEGUNDA FILA -->
            <div class="form-group col-md-6">

              <label class="control-label">Resultado</label>
              <label class="control-label" style="color:red">*</label>

              <div class="input-group mb-3">

                <input type="text" class="form-control" name="txtResultado" id="txtResultado" placeholder="Resultado del Ejercicio" required> 

              </div>

            </div>

          </div>
      
        </div>

        <!-- Mensaje de Cargando... -->

        <div class="padre">

          <img id="mostrar_loading" class="intro-img img-fluid mb-3 mb-lg-0 rounded imagen" src="vistas/img/extras/cargando73.gif" alt="..." style="display:none;" />

        </div>

        <!-- Modal footer -->
        <div class="modal-footer d-flex justify-content-between">

          <div>
            <button type="button" class="btn btn-danger" id="btnCerrar" data-dismiss="modal" style="display: block;">Cerrar</button>
          </div>

          <div>
            <button type="submit" class="btn btn-primary btnGuardar" id="btnGuardar" style="display: block;">Guardar</button>
          </div>

        </div>

    
      </form>


    </div>

  </div>

</div>


<script src="vistas/js/tareas.js"></script>


<style type="text/css">
    .padre{
        position:relative;
        width:100%;
    }   

    .imagen{
        margin:auto;
        display:block;
    }

    .notblock {
      display: none;
    }
</style>
