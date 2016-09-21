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
<script type="text/javascript">

$(document).ready(function() {

	$("#enviar-btn").click(function() {

		//Obtenemos el valor del campo nombre
		var name = $("input#name").val();

		//Obtenemos el valor del campo password
		var password = $("input#password").val();

		//Construimos la variable que se guardará en el data del Ajax para pasar al archivo php que procesará los datos
		var dataString = 'name=' + name + '&password=' + password;

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
	<body>
<div id="register_form">
	<form name="register" method="post" action="">
		<label for="nombre">Nombre:</label>
		<input type="text" id="name" name="name" />
		<label class="error" for="name" id="name_error">Debe introducir su nombre.</label><br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" />
		<label class="error" for="pass" id="pass_error">Debe introducir su contrase&ntilde;a.</label><br><br>

		<button type="submit" value="enviar" id="enviar-btn" >Enviar</button>
	</form>
</div>
	</body>