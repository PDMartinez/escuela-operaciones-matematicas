<div class="content-wrapper" style="min-height: 717px;">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Barra de menu</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Barra de menu</li>

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

              <button class="btn btn-primary btn-sm" id="btnNuevo" data-toggle="modal" data-target="#crearMenu">Crear nuevo menu</button> 

            </div>
            <!-- /.card-header -->

            <div class="card-body">
              
              <table class="table table-bordered table-striped dt-responsive tablaMenu" width="100%">
                
                <thead>

                  <tr>

                    <th style="width:10px">#</th>
                    <th>Titulo</th>
                    <th>Menu</th>
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
Modal Crear Menu
======================================-->

<div class="modal" id="crearMenu">

  <div class="modal-dialog">

    <div class="modal-content">

      <form method="post">

        <!-- Modal Header -->
        <div class="modal-header bg-info">
          <h4 class="modal-title">Crear Menu</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

          <style>
            input {text-transform: uppercase;}
          </style>

           <!-- TITULO DEL MENU -->
         <h6>TITULO:</h6>
          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              <span class="fas fa-list-ul"></span>
            </div>

            <input type="text" class="form-control" name="tituloMenu" placeholder="Ingresa el título" required> 

          </div>
          <!-- RUTA DEL MENU -->
          <h6>RUTA:</h6>
          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              <span class="fas fa-list-ul"></span>
            </div>

            <input type="text" class="form-control" name="rutaMenu" required> 

          </div>

       
        <?php

          $registroMenu = new ControladorMenu();
          $registroMenu -> ctrRegistroMenu();

        ?>
      
        </div>

        <!-- Modal footer -->
        <div class="modal-footer d-flex justify-content-between">

          <div>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>

          <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>

        </div>

       

      </form>

    </div>

  </div>

</div>

<!--=====================================
Modal Editar Menu
======================================-->

<div class="modal" id="editarMenu">

  <div class="modal-dialog">

    <div class="modal-content">

      <form method="post" >

        <!-- Modal Header -->
        <div class="modal-header bg-info">
          <h4 class="modal-title">Editar Menu</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

          <input type="hidden" class="form-control" name="idMenu">

           <!-- TITULO DEL MENU -->
         <h6>TITULO:</h6>
          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              <span class="fas fa-list-ul"></span>
            </div>

            <input type="text" class="form-control" name="EditartituloMenu" placeholder="Ingresa el titúlo" required> 

          </div>
          <!-- RUTA DEL MENU -->
          <h6>RUTA:</h6>
          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              <span class="fas fa-list-ul"></span>
            </div>

            <input type="text" class="form-control" name="EditarrutaMenu" required> 

          </div>

        
        </div>


        <?php

          $editarMenu = new ControladorMenu();
          $editarMenu -> ctrEditarMenu();

        ?>

        <!-- Modal footer -->
        <div class="modal-footer d-flex justify-content-between">

          <div>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>

          <div>
            <button type="submit" class="btn btn-info">Actualizar</button>
          </div>

        </div>


      </form>

    </div>

  </div>

</div>
<script src="vistas/js/menu.js"></script>