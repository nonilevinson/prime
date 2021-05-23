--*
--* 1.00 para 1.00A

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

/************************************************************
	Arquivo Consulta
************************************************************/
drop trigger arqConsulta_log;
drop view v_arqConsulta;
ALTER TABLE arqConsulta drop CONSTRAINT arqConsulta_FK_Assessor;
commit;

ALTER TABLE arqConsulta alter Assesor to Assessor;
commit;

ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_Assessor FOREIGN KEY ( ASSESSOR ) REFERENCES arqUsuario ON DELETE NO ACTION ON UPDATE CASCADE;
commit;

RECREATE VIEW V_arqConsulta AS
	SELECT A0.IDPRIMARIO, A0.PROTOCOLO, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.DATA, A0.HORA, A0.HORACHEGA, A0.MEDICO, A2.USUARIO as MEDICO_USUARIO, A0.PESSOA, A3.NOME as PESSOA_NOME, A0.ASSESSOR, A4.USUARIO as ASSESSOR_USUARIO, A0.MKT, A5.USUARIO as MKT_USUARIO, A0.RECEPCAO, A6.USUARIO as RECEPCAO_USUARIO
	FROM arqConsulta A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA
	left join arqUsuario A2 on A2.IDPRIMARIO = A0.MEDICO
	left join arqPessoa A3 on A3.IDPRIMARIO = A0.PESSOA
	left join arqUsuario A4 on A4.IDPRIMARIO = A0.ASSESSOR
	left join arqUsuario A5 on A5.IDPRIMARIO = A0.MKT
	left join arqUsuario A6 on A6.IDPRIMARIO = A0.RECEPCAO;
commit;

/************************************************************
	Trigger para Log de arqConsulta
************************************************************/

set term ^;

recreate trigger arqConsulta_LOG for arqConsulta
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Protocolo,'' );
else
	valorChave = coalesce( NEW.Protocolo,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100039 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null );
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null );
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Protocolo', OLD.Protocolo, NEW.Protocolo );
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'Data', OLD.Data, NEW.Data );
	execute procedure set_log( 12, NEW.idPrimario, 'Hora', OLD.Hora, NEW.Hora );
	execute procedure set_log( 12, NEW.idPrimario, 'HoraChega', OLD.HoraChega, NEW.HoraChega );
	execute procedure set_log( 12, NEW.idPrimario, 'Medico', OLD.Medico, NEW.Medico );
	execute procedure set_log( 12, NEW.idPrimario, 'Pessoa', OLD.Pessoa, NEW.Pessoa );
	execute procedure set_log( 12, NEW.idPrimario, 'Assessor', OLD.Assessor, NEW.Assessor );
	execute procedure set_log( 12, NEW.idPrimario, 'Mkt', OLD.Mkt, NEW.Mkt );
	execute procedure set_log( 12, NEW.idPrimario, 'Recepcao', OLD.Recepcao, NEW.Recepcao );
end
end^

set term ;^

commit;
