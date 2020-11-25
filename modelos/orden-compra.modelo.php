<?php

require_once "conexion.php";

class ModeloOrdenCompra{

	/*=============================================
	CREAR ORDEN COMPRA
	=============================================*/

	static public function mdlIngresarOrdenCompra($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo, id_proveedor, fecha_emision, fecha_vencimiento, id_centro, id_bodega, subtotal, descuento, total_neto, iva, total_final,  id_medio_pago, id_plazo_pago, observacion, productos) 
												VALUES (:codigo, :id_proveedor, :fecha_emision, :fecha_vencimiento, :id_centro, :id_bodega, :subtotal, :descuento, :total_neto, :iva, :total_final, :id_medio_pago, :id_plazo_pago, :observacion, :productos)");
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
		$stmt->bindParam(":fecha_emision", $datos["fecha_emision"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_vencimiento", $datos["fecha_vencimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":id_centro", $datos["id_centro"], PDO::PARAM_INT);
		$stmt->bindParam(":id_bodega", $datos["id_bodega"], PDO::PARAM_INT);
		$stmt->bindParam(":subtotal", $datos["subtotal"], PDO::PARAM_STR);
		$stmt->bindParam(":descuento", $datos["descuento"], PDO::PARAM_STR);
		$stmt->bindParam(":total_neto", $datos["total_neto"], PDO::PARAM_STR);
		$stmt->bindParam(":iva", $datos["iva"], PDO::PARAM_STR);
		$stmt->bindParam(":total_final", $datos["total_final"], PDO::PARAM_STR);
		$stmt->bindParam(":id_medio_pago", $datos["id_medio_pago"], PDO::PARAM_INT);
		$stmt->bindParam(":id_plazo_pago", $datos["id_plazo_pago"], PDO::PARAM_INT);
		$stmt->bindParam(":id_proveedor", $datos["id_proveedor"], PDO::PARAM_INT);
		$stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);
		$stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);


       

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
	
	static public function mdlEditarOrdenCompra($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET codigo = :codigo, fecha_emision = :fecha_emision, fecha_vencimiento = :fecha_vencimiento, id_centro = :id_centro, id_bodega = :id_bodega, subtotal = :subtotal,
												descuento = :descuento, total_neto = :total_neto, iva = :iva, total_final = :total_final, id_medio_pago = :id_medio_pago, id_plazo_pago = :id_plazo_pago, id_proveedor = :id_proveedor,
												observacion = :observacion, productos = :productos WHERE id = :id");
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
		$stmt->bindParam(":fecha_emision", $datos["fecha_emision"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_vencimiento", $datos["fecha_vencimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":id_centro", $datos["id_centro"], PDO::PARAM_INT);
		$stmt->bindParam(":id_bodega", $datos["id_bodega"], PDO::PARAM_INT);
		$stmt->bindParam(":subtotal", $datos["subtotal"], PDO::PARAM_STR);
		$stmt->bindParam(":descuento", $datos["descuento"], PDO::PARAM_STR);
		$stmt->bindParam(":total_neto", $datos["total_neto"], PDO::PARAM_STR);
		$stmt->bindParam(":iva", $datos["iva"], PDO::PARAM_STR);
		$stmt->bindParam(":total_final", $datos["total_final"], PDO::PARAM_STR);
		$stmt->bindParam(":id_medio_pago", $datos["id_medio_pago"], PDO::PARAM_INT);
		$stmt->bindParam(":id_plazo_pago", $datos["id_plazo_pago"], PDO::PARAM_INT);
		$stmt->bindParam(":id_proveedor", $datos["id_proveedor"], PDO::PARAM_INT);
		$stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);
		$stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);


       

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;
	}

    static public function mdlMostrarOrdenCompra($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	static public function mdlEliminarOrdenCompra($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

    }
}

