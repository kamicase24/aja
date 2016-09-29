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
        <link rel="stylesheet" type="text/css" href="src/css/custom/hist_custom.css">
        <link rel="stylesheet" type="text/css" href="src/css/bootstrap.css">
        <link rel="stylesheet" href="src/css/jquery-ui.css">
        <script type="text/javascript" src="src/js/jquery.min.js"></script>
       <script type="text/javascript" src="src/js/sketch.js"></script>
        <script type="text/javascript" src="src/js/bootstrap.min.js"></script>
        <script src="src/js/jquery-ui.js"></script>
        <script src="src/js/odontoiut_hist.js"></script>
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