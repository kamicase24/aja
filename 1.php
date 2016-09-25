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
	// print "<br>".$id_pro."<br>".$nom_pro."<br>".$det_pro."<br>".$id_med;
	$query = pg_query($con,"update producto SET nom_pro = '$nom_pro', det_pro = '$det_pro', med = $id_med where id_pro = $id_pro");
	// print $query;
}

if ($action == 'agregar') {
	$nom_pro = (isset($_REQUEST['nom_pro']) && !empty($_REQUEST['nom_pro']))?$_REQUEST['nom_pro']:1;
	$det_pro = (isset($_REQUEST['det_pro']) && !empty($_REQUEST['det_pro']))?$_REQUEST['det_pro']:1;
	$med     = (isset($_REQUEST['med']) && !empty($_REQUEST['med']))?$_REQUEST['med']:1;

	$query = pg_query($con, "insert into producto(nom_pro,det_pro,med) values ('$nom_pro', '$det_pro', $med)");
	
}

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