<?php
include('lib.php');
$db = new Database_pro; $con = $db->conecta();
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if ($action == 'ajax') {
	$puntero = (isset($_REQUEST['puntero']) && !empty($_REQUEST['puntero']))?$_REQUEST['puntero']:1;
	$query = pg_query($con, "select nom_pro, det_pro, producto.med, medida.med from producto, medida where id_pro=$puntero and producto.med = medida.id_med");
	while ($var = pg_fetch_row($query)) {
		$nom_pro = $var[0]; $det_pro = $var[1];
		$id_med  = $var[2]; $med     = $var[3];
	}
	print "<input type='text' value='".$puntero."' hidden name='id_pro' id='id_pro'>";
	print "<div class='form-group'>";
	print "<b>Producto</b> ";
	print "<input type='text' value='".$nom_pro."' name='nom_pro' id='nom_pro' class='form-control' required>";
	print "</div>";
	print "<div class='form-group'>";
	print "<b>Detalle</b> ";
	print "<input type='text' value='".$det_pro."' name='det_pro' id='det_pro' class='form-control' required>";
	print "</div>";
	print "<div class='form-group'>";
	print "<b>Medida</b> ";
	print "<select name='med' id='med' class='form-control'>
		    	<option value='".$id_med."'>'".$med."'</option>
		   </select> ";
	print "</div>";
}

if ($action == 'eliminar') {
	$puntero = (isset($_REQUEST['puntero']) && !empty($_REQUEST['puntero']))?$_REQUEST['puntero']:1;
	$query = pg_query($con,"delete from producto where id_pro=$puntero");
}

if ($action == 'modificar') {
	$id_pro = (isset($_REQUEST['id_pro']) && !empty($_REQUEST['id_pro']))?$_REQUEST['id_pro']:1;
	$nom_pro = (isset($_REQUEST['nom_pro']) && !empty($_REQUEST['nom_pro']))?$_REQUEST['nom_pro']:1;
	$det_pro = (isset($_REQUEST['det_pro']) && !empty($_REQUEST['det_pro']))?$_REQUEST['det_pro']:1;
	$id_med = (isset($_REQUEST['id_med']) && !empty($_REQUEST['id_med']))?$_REQUEST['id_med']:1;
	$query = pg_query($con,"update producto SET nom_pro = '$nom_pro', det_pro = '$det_pro', med = $id_med where id_pro = $id_pro");
}

if ($action == 'agregar') {
	$nom_pro = (isset($_REQUEST['nom_pro']) && !empty($_REQUEST['nom_pro']))?$_REQUEST['nom_pro']:1;
	$det_pro = (isset($_REQUEST['det_pro']) && !empty($_REQUEST['det_pro']))?$_REQUEST['det_pro']:1;
	$med     = (isset($_REQUEST['med']) && !empty($_REQUEST['med']))?$_REQUEST['med']:1;

	$query = pg_query($con, "WITH doble AS 
							(insert into producto(nom_pro,det_pro,med) 
							values ('$nom_pro', '$det_pro', $med) returning id_pro) 
							insert into inventario(id_pro) 
							values ((select id_pro from doble))");
}

if ($action == 'pac_hist') {
	$nom_pac = (isset($_REQUEST['nom_pac']) && !empty($_REQUEST['nom_pac']))?$_REQUEST['nom_pac']:1;
	$ape_pac = (isset($_REQUEST['ape_pac']) && !empty($_REQUEST['ape_pac']))?$_REQUEST['ape_pac']:1;
	$tp_ced =  (isset($_REQUEST['tp_ced']) && !empty($_REQUEST['tp_ced']))?$_REQUEST['tp_ced']:1;
	$ced_pac = (isset($_REQUEST['ced_pac']) && !empty($_REQUEST['ced_pac']))?$_REQUEST['ced_pac']:1;
	$ced = $tp_ced."-".$ced_pac;
	$fh_nac =  (isset($_REQUEST['fh_nac']) && !empty($_REQUEST['fh_nac']))?$_REQUEST['fh_nac']:1;
	$edad =    (isset($_REQUEST['edad']) && !empty($_REQUEST['edad']))?$_REQUEST['edad']:1;
	$gen = 	  (isset($_REQUEST['gen']) && !empty($_REQUEST['gen']))?$_REQUEST['gen']:1;
	$tlf =     (isset($_REQUEST['tlf']) && !empty($_REQUEST['tlf']))?$_REQUEST['tlf']:1;
	$direcc =  (isset($_REQUEST['direcc']) && !empty($_REQUEST['direcc']))?$_REQUEST['direcc']:1;
	$esp =     (isset($_REQUEST['esp']) && !empty($_REQUEST['esp']))?$_REQUEST['esp']:1;
	$tra =     (isset($_REQUEST['tra']) && !empty($_REQUEST['tra']))?$_REQUEST['tra']:1;

	$fh_his = date('o-m-j');
	$sql1="WITH doble AS
		(insert into paciente(nom_pac, ape_pac, ced_pac, fh_nac, direcc, edad, gen, tlf, esp, tra)
		values('$nom_pac','$ape_pac','$ced',to_date('$fh_nac','dd-mm-yyyy'),'$direcc',$edad,'$gen','$tlf',$esp,'$tra')
		returning id_pac) insert into historias (id_pac, fh_his) 
						values((select id_pac from doble), to_date('$fh_his', 'dd-mm-yyyy')) returning id_his,id_pac";
	// print $sql1;
	$query = pg_query($con,$sql1);
	while ($var = pg_fetch_row($query)) {
		print "<h3 id='hist_name'>HIST-".$var[0]."-".$var[1]."</h3>";
		print "<input type='text' id='id_hist' hidden value='".$var[0]."' disabled>";
		print "<input type='text' id='id_pac' hidden value='".$var[1]."' disabled>";
	}
}

if ($action == "tratamiento") {
	$fh_trat = (isset($_REQUEST['fh_trat']) && !empty($_REQUEST['fh_trat']))?$_REQUEST['fh_trat']:1;
	$tit_trat = (isset($_REQUEST['tit_trat']) && !empty($_REQUEST['tit_trat']))?$_REQUEST['tit_trat']:1;
	$trat = (isset($_REQUEST['trat']) && !empty($_REQUEST['trat']))?$_REQUEST['trat']:1;
	$id_hist = (isset($_REQUEST['id_hist']) && !empty($_REQUEST['id_hist']))?$_REQUEST['id_hist']:1;
	$id_pac = (isset($_REQUEST['id_pac']) && !empty($_REQUEST['id_pac']))?$_REQUEST['id_pac']:1;
	
	$sql = "insert into tratamiento(titulo, detalles, fecha, id_his)
			values('$tit_trat', '$trat', to_date('$fh_trat', 'dd-mm-yyyy'), $id_hist)";
	$query = pg_query($con,$sql);
	print $query;
}


if ($action == 'proceso') {
	$puntero = (isset($_REQUEST['puntero']) && !empty($_REQUEST['puntero']))?$_REQUEST['puntero']:1;
	$id_pro = (isset($_REQUEST['id_pro']) && !empty($_REQUEST['id_pro']))?$_REQUEST['id_pro']:1;
	print 	"<script>
				var rec_pro = document.getElementById('rec_pro_modal');
				$(document).ready(function()
				{
					$( function() {
	    				$( '#fh_pro' ).datepicker({
	    	  			changeMonth: true,
						changeYear: true
						});
					});
				});
			</script>";
	print "<input type='text' hidden value=".$puntero." id='inv_line'>";
	print "<input type='text' hidden value=".$id_pro." id='id_pro'>";
	print "<input type='number' name='cant' id='cant' placeholder='Cantidad' onkeyUp='return ValNumero(this);' class='form-control' required>";
	print "<input type='date' name='fh_pro' id='fh_pro' placeholder='Fecha del movimiento' class='form-control' required>";		
}

if ($action == 'recepcion') {
	$id_inv = (isset($_REQUEST['inv_line']) && !empty($_REQUEST['inv_line']))?$_REQUEST['inv_line']:1;
	$id_pro = (isset($_REQUEST['pro']) && !empty($_REQUEST['pro']))?$_REQUEST['pro']:1;
	$cant_rec = (isset($_REQUEST['cant_rec']) && !empty($_REQUEST['cant_rec']))?$_REQUEST['cant_rec']:1;
	$fh_rec = (isset($_REQUEST['fh_rec']) && !empty($_REQUEST['fh_rec']))?$_REQUEST['fh_rec']:1;

	$sql = "WITH doble AS 
			(INSERT INTO recepcion(fh_rec, cant_rec, id_pro)
			VALUES (to_date('$fh_rec','dd-mm-yyyy'),$cant_rec,$id_pro) returning cant_rec)
			UPDATE inventario 
			SET exis = (SELECT exis 
						FROM inventario
						WHERE id_inv = $id_inv)+(SELECT cant_rec FROM doble) 
			WHERE id_inv = $id_inv";
	$query = pg_query($con,$sql);
}

if ($action == 'consumir') {
	$id_inv = (isset($_REQUEST['inv_line']) && !empty($_REQUEST['inv_line']))?$_REQUEST['inv_line']:1;
	$id_pro = (isset($_REQUEST['pro']) && !empty($_REQUEST['pro']))?$_REQUEST['pro']:1;
	$cant_con = (isset($_REQUEST['cant_con']) && !empty($_REQUEST['cant_con']))?$_REQUEST['cant_con']:1;
	$fh_con = (isset($_REQUEST['fh_con']) && !empty($_REQUEST['fh_con']))?$_REQUEST['fh_con']:1;

	$sql = "WITH doble AS 
			(INSERT INTO consumo(fh_con, cant_con, id_pro)
			VALUES (to_date('$fh_con','dd-mm-yyyy'),$cant_con,$id_pro) returning cant_con)
			UPDATE inventario 
			SET exis = (SELECT exis 
						FROM inventario
						WHERE id_inv = $id_inv)-(SELECT cant_con FROM doble) 
			WHERE id_inv = $id_inv";
	$query = pg_query($con,$sql);
}

if ($action == 'odonto') {

	define('UPLOAD_DIR', 'src/odontograma/');
	$odonto = (isset($_REQUEST['b64']) && !empty($_REQUEST['b64']))?$_REQUEST['b64']:1;
	$id_hist = (isset($_REQUEST['id_hist']) && !empty($_REQUEST['id_hist']))?$_REQUEST['id_hist']:1;
	$id_pac = (isset($_REQUEST['id_pac']) && !empty($_REQUEST['id_pac']))?$_REQUEST['id_pac']:1;
	$hist_name =  "HIST-".$id_hist."-".$id_pac;
	$img = str_replace('data:image/png;base64,', '', $odonto);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$file = UPLOAD_DIR . $hist_name . '.png';
	$success = file_put_contents($file, $data);
	print $success ? $file : 'No es posible guardar el Odontograma.';


}



















	// $dir = 'src/odontograma/';
	// $fichero = scandir($dir);
	// print_r($fichero);
	// print "<img src='src/odontograma/".$fichero[3]."'>";
// $sql = "WITH doble AS 
// (INSERT INTO producto(nom_pro,det_pro,med) 
// VALUES ('$nom_pro','$det_pro',$med) returning id_pro )
// INSERT INTO inventario(id_pro, exis)
// VALUES ((select id_pro from doble), $exis)";

// $sql = "WITH doble AS 
// (INSERT INTO producto(nom_pro,det_pro,med) 
// VALUES ('$nom_pro','$det_pro',$med) returning id_pro )
// INSERT INTO inventario(id_pro, exis)
// VALUES ((select id_pro from doble), $exis)";

// $sql = "WITH doble AS
// 		(DELETE FROM inventario WHERE id_pro = $id_pro returning id_pro)
// 		DELETE FROM producto WHERE id_pro = (select id_pro from doble)";
?>