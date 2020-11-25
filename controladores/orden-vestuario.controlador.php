<?php

class ControladorOrdenVestuario{

	/*=============================================
	CREAR ORDEN DE VESTUARIO
	=============================================*/

	static public function ctrCrearOrdenVestuario(){

		if(isset($_POST["nuevoCodigo"])){

			   	$tabla = "orden_vestuario";

			   	$datos = array("codigo"=>$_POST["nuevoCodigo"],
                               "fecha_emision"=>$_POST["nuevaFechaEmision"],
                               "nombre_orden"=>$_POST["nuevoNombreOrden"],
                               "fecha_vencimiento"=>$_POST["nuevaFechaVencimiento"],
                               "id_centro"=>$_POST["nuevoCentro"],	
                               "id_bodega"=>$_POST["nuevaBodega"],
                               "id_cliente"=>$_POST["nuevoCliente"],
                               "observacion"=>$_POST["nuevaObservacion"]);


			   	$respuesta = ModeloOrdenVestuario::mdlIngresarOrdenVestuario($tabla, $datos);

			   	if($respuesta == "ok"){

                    echo'<script>
                    console.log("'.$datos["nombre_orden"].'", "'.$datos["observacion"].'", '.$datos["codigo"].', '.$datos["fecha_emision"].', '.$datos["fecha_vencimiento"].', "'.$datos["id_cliente"].'");
					swal({
						  type: "success",
						  title: "La Orden de Vestuario ha sido guardada correctamente",    
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "orden-vestuario";

									}
								})

					</script>';

				}

			
		}

    }

    static public function ctrMostrarOrdenVestuario($item, $valor){

		$tabla = "orden_vestuario";

		$respuesta = ModeloOrdenVestuario::mdlMostrarOrdenVestuario($tabla, $item, $valor);

		return $respuesta;
	
	}
}
