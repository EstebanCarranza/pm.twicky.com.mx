<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Twicky</title>
	<link rel="stylesheet" href="../CSS/main-style.css">
	<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../CSS/form-elements.css"/>
    <link rel="stylesheet" type="text/css" href="../CSS/main-style.css"/>
     <link rel="stylesheet" type="text/css" href="../CSS/response.css"/>
	<script src="../JS/jquery-3.1.1.min.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
        include('header.php');
    ?>
   <div class="btn-paginas btn-paginas-cerrar">
        <button class="btn" id="btn-close">Cerrar folio</button>   
    </div>
       <div class="panel-body msg_container_base panel-body-solicitud">
                    <div class="row msg_container base_sent">
                        <div class="col-md-2 col-xs-2 avatar">
                            <div class="messages msg_sent">
                                 <img src="../Images/profile.jpg" class=" img-responsive" style="width: 100%;">
                            </div>
                        </div>
                        <div class="col-md-10 col-xs-10 response-client">
                            <div><h1>Esteban Carranza • esteban@gmail.com</h1><h4 style="float: right;margin-top: -29px; margin-right: 10px;">Estado:<strong  class="important"> No Atendido</strong></h4></div>
                            <h4>Telefono: 8186696176</h4>
                            <h4>Tipo de contacto:<strong> Cliente</strong></h4>
                            <h2>Photoshop</h2>
                           <h3>Mi duda es que no se como se llama un curso aunque ahí viene y tampoco se cuanto cuesta o que purrum osea así no se puede la dvd.</h3>
                           <time datetime="2009-11-13T20:00" class="time">Fecha de contacto: 10/01/2017</time>
                        </div>
                    </div>
           <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-sm response_input" placeholder="Escribenos la respuesta al cliente aquí..." />
                        <span class="input-group-btn">
                        <button class="btn btn-primary btn-sm" id="btn-chat">Responder</button>
                        </span>
                </div>
                </div>
      <div class="btn-paginas btn-paginas-solicitud">
        <button class="btn" id="btn-atender">Atender folio</button>   
    </div>
    <!---<section class="info-user">
        <div>
            <span class="fecha">
        <h5>Fecha</h5>
        <h6>01/01/2014</h6>
        </span>
            <span class= "tipo">
                <h5>Tipo de contacto:</h5>
                <h6>Cliente</h6>
            </span>
        </div>
        <div class="info">
        <h3>Nombre</h3>
        <h4>Esteban Carranza</h4>
        <h3>
            Curso
        </h3>
        <h4>
            Photoshop
        </h4>
        <h3>
            Correo
        </h3>
        <h4>
            esteban.emoxito@gmail.com
        </h4>
        <h3>
            Celular
        </h3>
        <h4>
            8186696176
        </h4>
        <h3>
            Comentarios
        </h3>
        <h4>
            afssdbgnjyrefsdvfbgjhuryters
        </h4>
            </div>
        <div id="estado">
            <h1 class="important"> No atendido</h1>
        </div>
    </section>
    <section class="form-response">
        <div class="header"><h3>Reponder al Usuario</h3></div>        
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5">
                        	<div class="form-box">
	                            <div class="form-bottom">
				                    <form role="form" action="" method="post" class="registration-form">
				                        <div class="form-group">
				                        	<input type="text" readonly name="form-email" placeholder="Correo..." class="form-email form-control" id="form-email" required>
				                        </div>
				                        <div class="form-group">
				                        	<textarea name="form-about-yourself" placeholder="Repuesta para el cliente..." class="form-about-yourself form-control" id="form-about-yourself"></textarea>
				                        </div>
                                        <div class="form-group">
				                        <button type="submit" class="btn"><strong>Enviar Respuesta</strong></button>
                                        </div>
				                    </form>
			                    </div>
                        	</div>
                        </div>
                    </div>
                </div>
    </section>-->
            </body>
</html>