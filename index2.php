<!doctype html>
<html>
<head>

<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>

<input id="b1" type="button" value="Add and/or remove rows">
<div id="visualization"></div>
</body>
</html>

<script type="text/javascript" src="https://www.google.com/jsapi?autoload={
            'modules':[{
              'name':'visualization',
              'version':'1',
              'packages':['corechart']
            }]
          }"></script>
<script language="javascript">

      google.setOnLoadCallback(drawChart);

    var options = {
      width: 400,
      height: 240,
      vAxis: {minValue:0, maxValue:100},
      animation: {
        duration: 1000,
        easing: 'in'
      }
    };

    var chart = new google.visualization.LineChart(document.getElementById('visualization'));
    var data = new google.visualization.DataTable();
    
	data.addColumn('string', 'x');
    data.addColumn('number', 'y');
    data.addRow(['100', 123]);
    data.addRow(['700', 17]);
	
    var button = document.getElementById('b1');
    function drawChart() {
      // Disabling the button while the chart is drawing.
      button.disabled = true;
      google.visualization.events.addListener(chart, 'ready',
          function() {
            button.disabled = false;
          });
      chart.draw(data, options);
    }

    button.onclick = function() {
      if (data.getNumberOfRows() > 5) {
        data.removeRow(Math.floor(Math.random() * data.getNumberOfRows()));
      }
      // Generating a random x, y pair and inserting it so rows are sorted.
      var x = Math.floor(Math.random() * 1000);
      var y = Math.floor(Math.random() * 100);
      var where = 0;
      while (where < data.getNumberOfRows() && parseInt(data.getValue(where, 0)) < x) {
        where++;
      }
      data.insertRows(where, [[x.toString(), y]]);
      drawChart();
    }
    drawChart();
	
	send(data);
</script>


 