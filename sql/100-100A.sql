--*
--* 1.00 para 1.00A

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

/************************************************************
	Arquivo Pessoa
************************************************************/
drop trigger arqPessoa_log;
drop view v_arqPessoa;
commit;


RECREATE VIEW V_arqPessoa AS
	SELECT A0.IDPRIMARIO, A0.NOME, A0.APELIDO, A0.TPESSOA, A1.CHAVE as TPessoa_CHAVE, A1.DESCRITOR as TPessoa_DESCRITOR, A0.TPFPJ, A2.CHAVE as TPFPJ_CHAVE, A2.DESCRITOR as TPFPJ_DESCRITOR, A0.ENDE_CEP, A0.ENDE_ENDERECO, A0.ENDE_BAIRRO, A3.BAIRRO as ENDE_BAIRRO_BAIRRO, A0.ENDE_CIDADE, A4.UF as ENDE_CIDADE_UF, A5.CHAVE as ENDE_CIDADE_UF_CHAVE, A5.DESCRITOR as ENDE_CIDADE_UF_DESCRITOR, A4.CIDADE as ENDE_CIDADE_CIDADE, A0.ENDE_DDD, A0.ENDE_TELEFONE, A0.ENDE_DDDCELULAR, A0.ENDE_CELULAR, A0.ENDE_WHATSAPP, A0.CNPJ, A0.INSCESTAD, A0.INSCMUNIC, A0.NASCIMENTO, A0.IDADE, A0.SEXO, A6.CHAVE as Sexo_CHAVE, A6.DESCRITOR as Sexo_DESCRITOR, A0.ESTCIVIL, A7.CHAVE as EstCivil_CHAVE, A7.DESCRITOR as EstCivil_DESCRITOR, A0.PROFISSAO, A8.PROFISSAO as PROFISSAO_PROFISSAO, A0.CPF, A0.IDENTIDADE, A0.ORGAO, A0.EMISSAO, A0.EMAIL, A0.RECEMAIL, A0.ATIVO, A0.OBS, A0.DESDE, A0.QTODESMAR, A0.MIDIA, A9.MIDIA as MIDIA_MIDIA
	FROM arqPessoa A0
	left join tabTPessoa A1 on A1.IDPRIMARIO=A0.TPESSOA
	left join tabTPFPJ A2 on A2.IDPRIMARIO=A0.TPFPJ
	left join arqBairro A3 on A3.IDPRIMARIO = A0.ENDE_BAIRRO
	left join arqCidade A4 on A4.IDPRIMARIO = A0.ENDE_CIDADE
	left join tabUF A5 on A5.IDPRIMARIO=A4.UF
	left join tabSexo A6 on A6.IDPRIMARIO=A0.SEXO
	left join tabEstCivil A7 on A7.IDPRIMARIO=A0.ESTCIVIL
	left join arqProfissao A8 on A8.IDPRIMARIO = A0.PROFISSAO
	left join arqMidia A9 on A9.IDPRIMARIO = A0.MIDIA;
commit;

/************************************************************
	Trigger para Log de arqPessoa
************************************************************/

set term ^;

recreate trigger arqPessoa_LOG for arqPessoa
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Nome,'' );
else
	valorChave = coalesce( NEW.Nome,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100007 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null );
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null );
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Nome', OLD.Nome, NEW.Nome );
	execute procedure set_log( 12, NEW.idPrimario, 'Apelido', OLD.Apelido, NEW.Apelido );
	execute procedure set_log( 12, NEW.idPrimario, 'TPessoa', OLD.TPessoa, NEW.TPessoa );
	execute procedure set_log( 12, NEW.idPrimario, 'TPFPJ', OLD.TPFPJ, NEW.TPFPJ );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_CEP', OLD.Ende_CEP, NEW.Ende_CEP );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Endereco', OLD.Ende_Endereco, NEW.Ende_Endereco );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Bairro', OLD.Ende_Bairro, NEW.Ende_Bairro );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Cidade', OLD.Ende_Cidade, NEW.Ende_Cidade );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Telefone', OLD.Ende_Telefone, NEW.Ende_Telefone );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_DDDCelular', OLD.Ende_DDDCelular, NEW.Ende_DDDCelular );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Celular', OLD.Ende_Celular, NEW.Ende_Celular );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_WhatsApp', OLD.Ende_WhatsApp, NEW.Ende_WhatsApp );
	execute procedure set_log( 12, NEW.idPrimario, 'CNPJ', OLD.CNPJ, NEW.CNPJ );
	execute procedure set_log( 12, NEW.idPrimario, 'InscEstad', OLD.InscEstad, NEW.InscEstad );
	execute procedure set_log( 12, NEW.idPrimario, 'InscMunic', OLD.InscMunic, NEW.InscMunic );
	execute procedure set_log( 12, NEW.idPrimario, 'Nascimento', OLD.Nascimento, NEW.Nascimento );
	execute procedure set_log( 12, NEW.idPrimario, 'Sexo', OLD.Sexo, NEW.Sexo );
	execute procedure set_log( 12, NEW.idPrimario, 'EstCivil', OLD.EstCivil, NEW.EstCivil );
	execute procedure set_log( 12, NEW.idPrimario, 'Profissao', OLD.Profissao, NEW.Profissao );
	execute procedure set_log( 12, NEW.idPrimario, 'CPF', OLD.CPF, NEW.CPF );
	execute procedure set_log( 12, NEW.idPrimario, 'Identidade', OLD.Identidade, NEW.Identidade );
	execute procedure set_log( 12, NEW.idPrimario, 'Orgao', OLD.Orgao, NEW.Orgao );
	execute procedure set_log( 12, NEW.idPrimario, 'Emissao', OLD.Emissao, NEW.Emissao );
	execute procedure set_log( 12, NEW.idPrimario, 'Email', OLD.Email, NEW.Email );
	execute procedure set_log( 12, NEW.idPrimario, 'RecEmail', OLD.RecEmail, NEW.RecEmail );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
	execute procedure set_log( 12, NEW.idPrimario, 'Obs', substring( OLD.Obs from 1 for 255 ), substring( NEW.Obs from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'Desde', OLD.Desde, NEW.Desde );
	execute procedure set_log( 12, NEW.idPrimario, 'QtoDesmar', OLD.QtoDesmar, NEW.QtoDesmar );
	execute procedure set_log( 12, NEW.idPrimario, 'Midia', OLD.Midia, NEW.Midia );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqTemplate
************************************************************/

set term ^;

recreate trigger arqTemplate_LOG for arqTemplate
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Nome,'' );
else
	valorChave = coalesce( NEW.Nome,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100008 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null );
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null );
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Nome', OLD.Nome, NEW.Nome );
	execute procedure set_log( 12, NEW.idPrimario, 'Template', substring( OLD.Template from 1 for 255 ), substring( NEW.Template from 1 for 255 ) );
end
end^

set term ;^

commit;
