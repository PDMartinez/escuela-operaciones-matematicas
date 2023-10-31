
var tablaMateria;

tablaMateria=$(".tablaMaterias").DataTable({
  "ajax":"ajax/tablaMaterias.ajax.php",
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
    GUARDAR Y EDITAR MATERIA
=============================================*/

function guardarFormulario(){

  var txtIdMateria = $("#idMateria").val();
  var txtMateria = $("#txtMateria").val();

  var datos = new FormData();
    
    datos.append("txtIdMateria", txtIdMateria);
    datos.append("txtMateria", txtMateria);

     $.ajax({

      url:"ajax/materias.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,

      success: function(respuesta){

       var objData = JSON.parse(respuesta);
    
        if(objData.status){

          $('#modalMaterias').modal('hide');

            formMaterias.reset();

            swal("¡CORRECTO!",objData.msg,"success");

            tablaMateria.ajax.reload(function() {
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
    Nuevo Materia
=============================================*/

$(document).on("click", ".nuevoMateria", function(){

  limpiarText();

  $("#titulo").html("Crear Materia");
  $("#btnGuardar").html("Guardar");


})


/*=============================================
    Editar Materias
=============================================*/

$(document).on("click", ".editarMateria", function(){

  limpiarText();

  $("#titulo").html("Editar Materia");
  $("#btnGuardar").html("Actualizar");

  var idMateria = $(this).attr("idMateria");

  var datos = new FormData();

  datos.append("idMateria", idMateria);

  $.ajax({

    url:"ajax/materias.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success:function(respuesta){

      // console.log(respuesta);
      
      $("#idMateria").val(respuesta["id_materia"]);

      $("#txtMateria").val(respuesta["descripcion_materia"]);
        
    }

  })  

})


/*=============================================
    Eliminar Materia
=============================================*/

$(document).on("click", ".eliminarMateria", function(){

  var idMateria = $(this).attr("idMateria");
  console.log(idMateria);
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
        datos.append("idEliminar", idMateria);
      
        $.ajax({

          url:"ajax/materias.ajax.php",
          method: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          success:function(respuesta){

            var objData = JSON.parse(respuesta);

             if(objData.status){

              swal("¡CORRECTO!", objData.msg,"success");

                tablaMateria.ajax.reload(function() {

                  limpiarText();

                });

               // swal({
               //    type: "success",
               //    title: "¡CORRECTO!",
               //    text: objData.msg,
               //    showConfirmButton: true,
               //    confirmButtonText: "Cerrar"
               //   }).then(function(result){

               //     tablaMateria.ajax.reload(function() {

               //      limpiarText();

               //     });

               //  })

             }else{

                swal("Error", objData.msg,"error");

                tablaMateria.ajax.reload(function() {

                  limpiarText();

                });
              }

          }

        })

      }

    })

})

/*=============================================
  FUNCIÓN PARA LIMPIAR MATERIAS
=============================================*/

function limpiarText() {

  formMaterias.reset();

  $("#idMateria").val("");

  $("#txtMateria").val("");

  
}