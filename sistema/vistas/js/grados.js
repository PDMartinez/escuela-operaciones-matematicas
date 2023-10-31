
var tablaGrado;

tablaGrado=$(".tablaGrados").DataTable({
  "ajax":"ajax/tablaGrados.ajax.php",
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

/*=============================================
    GUARDAR Y EDITAR GRADO
=============================================*/

function guardarFormulario(){

  var txtIdGrado = $("#idGrado").val();
  var txtGrado = $("#txtGrado").val();

  var datos = new FormData();
    
    datos.append("txtIdGrado", txtIdGrado);
    datos.append("txtGrado", txtGrado);

     $.ajax({

      url:"ajax/grados.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,

      success: function(respuesta){

       var objData = JSON.parse(respuesta);
    
        if(objData.status){

          $('#modalGrados').modal('hide');

            formGrados.reset();

            swal("¡CORRECTO!",objData.msg,"success");

            tablaGrado.ajax.reload(function() {
                     // body...
            });

        }else{

          swal("Error",objData.msg,"error");

        }

      }

    })

  return(false);

}


/*=============================================
    Nuevo Grado
=============================================*/

$(document).on("click", ".nuevoGrado", function(){

  limpiarText();

  $("#titulo").html("Crear Grado");
  $("#btnGuardar").html("Guardar");


})


/*=============================================
    Editar Grados
=============================================*/

$(document).on("click", ".editarGrado", function(){

  limpiarText();

  $("#titulo").html("Editar Grado");
  $("#btnGuardar").html("Actualizar");

  var idGrado = $(this).attr("idGrado");
  var datos = new FormData();

  datos.append("idGrado", idGrado);

  $.ajax({

    url:"ajax/grados.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success:function(respuesta){

      // console.log(respuesta);
      
      $("#idGrado").val(respuesta["id_grado"]);

      $("#txtGrado").val(respuesta["descripcion_grado"]);
        
    }

  })  

})


/*=============================================
    Eliminar Grados
=============================================*/

$(document).on("click", ".eliminarGrado", function(){

  var idGrado = $(this).attr("idGrado");
  
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
        datos.append("idEliminar", idGrado);
      
        $.ajax({

          url:"ajax/grados.ajax.php",
          method: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          success:function(respuesta){

            var objData = JSON.parse(respuesta);

             if(objData.status){

              swal("¡CORRECTO!", objData.msg,"success");

                tablaGrado.ajax.reload(function() {

                  limpiarText();

                });

             }else{

                swal("Error", objData.msg,"error");

                tablaGrado.ajax.reload(function() {

                  limpiarText();

                });
              }

          }

        })

      }

    })

})

/*=============================================
    FUNCIÓN PARA LIMPIAR GRADOS
=============================================*/

function limpiarText() {

  formGrados.reset();

  $("#idGrado").val("");

  $("#txtGrado").val("");

  
}