let $Agregar = document.getElementById("Agregar");      
let $Modicar = document.getElementById("btnModificar"); 
let ruta="../Controlador/usuariosController.php";


document.addEventListener("click",event=>{
    if(event.target.matches(".eliminar")){
        event.preventDefault();    
        console.log(event.target)
        let id=event.target.getAttribute('data-id');
        let name=event.target.getAttribute('data-name');
        toastr["error"](`¿Deseas Eliminar este registro?<br />${name}<br /><button type='button' class='btn btn-primary si'data-id=${id} >Si</button>`)
    }

    if(event.target.matches(".si")){
        event.preventDefault();   
        let id=event.target.getAttribute('data-id');
        let form = new FormData();    
        form.append("Id",id);
        let informacion=Promise.resolve(modificar(ruta,form,'eliminar'));        
        informacion.then(event=>{              
            insertInformacion();              
            toastr["success"](`Registro se elimino correctamente`);     
        });
    }

    
    if(event.target.matches(".modificar")){
        event.preventDefault();   
        let data=event.target.getAttribute('data-id');                
        datos=data.split(',');        
        let $form = document.getElementById("myformUsuarios");  
        $form.Nombre.value= datos[1];
        $form.Apellido.value= datos[2];
        $form.Telefono.value= datos[3];
        $form.Direccion.value= datos[4];
        $form.Correo.value= datos[9];
        $form.password.value= datos[1]+2022;
        $form.Rol.value= datos[7];
        $form.usuario.value= datos[6];
        $form.Id.value= datos[0];
        $form.Ciudad.value= datos[5];
        $Agregar.classList.add("ocultar");
        $Modicar.classList.remove("ocultar");
        let caja=document.getElementById("formulariocollapse");        

        (!caja.classList.contains("show"))?
        caja.classList.toggle("show"):"";        
    }

    if(event.target.matches("#btnModificar")){
        event.preventDefault();  
        if(validarCampos()){
                    let $form = document.getElementById("myformUsuarios");    
                    let form = new FormData($form);                            
                    let informacion=Promise.resolve(modificar(ruta,form,'modificar'));        
                    informacion.then(event=>{              
                        insertInformacion(); 
                        $form.reset();   
                        $Agregar.classList.remove("ocultar");
                        $Modicar.classList.add("ocultar");   
                        toastr["success"](`Registro modificado correctamente`);     
                    });
                }        
        
    }


})

const insertInformacion=()=>{
    let informacion=Promise.resolve(lista(ruta));
    let cadena = "";
    informacion.then(event=>{
        event.forEach(element => {
            cadena+=` <tr> 
                        <td>${element.nombre_usuario}</td>
                        <td>${element.apellido_usuario}</td>
                        <td>${element.usuario}</td>
                        <td>${element.telefono_usuario}</td>
                        <td>${element.ciudad_usuario}</td>
                        <td>${element.nombre_rol}</td>            
                        <td>
                        <span class="badge rounded-pill bg-danger eliminar" data-id=${element.id_usuario} data-name=${element.nombre_usuario}>Eliminar </span> 

                        <span class="badge rounded-pill bg-warning text-dark modificar "
                            data-id="${Object.values(element)}"
                        >Modificar</span>
                        </td>  
                      </td>` 

        });    
     document.getElementById('tbusuarios').innerHTML= cadena;                   
    } );

  
}

document.addEventListener("DOMContentLoaded",()=>{
    insertInformacion();
  });


  //Agregar
$Agregar.addEventListener("click", (evento)=>{  
    evento.preventDefault();  
    if(validarCampos()){
        let $form = document.getElementById("myformUsuarios");    
        let form = new FormData($form);        
        let informacion=Promise.resolve(modificar(ruta,form,'agregar'));        
        informacion.then(event=>{              
            insertInformacion(); 
            $form.reset();   

            toastr["success"](`Registro agregado correctamente`);     
        });
    }        
});


