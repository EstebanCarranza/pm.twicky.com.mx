<?php

/* 
    esteban.carranza
 */
  
    
?>
<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../CSS/main-style.css"/>
<link rel="stylesheet" type="text/css" href="../CSS/form-elements.css"/>
<script src="../JS/header.js"></script>
<header>
    <nav class='navbar navbar-inverse navbar-fixed-top'>
        <div class='container-fluid'>
            <div class='navbar-header'>
                <a class='navbar-brand' href='../index.php'><img  class='logo' src='../Images/Logo.png' /></a>
            </div>
            <ul class='list-inline'>
                <li class='list-inline-item'>
                    <h3> ¡Hola [nombre de agente] ! </h3>
                </li>
                <li class='list-inline-item'> 
                    <button type='button' class='btn btn-primary reporte-cliente' onclick=ir_a('reporte-clientes.php') >
                        <strong> Reporte de clientes </strong>
                    </button>
                </li>
                <li class='list-inline-item'> 
                    <button type='button' class='btn btn-primary reporte-producto' onclick=ir_a('reporte-de-productos') >
                        <strong> Reporte de productos </strong>
                    </button>
                </li>
                <li class='list-inline-item'> 
                    <button type='button' class='btn btn-primary logout' onclick='location='../index.php''>
                        <strong> Cerrar sesion </strong>
                    </button>
                </li>
            </ul>
        </div>
    </nav>
</header>

