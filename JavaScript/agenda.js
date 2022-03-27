let $Agregar = document.getElementById("Agregar");      
let $Modicar = document.getElementById("btnModificar"); 
let $calidad1 = document.getElementById("btnCalidad"); 
let Regional= document.getElementById("Regional"); 
let calidad= document.getElementById("btnGuardarCalidad"); 
let ruta="../Controlador/agendaController.php";
var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
    keyboard: false
  })


document.addEventListener("click",event=>{
    if(event.target.matches(".eliminar")){
        event.preventDefault();            
        let id=event.target.getAttribute('data-id');
        console.log(id)
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
        let $form2 = document.getElementById("formcalidad");  
        $form2.reset();
        console.log(datos); 
        $form.Fase.value= datos[0];
        $form.Tarea.value= datos[1];
        $form.Descripcion.value= datos[2];
        $form.Fecha.value= datos[3];
        $form.Hora.value= datos[4];        
        $form.Tecnico.value= datos[11];
        $form.Ingeniero.value= datos[12];
        $form.Cliente.value= datos[13];
        $form.Regional.value= datos[15];
        cargarSubregional(datos[15],datos[16]);                            
        $form.Id.value= datos[17];    
        // ------------dos-----------------
        $form2.EstadoFinal.value=datos[18];
        $form2.Observaciones.value=datos[19];
        $form2.causalPuntualidad.value=datos[20];
        $form2.Estado.value=datos[21];
        $form2.Novedad.value=datos[22];
        $form2.ObservacionCalidad.value=datos[23];
        $form2.NovedadPuntualidad.value=datos[24];
        $form2.ObservacionTerreno.value=datos[25];
        $form2.falta.value=datos[26];
        $form2.tipofalta.value=datos[27];
        $form2.Obsrvacionfalta.value=datos[28];
        
        
        $Agregar.classList.add("ocultar");
        $Modicar.classList.remove("ocultar");
        $calidad1.classList.remove("ocultar");

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
                        $calidad1.classList.add("ocultar");   
                        toastr["success"](`Registro modificado correctamente`);     
                    });
        }        
        
    }


})


const cargarSubregional =(idA,n)=>{    
    let form = new FormData();    
    form.append("accion","listarSubregional");
    form.append("Id",idA);
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
        if(n!=null)          
            document.getElementById("Subregional").value=n;
    });

}




Regional.addEventListener("change",()=>{
    let id=Regional.value;
    cargarSubregional(id,null); 
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
                        <span class="badge rounded-pill bg-danger eliminar" data-id=${element.principal} data-name=${element.tarea}>Eliminar </span> 
                        <a  href="../Reportes/reporteAgendaI.php?iden=${element.principal}" target="_blank"
                        style ="text-decoration: none;"
                        class="badge rounded-pill bg-dark" data-id=${element.principal} data-name=${element.tarea}>PDF</a> 
                        
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


calidad.addEventListener("click", (evento)=>{  
    evento.preventDefault();      
    let $form = document.getElementById("formcalidad");    
    let form = new FormData($form);
    let id =document.getElementById("Id").value
    form.append("Id",id );          
    let informacion=Promise.resolve(modificar(ruta,form,'agregarcalidad'));        
    informacion.then(event=>{                          

        insertInformacion(); 
        myModal.toggle();
        toastr["success"](`Registro agregado correctamente modulo calidad`);     

    });
            
});



