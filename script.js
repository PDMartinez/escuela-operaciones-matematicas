$('#modal4').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var video = button.data('url')
     //$("#myFrame").attr('src',video);  
     $('#modal4 iframe').attr("src", video);
  })

  $('#modal4').on('hidden.bs.modal', function (e) {
    // Quitar la reproduccion del video al ocutar el modal
    $('#modal4 iframe').attr("src", $("#modal4 iframe").attr("src"));
  });

