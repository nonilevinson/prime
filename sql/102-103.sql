--*
--* 1.02 para 1.03

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

/************************************************************
	TABELA tabTStCon
************************************************************/

/* Daniel:
	AGENDADO - RECEPÇÃO - MEDICO - TESTE - AG. ASSESSOR - ASSESSOR - ATENDIDO - LIBERADO
*/

update tabTStCon set Descritor = 'Recepção' Where idPrimario = 2;
delete from tabTStCon where idPrimario = 3;
update tabTStCon set idPrimario = 3, Chave='3' Where idPrimario = 4;
update tabTStCon set idPrimario = 4, Chave='4' Where idPrimario = 5;
commit;

INSERT INTO tabTStCon VALUES ( 5, '5', 'Ag. Assessor' );
update tabTStCon set Descritor = 'Assessor' Where idPrimario = 6;
commit;

/************************************************************
	Arquivo Duracao
************************************************************/
drop trigger arqDuracao_log;
drop view v_arqDuracao;
commit;

ALTER TABLE arqDuracao drop MaxAgenda;
commit;

ALTER TABLE arqDuracao
add /*  4*/	HORAINI TIME, /* Máscara = Hhmm */
add /*  5*/	HORAFIM TIME, /* Máscara = Hhmm */
add /*  6*/	CONSSAB campoLogico, /* Lógico: 0=Não 1=Sim */
add /*  7*/	CONSDOM campoLogico; /* Lógico: 0=Não 1=Sim */
commit;

update arqDuracao set HoraIni='08:00', HoraFim='20:00', ConsSab=0, ConsDom=0 Where Clinica=1;
update arqDuracao set HoraIni='08:00', HoraFim='20:00', ConsSab=0, ConsDom=0 Where Clinica=2;
update arqDuracao set HoraIni='08:00', HoraFim='20:00', ConsSab=1, ConsDom=1 Where Clinica=3;
update arqDuracao set HoraIni='08:00', HoraFim='20:00', ConsSab=1, ConsDom=0 Where Clinica=4;
update arqDuracao set Inicio= '2021/01/03' where Inicio= '2021/01/01';
update arqDuracao set Inicio= '2021/07/04' where Inicio= '2021/07/01';
commit;

RECREATE VIEW V_arqDuracao AS
	SELECT A0.IDPRIMARIO, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.INICIO, A0.HORAINI, A0.HORAFIM, A0.CONSSAB, A0.CONSDOM, A0.DURACAO
	FROM arqDuracao A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA;
commit;

/************************************************************
	Trigger para Log de arqDuracao
************************************************************/

set term ^;

recreate trigger arqDuracao_LOG for arqDuracao
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
	valorChave='';
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100038 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null );
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null );
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'Inicio', OLD.Inicio, NEW.Inicio );
	execute procedure set_log( 12, NEW.idPrimario, 'HoraIni', OLD.HoraIni, NEW.HoraIni );
	execute procedure set_log( 12, NEW.idPrimario, 'HoraFim', OLD.HoraFim, NEW.HoraFim );
	execute procedure set_log( 12, NEW.idPrimario, 'ConsSab', OLD.ConsSab, NEW.ConsSab );
	execute procedure set_log( 12, NEW.idPrimario, 'ConsDom', OLD.ConsDom, NEW.ConsDom );
	execute procedure set_log( 12, NEW.idPrimario, 'Duracao', OLD.Duracao, NEW.Duracao );
end
end^

set term ;^

commit;

ALTER TABLE arqDuracao
alter IDPRIMARIO position 1,
alter CLINICA position 2,
alter INICIO position 3,
alter HORAINI position 4,
alter HORAFIM position 5,
alter CONSSAB position 6,
alter CONSDOM position 7,
alter DURACAO position 8;
commit;
