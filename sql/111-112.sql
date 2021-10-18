--*
--* 1.11 para 1.12

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

/************************************************************
	Arquivo TiAgenda  
************************************************************/
drop view v_arqTiAgenda;
commit;

ALTER TABLE arqTiAgenda drop AgTopo, drop AgForm;
commit;

RECREATE VIEW V_arqTiAgenda AS 
	SELECT A0.IDPRIMARIO, A0.TIAGENDA, A0.ATIVO, A0.DOBROTEMPO, A0.PAGAMENTO, A0.MIDIA
	FROM arqTiAgenda A0;
commit;

/************************************************************
	Arquivo Grupo     
************************************************************/
drop trigger arqGrupo_log;
drop view v_arqGrupo;
commit;

ALTER TABLE arqGrupo
add /*  3*/	CALLCENTER campoLogico, /* Lógico: 0=Não 1=Sim */
add /*  4*/	MEDICO campoLogico, /* Lógico: 0=Não 1=Sim */
add /*  5*/	ASSESSOR campoLogico; /* Lógico: 0=Não 1=Sim */
commit;

update arqGrupo set CallCenter=0, Medico=0, Assessor=0;
update arqGrupo set CallCenter=1, Medico=0, Assessor=0 Where idPrimario=2;
update arqGrupo set CallCenter=0, Medico=1, Assessor=0 Where idPrimario=4;
update arqGrupo set CallCenter=0, Medico=0, Assessor=1 Where idPrimario=7;
commit;

RECREATE VIEW V_arqGrupo AS 
	SELECT A0.IDPRIMARIO, A0.GRUPO, A0.CALLCENTER, A0.MEDICO, A0.ASSESSOR
	FROM arqGrupo A0;
commit;

/************************************************************
	Trigger para Log de arqGrupo
************************************************************/

set term ^;

recreate trigger arqGrupo_LOG for arqGrupo
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Grupo,'' );
else
	valorChave = coalesce( NEW.Grupo,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100004 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Grupo', OLD.Grupo, NEW.Grupo );
	execute procedure set_log( 12, NEW.idPrimario, 'CallCenter', OLD.CallCenter, NEW.CallCenter );
	execute procedure set_log( 12, NEW.idPrimario, 'Medico', OLD.Medico, NEW.Medico );
	execute procedure set_log( 12, NEW.idPrimario, 'Assessor', OLD.Assessor, NEW.Assessor );
end
end^

set term ;^

commit;
