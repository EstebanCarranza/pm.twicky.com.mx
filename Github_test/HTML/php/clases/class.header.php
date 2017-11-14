<?php
require_once 'class.functions.php';
require_once 'class.usuario.php';

class header
{
    public function logout()
    {
        $fun = new funciones();
        $fun->session(false, true, 'login.php','');
    }
    public function validar_sesion()
    {
        $fun = new funciones();
        $fun->session(true, true, 'login.php', '');
        if(!isset($_SESSION['nombreUsuario']))
        {
            $this->logout();
        }
        else 
        {
            $nombre = $_SESSION['nombreUsuario'];
        }
        
        
        return $nombre;
    }

    public function botonesAgente()
    {
        echo "
        <li class='list-inline-item'> 
            <button type='button' class='btn btn-primary reporte-cliente-cliente' onclick=ir_a('reporte-clientes-sin-atender') >
                <strong> Clientes sin atender </strong>
            </button>
        </li>
        <li class='list-inline-item'> 
            <button type='button' class='btn btn-primary reporte-cliente' onclick=ir_a('reporte-clientes-atendidos') >
                <strong> Clientes atendidos </strong>
            </button>
        </li>
        
        ";

    }
    public function botonesCliente()
    {
        echo "<li class='list-inline-item'> 
            <button type='button' class='btn btn-primary reporte-cliente' onclick=ir_a('contacto') >
                <strong> Crear nueva solicitud </strong>
            </button>
        </li>";
    }

    public function botonesExtra()
    {
        if($_SESSION['tipoUsuario'] == "Agente")
        {
            $this->botonesAgente();
        }
        if($_SESSION['tipoUsuario'] == "Cliente")
        {
            $this->botonesCliente();
        }
    }
   
}

 

  
 