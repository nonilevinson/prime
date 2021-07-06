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

/************************************************************
	Arquivo Clinica
************************************************************/
drop trigger arqClinica_log;
drop view v_arqClinica;
commit;

ALTER TABLE arqClinica drop HoraIni, drop HoraFim, drop ConsSab, drop ConsDom;
commit;

ALTER TABLE arqClinica
add /* 16*/	MAXAGENDA INTEGER; /* Máscara = N */
commit;

update arqClinica set MaxAgenda=60;
commit;

RECREATE VIEW V_arqClinica AS
	SELECT A0.IDPRIMARIO, A0.CLINICA, A0.RAZAO, A0.EMAIL, A0.CNPJ, A0.ENDE_CEP, A0.ENDE_ENDERECO, A0.ENDE_BAIRRO, A1.BAIRRO as ENDE_BAIRRO_BAIRRO, A0.ENDE_CIDADE, A2.UF as ENDE_CIDADE_UF, A3.CHAVE as ENDE_CIDADE_UF_CHAVE, A3.DESCRITOR as ENDE_CIDADE_UF_DESCRITOR, A2.CIDADE as ENDE_CIDADE_CIDADE, A0.ENDE_DDD, A0.ENDE_TELEFONE, A0.ENDE_DDDCELULAR, A0.ENDE_CELULAR, A0.ENDE_WHATSAPP, A0.ATIVO, A0.MAXAGENDA
	FROM arqClinica A0
	left join arqBairro A1 on A1.IDPRIMARIO = A0.ENDE_BAIRRO
	left join arqCidade A2 on A2.IDPRIMARIO = A0.ENDE_CIDADE
	left join tabUF A3 on A3.IDPRIMARIO=A2.UF;
commit;

/************************************************************
	Trigger para Log de arqClinica
************************************************************/

set term ^;

recreate trigger arqClinica_LOG for arqClinica
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Clinica,'' );
else
	valorChave = coalesce( NEW.Clinica,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100031 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null );
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null );
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'Razao', OLD.Razao, NEW.Razao );
	execute procedure set_log( 12, NEW.idPrimario, 'Email', OLD.Email, NEW.Email );
	execute procedure set_log( 12, NEW.idPrimario, 'CNPJ', OLD.CNPJ, NEW.CNPJ );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_CEP', OLD.Ende_CEP, NEW.Ende_CEP );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Endereco', OLD.Ende_Endereco, NEW.Ende_Endereco );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Bairro', OLD.Ende_Bairro, NEW.Ende_Bairro );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Cidade', OLD.Ende_Cidade, NEW.Ende_Cidade );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Telefone', OLD.Ende_Telefone, NEW.Ende_Telefone );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_DDDCelular', OLD.Ende_DDDCelular, NEW.Ende_DDDCelular );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Celular', OLD.Ende_Celular, NEW.Ende_Celular );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_WhatsApp', OLD.Ende_WhatsApp, NEW.Ende_WhatsApp );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
	execute procedure set_log( 12, NEW.idPrimario, 'MaxAgenda', OLD.MaxAgenda, NEW.MaxAgenda );
end
end^

set term ;^

commit;
