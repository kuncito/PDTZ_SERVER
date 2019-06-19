<?php
session_start();
require("Auth.php");
require("config.php");
$userId   = Authorize();
$username = $_SESSION["username"];
if ($_GET["clase"])
	$_SESSION["clase"]=$_GET["clase"];
if ($_GET["alumno"])
	$alumno=$_GET["alumno"];
$clase=$_SESSION["clase"];
?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Plataforma</title>
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
  
  
  <body class="size-1140">
    <!-- HEADER -->
    <header role="banner">    
      <!-- Top Bar -->
      <div class="top-bar background-white">
        <div class="line">
          <div class="s-12 m-6 l-6">
            <div class="top-bar-contact">
              <p class="text-size-12">Proyecto Final Integrador - Franco Kühn </p>
            </div>
          </div>
          <div class="s-12 m-6 l-6">
          </div>
        </div>
      </div>
      
      <!-- Top Navigation -->
      <nav class="background-white background-primary-hightlight">
        <div class="line">
          <div class="s-12 l-2">
            <a href="index.html" class="logo"><img src="img/logo.jpg" alt=""></a>
          </div>
          <div class="top-nav s-12 l-10">
            <p class="nav-text"></p>
            <ul class="right chevron">
              <li><a href="index.html">Inicio</a></li>
              <li><a>Docentes</a>
                <ul>
                  <li><a href="ingreso.php?logout=1">Cerrar Sesión</a></li>
                </ul>
              </li>
              <li><a href="gallery.html">Galería</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    
    
    <!-- MAIN -->
    <main role="main">
      <!-- Content -->
      <article>
        <header class="section background-primary text-center">
            <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1">Bienvenid@ <?php echo $username; ?></h1>
        </header>
        <div class="section background-white"> 
          <div class="line">
            <div class="margin">
              
              <!-- Clases List -->
              <div class="s-12 m-12 l-6">
                <h2 class="text-uppercase text-strong margin-bottom-30">Mis Clases</h2>
                <div class="margin-left-80 margin-bottom">
					  <?php
							$query  = "SELECT * FROM `clases` WHERE `id_docente` = $userId";
							$result = mysqli_query($conn, $query);
							if (($result) && ($result->num_rows !== 0)) {
								echo "<table width='70%' cellpadding='2' cellspace='5'>";
								while ($row = $result->fetch_array()) {
									$rows[] = $row;
								}
								$cont_clase=0;
								foreach ($rows as $row) {
									echo "<tr>";
									echo "<td><a href=dash.php?clase=" . $row['id_clase'] . "> Clase Nº " . ++$cont_clase . "</a></td>";
									echo "</tr>";
								}
								echo "</table>";
							}
							else echo "No hay clases que mostrar";
						?>

                </div>
              </div>
              
              <!-- Students List -->
              <div class="s-12 m-12 l-6">
                <h2 class="text-uppercase text-strong margin-bottom-30">Alumnos</h2>
                 <?php

					$query2  = "SELECT alumnos.id_alumno, nombre, apellido FROM `alumnos`, `registros` where alumnos.`id_alumno`=registros.`id_alumno` AND registros.`id_clase` = $clase ORDER BY `apellido`";
					$result2 = mysqli_query($conn, $query2);
					if (($result2) && ($result2->num_rows !== 0)) {
						echo "<table width='70%' cellpadding='2' cellspace='5'>";
						echo "<tr>";
						echo "<td><strong>Id de Alumno</strong></td>";
						echo "<td><strong>Apellido</strong></td>";
						echo "<td><strong>Nombre</strong></td>";
						echo "</tr>";
						
						
						while ($row2 = $result2->fetch_array()) {
							$rows2[] = $row2;
						}
						$cont_alumnos=0;
						foreach ($rows2 as $row2) {
							echo "<tr>";
							echo "<td><a href=dash.php?alumno=" . $row2['id_alumno'] . "> Alumno Nº " . ++$cont_alumnos . "</a></td>";
							echo "<td>" . $row2['apellido'] . "</td>";
							echo "<td>" . $row2['nombre'] . "</td>";
							echo "</tr>";
						}
						echo "</table>";
					}else echo "<p>La clase está vacía<br><br></p>";
				?>

              </div>  
            </div>  
          </div> 
        </div> 
        
        
       <!-- Charts -->   
        <?php

    	$querynombre  = "SELECT  nombre, apellido FROM `alumnos` WHERE `id_alumno` = $alumno";
		$resultnombre = mysqli_query($conn, $querynombre);
		if (($resultnombre) && ($resultnombre->num_rows !== 0))
			$OBJALUMNO = mysqli_fetch_assoc($resultnombre);

		$default_colors = ['#3366CC','#DC3912','#FF9900','#109618','#990099','#3B3EAC','#0099C6','#DD4477','#66AA00','#B82E2E','#316395','#994499','#22AA99','#AAAA11','#6633CC','#E67300','#8B0707','#329262','#5574A6','#3B3EAC'];
		
		//Chart #1 and #2
		$cadena1= "<script language = 'JavaScript'>
			new Chart(document.getElementById('G1'), {
			type: 'line',
			data: {  
				labels: [1,2,3,4,5,6,7,8,9,10],
				datasets: [";
		$cadena2= "<script language = 'JavaScript'>
			new Chart(document.getElementById('G2'), {
			type: 'line',
			data: {  
				labels: [1,2,3,4,5,6,7,8,9,10],
				datasets: [";		

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
			$valor2 = $datos->energyperzombie;
			$dia = $datos->dayNumber;
			if ($sesion == $prev){
				$midata1[] = $valor1;
				$midata2[] = $valor2;
				$prevDia = $dia;
				}
			else{
				$cadena1.= "{	data: ".json_encode($midata1).",
							label: 'Sesion ".++$cont."',
							borderColor: '".$default_colors[$cont%20]."',
							fill: false
						  },";
				$cadena2.= "{	data: ".json_encode($midata2).",
							label: 'Sesion ".$cont."',
							borderColor: '".$default_colors[$cont%20]."',
							fill: false
						  },";
				$midata1 = [];
				$midata2 = [];
				$midata1[] = $valor1;
				$midata2[] = $valor2;
				
				$prevDia = 0;
				$prev = $sesion;
			}
		}

				$cadena1.= "{	data: ".json_encode($midata1).",
							label: 'Sesion ".++$cont."',
							 borderColor: '".$default_colors[$cont%20]."',
							fill: false
						  }";
				$cadena2.= "{	data: ".json_encode($midata2).",
							label: 'Sesion ".$cont."',
							 borderColor: '".$default_colors[$cont%20]."',
							fill: false
						  }";
		$cadena1.="]},
				options: {
				title: {
				display: true,      
				text: 'Energía generada por día(en unidades)'
				}
				}});</script>";
		$cadena2.="]},
				options: {
				title: {
				display: true,      
				text: ['Promedio de Energía Consumida en cada zombie ','por día sin considerar el consumo fijo (en unidades)']
				}
				}});</script>";

		//Chart #3
		$cadena3= 	"<script language = 'JavaScript'>
					new Chart(document.getElementById('G3'), {
					type: 'line',
					data: {  
					labels: [1,2,3,4,5,6,7,8,9,10],
					datasets: [";
        //TO_DO:						
        
        $midata3=[1,2,3,4,5,6,7,8,9,10];
		$cadena3.=	"{	data: ".json_encode($midata3).",
							label: 'Sesion ".$cont."',
							 borderColor: '".$default_colors[$cont%20]."',
							fill: false
						  }";
					
		$cadena3.="]},
				options: {
				title: {
				display: true,      
				text: 'Instalación de Generadores Eólicos (en unidades)'
				}
				}});</script>";
		
		//Building Canvas
				  echo "<header class='section background-primary text-center'>
            <h1 class='text-white margin-bottom-0 text-size-50 text-thin text-line-height-1'>".$OBJALUMNO['nombre']." ".$OBJALUMNO['apellido']."</h1>
        </header>
        <div class='section background-white'> 
          <div class='line'>
            <div class='margin text-center'>
              <div class='s-12 m-12 l-4 margin-bottom'>
                <div class='padding-2x block-bordered border-radius'>
                <canvas id='G1' width='400' height='500'></canvas>
                </div>
              </div>
              <div class='s-12 m-12 l-4 margin-bottom'>
                <div class='padding-2x block-bordered border-radius'>
                <canvas id='G2' width='400' height='500'></canvas>
                </div>
              </div>
              <div class='s-12 m-12 l-4 margin-bottom'>
                <div class='padding-2x block-bordered border-radius'>
                <canvas id='G3' width='400' height='500'></canvas>
                </div>
              </div>              
            </div>
          </div>
        </div> ";
        //Building Charts
				echo $cadena1.$cadena2.$cadena3;
			}else{
				if($alumno !=null)
					echo "<header class='section background-primary text-center'>
							<h1 class='text-white margin-bottom-0 text-size-50 text-thin text-line-height-1'> No hay datos para este alumno</h1>
						  </header>";
				}
			mysqli_close($conn);
			?>
             
      </article>
    </main>
    
    <!-- FOOTER -->
    <footer>
     
      <!-- Main Footer -->
      <section class="section background-dark">
        <div class="line">
          <div class="margin">
            <!-- Collumn 1 -->
            <div class="s-12 m-12 l-4 margin-m-bottom-2x">
				 <h4 class="text-uppercase text-strong">Nuestro Grupo</h4>
              
              <div class="line">
                <div class="margin">
                  <div class="s-12 m-12 l-4 margin-m-bottom">
                    <a href="http://gti.fi.mdp.edu.ar"><img src="img/logo-gti.png" alt=""></a>
                  </div>
                  <div class="s-12 m-12 l-8 margin-m-bottom">
                    <p>El Grupo de Investigación en Tecnologías Interactivas a promovido este desarrollo desde hace casi 2 años.</p>
                    <a class="text-more-info text-primary-hover" href="http://gti.fi.mdp.edu.ar">Acceder al Sitio</a>
                  </div>
                </div>
              </div>
				
				
                       
              
            </div>
            
            <!-- Collumn 2 -->
            <div class="s-12 m-12 l-4 margin-m-bottom-2x">
              <h4 class="text-uppercase text-strong">Contacto</h4>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-placepin text-primary text-size-12"></i>
                </div>
                <div class="s-11 m-11 l-11 margin-bottom-10">
                  <p><b>Dirección:</b> Av.Juan B.Justo 4302, Mar del Plata, Argentina</p>
                </div>
              </div>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-mail text-primary text-size-12"></i>
                </div>
                <div class="s-11 m-11 l-11 margin-bottom-10">
                  <p><a href="/" class="text-primary-hover"><b>E-mail:</b> gti@fi.mdp.edu.ar</a></p>
                </div>
              </div>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-smartphone text-primary text-size-12"></i>
                </div>
                <div class="s-11 m-11 l-11 margin-bottom-10">
                  <p><b>Telefono:</b> +54 0223 481 6600</p>
                </div>
              </div>
              
             </div>
            
            <!-- Collumn 3 -->
            <div class="s-12 m-12 l-4">
             <h4 class="text-uppercase text-strong">Nuestra filosofía</h4>
              <p class="text-size-20"><em> "Conectar la experiencia del juego..." </em><p>
                   
              
            </div>
          </div>
        </div>
      </section>
      <hr class="break margin-top-bottom-0" style="border-color: rgba(0, 38, 51, 0.80);">
      
      <!-- Bottom Footer -->
      <section class="padding background-dark">
        <div class="line">
          <div class="s-12 l-6">
            <p class="text-size-12">Proyecto Final de Carrera</p>
          </div>
          <div class="s-12 l-6">
            <a class="right text-size-12">Franco Kühn<br> 2018</a>
          </div>
        </div>
      </section>
    </footer> 
    <script type="text/javascript" src="js/responsee.js"></script>
    <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="js/template-scripts.js"></script>   
   </body>
</html>
