<?php

class ControladorProveedores{

	/*=============================================
	CREAR PROVEEDORES
	=============================================*/

	static public function ctrCrearProveedores(){

		if(isset($_POST["nuevoProveedor"])){

			   	$tabla = "proveedores";

			   	$datos = array("razon_social"=>$_POST["nuevoProveedor"],
                               "rut"=>$_POST["nuevoRutId"],
                               "ciudad"=>$_POST["nuevaCiudad"],
                               "nro_cuenta"=>$_POST["nuevoNroCuenta"],	
                               "banco"=>$_POST["nuevoBanco"],
                               "telefono"=>$_POST["nuevoTelefono"],
							   "email"=>$_POST["nuevoEmail"],
							   "actividad"=>$_POST["nuevaActividad"],
							   "ejecutivo"=>$_POST["nuevoEjecutivo"],
							   "rubros"=>$_POST["rubros"]);

			   	$respuesta = ModeloProveedores::mdlIngresarProveedor($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Proveedor ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "proveedores";

									}
								})

					</script>';

				}

			
		}

	}

	/*=============================================
	MOSTRAR PROVEEDORES
	=============================================*/

	static public function ctrMostrarProveedores($item, $valor){

		$tabla = "proveedores";

		$respuesta = ModeloProveedores::mdlMostrarProveedores($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR PROVEEDORES
	=============================================*/

	static public function ctrEditarProveedor(){

		if(isset($_POST["editarProveedor"])){

			   	$tabla = "proveedores";

			   	$datos = array(	"id"=>$_POST["idProveedor"],
                                "razon_social"=>$_POST["editarProveedor"],
                                "rut"=>$_POST["editarRutId"],
                                "ciudad"=>$_POST["editarCiudad"],
                                "nro_cuenta"=>$_POST["editarNroCuenta"],
                                "banco"=>$_POST["editarBanco"],
                                "telefono"=>$_POST["editarTelefono"],
								"email"=>$_POST["editarEmail"],
								"actividad"=>$_POST["editarActividad"],
								"ejecutivo"=>$_POST["editarEjecutivo"]);

			   	$respuesta = ModeloProveedores::mdlEditarProveedor($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El proveedor ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "proveedores";

									}
								})

					</script>';

				}


		}

	}

	/*=============================================
	ELIMINAR PROVEEDORES
	=============================================*/

	static public function ctrEliminarProveedores(){

		if(isset($_GET["idProveedor"])){

			$tabla ="proveedores";
			$datos = $_GET["idProveedor"];

			$respuesta = ModeloProveedores::mdlBorrarProveedor($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El Proveedor ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "proveedores";

								}
							})

				</script>';

			}		

		}

	}

}

