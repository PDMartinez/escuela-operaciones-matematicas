
var tablaPerfiles;

tablaPerfiles=$(".tablaPerfiles").DataTable({
  "ajax":"ajax/tablaPerfiles.ajax.php",
  "deferRender": true,
  "retrieve": true,
  "processing": true,
  "language": {

     "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }

   }

})

/*==========================================================
      Guardar y Editar Perfiles
============================================================*/

function guardarFormulario(){

  // console.log($("#txtDescripcionPerfil").val());
  // return;
  var txtIdPerfil = $("#idPerfil").val();
  var txtPerfil = $("#txtPerfil").val();
  var txtDescripcionPerfil = $("#txtDescripcionPerfil").val();

  var datos = new FormData();

  datos.append("txtIdPerfil", txtIdPerfil);
  datos.append("txtPerfil", txtPerfil);
  datos.append("txtDescripcionPerfil", txtDescripcionPerfil);

  $.ajax({

    url: "ajax/perfiles.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,

    success: function(respuesta) {

      var objData = JSON.parse(respuesta);

      if (objData.status) {

        $('#modalPerfiles').modal('hide');

        swal("Correcto", objData.msg, "success");

        tablaPerfiles.ajax.reload(function() {

          LimpiarText();

        });

      }else{

        swal("Error", objData.msg, "error");


      }

      

    }

  })
  
  return (false);

}

/*=============================================
    Nuevo Perfil
=============================================*/

$(document).on("click", ".nuevoPerfil", function(){

  LimpiarText();

  $("#titulo").html("Crear Perfil");
  $("#btnGuardar").html("Guardar");


})


/*=============================================
Editar Perfiles
=============================================*/

$(document).on("click", ".editarPerfil", function(){

  LimpiarText();

  $("#titulo").html("Editar Perfil");
  $("#btnGuardar").html("Actualizar");

  var idPerfil = $(this).attr("idPerfil");

  var datos = new FormData();

  datos.append("idPerfil", idPerfil);

  // console.log(idPerfil);
  // return;

  $.ajax({

    url:"ajax/perfiles.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success:function(respuesta){

      // console.log(respuesta);
      
      $("#idPerfil").val(respuesta["id_perfil"]);

      $("#txtPerfil").val(respuesta["nombre_perfil"]);

      $("#txtDescripcionPerfil").val(respuesta["descripcion_perfil"]);
        
    }

  })  

})

/*=============================================
Eliminar Perfil
=============================================*/

$(document).on("click", ".eliminarPerfil", function(){

  var idPerfil = $(this).attr("idPerfil");
  // console.log(idPerfil);
  // return;
  swal({
    title: '¿Está seguro de eliminar este registro?',
    text: "¡Si no lo está puede cancelar la acción!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, eliminar registro!'

  }).then(function(result){

    if(result.value){
       
        var datos = new FormData();
        datos.append("idEliminar", idPerfil);
      
        $.ajax({

          url:"ajax/perfiles.ajax.php",
          method: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          success:function(respuesta){

            var objData = JSON.parse(respuesta);


             if(objData.status){

               swal({
                  type: "success",
                  title: "¡CORRECTO!",
                  text: objData.msg,
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                 }).then(function(result){

                   tablaPerfiles.ajax.reload(function() {

                    LimpiarText();

                   });

                })

             }else{

                  swal("Error",objData.msg,"error");

                  tablaPerfiles.ajax.reload(function() {

                    LimpiarText();

                   });
              }

          }

        })

      }

    })

})

function LimpiarText() {

  formPerfiles.reset();

  $("#idPerfil").val("");

  $("#txtPerfil").val("");

  $("#txtDescripcionPerfil").val("");

}

