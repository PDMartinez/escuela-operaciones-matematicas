<div class="content-wrapper" style="min-height: 717px;">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Perfiles</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Perfiles</li>

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

              <button class="btn btn-primary btn-sm nuevoPerfil" data-toggle="modal" data-target="#modalPerfiles">Crear nuevo perfil</button>

            </div>
            <!-- /.card-header -->

            <div class="card-body">
              
              <table class="table table-bordered table-striped dt-responsive tablaPerfiles" width="100%">
        
                <thead>

                  <tr>

                    <th style="width:10px">#</th> 
                    <th>Perfil</th>
                    <th>Descripción</th>
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
Modal Perfiles
======================================-->

<div class="modal fade" id="modalPerfiles" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">

  <div class="modal-dialog">

    <div class="modal-content">

      <form method="post" name="formPerfiles" id="formPerfiles" onsubmit="return guardarFormulario()">

        <input type="hidden" class="form-control" name="idPerfil" id="idPerfil" value="">

        <!-- Modal Header -->
        <div class="modal-header bg-info">
          <h4 class="modal-title" id="titulo">Crear Perfil</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

         <!-- CONVERTIR EN MAYUSCULA EL NOMBRE -->
          <!-- <style>
            input {text-transform: uppercase;}
          </style> -->

          <div class="input-group mb-3">
             
            <div class="input-group-append input-group-text">
              
               <span class="fa fa-address-card"></span>

            </div>

            <input type="text" class="form-control" name="txtPerfil" id="txtPerfil" placeholder="Ingrese Perfil" required style="text-transform:uppercase;" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();">   

          </div>

          <div class="input-group mb-3">
             
            <div class="input-group-append input-group-text">
              
               <span class="fa fa-address-card"></span>

            </div>

            <input type="text" class="form-control" name="txtDescripcionPerfil" id="txtDescripcionPerfil" placeholder="Ingrese Descripción Perfil" required style="text-transform:uppercase;" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();">   

          </div>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer d-flex justify-content-between">

          <div>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>

          <div>
            <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
          </div>

        </div>


      </form>

    </div>

  </div>

</div>


<script src="vistas/js/perfiles.js"></script>