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
?>