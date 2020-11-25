
<?php

class Conexion{

	static public function conectar(){

		try{
		$link = new PDO("mysql:host=localhost;dbname=mlinecl_sis_inventario","root","");

		$link->exec("set names utf8");

		return $link;

		}catch(PDOException $e) {
			echo 'Falló la conexión: ' . $e->getMessage();
		}

	}

}


