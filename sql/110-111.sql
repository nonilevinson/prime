--*
--* 1.10 para 1.11

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

/************************************************************
	Arquivo Profissao 
************************************************************/
drop trigger arqProfissao_log;
drop view v_arqProfissao;
commit;

ALTER TABLE arqProfissao
add /*  3*/	ATIVO campoLogico; /* Lógico: 0=Não 1=Sim */
commit;

update arqProfissao set Ativo = 1;
commit;

RECREATE VIEW V_arqProfissao AS 
	SELECT A0.IDPRIMARIO, A0.PROFISSAO, A0.ATIVO
	FROM arqProfissao A0;
commit;

/************************************************************
	Trigger para Log de arqProfissao
************************************************************/

set term ^;

recreate trigger arqProfissao_LOG for arqProfissao
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Profissao,'' );
else
	valorChave = coalesce( NEW.Profissao,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100036 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Profissao', OLD.Profissao, NEW.Profissao );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
end
end^

set term ;^

commit;
