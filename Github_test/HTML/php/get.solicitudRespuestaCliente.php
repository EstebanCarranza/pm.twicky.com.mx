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
    <div class='btn-paginas btn-paginas-cerrar slc-div-content'>
        <form action='php/post.responder-solicitud-cliente' method='post'>
            <input name='folio' type='hidden' value='$folio'>
            <input name='funcion' type='hidden' value='cerrar-folio'>
            <input name='respuesta' required id='razon-input' type='text' class='form-control input-sm response_input slc-objects slc-input-folio' placeholder='Razón de cierre de folio...' />
            <button type='submit' class='btn slc-objects slc-submit-folio' id=''>Cerrar folio</button>
       </form>
    </div>
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
        <form action='php/post.responder-solicitud-cliente.php' method='post'>
            <div class='input-group'>
                <input name='folio' type='hidden' value='$folio'>
                <input name='funcion' type='hidden' value='responder-folio'>
                <input name='respuesta' required id='btn-input' type='text' class='form-control input-sm response_input' placeholder='Escribenos la respuesta al cliente aquí...' />
                <span class='input-group-btn'>
                <button class='btn btn-primary btn-sm' id='btn-chat'>Responder</button>
                </span>
            </div>
        </form>
    </div>
    
    <div class='btn-paginas btn-paginas-solicitud'>
        <form action='ver-historial.php' method='get'>
        <input name='folio' type='hidden' value='$folio'>
            <input name='funcion' type='hidden' value='ver-historial'>
            <button class='btn' id='btn-atender'>Ver historial</button>   
        </form>
    </div>
    ";