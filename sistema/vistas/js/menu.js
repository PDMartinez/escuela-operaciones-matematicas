/*=============================================
Tabla Menu
=============================================*/

// $.ajax({

//     "url":"ajax/tablaMenu.ajax.php",
//     success: function(respuesta){
      
//      console.log("respuesta", respuesta);

//     }

// })

$(".tablaMenu").DataTable({
  "ajax":"ajax/tablaMenu.ajax.php",
  "deferRender": true,
  "retrieve": true,
  "processing": true,
  "language": {

     "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0",
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

});


/*=============================================
Ruta Menu
=============================================*/

function limpiarUrl(texto){

  var texto = texto.toLowerCase();
  texto = texto.replace(/[á]/g, 'a');
  texto = texto.replace(/[é]/g, 'e');
  texto = texto.replace(/[í]/g, 'i');
  texto = texto.replace(/[ó]/g, 'o');
  texto = texto.replace(/[ú]/g, 'u');
  texto = texto.replace(/[ñ]/g, 'n');
  texto = texto.replace(/ /g, '');

  return texto;

}


$(document).on("keyup", "input[name='tituloMenu'],input[name='EditartituloMenu']", function(){

  $("input[name='rutaMenu']").val(

    limpiarUrl($("input[name='tituloMenu']").val())

  )
$("input[name='EditarrutaMenu']").val(

    limpiarUrl($("input[name='EditartituloMenu']").val())

  )
})

/*=============================================
Editar Banner
=============================================*/


$(document).on("click", ".editarMenu", function(){

  var idMenu = $(this).attr("idMenu");

  var datos = new FormData();
  datos.append("idMenu", idMenu);

  $.ajax({

    url:"ajax/menu.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success:function(respuesta){

      $('input[name="idMenu"]').val(respuesta["ID"]);
      $('input[name="EditartituloMenu"]').val(respuesta["TITULO"]);
      $('input[name="EditarrutaMenu"]').val(respuesta["MENU"]);
   
    }

  })  

})

/*=============================================
Eliminar Banner
=============================================*/

$(document).on("click", ".eliminarMenu", function(){

  var idMenu = $(this).attr("idMenu");
  var rutaMenu = $(this).attr("rutaMenu");
 
  swal({
    title: '¿Está seguro de eliminar este Menu?',
    text: "¡Si no lo está puede cancelar la acción!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, eliminar Menu!'
  }).then(function(result){

    if(result.value){
       
        var datos = new FormData();
        datos.append("idEliminar", idMenu);
        datos.append("rutaMenu", rutaMenu);

        $.ajax({

          url:"ajax/menu.ajax.php",
          method: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          success:function(respuesta){

             if(respuesta == "ok"){
               swal({
                  type: "success",
                  title: "¡CORRECTO!",
                  text: "El Menu ha sido borrado correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                 }).then(function(result){

                    if(result.value){

                      window.location = "menu";

                    }
                })

             }

          }

        })

      }

    })

})


/*=============================================
Activar o desactivar menu
=============================================*/

$(document).on("click", ".btnActivar", function(){

  var idMenu = $(this).attr("idMenu");
  var estadoMenu = $(this).attr("estadoMenu");
  var boton = $(this);

  var datos = new FormData();
    datos.append("idMenu", idMenu);
    datos.append("estadoMenu", estadoMenu);

     $.ajax({

      url:"ajax/menu.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){
        
        if(respuesta == "ok"){

          if(estadoAdmin == 0){

             $(boton).removeClass('btn-info');
             $(boton).addClass('btn-dark');
             $(boton).html('Desactivado');
             $(boton).attr('estadoMenu', 1);

          }else{

              $(boton).addClass('btn-info');
              $(boton).removeClass('btn-dark');
              $(boton).html('Activado');
              $(boton).attr('estadoMenu',0);

          }

        }

      }

    })  

})

