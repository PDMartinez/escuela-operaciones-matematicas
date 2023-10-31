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
        console.log(res)
        if ('exito'){
            return 'ok';
        }else{
            return 'nok';
        }
    })
}