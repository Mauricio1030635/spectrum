<?php 
include_once "/xampp/htdocs/spectrum/Modelo/agendaModel.php";
$modelo = new agendaModel;

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
                <textarea  type="text" id="Descripcion" class="form-control"    name="Descripcion">    </textarea>    
        </div>        
      </div>
      <div class="row mt-1">
        <div class="col-md-6">            
                <label for="Correo">Fecha <span style="color: red;"> *</span></label>                        
                <input type="date" id="Fecha" class="form-control"    name="Fecha" data-requerido>        
        </div>
        <div class="col-md-6">      
            <label for="Ciudad">Hora <span style="color: red;"> *</span></label>                        
            <select class="form-select" id="Hora" name="Hora"  data-requerido>
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
                <select class="form-select" id="Tecnico" name="Tecnico" data-requerido>
                <option value=""selected>Seleccione un tecnico</option>
                    <?php                 
                        $modelo->infoTecnico();
                    ?>            
                </select>          
        </div>
        <div class="col-md-6">      
            <label for="Ciudad">Ingeniero <span style="color: red;"> *</span></label>   
            
            <select class="form-select" id="Ingeniero" name="Ingeniero" data-requerido>
            <option value=""selected>Seleccione un ingeniero</option>
            <?php                 
                $modelo->infoIngeniero();
            ?>            
            </select>            
        </div>
      </div>
      <div class="row mt-1">
        <div class="col-md-6">            
                <label for="password">Cliente <span style="color: red;"> *</span></label>                        
                <select class="form-select" id="Cliente" name="Cliente" data-requerido>
                <option value=""selected>Seleccione un cliente</option>
                    <?php                 
                        $modelo->infoCliente();
                    ?>            
                </select>          
        </div>
        <div class="col-md-6">      
            <label for="Ciudad">Regional</label>   
            
            <select class="form-select" id="Regional" name="Regional" >
            <option value=""selected>Seleccione un regional</option>
            <?php                 
                $modelo->infoRegional();
            ?>            
            </select>            
        </div>
      </div>
      <div class="row mt-1">
        <div class="col-md-6">            
                <label for="password">Subregional </label>                        
                <select class="form-select" id="Subregional" name="Subregional"  >
                <option value=""selected>Seleccione primero regional</option>                              
                </select>          
        </div>   
        <div class="col-md-6">            
              <label for="password">Digitador </label>                        
              <select class="form-select" id="Digitador" name="Digitador" >
        <option value="<?= $valor[0]['id_usuario']?>"selected>
        <?= $valor[0]['nombre_usuario']?>
        </option>
                               
                </select>          
        </div>      
      </div>      

      <input type="hidden"  id="Id"  name="Id" >             
               
    <div class="row mt-4" >                
        <div>
            <button type="submit" class="btn btn-outline-primary float-end me-1" id="Agregar">Agregar</button>&nbsp;
            <button type="submit" class="btn btn-warning float-end ocultar me-1" id="btnModificar">Modificar</button>  &nbsp;
            <button type="button" class="btn btn-info float-end ocultar me-1" id="btnCalidad" data-bs-toggle="modal" data-bs-target="#exampleModal">Modulo de calidad</button> &nbsp; 
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
                <a href="../Reportes/agendaReporte.php" class="btn btn-danger fa-solid fa-file-pdf float-end me-1" target="_blank"></a>
                <!-- <i class="btn btn-success fa-solid fa-plus float-end me-1" ></i> -->
            </div>            
                <thead>
                    <tr>
                    <th scope="col">Fase</th>
                    <th scope="col">Digitador</th>
                    <th scope="col">Tarea</th>                    
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Tecnico</th>
                    <th scope="col">Ingeniero</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Regional</th>
                    <th  scope="col">SubRegional</th>                                        
                    <th 
                    scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbagenda">  
                    <tr>
                        <td  colspan="10" style="text-align: center;">
                            <img  id="loada" width="310px" height="310px" src="..//Imagenes//load//cargando.gif" alt="">  
                        </td>
                    </tr>                                       
                </tbody>
        </table>  

        </div>
    <!-- </div> -->

    <!-- ***********************************modal calidad*********************** -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Informacion</h5>        
      </div>
      <div class="modal-body">
    <form id="formcalidad" >
        <div class="row mt-1">
            <div class="col-md-6">            
                    <label for="EstadoFinal">Estado final de la actividad</label>                        
                    <input type="text" id="EstadoFinal" class="form-control" name="EstadoFinal">        
            </div>
            <div class="col-md-6">      
                    <label for="Observaciones">Observaciones </label>            
                    <input type="text" class="form-control"  id="Observaciones"  name="Observaciones" >              
            </div>
        </div>  
        <div class="row mt-1">
            <div class="col-md-6">            
                    <label for="causalPuntualidad">Causal Puntualidad</label>                        
                    <input type="text" id="causalPuntualidad" class="form-control" name="causalPuntualidad">        
            </div>
            <div class="col-md-6">      
                    <label for="Estado">Estado</label>            
                    <input type="text" class="form-control"  id="Estado"  name="Estado" >              
            </div>
        </div>  
        <div class="row mt-1">          
                <div class="col-md-6">      
                        <label for="Novedad">Novedad </label>            
                        <input type="text" class="form-control"  id="Novedad"  name="Novedad" >              
                </div>
                <div class="col-md-6">      
                    <label for="ObservacionCalidad">Observacion Calidad </label>            
                    <input type="text" class="form-control"  id="ObservacionCalidad"  name="ObservacionCalidad" >              
            </div>
            </div>           
        <div class="row mt-1">
            <div class="col-md-6">            
                        <label for="NovedadPuntualidad">Novedad Puntualidad terreno</label>                        
                        <input type="text" id="NovedadPuntualidad" class="form-control" name="NovedadPuntualidad">        
                </div>
                <div class="col-md-6">      
                    <label for="ObservacionTerreno">Observacion Terreno </label>            
                    <input type="text" class="form-control"  id="ObservacionTerreno"  name="ObservacionTerreno" >              
            </div>
            
        </div>  
        
        <hr>
        <div class="row mt-1">                    
        </div>  
        <div class="row mt-1">
            <div class="col-md-6">            
                    <label for="falta">falta</label>                        
                    <input type="text" id="falta" class="form-control" name="falta">        
            </div>            
            <div class="col-md-6">            
                    <label for="tipofalta">Tipo falta</label>                        
                    <input type="text" id="tipofalta" class="form-control" name="tipofalta">        
            </div>  
        </div>  

        <div class="row mt-1">
            <div class="col-md-6">            
                    <label for="Obsrvacionfalta">Observacion falta</label>                        
                    <input type="text" id="Obsrvacionfalta" class="form-control" name="Obsrvacionfalta">        
            </div>                         
        </div> 
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" id="btnGuardarCalidad" class="btn btn-primary">GUARDAR</button>
      </div>
      </form>
    </div>
  </div>
</div>

    <!-- *********************************final modal calidad******************* -->


</div>