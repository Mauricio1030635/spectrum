<?php 
include_once "/xampp/htdocs/spectrum/Conexion/session.php";
$session =new sessiones("login");
if( $session->getsession()!=null){
    header("Location:/spectrum/vista/inicial.php");	
};
?>
<!doctype html>
<html lang="en">
  <head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link href="./Librerias/bootstrap/css/bootstrap.min.css " rel="stylesheet">
    <link href="./css/inicio.css" rel="stylesheet">
    <link rel="stylesheet" href="Librerias/plugins/toastr/toastr.min.css">
	<link rel="icon"  href="./Imagenes/inicio/favicon.png">        
    <title>Inicio</title>
    <style> 
    </style>
  </head>
  <body>    
  <div class="container PRINCIPAL" >
        <div class="row text-center login-page">
	   <div class="col-md-12 login-form" >
	      <form id="MyformInicio" autocomplete="off"> 			
	         <div class="row">
		    <div class="col-md-12 login-form-header">
		       <p class="login-form-font-header">Spec<span>trum</span><p>
		    </div>
		</div>
		<div class="row">
		   <div class="col-md-12 login-from-row">
		      <input name="usuario" type="text" placeholder="Ingrese Usuario"  class="form-control" required/>
		   </div>
		</div>
		<div class="row">
		   <div class="col-md-12 login-from-row">
		      <input name="password" type="password"    class="form-control" placeholder="Ingrese Contraseña"  required/>
		   </div>
		</div>
		<div class="row">
		   <div class="col-md-12 login-from-row">
		      <button  id ="inicioSession" class="btn btn-primary btn-lg btn-block">Iniciar</button>
		   </div>
		</div>
	    </form>

	</div>
</div>
</div>
	

  <script src="./Librerias/bootstrap/js/bootstrap.bundle.min.js"></script>    
  <script src="Librerias/jquery/jquery-3.3.1.min.js"></script>	 

  <script src="Librerias/popper/popper.min.js"></script>	 	            
    <!--  Plugin Toastr -->
    <script src="Librerias/plugins/toastr/toastr.min.js"></script>
  
<script src="./JavaScript/index.js">    
</script>
  </body>
</html>
