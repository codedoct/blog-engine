<?php
	//you can change this data with your database
	$datas = array(
		array(
			'gender' => 'Laki-laki',
			'jumlah' => '123'
		),
		array(
			'gender' => 'Perempuan',
			'jumlah' => '321'
		)
	);
?>
<html>
	<head>
		<title>Grafik | Chart</title>
		<script type="text/javascript" src="extension/jquery.min.js"></script>
		<script type="text/javascript" src="extension/highcharts.js"></script>
		<script type="text/javascript">
			$(function(){
			  showChart();
			});

			function showChart()
			{
			  var chart1; // globally available
			  $(document).ready(function() {
			    chart1 = new Highcharts.Chart({
			       chart: {
			          renderTo: 'chart',
			          type: 'column'
			       },   
			       title: {
			          text: 'Grafik Jumlah Penduduk'
			       },
			       xAxis: {
			          categories: ['Gender']
			       },
			       yAxis: {
			          title: {
			             text: 'Jumlah Penduduk'
			          }
			       },
			            series:             
			          [
			          	//i'am use data array
			            <?php foreach ($datas as $data) { ?>
						  {
						    name: '<?=$data['gender']?>',
						    data: [<?=$data['jumlah']?>]
						  },
						<?php } ?>
			          ]
			    });
			  });
			}
		</script>
	</head>
	<body>
		<button onclick="showChart(this)" type="button">test</button>
		<div id="chart"></div>
	</body>
</html>