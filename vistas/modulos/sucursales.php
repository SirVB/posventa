<?php

if($_SESSION["perfil"] == "Especial"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Sucursales
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Sucursales</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarSucursal">
          
          Agregar Sucursal

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Sucursal</th>
           <th>Region</th>
           <th>Comuna</th>
           <th>Direccion</th>
           <th>Bodega Asociada</th>
           <th>Jefe Encargado</th>
           <th>Teléfono</th>
           <th>Email</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $sucursales = ControladorSucursales::ctrMostrarSucursales($item, $valor);

          foreach ($sucursales as $key => $value) {
            

            echo '<tr>

                    <td>'.($key+1).'</td>

                    <td>'.$value["nombre"].'</td>

                    <td>'.$value["region"].'</td>

                    <td>'.$value["comuna"].'</td>

                    <td>'.$value["direccion"].'</td>

                    <td>'.$value["bodega"].'</td>

                    <td>'.$value["jefe"].'</td>
                          

                    <td>'.$value["telefono"].'</td>

                    <td>'.$value["email"].'</td>


                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarSucursal" data-toggle="modal" data-target="#modalEditarSucursal" idSucursal="'.$value["id"].'"><i class="fa fa-pencil"></i></button>';

                      if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-danger btnEliminarSucursal" idSucursal="'.$value["id"].'"><i class="fa fa-times"></i></button>';

                      }

                      echo '</div>  

                    </td>

                  </tr>';
          
            }

           
        ?>
   
        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR SUCURSAL
====================================-->
<style>
  .error{
    color: red;
  }
</style>

<div id="modalAgregarSucursal" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" id="form_nueva_bodega">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3f668d; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Sucursal</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL, REGION, CIUDAD, DIRECCION
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <h4 class="box-title" style="font-weight:bold;margin:auto;margin-bottom:4px;">Datos de Sucursal</h4>
              <div class="box box-info">
                <div class="box-body">                
                  <div class="form-group row">              
                    <div class="col-lg-6">
                      <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold;">Nombre Sucursal</div>
                      <div class="input-group">
                          
                          <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                          
                          <input type="text" class="form-control input" name="nuevaSucursal" placeholder="Ingresar Nombre Sucursal" required>

                        </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Region</div> 
                      <div class="input-group">
                          
                          <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                          <input type="text" class="form-control input" name="nuevaRegion" placeholder="Ingresar Region" required>

                        </div>
                    </div>
                  
                      <div class="col-lg-6" style="margin-top:10px;">
                          <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Comuna</div> 
                          <div class="input-group">
                          
                            <span class="input-group-addon"><i class="fa fa-globe"></i></span> 

                            <input type="text"  class="form-control input" name="nuevaComuna" placeholder="Ingresar Comuna">

                          </div>
                      </div>                 
                    <!-- ENTRADA PARA LA SUBCATEGORIA -->                           
                      <div class="col-lg-6" style="margin-top:10px;">
                                <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold">Direccion</div>
                            <div class="input-group">
                          
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                                <input type="text" class="form-control input" name="nuevaDireccion" placeholder="Ingresar Direccion" required>

                            </div>
                      </div>

                      <div class="col-lg-6" style="margin-top:10px;">
                                <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold">Bodega Asociada</div>
                            <div class="input-group">
                          
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                                <select class="form-control input" id="nuevaBodega" name="nuevaBodega" required>
                            
                            <option value="">Seleccionar Bodega</option>

                            <?php

                            $item = null;
                            $valor = null;

                            $bodegas = ControladorBodegas::ctrMostrarBodegas($item, $valor);

                            foreach ($bodegas as $key => $value) {
                            echo '<option  value="'.$value["nombre"].'">'.$value["nombre"].' </option>';
                            }

                            ?>
            
                        </select>

                            </div>
                      </div>
                      
                  </div> 
                </div>  
              </div>

            <h4 class="box-title" style="font-weight:bold;margin:auto;margin-bottom:4px;">Datos de Contacto</h4>
            <div class="box box-success">
              <div class="box-body">                
                <div class="form-group row">              
                  <div class="col-lg-6">
                    <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold">Jefe Encargado</div>
                    <div class="input-group">
                        
                          <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                          <input type="tel" class="form-control input" name="nuevoJefe" placeholder="Ingresar Encargado" required>

                        </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Telefono</div> 
                    <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                        <input type="tel" class="form-control input" name="nuevoTelefono" placeholder="Ingresar teléfono" required>

                      </div>
                  </div>
                 
                    <div class="col-lg-6" style="margin-top:10px;">
                        <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Correo Electronico</div> 
                        <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                        <input type="text" class="form-control input" name="nuevoEmail" placeholder="Ingresar email" required>

                      </div>
                    </div>                 
                  <!-- ENTRADA PARA LA SUBCATEGORIA -->                           
                    
                    
                </div> 
              </div>  
            </div>


           
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Sucursal</button>

        </div>

      </form>

      <?php

        $crearSucursal = new ControladorSucursales();
        $crearSucursal -> ctrCrearSucursal();

      ?>

    </div>

  </div>

</div>


<!--=====================================
MODAL EDITAR SUCURSAL

======================================-->

<div id="modalEditarSucursal" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" id="form_editar_sucursal">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3f668d; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Sucursal</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <h4 class="box-title" style="font-weight:bold;margin:auto;margin-bottom:4px;">Datos de Sucursal</h4>
              <div class="box box-info">
                <div class="box-body">                
                  <div class="form-group row">              
                    <div class="col-lg-6">
                      <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold;">Nombre Bodega</div>
                      <div class="input-group">
                          
                          <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                          <input type="hidden" class="form-control input" name="idSucursal" id="idSucursal">
                          <input type="text" class="form-control input" name="editarSucursal" id="editarSucursal" required>

                        </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Region</div> 
                      <div class="input-group">
                          
                          <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                          <input type="text" class="form-control input" name="editarRegion" id="editarRegion" required>

                        </div>
                    </div>
                  
                      <div class="col-lg-6" style="margin-top:10px;">
                          <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Comuna</div> 
                          <div class="input-group">
                          
                            <span class="input-group-addon"><i class="fa fa-globe"></i></span> 

                            <input type="text"  class="form-control input" name="editarComuna" id="editarComuna" required>

                          </div>
                      </div>                 
                    <!-- ENTRADA PARA LA SUBCATEGORIA -->                           
                      <div class="col-lg-6" style="margin-top:10px;">
                        <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold">Direccion</div>
                        <div class="input-group">
                            
                              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                              <input type="text" class="form-control input" name="editarDireccion" id="editarDireccion" required>

                            </div>
                      </div>
                      <div class="col-lg-6" style="margin-top:10px;">
                                <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold">Bodega Asociada</div>
                            <div class="input-group">
                          
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                                <select class="form-control input" id="editarBodega" name="editarBodega" required>
                            
                            <option value="">Seleccionar Bodega</option>

                            <?php

                            $item = null;
                            $valor = null;

                            $bodegas = ControladorBodegas::ctrMostrarBodegas($item, $valor);

                            foreach ($bodegas as $key => $value) {
                            echo '<option  value="'.$value["nombre"].'">'.$value["nombre"].' </option>';
                            }

                            ?>
            
                        </select>

                            </div>
                      </div>
                  </div> 
                </div>  
              </div>

            <h4 class="box-title" style="font-weight:bold;margin:auto;margin-bottom:4px;">Datos de Contacto</h4>
            <div class="box box-success">
              <div class="box-body">                
                <div class="form-group row">              
                  <div class="col-lg-6">
                    <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold">Jefe Encargado</div>
                    <div class="input-group">
                        
                          <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                          <input type="tel" class="form-control input" name="editarJefe" id="editarJefe" required>

                        </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Telefono</div> 
                    <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                        <input type="tel" class="form-control input" name="editarTelefono" id="editarTelefono"  required>

                      </div>
                  </div>
                 
                    <div class="col-lg-6" style="margin-top:10px;">
                        <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Correo Electronico</div> 
                        <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                        <input type="text" class="form-control input" name="editarEmail" id="editarEmail"  required>

                      </div>
                    </div>                 
                  <!-- ENTRADA PARA LA SUBCATEGORIA -->                           
                    
                    
                </div> 
              </div>  
            </div>


           
  
          </div>

        </div>
       
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>

      <?php

        $editarSucursal = new ControladorSucursales();
        $editarSucursal -> ctrEditarSucursal();

      ?>

    

    </div>

  </div>

</div>

<?php

  $eliminarSucursal = new ControladorSucursales();
  $eliminarSucursal -> ctrEliminarSucursal();

?>


