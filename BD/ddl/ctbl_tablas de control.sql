create table ctbl_administrador
(
	idAdministrador 	int not null auto_increment primary key,
    nombre				varchar(50),
    correoElectronico	varchar(50),
    pass				varchar(100)
);
create table ctbl_parametro
(
	idParametro 	int not null auto_increment primary key,
    parametro		text,
    idAdministrador int,
    
    constraint ParametrosAdministrador foreign key (idAdministrador) references ctbl_administrador(idAdministrador)
);

create table ctbl_control
(
	idControl 		int not null auto_increment primary key,
    idParametro 	int not null,
    razon	 		text,
    fecha	 		datetime default current_timestamp,
    idAdministrador	int not null,
    
    constraint parametro foreign key (idParametro) references ctbl_parametro (idParametro),
    constraint administrador foreign key (idAdministrador) references ctbl_administrador (idAdministrador)
);

drop trigger if exists ctgr_control;
delimiter $%
create trigger ctgr_control after insert on ctbl_control for each row
begin
	case new.idParametro 
		when 1 then
			begin
				delete from tbl_historialSeguimiento where idHistorial > 0;
                delete from tbl_seguimiento where idSeguimiento > 0;
                delete from tbl_token where idToken > 0;
				delete from tbl_agente where idAgente > 0;
				delete from tbl_cliente where idCliente > 0;
			end;
        when 2 then
			begin
				insert into tbl_agente 
				(idAgente, alias, nombre, apellidoPaterno, correoElectronico, pass, celular)
				values
				(-1, fn_generarAlias('agente@default', -1,'sin', 'asignar'),'sin', 'asignar', 'agente@default', 'sin.asignar', -1);    
			end;
		when 3 then
			begin 
				delete from tbl_producto where idProducto > 0;
            end;
    end case;
end;