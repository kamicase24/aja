<!DOCTYPE html>
<html lang="es">
	<head>
		<title>
			Odonto-IUT
		</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="src/css/custom/index_custom.css">
		<link rel="stylesheet" type="text/css" href="src/css/bootstrap.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="pr-wrap">
						<div class="pass-reset">
							<label>
								Enter the email you signed up with</label>
							<input type="email" placeholder="Email" />
							<input type="submit" value="Submit" class="pass-reset-submit btn btn-success btn-sm" />
						</div>
					</div>
					<div class="wrap">
						<p class="form-title">
							Ingresa
						</p>
						<form action="login.php" method="post" class="login">
							<input type="text" placeholder="Usuario" name="log_user"/>
							<input type="password" placeholder="Password" name="pw_user" />
							<input type="submit" value="Entrar" name="bt_in" class="btn btn-success btn-sm" />
							<div class="remember-forgot">
								<div class="row">
<!-- 									<div class="col-md-5">
										<div class="checkbox">
											<label>
												<input type="checkbox" />
												Mantener Sesión
											</label>
										</div>
									</div> -->
<!-- 									<div class="col-md-7 forgot-pass-content">
										<a href="registro.php" class="forgot-pass">Registrar Usuario</a>
									</div> -->
								</div>
							</div>
							<div class="remember-forgot">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>