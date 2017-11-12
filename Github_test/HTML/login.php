
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../Images/Logo.png">

    <title>Inicio de sesion</title>

    <!-- Bootstrap core CSS -->
    <link href="../CSS/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    
	<link rel="stylesheet" href="../CSS/main-style.css">
      <link rel="stylesheet" href="../CSS/form-elements.css">
       <link rel="stylesheet" href="../CSS/style.css">
         <link rel="stylesheet" href="../CSS/login-style.css">
  </head>

  <body>
      	<div class="navbar-header">
							<a class="navbar-brand" href="../index.php"><img  class="logo" src="../Images/Logo.png" /></a>
						</div>
    <div class="top-content">
               <div class="inner-bg-login">          
                        <div class="col-sm-5 login">
                        	<div class="form-box">
                        		<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h1 id="login-title"><strong>¡Bienvenido a twicky!</strong></h1>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
      <form class="form-signin" action='php/post.login.php' method='post'>
        <label for="inputEmail" class="sr-only">Correo electrónico</label>
             <div class="form-group">
				                        	<label class="sr-only" for="form-email">Email</label>
				                        	<input type="email" name="form-email" placeholder="Correo..." class="form-email form-control" id="form-email" required>
				                        </div>
            <div class="form-group">
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña..." required name='password'>
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
