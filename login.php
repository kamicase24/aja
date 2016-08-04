<?php
include('lib.php');

session_start();
if ((isset($_POST['log_user'])) && (isset($_POST['pw_user'])))
{	
	$clave2="sometimes we break the unbreakable, sometimes. can we ever have what we had then? a friendship unbreakable";
	$enigma=new Enigma_rojas1($clave2);

	$_SESSION['log_user'] = $_POST["log_user"];	$_SESSION['pw_user'] = $enigma->cifrar($_POST["pw_user"]);
	
	$timezone = date_default_timezone_set('America/Santo_Domingo');
	$_SESSION['f_act'] = date('o-m-j');	$_SESSION['h_act'] = date('g:i:s');	$_SESSION['tp_audi'] = 5; 
	
	$db = new Database_pro(); $con = $db->conecta();

	$query = pg_query($con,"select * from users where log_user = '".$_SESSION['log_user']."' and pw_user = '".$_SESSION['pw_user']."'");
	if (pg_num_rows($query)>0)
	{	
		while($var = pg_fetch_row($query))
		{
			$_SESSION['id_user']  = $var[0];	$_SESSION['nom_user'] = $var[1]; 	$_SESSION['ape_user'] = $var[2];
			$_SESSION['ced_user'] = $var[3];	$_SESSION['level'] 	  = $var[6];
		}
		/*AUDITORIAS DE LOG-IN O ACCESO AL SISTEMA*/
		$dt_audi="El usuario ".$_SESSION['nom_user']." ".$_SESSION['ape_user']." de nivel ".$_SESSION['level']." a iniciado sesión el: ".$_SESSION['f_act']." a las ".$_SESSION['h_act'].".";
		$sql="INSERT INTO auditoria (tp_audi,id_user,dt_audi,f_audi,h_audi) 
			  VALUES('".$_SESSION['tp_audi']."',".$_SESSION['id_user'].",'$dt_audi','".$_SESSION['f_act']."','".$_SESSION['h_act']."')";
		$resul=pg_query($con,$sql);
	}
	else
	{
		$odontolib = new Odontoiut2(); 
		print $odontolib->redireccion("index.php","Datos Incorrectos");
	}
}
?>