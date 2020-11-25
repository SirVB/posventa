<?php

class ControladorMatrices{

	/*=============================================
	CREAR SUCURSAL
	=============================================*/

	static public function ctrCrearMatriz(){

		if(isset($_POST["nuevaMatriz"])){
			   	$tabla = "matrices";

			   	$datos = array("razon_social"=>$_POST["nuevaMatriz"],
                               "region"=>$_POST["nuevaRegion"],
                               "comuna"=>$_POST["nuevaComuna"],
                               "direccion"=>$_POST["nuevaDireccion"],	
                               "ejecutivo"=>$_POST["nuevoEjecutivo"],
                               "telefono"=>$_POST["nuevoTelefono"],
                               "email"=>$_POST["nuevoEmail"],
                                "actividad"=>$_POST["nuevaActividad"],
                                "fecha_inicio"=>$_POST["nuevoInicio"],
                                "fecha_vencimiento"=>$_POST["nuevoVencimiento"],
								"tipo_cliente"=>$_POST["nuevoTipoCliente"],
								"tipo_producto"=>$_POST["nuevoTipoProducto"]);

			   	$respuesta = ModeloMatrices::mdlIngresarMatriz($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La Matriz ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "matriz";

									}
								})

					</script>';

				}

			
		}

	}

	/*=============================================
	MOSTRAR MATRIZ
	=============================================*/

	static public function ctrMostrarMatrices($item, $valor){

		$tabla = "matrices";

		$respuesta = ModeloMatrices::mdlMostrarMatrices($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR PROVEEDORES
	=============================================*/

	static public function ctrEditarSucursal(){

		if(isset($_POST["editarSucursal"])){

			   	$tabla = "sucursales";

				$datos = array("id"=>$_POST["idSucursal"],
								"nombre"=>$_POST["editarSucursal"],
								"region"=>$_POST["editarRegion"],
								"comuna"=>$_POST["editarComuna"],
								"direccion"=>$_POST["editarDireccion"],	
								"jefe"=>$_POST["editarJefe"],
								"telefono"=>$_POST["editarTelefono"],
                                "email"=>$_POST["editarEmail"],
								"bodega"=>$_POST["editarBodega"],
								"bodega"=>$_POST["editarBodega"],
							);

			   	$respuesta = ModeloSucursales::mdlEditarSucursal($tabla, $datos);

			   	if($respuesta == "ok"){

                    echo'<script>
					swal({
						  type: "success",
						  title: "La Sucursal ha sido modificada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "matriz";

									}
								})

					</script>';

				}


		}

	}

	/*=============================================
	ELIMINAR PROVEEDORES
	=============================================*/

	static public function ctrEliminarMatriz(){

		if(isset($_GET["idMatriz"])){

			$tabla ="matrices";
			$datos = $_GET["idMatri<"];

			$respuesta = ModeloMatrices::mdlBorrarMatriz($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La Matriz ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "matriz";

								}
							})

				</script>';

			}		

		}

	}

}

