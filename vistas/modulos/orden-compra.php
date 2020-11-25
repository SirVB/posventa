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
    
    <h1 style="color:green;font-weight:bold">
      
      ORDEN DE COMPRA
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Crear Orden</li>
    
    </ol>

  </section>

    <section class="content">
        <div class="box">
            <div class="box-body">
                <form role="form" method="post" class="formularioOrdenCompra">

                    <div class="row">
                        <div class="col-xs-5">
                            <div class="box box-info">
                                    <div class="box-body">
                                    <h4 class="box-title" style="font-weight:bold; font-size:20px;">Proveedor Asociado</h4>
                                        <div class="row" style="margin-bottom:5px;">
                                            <div class="col-xs-12">
                                                    
                                                    <div class="form-group">
                                                        <div class="input-group" style="display:block;">                
                                                        <select class="form-control" id="nuevoProveedor" name="nuevoProveedor" required>

                                                            <option value="">Seleccionar Proveedor</option>

                                                            <?php

                                                            $item = null;
                                                            $valor = null;

                                                            $proveedores = ControladorProveedores::ctrMostrarProveedores($item, $valor);

                                                            foreach ($proveedores as $key => $value) {

                                                                echo '<option class="seleccionarProveedor" value="'.$value["id"].'">'.$value["razon_social"].' </option>';

                                                            }

                                                            ?>

                                                        </select>

                                                        </div>
                                                    </div> 
                                            </div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-xs-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="hidden" id="traerIdProveedor">
                                                            <span class="input-group-addon"> <i class="fa fa-address-card"></i> RUT</span>                
                                                            <input type="text" class="form-control" id="traerRutProveedor" value="" readonly >
                                                        </div>
                                                    </div> 
                                            </div>
                                            <div class="col-xs-6">                                                  
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                        <span class="input-group-addon">Direccion</span>                
                                                            <input type="text" class="form-control" id="traerDireccionProveedor" value="" readonly>
                                                        </div>
                                                    </div> 
                                            </div>
                                            <div class="col-xs-6">   
                                                    <div class="form-group">
                                                        <div class="input-group">   
                                                            <span class="input-group-addon">Actividad</span>             
                                                            <input type="text" class="form-control" id="traerActividadProveedor" value="" readonly>
                                                        </div>
                                                    </div> 
                                            </div>
                                            <div class="col-xs-6">                                  
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">Ejecutivo</span>                
                                                            <input type="text" class="form-control" id="traerEjecutivoProveedor" value="" readonly>
                                                        </div>
                                                    </div> 
                                            </div>
                                            <div class="col-xs-6">                                                  
                                                    <div class="form-group">
                                                        <div class="input-group">                
                                                        <span class="input-group-addon">Telefono</span>
                                                            <input type="text" class="form-control" id="traerTelefonoProveedor" value="" readonly>
                                                        </div>
                                                    </div> 
                                            </div>
                                            <div class="col-xs-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                        <span class="input-group-addon"> <i class="fa fa-at"></i> Correo</span>                
                                                            <input type="text" class="form-control" id="traerEmailProveedor" value="" readonly>
                                                        </div>
                                                    </div> 
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="box box-info">
                                    <div class="box-body">
                                        <h4 class="box-title" style="font-weight:bold; font-size:20px;">Datos de Orden</h4>
                                            <div class="row" style="margin-bottom:5px;">
                                                <div class="col-xs-6">
                                                <div class="d-block" style="font-size:14px;">Fecha Emision</div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            
                                                            <input type="date" class="form-control input-sm" name="nuevaFechaEmision" id="nuevaFechaEmision">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-xs-6">
                                                <div class="d-block" style="font-size:14px;">Fecha Venc.</div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="hidden" id="nuevoEstado" name="nuevoEstado" value="Abierta">
                                                            <input type="date" class="form-control input-sm" name="nuevaFechaVencimiento" id="nuevaFechaVencimiento">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-xs-6">
                                                <div class="d-block" style="font-size:14px;">Centro de Costo</div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                        <select class="form-control input" id="nuevoCentro" name="nuevoCentro" required>
                
                                                            <option value="">Seleccionar Centro</option>

                                                            <?php

                                                            $item = null;
                                                            $valor = null;

                                                            $centros = ControladorCentros::ctrMostrarCentros($item, $valor);

                                                            foreach ($centros as $key => $value) {
                                                            echo '<option value="'.$value["id"].'">'.$value["centro"].'</option>';
                                                            }

                                                            ?>
                                            
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                <div class="d-block" style="font-size:14px;">Bodega Destino</div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                        <select class="form-control input" id="nuevaBodega" name="nuevaBodega" required>
                
                                                            <option value="">Seleccionar Bodega</option>

                                                            <?php

                                                            $item = null;
                                                            $valor = null;

                                                            $bodegas = ControladorBodegas::ctrMostrarBodegas($item, $valor);

                                                            foreach ($bodegas as $key => $value) {
                                                            echo '<option  value="'.$value["id"].'">'.$value["nombre"].' </option>';
                                                            }

                                                            ?>
                                            
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        
                                    </div>
                            </div>
                        </div>
                        
                        <div class="col-xs-3">
                           <div class="box box-info">
                                <div class="box-body">
                                    <h4 class="box-title" style="color:#39b616;font-weight:bold; font-size:21px; color:red;"> ORDEN DE COMPRA</h4>
                                        <div class="row" style="margin-top:2px;">
                                            <div class="col-xs-7">
                                                 <div class="form-group">
                                                        <div class="input-group">
                                                        <span class="input-group-addon" style="background-color:red; color:white; font-weight:bold">FOLIO</span>
                                                            <input type="text" style="font-weight:bold; font-size:16px;" class="form-control" name="nuevoCodigo" id="nuevoCodigo" value="1<?php  $rand = range(0, 7); shuffle($rand); foreach ($rand as $val) { echo $val;} ?>" readonly required>
                                                        </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <h4 class="box-title" style="color:#39b616;font-weight:bold; font-size:21px;">ASIGNAR A</h4>
                                    
                                        <div class="row" style="margin-top:5px;">
                                            <div class="col-xs-7">
                                                 <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" style="background-color:green;color:white;font-weight:bold;">O. Trabajo</span>
                                                            <select class="form-control input-sm" id="traerOrde" required disabled>

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
                                            <div class="col-xs-4">
                                                <button class="btn btn-primary">Ver Todo</button>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:5px;">
                                            <div class="col-xs-7">
                                                 <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" style="background-color:green;color:white;font-weight:bold; padding-left:5px;">Producción</span>
                                                            <select class="form-control input-sm" id="nuevoRubro" required disabled>

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
                                            <div class="col-xs-4">
                                                <button class="btn btn-primary">Ver Todo</button>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:5px;">
                                            <div class="col-xs-7">
                                                 <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" style="background-color:green;color:white;font-weight:bold;padding-left:15px;">Vestuario</span>
                                                            <select class="form-control input-sm" id="traerOrdenVestuario" required >

                                                            <?php

                                                            $item = null;
                                                            $valor = null;

                                                            $vestuarios = ControladorOrdenVestuario::ctrMostrarOrdenVestuario($item, $valor);

                                                            foreach ($vestuarios as $key => $value) {
                                                            echo '<option  value="'.$value["folio"].'">'.$value["folio"].' </option>';
                                                            }

                                                            ?>
                                                                
                                            
                                                            </select>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                            <button type="button" data-toggle="modal" data-target="#modalVerOrdenVestuario" class="btn btn-primary">Ver Todo</button>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:5px;">
                                            <div class="col-xs-7">
                                                 <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" style="background-color:green;color:white;font-weight:bold; padding-left:22px;">O. Taller</span>
                                                            <select class="form-control input-sm" id="nuevoRubro" required disabled>

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
                                            <div class="col-xs-4">
                                                <button class="btn btn-primary">Ver Todo</button>
                                            </div>
                                        </div>
                                </div>
                           </div>
                        </div>
                    </div>
                                                                    
                        
                    <div class="row">
        
                        <div class="col-lg-8 col-xs-12">
                            
                            <div class="box box-success">
                                <div class="box-body">
                                    <div class="row nuevoProducto">
                                        <h4 class="box-title text-center" style="font-weight:bold; font-size:20px;">Productos Seleccionados</h4>
                                        <div class="row" style="padding:5px 15px">
                                            <div class="col-xs-2 text-center" style="padding-right:0px">
                                                <h5 style="background-color:#3c8dbc; color:white; border-radius:5px; padding: 5px 0px;">Descripcion</h4>
                                            </div>
                                            <div class="col-xs-1 text-center" style="padding-right:0px">
                                                <h5 style="background-color:#3c8dbc; color:white; border-radius:5px; padding: 5px 0px;">Cantidad</h4>
                                            </div>
                                            <div class="col-xs-1 text-center" style="padding-right:0px">
                                                <h5 style="background-color:#3c8dbc; color:white; border-radius:5px; padding: 5px 0px;">Precio U</h4>
                                            </div>
                                            <div class="col-xs-1 text-center" style="padding-right:0px">
                                                <h5 style="background-color:#3c8dbc; color:white; border-radius:5px; padding: 5px 0px;">Subtotal</h4>
                                            </div>

                                            <div class="col-xs-1 text-center" style="padding-right:0px">
                                                <h5 style="background-color:#3c8dbc; color:white; border-radius:5px; padding: 5px 0px;">Descuento</h4>
                                            </div>
                                            <div class="col-xs-2 text-center" style="padding-right:0px">
                                                <h5 style="background-color:#3c8dbc; color:white; border-radius:5px; padding: 5px 0px;">Total Neto</h4>
                                            </div>
                                            <div class="col-xs-1 text-center" style="padding-right:0px">
                                                <h5 style="background-color:#3c8dbc; color:white; border-radius:5px; padding: 5px 0px;">IVA</h4>
                                            </div>
                                            <div class="col-xs-1 text-center" style="padding-right:0px">
                                                <h5 style="background-color:#3c8dbc; color:white; border-radius:5px; padding: 5px 0px;">Otros Imp.</h4>
                                            </div>
                                            <div class="col-xs-2 text-center" style="padding-right:12px">
                                                <h5 style="background-color:#3c8dbc; color:white; border-radius:5px; padding: 5px 0px;">Total Final</h4>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="box box-info">
                                        <div class="box-body">
                                                <h4 class="box-title" style="font-weight:bold; font-size:20px;">Totales</h4>
                                            
                                                <div class="row">
                                                            <div class="col-xs-7">
                              
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon" style="padding:0px 8px">Subtotal</span>                
                                                                            <input style="font-size:16px;" type="text" class="form-control" id="nuevoSubtotal" total="" name="nuevoSubtotal" value="" readonly>
                                                                        </div>
                                                                    </div> 
                                                            </div>
                                                            <div class="col-xs-7">
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon" style="padding:0px 2px">Descuento</span>                
                                                                            <input style="font-size:16px;" type="text" class="form-control"  id="nuevoTotalDescuento" total="" name="nuevoTotalDescuento" value="" readonly>
                                                                        </div>
                                                                    </div> 
                                                            </div>
                                                            <div class="col-xs-7">
                                                                    
                                                                    <div class="form-group">
                                                                        <div class="input-group"> 
                                                                            <span class="input-group-addon" style="padding:0px 3px">Total Neto</span>               
                                                                            <input style="font-size:16px;" type="text" class="form-control" id="nuevoTotalNeto" name="nuevoTotalNeto" total="" value="" readonly>
                                                                        </div>
                                                                    </div> 
                                                            </div>
                                                            <div class="col-xs-7">
                                                                    <div class="form-group">
                                                                        <div class="input-group">                
                                                                            <span class="input-group-addon">Exento</span>
                                                                            <input style="font-size:18px;" type="text" class="form-control"  readonly>
                                                                        </div>
                                                                    </div> 
                                                            </div>
                                                            
                                                            <div class="col-xs-7">
                                                                   
                                                                    <div class="form-group">
                                                                        <div class="input-group" >
                                                                            <span class="input-group-addon" style="padding:0px 15px">% IVA</span>                
                                                                            <input style="font-size:16px;" type="text" class="form-control" id="nuevoTotalIva" name="nuevoTotalIva" total="" value="" readonly>
                                                                        </div>
                                                                    </div> 
                                                            </div>
                                                            <div class="col-xs-7">
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon" style="padding:0px">Otros Imp.</span>                
                                                                            <input style="font-size:18px;" type="text" class="form-control" value="" readonly>
                                                                        </div>
                                                                    </div> 
                                                            </div>
                                                            <div class="col-xs-7">
                                                                    
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon" style="color:black; font-weight:bold; padding:0px 15px">Total</span>                
                                                                        <input style="font-size:16px;" type="text" class="form-control input" id="nuevoTotalFinal" name="nuevoTotalFinal" total="" readonly required>
                                                                        
                                                                        </div>
                                                                    </div> 
                                                            </div>
                                            </div>
                                        </div>
                                    </div>      
                                </div>
                                <div class="col-xs-6">       
                                    <div class="box box-danger">
                                                <div class="box-body">
                                                <h4 class="box-title" style="font-weight:bold; font-size:20px;">Condición de Pago</h4>
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            
                                                                <div class="form-group">
                                                                    
                                                                </div> 
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-6">
                                                                <div class="d-block bg-primary text-center" style="background-color:#3c8dbc;font-size:15px;">Plazo de Pago</div>
                                                                <div class="form-group">
                                                                    <div class="input-group" style="display:block;">                                                
                                                                            <select class="form-control input" id="nuevoPlazoPago" name="nuevoPlazoPago" required>
                                                                            
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
                                                        <div class="col-xs-6">
                                                                <div class="d-block bg-primary text-center" style="background-color:#3c8dbc;font-size:15px;">Medios de Pago</div>
                                                                <div class="form-group">
                                                                <div class="input-group" style="display:block;">                
                                                                        <select name="nuevoMedioPago" id="nuevoMedioPago" class="form-control">
                                                                            <option value="">Seleccionar Medio de Pago:</option>
                                                                            <?php

                                                                            $item = null;
                                                                            $valor = null;

                                                                            $medios = ControladorMediosPago::ctrMostrarMedios($item, $valor);

                                                                            foreach ($medios as $key => $value) {
                                                                            echo '<option  value="'.$value["id"].'">'.$value["medio_pago"].' </option>';
                                                                            }

                                                                            ?>
                                                                            
                                                                        </select>
                                                                    </div>
                                                                </div> 
                                                        </div>
                                                    
                                                    </div>
                                                </div>
                                    </div>
                                    <div class="box box-warning">
                                        <div class="box-body">
                                        <h4 class="box-title" style="font-weight:bold; font-size:20px;">Observaciones</h4>                       
                                        <textarea name="nuevaObservacion" id="nuevaObservacion" cols="60" rows="6"></textarea>
                                        <input type="text" id="listaProductos" name="listaProductos"> 
                                        </div>
                                    </div>
                                </div>     
                            </div>        
                            
                            
                        </div>

                    
                    
                        <div class="col-lg-4 col-xs-12 ">
                                
                                            <div class="box box-success">
                                                <div class="box-header with-border"></div>
                                                    <div class="box-body">
                                                        <h4 class="box-title text-center" style="font-weight:bold; font-size:20px;"> Productos para Seleccionar</h4>
                                                        <table  class="table table-bordered table-striped dt-responsive tablaCompras">
                                                    
                                                        
                                                            <thead>

                                                                <tr>
                                                                <th style="width: 10px">#</th>
                                                                <th>Imagen</th>
                                                                <th>Código</th>
                                                                <th>Nombre</th>
                                                                <th>Acciones</th>
                                                                </tr>

                                                            </thead>

                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                    </div>
                                        
                                    
                   <button type="button" class="btn btn-default">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar Orden</button>                 
                </form>
                    <?php

                        $agregarOrdenCompra = new ControladorOrdenCompra();
                        $agregarOrdenCompra -> ctrCrearOrdenCompra();

                    ?>
            </div>
        </div>
    </section>

</div>
<div id="modalVerOrdenCompra" class="modal fade" role="dialog">
  
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <form role="form" method="post" id="form_editar_plantel">

                    <!--=====================================
                    CABEZA DEL MODAL
                    ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Ordenes de Compra</h4>

                </div>

                    <!--=====================================
                    CUERPO DEL MODAL
                    ======================================-->

                <div class="modal-body">

                    <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                        
                        <thead>
                        
                        <tr>
                        
                        <th style="width:10px">#</th>
                        <th>Folio</th>
                        <th>Proveedor</th>
                        <th>Fecha Emision</th>
                        <th>Total Final</th>
                        <th>Observacion</th>



                        </tr> 

                        </thead>

                        <tbody>

                        <?php

                        $item = null;
                        $valor = null;

                        $ordenCompra = ControladorOrdenCompra::ctrMostrarOrdenCompra($item, $valor);
                        $proveedores = ControladorProveedores::ctrMostrarProveedores($item, $valor);

                        foreach ($ordenCompra as $key => $value) {
                            for($i = 0; $i < count($proveedores); ++$i){
                                if ($proveedores[$i]["id"] == $value["id_proveedor"]) {
                                  $proveedor = $proveedores[$i]["razon_social"];
                                }
                              }

                            echo '<tr>

                                    <td>'.($key+1).'</td>

                                    <td>'.$value["codigo"].'</td>

                                    <td>'.$proveedor.'</td>

                                    <td>'.$value["fecha_emision"].'</td>

                                    <td>'.$value["total_final"].'</td>

                                    <td>'.$value["observacion"].'</td>

                                </tr>';
                        
                            }

                        
                        ?>
                
                        </tbody>

                    </table>

                </div>

                    <!--=====================================
                    PIE DEL MODAL
                    ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar cambios</button>

                </div>

            </form>
                                                 
        </div>

    </div>

</div>
<div id="modalVerOrdenVestuario" class="modal fade" role="dialog">
  
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <form role="form" method="post" id="form_editar_plantel">

                    <!--=====================================
                    CABEZA DEL MODAL
                    ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Ordenes de Vestuario</h4>

                </div>

                    <!--=====================================
                    CUERPO DEL MODAL
                    ======================================-->

                <div class="modal-body">

                    <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                        
                        <thead>
                        
                        <tr>
                        
                        <th style="width:10px">#</th>
                        <th>Folio</th>
                        <th>Nombre</th>
                        <th>Fecha Emision</th>
                        <th>Observacion</th>
                        <th>Acciones</th>



                        </tr> 

                        </thead>

                        <tbody>

                        <?php

                        $item = null;
                        $valor = null;

                        $vestuarios = ControladorOrdenVestuario::ctrMostrarOrdenVestuario($item, $valor);

                        foreach ($vestuarios as $key => $value) {
                            

                            echo '<tr>

                                    <td>'.($key+1).'</td>

                                    <td>'.$value["folio"].'</td>

                                    <td>'.$value["nombre_orden"].'</td>

                                    <td>'.$value["fecha_emision"].'</td>

                                    <td>'.$value["observacion"].'</td>

                                    <td> <button type="button" class="btn btn-warning">TRAER</button> </td>

                                </tr>';
                        
                            }

                        
                        ?>
                
                        </tbody>

                    </table>

                </div>

                    <!--=====================================
                    PIE DEL MODAL
                    ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar cambios</button>

                </div>

            </form>
                                                 
        </div>

    </div>

</div>



<style>
  .error{
    color: red;
    
    }
  textarea {
    resize: none;
    }
    input[type=number] {
    -moz-appearance: textfield;
    }

</style>
