function eliminar(puntero){
	modal_eliminar.style.display = "block";
	h_input = document.createElement("input");
	h_input.setAttribute("type","text");
	h_input.setAttribute("value",puntero);
	h_input.setAttribute("hidden",true);
	h_input.setAttribute("id","puntero");
	document.getElementById("eliminar-modal-body").appendChild(h_input);
}
function eliminar_aceptar(){
		var puntero = $("input#puntero").val();
		var parametros = {"action":"eliminar","puntero":puntero};
		$.ajax({
			type: "POST",
			url: "1.php",
			data: parametros,
			success: function(a) {
				window.location="inv_1.php";
			}
		});
	}
function modificar(puntero){
	var parametros = {"action":"ajax","puntero":puntero};
	$.ajax({
		type: "POST",
		url: "1.php",
		data: parametros,
		success: function(a) {
			$('#modificar-modal-body').html(a);
		}
	});
	modal.style.display = "block";
}
function modificar_submit(){

	var id_pro = $("input#id_pro").val();
	var nom_pro = $("input#nom_pro").val();
	var det_pro = $("input#det_pro").val();
	var id_med = $("select#med option:selected").val();
	var parametros = {"action":"modificar",
					  "id_pro":id_pro,
					  "nom_pro":nom_pro,
					  "det_pro":det_pro,
					  "id_med" :id_med};
	$.ajax({
		type: "POST",
		url: "1.php",
		data: parametros
	});
	window.location="inv_1.php";
}
function agregar(){
	modal_agregar.style.display = "block";
}
function agregar_submit(){
	var nom_pro = $("input#nom_pro").val();
	var det_pro = $("input#det_pro").val();
	var med = $("select#med option:selected").val();
	var parametros = {"action":"agregar",
					  "nom_pro":nom_pro,
					  "det_pro":det_pro,
					  "med":med};
	$.ajax({
		type: "POST",
		url: "1.php",
		data: parametros,
		// success: function(a){
		// 	window.location="inv_1.php";
		// }
	});
	window.location="inv_1.php";
}
function cerrar_agregar(){
	modal_agregar.style.display = "none";
}
function cerrar_modificar(){
	modal.style.display = "none";
}
function cerrar_eliminar(){
	modal_eliminar.style.display = "none";
}
window.onclick = function(event) {
	if (event.target == modal) {
		modal.style.display = "none";
	}
	if (event.target == modal_agregar) {
		modal_agregar.style.display = "none";
	}
	if (event.target == modal_eliminar) {
		modal_eliminar.style.display = "none";
	}
}