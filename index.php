<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/proveedores.controlador.php";
require_once "controladores/historialVentas.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/subcategorias.controlador.php";
require_once "controladores/bancos.controlador.php";
require_once "controladores/unidades.controlador.php";
require_once "controladores/bodegas.controlador.php";
require_once "controladores/centros.controlador.php";
require_once "controladores/negocios.controlador.php";
require_once "controladores/orden-compra.controlador.php";
require_once "controladores/orden-vestuario.controlador.php";
require_once "controladores/venta-boleta.controlador.php";
require_once "controladores/listas.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/ventas.controlador.php";
require_once "controladores/impuestos.controlador.php";
require_once "controladores/rubros.controlador.php";
require_once "controladores/plazos.controlador.php";
require_once "controladores/sucursales.controlador.php";
require_once "controladores/matrices.controlador.php";
require_once "controladores/personal.controlador.php";
require_once "controladores/medios-pago.controlador.php";
require_once "controladores/regiones.controlador.php";
require_once "controladores/tipo-cliente.controlador.php";
require_once "controladores/tipo-producto.controlador.php";
require_once "controladores/cotizacion.controlador.php";
require_once "controladores/plantel.controlador.php";



require_once "modelos/usuarios.modelo.php";
require_once "modelos/proveedores.modelo.php";
require_once "modelos/historialVentas.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/subcategorias.modelo.php";
require_once "modelos/bancos.modelo.php";
require_once "modelos/unidades.modelo.php";
require_once "modelos/bodegas.modelo.php";
require_once "modelos/centros.modelo.php";
require_once "modelos/orden-compra.modelo.php";
require_once "modelos/orden-vestuario.modelo.php";
require_once "modelos/negocios.modelo.php";
require_once "modelos/listas.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "modelos/impuestos.modelo.php";
require_once "modelos/rubros.modelo.php";
require_once "modelos/plazos.modelo.php";
require_once "modelos/sucursales.modelo.php";
require_once "modelos/matrices.modelo.php";
require_once "modelos/personal.modelo.php";
require_once "modelos/medios-pago.modelo.php";
require_once "modelos/regiones.modelo.php";
require_once "modelos/plantel.modelo.php";
require_once "modelos/tipo-cliente.modelo.php";
require_once "modelos/tipo-producto.modelo.php";
require_once "modelos/cotizacion.modelo.php";
require_once "modelos/venta-boleta.modelo.php";
require_once "extensiones/vendor/autoload.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();