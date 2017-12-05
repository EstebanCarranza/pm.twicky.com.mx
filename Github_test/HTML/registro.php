
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../Images/Logo.png">
    
    <script type="text/javascript" src="validationsEmail.js" ></script>
    <script type="text/javascript" src="validationsReg.js" ></script>
    <script type="text/javascript" src="validationsCellphone.js" ></script>
    <script type='text/javascript' src='../JS/validarPasswords.js'></script>
    <script src="../JS/jquery-3.1.1.min.js" type="text/javascript"></script>
    <title>Inicio de sesion</title>
    <!-- Bootstrap core CSS -->
    <link href="../CSS/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="../CSS/main-style.css">
    <link rel="stylesheet" href="../CSS/form-elements.css">
    <link rel="stylesheet" href="../CSS/style.css">
    
    <?php require_once 'php/get.registro.php';?>
    <script>
    $(document).ready(function() 
    {
        function validar_contrasenias()
        {
            var idx1 = $("#inputPassword-01").val();
            var idx2 = $("#inputPassword-02").val();
            
            if(idx1 != idx2)
            {
                $("#validar").html("Las contraseñas no coinciden");   
            }
            else
            {
                $("#validar").html("");   
            }
            
        }
	$("#inputPassword-01").keyup(function()
        {
             validar_contrasenias();
        });
        $("#inputPassword-02").keyup(function()
        {
            validar_contrasenias();
        });
        
    });
</script>
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
                            <form class="form-signin" action='php/post.registro.php' method='post' onsubmit="return validarPasswords('inputPassword-01','inputPassword-02')">
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
                                    <?php echo "<input type='hidden' name='form-email' value='$MSG_Correo'>"; ?>
                                    <?php echo "<input readonly type='email' placeholder='Correo...' class='form-email form-control' id='form-email' required value='$MSG_Correo'><label id='validate'></label>"; ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputPassword" class="sr-only">Contraseña</label>
                                    <input type="password" id="inputPassword-01" class="form-control" placeholder="Contraseña..." required name='contrasenia-01'>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword" class="sr-only">Contraseña</label>
                                    <input type="password" id="inputPassword-02" class="form-control" placeholder="Repetir Contraseña..." onblur="equalpassword();" required name='contrasenia-02'>
                                    <label id="validatepass"></label>
                                    <label id='validar'></label>
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
