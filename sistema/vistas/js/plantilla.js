 // //Date and time picker
 //  $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

   // Funcion JavaScript para la conversion a mayusculas
 function mayusculas(e) {
          e.value = e.value.toUpperCase();
 }

 //FORMATEAR NUMERO DE DECIMAL
//================================

function format(input){

  var num = input.value.replace(/\./g,'');
  if(!isNaN(num)){
  num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
  num = num.split('').reverse().join('').replace(/^[\.]/,'');
  input.value = num;
}
 
else{ alert('Solo se permiten numeros');
input.value = input.value.replace(/[^\d\,]*/g,'');
}
}

/*=============================================
 QUITAR PUBLICIDAD
=============================================*/

// $(document).ready(function (){
 
//     document.querySelectorAll('.disclaimer')[0].style.visibility = 'hidden';

// })

  

