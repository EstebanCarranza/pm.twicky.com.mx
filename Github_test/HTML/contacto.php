<!DOCTYPE html>
<html lang="esp">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Twicky Contacto</title>
        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="../CSS/bootstrap.min.css">
        <link rel="stylesheet" href="../CSS/main-style.css">
        <link rel="stylesheet" href="../CSS/form-elements.css">
        <link rel="stylesheet" href="../CSS/style.css">
         <link rel="stylesheet" href="../CSS/contacto.css">
        <link rel="stylesheet" href="../CSS/bootstrap-datetimepicker.min.css" />
        <link type="stylesheet" href="../CSS/bootstrap-timepicker.min.css" />
        <link type="stylesheet" href="../CSS/bootstrap-select.min.css" />
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
        <script type="text/javascript" src="../JS/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="../JS/moment.js"></script>
        <script type="text/javascript" src="../JS/transition.js"></script>
        <script type="text/javascript" src="../JS/collapse.js"></script>
        <script type="text/javascript" src="../JS/bootstrap.min.js"></script>
        <script type="text/javascript" src="../JS/bootstrap-select.min.js"></script>
        <script type="text/javascript" src="../JS/bootstrap-timepicker.js"></script>
        <script type="text/javascript" src="../JS/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript" src="../JS/cursos.js"></script>
	<script type="text/javascript" src="cargaprod.js" ></script>
	<script type="text/javascript" src="validationsEmail.js" ></script>
	<script type="text/javascript" src="validationsCellphone.js" ></script>
        <script type="text/javascript" src="validationsDays.js"></script>
        <?php require_once 'php/post.contacto.php'; ?>
    </head>
    <body>
       <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="../index.php"><img  class="logo" src="../Images/Logo.png" /></a>
                </div>
                <ul class="list-inline">
                    <li class="active list-inline-item"><a href="../index.php">Inicio</a></li>
                    <li class="list-inline-item"><a href="../HTML/lista-cursos.html">Cursos</a></li>
                    <li class="list-inline-item"><a href="../HTML/contacto.php">Contacto</a></li>
                    <li class="list-inline-item"> <button type="button" class="btn btn-primary" id="btn-register" onclick="location.href='../HTML/login.php'"><strong>Entrar</strong></button></li>
                </ul>
            </div>
        </nav>
        <!-- Top content -->
        <div class="top-content">
            <div class="inner-bg">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <h1><strong>Twicky</strong></h1>
                        <div class="description">
                            <p>
                                Registrate<strong> se parte de nuestra comunidad</strong> y encuentra los mejores cursos diseñados especialmente para el artista que llevas dentro. 
                                ¡Cursos a un solo click!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5" style="margin-left: 34%;">
                            <div class="form-box">
                                <div class="form-top">
                                    <div class="form-top-left">
                                        <h3><strong>¿Necesitas información?</strong></h3>
                                        <p>Estamos a tus ordenes, llena el siguiente formulario y te atenderemos en la brevedad posible:</p>
                                    </div>
                                </div>
                                <div class="form-bottom">
                                    <form role="form" action="php/post.prospecto.php" method="post" class="registration-form">
                                        <div class="form-group">
                                            <label class="sr-only" for="form-first-name">First name</label>
                                            <?php echo "<input type='text' name='form-first-name' placeholder='Nombre...' class='form-first-name form-control' id='form-first-name' value='$nombre' required>"; ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="form-last-name">Last name</label>
                                            <?php echo "<input type='text' name='form-last-name' placeholder='Apellido Paterno...' class='form-last-name form-control' id='form-last-name' value='$apellidoPaterno' required>"; ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="form-email">Email</label>
                                            <?php echo "<input type='email' name='form-email' placeholder='Correo...' class='form-email form-control' id='form-email' onblur='validaremail();' value='$correoElectronico' required>"; ?>
                                            <label id="validate"></label>
                                        </div>
                                        <div class="form-group">
                                            <?php echo "<input type='tel' name='form-telephone' placeholder='Teléfono...' class='form-telephone form-control' id='inputCelular' onblur='validarcellphone();'  value='$celular'required>"; ?>
                                            <label id="validatetel"></label>
                                        </div>
                                        <div class="form-group">
                                            <select name='form-producto' id="products-combo" onfocus="productos();" class="form-control">
                                                <option value='1'>Selecciona un curso...</option>
                                            </select>
                                        </div>
                                        <div class="form-group"><h4>Selecciona los días en que deseas ser contactado:</h4></div>
                                            <div class="form-group">
                                                <label class="checkbox-inline">
                                                    <input name='form-day[]' class="checkbox checkbox-primary" id="checkbox2" type="checkbox"  value="L" onclick="validarDias()"> Lunes  
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input name='form-day[]' class="checkbox checkbox-primary" id="checkbox2" type="checkbox" value="M" onclick="validarDias()"> Martes
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input name='form-day[]' class="checkbox checkbox-primary" id="checkbox2" type="checkbox" value="X" onclick="validarDias()"> Miercoles 
                                                </label>
                                                <label class="checkbox-inline">
                                                  <input name='form-day[]' class="checkbox checkbox-primary" id="checkbox2" type="checkbox" value="J" onclick="validarDias()"> Jueves    
                                                </label>
                                                <label class="checkbox-inline">
                                                  <input name='form-day[]' class="checkbox checkbox-primary"  id="checkbox2" type="checkbox" value="V" onclick="validarDias()"> Viernes     
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input name='form-day[]' class="checkbox checkbox-primary"  id="checkbox2" type="checkbox" value="S" onclick="validarDias()"> Sabado    
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input name='form-day[]' class="checkbox checkbox-primary" id="checkbox2" type="checkbox" value="D" onclick="validarDias()"> Domingo     
                                                </label>
                                            </div>
                                            <div class="form-group" id="container-date">
                                                <div class="bootstrap-timepicker" id="time-initial">
                                                    <span>Hora inicio:</span>
                                                    <input name='form-begin-hour' id="timepicker5" type="text" class="input-small"/>
                                                </div>
                                                <div class="bootstrap-timepicker" id= "time-final">
                                                    <span>Hora final:</span>
                                                    <input name='form-end-hour' id="timepicker6" type="text" class="input-small"/>
                                                </div>
                                            </div>
                                            <script type="text/javascript">
                                                $('#timepicker5').timepicker({
                                                    template: false,
                                                    showInputs: false,
                                                    minuteStep: 5
                                                });
                                                  $('#timepicker6').timepicker({
                                                    template: false,
                                                    showInputs: false,
                                                    minuteStep: 5
                                                });
                                                $('.selectpicker').selectpicker();
                                            </script>
                                            <div class="form-group">
                                                <textarea name="form-about-yourself" placeholder="Describe aquí tu duda...(Máximo 240 caracteres)" class="form-about-yourself form-control" id="form-about-yourself"></textarea>
                                            </div>
                                            <div class="form-group">
                                            <label>
                                                Al enviar solicitud<a rel= "milenio.com"> <strong>acepto los terminos y condiciones.</strong></a>
                                                    </label>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn" id="btn_submit"><strong>Enviar Solicitud</strong></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="chat_window_1">
                    <div class="row chat-window col-xs-5 col-md-3">
                        <div class="col-xs-12 col-md-12">
                            <div class="panel panel-default" id="chat">
                                <div class="panel-heading top-bar">
                                    <div class="col-md-8 col-xs-8">
                                        <h3 id="titulo_chat">¿Tienes alguna duda?</h3>
                                    </div>
                                    <div class="col-md-4 col-xs-4 buttons-chat">
                                        <a href="#"><span id="minim_chat_window" class="glyphicon glyphicon-minus icon_minim"></span></a>
                                        <a href="#"><span class="glyphicon glyphicon-remove icon_close" data-id="chat_window_1"></span></a>
                                    </div>
                                </div>
                                <div class="panel-body msg_container_base">
                                    <div class="row msg_container base_sent">
                                        <div class="col-md-10 col-xs-10">
                                    <div class="messages msg_sent">
                                        <p>Buen día,¿En qué podemos ayudarte?</p>
                                        <time datetime="2009-11-13T20:00">Esteban • 5 segundos</time>
                                    </div>
                                    </div>
                                    <div class="col-md-2 col-xs-2 avatar">
                                        <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="input-group">
                                    <input id="btn-input" type="text" class="form-control input-sm chat_input" placeholder="Escribenos aquí y contestaremos tus dudas al momento..." />
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary btn-sm" id="btn-chat">Enviar</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
