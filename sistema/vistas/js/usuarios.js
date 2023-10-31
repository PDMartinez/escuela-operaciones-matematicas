

var tablaUsuarios;

tablaUsuarios=$(".tablaUsuarios").DataTable({
	"ajax":"ajax/tablaUsuarios.ajax.php",
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
	NUEVO
=============================================*/

$(document).on("click", ".btnNuevo", function() {

  $("#titulo").html("Nuevo Usuario");
  $("#btnGuardar").html("Guardar");

  LimpiarText();

})

/*==========================================================
     GUARDAR USUARIOS
============================================================*/

function guardarFormulario(){

	var txtIdUsuario = $("#idUsuario").val();

  var txtNombre = $("#txtNombre").val();

  var txtUsuario = $("#txtUsuario").val();

  var cmbPerfil = $("#cmbPerfil").val();

  var cmbCiudad = $("#cmbCiudad").val();

  var txtContrasenya = $("#txtContrasenya").val();

  var txtRepetirContrasenya = $("#txtRepetirContrasenya").val();

  var txtContrasenyaActual = $("#txtContrasenyaActual").val();

  var estado = 1;

  if(txtRepetirContrasenya != txtContrasenya){

  	swal("Error", "Las contraseñas no coinciden", "error");

  }else{
  

  // console.log("txtIdUsuario: " + txtIdUsuario + " txtNombre: "+ txtNombre + " txtUsuario: " + txtUsuario + " cmbPerfil: "+ cmbPerfil + " cmbCiudad: "+ cmbCiudad + " txtContrasenya: " + txtContrasenya + " txtRepetirContrasenya: "+ txtRepetirContrasenya);
  // return;

    var datos = new FormData();

      datos.append("txtIdUsuario", txtIdUsuario);
      datos.append("txtNombre", txtNombre);
      datos.append("txtUsuario", txtUsuario);
      datos.append("cmbPerfil", cmbPerfil);
      datos.append("cmbCiudad", cmbCiudad);
      datos.append("txtContrasenya", txtContrasenya);
      datos.append("txtContrasenyaActual", txtContrasenyaActual);
      datos.append("estado", estado);

      $.ajax({
	      url: "ajax/usuarios.ajax.php",
	      method: "POST",
	      data: datos,
	      cache: false,
	      contentType: false,
	      processData: false,

	      success: function(respuesta) {

	        var objData = JSON.parse(respuesta);

	        if (objData.status) {

		        $('#modalUsuarios').modal('hide');

		        swal("Correcto", objData.msg, "success");

		        tablaUsuarios.ajax.reload(function() {

		          LimpiarText();

		        });

		      }else{

		        swal("Error", objData.msg, "error");


		      }

	      }

    })

  }

  return (false);

}

/*=============================================
Editar Usuario
=============================================*/

$(document).on("click", ".editarUsuario", function(){

	LimpiarText();

  $("#titulo").html("Editar Usuario");
  $("#btnGuardar").html("Actualizar");

	var idUsuario = $(this).attr("idUsuario");

	// console.log(idUsuario);
	// return;

	var datos = new FormData();
  datos.append("idUsuario", idUsuario);

  	$.ajax({
  		url:"ajax/usuarios.ajax.php",
  		method: "POST",
  		data: datos,
  		cache: false,
			contentType: false,
    	processData: false,
    	dataType: "json",
    	success:function(respuesta){

    		$("#idUsuario").val(respuesta["id_u"]);

    		$("#txtNombre").val(respuesta["nombre"]);

	      $("#txtUsuario").val(respuesta["usuario"]);

	      $("#cmbPerfil").val(respuesta["id_perfil"]);

	      $("#cmbCiudad").val(respuesta["id_ciudad"]);

	      $("#txtContrasenyaActual").val(respuesta["password"]);

    	}

  	})

})

/*=============================================
Activar o desactivar administrador
=============================================*/

$(document).on("click", ".btnActivar", function(){

	var idUsuario = $(this).attr("idUsuario");
	var estadoUsuario = $(this).attr("estadoUsuario");
	var boton = $(this);

	// console.log(idUsuario);
	// console.log(estadoUsuario);
	// console.log(boton);
	// return;

	var datos = new FormData();
  datos.append("idActivarUsuario", idUsuario);
  datos.append("estadoActivarUsuario", estadoUsuario);

  	 $.ajax({

      url:"ajax/usuarios.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){
      	
      	if(respuesta == "ok"){

      		if(estadoUsuario == 0){

      			 $(boton).removeClass('btn-info');
      			 $(boton).addClass('btn-dark');
      			 $(boton).html('Desactivado');
      			 $(boton).attr('estadoUsuario', 1);

      		}else{

	            $(boton).addClass('btn-info');
	            $(boton).removeClass('btn-dark');
	            $(boton).html('Activado');
	            $(boton).attr('estadoUsuario',0);

	        }

      	}

      }

    })  

})

/*=============================================
Eliminar Usuarios
=============================================*/

$(document).on("click", ".eliminarUsuario", function(){

	var idUsuario = $(this).attr("idUsuario");

	if(idUsuario == 1){

		swal({
          title: "Error",
          text: "Este Usuario no se puede eliminar",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

    return;
	}

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
        datos.append("idEliminar", idUsuario);
      
        $.ajax({

          url:"ajax/usuarios.ajax.php",
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

                   tablaUsuarios.ajax.reload(function() {

                    LimpiarText();

                   });

                })

             }else{

                  swal("Error",objData.msg,"error");

                  tablaUsuarios.ajax.reload(function() {

                    LimpiarText();

                   });
              }

          }

        })

      }

    })

})

/*=============================================
LIMPIAR CAMPOS
=============================================*/

function LimpiarText() {

  formUsuarios.reset();

  $("#idUsuario").val("");

  $("#txtNombre").val("");

  $("#txtUsuario").val("");

  $("#cmbPerfil").val("");

  $("#cmbCiudad").val("");

  $("#txtContrasenya").val("");

  $("#txtContrasenyaActual").val("");

}