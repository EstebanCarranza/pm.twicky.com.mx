/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function ir_a(pagina)
{
    
    switch(pagina)
    {
        case 'index': window.location = '../index.php';    break;
        case 'reporte-clientes': window.location = 'reporte-clientes.php';    break;
        case 'reporte-clientes-atendidos': window.location = 'reporte-clientes-atendidos.php';    break;
        case 'contacto': window.location = 'contacto.php';    break;
        
        default: window.location = '../index.php';      break;
    }
}
