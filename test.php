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
</head>
<body bgcolor="cian" id="mybody">
	<h1>hello word</h1>

	<form action="test.php" method="POST" id="form1">
		<input type="text" name="1">
		<canvas id="colors_sketch" width="800" height="300" style="background: url(src/img/odontograma.png) no-repeat center center;"></canvas>
		<script type="text/javascript">
			$(function() {
				$('#colors_sketch').sketch();
			});
		</script>
		<br>
		<a class="btn btn-default" href="#colors_sketch" data-download="png">Guardar</a>
		<input type="submit" name="2" class="btn btn-default">
	</form>
	<?php
	if(isset($_POST['2'])){
		print $_POST['1'];
		print $_POST['3'];
	}
			// $pag_test = file_get_contents('http://localhost:8081/odontoiut2/hist_1.php', NULL, NULL, 6600, 10000);
			// $pag_test = file('http://localhost:8081/odontoiut2/hist_1.php');
			// foreach ($pag_test as $linea => $otra_linea) {
			// 	echo "Línea #<b>{$linea}</b> : " . htmlspecialchars($otra_linea) . "<br />\n";
			// }
	?>
</body>
</html>
