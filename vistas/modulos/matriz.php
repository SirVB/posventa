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
      
      Administrar Matriz
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Matriz</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalCrearMatriz">
          
         Crear Matriz

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           <th>Razon Social</th>
           <th>Actividad</th>
           <th>Region</th>
           <th>Direccion</th>
           <th>Ejecutivo</th>
           <th>Numero de Telefono</th>
           <th>Correo Electronico</th>
           <th>Fecha Inicio Servicio</th>
           <th>Fecha Vcto Servicio</th>
           <th>Tipo Cliente</th>
           <th>Tipo Producto</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $matrices = ControladorMatrices::ctrMostrarMatrices($item, $valor);

          foreach ($matrices as $key => $value) {
            

            echo '<tr>

                    <td>'.$value["razon_social"].'</td> 
                    <td>'.$value["actividad"].'</td>
                    <td>'.$value["region"].'</td>
                    <td>'.$value["direccion"].'</td>  
                    <td>'.$value["ejecutivo"].'</td> 
                    <td>'.$value["telefono"].'</td> 
                    <td>'.$value["email"].'</td>
                    <td>'.$value["fecha_inicio"].'</td> 
                    <td>'.$value["fecha_vencimiento"].'</td> 
                    <td>'.$value["tipo_cliente"].'</td> 
                    <td>'.$value["tipo_producto"].'</td>  


                    

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
<!--
  <div id="modalCrearMatriz" class="modal fade"  role="dialog">
    
    <div class="modal-dialog modal-lg">

      <div class="modal-content">

        <form role="form" method="post" id="form_nueva_matriz" enctype="multipart/form-data">

      

          <div class="modal-header" style="background:#3f668d; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Crear Matriz</h4>

          </div>


          <div class="modal-body">

            <div class="box-body">
              
              <h4 class="box-title" style="font-weight:bold;margin:auto;margin-bottom:4px;">Datos Matriz</h4>
              <div class="box box-info">
                <div class="box-body">                
                    <div class="form-group row">              
                      <div class="col-lg-5">
                        <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold;margin-top:10px">Razon Social</div>
                        <div class="input-group">
                        
                          <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                          <input type="text" class="form-control input" name="nuevaMatriz" id="nuevaMatriz" placeholder="Ingrese Razon Social" required>

                        </div>
                      </div>             
                      <div class="col-lg-5 col-xs-offset-1">
                        <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold;margin-top:10px">Region</div>
                        <div class="input-group">
                        
                          <span class="input-group-addon"><i class="fa fa-globe"></i></span> 

                          <input type="text" class="form-control input" name="nuevaRegion" id="nuevaRegion" placeholder="Ingrese Region" required>

                        </div>
                      </div>
                      <div class="col-lg-5">
                          <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold;margin-top:10px">Direccion</div>
                          <div class="input-group">
                          
                          <span class="input-group-addon"><i class="fa fa-globe"></i></span> 

                          <input type="text" class="form-control input" name="nuevaDireccion" id="nuevaDireccion" placeholder="Ingrese Direccion" required>

                          </div>
                      </div>
                      <div class="col-lg-5 col-xs-offset-1">
                          <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold;margin-top:10px">Ejecutivo</div>
                            <div class="input-group">
                            
                              <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                              <input type="text" class="form-control input" name="nuevoEjecutivo" id="nuevoEjecutivo" placeholder="Ingresar Ejecutivo" required>

                            </div>
                      </div>
                      <div class="col-lg-5">
                        <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold;margin-top:10px">Numero de Telefono</div>
                          <div class="input-group">
                          
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                            <input type="tel" class="form-control input" name="nuevoTelefono" id="nuevoTelefono" placeholder="Ingresar teléfono" required>

                          </div>
                      </div>
                      <div class="col-lg-5 col-xs-offset-1">
                        <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold;margin-top:10px">Correo Electronico</div>
                          <div class="input-group">
                          
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                            <input type="text" class="form-control input" name="nuevoEmail" id="nuevoEmail" placeholder="Ingresar Email" required>

                          </div>
                      </div>
                      <div class="col-lg-5">
                        <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold;margin-top:10px">Actividad</div>
                          <div class="input-group">
                          
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                            <input type="text" class="form-control input" name="nuevaActividad" id="nuevaActividad" placeholder="Ingresar Actividad" required>

                          </div>
                      </div>
                    <div>
                </div>
              </div>    
              <h4 class="box-title" style="font-weight:bold;margin:auto;margin-bottom:4px;">Datos de Servicio</h4>
                <div class="box box-success">
                  <div class="box-body">
                    <div class="form-group row">
                        <div class="col-lg-5 ">
                          <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold;margin-top:10px">Fecha Inicio Servicio</div>
                            <div class="input-group">
                            
                              <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                              <input type="date" class="form-control input" name="nuevaActividad" id="nuevoInicio" placeholder="Ingresar Actividad" required>

                            </div>
                        </div>
                        <div class="col-lg-5 col-xs-offset-1">
                          <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold;margin-top:10px">Fecha Vcto Servicio</div>
                            <div class="input-group">
                            
                              <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                              <input type="date" class="form-control input" name="nuevaActividad" id="nuevaActividad" placeholder="Ingresar Actividad" required>

                            </div>
                        </div>
                        <div class="col-lg-5">
                          <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold;margin-top:10px">Tipo Cliente</div>
                            <div class="input-group">
                            
                              <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                              <input type="text" class="form-control input" name="nuevaActividad" id="nuevaActividad" placeholder="Ingresar Actividad" required>

                            </div>
                        </div>
                        <div class="col-lg-5 col-xs-offset-1 ">
                          <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold;margin-top:10px">Tipo Producto</div>
                            <div class="input-group">
                            
                              <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                              <input type="text" class="form-control input" name="nuevaActividad" id="nuevaActividad" placeholder="Ingresar Actividad" required>

                            </div>
                        </div>
                    </div>    
                  </div>
                </div>  
            </div>

          </div>


              <div class="modal-footer">

                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                <button type="submit" class="btn btn-primary text-center">Guardar Matriz</button>

              </div>
        

        </form>

          <?php

            $crearMatriz = new ControladorMatrices();
            $crearMatriz -> ctrCrearMatriz();

          ?>  

      </div>

    </div>

  </div>
 --> 
<div id="modalCrearMatriz" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post" id="form_nueva_matriz">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3f668d; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Matriz</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL, REGION, CIUDAD, DIRECCION
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <h4 class="box-title" style="font-weight:bold;margin:auto;margin-bottom:4px;">Datos de Matriz</h4>
              <div class="box box-info">
                <div class="box-body">                
                  <div class="form-group row">              
                      <div class="col-lg-5 col-xs-6">
                        <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold;margin-top:10px">Razon Social</div>
                        <div class="input-group">
                        
                          <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                          <input type="text" class="form-control input" name="nuevaMatriz" id="nuevaMatriz" placeholder="Ingrese Razon Social" required>

                        </div>
                      </div>             
                      <div class="col-lg-5 col-xs-6 col-lg-offset-1">
                        <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold;margin-top:10px">Pais</div>
                        <div class="input-group">
                        
                          <span class="input-group-addon"><i class="fa fa-globe"></i></span> 

                          <input type="text" class="form-control input" name="nuevoPais" id="nuevoPais" placeholder="Ingrese Pais" required>

                        </div>
                      </div>
                      <div class="col-lg-5 col-xs-6">
                        <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold;margin-top:10px">Region</div>
                        <div class="input-group">
                        
                          <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                          <input type="text" class="form-control input" name="nuevaRegion" id="nuevaRegion" placeholder="Ingrese Region" required>

                        </div>
                      </div>
                      <div class="col-lg-5 col-xs-6 col-xs-6 col-lg-offset-1">
                          <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold;margin-top:10px">Ciudad</div>
                          <div class="input-group">
                          
                          <span class="input-group-addon"><i class="fa fa-plane"></i></span> 

                          <input type="text" class="form-control input" name="nuevaCiudad" id="nuevaCiudad" placeholder="Ingrese Ciudad" required>

                          </div>
                      </div>
                      
                      <div class="col-lg-5 col-xs-6">
                          <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold;margin-top:10px">Direccion</div>
                          <div class="input-group">
                          
                          <span class="input-group-addon"><i class="fa fa-bookmark"></i></span> 

                          <input type="text" class="form-control input" name="nuevaDireccion" id="nuevaDireccion" placeholder="Ingrese Direccion" required>

                          </div>
                      </div>
                      <div class="col-lg-5 col-xs-6 col-lg-offset-1">
                          <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold;margin-top:10px">Ejecutivo</div>
                            <div class="input-group">
                            
                              <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                              <input type="text" class="form-control input" name="nuevoEjecutivo" id="nuevoEjecutivo" placeholder="Ingresar Ejecutivo" required>

                            </div>
                      </div>
                      <div class="col-lg-5">
                        <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold;margin-top:10px">Numero de Telefono</div>
                          <div class="input-group">
                          
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                            <input type="tel" class="form-control input" name="nuevoTelefono" id="nuevoTelefono" placeholder="Ingresar teléfono" required>

                          </div>
                      </div>
                      <div class="col-lg-5 col-xs-6 col-lg-offset-1">
                        <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold;margin-top:10px">Correo Electronico</div>
                          <div class="input-group">
                          
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                            <input type="text" class="form-control input" name="nuevoEmail" id="nuevoEmail" placeholder="Ingresar Email" required>

                          </div>
                      </div>
                      <div class="col-lg-5">
                        <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold;margin-top:10px">Actividad</div>
                          <div class="input-group">
                          
                            <span class="input-group-addon"><i class="fa fa-industry"></i></span> 

                            <input type="text" class="form-control input" name="nuevaActividad" id="nuevaActividad" placeholder="Ingresar Actividad" required>

                          </div>
                      </div>
                      
                  </div> 
                </div>  
              </div>

              <h4 class="box-title" style="font-weight:bold;margin:auto;margin-bottom:4px;">Datos de Servicio</h4>
                <div class="box box-success">
                  <div class="box-body">
                    <div class="form-group row">
                        <div class="col-lg-5 ">
                          <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold;margin-top:10px">Fecha Inicio Servicio</div>
                            <div class="input-group">
                            
                              <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                              <input type="date" class="form-control input" name="nuevoInicio" id="nuevoInicio"  required>

                            </div>
                        </div>
                        <div class="col-lg-5 col-xs-offset-1">
                          <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold;margin-top:10px">Fecha Vcto Servicio</div>
                            <div class="input-group">
                            
                              <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                              <input type="date" class="form-control input" name="nuevoVencimiento" id="nuevoVencimiento" required>

                            </div>
                        </div>
                        <div class="col-lg-5">
                          <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold;margin-top:10px">Tipo Cliente</div>
                            <div class="input-group">
                            
                              <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                              <select class="form-control input" id="nuevoTipoCliente" name="nuevoTipoCliente" required>
          
                              <option value="">Tipo de Cliente</option>
                              <option value="SERCOTEC">SERCOTEC </option>
                              <option value="Otro">Otro</option>
                              </select>

                            </div>
                        </div>
                        <div class="col-lg-5 col-xs-offset-1 ">
                          <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold;margin-top:10px">Tipo Producto</div>
                            <div class="input-group">
                            
                              <span class="input-group-addon"><i class="fa fa-briefcase "></i></span> 

                              <select class="form-control input" id="nuevoTipoProducto" name="nuevoTipoProducto" required>
          
                              <option value="">Tipo de Prodcuto </option>
                              <option value="POS PyMe">POS PyMe </option>
                              <option value="POS Basico">POS Basico</option>
                              </select>
                            </div>
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

          <button type="submit" class="btn btn-primary">Guardar Matriz</button>

        </div>

      </form>

      <?php

        $crearMatriz = new ControladorMatrices();
        $crearMatriz -> ctrCrearMatriz();

      ?>

    </div>

  </div>

</div>




