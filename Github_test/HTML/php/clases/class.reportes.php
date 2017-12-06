<?php

require_once 'modelo.php';

class reportes
{
    public function ClienteVerHistorial ($idCliente, $idSeguimiento, $orden, $limite1, $limite2)
    {
        $datos = new BaseDatos();
        $datos->abrir_conexion();
        $result = $datos->dbquery("call sp_VerHistorialSeguimiento($idSeguimiento, $idCliente,'$orden', $limite1, $limite2);");

        while($res = mysql_fetch_array($result, MYSQL_ASSOC))	
        {
            echo "<tr>
                   
                    <td>$res[nombreCliente]</td>
                    <td>
                        $res[nombreAgente]
                    </td>
                     <td>$res[comentario]</td>
                    <td>$res[fechaCreacion]</td>
                    <td>$res[fechaSeguimiento]</td>
                  </tr>";
        }

         $datos->cerrar_conexion(true, $result);
    }
     public function getTotalClienteVerHistorial($idCliente, $idSeguimiento, $orden, $limite1, $limite2)
        {
            //
            $datos = new BaseDatos();
            $datos->abrir_conexion();
            $result = $datos->dbquery("call sp_VerHistorialSeguimientoCountRows($idSeguimiento, $idCliente, '$orden', $limite1, $limite2);");
            $total = 0;
            while($res = mysql_fetch_array($result, MYSQL_ASSOC))	
            {
                $total = intval($total, 10) + 1;
            }

            $datos->cerrar_conexion(true, $result);

            return $total;
        }
    
    
    public function solicitudesAtendidasPorCliente ($idCliente, $orden, $campo, $limite1, $limite2)
    {
        $datos = new BaseDatos();
        $datos->abrir_conexion();
        $result = $datos->dbquery("call sp_infoSolicitudesClienteCalificados($idCliente, '$orden', $limite1, $limite2);");

        while($res = mysql_fetch_array($result, MYSQL_ASSOC))	
        {
            echo "<tr>
                    <td>$res[idSeguimiento]</td>
                    <td>$res[fechaRegistro]</td>
                    <td>$res[producto]</td>
                    <td>$res[comentarios]</td>
                    <td>
                        <form action='ver-historial.php' method='get'>
                                <input name='folio' type='hidden' value='$res[idSeguimiento]'>
                                <button type='submit' class='btn btn-primary center-obj btn-calificando'> 
                                    Ver historial
                                </button>
                            </form>
                    </td>
                  </tr>";
        }

         $datos->cerrar_conexion(true, $result);
    }
    
      public function getTotalSolicitudesAtendidasPorCliente($idCliente, $orden, $campo, $limite1, $limite2)
        {
            //
            $datos = new BaseDatos();
            $datos->abrir_conexion();
            $result = $datos->dbquery("call sp_infoSolicitudesClienteCalificadosCountRows($idCliente, '$orden', $limite1, $limite2);");
            $total = 0;
            while($res = mysql_fetch_array($result, MYSQL_ASSOC))	
            {
                $total = intval($total, 10) + 1;
            }

            $datos->cerrar_conexion(true, $result);

            return $total;
        }
    public function clientes_atendidos($idAgente, $orden, $campo, $limite1, $limite2)
    {
         
        $datos = new BaseDatos();
            $datos->abrir_conexion();
            $result = $datos->dbquery("call sp_ReporteClientesAtendidos($idAgente, '$orden', '$campo', $limite1, $limite2);");

            while($res = mysql_fetch_array($result, MYSQL_ASSOC))	
            {
                echo "<tr>
                        <td>$res[nombre]</td>
                        <td>$res[FechaAtendido]</td>
                        <td>$res[duda]</td>
                        <td>$res[comentarioCierre]</td>
                        <td>$res[producto]</td>
                      </tr>";
            }

            $datos->cerrar_conexion(true, $result);
    }
        public function getTotalClientesAtendidos($idAgente, $orden, $campo, $limite1, $limite2)
        {
            //
            $datos = new BaseDatos();
            $datos->abrir_conexion();
            $result = $datos->dbquery("call sp_ReporteClientesAtendidosCountRows($idAgente, '$orden', '$campo', $limite1, $limite2);");
            $total = 0;
            while($res = mysql_fetch_array($result, MYSQL_ASSOC))	
            {
                $total = intval($total, 10) + 1;
            }

            $datos->cerrar_conexion(true, $result);

            return $total;
        }
    
        
    public function clientes_sin_atender($idAgente, $orden, $campo, $limite1, $limite2)
    {
         
        $datos = new BaseDatos();
            $datos->abrir_conexion();
            $result = $datos->dbquery("call sp_ReporteClientesSinAtender($idAgente, '$orden', '$campo', $limite1, $limite2);");

            while($res = mysql_fetch_array($result, MYSQL_ASSOC))	
            {
                echo "<tr>
                        <td>$res[nombre]</td>
                        <td>$res[fechaRegistro]</td>
                        <td>$res[duda]</td>
                        <td>$res[respuesta]</td>
                        <td>$res[producto]</td>
                        
                        <td>
                            <form action='atender-solicitud.php' method='get'>
                                <input name='folio' type='hidden' value='$res[idSeguimiento]'>
                                <button type='submit' class='btn btn-primary center-obj btn-calificando'> 
                                    Ver solicitud
                                </button>
                            </form>
                        </td> 
                      </tr>";
            }

            $datos->cerrar_conexion(true, $result);
    }
    
    public function getTotalClientesSinAtender($idAgente, $orden, $campo, $limite1, $limite2)
        {
            //
            $datos = new BaseDatos();
            $datos->abrir_conexion();
            $result = $datos->dbquery("call sp_ReporteClientesSinAtenderCountRows($idAgente, '$orden', '$campo', $limite1, $limite2);");
            $total = 0;
            while($res = mysql_fetch_array($result, MYSQL_ASSOC))	
            {
                $total = intval($total, 10) + 1;
            }

            $datos->cerrar_conexion(true, $result);

            return $total;
        }
    
}

