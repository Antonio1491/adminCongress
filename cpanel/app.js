// console.log('funcionando');

let formulario = document.getElementById('formulario');
// let respuesta = document.getElementById('respuesta');

formulario.addEventListener('submit', async (e) =>{
    e.preventDefault();
    // console.log('me diste un click')

    let datos = new FormData(formulario);

    

    // console.log(datos)
    // let usario =datos.get('email');
    // let pass = datos.get('password');
    // console.log(usario);
    // console.log(pass);
    const peticion = await fetch('inc/identificacion.php',{
        method: 'POST',
        body: datos
    })
       const resp = await peticion.json();
       const [objresp] = resp;
    // console.log(resp);

    //    let [{tipo}] =  await resp;
    //    let [{id_credencial}] =  await resp;
    // let [{id_credenciales}] =  await resp;

    //  const resp1= Object.values(resp) // [24, 23, 33, 12, 31]

    //  console.log(resp1);

       
            // console.log(objresp)
            if(resp === 'vacio'){
                Swal.fire({
                    icon: 'error',
                    title: 'Llena todos los campos primero',
                  })
                  
            }
            
            if(resp=== 'admin'){
                Swal.fire({
                    icon: 'success',
                    title: 'Bienvenido',
                  })
                  .then(function() {
                    window.location = "admin/index.php";
                });
            }
          
            else if(resp== 'error'){
                Swal.fire({
                    icon: 'error',
                    title: 'Usuario o contraseña invalida',
                  })
                 
            }
            else if( objresp.tipo==='3') {

                // console.log(resp);
                Swal.fire({
                    icon: 'success',
                    title: 'Bienvenido',
                  })
                  .then(function() {
                    window.location = `admin/propuestas_calificar.php?id=${objresp.id_credenciales}` ;
                });
            }
            else if ( objresp.tipo ==='2'){

                Swal.fire({

                            icon: 'success',
                            title: 'Bienvenido',
                          })
                          .then(function() {
                            window.location = `../cpanel/conferencistas/index.php?id=${objresp.id_credenciales}`;
                        });

            }
        
   
    
})


