function Solo_Numerico(variable){
	Numer=parseInt(variable);
	if (isNaN(Numer)){
		return "";
	}
	return Numer;
}
function ValNumero(Control){
	Control.value=Solo_Numerico(Control.value);
}

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
		data: parametros,
		success: function(a) {
			window.location="inv_1.php";
		}
	});
	modal.style.display = "none";
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
		success: function(a){
			document.location.reload();
		}
	});
	modal.style.display = "none";
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

// inventario 2
function abrir_recibir(puntero,id_pro) {
	$.ajax({
		url: '1.php',
		type: 'POST',
		data: {'action': 'proceso','puntero':puntero,'id_pro':id_pro},
		success: function(a){
			$('#rec_pro_body').html(a);
		}
	});
	rec_pro.style.display = "block";
}
function cerrar_recibir() {
	rec_pro.style.display = "none";
}
function recibir() {
	$.ajax({
		url: '1.php',
		type: 'POST',
		data: {'action': 'recepcion',
			   'inv_line': $('#inv_line').val(),
			   'pro': $('#id_pro').val(),
			   'cant_rec': $('#cant').val(),
			   'fh_rec': $('#fh_pro').val()},
		success: function(a) {
			document.location.reload();
		}
	});
	rec_pro.style.display = "none";
}

function abrir_consumo(puntero,id_pro) {
	$.ajax({
		url: '1.php',
		type: 'POST',
		data: {'action': 'proceso','puntero':puntero,'id_pro':id_pro},
		success: function(a) {
			$('#con_pro_body').html(a);
		}
	});
	con_pro.style.display = "block";
}
function cerrar_consumo() {
	con_pro.style.display = "none";
}
function consumir() {
	$.ajax({
		url: '1.php',
		type: 'POST',
		data: {'action': 'consumir',
			   'inv_line': $('#inv_line').val(),
			   'pro': $('#id_pro').val(),
			   'cant_con': $('#cant').val(),
			   'fh_con': $('#fh_pro').val()},
		success: function(a) {
			$('#boom').html(a);
		}
	});	
}

	// var rec_pro = document.getElementById('rec_pro_modal');	
	// var nuv_ent = document.getElementById('nueva_entrada_modal');	

	// $('#nueva_entrada').click(function(event) {
	// 	nuv_ent.style.display = "block";
	// });
	// $('#cerrar_nuv_ent').click(function(event) {
	// 	nuv_ent.style.display = "none";
	// });

	// $('#abrir_modal_rec').click(function(event) {
	// 	rec_pro.style.display = "block";
	// });
	// $('#cerrar_modal_rec').click(function(event) {
	// 	rec_pro.style.display = "none";
	// });
	// window.onclick = function(event){
	// 	if (event.target == nuv_ent){
	// 		nuv_ent.style.display = "none";
	// 	}
	// }
