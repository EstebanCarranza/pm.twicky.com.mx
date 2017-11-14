<DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Twicky</title>
    
	<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../CSS/form-elements.css"/>
        <link rel="stylesheet" type="text/css" href="../CSS/main-style.css"/>
	<script src="../JS/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script> 
            function pagAnt(pagina)
            {
                
                pagina = parseInt(pagina) - 10;
                window.location = 'dashboard.php?pag=' + pagina;
            }
            function pagSig(pagina)
            {
                
                pagina = parseInt(pagina) + 10;
                window.location = 'dashboard.php?pag=' + pagina;
            }
        </script>
</head>
<body>
    <?php
        include('header.php');
        require_once 'php/post.dashboard.php';
    ?>
</body>

</DOCTYPE>