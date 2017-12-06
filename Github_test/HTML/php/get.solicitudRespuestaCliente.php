<?php
 require_once 'clases/class.solicitud.php';

 
if(isset($_GET['folio']))
{
    $folio = $_GET['folio'];
    $solicitud = new solicitud();
   
}
else
{
    echo "<script> window.location = 'dashboard.php'; </script>";
}

echo "
    <div class='panel-body msg_container_base panel-body-solicitud'>       
        <div class='row msg_container base_sent'>
            <div class='col-md-2 col-xs-2 avatar'>
                <div class='messages msg_sent'>
                    <img src='../Images/profile.jpg' class=' img-responsive' style='width: 100%;'>
                </div>
            </div>";
            $solicitud->obtenerSolicitud($folio);
echo "
        </div>
        <form id='src-frm-ResponderSolicitud' action='php/post.responder-solicitud-cliente.php' method='post'>
            <div class='input-group'>
                <input name='folio' type='hidden' value='$folio'>
                <input name='funcion' type='hidden' value='responder-folio'>
                <input name='respuesta' required id='btn-input' type='text' class='form-control input-sm response_input' placeholder='Puedes responderle al agente desde aqui :D' />
                <span class='input-group-btn'>
                <button class='btn btn-primary btn-sm' id='btn-chat'>Responder</button>
                </span>
            </div>
        </form>
    </div>
    ";
    
    echo "
    <div id='src-btn-verHistorial' class='btn-paginas btn-paginas-solicitud'>
        <form action='ver-historial.php' method='get'>
        <input name='folio' type='hidden' value='$folio'>
            <input name='funcion' type='hidden' value='ver-historial'>
            <button class='btn' id='btn-atender'>Ver historial</button>   
        </form>
    </div>
    ";
    
     echo "
        <div id='src-btn-regresar' class='btn-paginas btn-paginas-solicitud'>
        <form action='dashboard.php' method='post'>
            <button class='btn' id='btn-atender'>Regresar</button>   
        </form>
    </div>
    ";