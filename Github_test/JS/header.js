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
        case 'reporte-clientes.php': window.location = pagina;    break;
        case 'reporte-de-clientes.php': window.location = pagina;    break;
        case 'reporte-clientes-atendidos.php': window.location = pagina;    break;
        
        
        default: window.location = '../index.php';      break;
    }
}
