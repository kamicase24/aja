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
		<script type="text/javascript" src="src/js/jquery.min.js"></script>
		<script type="text/javascript" src="src/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			function eliminar($var){
				var retorno;
				var msg = confirm("Desea eliminar este producto?");
				if (msg == true) {
					retorno = "eliminado";
				}
				else{
					retorno = "no eliminado";
				}
				document.getElementById("result").innerHTML = retorno+$var;
			}
		</script>
	</head>
<body>
	<nav class="navbar navbar-default line">
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
	<div class="container">
		<div class="row">
			<h4>Nuevo Producto</h4>
			<form action="inv_1.php" method="post" class="form-inline">
				<input type="text" name="nom_pro" placeholder="Producto" class="form-control">
				<input type="text" name="det_pro" placeholder="Detalle" class="form-control">
				<select name="med" class="form-control">
					<option value="1">Ml.</option>
				</select>
				<input type="text" name="exis" placeholder="Existencia" class="form-control" value="1">
				<input type="submit" name="bt_pro" class="btn btn-success form-control" value="Nuevo">
			</form>
		</div>
		<br>
		<div class="row">
			<h4>Lista de Productos</h4>
			<div class="col-md-10">
			<table class="table table-condensed table-hover table-bordered">
				<tr>
					<th>#</th>
					<th>Prodcuto</th>
					<th>Existencia</th>
					<th></th>
				</tr>
				<?php
					$odontolib = new Odontoiut2;
					$odontolib -> inventario();
				?>
			</table>
			</div>
		</div>
		<div class="row">
			<p id="result"></p>
			<?php
				if (isset($_POST['bt_pro'])) {

					$nom_pro = $_POST['nom_pro']; $det_pro = $_POST['det_pro'];
					$med 	 = $_POST['med'];	  $exis    = $_POST['exis'];

					$db = new Database_pro; $con = $db->conecta();

					$sql = "WITH doble AS 
					(INSERT INTO producto(nom_pro,det_pro,med) 
					VALUES ('$nom_pro','$det_pro',$med) returning id_pro )
					INSERT INTO inventario(id_pro, exis)
					VALUES ((select id_pro from doble), $exis)";
					// print $sql;
					$query = pg_query($con, $sql);
					print $query;
				}
			?>
		</div>
	</div>
</body>