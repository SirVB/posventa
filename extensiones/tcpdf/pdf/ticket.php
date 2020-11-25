<?php

require_once "../../../controladores/ventas.controlador.php";
require_once "../../../modelos/ventas.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controladores/productos.controlador.php";
require_once "../../../modelos/productos.modelo.php";

class imprimirFactura{

public $codigo;

public function traerImpresionFactura(){

//TRAEMOS LA INFORMACIÓN DE LA VENTA

$itemVenta = "codigo";
$valorVenta = $this->codigo;

$respuestaVenta = ControladorVentas::ctrMostrarVentas($itemVenta, $valorVenta);

$fecha = date("d-m-Y",strtotime($respuestaVenta["fecha"]));
$productos = json_decode($respuestaVenta["productos"], true);
$neto = number_format($respuestaVenta["neto"],0);
$descuento = number_format($respuestaVenta["descuento"],0);
$total = number_format($respuestaVenta["total"],0);
$metodo_pago = $respuestaVenta["metodo_pago"];
$total_pagado = number_format($respuestaVenta["total_pagado"],0);
$total_pendiente_pago = number_format($respuestaVenta["total_pendiente_pago"],0);

//TRAEMOS LA INFORMACIÓN DEL CLIENTE

$itemCliente = "id";
$valorCliente = $respuestaVenta["id_cliente"];

$respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

//TRAEMOS LA INFORMACIÓN DEL VENDEDOR

$itemVendedor = "id";
$valorVendedor = $respuestaVenta["id_vendedor"];

$respuestaVendedor = ControladorUsuarios::ctrMostrarUsuarios($itemVendedor, $valorVendedor);

//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->AddPage('P', 'A7');

//---------------------------------------------------------

$bloque1 = <<<EOF

<table style="font-size:9px; text-align:center">

	<tr>
		
		<td style="width:160px;">
	
			<div style="font-size:8.5px; text-align:left; line-height:10px">
		
			
				Fecha: $fecha
				<div style="line-height:3px; text-align:right;">				
				FACTURA N.$valorVenta
				</div>
				<br>
				<strong>Sistema POS</strong>
				<br>
									
				Cliente: $respuestaCliente[nombre]

				<br>
				Vendedor: $respuestaVendedor[nombre]

				<br>

			</div>

		</td>

	</tr>


</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

// ---------------------------------------------------------


foreach ($productos as $key => $item) {

$valorUnitario = number_format($item["precio"], 0);

$precioTotal = number_format($item["total"], 0);

$bloque2 = <<<EOF

<table style="font-size:8.5px; line-height:7px;">

<tr>

		<td style="width:85px; text-align:left;">
		$item[cantidad] $item[descripcion] 
		</td>
	
		<td style="width:75px; text-align:right">
		$ $valorUnitario  = $ $precioTotal
		<br>
		</td>

	</tr>


</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

}

// ---------------------------------------------------------

$bloque3 = <<<EOF

<table style="font-size:9px; text-align:right">

<tr>
	
		<td style="width:80px;">
			 Sub Total: 
		</td>

		<td style="width:80px;">
			$ $neto
		</td>

	</tr>

	<tr>
	
		<td style="width:80px;">
			 Descuento: 
		</td>

		<td style="width:80px;">
			$ $descuento
		</td>

	</tr>

<tr>
	
<td style="width:80px;">
$metodo_pago:
</td>

<td style="width:80px">
	$ $total_pagado
</td>

</tr>


<tr>
	
<td style="width:80px;">
Pendiente:
</td>

<td style="width:80px">
	$ $total_pendiente_pago
</td>

</tr>

	

	

	<tr>
	
		<td style="width:160px;">
			 --------------------------
		</td>

	</tr>

	<tr>
	
		<td style="width:80px;">
			 TOTAL: 
		</td>

		<td style="width:80px;">
			$ $total
			
		</td>

	</tr>

</table>



EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------
//SALIDA DEL ARCHIVO 

//$pdf->Output('factura.pdf', 'D');
ob_end_clean();
$pdf->Output('factura.pdf');

}

}

$factura = new imprimirFactura();
$factura -> codigo = $_GET["codigo"];
$factura -> traerImpresionFactura();
?>