/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function ir_a_pag(pagina)
{
    
    switch(pagina)
    {
        case 'index': window.location = 'index.php';    break;
        case 'reporte-clientes': window.location = 'HTML/reporte-clientes.php';    break;
        case 'reporte-de-clientes': window.location = 'HTML/reporte-de-clientes.php';    break;
        case 'reporte-clientes-atendidos': window.location = 'HTML/';    break;
        case 'correo': window.location = ''; break;
        
        default: window.location = 'http://pm.twicky.com.mx';      break;
    }
}
