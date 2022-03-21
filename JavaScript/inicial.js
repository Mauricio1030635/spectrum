const mobileScreen = window.matchMedia("(max-width: 990px )");
$(document).ready(function () {
    $(".dashboard-nav-dropdown-toggle").click(function () {
        $(this).closest(".dashboard-nav-dropdown")
            .toggleClass("show")
            .find(".dashboard-nav-dropdown")
            .removeClass("show");
        $(this).parent()
            .siblings()
            .removeClass("show");
    });
    $(".menu-toggle").click(function () {
        if (mobileScreen.matches) {
            $(".dashboard-nav").toggleClass("mobile-show");
        } else {
            $(".dashboard").toggleClass("dashboard-compact");
        }
    });
});


toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": true,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut",
    "color":"red"
  }
  //Validar
  const validarCampos=()=>{
    let campos=document.querySelectorAll("[data-requerido]");
    let validar =true;
    campos.forEach(element => {
        if(element.value===null ||element.value==="")
         {
            toastr["error"](`Debe llenar el campo ${element.name}`);
            validar= false;
         }   
            
    });
    return validar;
  }

  //Traer informacion 
  const lista= async (ruta)=>{
    try{           
        var formulario = new FormData();
        formulario.append("accion","listar");
        let valor = await fetch(ruta,{body:formulario ,method:"POST"}); 
        let json =await valor.json();
        
        if(!valor.ok) throw{}
        else return json;        

        }
    catch(Error ){
          toastr["error"]("Error en tiempo de ejecución"+Error) 
    }
}

//Traer informacion 
const modificar= async (ruta,formulario,accion )=>{
    try{                   
        formulario.append("accion",accion);
        let valor = await fetch(ruta,{body:formulario ,method:"POST"}); 
        let json =await valor.json();
        
        if(!valor.ok) throw{}
        else return json;        
        }
    catch(Error ){
          toastr["error"]("Error en tiempo de ejecución"+Error) 
    }
} 