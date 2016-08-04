<?php
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

	//Definimos la clave a usar
	$clave2="sometimes we break the unbreakable, sometimes / can we ever have what we had then?
friendship unbreakable";
	//Instanciamos la clase Enigma3
	$codificador=new Enigma_rojas1($clave2);
	//Texto de prueba
	$texto="1234";
	//Llamamos al método cifrar
	$texto_codificado=$codificador->cifrar($texto);
	print $texto_codificado.'<br>';
	//Llamamos al método descifrar
	$texto_decodificado=$codificador->descifrar($texto_codificado);
	print $texto_decodificado.'<br>';
	//$texto_decodificado y $texto deben ser exactamente iguales
?>