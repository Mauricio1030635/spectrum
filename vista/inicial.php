<?php 
include_once "/xampp/htdocs/spectrum/Conexion/session.php";
include_once "/xampp/htdocs/spectrum/Controlador/menuController.php";

$session =new sessiones("login");
$controlador= new Controlador;
$session->getsession()==null?
header("Location:/spectrum/index.php"):
$valor []=$session->getsession();

$accion="";
isset($_REQUEST["pagina"])?$accion=$_REQUEST["pagina"]:$accion="indicador";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuracion</title>
    <link href="../Librerias/bootstrap/css/bootstrap.min.css " rel="stylesheet">  
    <link href="../css/navbar.css" rel="stylesheet">  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Librerias/plugins/toastr/toastr.min.css">
    <link rel="icon"  href="../Imagenes/inicio/favicon2.png">
   
</head>
<body >
<div class='dashboard'>
    <div class="dashboard-nav">
        <header>
            <a href="#!" class="menu-toggle"><i class="fas fa-bars">                
            </i></a>
            <a href="#"  class="brand-logo">
            <i class="fa-solid fa-screwdriver-wrench"></i>
        <span>Spectrum</span></a></header>
        <nav class="dashboard-nav-list">
            <a href="inicial.php?pagina=indicador" class="dashboard-nav-item">
                <i class="fas fa-home"></i>Principal </a>     
            <a href="inicial.php?pagina=perfil" class="dashboard-nav-item"><i class="fas fa-user">                
            </i> Perfil </a> 
            <div  >  
            <div class='dashboard-nav-dropdown'
            <?php if( $valor[0]['id_rol']!=1){?> 
            style="display: none;" 
            <?php }?>  
            >
        <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
        <i class="fas fa-photo-video"></i>Empleados</a>
        <div class='dashboard-nav-dropdown-menu'>
                <a href="inicial.php?pagina=ingeniero" class="dashboard-nav-dropdown-item">Ingeniero</a>
                <a  href="inicial.php?pagina=tecnico" class="dashboard-nav-dropdown-item">Tecnico</a>
        </div>
        </div>        
        <a href="inicial.php?pagina=agenda" class="dashboard-nav-item">
        <i class="fa-solid fa-calendar-plus"></i> Agenda 
        </a>
        
         <div 
         <?php if( $valor[0]['id_rol']!=1){?> 
            style="display: none;" 
            <?php }?>
         >
        <a href="inicial.php?pagina=usuarios" class="dashboard-nav-item">
        <i class="fa-solid fa-users"></i> Usuarios 
        </a>
        </div>           
    </div>
          <div class="nav-item-divider"></div>
          <a href="inicial.php?pagina=salir" class="dashboard-nav-item">
              <i class="fas fa-sign-out-alt"></i> Salir 
          </a>
        </nav>
    </div>
    <!-- !!!!!!!!!!!!!!!!!!!!!AQUI VA EL CONTENIDO PRINCIPAL!!!!!!!!!!!!!!!!!!!!!!! -->
    <div class='dashboard-app'>
        <header class='dashboard-toolbar'>
            <a href="#!" class="menu-toggle " >
            <i class="fas fa-bars" ></i>            
        </a>
            <div class="nombre">
            <span class="usuariotexto">
            <i class="fas fa-user">                
            </i>   <?= $valor[0]['nombre_usuario']?></span></div>
        </header>                
        <div class='dashboard-content'>
            <div class='container-fluid'>
            <?php  include $controlador->verPagina($accion); ?>
            </div>
        </div>
    </div>
    <!-- !!!!!!!!!!!!!!!!!!AQUI TERINA  EL CONTENIDO PRINCIPAL!!!!!!!!!!!!!!!!!!!!! -->
</div>    
    
  <script src="..//Librerias/bootstrap/js/bootstrap.bundle.min.js"></script>    
  <script src="..//Librerias/jquery/jquery-3.3.1.min.js"></script>	 

  <script src="..//Librerias/popper/popper.min.js"></script>	 	            
    <!--  Plugin Toastr -->
    <script src="..//Librerias/plugins/toastr/toastr.min.js"></script>
    <script src="../JavaScript/inicial.js">  </script>
    <script src="<?= $controlador->verPaginajavaScript($accion)?>">  </script>
        
</body>
</html>