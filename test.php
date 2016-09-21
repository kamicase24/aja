<?php
include('lib.php')
?>
<html lang="es">
<head>
	<title>
		Odonto-IUT
	</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="src/css/custom/hist_custom.css">

	<link rel="stylesheet" type="text/css" href="src/css/bootstrap.css">
	<!-- <link rel="stylesheet" type="text/css" href="src/css/bootstrap-datetimepicker.min.css"> -->
	<!-- <script type="text/javascript" src="src/js/bootstrap.min.js"></script> -->
	<script type="text/javascript" src="src/js/jquery.min.js"></script>
	<script type="text/javascript" src="src/js/sketch.js"></script>
	<!-- <script type="text/javascript" src="src/js/bootstrap-datetimepicker.min.js"></script> -->
<script type="text/javascript">

$(document).ready(function() {

	$("#enviar-btn").click(function() {

		//Obtenemos el valor del campo nombre
		var uno = $("input#1").val();

		//Obtenemos el valor del campo password
		var tres = $("input#3").val();

		//Construimos la variable que se guardará en el data del 
		//Ajax para pasar al archivo php que procesará los datos
		var dataString = '1=' + uno + '&3=' + tres;

		$.ajax({
			type: "POST",
			url: "1.php",
			data: dataString,
		});
		return false;
	});
});
</script>
</head>
<body bgcolor="cian" id="mybody">
	<h1>hello word</h1>

	<form action="test.php" method="POST" id="form1">
		<input type="text" name="1" id="1">
		<canvas id="colors_sketch" width="800" height="300" style="background: url(src/img/odontograma.png) no-repeat center center;"></canvas>
		<script type="text/javascript">
			$(function() {
				$('#colors_sketch').sketch();
			});
		</script>
		<br>
		<a class="btn btn-default" href="#colors_sketch" data-download="png">Guardar</a>
		<input name="submit" type="submit" value="Enviar" id="enviar-btn"/>
	</form>
</body>
</html>
