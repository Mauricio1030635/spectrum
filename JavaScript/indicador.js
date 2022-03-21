
let ruta="../Controlador/indicadorController.php";
document.addEventListener("DOMContentLoaded",()=>{     
        let form = new FormData();                     
        let agenda=Promise.resolve(modificar(ruta,form,'agenda'));        
        agenda.then(event=>{                                       
            document.querySelector(".cantidadAgenda").innerHTML=event;
        });        
        let tecnico=Promise.resolve(modificar(ruta,form,'tecnico'));        
        tecnico.then(event=>{                                       
            document.querySelector(".Tecnicos").innerHTML=event;
        });
        let usuario=Promise.resolve(modificar(ruta,form,'usuario'));        
        usuario.then(event=>{                                       
            document.querySelector(".Usuarios").innerHTML=event;
        });
        let ingeniero=Promise.resolve(modificar(ruta,form,'ingeniero'));        
        ingeniero.then(event=>{                                       
            document.querySelector(".Ingenieros").innerHTML=event;
        });
        let cliente=Promise.resolve(modificar(ruta,form,'cliente'));        
        cliente.then(event=>{                                       
            document.querySelector(".clientes").innerHTML=event;
        });        

})

