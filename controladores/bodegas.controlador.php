<?php

class ControladorBodegas{

	/*=============================================
	CREAR PROVEEDORES
	=============================================*/

	static public function ctrCrearBodega(){

		if(isset($_POST["nuevaBodega"])){

			   	$tabla = "bodegas";

			   	$datos = array("nombre"=>$_POST["nuevaBodega"],
                               "region"=>$_POST["nuevaRegion"],
                               "comuna"=>$_POST["nuevaComuna"],
                               "direccion"=>$_POST["nuevaDireccion"],	
                               "jefe"=>$_POST["nuevoJefe"],
                               "telefono"=>$_POST["nuevoTelefono"],
							   "email"=>$_POST["nuevoEmail"]);

			   	$respuesta = ModeloBodegas::mdlIngresarBodega($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La Bodega ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "bodegas";

									}
								})

					</script>';

				}

			
		}

	}

	/*=============================================
	MOSTRAR BODEGAS
	=============================================*/

	static public function ctrMostrarBodegas($item, $valor){

		$tabla = "bodegas";

		$respuesta = ModeloBodegas::mdlMostrarBodegas($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR PROVEEDORES
	=============================================*/

	static public function ctrEditarBodega(){

		if(isset($_POST["editarBodega"])){

			   	$tabla = "bodegas";

				$datos = array("id"=>$_POST["idBodega"],
								"nombre"=>$_POST["editarBodega"],
								"region"=>$_POST["editarRegion"],
								"comuna"=>$_POST["editarComuna"],
								"direccion"=>$_POST["editarDireccion"],	
								"jefe"=>$_POST["editarJefe"],
								"telefono"=>$_POST["editarTelefono"],
								"email"=>$_POST["editarEmail"]);

			   	$respuesta = ModeloBodegas::mdlEditarBodega($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La Bodega ha sido modificada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "bodegas";

									}
								})

					</script>';

				}


		}

	}

	/*=============================================
	ELIMINAR PROVEEDORES
	=============================================*/

	static public function ctrEliminarBodega(){

		if(isset($_GET["idBodega"])){

			$tabla ="bodegas";
			$datos = $_GET["idBodega"];

			$respuesta = ModeloBodegas::mdlBorrarBodega($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La Bodega ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "bodegas";

								}
							})

				</script>';

			}		

		}

	}

}

