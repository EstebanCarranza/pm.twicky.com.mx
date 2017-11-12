<DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Twicky</title>
    <link rel="stylesheet" type="text/css" href="CSS/dashboard.css"/>
    <!-- <link rel="stylesheet" type="text/css" href="CSS/nivo-slider.css"/> -->
    <link rel="stylesheet" type="text/css" href="CSS/main-style.css"/>
    <!--<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css"/>-->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
    <script src="JS/jquery-3.1.1.min.js" type="text/javascript"></script>
    <!--<script src="JS/bootstrap.min.js" type="text/javascript"></script>-->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<!--<script src="JS/jquery.nivo.slider.js"></script> -->
	<?php
		require_once 'HTML/php/clases/class.functions.php';
		$fun = new funciones();

		$fun->session(false, false, '','');
	?>
</head>
<body>
    <!-- <section class="slider-wrapper theme-mi-slider">
      <div id="slider" class="nivoSlider">     
		    <img class="image-slider" src="Images/fondo.jpg" alt="" title="#htmlcaption1" />    
		    <img class="image-slider" src="Images/fondo1.jpg" alt="" title="#htmlcaption2" />       
		</div> 
		<div id="htmlcaption1" class="nivo-html-caption">     
		    <h1>¿Deseas aprender edición?</h1>
            <p>Cursos las 24 horas con los mejores profesores</p>
        <button type="button" class="btn btn-primary" id="btn-register" onclick="location='HTML/correo.html'"><strong>Registrar</strong></button>
        <button type="button" class="btn btn-primary" id="btn-login" onclick="location='HTML/login.php'"><strong>Inicia Sesión</strong></button>
		</div>
		<div id="htmlcaption2" class="nivo-html-caption">     
		    <h1>¿O tal vez aprender diseño?</h1>
            <p>Cursos las 24 horas con los mejores profesores</p>
            <button type="button" class="btn btn-primary" id="btn-descubre" onclick="location='HTML/contacto.php'"><strong>Cursos Disponibles</strong></button>
		</div>
    </section> -->
  <div id="myCarousel" class="carousel slide" data-interval="5000" style="margin-top: -20px">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active" height="500px">
        <img src="Images/1439.jpg" class="carousel-img img-responsive" alt="Chania">
        <div class="carousel-caption"> 
            <h1>¿Deseas aprender edición?</h1>
            <p>Cursos las 24 horas con los mejores profesores</p>
            <button type="button" class="btn btn-primary" id="btn-register" onclick="location='HTML/correo.html'"><strong>Registrar</strong></button>
            <button type="button" class="btn btn-primary" id="btn-login" onclick="location='HTML/login.php'"><strong>Inicia Sesión</strong></button>
        </div>
      </div>

      <div class="item" height="500px">
        <img src="Images/1547.jpg" class="carousel-img img-responsive" alt="Chania">
        <div class="carousel-caption">  
            <h1>¿O tal vez aprender diseño?</h1>
            <p>Cursos las 24 horas con los mejores profesores</p>
            <button type="button" class="btn btn-primary" id="btn-descubre" onclick="location='HTML/lista-cursos.html'"><strong>Cursos Disponibles</strong></button>
        </div>
      </div>
    </div>
     <!-- Indicators -->
    <ol class="carousel-indicators">
      <li class="item1 active"></li>
      <li class="item2"></li>
    </ol>
  </div>
</div>

<script>
$(document).ready(function(){
    
    $("#myCarousel").carousel("cycle");

    // Enable Carousel Indicators
    $(".item1").click(function(){
        $("#myCarousel").carousel(0);
    });
    $(".item2").click(function(){
        $("#myCarousel").carousel(1);
    });
});
</script>
    <section class="bottom">
        <div class="description left-description">
            <h1>Los mejores cursos</h1>
            <h2>Tú eliges el curso que te gustaría aprender.</h2>
            <span><img class="image-courses" src="Images/Ae.png"></span>
            <span><img class="image-courses" src="Images/PI.png"></span>
            <span><img class="image-courses" src="Images/Au.png"></span>
            <span><img class="image-courses" src="Images/Br.png"></span>
        </div>
        <div class="description center-description">
            <h1>Comunidad al servicio</h1>
            <h2>Contamos con un espacio para nuestros estudiantes en donde puedes realizar todas las preguntas acerca de las lecciones de cada curso,tanto a profesores como a los mismos alumnos, también podrás enterarte de los proximos eventos online o nuevos profesores para los cursos.</h2>
        </div>
        <div class="description right-description">
             <h1>100% virtual</h1>
            <h2>Desde la comodidad de tu casa puedes aprender, no necesitas de horarios ni trasladarte para aprender nuevas cosas, un ambiente 100% virtual. Sin esfuerzo o trafio pesado para llegar a algún destino, donde sea que estes en cualquier dispositivo podrás disfrutar de nuestros cursos.</h2>
        </div>
    </section>
</body>
</DOCTYPE>