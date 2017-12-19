<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script language="javascript" src="js/jquery-1.7.2.min.js"></script>
<script src="js/fancywebsocket.js"></script>
<script language="javascript">
function insertar()
{
	send(1);// array JSON	
	
	/*
	var tipo             = document.getElementById('tipo').value;
	$.ajax({
		type: "POST",
		url: "insertar.php",
		data: "tipo="+tipo,
		dataType:"html",
		success: function(data) 
		{
			//window.location.href = 'form.php'
		}
		});
	*/	
}
function setsumar(message)
{
}
</script>
</head>

<body>
<select name="tipo" id="tipo">
<option value="1">aumentar grafica</option>
</select> !! 
<input type="submit" value="enviar" onclick="insertar();" />

</body>
</html>