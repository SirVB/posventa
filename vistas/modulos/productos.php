<?php

if($_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Productos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Productos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary text-center" data-toggle="modal" data-target="#modalAgregarProducto">
          
          Agregar producto

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablaProductos" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Imagen</th>
           <th>Código</th>
           <th>Rubro Asociado</th>                     
           <th>Nombre</th>
           <th>Categoría</th>
           <th>Stock</th>
           <th>Precio Compra Neto</th>
           <th>Precio Venta Neto</th>
           <th>Agregado</th>
           <th>Acciones</th>
           
         </tr> 

        </thead>      

       </table>


       

       <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR PRODUCTO
======================================-->
<style>
  .error{
    color: red;
  }
</style>

<div id="modalAgregarProducto" class="modal fade"  role="dialog">
  
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post" id="form_nuevo_producto" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3f668d; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

            

            <!-- ENTRADA PARA LA DESCRIPCIÓN -->
            <div class="box box-info">
              <div class="box-body">
                <div class="form-group row">              
                  <div class="col-xs-6">
                    <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold">Producto</div>
                    <div class="input-group">
                    
                      <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                      <input type="text" class="form-control input" name="nuevaDescripcion" placeholder="Nombre Producto" required>

                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Rubro Asociado</div> 
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                        <select class="form-control input" id="editaRubro" name="editaRubro" required>
                          
                          <option value="">Seleccionar Rubro</option>

                          <?php

                          $item = null;
                          $valor = null;

                          $rubros = ControladorRubros::ctrMostrarRubros($item, $valor);

                          foreach ($rubros as $key => $value) {
                          echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                          }

                          ?>
          
                        </select>

                      </div>
                  </div>
                </div>  
                <div class="form-group row">
                    <div class="col-xs-6">
                        <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Categoria</div> 
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                          <select class="form-control input" id="nuevaCategoria" name="nuevaCategoria" required>
                            
                            <option value="">Seleccionar categoría</option>

                              <?php

                              $item = null;
                              $valor = null;

                              $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                              foreach ($categorias as $key => $value) {
                                echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                              }

                              ?>
            
                          </select>
                        </div>
                    </div>                 
                  <!-- ENTRADA PARA LA SUBCATEGORIA -->                           
                    <div class="col-xs-6">
                      <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Subcategoria</div> 
                        <div class="input-group">
                        
                          <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                          <select class="form-control input" id="nuevaSubcategoria" name="nuevaSubcategoria" required>
                            
                            <option value="">Seleccionar Subcategoria</option>

                            <?php

                            $item = null;
                            $valor = null;

                            $subcategorias = ControladorSubcategorias::ctrMostrarSubcategorias($item, $valor);

                            foreach ($subcategorias as $key => $value) {
                            
                              
                              echo '<option value="'.$value["id"].'">'.$value["subcategoria"].'</option>';
                              
                            }

                            ?>
            
                          </select>

                        </div>
                    </div>
                </div>
              </div>  
            </div>
             <!-- ENTRADA PARA STOCK -->
            <div class="box box-danger"> 
              <div class="box-body">
                <div class="form-group row">
                  <div class="col-xs-4">
                  <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Stock Inicial</div>
                    <div class="input-group">
                    
                      <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                      <input type="number" class="form-control input" name="nuevoStock" min="0" placeholder="Stock" required>

                    </div>
                  </div>
                  <div class="col-xs-4">
                  <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Alerta de Stock</div>
                    <div class="input-group">
                    
                      <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                      <input type="number" class="form-control input" name="nuevoStockAlerta" min="0" placeholder="Alerta de Stock" required>

                    </div>
                  </div>
                  <div class="col-xs-4">
                  <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Stock Minimo</div>
                    <div class="input-group">
                    
                      <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                      <input type="number" class="form-control input" name="nuevoStockMin" min="0" placeholder="Stock Minimo" required>

                    </div>
                  </div>
                </div>

                <!-- ENTRADA PARA PRECIO COMPRA -->

                <div class="form-group row">

                    <div class="col-xs-4">
                    <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Precio de Compra Neto</div>
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                        <input type="number"  class="form-control input" id="nuevoPrecioCompra" name="nuevoPrecioCompra" step="any" min="0" placeholder="Precio de compra" required>

                      </div>

                    </div>

                    <!-- ENTRADA PARA PRECIO VENTA -->

                    <div class="col-xs-4">
                    <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Precio Lista Neto</div>
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                        <input type="number" class="form-control input" id="nuevoPrecioVenta" name="nuevoPrecioVenta" step="any" min="0" placeholder="Precio de venta" required>

                      </div>
                    

                    </div>

                    <div class="col-xs-4">
                    <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Unidad de Medida</div>
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                        <select class="form-control input" id="nuevaMedida" name="nuevaMedida" required>
                            
                            <option value="">Seleccionar Medida</option>

                            <?php

                            $item = null;
                            $valor = null;

                            $unidades = ControladorUnidades::ctrMostrarUnidades($item, $valor);

                            foreach ($unidades as $key => $value) {
                              
                              echo '<option value="'.$value["id"].'">'.$value["medida"].'</option>';
                            }

                            ?>
            
                          </select>

                      </div>
                    

                    </div>

                </div>

               
              </div>  
            </div>
             <!-- ENTRADA PARA EL CÓDIGO -->

           
            <div class="box box-success">
              <div class="box-body">
                <div class="form-group row"> 
                
                    <div class="col-xs-4">
                        <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Codigo de Producto</div>
                            <div class="input-group">
                            
                              <span class="input-group-addon"><i class="fa fa-code"></i></span> 
                            
                              <input type="number" class="form-control input" id="nuevoCodigo" name="nuevoCodigo"
                              value="<?php  $rand = range(0, 10); shuffle($rand); foreach ($rand as $val) { echo $val;} ?>" required>
                            
                            </div>

                            <button type="button"  class="btn btn-success" style="margin-top: 5px" onclick="generarbarcode();">Generar</button>
                            <button type="button" class="btn btn-info" style="margin-top: 5px" onclick="imprimir();">Imprimir</button>
                            <div id="print" style="display: none;">
                            <svg id="barcode" class="barcode"></svg>
                          
                        </div> 

                  </div>
                  

                  <!-- ENTRADA PARA BODEGA -->
                            

                  <div class="col-xs-4">
                    <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Bodega</div>
                    <div class="input-group">
                    
                      <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                      <select class="form-control input" id="nuevaBodega" name="nuevaBodega" required>
                            
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
                  <div class="col-xs-4">
                    <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Impuestos Adicionales</div>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                      <select class="form-control input" id="nuevaBodega" name="nuevaBodega" required>
          
                      <option value="">Seleccionar Impuesto Adicional </option>

                        <!-- 
                      <select class="form-control input" id="nuevoImpuesto" name="nuevoImpuesto" required>
                            
                        <option value="">Seleccionar Impuesto</option>-->
                        <?php

                          $item = null;
                          $valor = null;

                          $impuestos = ControladorImpuestos::ctrMostrarImpuestos($item, $valor);

                          foreach ($impuestos as $key => $value) {
                            
                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'- %'.$value["factor"].'</option>';
                          }

                        ?>
                      </select>
                    </div>
                  </div>
                  
                  <div class="col-xs-4">
                    <div class="form-group">
                      
                      <div class="panel" style="font-weight:bold;margin-top:10px;margin-bottom:-2px;">SUBIR IMAGEN</div>

                      <input type="file" class="nuevaImagen filestyle" name="nuevaImagen"  data-input="false">

                      <p class="help-block">Peso máximo de la imagen 2MB</p>
                          
                      
                      <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" height="80px" width="80px">

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

          <button type="submit" class="btn btn-primary text-center">Guardar producto</button>

        </div>

      </form>

        <?php

          $crearProducto = new ControladorProductos();
          $crearProducto -> ctrCrearProducto();
        ?>  

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PRODUCTO
======================================-->
<div id="modalEditarProducto1" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post" id="form_editar_producto" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3f668d; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

          <div class="form-group row">
              <div class="col-xs-6">
                <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Categoria</div>
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                  

                      <select class="form-control input"  name="editarategoria"  required>
                      
                      <option class="text-uppercase" id="editarategoria" selected></option>

                      <?php

                      $item = null;
                      $valor = null;

                      $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                      foreach ($categorias as $key => $value) {
                        
                        echo '<option class="text-uppercase" value="'.$value["id"].'">'.$value["categoria"].'</option>';
                      }

                      ?>
      
                

                    </select>

                  </div>
              </div>
            

           

            <!-- ENTRADA PARA EL PROVEEDOR -->
            
            
              <div class="col-xs-6">
                <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Rubro Asociado</div>
                <div class="input-group">
                    
                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                  <select class="form-control input"  name="editarProveedor"  required>
                    
                    <option id="editarProveedor" selected></option>

                    <?php

                    $item = null;
                    $valor = null;

                    $rubros = ControladorRubros::ctrMostrarRubros($item, $valor);

                    foreach ($rubros as $key => $value) {
                      
                      echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                    }

                    ?>
    
                  </select>

              

                </div>
              </div>
          </div>


            <!-- ENTRADA PARA LA DESCRIPCIÓN -->

            <div class="form-group">
               <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Producto</div>
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                    <input type="text" class="form-control input" id="ediarDescripcion" name="ediarDescripcion" required>

                  </div>

            </div>

             <!-- ENTRADA PARA STOCK -->

             <div class="form-group row">
              <div class="col-xs-4">
                <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Stock</div>
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                    <input type="number" class="form-control input-lg" id="editaStock" name="editarStock" min="0" required>

                  </div>
              </div>

              <div class="col-xs-4">
                <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Alerta de Stock</div>
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                    <input type="number" class="form-control input-lg" id="editaStockAlerta" name="editarStockAlerta" min="0" required>

                  </div>
              </div>

              <div class="col-xs-4">
                <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Stock Minimo</div>
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                    <input type="number" class="form-control input-lg" id="editaStockMin" name="editarStockMin" min="0" required>

                  </div>
              </div>
            </div>

             <!-- ENTRADA PARA PRECIO COMPRA -->

             <div class="form-group row">

                <div class="col-xs-6">
                <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Precio de Compra Neto</div>
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                    <input type="number" class="form-control input" id="editaPrecioCompra" name="editarPrecioCompra" step="any" min="0" required>

                  </div>

                </div>

                <!-- ENTRADA PARA PRECIO VENTA -->

                <div class="col-xs-6">
                <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Precio de Venta Neto</div>
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                    <input type="number" class="form-control input" id="editaPrecioVenta" name="editarPrecioVenta" step="any" min="0" required>

                  </div>
                
                  <br>

                 

                </div>

            </div>

              
            <!-- ENTRADA PARA EL CÓDIGO -->
            
            <div class="form-group row">

            <div class="col-xs-6">
              <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Codigo</div>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 
                
                <input type="text" class="form-control input" id="editaCodigo" name="editaCodigo" readonly required>
              

              </div>
      
              
           
              </div>
            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

            <div class="col-xs-6">
             <div class="form-group">
              
              <div class="panel">SUBIR IMAGEN</div>

              <input type="file" class="nuevaImagen filestyle" name="editarImagen" data-input="false" >

              <p class="help-block">Peso máximo de la imagen 2MB</p>

              <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

              <input type="text" name="imagenActual" id="imagenActual">

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

          <button type="submit" class="btn btn-primary text-center">Guardar cambios</button>

        </div>

      </form>

        <?php

          $editarProducto = new ControladorProductos();
          $editarProducto -> ctrEditarProducto();

        ?>      

    </div>

  </div>

</div>

<div id="modalEditarProducto" class="modal fade"  role="dialog">
  
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post" id="form_editar_producto" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3f668d; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

            

            <!-- ENTRADA PARA LA DESCRIPCIÓN -->
            <div class="box box-info">
              <div class="box-body">
                <div class="form-group row">              
                  <div class="col-xs-6">
                    <div class="d-inline-block text-center" style="font-size:16px;font-weight:bold">Producto</div>
                    <div class="input-group">
                    
                      <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 
                      <input type="hidden" id="editarProducto" name="editarProducto">
                      <input type="text" class="form-control input" id="editarDescripcion" name="editarDescripcion" placeholder="Nombre Producto" required>

                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Rubro Asociado</div> 
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                        <select class="form-control input" id="editarRubro" name="editarRubro" required>
                          
                          <option value="">Seleccionar Rubro</option>

                          <?php

                          $item = null;
                          $valor = null;

                          $rubros = ControladorRubros::ctrMostrarRubros($item, $valor);

                          foreach ($rubros as $key => $value) {
                            
                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                          }

                          ?>
          
                        </select>

                      </div>
                  </div>
                </div>  
                <div class="form-group row">
                    <div class="col-xs-6">
                        <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Categoria</div> 
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                          <select class="form-control input" id="editarCategoria" name="editarCategoria" required>
                            
                            <option value="">Seleccionar categoría</option>

                              <?php

                              $item = null;
                              $valor = null;

                              $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                              foreach ($categorias as $key => $value) {
                                echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                              }

                              ?>
            
                          </select>
                        </div>
                    </div>                 
                  <!-- ENTRADA PARA LA SUBCATEGORIA -->                           
                    <div class="col-xs-6">
                      <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Subcategoria</div> 
                        <div class="input-group">
                        
                          <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                          <select class="form-control input" id="editarSubcategoria" name="editarSubcategoria" required>
                            
                            <option value="">Seleccionar Subcategoria</option>

                            <?php

                            $item = null;
                            $valor = null;

                            $subcategorias = ControladorSubcategorias::ctrMostrarSubcategorias($item, $valor);

                            foreach ($subcategorias as $key => $value) {
                            
                              
                              echo '<option value="'.$value["id"].'">'.$value["subcategoria"].'</option>';
                              
                            }

                            ?>
            
                          </select>

                        </div>
                    </div>
                </div>
              </div>  
            </div>
             <!-- ENTRADA PARA STOCK -->
            <div class="box box-danger"> 
              <div class="box-body">
                <div class="form-group row">
                  <div class="col-xs-4">
                  <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Stock Inicial</div>
                    <div class="input-group">
                    
                      <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                      <input type="text" class="form-control input" id="editarStock" name="editarStock" min="0" placeholder="Stock" required>

                    </div>
                  </div>
                  <div class="col-xs-4">
                  <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Alerta de Stock</div>
                    <div class="input-group">
                    
                      <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                      <input type="text" class="form-control input" id="editarStockAlerta" name="editarStockAlerta" min="0" placeholder="Alerta de Stock" required>

                    </div>
                  </div>
                  <div class="col-xs-4">
                  <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Stock Minimo</div>
                    <div class="input-group">
                    
                      <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                      <input type="text" class="form-control input" id="editarStockMin" name="editarStockMin" min="0" placeholder="Stock Minimo" required>

                    </div>
                  </div>
                </div>

                <!-- ENTRADA PARA PRECIO COMPRA -->

                <div class="form-group row">

                    <div class="col-xs-4">
                    <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Precio de Compra Neto</div>
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                        <input type="number"  class="form-control input" id="editarPrecioCompra" name="editarPrecioCompra" step="any" min="0" placeholder="Precio de compra" required>

                      </div>

                    </div>

                    <!-- ENTRADA PARA PRECIO VENTA -->

                    <div class="col-xs-4">
                    <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Precio Lista Neto</div>
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                        <input type="number" class="form-control input" id="editarPrecioVenta" name="editarPrecioVenta" step="any" min="0" placeholder="Precio de venta" required>

                      </div>
                    

                    </div>

                    <div class="col-xs-4">
                    <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Unidad de Medida</div>
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                        <select class="form-control input" id="editarMedida" name="editarMedida" required>
                            
                            <option value="">Seleccionar Medida</option>

                            <?php

                            $item = null;
                            $valor = null;

                            $unidades = ControladorUnidades::ctrMostrarUnidades($item, $valor);

                            foreach ($unidades as $key => $value) {
                              
                              echo '<option value="'.$value["id"].'">'.$value["medida"].'</option>';
                            }

                            ?>
            
                          </select>

                      </div>
                    

                    </div>

                </div>

             
              </div>  
            </div>
             <!-- ENTRADA PARA EL CÓDIGO -->

           
            <div class="box box-success">
              <div class="box-body">
                <div class="form-group row"> 
                
                    <div class="col-xs-4">
                        <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Codigo de Producto</div>
                            <div class="input-group">
                            
                              <span class="input-group-addon"><i class="fa fa-code"></i></span> 
                            
                              <input type="number" class="form-control input" id="editarCodigo" name="editarCodigo" readonly required>
                            
                            </div>

                            <button type="button" class="btn btn-success" style="margin-top:4px"  onclick="editarbarcode();">Generar</button>
                            <button type="button" class="btn btn-info" style="margin-top:4px" onclick="editarimprimir();">Imprimir</button>
                            <div id="editarprint" style="display: none;">
                            <svg id="editarbarcode"></svg>
                          
                        </div> 

                  </div>
                  

                  <!-- ENTRADA PARA BODEGA -->
                            

                  <div class="col-xs-4">
                    <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Bodega</div>
                    <div class="input-group">
                    
                      <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                      <select class="form-control input" id="editarBodega" name="editarBodega" required>
                            
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
                  <div class="col-xs-4">
                    <div class="d-inline-block  text-center" style="font-size:16px;font-weight:bold">Impuestos Adicionales</div>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                      <select class="form-control input" id="editImpuesto" name="editImpuesto" >
          
                      <option value="">Seleccionar Impuesto Adicional </option>

                        <!-- 
                      <select class="form-control input" id="nuevoImpuesto" name="nuevoImpuesto" required>
                            
                        <option value="">Seleccionar Impuesto</option>-->
                        <?php

                          $item = null;
                          $valor = null;

                          $impuestos = ControladorImpuestos::ctrMostrarImpuestos($item, $valor);

                          foreach ($impuestos as $key => $value) {
                            
                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'- %'.$value["factor"].'</option>';
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

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary text-center">Guardar producto</button>

        </div>

      </form>

        <?php

          $editarProducto = new ControladorProductos();
          $editarProducto -> ctrEditarProducto();
        ?>  

    </div>

  </div>

</div>

<?php

  $eliminarProducto = new ControladorProductos();
  $eliminarProducto -> ctrEliminarProducto();

?>      



