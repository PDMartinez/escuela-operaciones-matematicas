const formularios = document.querySelector('#formulario');
formularios.addEventListener('enviar', function(e) {
    e.preventDefault();
    email();
})
function email(){
    const datos = new FormData(formularios);
    fetch('contacto.php', {
        method: 'POST',
        body: datos
    })
    .then(res => res.json())
    .then(res => {
        console.log(res).FormData.datos
        if ("exito"){
           
            Swal.fire({
                icon: 'success',
                title: 'Exito',
                text: 'Mensaje enviado',
                footer: 'Revisa tu correo electronico'
            })
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops',
                text: 'Error',
                footer: 'Intente de nuevo'
            })
        }
    })
}