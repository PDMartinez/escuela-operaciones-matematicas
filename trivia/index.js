
let imgResultado;

$(document).on("click", ".respuesta", function(){
      var resultado = $(this).attr("resultado");
      var respuesta = $(this).attr("respuesta");
      imgResultado = $(this).attr("imgResultado");
      
      if(resultado === respuesta){

            var modal = $('#modalCorrecta');
            modal.modal('show');

            var botonSolucion = $('.solucion');
            botonSolucion.removeClass('d-none');
            
      }else{
            var modal = $('#modalIncorrecta');
            modal.modal('show');

      }
})

$(document).ready(function() {
      $('#modal').on('shown.bs.modal', function () {
             
            var modal = $(this);
            // var imgSrc = modal.find('.img-fluid').attr("src");
            // console.log(JSON.parse(imgResultado));

            var img = modal.find('.img-fluid');
            var newSrc = JSON.parse(imgResultado);
            if(newSrc) img.attr("src", `../sistema/${newSrc[0]}`);
      });
});