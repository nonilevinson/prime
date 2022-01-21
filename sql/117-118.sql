--*
--* 1.17 para 1.18

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

/************************************************************
	Arquivo FormaPg   
************************************************************/
drop trigger arqFormaPg_log;
drop view v_arqFormaPg;
commit;

ALTER TABLE arqFormaPg
add /*  3*/	PODEENTRA campoLogico, /* Lógico: 0=Não 1=Sim */
alter PodeEntra position 3;
commit;

update arqFormaPg set PodeEntra=1;
update arqFormaPg set PodeEntra=0 Where idPrimario=6;
commit;

RECREATE VIEW V_arqFormaPg AS 
	SELECT A0.IDPRIMARIO, A0.FORMAPG, A0.PODEENTRA, A0.DINHEIRO, A0.BOLETO, A0.CARTAO, A0.DIAS, A0.TAXADEB, A0.TAXA2, A0.TAXA3, A0.ATIVO
	FROM arqFormaPg A0;
commit;

/************************************************************
	Trigger para Log de arqFormaPg
************************************************************/

set term ^;

recreate trigger arqFormaPg_LOG for arqFormaPg
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.FormaPg,'' );
else
	valorChave = coalesce( NEW.FormaPg,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100044 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'FormaPg', OLD.FormaPg, NEW.FormaPg );
	execute procedure set_log( 12, NEW.idPrimario, 'PodeEntra', OLD.PodeEntra, NEW.PodeEntra );
	execute procedure set_log( 12, NEW.idPrimario, 'Dinheiro', OLD.Dinheiro, NEW.Dinheiro );
	execute procedure set_log( 12, NEW.idPrimario, 'Boleto', OLD.Boleto, NEW.Boleto );
	execute procedure set_log( 12, NEW.idPrimario, 'Cartao', OLD.Cartao, NEW.Cartao );
	execute procedure set_log( 12, NEW.idPrimario, 'Dias', OLD.Dias, NEW.Dias );
	execute procedure set_log( 12, NEW.idPrimario, 'TaxaDeb', OLD.TaxaDeb, NEW.TaxaDeb );
	execute procedure set_log( 12, NEW.idPrimario, 'Taxa2', OLD.Taxa2, NEW.Taxa2 );
	execute procedure set_log( 12, NEW.idPrimario, 'Taxa3', OLD.Taxa3, NEW.Taxa3 );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
end
end^

set term ;^

commit;

/************************************************************
	Parâmetro XConfig   
************************************************************/
drop trigger cnfXConfig_log;
drop view v_cnfXConfig;
commit;

ALTER TABLE cnfXConfig
add /* 29*/	DIASSDENTR SMALLINT; /* Máscara = N */
commit;

update cnfXConfig set DiasSdEntr=10;
commit;

RECREATE VIEW V_cnfXConfig AS 
	SELECT A0.IDPRIMARIO, A0.CPF, A0.LOGACESSO, A0.LOGACESSOS, A0.QTD, A0.QTD2, A0.EMPRESA, A0.ENDE_CEP, A0.ENDE_ENDERECO, A0.ENDE_BAIRRO, A1.BAIRRO as ENDE_BAIRRO_BAIRRO, A0.ENDE_CIDADE, A2.UF as ENDE_CIDADE_UF, A3.CHAVE as ENDE_CIDADE_UF_CHAVE, A3.DESCRITOR as ENDE_CIDADE_UF_DESCRITOR, A2.CIDADE as ENDE_CIDADE_CIDADE, A0.ENDE_DDD, A0.ENDE_TELEFONE, A0.ENDE_DDDCELULAR, A0.ENDE_CELULAR, A0.ENDE_WHATSAPP, A0.CNPJ, A0.EMAIL, A0.SITE, A0.QTASDESMAR, A0.DECLINAR, A0.RECORDIA, A0.CCORREC, A4.NOME as CCORREC_NOME, A0.CCORASS, A5.NOME as CCORASS_NOME, A0.SUBPLARREC, A6.PLANO as SUBPLARREC_PLANO, A7.CODPLANO as SUBPLARREC_PLANO_CODPLANO, A7.PLANO as SUBPLARREC_PLANO_PLANO, A6.CODIGO as SUBPLARREC_CODIGO, A6.NOME as SUBPLARREC_NOME, A0.SUBPLARASS, A8.PLANO as SUBPLARASS_PLANO, A9.CODPLANO as SUBPLARASS_PLANO_CODPLANO, A9.PLANO as SUBPLARASS_PLANO_PLANO, A8.CODIGO as SUBPLARASS_CODIGO, A8.NOME as SUBPLARASS_NOME, A0.FORNREC, A10.NOME as FORNREC_NOME, A0.BOLETOMIN, A0.DIASSDENTR
	FROM cnfXConfig A0
	left join arqBairro A1 on A1.IDPRIMARIO = A0.ENDE_BAIRRO
	left join arqCidade A2 on A2.IDPRIMARIO = A0.ENDE_CIDADE
	left join tabUF A3 on A3.IDPRIMARIO=A2.UF
	left join arqCCor A4 on A4.IDPRIMARIO = A0.CCORREC
	left join arqCCor A5 on A5.IDPRIMARIO = A0.CCORASS
	left join arqSubPlano A6 on A6.IDPRIMARIO = A0.SUBPLARREC
	left join arqPlano A7 on A7.IDPRIMARIO = A6.PLANO
	left join arqSubPlano A8 on A8.IDPRIMARIO = A0.SUBPLARASS
	left join arqPlano A9 on A9.IDPRIMARIO = A8.PLANO
	left join arqFornecedor A10 on A10.IDPRIMARIO = A0.FORNREC;
commit;

/************************************************************
	Trigger para Log de cnfXConfig
************************************************************/

set term ^;

recreate trigger cnfXConfig_LOG for cnfXConfig
active after Insert or Delete or Update
position 999
as
begin
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100017 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', '' );
begin
	execute procedure set_log( 12, NEW.idPrimario, 'Empresa', OLD.Empresa, NEW.Empresa );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_CEP', OLD.Ende_CEP, NEW.Ende_CEP );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Endereco', OLD.Ende_Endereco, NEW.Ende_Endereco );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Bairro', OLD.Ende_Bairro, NEW.Ende_Bairro );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Cidade', OLD.Ende_Cidade, NEW.Ende_Cidade );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Telefone', OLD.Ende_Telefone, NEW.Ende_Telefone );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_DDDCelular', OLD.Ende_DDDCelular, NEW.Ende_DDDCelular );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Celular', OLD.Ende_Celular, NEW.Ende_Celular );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_WhatsApp', OLD.Ende_WhatsApp, NEW.Ende_WhatsApp );
	execute procedure set_log( 12, NEW.idPrimario, 'Email', OLD.Email, NEW.Email );
	execute procedure set_log( 12, NEW.idPrimario, 'Site', OLD.Site, NEW.Site );
	execute procedure set_log( 12, NEW.idPrimario, 'QtasDesmar', OLD.QtasDesmar, NEW.QtasDesmar );
	execute procedure set_log( 12, NEW.idPrimario, 'Declinar', OLD.Declinar, NEW.Declinar );
	execute procedure set_log( 12, NEW.idPrimario, 'RecorDia', OLD.RecorDia, NEW.RecorDia );
	execute procedure set_log( 12, NEW.idPrimario, 'CCorRec', OLD.CCorRec, NEW.CCorRec );
	execute procedure set_log( 12, NEW.idPrimario, 'CCorAss', OLD.CCorAss, NEW.CCorAss );
	execute procedure set_log( 12, NEW.idPrimario, 'SubPlaRRec', OLD.SubPlaRRec, NEW.SubPlaRRec );
	execute procedure set_log( 12, NEW.idPrimario, 'SubPlaRAss', OLD.SubPlaRAss, NEW.SubPlaRAss );
	execute procedure set_log( 12, NEW.idPrimario, 'FornRec', OLD.FornRec, NEW.FornRec );
	execute procedure set_log( 12, NEW.idPrimario, 'BoletoMin', OLD.BoletoMin, NEW.BoletoMin );
	execute procedure set_log( 12, NEW.idPrimario, 'DiasSdEntr', OLD.DiasSdEntr, NEW.DiasSdEntr );
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.CPF is distinct from OLD.CPF )  OR 
		( NEW.LogAcesso is distinct from OLD.LogAcesso )  OR 
		( NEW.LogAcessoS is distinct from OLD.LogAcessoS )  OR 
		( NEW.Qtd is distinct from OLD.Qtd )  OR 
		( NEW.Qtd2 is distinct from OLD.Qtd2 )  OR 
		( NEW.CNPJ is distinct from OLD.CNPJ )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;
