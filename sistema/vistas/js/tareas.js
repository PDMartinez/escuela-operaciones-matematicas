/*=============================================
Tabla Tareas
=============================================*/

var tablaTareas = $(".tablaTareas").DataTable({
  "ajax":"ajax/tablaTareas.ajax.php",
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

var mensajeFinal = 0;

/*==========================================================
    GUARDAR TAREA
============================================================*/

function guardarFormulario(){

  var idTarea = $("#idTarea").val();
  var cmbGrado = $("#cmbGrado").val();
  var cmbMateria = $("#cmbMateria").val();
  var txtTarea = myEditorTarea.getData();
  var txtVideo = $("#txtVideo").val();
  var txtResultado = $("#txtResultado").val();

  var galeria = $(".inputGaleria").val();
  var galeriaAntigua = $(".inputAntiguaGaleria").val();
  var galeriaAntiguaEstatica = $(".inputAntiguaGaleriaEstatica").val();

  var galeria1 = $(".inputGaleria1").val();
  var galeriaAntigua1 = $(".inputAntiguaGaleria1").val();
  var galeriaAntiguaEstatica1 = $(".inputAntiguaGaleriaEstatica1").val();


  mostrarLoading();

  // console.log(archivosTemporales);
  // console.log("idTarea: " + idTarea + " cmbGrado: "+ cmbGrado + " cmbMateria: " + cmbMateria + " txtTarea: "+ txtTarea + " txtVideo: "+ txtVideo + " txtResultado: " + txtResultado);
  // return false;

  var datos = new FormData();

      datos.append("idTarea", idTarea);
      datos.append("txtGrado", cmbGrado);
      datos.append("txtMateria", cmbMateria);
      datos.append("txtTarea", txtTarea);
      datos.append("txtVideo", txtVideo);
      datos.append("txtResultado", txtResultado);

      $.ajax({
      url: "ajax/tareas.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,

      success: function(respuesta) {

        var objData = JSON.parse(respuesta);

        if(archivosTemporales1.length > 0 && archivosTemporales.length > 0){

            mensajeFinal = "temporal1";

        }else if(archivosTemporales1.length == 0 && archivosTemporales.length > 0){

          mensajeFinal = "temporal";

        }else if(archivosTemporales1.length > 0 && archivosTemporales.length == 0){

          mensajeFinal = "temporal1";

        }else{

          mensajeFinal = "ninguno";

        }

        if (objData.status) {

          // console.log(objData.id_tarea);
          // return;

          if(parseInt(objData.id_tarea) > 0){

            agregarImagen(archivosTemporales, objData.id_tarea, galeria, galeriaAntigua, galeriaAntiguaEstatica);
            agregarImagen1(archivosTemporales1, objData.id_tarea, galeria1, galeriaAntigua1, galeriaAntiguaEstatica1);

          }

          if(parseInt(objData.id_tarea) <= 0){

            agregarImagen(archivosTemporales, idTarea, galeria, galeriaAntigua, galeriaAntiguaEstatica);
            agregarImagen1(archivosTemporales1, idTarea, galeria1, galeriaAntigua1, galeriaAntiguaEstatica1);

          }

          if(mensajeFinal == "ninguno"){

            cerrarLoading();

            swal("¡CORRECTO!", objData.msg, "success");

            tablaTareas.ajax.reload(function() {

              limpiarText();

            });

          }


        } else {

          cerrarLoading();

          swal("Error", objData.msg, "error");

        }

      }

    })
  
  return false;

}

/*=============================================
  NUEVA TAREA
=============================================*/

$(document).on("click", ".btnNuevo", function() {

  limpiarText();

  limpiarCKEDITORNuevo();

  $("#titulo").html("Nuevo Registro");
  $("#btnGuardar").html("Guardar");

})


/*=============================================
  EDITAR TAREAS
=============================================*/

$(document).on("click", ".editarTarea", function(){

  limpiarText();

  limpiarCKEDITOREditar();

  $("#titulo").html("Editar Registro");
  $("#btnGuardar").html("Actualizar");

  var idTarea = $(this).attr("idTarea");
  var galeria = $(this).attr("galeriaTarea");
  var galeria1 = $(this).attr("galeriaResultado");
  
  var datos = new FormData();

  datos.append("idTarea", idTarea);
  datos.append("galeria", galeria);
  datos.append("galeria1", galeria1);

  $.ajax({

    url:"ajax/tareas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success:function(respuesta){

      // console.log(respuesta);
      // return;
      
      $("#idTarea").val(respuesta["id_tarea"]);

      $("#cmbGrado").val(respuesta["id_grado"]);

      $("#cmbMateria").val(respuesta["id_materia"]);

      $("#txtTarea").val(respuesta["descripcion_tarea"]);

      $(".ck-content").remove();

      ClassicEditor.create(document.querySelector('#txtTarea'), {

          toolbar: [ 'heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', '|', 'undo', 'redo']

        }).then(function (editor) {
                    
          $(".ck-content").css({"height":"200px"})

          myEditorTarea =  editor;

        }).catch(function (error) {

          console.log("error", error);

      })

      $(".inputAntiguaGaleriaEstatica").val((respuesta["img_tarea"]));
      $(".inputAntiguaGaleriaEstatica1").val((respuesta["img_resultado"]));
      
      // COLOCAR LAS IMAGENES
      if (respuesta["img_tarea"] != '[""]' && respuesta["img_tarea"] != null && respuesta["img_tarea"] != '') {

        multiplesArchivosAntiguos(respuesta["img_tarea"]);
       
      }

      if (respuesta["img_resultado"] != '[""]' && respuesta["img_resultado"] != null && respuesta["img_resultado"] != '') {

        multiplesArchivosAntiguos1(respuesta["img_resultado"]);
       
      }

      $("#txtVideo").val(respuesta["video_tarea"]);
      $("#txtResultado").val(respuesta["resultado"]);

      var key = $("#txtVideo").val();
      // $("#player").removeClass('notblock');
      $("#player").remove();
      $("#playerCabecera").append('<div id="player" class=""></div>');
      
      var player = new YT.Player('player', {
              height: '360',
              width: '640',
              videoId: `${key}`, // Reemplaza VIDEO_ID_AQUÍ por el ID del vídeo de YouTube que deseas reproducir
              playerVars: {
                  'autoplay': 0, // Autoplay 1=activado, 0=desactivado
                  'controls': 1, // Mostrar controles del reproductor
                  'rel': 0, // Evitar videos relacionados al final
              },
              events: {
                  // 'onReady': onPlayerReady, // Función a ejecutar cuando el reproductor esté listo
                  // 'onStateChange': onPlayerStateChange // Función a ejecutar cuando cambie el estado del reproductor
              }
      });
   
    }

  })  

})

/*=============================================
  ELIMINAR TAREAS
=============================================*/

$(document).on("click", ".eliminarTarea", function(){

  var idTarea = $(this).attr("idTarea");
  var galeria = $(this).attr("galeriaTarea");
  var galeria1 = $(this).attr("galeriaResultado");

  // alert(idTarea + "  " + galeria);
  // return;
 
  swal({
    title: '¿Está seguro de eliminar?',
    text: "¡Si no lo está puede cancelar la acción!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, eliminar Tarea!'
  }).then(function(result){

    if(result.value){
       
        var datos = new FormData();

        datos.append("idEliminar", idTarea);
        datos.append("galeria", galeria);
        datos.append("galeria1", galeria1);

        $.ajax({

          url:"ajax/tareas.ajax.php",
          method: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          success:function(respuesta){

            var objData = JSON.parse(respuesta);

            if (objData.status) {

              swal("¡CORRECTO!", objData.msg, "success");

              limpiarText();
                
              tablaTareas.ajax.reload(function() {

              });

            }

          }

        })

      }

    })

})

/*=============================================
ACTIVAR TAREAS
=============================================*/

$(".tablaTareas").on("click", ".btnActivar", function(){

  var idTarea = $(this).attr("idTarea");
  var estadoTarea = $(this).attr("estadoTarea");

  // alert(idTarea + " " + estadoTarea);
  // return;

  var datos = new FormData();
  datos.append("activarId", idTarea);
  datos.append("activarTarea", estadoTarea);

    $.ajax({

      url:"ajax/tareas.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

        var objData = JSON.parse(respuesta);

            if (objData.status) {

              swal("¡CORRECTO!", objData.msg, "success");
                
              tablaTareas.ajax.reload(function() {

                  limpiarText();

              });


            }

      }

    })

    if(estadoTarea == 0){

      $(this).removeClass('btn-success');
      $(this).addClass('btn-danger');
      $(this).html('Desactivado');
      $(this).attr('estadoTarea',1);

    }else{

      $(this).addClass('btn-success');
      $(this).removeClass('btn-danger');
      $(this).html('Activado');
      $(this).attr('estadoTarea',0);

    }

})


/*=============================================
Plugin ckEditor
=============================================*/

var myEditorTarea;

ClassicEditor.create(document.querySelector('#txtOracion'), {

      toolbar: [ 'heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', '|', 'undo', 'redo']

    }).then(function (editor) {
                
      $(".ck-content").css({"height":"200px"})

      myEditorTarea = editor;

    }).catch(function (error) {

      console.log("error", error);

    })

/*=============================================
Limpiar ckEditor
=============================================*/

function limpiarCKEDITOREditar(){

  $("#tarea").remove();

  $("#tareaPrincipal").append(

      '<div class="form-group" id="tarea">'+

            '<textarea class="form-control txtTarea" rows="5" id="txtTarea" name="txtTarea" style="width: 100%"></textarea>'+

      '</div>'

    );

}

/*=============================================
Limpiar ckEditor
=============================================*/

function limpiarCKEDITORNuevo(){

  $("#tarea").remove();

  $("#tareaPrincipal").append(

      '<div class="form-group" id="tarea">'+

            '<textarea class="form-control txtTarea" rows="5" id="txtTarea" name="txtTarea" style="width: 100%"></textarea>'+

      '</div>'

    );

  ClassicEditor.create(document.querySelector('#txtTarea'), {

      toolbar: [ 'heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', '|', 'undo', 'redo']

    }).then(function (editor) {
                
      $(".ck-content").css({"height":"200px"})

      myEditorTarea =  editor;

    }).catch(function (error) {

      console.log("error", error);

    })  

}


/*=============================================
CUANDO SE QUITA EL FOCO DEL CAMPO URL
=============================================*/
$("#txtVideo").focusout(function() {

  var key = $("#txtVideo").val();
  $("#player").remove();
  $("#playerCabecera").append('<div id="player" class=""></div>');;
  
  var player = new YT.Player('player', {
          height: '360',
          width: '640',
          videoId: `${key}`, // Reemplaza VIDEO_ID_AQUÍ por el ID del vídeo de YouTube que deseas reproducir
          playerVars: {
              'autoplay': 0, // Autoplay 1=activado, 0=desactivado
              'controls': 1, // Mostrar controles del reproductor
              'rel': 0, // Evitar videos relacionados al final
          },
          events: {
              // 'onReady': onPlayerReady, // Función a ejecutar cuando el reproductor esté listo
              // 'onStateChange': onPlayerStateChange // Función a ejecutar cuando cambie el estado del reproductor
          }
  });

})

/*=============================================
AGREGAR PRIMERA IMAGEN
=============================================*/

var imagenPermitidoNuevo = [];
var imagenPermitidoAntiguo = [];
var ubicacion=[];
var archivosTemporales = [];

$("#galeria").change(function() {

  // alert("change");

  imagenPermitidoNuevo = [];
  imagenPermitidoAntiguo = [];

  var archivos = this.files;
  multiplesArchivos(archivos);

})

/*=============================================
AGREGAR PRIMERA IMAGEN
=============================================*/
function multiplesArchivos(archivos) {

  for (var i = 0; i < archivos.length; i++) {

   if ((imagenPermitidoNuevo.length+i+imagenPermitidoAntiguo.length) < 1) {

      var imagen = archivos[i];

      if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

        swal({
          title: "Error al subir la imagen",
          text: "¡La imagen debe estar en formato JPG o PNG!",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

        return;

      }  else if (imagen["size"] > 15000000) {

        swal({
          title: "Error al subir la imagen",
          text: "¡La imagen no debe pesar más de 15MB!",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

        return;

      } else {

        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function(event) {

          var rutaImagen = event.target.result;

          $(".vistaGaleria").attr("src",rutaImagen);

          if(archivosTemporales.length != 0){

            archivosTemporales = JSON.parse($(".inputNuevaGaleria").val());
            ubicacion= JSON.parse($(".inputGaleria").val());
            imagenPermitidoNuevo=archivosTemporales;
          }

          archivosTemporales.push(rutaImagen);
          ubicacion.push(imagen["name"] );

          imagenPermitidoNuevo=archivosTemporales;

         
          $(".inputNuevaGaleria").val(JSON.stringify(archivosTemporales));
          $(".inputGaleria").val(JSON.stringify(ubicacion));
          
        })

      }

   }else {
      swal({
        title: "Error al subir la imagen",
        text: "¡Está permitido como máximo 1 imagen!",
        type: "error",
        confirmButtonText: "¡Cerrar!"
      });
    
      return;
    
   }

  } // termina el for

}

/*=============================================
AGREGAR SEGUNDA IMAGEN
=============================================*/

var imagenPermitidoNuevo1 = [];
var imagenPermitidoAntiguo1 = [];
var ubicacion1=[];
var archivosTemporales1 = [];

$("#galeria1").change(function() {

  imagenPermitidoNuevo1 = [];
  imagenPermitidoAntiguo1 = [];

  var archivos = this.files;
  multiplesArchivos1(archivos);

})

/*=============================================
AGREGAR SEGUNDA IMAGEN
=============================================*/
function multiplesArchivos1(archivos) {

  for (var i = 0; i < archivos.length; i++) {

   if ((imagenPermitidoNuevo1.length+i+imagenPermitidoAntiguo1.length) < 1) {

      var imagen = archivos[i];

      if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

        swal({
          title: "Error al subir la imagen",
          text: "¡La imagen debe estar en formato JPG o PNG!",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

        return;

      }  else if (imagen["size"] > 15000000) {

        swal({
          title: "Error al subir la imagen",
          text: "¡La imagen no debe pesar más de 15MB!",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

        return;

      } else {

        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function(event) {

          var rutaImagen = event.target.result;

          $(".vistaGaleria1").attr("src",rutaImagen);

          if(archivosTemporales1.length != 0){

            archivosTemporales1 = JSON.parse($(".inputNuevaGaleria1").val());
            ubicacion1= JSON.parse($(".inputGaleria1").val());
            imagenPermitidoNuevo1=archivosTemporales1;
          }

          archivosTemporales1.push(rutaImagen);
          ubicacion1.push(imagen["name"] );

          imagenPermitidoNuevo1=archivosTemporales1;

          $(".inputNuevaGaleria1").val(JSON.stringify(archivosTemporales1));
          $(".inputGaleria1").val(JSON.stringify(ubicacion1));
          

        })

      }

   }else {
      swal({
        title: "Error al subir la imagen",
        text: "¡Está permitido como máximo 1 imagen!",
        type: "error",
        confirmButtonText: "¡Cerrar!"
      });
    
      return;
   }

  }

}

/*=============================================
AGREGAR EN LA BASE DE DATOS LA IMAGEN
=============================================*/

function agregarImagen(imagen,token,ruta,rutavieja,rutacompleta){
  // console.log(`imagen: ${imagen}`);
  // console.log(`token: ${token}`);
  // console.log(`ruta: ${ruta}`);
  // console.log(`rutavieja: ${rutavieja}`);
  // console.log(`rutacompleta: ${rutacompleta}`);
 /*=============================================
  PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
  =============================================*/
   
  if(imagen != ""){

    // alert(imagen);
    // return;
  
    /*=============================================
      PREGUNTAMOS SI VIENEN IMÁGENES PARA MULTIMEDIA
    =============================================*/

    if(imagen.length > 0 || rutavieja.length > 0){

      datosMultimedia = new FormData();
       
      for(var i = 0; i < imagen.length; i++){

        document.getElementById('galeria').files[i]=imagen[i];
        var img= document.getElementById('galeria').files[i];

        
          datosMultimedia.append("tabla", "tareas");
          datosMultimedia.append("token", token);
          datosMultimedia.append("token_columna", "id_tarea");
          datosMultimedia.append("rutavieja", rutavieja);
          datosMultimedia.append("rutacompleta", rutacompleta);
          datosMultimedia.append("foto_columna", "img_tarea");
          datosMultimedia.append("file", img);
          datosMultimedia.append("carpeta", "tareas");
          datosMultimedia.append("ruta", ruta);

          $.ajax({
        
            type: "POST",
            url:"ajax/multimedia.ajax.php",
            dataType:"json",
            contentType: false,
            processData: false,
            cache: false,
            data: datosMultimedia,

            xhr: function(){
            
              var xhr = $.ajaxSettings.xhr();

              xhr.onprogress = function(evt){ 

              var porcentaje = Math.floor((evt.loaded/evt.total*100));

            };

            return xhr;
              
            },
            beforeSend: () =>{

                $("#btnGuardar").prop('disabled', true);
                document.getElementById("mostrar_loading").style.display="block";
                document.getElementById("mostrar_loading").innerHTML="<img  width='150' heigth='150' data-src='loading.gif' class='lazyload' src='data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=='><noscript><img src='loading.gif' width='150' heigth='150'></noscript>";

            }         

            }).done(res=>{

              if(res.status===200){
                
                if(mensajeFinal == "temporal"){

                  cerrarLoading();

                  swal("¡CORRECTO!", res.msg, "success");

                  tablaTareas.ajax.reload(function() {

                    limpiarText();

                  });

                }

              }else{

                alert(res.msg);

              }

            }).fail(err=>{

              cerrarLoading();

              swal("Error", objData.msg, "error");

            })

      }

    }

  }

}

/*=============================================
AGREGAR EN LA BASE DE DATOS LA IMAGEN 1
=============================================*/

function agregarImagen1(imagen,token,ruta,rutavieja,rutacompleta){
 // console.log(`imagen: ${imagen}`);
 // console.log(`token: ${token}`);
 // console.log(`ruta: ${ruta}`);
 // console.log(`rutavieja: ${rutavieja}`);
 // console.log(`rutacompleta: ${rutacompleta}`);
 /*=============================================
  PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
  =============================================*/
   
  if(imagen != ""){

    // alert(imagen);
    // return;
  
    /*=============================================
      PREGUNTAMOS SI VIENEN IMÁGENES PARA MULTIMEDIA
    =============================================*/

    if(imagen.length > 0 || rutavieja.length > 0){

      datosMultimedia = new FormData();
       
      for(var i = 0; i < imagen.length; i++){

        document.getElementById('galeria1').files[i]=imagen[i];
        var img= document.getElementById('galeria1').files[i];

        
          datosMultimedia.append("tabla", "tareas");
          datosMultimedia.append("token", token);
          datosMultimedia.append("token_columna", "id_tarea");
          datosMultimedia.append("rutavieja", rutavieja);
          datosMultimedia.append("rutacompleta", rutacompleta);
          datosMultimedia.append("foto_columna", "img_resultado");
          datosMultimedia.append("file", img);
          datosMultimedia.append("carpeta", "tareas");
          datosMultimedia.append("ruta", ruta);

          $.ajax({
        
            type: "POST",
            url:"ajax/multimedia.ajax.php",
            dataType:"json",
            contentType: false,
            processData: false,
            cache: false,
            data: datosMultimedia,

            xhr: function(){
            
              var xhr = $.ajaxSettings.xhr();

              xhr.onprogress = function(evt){ 

              var porcentaje = Math.floor((evt.loaded/evt.total*100));

            };

            return xhr;
              
            },
            beforeSend: () =>{

                $("#btnGuardar").prop('disabled', true);
                document.getElementById("mostrar_loading").style.display="block";
                document.getElementById("mostrar_loading").innerHTML="<img  width='150' heigth='150' data-src='loading.gif' class='lazyload' src='data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=='><noscript><img src='loading.gif' width='150' heigth='150'></noscript>";

            }         

            }).done(res=>{

              if(res.status===200){
                
                if(mensajeFinal == "temporal1"){

                  cerrarLoading();

                  swal("¡CORRECTO!", res.msg, "success");

                  tablaTareas.ajax.reload(function() {

                    limpiarText();

                  });

                }

              }else{

                alert(res.msg);

              }

            }).fail(err=>{

              cerrarLoading();

              swal("Error", objData.msg, "error");

            })

      }

    }

  }

}

/*=============================================
AGREGAR IMAGENES ANTIGUOS
=============================================*/

archivosTemporalesAntiguo = [];

function multiplesArchivosAntiguos(archivos) {
  var longitud = JSON.parse(archivos);
  // console.log(longitud.length);
  for (var i = 0; i < longitud.length; i++) {
    var imagen = longitud[i];

    var rutaImagen = imagen;

    $(".vistaGaleria").attr("src",rutaImagen);

    archivosTemporalesAntiguo.push(rutaImagen.split(','));
    imagenPermitidoAntiguo = archivosTemporalesAntiguo;
   
    $(".inputAntiguaGaleria").val(archivosTemporalesAntiguo);

  } // termina el for

}

archivosTemporalesAntiguo1 = [];

function multiplesArchivosAntiguos1(archivos) {
  var longitud = JSON.parse(archivos);
  //console.log(longitud.length);
  for (var i = 0; i < longitud.length; i++) {
    var imagen = longitud[i];

    var rutaImagen = imagen;

    $(".vistaGaleria1").attr("src",rutaImagen);

    archivosTemporalesAntiguo1.push(rutaImagen.split(','));
    imagenPermitidoAntiguo1 = archivosTemporalesAntiguo1;
   
    $(".inputAntiguaGaleria1").val(archivosTemporalesAntiguo1);

  } // termina el for

}

/*=============================================
LIMPIAR CAMPOS
=============================================*/

function limpiarText() {

  formTareas.reset();

  $("#idTarea").val("");

  $("#txtEjercicio").val("");

  $("#txtVideo").val("");

  $("#txtResultado").val("");

  // -------CAMPOS DE IMAGENES-------

  $(".inputNuevaGaleria").val("");

  $(".inputGaleria").val("");

  $(".inputAntiguaGaleria").val("");

  $(".inputAntiguaGaleriaEstatica").val("");

  $(".vistaGaleria").val("");

  $(".vistaGaleria").removeAttr("src");


  $(".inputNuevaGaleria1").val("");

  $(".inputGaleria1").val("");

  $(".inputAntiguaGaleria1").val("");

  $(".inputAntiguaGaleriaEstatica1").val("");

  $(".vistaGaleria1").val("");

  $(".vistaGaleria1").removeAttr("src");

  archivosTemporales = [];
  archivosTemporalesAntiguo = [];

  archivosTemporales1 = [];
  archivosTemporalesAntiguo1 = [];

  $("#player").addClass('notblock');
  
}


/*=============================================
  MOSTRAR LOADING
=============================================*/

function mostrarLoading(){

  document.getElementById("mostrar_loading").style.display="block";
  document.getElementById("modalBody").style.display="none";

  $("#titulo").html("Guardando...");

  $('#btnGuardar').hide();
  $('#btnCerrar').hide();

}

/*=============================================
  CERRAR LOADING
=============================================*/

function cerrarLoading(){

  document.getElementById("mostrar_loading").style.display="none";
  document.getElementById("modalBody").style.display="block";

  $("#btnGuardar").prop('disabled', false);
  $("#btnCerrar").prop('disabled', false);

  $('#btnGuardar').show();
  $('#btnCerrar').show();

  $('#formTareas').trigger("reset");

  $('#modalTareas').modal('hide');

}


