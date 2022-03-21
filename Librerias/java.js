
let d= document;
const $boton= d.getElementById("boton");
const $accion= d.getElementById("accion");
const $texto= d.querySelector(".texto");
const $form= d.getElementById("miFormulario");
var ruta="../Controlador/controladorAprendiz.php";



const eliminar= async (id)=>{
    try{           
        var formulario = new FormData();
        formulario.append("accion","eliminar");
        formulario.append("id",id);
        let valor = await fetch(ruta,{body:formulario ,method:"POST"});
        let mensaje = await valor.text();                
        Swal.fire(mensaje)
        carga();        
        if(!valor.ok) throw{}
        }
        catch(Error ){
            alert("Error en peticion listar");
        }
}
const carga= async ()=>{
    try{           
        var formulario = new FormData();
        formulario.append("accion","listar");
        let valor = await fetch(ruta,{body:formulario ,method:"POST"});
        let json = await valor.json();        

         let template=""   ;
            json.forEach(x => {
                template+=`
                 <tr>                
                <td>${x.Nombre}</td>
                <td>${x.Apellido}</td>
                <td >${x.Edad}</td>
                <td>${x.Genero}</td>
                <td>
                    <a class="text-danger" data-id="${x.Id}">
                      <i class="fas fa-trash" data-id="${x.Id}"></i>
                    </a>&nbsp;&nbsp;
                    <a class="text-success" data-id="${Object.values(x)}">
                      <i class="far fa-edit" data-id="${Object.values(x)}" ></i>
                  </a>

                </td>
            </tr> `       });
                
        d.getElementById("tablad").innerHTML=template;
        
        
        if(!valor.ok) throw{}
        }
        catch(Error ){
            alert("Error en peticion listar");
        }
}

(()=>{

    carga();
})()


const cargaDatos= async()=>{
    try{           
    var formulario = new FormData($form);
    let valor = await fetch(ruta,{body:formulario ,method:"POST"});
    let mensaje = await valor.text();
    Swal.fire(mensaje)
    $form.reset();
    $form.accion.value="agregar";
    $boton.classList.remove("btn-warning");  
    $boton.classList.add("btn-success");  
    d.querySelector(".n").textContent="Agregar";
    $texto.textContent="Agregar Aprendiz";
    carga();    
    if(!valor.ok) throw{}
    }
    catch(Error ){
        alert("Error en peticion guardar");
    }
}

d.addEventListener("click",(event)=>{
    event.preventDefault();
    if(event.target.matches("#boton") || event.target.matches("#boton *") ){
        cargaDatos();        
    }
    if(event.target.matches(".text-danger") || event.target.matches(".text-danger  *") ){
        
        let id =event.target.getAttribute("data-id");        
        eliminar(id);        
    }
    if(event.target.matches(".text-success") || event.target.matches(".text-success *") ){
        let informacion =event.target.getAttribute("data-id");        
         datos=informacion.split(',');
         datos=informacion.split(',');
         $form.Nombre.value=datos[1];
         $form.Apellido.value=datos[2];
         $form.Genero.value=datos[3];
         $form.Edad.value=datos[4];
         $form.id.value=datos[0];
         $form.accion.value="modificar";
         $boton.classList.remove("btn-success");  
         $boton.classList.add("btn-warning");  
         d.querySelector(".n").textContent="Modificar";
         $texto.textContent="Modificar Aprendiz";
        }
    

})


