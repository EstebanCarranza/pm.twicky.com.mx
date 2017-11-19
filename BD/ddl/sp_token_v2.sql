drop procedure if exists sp_token;
delimiter &&
CREATE PROCEDURE `sp_token`(U_correo varchar(50))
begin
	declare U_existencia boolean;
    declare U_token blob;
    declare U_activo boolean;
	set U_existencia = exists(select token from tbl_token where correoElectronico = U_correo);
    set U_activo = (select activo from tbl_token where correoElectronico = U_correo);
    
    if U_existencia then
		if U_activo then
			select 'el token ya existe' as result, correoElectronico, cast(token as char(1000)) as token from tbl_token;
		else
			select 'el token ya esta activo' as result, correoElectronico, cast(token as char(1000)) as token from tbl_token;
        end if;
	else
		begin
			set U_token = SHA1(U_correo);
			insert into tbl_token (correoElectronico, token) values (U_correo, U_token);
			select 'correcto token insertado' as result, correoElectronico, cast(token as char(1000)) as token from tbl_token where correoElectronico = U_correo;
        end;
    end if;
end