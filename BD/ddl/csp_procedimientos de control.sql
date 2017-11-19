drop procedure if exists csp_inicializarSistema;
delimiter $&
create procedure csp_inicializarSistema(IN U_correoAdministrador varchar(50), IN U_passAdministrador varchar(100), IN U_razonDeInicializacion text)
begin
	
    declare U_idAdministrador int;
    
    set U_idAdministrador = (select idAdministrador from ctbl_administrador where correoElectronico = U_correoAdministrador AND pass = U_passAdministrador);
	
    if U_idAdministrador is null then
		select 'No hay administrador' as result;
    else 
		begin
			insert into ctbl_control (idParametro, razon, idAdministrador) values (1, U_razonDeInicializacion, U_idAdministrador);
            alter table tbl_historialSeguimiento auto_increment 0;
			alter table tbl_seguimiento auto_increment 0;
			alter table tbl_token auto_increment 0;
			alter table tbl_agente auto_increment 0;
			alter table tbl_cliente auto_increment 0;
		end;
	end if;
end; 
$&

delimiter ;
drop function if exists cfn_crearAgenteDefault;
delimiter $%$
create function cfn_crearAgenteDefault( U_correoAdministrador varchar(50), U_passAdministrador varchar(100))
returns boolean
begin 
	declare U_idAdministrador int;
    
    set U_idAdministrador = (select idAdministrador from ctbl_administrador where correoElectronico = U_correoElectronico AND pass = U_passAdministrador);
	
    if U_idAdministrador is null then
		return false;
    else
		begin
			insert into ctbl_control (idParametro, razon, idAdministrador) values (2, U_razonDeInicializacion, U_idAdministrador);
            return true;
        end;
    end if;
	return false;
end;
$%$
delimiter ;
drop procedure if exists csp_inicializarProductos;
delimiter $%$
create procedure csp_inicializarProductos(IN U_correoAdministrador varchar(50), IN U_passAdministrador varchar(100))
begin
	declare U_idAdministrador int;
    
    set U_idAdministrador = (select idAdministrador from ctbl_administrador where correoElectronico = U_correoElectronico AND pass = U_passAdministrador);
	
    if U_idAdministrador is null then
		select 'No hay administrador' as result;
    else 
		begin
			insert into ctbl_control (idParametro, razon, idAdministrador) values (3, U_razonDeInicializacion, U_idAdministrador);
			alter table tbl_producto auto_increment 0;
		end;
	end if;
end;
$%$
delimiter ;
drop procedure if exists csp_crearAgente;
delimiter $%
create procedure csp_crearAgente
(
	IN U_nombre varchar(50), IN U_apellidoPaterno varchar(50), IN U_correoElectronico varchar(50), IN U_pass varchar(100), IN U_celular decimal(15,0)
)
begin
	declare correoDup boolean;
    declare celularDup boolean;
    declare U_alias varchar(25);
    declare aliasDup boolean;
    
    set U_alias = (select fn_generarAlias(U_correoElectronico, U_celular, U_nombre, U_apellidoPaterno));
    set correoDup = (exists(select correoElectronico from tbl_agente where correoElectronico = U_correoElectronico));
    set celularDup = (exists(select celular from tbl_agente where celular = U_celular));
    set aliasDup = (exists(select alias from tbl_agente where alias = U_alias));
    
    if correoDup AND celularDup AND aliasDup then
		select 'Datos duplicados' as result;
    else
		begin
			insert into tbl_agente 
			(alias, nombre, apellidoPaterno, correoElectronico, pass, celular)
			values
			(U_alias, U_nombre, U_apellidoPaterno, U_correoElectronico, U_pass, U_celular);
			if row_count() > 0 then select 'OK' as result; 
			else select 'NO OK' as result;
			end if;
		end;
    end if;
end;
