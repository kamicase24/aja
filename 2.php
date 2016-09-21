<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="src/js/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
		   $('#div-btn1').click(function(){
		   	  var parametros = {"action":"ajax"};
		      $.ajax({
			    type: "POST",
			    url: "1.php",
			    data: parametros,
			    success: function(a) {
		                $('#div-results').html(a);
		                // var x = document.createElement("input");
		                // x.setAttribute("type","text");
		                // x.setAttribute("value",a);
		                // document.getElementById("div-results").appendChild(x);
			    }
		       });
		   });
		});
	</script>
</head>
<body>
	<a id="div-btn1" style="cursor:pointer;">Modificar</a>
	<div id="div-results"></div>
</body>
</html>