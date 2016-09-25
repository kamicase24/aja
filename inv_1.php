<?php
include('lib.php')
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>
			Odonto-IUT
		</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="src/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="src/css/custom/inv_custom.css">
		<script type="text/javascript" src="src/js/jquery.min.js"></script>
		<script type="text/javascript" src="src/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="src/js/odontoiut.js"></script>
	</head>
<body>
	<!-- navbar -->
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Odontoiut 2.0</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Tablero</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Historias<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">Page 1-1</a></li>
						<li><a href="#">Page 1-2</a></li>
						<li><a href="#">Page 1-3</a></li>
					</ul>
				</li>
				<li><a href="#">Citas</a></li>
				<li><a href="#">Otras cosas</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1
					<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">Page 1-1</a></li>
						<li><a href="#">Page 1-2</a></li>
						<li><a href="#">Page 1-3</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>

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
				<button type="submit" class="btn btn-primary form-control btn-sm" onclick="modificar_submit()">Guardar Cambios</button>
			</div>
			</form>
		</div>
	</div>

	<!-- MODAL ELIMINAR -->
	<div id="elimitar-modal" class="modal">
		<form>
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
		</form>
	</div>

	<!-- MODAL AGREGAR PRODUCTO -->
	<div id="agregar-modal" class="modal">
		<div class="modal-content">
			<form action="inv_1.php" method="post" class="form-inline">
			<div class="modal-header">
				<span onclick="cerrar_agregar()" class="close">×</span>
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
			</form>
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
							<button type="button" class="btn btn-primary" onclick="modificar('<?php print $var[0]; ?>')" id="btn-modal-modificar">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modificar
							</button>
							<button type="button" class="btn btn-danger btn-sm"	onclick="eliminar('<?php print $var[0]; ?>')">
							<span class="glyphicon glyphicon-trash"></span>
							</button>
							</td>
						</tbody>
						<?php
					}
				?>
			</table>
		</div>
			<script>
				var modal_agregar = document.getElementById("agregar-modal");
				var modal = document.getElementById("modificar-modal");
				var modal_eliminar = document.getElementById("elimitar-modal");
			</script>
	</div>
</body>