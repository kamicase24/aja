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
		<!-- <link rel="stylesheet" type="text/css" href="src/css/custom/registro_custom.css"> -->
		<link rel="stylesheet" type="text/css" href="src/css/bootstrap/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<form class="form-horizontal" action="registro.php" method="post">
						<div class="form-group">
							<input type="text" name="nom_user" placeholder="Nombre" class="form-control">
						</div>

						<div class="form-group">
							<input type="text" name="ape_user" placeholder="Apellido" class="form-control">
						</div>

						<div class="form-group">
							<select name="tp_ced">
								<option value=" "> </option><option value="V-">V</option><option value="E-">E</option>
							</select>
							<input type="text" name="ced_user" placeholder="Cédula" class="form-control">
						</div>

						<div class="form-group">
							<input type="text" name="log_user" placeholder="Nombre de Usuario" class="form-control">
						</div>

						<div class="form-group">
							<input type="password" name="pw_user" placeholder="Contraseña" class="form-control">
						</div>

						<div class="form-group">
							<select class="form-control" name="level">
								<option value=" "> </option>
								<?php
									$odontolib = new Odontoiut2;
									$odontolib ->lista("levels",0, 2);
								?>
							</select>
						</div>

						<div class="form-group">
							<select class="form-control" name="scr_qutn">
								<option value=" "> </option>
								<option value="Apellido de soltera de su madre?">Apellido de soltero de la Madre?</option>
								<option value="Mejor amigo de la infancia?">Mejor amigo de la infancia?</option>
								<option value="Comida favorita?">Comida favorita?</option>
								<option value="Pelicula favorita?">Pelicula favorita?</option>
								<option value="Ciudad de nacimiento de su padre?">Ciudad de nacimiento de su padre?</option>
								<option value="Nombre de la primera mascota?">Nombre de la primera mascota?</option>
							</select>
						</div>

						<div class="form-group">
							<input type="text" name="scr_anw" class="form-control" placeholder="Respuesta Secreta">
						</div>

						<div>
							<input class="button" type="submit" name="bt_send" value="Registrar">
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>

<?php
	
	if(isset($_POST['bt_send']))
	{
		$clave2="sometimes we break the unbreakable, sometimes. can we ever have what we had then? a friendship unbreakable";
		$enigma = new Enigma_rojas1($clave2);

		$nom_user = $_POST['nom_user']; $ape_user = $_POST['ape_user'];
		$ced_user = $_POST['tp_ced'].$_POST['ced_user']; $log_user = $_POST['log_user'];

		$pw_user = $_POST['pw_user']; $pw_cryp= $enigma->cifrar($pw_user);

		$level = $_POST['level'];

		$scr_qutn = $_POST['scr_qutn'];	$qutn_cryp = $enigma->cifrar($scr_qutn);
		$scr_anw = $_POST['scr_anw'];	$anw_cryp = $enigma->cifrar($scr_anw);

		$timezone = date_default_timezone_set('America/Santo_Domingo');
		$crt_date = date('o-m-j')." ".date('g:i:s');

		$cmd = pg_query($con, "INSERT INTO users(nom_user, ape_user, ced_user, log_user, pw_user, level, scr_qutn, scr_anw) VALUES('$nom_user','$ape_user','$ced_user','$log_user','$pw_cryp', $level, '$qutn_cryp', '$anw_cryp')");

		$odontolib = new Odontoiut2(); 
		print $odontolib->redireccion("index.php","Registro exitoso");
	}

?>