<?php 
include("clases/conect.php");
$segundosanadir=5;
$horaInicial=date("H:i:s");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/fancywebsocket.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi?autoload={
            'modules':[{
              'name':'visualization',
              'version':'1',
              'packages':['corechart']
            }]
          }"></script>
</head>

<body>
Grafica<br /><br />
<div id="visualization" style="width:800px; height:400px;"></div>
Contador de tiempo <span id="contador"></span>
<input type="text" id="sumar" value="0"/>
</body>
</html>

<script language="javascript">


horas = <?php echo date("h");?>; minutos = <?php echo date("i");?>; segundos = <?php echo date("s");?>;

function muestraReloj() 
{
	 if (segundos === 59)
 	{ 
 		segundos=1; 
		minutos++;
	} 
	if (minutos === 59)
	{ 
		minutos=1; 
		horas++;
	} 
	var string = ""; 
	string += minutos + ':'+ segundos; 
	document.getElementById("contador").innerHTML = string; 
	
	var segundoscompara = (segundos / 5)
	if(segundoscompara % 1 == 0)
	{
		graficas(string);
	}
	else
	{
	}
	segundos ++; 
} 
setInterval(muestraReloj, 1000);

    google.setOnLoadCallback(drawChart);

    var options = {
      vAxis: {minValue:0, maxValue:20},
      animation: {
        duration: 1000,
        easing: 'in'
      }
    };
    var chart = new google.visualization.LineChart(document.getElementById('visualization'));
    var data = google.visualization.arrayToDataTable([
          ['Hora', 'Numero registros'],
		  <?php
		for($i=1;$i<=10;$i++)
		{
			$segundos_horaInicial=strtotime($horaInicial);
			$nuevaHora = date("i:s",$segundos_horaInicial+($segundosanadir*$i));
			?>['<?php echo $nuevaHora;?>',2],<?php
		}
		  ?>
		     ]);
			 
    var button = document.getElementById('b1');
    function drawChart() {
      google.visualization.events.addListener(chart, 'ready',
          function() {
          });
      chart.draw(data, options);
    }

   function graficas(val)
   {
		var total = document.getElementById('sumar').value;
		if(total >=1)
		{
			document.getElementById('sumar').value = 0;
			totalsumar = total;
		}
		else
		{
			totalsumar = 0;
		}
		  if (data.getNumberOfRows() > 9) 
		  {
			data.removeRow(9);
		  }	  
		  var x = val;
		  var y = parseInt(totalsumar);
		  var where = 0;
		  while (where < data.getNumberOfRows() && parseInt(data.getValue(where, 0)) < x) {
			where++;
		  }
		  data.insertRows(where, [[x.toString(), y]]);
		  drawChart();
    }
	function setsumar()
	{
		var total = document.getElementById('sumar').value;
		 document.getElementById('sumar').value = parseInt(total)+1;
	}
    drawChart();	
	muestraReloj();
	
</script>