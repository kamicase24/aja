<?php
include('lib.php')
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link href="favicon.ico" rel="shortcut icon">
		<link rel="stylesheet" href="assets/css/animate.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/nexus.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/responsive.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/custom.css" rel="stylesheet">
		<title>
			Odonto-IUT
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="src/css/jquery-ui.css">
		<link rel="stylesheet" type="text/css" href="src/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="src/css/custom/inv_custom.css">
		<script src="src/js/jquery.min.js"></script>
		<script src="src/js/bootstrap.min.js"></script>
		<script src="src/js/odontoiut.js"></script>
		<script src="src/js/jquery-ui.js"></script>
	</head>
<body>
	<div id="header">
		<div class="container">
			<div class="row">
				<div class="logo">
					<a href="home.html" title="">
						<img src="assets/img/logo.png" alt="Logo" />
					</a>
				</div>
			</div>
		</div>
	</div>
	<div id="hornav" class="container no-padding">
		<div class="row">
			<div class="col-md-12 no-padding">
				<div class="text-center visible-lg">
					<ul id="hornavmenu" class="nav navbar-nav">
						<li>
							<a href="home.html" class="fa-home">Home</a>
						</li>
						<li>
							<span class="fa-gears">Pacientes</span>
							<ul>
								<li>
									<a href="registro.php">Registro</a>
								</li>
								<li>
									<a href="features-accordions-tabs.html">Listado</a>
								</li>
							</ul>
						</li>
						<li>
							<span class="fa-copy">Doctores</span>
							<ul>
								<li>
									<a href="pages-about-us.html">Registro</a>
								</li>
								<li>
									<a href="pages-services.html">Listado</a>
								</li>
							</ul>
						</li>
						<li>
							<span class="fa-th">Inventario</span>
							<ul>
								<li>
									<a href="portfolio-2-column.html"> Agregar producto</a>
								</li>
							</ul>
						</li>
						<li>
							<span class="fa-font">Reportes</span>
							<ul>
								<li>
									<a href="blog-list.html">Generar reportes</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="contact.html" class="fa-comment">Recipes</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- MODAL AGREGAR PRODUCTO -->
	<div id="nueva_entrada_modal" class="modal">
		<div class="modal-content">
			<div class="modal-header">
				<span id="cerrar_nuv_ent" class="close">×</span>
				<h2>Nuevo producto</h2>
			</div>
			<div class="modal-body">
					<input type="text" name="nom_pro" id="nom_pro" placeholder="Producto" class="form-control" required>
					<input type="text" name="det_pro" id="det_pro" placeholder="Detalle" class="form-control" required>
					<select name="med" id="med" class="form-control" required>
						<option value="1">Ml.</option>
					</select>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary btn-sm" onclick="agregar_submit()">Nuevo</button>
			</div>
		</div>
	</div>

	<!-- MODAL RECEPCION -->
	<div id="rec_pro_modal" class="modal">
		<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<span onclick="cerrar_recibir()" class="close">×</span>
				<h2>Recibir un produco</h2>
			</div>
			<div id="rec_pro_body" class="modal-body form-inline">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary btn-sm" onclick="recibir()">Recibir</button>
			</div>
		</div>
		</div>
	</div>

	<!-- MODAL CONSUMO -->
	<div id="con_pro_modal" class="modal">
		<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<span onclick="cerrar_consumo()" class="close">×</span>
				<h2>Consumir un producto</h2>
			</div>
			<div id="con_pro_body" class="modal-body form-inline">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary btn-sm" onclick="consumir()">Consumir</button>
			</div>
		</div>
		</div>
	</div>

	<div class="container">
		<div class="col-md-12">
			<h3 id="id_pro">Inventario</h3>
		</div>

		<div class="col-md-12 prod_list">
			<table id="tabla1" class="table table-bordered">
				<thead>
					<th>#</th>
					<th>Producto</th>
					<th>Medida</th>
					<th>Existencia</th>
					<th></th>
				</thead>
				<?php
				$db = new Database_pro; $con = $db->conecta();
				$query = pg_query($con, "select inventario.id_inv,producto.id_pro,producto.nom_pro,	medida.med, inventario.exis
										from producto, medida,inventario
										where inventario.id_pro = producto.id_pro order by producto.id_pro");
				if (pg_num_rows($query)==0) {
					?>
					<tr>
						<td colspan="5" class="text-center">
							No hay nada que mostrar
							<button type="button" class="btn btn-primary btn-sm" onclick="" id="nueva_entrada">
							<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
							</button>
						</td>
					</tr>
					<?php
				}
				else{
					while ($var = pg_fetch_row($query)) {
						?>
						<tbody>
							<td><?php print $var[0]; ?></td>
							<td><?php print $var[2]; ?></td>
							<td><?php print $var[3]; ?></td>
							<td><?php print $var[4]; ?></td>
							<td>
							<button type="button" id="abrir_modal_rec" class="btn btn-primary" onclick="abrir_recibir(<?php print $var[0].','.$var[1]; ?>)">
							<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
							</button>
							<button type="button" id="cerrar_modal_rec" class="btn btn-danger btn-sm" onclick="abrir_consumo(<?php print $var[0].','.$var[1]; ?>)">
							<span class="glyphicon glyphicon-minus"></span> 
							</button>
							</td>
						</tbody>
						<?php
					}
				} ?>
			</table>
		</div>
		<div id="boom"></div>
		<script>
			var rec_pro = document.getElementById('rec_pro_modal');
			var con_pro = document.getElementById('con_pro_modal');
			$(document).ready(function()
			{
				$( function() {
    				$( "#fh_rec" ).datepicker({
    	  			changeMonth: true,
					changeYear: true
					});
				});
			});
		</script>
	</div>
</body>