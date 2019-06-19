<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Analíticas de Aprendizaje</title>
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/responsee.css">
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css">
    <!-- CUSTOM STYLE -->
    <link rel="stylesheet" href="css/template-style.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>    
     <script type="text/javascript" src="js/Chart.js"></script> 
      <script type="text/javascript" src="js/Chart.min.js"></script> 
  </head>  
  <body>
<canvas id="G1" width="350" height="400"></canvas>
<!-- Charts -->   
<?php
$default_colors = ['#3366CC','#DC3912','#FF9900','#109618','#990099','#3B3EAC','#0099C6','#DD4477','#66AA00','#B82E2E','#316395','#994499','#22AA99','#AAAA11','#6633CC','#E67300','#8B0707','#329262','#5574A6','#3B3EAC'];
$cadena= "<script language = 'JavaScript'>
	new Chart(document.getElementById('G1'), {
	type: 'line',
	data: {  
		labels: [1,2,3,4,5,6,7,8,9,10],
		datasets: [";
    	$querynombre  = "SELECT  nombre, apellido FROM `alumnos` WHERE `id_alumno` = $alumno";
		$resultnombre = mysqli_query($conn, $querynombre);
		if (($resultnombre) && ($resultnombre->num_rows !== 0))
			$OBJALUMNO = mysqli_fetch_assoc($resultnombre);

					
		$query3  = "SELECT * FROM `eventos` WHERE `id_alumno` = $alumno AND `tipo_evento` = 3 ORDER BY `id_sesion`, `id_evento` ";
		$result3 = mysqli_query($conn, $query3);
		if (($result3) && ($result3->num_rows !== 0)) {
			while ($row3 = $result3->fetch_array()) {
				$rows3[] = $row3;
				}
		
		$prev = $rows3[0]['id_sesion'];
		$prevDia = 0;
		$cont =0;
		foreach ($rows3 as $row3) {
			$sesion = $row3['id_sesion'];
			$datos = json_decode($row3['datos']);
			$valor1 = $datos->energyGenerated;
			$dia = $datos->dayNumber;
			if ($sesion == $prev){
				$midata[] = $valor1;
				$prevDia = $dia;
				}
			else{
				$cadena.= "{	data: ".json_encode($midata).",
							label: 'Sesion ".++$cont."',
							borderColor: '".$default_colors[$cont%20]."',
							fill: false
						  },";
				$midata = [];
				$midata[] = $valor1;
				$prevDia = 0;
				$prev = $sesion;
			}
		}

				$cadena.= "{	data: ".json_encode($midata).",
							label: 'Sesion ".++$cont."',
							 borderColor: '".$default_colors[$cont%20]."',
							fill: false
						  }";
		$cadena.="]},
				options: {
				responsive: false,
				title: {
				display: true,      
				text: 'Energía generada por día(en unidades)'
				}
				}});</script>";
		echo $cadena;
		mysqli_close($conn);
	}
?>
</body>
</html>
