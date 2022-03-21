<div class="card">
  <h5 class="card-header text-uppercase fw-bold">
    Perfil   
  </h5>    
        <div class="card">                   
        <!-- listas -->
        <div class="card">
            <div class="card-header menuP text-uppercase" data-bs-toggle="collapse" href="#datoscollapse"  aria-expanded="true" >             
            <i class="fa-solid fa-up-down float-end" ></i>
                Datos
            </div>
        <div class="card-body collapse show"  id="datoscollapse"  >   
        <form id ="myformUsuarios">
    <div class="row mt-1">
        <div class="col-md-6">            
                <label for="Nombre">Nombre </label>                        
                <input  value="<?= $valor[0]['nombre_usuario'];?>"       disabled type="text" id="Nombre" class="form-control"    name="Nombre" data-requerido>        
        </div>
        <div class="col-md-6">      
                <label for="Apellido">Apellido </label>            
                <input  value="<?= $valor[0]['apellido_usuario'];?>"       disabled type="text" class="form-control"  id="Apellido"  name="Apellido" data-requerido>              
        </div>
      </div>
      <div class="row mt-1">
        <div class="col-md-6">            
                <label for="Telefono">Telefono</label>                        
                <input  value="<?= $valor[0]['telefono_usuario'];?>"       disabled type="number" id="Telefono" class="form-control"    name="Telefono">        
        </div>
        <div class="col-md-6">      
                <label for="Direccion">Direccion</label>            
                <input  value="<?= $valor[0]['direccion_usuario'];?>"       disabled type="text" class="form-control"  id="Direccion" name="Direccion">              
        </div>
      </div>
      <div class="row mt-1">
        <div class="col-md-6">            
                <label for="Correo">Correo </label>                        
                <input  value="<?= $valor[0]['correo'];?>"       disabled type="email" id="Correo" class="form-control"    name="Correo" data-requerido>        
        </div>
        <div class="col-md-6">      
            <label for="Ciudad">Ciudad</label>                        
            <select class="form-select" id="Ciudad" name="Ciudad" disabled >
            <option value=""selected><?= $valor[0]['ciudad_usuario'];?></option>
            
            </select>
        </div>
      </div>
      <div class="row mt-1">        
        <div class="col-md-6">      
            <label for="Ciudad">Rol </label>   
            
            <select class="form-select" id="Rol" name="Rol" disabled>
            <option value=""selected><?= $valor[0]['nombre_rol'];?></option>            
            </select>
            
        </div>
        <div class="col-md-6">            
                <label for="usuario">Usuario </label>                        
                <input  value="<?= $valor[0]['usuario'];?>"       disabled type="text" data-requerido id="usuario" class="form-control" name="usuario">        
        </div>
      </div>
     
      <input   type="hidden"  id="Id"  name="Id" >                
    
  </form>

        </div>
    <!-- </div> -->
</div>