$('.tablaVentaFactura').DataTable( {
    "ajax": "ajax/datatable-compras.ajax.php",
    "deferRender": true,
	"retrieve": true,
	"processing": true,
	 "language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

	}

} );


$(".tablaVentaFactura tbody").on("click", "button.agregarProducto", function(){

	var idProducto = $(this).attr("idProducto");

	$(this).removeClass("btn-primary agregarProducto");

	$(this).addClass("btn-default");

	var datos = new FormData();
    datos.append("idProducto", idProducto);

     $.ajax({

     	url:"ajax/productos.ajax.php",
      	method: "POST",
      	data: datos,
      	cache: false,
      	contentType: false,
      	processData: false,
      	dataType:"json",
      	success:function(respuesta){
            console.table(respuesta, "respuesta")
      	    var descripcion = respuesta["descripcion"];
			var precio = respuesta["precio_venta"] * (1 - $("#traerFactor").val()/100);
			var desc = 0
			var total_neto = precio - desc;
			var impuesto = 0
			var total = Number(precio) + Number(impuesto);
            console.log(precio);


  

          	

			

          	$("#exento").append(


          	'<div class="row" style="padding:5px 15px">'+

			  '<!-- Descripción del producto -->'+
	          
	          '<div class="col-xs-2" style="padding-right:0px">'+
	          
	            '<div class="input-group">'+
	              
	              '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="'+idProducto+'"><i class="fa fa-times"></i></button></span>'+

	              '<input type="text" class="form-control nuevaDescripcionProducto" idProducto="'+idProducto+'" name="agregarProducto" value="'+descripcion+'" readonly required>'+

	            '</div>'+

			  '</div>'+
			  

	          '<!-- Cantidad del producto -->'+

	          '<div class="col-xs-1 cantidadProducto" style="padding-right:0px">'+
	            
	             '<input type="text" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1"  required>'+

			  '</div>' +
			  	'<!-- Precio Unitario -->'+
				'<div class="col-xs-1 precioUnitario" style="padding-right:0px">'+
						
					'<input type="text"  class="form-control nuevoPrecioUnitario" style="padding:5px; padding-left:1px"  name="nuevoPrecioUnitario" value="'+precio+'" required>'+
		
					
				'</div>'+
				'<!-- Subtotal Neto -->'+

					'<div class="col-xs-1 subtotalProducto" style="padding-right:0px">'+
							
						'<input type="text" class="form-control nuevoSubtotalProducto" style="padding:5px" name="nuevoSubtotalProducto" min="0" value="'+precio+'"  readonly required>'+

					'</div>' +
			  
					'<!-- Descuento -->'+
					'<div class="col-xs-1 descuentoProducto" style="padding-right:0px">'+
							
					'<input type="text" class="form-control nuevoDescuentoProducto" style="padding:5px" name="nuevoDescuentoProducto" min="0" value="'+desc+'"  required>'+

					'</div>' +
					'<!-- Precio Total Neto del producto -->'+
			
				'<div class="col-xs-2 ingresoPrecio" style="padding-right:0px">'+

					'<input   type="text" class="form-control nuevoPrecioProducto" onchange="cambios()" precioReal="'+precio+'" name="nuevoPrecioProducto" value="'+total_neto+'" readonly required>'+
				
				'</div>'+

				'<!-- IVA del producto -->'+

					'<div class="col-xs-1 ivaProducto" style="padding-right:0px">'+
							
						'<input type="text" class="form-control nuevoIvaProducto" style="padding:5px" name="nuevoIvaProducto" min="0" value="'+impuesto+'"  readonly required>'+

					'</div>' +
					'<!-- OTROS IMPUESTOS del producto -->'+

					'<div class="col-xs-1 " style="padding-right:0px">'+
							
						'<input type="text" class="form-control nuevoOtrosImpuestosProducto" style="padding:5px" name="nuevoOtrosImpuestosProducto" min="0" value="0"  required>'+

					'</div>' +

					'<div class="col-xs-2 totalProducto style="padding-right:0px">'+
							
						'<input type="text" class="form-control nuevoTotalProducto" name="nuevoTotalProducto" min="0" value="'+total+'" readonly required>'+

					'</div>' +
					

				
			
		   
			'</div>')


	        // SUMAR TOTAL DE PRECIOS
		
	        sumarTotalPrecios()

	        // AGREGAR IMPUESTO

	        agregarImpuesto()

	        // AGRUPAR PRODUCTOS EN FORMATO JSON

	        listarProductos()

	        // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

			$(".nuevoPrecioProducto").number(true, 0);
			$(".nuevoTotalProducto").number(true, 0);
			$(".nuevoDescuentoProducto").number(true, 0);
			$(".nuevoPrecioUnitario").number(true, 0);
			$(".nuevoSubtotalProducto").number(true, 0);
			$(".nuevoIvaProducto").number(true, 0);


			localStorage.removeItem("quitarProducto");

		  }
		 

	 })
	 
	
});




$("#nuevoDTE").on("click", function(){
    $("#tipodte").html($(this).val().toUpperCase());
})

$("#nuevoDTE").on("change", function(){
    if($("#nuevoDTE").val() === "Factura Exenta"){
        $("#afecto").hide()
        $("#exento").show()
        console.log("Mostrar Productos Exentos");
    }else if($("#nuevoDTE").val() === "Factura Afecta"){
        $("#exento").hide()
        $("#afecto").show()
        console.log("Mostrar Productos Afectos");
    }
})

$("#nuevoClienteFactura").change(function(){
	var idCliente = $(this).val();
	var idLista = $('option:selected', this).attr('idLista');
	console.log(idCliente);
	console.log(idLista);
	var datos = new FormData();
	datos.append("idCliente", idCliente);
	var datos2 = new FormData();
	datos2.append("idLista", idLista);

	$.ajax({
		url: "ajax/listas.ajax.php",
		method: "POST",
      	data: datos2,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){
			var factor = respuesta["factor"];
			var nombre_lista = respuesta["nombre_lista"];  
			var factor_lista = nombre_lista + ' - ' + factor + ' %';  
           		$.ajax({
					url: "ajax/clientes.ajax.php",
					method: "POST",
					data: datos,
					cache: false,
					contentType: false,
					processData: false,
					dataType:"json",
					success: function(respuesta){
						console.log("respuesta", respuesta);           
						$("#traerId").val(respuesta["id"]);
						$("#traerRut").val(respuesta["rut"]);
						$("#traerDireccion").val(respuesta["direccion"]);
						$("#traerTelefono").val(respuesta["telefono"]);
						$("#traerEmail").val(respuesta["email"]);
						$("#traerActividad").val(respuesta["actividad"]);
						$("#traerEjecutivo").val(respuesta["ejecutivo"]);
						$("#traerFactor").val(factor);
						$("#traerLista").val(factor_lista);
						}

				})
     	}
		
	})

		


});

