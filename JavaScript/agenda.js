let $Agregar = document.getElementById("Agregar");      
let $Modicar = document.getElementById("btnModificar"); 
let Regional= document.getElementById("Regional"); 
let ruta="../Controlador/agendaController.php";


document.addEventListener("click",event=>{
    if(event.target.matches(".eliminar")){
        event.preventDefault();            
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


Regional.addEventListener("change",()=>{
    let id=Regional.value;
    let form = new FormData();    
    form.append("accion","listarSubregional");
    form.append("Id",id);
    fetch("../Controlador/agendaController.php",{body:form ,method:"POST"})
    .then(resul =>resul.json())
    .then(event=>{        
        cadena="<option value=''>Seleccione  subregional</ option> ";
        console.log(event);
        event.forEach(element => {
            cadena+=`    
                                                      
                        <option value="${element.id}">${element.nombre}</option>`                       
        });
        document.getElementById("Subregional").innerHTML= cadena;   
        

    });

 
})
             




const insertInformacion=()=>{
    let form = new FormData();    
    form.append("accion","listar");
    fetch("../Controlador/agendaController.php",{body:form ,method:"POST"})
    .then(resul =>resul.json())
    .then(event=>{        
        let cadena = "";
        event.forEach(element => {
            cadena+=` <tr> 
                        <td>${element.fase}</td>
                        <td>${element.nombre_usuario}</td> 
                        <td>${element.tarea}</td>                        
                        <td>${element.fecha_agenda}</td>
                        <td>${element.hora_agenda}</td>
                        <td>${element.nombre_tecnico}</td>            
                        <td>${element.nombre_ingeniero}</td>            
                        <td>${element.nombre_cliente}</td>            
                        <td>${element.nombre_regional}</td>            
                        <td>${element.nombre_subregional}</td>                                             
                        <td>
                        <span class="badge rounded-pill bg-danger eliminar" data-id=${element.id_agenda} data-name=${element.tarea}>Eliminar </span> 

                        <span class="badge rounded-pill bg-warning text-dark modificar "
                            data-id="${Object.values(element)}"
                        >Modificar</span>
                        </td>  
                      </td>` 

        });    
    document.getElementById('tbagenda').innerHTML= cadena;                   
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


