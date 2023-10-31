
limpiarCKEDITORNuevo();

/*=============================================
      ASIGNAR LETRAS DE ACCESO DIRECTO
=============================================*/

$(document).on("click", ".letra", function() {

  var buscador = $("#buscador").val();
  var letra = $(this).html();

  // console.log(buscador);
  // return;

  $("#buscador").val(buscador+letra);

})



/*=============================================
      BUSCAR RESPUESTAS
=============================================*/

$(document).on("click", ".btnBuscar", function() {

  var palabra = $('#buscador').val();


  if(palabra == ""){
    // console.log("vacio");
    return;
  }

  document.getElementById("mensaje").style.display="none";
  document.getElementById("respuesta").style.display="block";

  limpiarCKEDITOREditar();

  // console.log(palabra);
  // return;

  var datos = new FormData();

  datos.append("palabra", palabra);

  $.ajax({

    url:"ajax/diccionarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success:function(respuesta){

      var imagen = "sistema/vistas/img/diccionarios/default/sinImagen.png";

      if(respuesta["foto"] != null){

        imagen = "sistema/"+JSON.parse(respuesta["foto"]);

      }

      $(".foto").attr("src",imagen);

      if(palabra.toUpperCase() != respuesta["guarani"].toUpperCase()){

        $('.tituloGuarani').text("Tal vez quizo decir:");

      }else{

        $(".tituloGuarani").text("Usted Ingresó:");

      }
      
      $("#guarani").val(respuesta["guarani"]);

      $("#espanyol").val(respuesta["espanyol"]);

      $("#txtOracion").val(respuesta["oracion"]);

      $(".ck-content").remove();

      ClassicEditor.create(document.querySelector('#txtOracion'), {

        toolbar: []

        }).then(function (editor) {
                    
          $(".ck-content").css({"height":"200px"})

          myEditorOracion =  editor;
          myEditorOracion.isReadOnly = true;

        }).catch(function (error) {

          console.log("error", error);

      })

        
    }

  }) 

})

/*=============================================
      LIMPIAR PANTALLA
=============================================*/

$(document).on("click", ".btnLimpiar", function() {

  limpiar();

})

/*=============================================
      LIMPIAR
=============================================*/
function limpiar(){

  document.getElementById("mensaje").style.display="block";
  document.getElementById("respuesta").style.display="none";
  $("#buscador").val("");
  //$("#buscador").focus();

}


$(document).on("click", ".letra", function() {
  $("#buscador").focus();
});


/*=============================================
Limpiar ckEditor
=============================================*/

function limpiarCKEDITOREditar(){

  $("#oracion").remove();

  $("#oracionPrincipal").append(

      '<div class="form-group" id="oracion">'+

          '<label class="tm-color-primary">Te presento una Oración:</label>'+

          '<textarea class="form-control txtOracion" rows="3" id="txtOracion" name="txtOracion"></textarea>'+

      '</div>'

    );

}

/*=============================================
Limpiar ckEditor
=============================================*/

function limpiarCKEDITORNuevo(){

  $("#oracion").remove();

  $("#oracionPrincipal").append(

      '<div class="form-group" id="oracion">'+

            '<label class="tm-color-primary">Te presento una Oración:</label>'+

            '<textarea class="form-control txtOracion" rows="3" id="txtOracion" name="txtOracion"></textarea>'+

      '</div>'

);

ClassicEditor.create(document.querySelector('#txtOracion'), {

      toolbar: []

    }).then(function (editor) {
                
      $(".ck-content").css({"height":"200px"})

      myEditorOracion =  editor;
      myEditorOracion.isReadOnly = true;

    }).catch(function (error) {

      console.log("error", error);

    })  

}
