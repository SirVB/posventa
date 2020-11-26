<?php


class ControladorVentaBoleta{

	/*=============================================
	CREAR COTIZACION
	=============================================*/

	static public function ctrCrearVentaBoleta(){

		if(isset($_POST["nuevoCodigo"])){

			   	$tabla = "venta_boleta";

                   $datos = array("codigo"=>$_POST["nuevoCodigo"],
								"id_cliente"=>$_POST["nuevoClienteBoleta"],
								"id_vendedor"=>$_POST["nuevoVendedor"],
                                "fecha_emision"=>$_POST["nuevaFechaEmision"],
                                "id_unidad_negocio"=>$_POST["nuevoNegocio"],	
                                "id_bodega"=>$_POST["nuevaBodega"],
                                "subtotal"=>$_POST["nuevoSubtotal"],
                                "descuento"=>$_POST["nuevoTotalDescuento"],
                                "total_neto"=>$_POST["nuevoTotalNeto"],
                                "iva"=>$_POST["nuevoTotalIva"],
                                "total_final"=>$_POST["nuevoTotalFinal"],
                                "id_medio_pago"=>$_POST["nuevoMedioPago"],
                                "id_plazo_pago"=>$_POST["nuevoPlazo"],
                                "observacion"=>$_POST["nuevaObservacion"],
                                "pagado"=>$_POST["nuevoTotalPagado"],
                                "pendiente"=>$_POST["nuevoTotalPendiente"],
                                "productos"=>$_POST["listaProductos"]);


			   	$respuesta = ModeloVentaBoleta::mdlIngresarVentaBoleta($tabla, $datos);

			   	if($respuesta == "ok"){

                    echo'<script>
                    
					swal({
						  type: "success",
						  title: "La Venta con Boleta ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "ventas";

									}
								})

					</script>';

				}

			
		}

	}




}
    