window.addEventListener('DOMContentLoaded', function(){
  // alert("cargado");
});

//Inicializar librería moment js
        moment.locale('es');
        let fechaHoy = moment().format('LL');
        // moment().format();
        let fecha = document.querySelector("#mostrarFecha");
        fecha.textContent = fechaHoy;
        fecha.style.color = 'gray';
        fecha.style.fontSize = '12px';




$('.eliminar').click(function(e) {
e.preventDefault(); // Prevent the href from redirecting directly
var linkURL = $(this).attr("href");
warnBeforeRedirect(linkURL);
});

 function warnBeforeRedirect(linkURL) {
    Swal.fire({
      title: '¿Estás seguro?',
    text: "No se puede deshacer este cambio",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, adelante',
    cancelButtonText:'No, cancelar'
    }).then((result) => {
  if (result.value) {
    window.location.href = linkURL;
  }
  return false;
})
  }
