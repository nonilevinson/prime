--*
--* 1.14 para 1.15

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

insert into arqLanceOperacao values(200191,2,'Relatório do contrato de uma consulta','',191,50,0,'');
commit;

/************************************************************
	Arquivo Clinica   
************************************************************/
drop trigger arqClinica_log;
drop view v_arqClinica;
commit;

ALTER TABLE arqClinica
add /* 19*/	SIGLA VARCHAR( 3 ) COLLATE PT_BR; /* Máscara = M */
commit;

RECREATE VIEW V_arqClinica AS 
	SELECT A0.IDPRIMARIO, A0.CLINICA, A0.RAZAO, A0.EMAIL, A0.CNPJ, A0.ENDE_CEP, A0.ENDE_ENDERECO, A0.ENDE_BAIRRO, A1.BAIRRO as ENDE_BAIRRO_BAIRRO, A0.ENDE_CIDADE, A2.UF as ENDE_CIDADE_UF, A3.CHAVE as ENDE_CIDADE_UF_CHAVE, A3.DESCRITOR as ENDE_CIDADE_UF_DESCRITOR, A2.CIDADE as ENDE_CIDADE_CIDADE, A0.ENDE_DDD, A0.ENDE_TELEFONE, A0.ENDE_DDDCELULAR, A0.ENDE_CELULAR, A0.ENDE_WHATSAPP, A0.DATAINI, A0.DATAFIM, A0.ATIVO, A0.MAXAGENDA, A0.SIGLA
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
	execute procedure set_log( 12, NEW.idPrimario, 'DataIni', OLD.DataIni, NEW.DataIni );
	execute procedure set_log( 12, NEW.idPrimario, 'DataFim', OLD.DataFim, NEW.DataFim );
	execute procedure set_log( 12, NEW.idPrimario, 'MaxAgenda', OLD.MaxAgenda, NEW.MaxAgenda );
	execute procedure set_log( 12, NEW.idPrimario, 'Sigla', OLD.Sigla, NEW.Sigla );
end
end^

set term ;^

commit;

update arqClinica set Sigla = 'NI' Where idPrimario = 1;
update arqClinica set Sigla = 'RJ' Where idPrimario = 2;
update arqClinica set Sigla = 'JF' Where idPrimario = 3;
update arqClinica set Sigla = 'CX' Where idPrimario = 4;
update arqClinica set Sigla = 'JO' Where idPrimario = 1269;
commit;
