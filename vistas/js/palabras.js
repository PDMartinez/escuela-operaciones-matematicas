
cargarPalabras();

/*=============================================
      BUSCAR PALABRAS
=============================================*/

$(document).on("click", "#btnBuscar", function() {

  cargarPalabras();

})


/*=============================================
      CARGAR PALABRAS
=============================================*/

function cargarPalabras(){

  var palabra = $('#txtBuscar').val();

  // console.log(palabra);
  // return;

  var datos = new FormData();

  datos.append("palabra", palabra);

  $.ajax({

    url:"ajax/palabras.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success:function(respuesta){

      // console.log(respuesta.length);
      // return;

      if(respuesta.length > 0){

        document.getElementById("listando").style.display="none";

        $(".contenidoPalabra").remove();

        $.each(respuesta, function(i, value) {

          var imagen = "sistema/vistas/img/diccionarios/default/sinImagen.png";

          if(value["foto"] != null ){

            imagen = "sistema/"+JSON.parse(value["foto"]);

          }

          $("#listadoPalabra").append(
          
            '<div class="tm-comment tm-mb-45 contenidoPalabra" id="contenidoPalabra">'+

              '<figure class="tm-comment-figure">'+

                '<img src="'+imagen+'" width="150px" height="150px" alt="Imagen" class="mb-2 rounded-circle img-thumbnail">'+
                
                '<figcaption class="tm-color-primary text-center"><font style="vertical-align: inherit;"><h3>'+value["guarani"]+'</h3></font></figcaption>'+

              '</figure>'+

              '<div>'+

                '<div class="d-flex justify-content-between">'+

                  '<span href="#" class="tm-color-primary"><font style="vertical-align: inherit;">TRADUCCIÓN: </font></span>'+
                          
                '</div>' +

                '<p>'+
                  '<font style="vertical-align: inherit; color: #000;"><b>'+value["espanyol"]+'</b></font>'+
                '</p>'+

                '<div class="d-flex justify-content-between">'+

                  '<span href="#" class="tm-color-primary"><font style="vertical-align: inherit;">ORACIÓN: </font></span>'+

                '</div>'+

                '<p>'+

                  '<font style="vertical-align: inherit; color: #000;">'+value["oracion"]+'</font>'+

                '</p>'+

                '</div>'+

            '</div>'+

            '<hr class="contenidoPalabra">'

          );

        });

      }else{

        $(".contenidoPalabra").remove();

        // $("#listadoPalabra").append(

        //   '<p style="display: block;" id="listando"><font style="vertical-align: inherit;">Listando datos...</font></p> '

        // );
        
      }
    }

  }) 


}
