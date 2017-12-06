<?php

require_once 'modelo.php';

class reportes
{
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
            $result = $datos->dbquery("call sp_ReporteClientesAtendidosCountRows($idAgente, '$orden', '$campo', $limite1, $limite2);");
            $total = 0;
            while($res = mysql_fetch_array($result, MYSQL_ASSOC))	
            {
                $total = intval($total, 10) + 1;
            }

            $datos->cerrar_conexion(true, $result);

            return $total;
        }
    
}

