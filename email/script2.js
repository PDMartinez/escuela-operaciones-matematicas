const formularios = document.getElementById("formulario");
if(formularios){
    formularios.addEventListener("submit",async (e) => {
            e.preventDefault();
           

            const mail = new FormData(formularios);
          const datos = await fetch("contacto.php", {
                method: "POST",
                body: mail
            });
            const respuesta = await datos.json();
            console.log(respuesta);
        });
    if(respuesta['status']){
     Swal.fire({
            icon: 'success',
            title: 'Exito',
             text: 'Mensaje enviado correctamente',
            footer: '*** fin ***'
        });
     }
}
   
