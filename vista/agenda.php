<?php 
include_once "/xampp/htdocs/spectrum/Modelo/usuariosModel.php";
$modelo = new usuariosModel;

?>
<div class="card">
  <h5 class="card-header text-uppercase fw-bold">
    Gestión de Usuarios    
  </h5>
    <!-- <div class="card-body"> -->
        <!-- formulario -->
        <div class="card">
            <div class="card-header menuP text-uppercase" data-bs-toggle="collapse" href="#formulariocollapse"  >
            <i class="fa-solid fa-up-down float-end" ></i>
                Formulario
            </div>
            <!-- *****************formulario************** -->
        <div class="card-body collapse"  id="formulariocollapse" > 
        
<form id ="myformUsuarios">
    <div class="row mt-1">
        <div class="col-md-6">            
                <label for="Nombre">Fase</label>                        
                <input type="text" id="Fase" class="form-control" name="Fase">        
        </div>
        <div class="col-md-6">      
                <label for="Apellido">Tarea <span style="color: red;"> *</span></label>            
                <input type="text" class="form-control"  id="Tarea"  name="Tarea" data-requerido>              
        </div>
      </div>
      <div class="row mt-1">
        <div class="col-md-12">            
                <label for="Telefono">Descripción</label>                        
                <input type="number" id="Descripcion" class="form-control"    name="Descripcion">        
        </div>        
      </div>
      <div class="row mt-1">
        <div class="col-md-6">            
                <label for="Correo">Fecha <span style="color: red;"> *</span></label>                        
                <input type="date" id="Fecha" class="form-control"    name="Fecha" data-requerido>        
        </div>
        <div class="col-md-6">      
            <label for="Ciudad">Hora</label>                        
            <select class="form-select" id="Hora" name="Hora" >
            <option value=""selected>Seleccione hora</option>
            <option value="9:00">9:00</option>
            <option value="10:00">10:00</option>
            <option value="11:00">11:00</option>
            <option value="12:00">12:00</option>
            <option value="13:00">13:00</option>
            <option value="14:00">14:00</option>
            <option value="15:00">15:00</option>
            <option value="16:00">16:00</option>
            </select>
        </div>
      </div>
      <div class="row mt-1">
        <div class="col-md-6">            
                <label for="password">Tecnico <span style="color: red;"> *</span></label>                        
                <select class="form-select" id="Tecnico" name="Tecnico" >
                <option value=""selected>Seleccione un tecnico</option>
                    <?php                 
                        $modelo->infoRol();
                    ?>            
                </select>          
        </div>
        <div class="col-md-6">      
            <label for="Ciudad">Ingeniero <span style="color: red;"> *</span></label>   
            
            <select class="form-select" id="Ingeniero" name="Ingeniero" >
            <option value=""selected>Seleccione un ingeniero</option>
            <?php                 
                $modelo->infoRol();
            ?>            
            </select>            
        </div>
      </div>
      <div class="row mt-1">
        <div class="col-md-6">            
                <label for="password">Cliente <span style="color: red;"> *</span></label>                        
                <select class="form-select" id="Cliente" name="Cliente" >
                <option value=""selected>Seleccione un cliente</option>
                    <?php                 
                        $modelo->infoRol();
                    ?>            
                </select>          
        </div>
        <div class="col-md-6">      
            <label for="Ciudad">Regional<span style="color: red;"> *</span></label>   
            
            <select class="form-select" id="Regional" name="Regional" >
            <option value=""selected>Seleccione un regional</option>
            <?php                 
                $modelo->infoRol();
            ?>            
            </select>            
        </div>
      </div>
      <div class="row mt-1">
        <div class="col-md-6">            
                <label for="password">Subregional <span style="color: red;"> *</span></label>                        
                <select class="form-select" id="Subregional" name="Subregional" >
                <option value=""selected>Seleccione un subregional</option>
                    <?php                 
                        $modelo->infoRol();
                    ?>            
                </select>          
        </div>
        
      </div>

      


      <input type="hidden"  id="Id"  name="Id" > 
               
    <div class="row mt-4" >                
        <div>
            <button type="submit" class="btn btn-outline-primary float-end" id="Agregar">Agregar</button>
            <button type="submit" class="btn btn-warning float-end ocultar" id="btnModificar">Modificar</button>
        </div>
          
    </div>
  </form>
        



        
        <!-- *****************formulario fin************** -->
        </div>
        <!-- listas -->
        <div class="card">
            <div class="card-header menuP text-uppercase" data-bs-toggle="collapse" href="#datoscollapse"  aria-expanded="true" >             
            <i class="fa-solid fa-up-down float-end" ></i>
                Datos
            </div>
        <div class="card-body collapse show"  id="datoscollapse"  >

        


            <table  id="tbprincipal" class="table" >
            <div class="float-end" id="tblacciones">                        
                <a href="../Reportes/usuariosReporte.php" class="btn btn-danger fa-solid fa-file-pdf float-end me-1" target="_blank"></a>
                <!-- <i class="btn btn-success fa-solid fa-plus float-end me-1" ></i> -->
            </div>            
                <thead>
                    <tr>
                    <th scope="col">Fase</th>
                    <th scope="col">Tarea</th>
                    <th scope="col">Descripción Tarea</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Tecnico</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Regional</th>
                    <th scope="col">Subregional</th>
                    </tr>
                </thead>
                <tbody id="tbusuarios">  
                    <tr>
                        <td  colspan="6" style="text-align: center;">
                            <img  id="loada" width="310px" height="310px" src="..//Imagenes//load//cargando.gif" alt="">  
                        </td>
                    </tr>                                       
                </tbody>
        </table>  

        </div>
    <!-- </div> -->
</div>