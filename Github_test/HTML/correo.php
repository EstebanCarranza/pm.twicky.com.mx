<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../Images/Logo.png">

        <title>Correo de verificación</title>

        <!-- Bootstrap core CSS -->
        <link href="../CSS/bootstrap.min.css" rel="stylesheet">

        <!--- Custom styles for this template -->

        <link rel="stylesheet" href="../CSS/main-style.css">
        <link rel="stylesheet" href="../CSS/form-elements.css">
       <link rel="stylesheet" href="../CSS/style.css">
       <?php 
            require_once 'php/post.token.php'; 
            $data = new DataCorreo();
       ?>
    </head>

    <body>
        <div class="navbar-header">
            <a class="navbar-brand" style="float:left;margin-left:10px;margin-top:10px;" href="../index.php"><img  class="logo" src="../Images/Logo.png" /></a>
        </div>
        <div class="top-content">
            <div class="inner-bg-login">          
                <div class="col-sm-5">
                    <div class="form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                                <?php $data->get_titles()?>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <form class="form-signin" action='php/post.token.php' method='post'>
                                <label for="inputEmail" class="sr-only">Correo electrónico</label>
                                
                                <div class="form-group">
                                    <label class="sr-only" for="form-email">Email</label>
                                    
                                    <?php 
                                        $data->get_input_()  
                                    ?>
                                </div>
                                <button class="btn" type="submit">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- /container -->
  </body>
</html>