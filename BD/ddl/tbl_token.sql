
drop table if exists tbl_token;
create table tbl_token
(
	idToken int not null auto_increment primary key,
    correoElectronico varchar(100) unique not null,
    token blob,
    fechaCaptura timestamp default current_timestamp,
    diasCaducidad int default 10,
    activo boolean default 1
);
