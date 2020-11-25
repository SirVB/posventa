<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

		<?php

		if($_SESSION["perfil"] == "Administrador"){

			echo '<li class="active">

					<a href="inicio">

						<i class="fa fa-home"></i>
						<span>Inicio</span>

					</a>

				</li>';
				if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){

					echo '<li class="treeview">
		
							<a href="#">
		
								<i class="fa fa-user"></i>
								
								<span>Configuraciones</span>
								
								<span class="pull-right-container">
								
									<i class="fa fa-angle-left pull-right"></i>
		
								</span>
		
							</a>
								<ul class="treeview-menu">
									
									<li>
		
										<a href="usuarios">
											
											<i class="fa fa-circle-o"></i>
											<span>Usuarios</span>
		
										</a>
		
									<li>
									<li>
		
										<a href="plantel">
											
											<i class="fa fa-circle-o"></i>
											<span>Plantel</span>
		
										</a>
		
									<li>
									<li>
		
										<a href="#">
											
											<i class="fa fa-circle-o"></i>
											<span>Accesos</span>
		
										</a>
		
									<li>

									
								</ul>
						</li>';
		
				}
				if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){

					echo '<li class="treeview">
		
							<a href="#">
		
								<i class="fa fa-cog"></i>
								
								<span>Parametros</span>
								
								<span class="pull-right-container">
								
									<i class="fa fa-angle-left pull-right"></i>
		
								</span>
		
							</a>
								<ul class="treeview-menu">
									
									<li>
		
										<a href="parametros-generales">
											
											<i class="fa fa-circle-o"></i>
											<span>Generales</span>
		
										</a>
		
									<li>
									<li>
		
										<a href="parametros-documentos">
											
											<i class="fa fa-circle-o"></i>
											<span>Documentos</span>
		
										</a>
		
									<li>
									<li>
		
										<a href="parametros-impresion">
											
											<i class="fa fa-circle-o"></i>
											<span>Impresion</span>
		
										</a>
		
									<li>

									<li>
		
										<a href="bancos">
											
											<i class="fa fa-circle-o"></i>
											<span>Bancos</span>
		
										</a>
		
									<li>
									<li>
		
										<a href="sucursales">
											
											<i class="fa fa-circle-o"></i>
											<span>Sucursales</span>
		
										</a>
		
									<li>
									<li>
		
										<a href="matriz">
											
											<i class="fa fa-circle-o"></i>
											<span>Matriz</span>
		
										</a>
		
									<li>
										
								
								</ul>
						</li>';
		
				}

				if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){

					echo '<li class="treeview">
		
							<a href="#">
		
								<i class="fa fa-archive"></i>
								
								<span>Maestro</span>
								
								<span class="pull-right-container">
								
									<i class="fa fa-angle-left pull-right"></i>
		
								</span>
		
							</a>
								<ul class="treeview-menu">
									
									<li>
		
										<a href="categorias">
											
											<i class="fa fa-circle-o"></i>
											<span>Categorias</span>
		
										</a>
		
										<li>
										
										<a href="subcategorias">
											
											<i class="fa fa-circle-o"></i>
											<span>Subcategorias</span>
		
										</a>
										</li>
		
									</li>
		
									<li>
		
										<a href="bodegas">
											
											<i class="fa fa-circle-o"></i>
											<span>Bodegas</span>
		
										</a>
		
									</li>
									
									<li>
		
										<a href="plazos">
											
											<i class="fa fa-circle-o"></i>
											<span>Plazo de Pago</span>
		
										</a>
		
									</li>
		
									<li>
		
										<a href="listas">
											
											<i class="fa fa-circle-o"></i>
											<span>Lista de Precios</span>
		
										</a>
		
									</li>
		
									<li>
		
										<a href="unidades">
											
											<i class="fa fa-circle-o"></i>
											<span>Unidades</span>
		
										</a>
		
									</li>
	

									<li>
										<a href="medios-pago">
											
											<i class="fa fa-circle-o"></i>
											<span>Medios de Pago</span>
		
										</a>
										</li>

									<li>
		
										<a href="impuestos">
											
											<i class="fa fa-circle-o"></i>
											<span>Impuestos</span>
		
										</a>
		
									</li>
									<li>
		
										<a href="rubros">
											
											<i class="fa fa-circle-o"></i>
											<span>Rubros</span>
		
										</a>
		
									</li>
									
								
								</ul>
						</li>';
		
				}
				if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){

					echo '<li class="treeview">
		
							<a href="#">
		
								<i class="fa fa-bank"></i>
								
								<span>Adquisiciones</span>
								
								<span class="pull-right-container">
								
									<i class="fa fa-angle-left pull-right"></i>
		
								</span>
		
							</a>
								<ul class="treeview-menu">
									<li>
		
										<a href="proveedores">
											
											<i class="fa fa-circle-o"></i>
											<span>Proveedores</span>
		
										</a>
		
									</li>
									<li>
		
									<a href="centro-costo">
										
										<i class="fa fa-circle-o"></i>
										<span>Centro de Costos</span>
	
									</a>
	
								</li>
		
									<li>
		
										<a href="orden-compra">
											
											<i class="fa fa-circle-o"></i>
											<span>Orden de Compra</span>
		
										</a>
		
									</li>
									
								
									<li>
		
										<a href="compras">
											
											<i class="fa fa-circle-o"></i>
											<span>Ingreso Compras</span>
		
										</a>
		
									</li>
		
									
		
								
								</ul>
						</li>';
		
				}
		

		}

		

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){

			echo '<li class="treeview">

					<a href="#">

						<i class="fa fa-shopping-cart"></i>
						
						<span>Inventario</span>
						
						<span class="pull-right-container">
						
							<i class="fa fa-angle-left pull-right"></i>

						</span>

					</a>
						<ul class="treeview-menu">
							<li>

								<a href="productos">
									
									<i class="fa fa-circle-o"></i>
									<span>Productos</span>

								</a>

							</li>

							<li>
		
								<a href="carga-inventario">
									
									<i class="fa fa-circle-o"></i>
									<span>Carga de Inventario</span>

								</a>

							</li>

							<li>
		
								<a href="salidas">
									
									<i class="fa fa-circle-o"></i>
									<span>Salida</span>

								</a>

							</li>

							<li>
		
								<a href="entradas">
									
									<i class="fa fa-circle-o"></i>
									<span>Entrada</span>

								</a>

							</li>

							<li>
		
								<a href="ajustes">
									
									<i class="fa fa-circle-o"></i>
									<span>Ajustes</span>

								</a>

							</li>

							<li>
		
								<a href="kardex">
									
									<i class="fa fa-circle-o"></i>
									<span>Kardex</span>

								</a>

							</li>

						
						</ul>
				</li>';

		}
		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){

			echo '<li class="treeview">

					<a href="#">

						<i class="fa fa-file"></i>
						
						<span>Orden de Trabajo</span>
						
						<span class="pull-right-container">
						
							<i class="fa fa-angle-left pull-right"></i>

						</span>

					</a>
						<ul class="treeview-menu">
						<li>
		
						<a href="personal">
							
							<i class="fa fa-circle-o"></i>
							<span>Personal Vestuario</span>

						</a>

						</li>

						<li>

						<a href="orden-vestuario">
							
							<i class="fa fa-circle-o"></i>
							<span>Orden de Vestuario</span>

						</a>

					</li>

							

						
						</ul>
				</li>';

		}
/* LISTA CLIENTES ENVIADA A LISTA VENTAS

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

			echo '<li>

				<a href="clientes">

					<i class="fa fa-users"></i>
					<span>Clientes</span>

				</a>

			</li>';

		}
		
*/

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

			echo '<li class="treeview">

				<a href="#">

					<i class="fa fa-users"></i>
					
					<span>Ventas</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					
				
					<li>

						<a href="clientes">
							
							<i class="fa fa-circle-o"></i>
							<span>Clientes</span>

						</a>

					</li>
					<li>

						<a href="ventas">
							
							<i class="fa fa-circle-o"></i>
							<span>Administrar Ventas</span>

						</a>

					</li>
					<li>

						<a href="cotizaciones">
							
							<i class="fa fa-circle-o"></i>
							<span>Admin. Cotizaciones</span>

						</a>

					</li>

					
					
					<li>

						<a href="cotizacion">
							
							<i class="fa fa-circle-o"></i>
							<span>Cotizacion Afecta</span>

						</a>

					</li>
					<li>

						<a href="cotizacion">
							
							<i class="fa fa-circle-o"></i>
							<span>Cotizacion Exenta</span>

						</a>

					</li>

					<li>

						<a href="venta-boleta">
							
							<i class="fa fa-circle-o"></i>
							<span>Venta con Boleta</span>

						</a>

					</li><li>

					<a href="venta-factura">
						
						<i class="fa fa-circle-o"></i>
						<span>Venta Factura Afecta</span>

					</a>

				</li>
				<li>

					<a href="venta-factura">
						
						<i class="fa fa-circle-o"></i>
						<span>Venta Factura Exenta</span>

					</a>

				</li>';
		

					if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

					echo '<li>

						<a href="reportes">
							
							<i class="fa fa-circle-o"></i>
							<span>Reporte de ventas</span>

						</a>

					</li>';

					}

				

				echo '</ul>

			</li>';

		}

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

			echo '<li class="treeview">

				<a href="#">

					<i class="fa fa-address-book"></i>
					
					<span>Comercial</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					
				
					<li>

						<a href="unidad-negocio">
							
							<i class="fa fa-circle-o"></i>
							<span>Unidad de Negocios</span>

						</a>

					</li>
					<li>

						<a href="tipo-cliente">
							
							<i class="fa fa-circle-o"></i>
							<span>Tipo Campaña</span>

						</a>

					</li>

					
					
					<li>

						<a href="tipo-producto">
							
							<i class="fa fa-circle-o"></i>
							<span>Tipo Producto</span>

						</a>

					</li>

					<li>

						<a href="#">
							
							<i class="fa fa-circle-o"></i>
							<span>Contacto</span>

						</a>

					</li>';

				echo '</ul>

			</li>';

		}
		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){

			echo '<li class="treeview">

					<a href="#">

						<i class="fa fa-money"></i>
						
						<span>Tesoreria</span>
						
						<span class="pull-right-container">
						
							<i class="fa fa-angle-left pull-right"></i>

						</span>

					</a>
						<ul class="treeview-menu">
							

						
						</ul>
				</li>';

		}


		?>

		</ul>

	 </section>

</aside>