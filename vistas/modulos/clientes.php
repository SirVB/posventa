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
      
      Administrar Clientes
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Clientes</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
          
          Agregar Cliente

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Rut</th>
           <th>Email</th>
           <th>Teléfono</th>
           <th>Dirección</th>
           <th>Ciudad</th>
           <th>Actividad</th>
           <th>Ejecutivo</th>
           <th>Descuento</th>
           <th>Total compras</th>
           <th>Ingreso al sistema</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

          foreach ($clientes as $key => $value) {
            

            echo '<tr>

                    <td>'.($key+1).'</td>

                    <td>'.$value["nombre"].'</td>

                    <td>'.$value["rut"].'</td>

                    <td>'.$value["email"].'</td>

                    <td>'.$value["telefono"].'</td>

                    <td>'.$value["direccion"].'</td>  
                    
                    <td>'.$value["ciudad"].'</td> 

                    <td>'.$value["actividad"].'</td> 

                    <td>'.$value["ejecutivo"].'</td> 

                    <td>'.$value["factor_lista"].'%</td> 

                    <td>'.$value["compras"].'</td>

                    <td>'.$value["fecha"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" idCliente="'.$value["id"].'"><i class="fa fa-pencil"></i></button>';

                      if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-danger btnEliminarCliente" idCliente="'.$value["id"].'"><i class="fa fa-times"></i></button>';

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
MODAL AGREGAR CLIENTE
======================================-->
<style>
  .error{
    color: red;
  }
</style>

<div id="modalAgregarCliente1" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" id="form_nuevo_cliente">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL RUT ID -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text"  class="form-control input-lg" name="nuevoRutId" placeholder="Ingresar Rut">

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 
               
                <input type="tel" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cliente</button>

        </div>

      </form>

      <?php

        $crearCliente = new ControladorClientes();
        $crearCliente -> ctrCrearCliente();

      ?>

    </div>

  </div>

</div>
<div id="modalAgregarCliente" class="modal fade"  role="dialog">
  
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post" id="form_nuevo_cliente" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3f668d; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

            

            <!-- ENTRADA PARA LOS DATOS CLIENTE -->
            <h4 class="box-title" style="font-weight:bold;margin:auto;margin-bottom:4px;">Datos Cliente</h4>
            <div class="box box-info">
              <div class="box-body">                
                <div class="form-group row">              
                  <div class="col-lg-4">
                    <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold">Razon Social</div>
                    <div class="input-group">
                    
                      <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                      <input type="text" class="form-control input" name="nuevoCliente" id="nuevoCliente" placeholder="Ingrese Razon Social" required>

                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">RUT</div> 
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                        <input type="text" class="form-control input" name="nuevoRutId" id="nuevoRutId" placeholder="Ingrese su RUT" required>

                      </div>
                  </div>
                 
                    <div class="col-lg-4">
                        <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Actividad</div> 
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                          <input type="text" class="form-control input" name="nuevaActividad" id="nuevaActividad" placeholder="Ingrese su Actividad" required>
                        </div>
                    </div>                 
                  <!-- ENTRADA PARA LA SUBCATEGORIA -->
                  <div class="col-xs-6">
                    <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold">Pais</div>
                    <div class="input-group">
                    
                      <span class="input-group-addon"><i class="fa fa-globe"></i></span> 

                      <input type="text" class="form-control input" name="nuevoPais" id="nuevoPais" placeholder="Ingrese Pais" required>

                    </div>
                  </div>
                    <div class="col-xs-6">
                    <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold">Region</div>
                    <div class="input-group">
                    
                      <span class="input-group-addon"><i class="fa fa-globe"></i></span> 

                      <input type="text" class="form-control input" name="nuevaRegion" id="nuevaRegion" placeholder="Ingrese Region" required>

                    </div>
                    </div>                           
                    <div class="col-xs-6">
                    <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold">Ciudad</div>
                    <div class="input-group">
                    
                      <span class="input-group-addon"><i class="fa fa-globe"></i></span> 

                      <input type="text" class="form-control input" name="nuevaCiudad" id="nuevaCiudad" placeholder="Ingrese Ciudad" required>

                    </div>
                    </div>
                    <div class="col-xs-6">
                    <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold">Direccion</div>
                    <div class="input-group">
                    
                      <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                      <input type="text" class="form-control input" name="nuevaDireccion" id="nuevaDireccion" placeholder="Ingrese Direccion" required>

                    </div>
                    </div>
                    
                    <div class="col-xs-6">
                    <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold">Tipo Campaña</div>
                    <div class="input-group">
                    
                      <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                      <select class="form-control input" id="nuevoTipoCliente" name="nuevoTipoCliente" required>
                            
                        <option value="">Seleccionar Tipo Cliente</option>
                        <?php

                          $item = null;
                          $valor = null;

                          $tipoCliente = ControladorTipoClientes::ctrMostrarTipoClientes($item, $valor);

                          foreach ($tipoCliente as $key => $value) {
                            
                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                          }

                        ?>
                      </select>

                    </div>
                    </div>
                    <div class="col-xs-6">
                    <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold">Tipo Producto</div>
                    <div class="input-group">
                    
                      <span class="input-group-addon"><i class="fa fa-file"></i></span> 

                      <select class="form-control input" id="nuevoTipoProducto" name="nuevoTipoProducto" required>
                            
                            <option value="">Seleccionar Tipo Cliente</option>
                            <?php
    
                              $item = null;
                              $valor = null;
    
                              $tipoProducto = ControladorTipoProductos::ctrMostrarTipoProductos($item, $valor);
    
                              foreach ($tipoProducto as $key => $value) {
                                
                                echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                              }
    
                            ?>
                          </select>

                    </div>
                    </div>
                    <div class="col-xs-6">
                    <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold">Lista de Precio Asignada</div>
                    <div class="input-group">
                    
                      <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                      <select class="form-control input" id="nuevoFactor" name="nuevoFactor" required>
                            
                        <option value="1">PRECIO LISTA - 0%</option>
                        <?php

                          $item = null;
                          $valor = null;

                          $listaPrecio = ControladorListas::ctrMostrarListas($item, $valor);

                          foreach ($listaPrecio as $key => $value) {
                            if($value["id"] != 1){
                            echo '<option value="'.$value["id"].'">'.$value["nombre_lista"].'- %'.$value["factor"].'</option>';}
                          }

                        ?>
                      </select>

                    </div>
                    </div>
                </div> 
              </div>  
            </div>
             <!-- ENTRADA PARA STOCK -->

            <h4 class="box-title" style="font-weight:bold;">Datos de Contacto</h4>      
            <div class="box box-warning">
              <div class="box-body">
                <div class="form-group row">
                  <!-- ENTRADA PARA EL EJECUTIVO-->
                  <div class="col-xs-4">
                        <div class="d-block" style="font-size:16px;font-weight:bold;">Ejecutivo</div>
                          <div class="input-group">
                          
                            <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                            <input type="text" class="form-control input" name="nuevoEjecutivo" id="nuevoEjecutivo" placeholder="Ingresar ejecutivo" required>

                          </div>
                      </div>
                  
                  <!-- ENTRADA PARA EL TELEFONO-->
                      <div class="col-xs-4">
                        <div class="d-block" style="font-size:16px;font-weight:bold">Numero de Telefono</div>
                          <div class="input-group">
                          
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                            <input type="tel" class="form-control input" name="nuevoTelefono" id="nuevoTelefono" placeholder="Ingresar teléfono" required>

                          </div>
                      </div>
                      
                  <!-- ENTRADA PARA EL EMAIL-->
                      <div class="col-xs-4">
                        <div class="d-block" style="font-size:16px;font-weight:bold">Correo Electronico</div>
                          <div class="input-group">
                          
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                            <input type="text" class="form-control input" name="nuevoEmail" id="nuevoEmail" placeholder="Ingresar email" required>

                          </div>
                      </div>
                
                </div>
              </div>
            </div>
             <!-- ENTRADA PARA EL CÓDIGO -->

             <h4 class="box-title" style="font-weight:bold;">Datos de Credito y Cobranza</h4>
            <div class="box box-success">
              <div class="box-body">
                <div class="form-group row"> 
                  <div class="col-xs-4">
                      <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Plazo de Pago</div>
                          <div class="input-group">
                          
                            <span class="input-group-addon"><i class="fa fa-code"></i></span> 
                          
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
                  <div class="col-xs-4">
                    <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Vendedor</div>
                    <div class="input-group">
                    
                      <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                      <select class="form-control input" id="nuevoVendedor" name="nuevoVendedor" required>
                            
                        <option value="">Seleccionar Vendedor</option>
                        <?php

                          $item = null;
                          $valor = null;

                          $vendedor = ControladorPlantel::ctrMostrarPlantel($item, $valor);

                          foreach ($vendedor as $key => $value) {
                            
                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                          }

                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-4">
                    <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Estado de Cliente en Sistema</div>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                      <select class="form-control input" id="nuevoEstado" name="nuevoEstado" required>
          
                      <option value="">Seleccionar Estado: </option>
                      <option value="activo">Activo </option>  
                      <option value="inactivo">Inactivo</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group row">                 
                  <div class="col-xs-4">
                    <div class="d-block text-center" style="font-size:16px;font-weight:bold">Contacto Cobranza</div>
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                        <input type="tel" class="form-control input" name="nuevoTelefonoCobranza" placeholder="Ingresar contacto" required>

                      </div>
                  </div>
                  <div class="col-xs-4 ">
                    <div class="d-block text-center" style="font-size:16px;font-weight:bold">Correo Electronico</div>
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                        <input type="text" class="form-control input" name="nuevoEmailCobranza" placeholder="Ingresar correo" required>

                      </div>
                  </div>
                  <div class="col-xs-4">
                    <div class="d-block text-center" style="font-size:16px;font-weight:bold">Fono</div>
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                        <input type="text" class="form-control input" name="nuevoFonoCobranza" placeholder="Ingresar fono" required>

                      </div>
                  </div>
                
                </div>
                <div class="form-group row">                 
                  <div class="col-xs-3">
                    <div class="d-block text-center" style="font-size:16px;font-weight:bold;">Linea de Credito</div>
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-money"></i></span> 

                        <input type="number" class="form-control input" name="nuevaLinea" placeholder="Ingresar Linea de Credito" required>

                      </div>
                  </div>
                  <div class="col-xs-3">
                    <div class="d-block text-center" style="font-size:16px;font-weight:bold">Bloqueo para Credito</div>
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-bank"></i></span> 

                        <select class="form-control input" name="" id="">
                        <option value="No">No</option>
                        <option value="Si">Si</option>
                        </select>

                      </div>
                  </div>
                  <div class="col-xs-6">
                  <div class="d-block text-center" style="font-size:16px;font-weight:bold">Observacion de Cobranza</div>
                          <textarea style="border-width:1px;border-color:blue" class="form-control input" name="" id="" cols="6" rows="3"></textarea>
                  </div>
                  
                
                </div>              

                  
                 

                </div>
              </div> 
            </div>

            <div class="modal-footer">

              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

              <button type="submit" class="btn btn-primary text-center">Guardar producto</button>

            </div>
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

       

      </form>

        <?php

          $crearProducto = new ControladorProductos();
          $crearProducto -> ctrCrearProducto();

        ?>  

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CLIENTE
======================================-->

<div id="modalEditarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" id="form_editar_cliente">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCliente" id="editarCliente" required>
                <input type="hidden" id="idCliente" name="idCliente">
              </div>

            </div>

            <!-- ENTRADA PARA EL RUT ID -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text"  class="form-control input-lg" name="editarRutId" id="editarRutId" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="tel" class="form-control input-lg" name="editarTelefono" id="editarTelefono"  required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion"  required>

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

        $editarCliente = new ControladorClientes();
        $editarCliente -> ctrEditarCliente();

      ?>

    

    </div>

  </div>

</div>

<?php

  $eliminarCliente = new ControladorClientes();
  $eliminarCliente -> ctrEliminarCliente();

?>


