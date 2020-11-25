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
      
      Administrar Ordenes
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Ordenes de Compra</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

      <a href="crear-compra">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCompra">
            
            Agregar Compra

          </button>
      </a>
      <a href="orden-compra">
          <button class="btn btn-warning" data-toggle="modal" data-target="#modalAgregarCompra">
            
            Agregar Orden de Compra

          </button>
      </a>
      </div>

      <div class="box-body">
      <div class="box-header with-border">
    <?php
    if($_SESSION["perfil"]=="Administrador")
    ?> 
      <div class="input-group">

        <button type="button" class="btn btn-default" id="daterange-orden-compra">
        
          <span>
            <i class="fa fa-calendar"></i> 

            <?php

              if(isset($_GET["fechaInicial"])){

                echo $_GET["fechaInicial"]." - ".$_GET["fechaFinal"];
              
              }else{
              
                echo 'Rango de fecha';

              }

            ?>
          </span>

          <i class="fa fa-caret-down"></i>

        </button>

      </div>

      <div class="box-tools pull-right">

          <?php

          if(isset($_GET["fechaInicial"])){

            echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte&fechaInicial='.$_GET["fechaInicial"].'&fechaFinal='.$_GET["fechaFinal"].'">';

          }else{

            echo '<a href="vistas/modulos/descargar-reporte-orden-compra.php?reporte=reporte">';

          }         

          ?>
        
          <button class="btn btn-success" style="margin-top:5px">Descargar reporte en Excel</button>

          </a>

        </div>
  
  </div> 
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           <th>Folio de Orden</th>
           <th>Proveedor</th>
           <th>Emision</th>
           <th>Vencimiento</th>
           <th>Centro de Costo</th>
           <th>Bodega</th>
           <th>Estado de Orden</th>
           <th>Plazo de Pago</th>
           <th>Medio de Pago</th>
           <th>Observacion</th>
           <th>Total</th>
           <th>Acciones</th>
         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $ordenCompra = ControladorOrdenCompra::ctrMostrarOrdenCompra($item, $valor);
          $centros = ControladorCentros::ctrMostrarCentros($item, $valor);
          $bodegas = ControladorBodegas::ctrMostrarBodegas($item, $valor);
          $proveedores = ControladorProveedores::ctrMostrarProveedores($item, $valor);
          $plazos = ControladorPlazos::ctrMostrarPlazos($item,$valor);
          $medios = ControladorMediosPago::ctrMostrarMedios($item,$valor);

          foreach ($ordenCompra as $key => $value) {

            for($i = 0; $i < count($centros); ++$i){
              if ($centros[$i]["id"] == $value["id_centro"]) {
                $centro = $centros[$i]["centro"];
              }
            }
            for($i = 0; $i < count($bodegas); ++$i){
              if ($bodegas[$i]["id"] == $value["id_bodega"]) {
                $bodega = $bodegas[$i]["nombre"];
              }
            }
            for($i = 0; $i < count($proveedores); ++$i){
              if ($proveedores[$i]["id"] == $value["id_proveedor"]) {
                $proveedor = $proveedores[$i]["razon_social"];
              }
            }
            for($i = 0; $i < count($plazos); ++$i){
              if ($plazos[$i]["id"] == $value["id_plazo_pago"]) {
                $plazo = $plazos[$i]["nombre"];
              }
            }
            for($i = 0; $i < count($medios); ++$i){
              if ($medios[$i]["id"] == $value["id_medio_pago"]) {
                $medio = $medios[$i]["medio_pago"];
              }
            }
            

            echo '<tr>


                    <td>'.$value["codigo"].'</td> 
                    
                    <td>'.$proveedor.'</td>

                    <td>'.$value["fecha_emision"].'</td>

                    <td>'.$value["fecha_vencimiento"].'</td>

                    <td>'.$centro.'</td>

                    <td>'.$bodega.'</td>      

                    <td>'.$value["estado"].'</td>

                    <td>'.$plazo.'</td>

                    <td>'.$medio.'</td>

                    <td>'.$value["observacion"].'</td>
      
                    <td>$ '.$value["total_final"].'</td>
                    <td>

                    <div class="btn-group">



                      <button disabled class="btn btn-success btnImprimirTicket" codigoVenta="'.$value["codigo"].'">

                      Ticket

                      </button>
                        
                      <button disabled class="btn btn-info btnImprimirFactura" codigoVenta="'.$value["codigo"].'">

                      PDF

                      </button>';

                      if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

                      
                      echo '
                            <button class="btn btn-warning btnEditarOrdenCompra" idOrdenCompra="'.$value["id"].'"><i class="fa fa-pencil"></i></button> ';

                      }
                      if($_SESSION["perfil"] == "Administrador"){
                     echo' <button class="btn btn-danger btnEliminarOrdenCompra" idOrdenCompra="'.$value["id"].'"><i class="fa fa-times"></i></button>';


                    }

                    echo '</div>  

                  </td>



                  </tr>';
          
            }

           
        ?>
   
        </tbody>

       </table>

       <?php

        $eliminarOrdenCompra = new ControladorOrdenCompra();
        $eliminarOrdenCompra -> ctrEliminarOrdenCompra();

        ?>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR BODEGA
======================================-->
<style>
  .error{
    color: red;
  }
</style>

<div class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" id="form_nueva_compra">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3f668d; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Ingreso de Compra</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL, REGION, CIUDAD, DIRECCION
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
          
            <div class="form-group row">

              <!-- ENTRADA PARA EL NOMBRE -->
                  <div class="col-xs-5">
                    <div class="d-inline-block bg-primary" style="background-color:#3c8dbc;font-size:16px;font-weight:bold">
                    Fecha
                    </div> 
                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                        <input type="date" class="form-control input" name="nuevaBodega" required>

                      </div>
                  </div>
              <!-- ENTRADA PARA EL RUT ID -->
                  <div class="col-xs-4">
                    <div class="d-inline-block bg-primary" style="background-color:#3c8dbc;font-size:16px;font-weight:bold">Tipo Documento</div>
                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span> 

                        <select class="form-control input" id="nuevaRegion" name="nuevaRegion" required>
                        
                        <option value="" style="font-size:12px;">Seleccione:</option>

                        <?php

                        $item = null;
                        $valor = null;

                        $region = ControladorProveedores::ctrMostrarProveedores($item, $valor);

                        foreach ($proveedores as $key => $value) {
                          
                          echo '<option value="'.$value["id"].'">'.$value["razon_social"].'</option>';
                        }

                        ?>
        
                      </select>

                      </div>
                  </div>
                  <div class="col-xs-3">
                    <div class="d-inline-block bg-primary" style="background-color:#3c8dbc;font-size:16px;font-weight:bold">
                    Folio
                    </div> 
                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-file"></i></span> 

                        <input type="text" class="form-control input" name="nuevaBodega" placeholder="# Folio" required>

                      </div>
                  </div>
            </div>
            
            <div class="form-group row">                
              <!-- ENTRADA PARA LA ACTIVIDAD -->
              <div class="col-xs-8 offset">
                  <div class="d-inline-block bg-primary" style="background-color:#3c8dbc;font-size:16px;font-weight:bold">Proveedor Asociado</div> 
                    <div class="input-group">
                    
                      <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                      <select class="form-control input" id="nuevoProveedor" name="nuevoProveedor" required>
                        
                        <option value="">Seleccionar Proveedor</option>

                        <?php

                        $item = null;
                        $valor = null;

                        $proveedores = ControladorProveedores::ctrMostrarProveedores($item, $valor);

                        foreach ($proveedores as $key => $value) {
                          
                          echo '<option value="'.$value["id"].'">'.$value["razon_social"].'</option>';
                        }

                        ?>
        
                      </select>

                    </div>
                </div>
            </div>
              <!-- ENTRADA PARA LA CIUDAD -->
            <div class="form-group row">
                  <div class="col-xs-6">
                      <div class="d-block bg-primary" style="background-color:#3c8dbc;font-size:16px;font-weight:bold">Estado de Compra</div>
                        <div class="input-group">
                        
                          <span class="input-group-addon"><i class="fa fa-file-text"></i></span> 

                          <select class="form-control input" id="nuevaRegion" name="nuevaRegion" required>
                        
                        <option value="" style="font-size:12px;">Seleccione:</option>
                        <option value="" style="font-size:12px;">Pagado</option>
                        <option value="" style="font-size:12px;">Pendiente</option>

        
                      </select>

                        </div>
                  </div>
                  <div class="col-xs-6">
                      <div class="d-block bg-primary" style="background-color:#3c8dbc;font-size:16px;font-weight:bold">Exento</div>
                        <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                        <select class="form-control input" id="nuevaRegion" name="nuevaRegion" required>
                        
                        <option value="" style="font-size:12px;">Seleccione:</option>
                        <option value="" style="font-size:12px;">Aplica</option>
                        <option value="" style="font-size:12px;">No Aplica</option>

        
                      </select>

                      </div>
                  </div>
            </div>

            <div class="form-group row">

              <!-- ENTRADA PARA EL N° CUENTA BANCARIA-->
                  <div class="col-xs-4">
                      <div class="d-block bg-primary" style="background-color:#3c8dbc;font-size:16px;font-weight:bold">Neto</div>
                        <div class="input-group">
                        
                          <span class="input-group-addon"><i class="fa fa-money"></i></span> 

                          <input type="number" class="form-control input" name="nuevoNroCuenta" placeholder="$$$$$" required>

                        </div>
                  </div>
              <!-- ENTRADA PARA EL BANCO -->
                  <div class="col-xs-4">
                      <div class="d-block bg-primary" style="background-color:#3c8dbc;font-size:16px;font-weight:bold">IVA</div>
                        <div class="input-group">
                        
                          <span class="input-group-addon"><i class="fa fa-money"></i></span> 

                          <input type="number" class="form-control input" name="nuevoBanco" placeholder="$$$$$" required>

                        </div>
                  </div>

                  <div class="col-xs-4">
                      <div class="d-block bg-primary" style="background-color:#3c8dbc;font-size:16px;font-weight:bold">Total</div>
                        <div class="input-group">
                        
                          <span class="input-group-addon"><i class="fa fa-money"></i></span> 

                          <input type="number" class="form-control input" name="nuevoBanco" placeholder="$$$$$" required>

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

          <button type="submit" class="btn btn-primary">Guardar proveedor</button>

        </div>

      </form>

      <?php

        $crearProveedor = new ControladorProveedores();
        $crearProveedor -> ctrCrearProveedores();

      ?>

    </div>

  </div>

</div>

