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
      
      Administrar Proveedores
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Proveedor</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProveedor">
          
          Agregar Proveedor

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Razon Social</th>
           <th>Rut</th>
           <th>Actividad</th>
           <th>Ciudad</th>
           <th>N° Cuenta</th>
           <th>Banco</th>
           <th>Ejecutivo</th>
           <th>Teléfono</th>
           <th>Email</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $proveedores = ControladorProveedores::ctrMostrarProveedores($item, $valor);

          foreach ($proveedores as $key => $value) {
            

            echo '<tr>

                    <td>'.($key+1).'</td>

                    <td>'.$value["razon_social"].'</td>

                    <td>'.$value["rut"].'</td>

                    <td>'.$value["actividad"].'</td>

                    <td>'.$value["ciudad"].'</td>

                    <td>'.$value["nro_cuenta"].'</td>

                    <td>'.$value["banco"].'</td>  
                    
                    <td>'.$value["ejecutivo"].'</td>

                    <td>'.$value["telefono"].'</td>

                    <td>'.$value["email"].'</td>


                    <td>

                      <div class="btn-group">
                        <button class="btn btn-success btnEditarRubroProveedor" data-toggle="modal" data-target="#modalEditarRubroProveedor" idProveedor="'.$value["id"].'"><i class="fa fa-plus"> Agregar Otros Rubros</i></button> 
                        <button class="btn btn-warning btnEditarProveedor" data-toggle="modal" data-target="#modalEditarProveedor" idProveedor="'.$value["id"].'"><i class="fa fa-pencil"></i></button>';

                      if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-danger btnEliminarProveedor" idProveedor="'.$value["id"].'"><i class="fa fa-times"></i></button>';

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
MODAL AGREGAR PROVEEDOR
======================================-->
<style>
  .error{
    color: red;
  }
</style>

<div id="modalAgregarProveedor" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post" id="form_nuevo_proveedor">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3f668d; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Proveedor</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL, REGION, CIUDAD, DIRECCION
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <h4 class="box-title" style="font-weight:bold;">Datos Proveedor</h4>
            <div class="box box-success">
              
              <div class="box-body">
                <div class="form-group row">
                  <!-- ENTRADA PARA LA RAZON SOCIAL -->
                      <div class="col-xs-6">
                        <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold">
                        Razon Social
                        </div> 
                          <div class="input-group">
                            
                            <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                            <input type="text" class="form-control input" name="nuevoProveedor" placeholder="Ingresar Razon Social" required>

                          </div>
                      </div>
                  <!-- ENTRADA PARA EL RUT ID -->
                      <div class="col-xs-6">
                        <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold">RUT</div>
                          <div class="input-group">
                            
                            <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                            <input type="text"  class="form-control input" name="nuevoRutId" placeholder="Ingresar Rut">

                          </div>
                        </div>
                      </div>
                </div>
                
                <div class="form-group row">                
                  <!-- ENTRADA PARA LA ACTIVIDAD -->
                      <div class="col-xs-6">
                          <div class="d-block text-center" style="font-size:16px;font-weight:bold">Actividad</div>  
                            <div class="input-group">
                            
                              <span class="input-group-addon"><i class="fa fa-globe"></i></span> 

                              <input type="text"  class="form-control input" name="nuevaActividad" placeholder="Ingrese Actividad">

                            </div>
                      </div>
                      <div class="col-xs-6">
                        <div class="d-inline-block text-center " style="font-size:16px;font-weight:bold">Pais</div>
                          <div class="input-group">
                    
                            <span class="input-group-addon"><i class="fa fa-globe"></i></span> 

                            <input type="text" class="form-control input" name="nuevoPais" id="nuevoPais" value="Chile" required>

                          </div>
                      </div>
                
                </div>
                <div class="form-group row">
                      <div class="col-xs-6">
                        <div class="d-inline-block text-center " style="font-size:16px;font-weight:bold">Region</div>
                          <div class="input-group">
                      
                            <span class="input-group-addon"><i class="fa fa-globe"></i></span> 

                            <select class="form-control input" id="nuevaRegion" name="nuevaRegion" required>
                                                                            
                                <option  value="">Seleccionar Region</option>

                                <?php

                                $item = null;
                                $valor = null;

                                $regiones = ControladorRegiones::ctrMostrarRegiones($item, $valor);

                                foreach ($regiones as $key => $value){
                                echo '<option  value="'.$value["nombre"].'">'.$value["nombre"].' '.$value["ordinal"].' </option>';
                                }

                                ?>
            
                            </select>


                          </div>
                      </div>   
                  <!-- ENTRADA PARA LA CIUDAD -->
                      <div class="col-xs-6">
                          <div class="d-block text-center" style="font-size:16px;font-weight:bold">Comuna</div>
                            <div class="input-group">
                            
                              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                                <select class="form-control input" id="nuevaRegion" name="nuevaRegion" required>
                                                                              
                                    <option value="">Seleccionar Comuna</option>

                                    <?php

                                    $item = null;
                                    $valor = null;

                                    
                                    $comunas = ControladorRegiones::ctrMostrarComunas($item, $valor);

                                    foreach ($comunas as $key => $value){
                                    echo '<option  value="'.$value["id"].'">'.$value["nombre"].' </option>';
                                    }

                                    ?>
              
                                </select>

                            </div>
                      </div>
                </div>
                    
                <div class="form-group row">
                      <div class="col-xs-6">
                          <div class="d-block text-center" style="font-size:16px;font-weight:bold">Direccion</div>
                          <div class="input-group">
                    
                            <span class="input-group-addon"><i class="fa fa-globe"></i></span> 

                            <input type="text" class="form-control input" name="nuevaDireccion" id="nuevaDireccion" placeholder="Ingrese Direccion" required>

                          </div>
                      </div>
                      <div class="col-xs-6">
                          <div class="d-block text-center" style="font-size:16px;font-weight:bold">Rubro Principal</div>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-apple"></i></span> 
                              <select class="form-control input" id="nuevoRubro" required>

                                <?php

                                  $item = null;
                                  $valor = null;

                                  $rubros = ControladorRubros::ctrMostrarRubros($item, $valor);

                                  foreach ($rubros as $key => $value) {
                                  echo '<option  value="'.$value["nombre"].'">'.$value["nombre"].' </option>';
                                  }

                                ?>
                                
              
                              </select>

                            </div>
                      </div>
                      
                </div>
                
              </div>    
            </div>
            <h4 class="box-title" style="font-weight:bold;">Datos de Pago</h4>
            <div class="box box-info"> 
              <div class="box-body">
                <div class="form-group row">
                  <!-- ENTRADA PARA EL N° CUENTA BANCARIA-->
                      <div class="col-xs-6">
                          <div class="d-block text-center" style="font-size:16px;font-weight:bold">Numero de Cuenta</div>
                            <div class="input-group">
                            
                              <span class="input-group-addon"><i class="fa fa-ticket"></i></span> 

                              <input type="text" class="form-control input" name="nuevoNroCuenta" placeholder="Ingresar N° Cuenta" required>

                            </div>
                      </div>
                  <!-- ENTRADA PARA EL BANCO -->
                      <div class="col-xs-6">
                          <div class="d-block text-center" style="font-size:16px;font-weight:bold">Banco</div>
                            <div class="input-group">
                            
                              <span class="input-group-addon"><i class="fa fa-university"></i></span> 

                              <select class="form-control input" id="nuevoBanco" name="nuevoBanco" required>
                                                                            
                                <option value="">Seleccionar Banco</option>

                                <?php

                                $item = null;
                                $valor = null;

                                $bancos = ControladorBancos::ctrMostrarBancos($item, $valor);

                                foreach ($bancos as $key => $value) {
                                echo '<option  value="'.$value["nombre_banco"].'">'.$value["nombre_banco"].' </option>';
                                }

                                ?>
            
                            </select>

                            </div>
                      </div>
                </div>
                <div class="form-group row">
                  <!-- ENTRADA PARA EL N° CUENTA BANCARIA-->
                      <div class="col-xs-6">
                          <div class="d-block text-center" style="font-size:16px;font-weight:bold">Linea de Credito</div>
                            <div class="input-group">
                            
                              <span class="input-group-addon"><i class="fa fa-ticket"></i></span> 

                              <input type="text" class="form-control input" name="nuevoNroCuenta" placeholder="Ingresar N° Cuenta" required>

                            </div>
                      </div>
                  <!-- ENTRADA PARA EL BANCO -->
                      <div class="col-xs-6">
                          <div class="d-block text-center" style="font-size:16px;font-weight:bold">Plazo de Pago</div>
                            <div class="input-group">
                            
                              <span class="input-group-addon"><i class="fa fa-university"></i></span> 

                              <select class="form-control input" id="nuevoPlazo" name="nuevoPlazo" required>
                                                                            
                                <option value="">Seleccionar Plazo de Pago</option>

                                <?php

                                $item = null;
                                $valor = null;

                                $plazos = ControladorPlazos::ctrMostrarPlazos($item, $valor);

                                foreach ($plazos as $key => $value) {
                                echo '<option  value="'.$value["id"].'">'.$value["nombre"].' </option>';
                                }

                                ?>
            
                            </select>

                            </div>
                      </div>
                </div>
                
              </div>
            </div>
            <h4 class="box-title" style="font-weight:bold;">Datos de Contacto</h4>      
            <div class="box box-warning">
              <div class="box-body">
                <div class="form-group row">
                  <!-- ENTRADA PARA EL TELEFONO-->
                      <div class="col-xs-6">
                        <div class="d-block text-center" style="font-size:16px;font-weight:bold">Numero de Telefono</div>
                          <div class="input-group">
                          
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                            <input type="tel" class="form-control input" name="nuevoTelefono" placeholder="Ingresar teléfono" required>

                          </div>
                      </div>
                  <!-- ENTRADA PARA EL EMAIL-->
                      <div class="col-xs-6">
                        <div class="d-block text-center" style="font-size:16px;font-weight:bold">Correo Electronico</div>
                          <div class="input-group">
                          
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                            <input type="text" class="form-control input" name="nuevoEmail" placeholder="Ingresar email" required>

                          </div>
                      </div>
                </div>
                
                <div class="form-group row">
                      <!-- ENTRADA PARA EL EJECUTIVO-->
                      <div class="col-xs-6">
                        <div class="d-block text-center" style="font-size:16px;font-weight:bold;margin-top:5px;">Ejecutivo</div>
                          <div class="input-group">
                          
                            <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                            <input type="text" class="form-control input" name="nuevoEjecutivo" placeholder="Ingresar ejecutivo" required>

                          </div>
                      </div>
                </div>
              </div>
            </div>
          </div>

       <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary ">Guardar proveedor</button>

        </div> </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        
        

      </form>

      <?php

        $crearProveedor = new ControladorProveedores();
        $crearProveedor -> ctrCrearProveedores();

      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PROVEEDOR
======================================-->

<div id="modalEditarProveedor" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" id="form_editar_proveedor">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3f668d; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Proveedor</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
        
          <div class="box-body">

            <!-- ENTRADA PARA LA RAZON SOCIAL -->
  
            <div class="form-group row">
                <div class="d-block text-center" style="margin-top: -5px" >
                  <span class="badge" style="margin: -20px 0px 4px -10px;font-size: 16px;border-radius: 0px 12px 0px 0px;background-color:#3f668d;">Datos Proveedor</span>
                </div>
                  <div class="col-xs-6">
                    <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold">Razon Social</div>
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                        <input type="text" class="form-control input" name="editarProveedor" id="editarProveedor" required>
                        <input type="hidden" id="idProveedor" name="idProveedor">
                      </div>
                  </div>
            

              <!-- ENTRADA PARA EL RUT ID -->         
           
                <div class="col-xs-6">
                  <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold">RUT</div>
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                    <input type="text"  class="form-control input" name="editarRutId" id="editarRutId" required>

                  </div>
              </div>
            </div>

            <div class="form-group row">                
              <!-- ENTRADA PARA LA ACTIVIDAD -->
                  <div class="col-xs-6">
                      <div class="d-block text-center" style="font-size:16px;font-weight:bold">Actividad</div>  
                        <div class="input-group">
                        
                          <span class="input-group-addon"><i class="fa fa-globe"></i></span> 

                          <input type="text"  class="form-control input"  name="editarActividad" id="editarActividad" required>

                        </div>
                  </div>
              <!-- ENTRADA PARA LA CIUDAD -->
                  <div class="col-xs-6">
                      <div class="d-block text-center" style="font-size:16px;font-weight:bold">Ciudad</div>
                        <div class="input-group">
                        
                          <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                          <input type="text" class="form-control input"  name="editarCiudad" id="editarCiudad" required>

                        </div>
                  </div>
            </div>
          

            <div class="form-group row">
              <div class="d-block text-center">
              <span class="badge" style="margin: 0px 0px 10px -10px;font-size: 16px;border-radius: 0px 12px 0px 0px;background-color:#3f668d;">Datos Bancarios</span>
              </div>
              <!-- ENTRADA PARA EL N° CUENTA BANCARIA-->
                  <div class="col-xs-6">
                      <div class="d-block text-center" style="font-size:16px;font-weight:bold">Numero de Cuenta</div>
                        <div class="input-group">
                        
                          <span class="input-group-addon"><i class="fa fa-ticket"></i></span> 

                          <input type="text" class="form-control input" name="editarNroCuenta" id="editarNroCuenta" placeholder="Ingresar N° Cuenta" required>

                        </div>
                  </div>
              <!-- ENTRADA PARA EL BANCO -->
                  <div class="col-xs-6">
                      <div class="d-block text-center" style="font-size:16px;font-weight:bold">Banco</div>
                        <div class="input-group">
                        
                          <span class="input-group-addon"><i class="fa fa-university"></i></span> 

                          <input type="text" class="form-control input" name="editarBanco" id="editarBanco" placeholder="Ingresar Banco" required>

                        </div>
                  </div>
            </div>
            
            <div class="form-group row">
              <div class="d-block text-center">
              <span class="badge" style="margin: 0px 0px 10px -10px;font-size: 16px;border-radius: 0px 12px 0px 0px;background-color:#3f668d;">Datos de Contacto</span>
              </div>
              <!-- ENTRADA PARA EL TELEFONO-->
                  <div class="col-xs-6">
                    <div class="d-block text-center" style="font-size:16px;font-weight:bold">Numero de Telefono</div>
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                        <input type="tel" class="form-control input" name="editarTelefono" id="editarTelefono"  required>

                      </div>
                  </div>
              <!-- ENTRADA PARA EL EMAIL-->
                  <div class="col-xs-6">
                    <div class="d-block text-center" style="font-size:16px;font-weight:bold">Correo Electronico</div>
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                        <input type="text" class="form-control input" name="editarEmail" id="editarEmail" required>

                      </div>
                  </div>

                   <!-- ENTRADA PARA EL EJECUTIVO-->
                   <div class="col-xs-6">
                    <div class="d-block text-center" style="font-size:16px;font-weight:bold;margin-top:5px;">Ejecutivo</div>
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                        <input type="text" class="form-control input" name="editarEjecutivo" id="editarEjecutivo" placeholder="Ingresar ejecutivo" required>

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

          <button type="submit" class="btn ">Guardar cambios</button>

        </div>

      </form>

      <?php

        $editarProveedor = new ControladorProveedores();
        $editarProveedor -> ctrEditarProveedor();

      ?>

    

    </div>

  </div>

</div>

<div id="modalEditarRubroProveedor" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post" id="form_nuevo_proveedor">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3f668d; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Rubros al Proveedor</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL, REGION, CIUDAD, DIRECCION
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <h4 class="box-title" style="font-weight:bold;">Datos Proveedor</h4>
            <div class="box box-success">
              
              <div class="box-body">
                <div class="form-group row">
                    <div class="d-block text-center" style="margin-top: -5px" >
                    </div>
                  <!-- ENTRADA PARA LA RAZON SOCIAL -->
                      <div class="col-xs-6">
                        <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold">
                        Razon Social
                        </div> 
                          <div class="input-group">
                            
                            <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                            <input type="hidden" id="idProveedor" name="idProveedor">  
                            <input type="text" class="form-control input" name="editarProveedor" id="editarProveedor" placeholder="Ingresar Razon Social" required>

                          </div>
                      </div>
                  <!-- ENTRADA PARA EL RUT ID -->
                      <div class="col-xs-6">
                        <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold">RUT</div>
                          <div class="input-group">
                            
                            <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                            <input type="text"  class="form-control input" name="editarRutId" id="editarRutId" placeholder="Ingresar Rut">

                          </div>
                      </div>
                </div>
                    
                <div class="form-group row">
                      <div class="col-xs-6">
                          <div class="d-block text-center" style="font-size:16px;font-weight:bold">Rubro Principal</div>
                            <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-apple"></i></span> 
                            <select class="form-control input" id="nuevoRubro" required>

                              <?php

                                $item = null;
                                $valor = null;

                                $rubros = ControladorRubros::ctrMostrarRubros($item, $valor);

                                foreach ($rubros as $key => $value) {
                                echo '<option  value="'.$value["nombre"].'">'.$value["nombre"].' </option>';
                                }

                              ?>
                              
            
                            </select>

                            </div>
                      </div>
                      <div class="col-xs-6">
                          <div class="d-block text-center" style="font-size:16px;font-weight:bold">Direccion</div>
                            <div class="input-group">
                            
                              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                              <input type="text" class="form-control input" name="nuevaDireccion" placeholder="Ingresar Direccion" required>

                            </div>
                      </div>
                </div>
                
              </div>  
            </div>
            <h4 class="box-title" style="font-weight:bold;">Rubros</h4>
            <div class="box box-info">
              <div class="box-body">
              <div class="form-group row">
                <div class="input-group">
                              <?php

                                $item = null;
                                $valor = null;

                                $rubros = ControladorRubros::ctrMostrarRubros($item, $valor);

                                foreach ($rubros as $key => $value) {
                                echo '<input type="checkbox" id="'.$value["id"].'" value="'.$value["nombre"].'" name="'.$value["nombre"].'">
                                      <label style="font-weight:bold;color:green;font-size:16px;margin-left:5px;" for="'.$value["id"].'">'.$value["nombre"].'</label><br>';
                                }

                              ?>
                              
            
                            

                            </div>
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

          <button type="submit" class="btn btn-primary ">Guardar proveedor</button>

        </div>

      </form>

      <?php

        $crearProveedor = new ControladorProveedores();
        $crearProveedor -> ctrCrearProveedores();

      ?>

    </div>

  </div>

</div>
<?php

  $eliminarProveedor = new ControladorProveedores();
  $eliminarProveedor -> ctrEliminarProveedores();

?>


