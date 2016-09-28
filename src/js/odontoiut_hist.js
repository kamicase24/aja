$(function() {
	$( "#fh_nac" ).datepicker({
		changeMonth: true,
		changeYear: true
	});
});

$(document).ready(function()
{
	$("#submit_hist_1").click(function() {
		// var contador = $("#wraper_trat div").length + 1;

		var form_wraper = $('<div class="fieldwrapper" id="field"></div>');
		var fh_trat_dt = $("<script>$( function() {$('#fh_trat').datepicker({ showOtherMonths: true, selectOtherMonths: true}); });</script>");	
		var input_fh_trat = $('<div class="col-md-6"><br><input type="text" name="fh_trat" id="fh_trat" class="form-control" placeholder="Fecha" /></div>');
		var input_tit_trat = $('<div class="col-md-6"><br><input type="text" name="tit_trat" id="tit_trat" class="form-control" placeholder="Tratamiento" required/></div>');
		var input_det_tart = $('<div class="col-md-12"><br><textarea rows="3" name="trat" id="trat" class="form-control" placeholder="Detalles del Tratamiento"  required/></textarea></div>');					
		var saveButton = $('<div class="col-md-12"><br><input type="button" class="btn btn-primary form-control" value="Guardar Tratamiento"></div>');
		saveButton.click(function(){
			var fh_trat = $('#fh_trat'+contador).val();
			var tit_trat = $('#tit_trat'+contador).val();
			var trat = $('#trat'+contador).val();
			$.ajax({
				type: "POST",
				url: "1.php",
				data: {"action":"trat",
						"fh_trat":$('#fh_trat'+contador).val(),
						"tit_trat":$('#tit_trat'+contador).val(),
						"trat":$('#trat'+contador).val()},
				success: function(a){
							$('#b64').html(a);
						}
			});
		});
		// var removeButton = $('<div class="col-md-6"><br><input type="button" class="btn btn-danger form-control" value="Eliminar Tratamiento"></div>');
		// removeButton.click(function()
		// {
			// $(this).parent().remove();
		// });
		form_wraper.append(input_fh_trat);
		form_wraper.append(fh_trat_dt);
		form_wraper.append(input_tit_trat);
		form_wraper.append(input_det_tart);
		form_wraper.append(saveButton);
		// form_wraper.append(removeButton);
		$("#wraper_trat").append(form_wraper);

		$('#gen_trat').remove();
		$('#trat_header').append('<h4>Tratamiento</h4>');
		
		$.ajax({
			url: '1.php',
			type: 'POST',
			data: {'action': 'pac_hist',
			"nom_pac":$("#nom_pac").val(), "ape_pac":$("#ape_pac").val(),
			"tp_ced":$("#tp_ced").val(),   "ced_pac":$("#ced_pac").val(),
			"fh_nac":$("#fh_nac").val(),   "edad":$("#edad").val(),
			"gen":$("#gen").val(),         "tlf":$("#tlf").val(),
			"direcc":$("#direcc").val(),   "esp":$("#esp").val(),
			"tra":$("#tra").val()},
			success: function(a) {
				$('#b64').html(a);
			}
		});

		$('#nom_pac').attr('disabled', 'true');
		$('#ape_pac').attr('disabled', 'true');
		$('#tp_ced').attr('disabled', 'true');
		$('#ced_pac').attr('disabled', 'true');
		$('#fh_nac').attr('disabled', 'true');
		$('#edad').attr('disabled', 'true');
		$('#gen').attr('disabled', 'true');
		$('#tlf').attr('disabled', 'true');
		$('#direcc').attr('disabled', 'true');
		$('#esp').attr('disabled', 'true');
		$('#tra').attr('disabled', 'true');

		$('#submit_hist_1').replaceWith('<button type="button" class="btn btn-primary form-control" id="submit_hist_2">Modificar</button>');
	});
});

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

