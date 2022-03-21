  toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "500",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
  
  document.addEventListener("DOMContentLoaded",()=>{
    toastr["success"]("Hola bienvenido al sistema Spectrum");
    toastr["success"]("Ingresa usuario y contraseña");
  });
  

  let iniciarSession =document.getElementById("inicioSession");
  let MyformInicio =document.getElementById("MyformInicio");
  let ruta="./Controlador/loginController.php";

  const carga= async ()=>{
    try{           
        var formulario = new FormData(MyformInicio);
        formulario.append("accion","login");
        let valor = await fetch(ruta,{body:formulario ,method:"POST"});
        let json = await valor.json();
        if(json.mensaje!==false){
          window.location.href = "/spectrum/vista/inicial.php";
        } else{
          toastr["error"]("Error valide informacion") 
        }       
        

        console.log(json);
        if(!valor.ok) throw{}
        }
        catch(Error ){
          toastr["error"]("Error en tiempo de ejecución") 
        }
    }

  iniciarSession.addEventListener("click", e=>{
    e.preventDefault();        
    if(MyformInicio.usuario.value==="" ||MyformInicio.usuario.value===""){ 
        toastr["error"]("Debe ingresar usuario y contraseña")        
    }else{
      carga();        
    }    


  })
  
