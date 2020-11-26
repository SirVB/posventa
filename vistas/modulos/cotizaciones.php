<?php



if($_SESSION["perfil"] == "Especial"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

$xml = ControladorVentas::ctrDescargarXML();

if($xml){

  rename($_GET["xml"].".xml", "xml/".$_GET["xml"].".xml");

  echo '<a class="btn btn-block btn-success abrirXML" archivo="xml/'.$_GET["xml"].'.xml" href="ventas">Se ha creado correctamente el archivo XML <span class="fa fa-times pull-right"></span></a>';

}

?>
<div class="content-wrapper">

  <section class="content-header"> 
    
    <h1>
      
      Administrar Cotizaciones
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Cotizaciones</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <a href="cotizacion">

          <button class="btn btn-danger">
            
           Crear Cotizacion Afecta

          </button>

        </a>
        <a href="cotizacion-exenta">

        <button class="btn btn-warning">
          
        Crear Cotizacion Exenta

        </button>

        </a>
         <button type="button" class="btn btn-default pull-right" id="daterange-btn">
           
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

      <div class="box-body">

       <div class="box-header with-border">
    <?php
    if($_SESSION["perfil"]=="Administrador")
    ?> 
      <div class="input-group">

        <button type="button" class="btn btn-default" id="daterange-cotizacion">
        
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

            echo '<a href="vistas/modulos/descargar-reporte-cotizacion.php?reporte=reporte">';

          }         

          ?>
        
          <button class="btn btn-success" style="margin-top:5px">Descargar reporte en Excel</button>

          </a>

        </div>
  
  </div>
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
       
        <thead>
         
         <tr>
           
           <th>Folio</th>
           <th>DTE</th>
           <th>Emision</th>
           <th>Vencimiento</th>
           <th>Vendedor</th>
           <th>Unidad de Negocio</th>
           <th>Bodega</th>
           <th>Plazo de Pago</th>
           <th>Medio de Pago</th>
           <th>Cliente</th>
           <th>Observacion</th>
           <th>Total</th>
           <th>Acciones</th>
         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $cotizaciones = ControladorCotizacion::ctrMostrarCotizaciones($item, $valor);
          $exentas = ControladorCotizacion::ctrMostrarCotizacionesExentas($item, $valor);
          $negocios = ControladorNegocios::ctrMostrarNegocios($item, $valor);
          $bodegas = ControladorBodegas::ctrMostrarBodegas($item, $valor);
          $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
          $plazos = ControladorPlazos::ctrMostrarPlazos($item,$valor);
          $medios = ControladorMediosPago::ctrMostrarMedios($item,$valor);
          $plantel = ControladorPlantel::ctrMostrarPlantel($item, $valor);

            foreach ($cotizaciones as $key => $value) {
              for($i = 0; $i < count($negocios); ++$i){
                if ($negocios[$i]["id"] == $value["id_unidad_negocio"]) {
                  $negocio = $negocios[$i]["unidad_negocio"];
                }
              }
              for($i = 0; $i < count($bodegas); ++$i){
                if ($bodegas[$i]["id"] == $value["id_bodega"]) {
                  $bodega = $bodegas[$i]["nombre"];
                }
              }
              for($i = 0; $i < count($clientes); ++$i){
                if ($clientes[$i]["id"] == $value["id_cliente"]) {
                  $cliente = $clientes[$i]["nombre"];
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
                        for($i = 0; $i < count($plantel); ++$i){
                    if ($plantel[$i]["id"] == $value["id_vendedor"]) {
                      $vendedor = $plantel[$i]["nombre"];
                    }
                }
            

              echo '<tr>


                    <td>'.$value["codigo"].'</td>

                    <td style="font-weight:bold;font-size:15px;color:black;">'.$value["tipo_dte"].'</td>

                    <td>'.$value["fecha_emision"].'</td>

                    <td>'.$value["fecha_vencimiento"].'</td>

                    <td>'.$vendedor.'</td>

                    <td>'.$negocio.'</td>

                    <td>'.$bodega.'</td>      

                    <td>'.$plazo.'</td>

                    <td>'.$medio.'</td>

                    <td>'.$cliente.'</td>

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
                            <button class="btn btn-warning btnEditarCotizacion" idCotizacion="'.$value["id"].'"><i class="fa fa-pencil"></i></button> ';

                      }
                      if($_SESSION["perfil"] == "Administrador"){
                     echo' <button class="btn btn-danger btnEliminarCotizacion" idCotizacion="'.$value["id"].'"><i class="fa fa-times"></i></button>';


                    }

                    echo '</div>  

                  </td>


                  </tr>';
          
            }

            foreach($exentas as $key2 => $value){
              for($i = 0; $i < count($negocios); ++$i){
                if ($negocios[$i]["id"] == $value["id_unidad_negocio"]) {
                  $negocio = $negocios[$i]["unidad_negocio"];
                }
              }
              for($i = 0; $i < count($bodegas); ++$i){
                if ($bodegas[$i]["id"] == $value["id_bodega"]) {
                  $bodega = $bodegas[$i]["nombre"];
                }
              }
              for($i = 0; $i < count($clientes); ++$i){
                if ($clientes[$i]["id"] == $value["id_cliente"]) {
                  $cliente = $clientes[$i]["nombre"];
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
                        for($i = 0; $i < count($plantel); ++$i){
                    if ($plantel[$i]["id"] == $value["id_vendedor"]) {
                      $vendedor = $plantel[$i]["nombre"];
                    }
                }
            

              echo '<tr>


                    <td>'.$value["codigo"].'</td>

                    <td style="font-weight:bold;font-size:15px; color:black;">'.$value["tipo_dte"].'</td>

                    <td>'.$value["fecha_emision"].'</td>

                    <td>'.$value["fecha_vencimiento"].'</td>

                    <td>'.$vendedor.'</td>

                    <td>'.$negocio.'</td>

                    <td>'.$bodega.'</td>      

                    <td>'.$plazo.'</td>

                    <td>'.$medio.'</td>

                    <td>'.$cliente.'</td>

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
                            <button class="btn btn-warning btnEditarCotizacion" idCotizacion="'.$value["id"].'"><i class="fa fa-pencil"></i></button> ';

                      }
                      if($_SESSION["perfil"] == "Administrador"){
                     echo' <button class="btn btn-danger btnEliminarCotizacion" idCotizacion="'.$value["id"].'"><i class="fa fa-times"></i></button>';


                    }

                    echo '</div>  

                  </td>


                  </tr>';


            }

           
        ?>
   
        </tbody>

       </table>
       
       <?php

      $eliminarCotizacion = new ControladorCotizacion();
      $eliminarCotizacion -> ctrEliminarCotizacion();

      ?>

       

      </div>

    </div>

  </section>

</div>




