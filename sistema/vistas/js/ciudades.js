
var tablaCiudad;

tablaCiudad=$(".tablaCiudades").DataTable({
  "ajax":"ajax/tablaCiudades.ajax.php",
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
    GUARDAR Y EDITAR CIUDAD
=============================================*/

function guardarFormulario(){

var txtIdCiudad = $("#idCiudad").val();
var txtCiudad = $("#txtCiudad").val();

var datos = new FormData();
    
    datos.append("txtIdCiudad", txtIdCiudad);
    datos.append("txtCiudad", txtCiudad);


     $.ajax({

      url:"ajax/ciudades.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,

      success: function(respuesta){

       var objData = JSON.parse(respuesta);
    
        if(objData.status){

          $('#modalCiudades').modal('hide');

            formCiudades.reset();

            swal("¡CORRECTO!",objData.msg,"success");

            tablaCiudad.ajax.reload(function() {
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
    Nuevo Ciudad
=============================================*/

$(document).on("click", ".nuevoCiudad", function(){

  LimpiarText();

  $("#titulo").html("Crear Ciudad");
  $("#btnGuardar").html("Guardar");


})


/*=============================================
    Editar Ciudades
=============================================*/

$(document).on("click", ".editarCiudad", function(){

  LimpiarText();

  $("#titulo").html("Editar Ciudad");
  $("#btnGuardar").html("Actualizar");

  var idPerfil = $(this).attr("idCiudad");

  var datos = new FormData();

  datos.append("idCiudad", idPerfil);

  $.ajax({

    url:"ajax/ciudades.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success:function(respuesta){

      // console.log(respuesta);
      
      $("#idCiudad").val(respuesta["COD_CIUDAD"]);

      $("#txtCiudad").val(respuesta["DESCRIPCION"]);
        
    }

  })  

})


/*=============================================
    ELIMINAR CIUDAD
=============================================*/

$(document).on("click", ".eliminarCiudad", function(){

  var idCiudad = $(this).attr("idCiudad");
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
        datos.append("idEliminar", idCiudad);
      
        $.ajax({

          url:"ajax/ciudades.ajax.php",
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

                   tablaCiudad.ajax.reload(function() {

                    LimpiarText();

                   });

                })

             }else{

                  swal("Error",objData.msg,"error");

                  tablaCiudad.ajax.reload(function() {

                    LimpiarText();

                   });
              }

          }

        })

      }

    })

})

/*=============================================
    FUNCIÓN PARA LIMPIAR CIUDADES
=============================================*/


function LimpiarText() {

  formCiudades.reset();

  $("#idCiudad").val("");

  $("#txtCiudad").val("");

  
}