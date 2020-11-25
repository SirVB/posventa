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
      
      SALIDAS
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Formulario Salida</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box box-success">

        <div class="box-body">
        
            <form role="form" method="post" class="formularioSalidaInventario"> 
                <div class="row" style="margin-bottom:5px;">
                    <div class="col-xs-5">
                        
                            <div class="form-group">
                                <div class="input-group">
                                    <label for="">Fecha Emision</label>
                                    <input type="date" class="form-control input-sm" name="nuevaFechaEmision" id="nuevaFechaEmision">
                                </div>
                            </div>
                    </div>
                    <div class="col-xs-2 col-xs-offset-5">
                        <div class="d-block" style="font-size:16px;color:green;font-weight:bold;">Salida</div>
                            <div class="form-group">
                                <div class="input-group">
                                <span class="input-group-addon">Folio</span>
                                                                <input type="text" style="font-weight:bold; font-size:16px;" class="form-control" name="nuevoCodigo" id="nuevoCodigo" value="1<?php  $rand = range(0, 7); shuffle($rand); foreach ($rand as $val) { echo $val;} ?>" readonly required>
                                </div>
                            </div>
                    </div>

                </div>

                <div class="row" style="margin-bottom:5px;">
                    <div class="col-xs-5">
                        <label for="">Tipo de Salida</label>
                        <div class="form-group">
                                                                        <div class="input-group">
                                                                            <input type="radio" name="tipoEntrada" value="manual">
                                                                            <label for="radio1" style="font-weight:normal;">Salida Manual</label>
                                                                        </div>                                                                    
                                                                        <div class="input-group">  
                                                                            <input type="radio" name="tipoEntrada" value="orden" >
                                                                            <label for="radio2" style="font-weight:normal;">Destino a Orden de Trabajo</label>
                                                                        </div>
                                                                        
                                                                    </div>
                    </div>
                    <div class="col-xs-5">
                    <label for="">Observaciones</label>
                        <div class="form-group">
                        <textarea name="" id="" cols="40" rows="2"></textarea>
                        </div>
                    
                    </div>
                

                </div>
                <div class="row">
                    <div class="col-xs-12" id="manual">
                        <div class="box box-info">
                            <h4 class="box-title">Salida manual a Bodega</h4>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="col-xs-6">
                                                                    <div class="d-block" style="font-size:14px;">Bodega Origen</div>
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            
                                                                        <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                                                                            <select style="padding-left:0px" class="form-control input" id="nuevaBodega" name="nuevaBodega" required>
                                                                                
                                                                            <option value="">Seleccionar Bodega</option>
                                                                            <?php

                                                                                $item = null;
                                                                                $valor = null;

                                                                                $bodegas = ControladorBodegas::ctrMostrarBodegas($item, $valor);

                                                                                foreach ($bodegas as $key => $value) {
                                                                                
                                                                                echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                                                                                }

                                                                            ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                        </div>
                                        <div class="col-xs-6">
                                                                    <div class="d-block" style="font-size:14px;">Destino</div>
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            
                                                                        <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                                                                            <select style="padding-left:0px" class="form-control input" id="nuevaBodega" name="nuevaBodega" required>
                                                                                
                                                                            <option value="">Seleccionar Bodega</option>
                                                                            <?php

                                                                                $item = null;
                                                                                $valor = null;

                                                                                $bodegas = ControladorBodegas::ctrMostrarBodegas($item, $valor);

                                                                                foreach ($bodegas as $key => $value) {
                                                                                
                                                                                echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                                                                                }

                                                                            ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                        </div>
                                        <div class="col-xs-12 nuevoProductoSalida">
                                        </div>  
                                        <div class="col-xs-12">
                                            <button type="button" class="btn btn-default">Salir</button>
                                            <button type="submit" class="btn btn-primary">Guardar Salida</button>
                                        </div>   
                                    </div>
                                    <div class="col-xs-6">
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
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xs-12" id="orden">
                        <div class="box box-info">
                            <h4 class="box-title">Bodega a Orden de Trabajo</h4>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="col-xs-6">
                                                                    <div class="d-block" style="font-size:14px;">Bodega Salida</div>
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            
                                                                        <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                                                                            <select style="padding-left:0px" class="form-control input" id="nuevaBodega" name="nuevaBodega" required>
                                                                                
                                                                            <option value="">Seleccionar Bodega</option>
                                                                            <?php

                                                                                $item = null;
                                                                                $valor = null;

                                                                                $bodegas = ControladorBodegas::ctrMostrarBodegas($item, $valor);

                                                                                foreach ($bodegas as $key => $value) {
                                                                                
                                                                                echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                                                                                }

                                                                            ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                        </div>
                                        <div class="col-xs-6">
                                                                    <div class="d-block" style="font-size:14px;">Orden de Trabajo Destino</div>
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            
                                                                        <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                                                                            <select style="padding-left:0px" class="form-control input" id="nuevaBodega" name="nuevaBodega" required>
                                                                                
                                                                            <option value="">Seleccionar Orden de Trabajo</option>
                                                                            <?php

                                                                                $item = null;
                                                                                $valor = null;

                                                                                $bodegas = ControladorBodegas::ctrMostrarBodegas($item, $valor);

                                                                                foreach ($bodegas as $key => $value) {
                                                                                
                                                                                echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                                                                                }

                                                                            ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                        </div>
                                        <div class="col-xs-12 nuevoProductoSalida">
                                        </div>  
                                        <div class="col-xs-12">
                                            <button type="button" class="btn btn-default">Salir</button>
                                            <button type="submit" class="btn btn-primary">Guardar Salida</button>
                                        </div>   
                                    </div>
                                    <div class="col-xs-6">
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
                            </div>
                        </div>
                    </div>
                </div>
                
            </form>        
                
                
        </div>

    </div>

    

  </section>

</div>


<style>
  .error{
    color: red;
  }
</style>
<script>
$(document).ready(function(){
            $("#bodega").hide();
            $("#orden").hide();
            $("#manual").hide();
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        if(inputValue=='bodega'){
            $("#bodega").show();
            $("#orden").hide();
            $("#manual").hide();
        }else if(inputValue=='orden'){
            $("#bodega").hide();
            $("#orden").show();
            $("#manual").hide();
        }else if(inputValue=='manual'){
            $("#bodega").hide();
            $("#orden").hide();
            $("#manual").show();
        }
    });
});
</script>






