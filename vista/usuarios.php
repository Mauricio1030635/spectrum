


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
                <label for="Nombre">Nombre <span style="color: red;"> *</span></label>                        
                <input type="text" id="Nombre" class="form-control"    name="Nombre" data-requerido>        
        </div>
        <div class="col-md-6">      
                <label for="Apellido">Apellido <span style="color: red;"> *</span></label>            
                <input type="text" class="form-control"  id="Apellido"  name="Apellido" data-requerido>              
        </div>
      </div>
      <div class="row mt-1">
        <div class="col-md-6">            
                <label for="Telefono">Telefono</label>                        
                <input type="number" id="Telefono" class="form-control"    name="Telefono">        
        </div>
        <div class="col-md-6">      
                <label for="Direccion">Direccion</label>            
                <input type="text" class="form-control"  id="Direccion" name="Direccion">              
        </div>
      </div>
      <div class="row mt-1">
        <div class="col-md-6">            
                <label for="Correo">Correo <span style="color: red;"> *</span></label>                        
                <input type="email" id="Correo" class="form-control"    name="Correo" data-requerido>        
        </div>
        <div class="col-md-6">      
            <label for="Ciudad">Ciudad</label>                        
            <select class="form-select" id="Ciudad" name="Ciudad" >
            <option value=""selected>Seleccione una ciudad</option>
            <option value="Bogota">Bogota</option>
            <option value="Cali">Cali</option>
            <option value="Barranquilla">Barranquilla</option>
            <option value="Cartagena">Cartagena</option>
            <option value="Medellin">Medellin</option>
            </select>
        </div>
      </div>
      <div class="row mt-1">
        <div class="col-md-6">            
                <label for="password">Contraseña <span style="color: red;"> *</span></label>                        
                <input type="text" data-requerido id="password" class="form-control"    name="password">        
        </div>
        <div class="col-md-6">      
            <label for="Ciudad">Rol <span style="color: red;"> *</span></label>   
            
            <select class="form-select" id="Rol" name="Rol" >
            <option value=""selected>Seleccione un rol</option>
            <?php 
                include_once "/xampp/htdocs/spectrum/Modelo/usuariosModel.php";
                $modelo = new usuariosModel;
                $modelo->infoRol();
            ?>            
            </select>
            <!-- <input type="text" id="rol" class="form-control" name="Rol" data-requerido>  -->
        </div>
      </div>
      <div class="row mt-1">
        <div class="col-md-6">            
                <label for="usuario">Usuario <span style="color: red;"> *</span></label>                        
                <input type="text" data-requerido id="usuario" class="form-control" name="usuario">        
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
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Acciones</th>
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