
drop view if exists vReporteClientesAtendidos;
create view vReporteClientesAtendidos 
as
select 
	concat(ifnull(cli.nombre,''), ' ', ifnull(cli.apellidoPaterno,''), ' ', ifnull(cli.apellidoMaterno,'')) as nombre, 
    seg.fechaCaptura as FechaRegistro, 
    (case seg.fechaCalificacion when '0000-00-00 00:00:00' then 'No atendido' else seg.fechaCalificacion end) as FechaAtendido, 
    ifnull(seg.comentarios,'') as duda, 
    ifnull(seg.respuesta,'') as comentario,
    ifnull(pro.descripcion,'')  as producto,
    seg.idCliente as idCliente,
    seg.idAgente as idAgente,
    seg.idProducto as idProducto
from 
	tbl_seguimiento as seg
inner join tbl_cliente as cli on cli.idCliente = seg.idCliente
inner join tbl_producto as pro on pro.idProducto = seg.idProducto

;
    
drop procedure if exists sp_ReporteClientesAtendidos;
delimiter //
create procedure sp_ReporteClientesAtendidos (U_idAgente int, U_orden varchar(50), U_campo varchar(50), U_limite1 int, U_limite2 int)
begin
	case U_orden 
    when 'ASC' then
		select * from vReporteClientesAtendidos 
		where idAgente = U_idAgente  
		order by
			case when U_campo = 'nombre'			then nombre end asc,
			case when U_campo = 'FechaRegistro' 	then FechaRegistro end asc, 
			case when U_campo = 'FechaAtendido' 	then FechaAtendido end asc,
			case when U_campo = 'duda'				then duda end asc,
			case when U_campo = 'producto' 	 		then producto end asc,
			case when U_campo = 'idAgente' 	 		then idAgente end asc,
			case when U_campo = 'idCliente'	 		then idCliente end asc,
			case when U_campo = 'idProducto'		then idProducto end asc
		limit U_limite1, U_limite2;
	when 'DESC' then 
		select * from vReporteClientesAtendidos 
		where idAgente = U_idAgente  
		order by
			case when U_campo = 'nombre'			then nombre end desc,
			case when U_campo = 'FechaRegistro' 	then FechaRegistro end desc, 
			case when U_campo = 'FechaAtendido' 	then FechaAtendido end desc,
			case when U_campo = 'duda'				then duda end desc,
			case when U_campo = 'producto' 	 		then producto end desc,
			case when U_campo = 'idAgente' 	 		then idAgente end desc,
			case when U_campo = 'idCliente'	 		then idCliente end desc,
			case when U_campo = 'idProducto'		then idProducto end desc
		limit U_limite1, U_limite2;
    end case;
    
end;