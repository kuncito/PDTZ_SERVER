<!DOCTYPE html>
<?php include("login_logic.php");?>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Acceso Docentes</title>
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
    <script type="text/javascript" src="js/validation.js"></script> 
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
                  <li><a href="ingreso.php">Ingresar</a></li>
                  <li><a href="registro.php">Registrarse</a></li>
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
            <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1">Registro para Docentes</h1>
        </header>
        <div class="section background-white"> 
          <div class="line">
            <div class="margin">
              
              <!-- Information -->
              <div class="s-12 m-12 l-6">
                <h2 class="text-uppercase text-strong margin-bottom-30">Información</h2>
                <div class="margin-left-80 margin-bottom">
                  <h4 class="text-strong margin-bottom-0">Para utilizar nuestros servicios, deberás comunicarte con el administrador del sistema a fin de registrar a tus estudiantes</h4> 
                </div>
              </div>
              
              <!-- Register Form -->
              <div class="s-12 m-12 l-6">
                <h2 class="text-uppercase text-strong margin-bottom-30">Ingresar al Sistema</h2>
                <form class="customform" method="post">			
                  <div class="line">
                    <div class="margin">
                      <div class="s-12 m-12 l-6">				  
                        <input name="email" class="required email border-radius" placeholder="Su nombre de usuario" title="Su nombre de usuario" type="text" />
                      </div>
                      <div class="s-12 m-12 l-6">
                        <input name="password" class="name border-radius" placeholder="Su contraseña" title="Su contraseña" type="password" />
                      </div>
                    </div>
                  </div>
                 
                 
                  <div class="s-12 m-12 l-4"><button class="submit-form button background-primary border-radius text-white" name= "submit" type="submit" value="Registrar" >Acceder</button></div> 
                </form>
                
                <?php
					if ($error) {
						echo '<div class="alert alert-danger" align=center>'.addslashes($error).'</div>';
					}
					if ($message) {
						echo '<div class="alert alert-success" align=center>'.addslashes($message).'</div>';
					}
				?>
                
              </div>  
            </div>  
          </div> 
        </div> 
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
