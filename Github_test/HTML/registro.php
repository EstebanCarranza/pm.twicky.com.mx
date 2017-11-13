
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../Images/Logo.png">
    <script type="text/javascript" src="validations.js" ></script>
    <script type="text/javascript" src="validationTel.js" ></script>

    <title>Inicio de sesion</title>

    <!-- Bootstrap core CSS -->
    <link href="../CSS/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    
	<link rel="stylesheet" href="../CSS/main-style.css">
      <link rel="stylesheet" href="../CSS/form-elements.css">
       <link rel="stylesheet" href="../CSS/style.css">
	    <?php
	   
		if(isset($_GET['mensaje']))	$mensaje = $_GET['mensaje']; else $mensaje = "";
	   ?>
  </head>

  <body>
      <div class="navbar-header">
							<a class="navbar-brand" style="float:left;margin-left:10px;margin-top:10px;" href="../index.php"><img  class="logo" src="../Images/Logo.png" /></a>
						</div>
    <div class="top-content">
               <div class="inner-bg-login">          
                        <div class="col-sm-5" id="form-registro">
                        	<div class="form-box">
                        		<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h1 id="login-title"><strong>¡Uneté a Twicky!</strong></h1>
										<?php if ($mensaje != "") echo "<h1><strong> $mensaje </strong></h1>";?>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
      <form class="form-signin" action='php/post.registro.php' method='post'>
        <div class="form-group">
        <label for="inputNombre" class="sr-only">Nombre</label>
        <input type="text" id="inputNombre" class="form-control" placeholder="Nombre..." required autofocus name='nombre'>
          </div>
           <div class="form-group">
        <label for="inputApellido" class="sr-only">Apellido</label>
        <input type="text" id="inputApellido" class="form-control" placeholder="Apellido..." required autofocus name='apellidoPaterno'>
          </div>
          <div class="form-group">
        <label for="inputCelular" class="sr-only">Celular</label>
        <input type="tel" id="inputCelular" class="form-control form-telephone" placeholder="Celular..." onblur="validarcellphone();" required autofocus name='celular'>
	<label id="validatetel"></label>
          </div>
          <div class="form-group">
			<label class="sr-only" for="form-email">Email</label>
			<input type="email" name="form-email" placeholder="Correo..." class="form-email form-control" id="form-email" onblur="validaremail();" required><label id="validate"></label>
		</div>
		<div class="form-group">
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña..." required name='contrasenia-01'>
          </div>
          <div class="form-group">
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Repetir Contraseña..." required name='contrasenia-02'>
          </div>
        <button class="btn" type="submit">Iniciar sesión</button>
      </form>
                        </div>
                    </div>
                   </div>
        </div>
    </div> <!-- /container -->
  </body>
</html>
