<?php
class Database_pro{
	function conecta(){
	$con = pg_pconnect("host=localhost port=5432 dbname=odontoiut2 password=1234 user=jesusrojas");
	return $con;
	}
}


class Enigma_rojas1{
	private $clave;
		function __construct($clave){
		$this->clave=$clave;
	}

	function cifrar($texto){

		$resultado='';
		for($i=0;$i<strlen($texto);$i++){

		$caracter=substr($texto, $i,1);
		$caracterClave=substr($this->clave, ($i%strlen($this->clave))-1,1);
		$caracter=chr(ord($caracter)+ord($caracterClave));
		$resultado.=$caracter;
		}
		return base64_encode($resultado);
	}

	function descifrar($texto){
		$resultado='';
		$texto=base64_decode($texto);
		for($i=0;$i<strlen($texto);$i++){

		$caracter=substr($texto, $i,1);
		$caracterClave=substr($this->clave, ($i%strlen($this->clave))-1,1);
		$caracter=chr(ord($caracter)-ord($caracterClave));
		$resultado.=$caracter;
		}
		return $resultado;
	}
}

class Odontoiut2{
	function redireccion($page,$alert){
		$regreso = "<script type='text/javascript'>	window.alert('".$alert."'); window.location='".$page."';	</script>";
		return $regreso;
	}

	function lista($tabla,int $a,int $b){
		$db = new Database_pro();	$con = $db->conecta();

		$cmd = pg_query($con,"select * from $tabla");
		while ($var = pg_fetch_row($cmd))
		{
			print "<option value='".$var[$a]."'>".$var[$b]."</option>";
		}
	}

	function fecha_output($fecha){
		return date_format(date_create($fecha),'d-m-Y');
	}

	function contraindicaciones(){
		$db = new Database_pro; $con = $db->conecta(); $query = pg_query($con,"select * from contras");
		$i = 0;
		while ($var = pg_fetch_row($query)) {
			$i++;
			print '<label class="checkbox-inline">';
			print '<input type="checkbox" value="'.$var[1].'" name=""/>'.$var[1];
			print '</label>';
			if($i==4){ print '<br>'; $i = 0;}
		}
	}
}

?>