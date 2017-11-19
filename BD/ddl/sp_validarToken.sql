CREATE DEFINER=`ACTPM`@`%` PROCEDURE `sp_validarToken`(
	U_token blob
)
begin 
	declare p_token blob;
    declare p_activo boolean;
    
    /* Busca que el token coincida, este activo y que este dentro de los dias activos */
    set p_token = ( select token 
					from tbl_token 
                    where token = U_token 
                    and datediff(now(), fechaCaptura) <= diasCaducidad
					);
	set p_activo = (select activo from tbl_token where token = U_token);
                    
	/* Si está vacio regresa el error */
	if p_token is null then
		select "Token invalido" as result;
	else 
    /* Si cumple los requisitos regresa éxito*/
		begin
			if p_activo then
				begin
					update tbl_token set activo = 0 where token = U_token;
					select "Token Correcto" as result;
				end;
				else 
					select "Token ya activo" as result;
				end if;
			end;
	end if;
end