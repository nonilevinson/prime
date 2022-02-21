--*
--* 1.19 para 1.20

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

insert into arqLanceOperacao values(300005,3,'Pode alterar campos de separação de medicação da consulta - Estoque?','',5,1,0,'');
commit;

/************************************************************
	Arquivo HoraBloq  
************************************************************/
drop trigger arqHoraBloq_log;
drop view v_arqHoraBloq;
commit;

ALTER TABLE arqHoraBloq
add /*  8*/	MEDICO ligadoComArquivo; /* Ligado com o Arquivo Usuario */
commit;

ALTER TABLE arqHoraBloq ADD CONSTRAINT arqHoraBloq_FK_Medico FOREIGN KEY ( MEDICO ) REFERENCES arqUsuario ON DELETE CASCADE ON UPDATE CASCADE;
commit;

RECREATE VIEW V_arqHoraBloq AS 
	SELECT A0.IDPRIMARIO, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.NOME, A0.DATAINI, A0.HORAINI, A0.DATAFIM, A0.HORAFIM, A0.MEDICO, A2.USUARIO as MEDICO_USUARIO
	FROM arqHoraBloq A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA
	left join arqUsuario A2 on A2.IDPRIMARIO = A0.MEDICO;
commit;

/************************************************************
	Trigger para Log de arqHoraBloq
************************************************************/

set term ^;

recreate trigger arqHoraBloq_LOG for arqHoraBloq
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
	valorChave='';
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100037 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'Nome', OLD.Nome, NEW.Nome );
	execute procedure set_log( 12, NEW.idPrimario, 'DataIni', OLD.DataIni, NEW.DataIni );
	execute procedure set_log( 12, NEW.idPrimario, 'HoraIni', OLD.HoraIni, NEW.HoraIni );
	execute procedure set_log( 12, NEW.idPrimario, 'DataFim', OLD.DataFim, NEW.DataFim );
	execute procedure set_log( 12, NEW.idPrimario, 'HoraFim', OLD.HoraFim, NEW.HoraFim );
	execute procedure set_log( 12, NEW.idPrimario, 'Medico', OLD.Medico, NEW.Medico );
end
end^

set term ;^

commit;
