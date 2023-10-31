
  $(".nav > li").click(function() {
    //Busca todos los elementos del nav que tengan la clase active y los elimina
  $(this).closest('.nav').find('li').removeClass('active');
  //Al elemento seleccionado agrega la clase active
          $(this).addClass('active');
      });


  /*=============================================
   QUITAR PUBLICIDAD
  =============================================*/

  $(document).ready(function (){
   
      document.querySelectorAll('.disclaimer')[0].style.visibility = 'hidden';

  })
  