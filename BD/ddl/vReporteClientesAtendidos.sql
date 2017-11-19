use db_twicky_res;



drop view if exists vReporteClientesAtendidos;
create view vReporteClientesAtendidos 
as
select 
	concat(ifnull(cli.nombre,''), ' ', ifnull(cli.apellidoPaterno,''), ' ', ifnull(cli.apellidoMaterno,'')) as nombre, 
    seg.fechaCaptura as FechaRegistro, 
    (case seg.fechaCalificacion when '0000-00-00 00:00:00' then 'No atendido' else seg.fechaCalificacion end) as FechaAtendido, 
    ifnull(seg.comentarios,'') as duda, 
    ifnull(seg.respuesta,'') as comentario,
    ifnull(pro.descripcion,'')  as producto
from 
	tbl_seguimiento as seg
inner join tbl_cliente as cli on cli.idCliente = seg.idCliente
inner join tbl_producto as pro on pro.idProducto = seg.idProducto

;
    
select * from vReporteClientesAtendidos;