<?php
  require_once 'php/post.header.php';
    
?>
<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../CSS/main-style.css"/>
<link rel="stylesheet" type="text/css" href="../CSS/form-elements.css"/>
<script src="../JS/header.js"></script>
<header>
    <nav class='navbar navbar-inverse navbar-fixed-top'>
        <div class='container-fluid'>
            <div class='navbar-header'>
                <a class='navbar-brand' href='dashboard.php'><img  class='logo' src='../Images/Logo.png' /></a>
            </div>
            <ul class='list-inline'>
                <li class='list-inline-item'>
                    <h3> ¡Bienvenido <?php echo $nombre ?>! </h3>
                </li>
                <?php $header->botonesExtra() ?>
                <li class='list-inline-item'>
                    <form method='post'>
                    <button name='logout' type='submit' class='btn btn-primary logout' >
                        <strong> Cerrar sesion </strong>
                    </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</header>
