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
		<link rel="stylesheet" type="text/css" href="src/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="src/css/custom/inv_custom.css">
		<script type="text/javascript" src="src/js/jquery.min.js"></script>
		<script type="text/javascript" src="src/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="src/js/odontoiut.js"></script>
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

	<!-- MODAL MODIFICAR PRODUCTO -->
	<div id="modificar-modal" class="modal">
		<div class="modal-content">
			<form id="modificar-modal-form" method="post" action="inv_1.php" class="form-inline">
			<div class="modal-header">
				<span onclick="cerrar_modificar()" class="close">×</span>
				<h2>Modificar Producto</h2>
			</div>
			<div class="modal-body" id="modificar-modal-body">				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary form-control btn-sm" onclick="modificar_submit()">Guardar Cambios</button>
			</div>
			</form>
		</div>
	</div>

	<!-- MODAL ELIMINAR -->
	<div id="elimitar-modal" class="modal">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header" id="eliminar-modal-body">
				<span onclick="cerrar_eliminar()" class="close">×</span>
				<h3>Esta seguro?</h3>
			</div>
				<p class="lead text-muted text-center" style="display: block;margin:10px">Esta acción eliminará de forma permanente el registro. Desea continuar?</p>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm" onclick="cerrar_eliminar()">Cancelar</button>
				<button type="button" class="btn btn-primary btn-sm" onclick="eliminar_aceptar()">Aceptar</button>
			</div>
			</div>
		</div>
	</div>

	<!-- MODAL AGREGAR PRODUCTO -->
	<div id="agregar-modal" class="modal">
		<div class="modal-content">
			<div class="modal-header">
				<span onclick="cerrar_agregar()" class="close">×</span>
				<h2>Nuevo producto</h2>
			</div>
			<div class="modal-body form-inline">
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

	<div class="container">
		<div class="col-md-6">
			<h3 id="id_pro">Lista de Productos</h3>
		</div>

		<!-- boton agregar -->
		<div class="col-md-6">
			<h3 class="text-right">
			<button
				onclick="agregar()"
				id="btn-modal-agregar"
				type="button"
				class="btn btn-default btn-sm">
				<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar
			</button>
			</h3>
		</div>

		<div class="col-md-12 prod_list">
			<table id="tabla1" class="table table-bordered">
				<thead>
					<th>#</th>
					<th>Producto</th>
					<th>Detalle</th>
					<th>Medida</th>
					<th></th>
				</thead>
				<?php
					// Muestra
					// $odontolib = new Odontoiut2;
					// $odontolib -> producto();
					$db = new Database_pro; $con = $db->conecta();
					$query = pg_query($con, "select id_pro, nom_pro, det_pro, medida.med from producto, medida order by id_pro");
					while ($var = pg_fetch_row($query)) {
						?>
						<tbody>
							<td><?php print $var[0]; ?></td>
							<td><?php print $var[1]; ?></td>
							<td><?php print $var[2]; ?></td>
							<td><?php print $var[3]; ?></td>
							<td>
							<button type="button" class="btn btn-primary" onclick="modificar(<?php print $var[0]; ?>)" id="btn-modal-modificar">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modificar
							</button>
							<button type="button" class="btn btn-danger btn-sm" onclick="eliminar(<?php print $var[0]; ?>)">
							<span class="glyphicon glyphicon-trash"></span>
							</button>
							</td>
						</tbody>
						<?php
					}
				?>
			</table>
		</div>
			<script id="boom">
				var modal_agregar = document.getElementById("agregar-modal");
				var modal = document.getElementById("modificar-modal");
				var modal_eliminar = document.getElementById("elimitar-modal");
			</script>
	</div>
</body>