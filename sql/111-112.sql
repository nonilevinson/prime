--*
--* 1.11 para 1.12

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

/************************************************************
	Arquivo CCor      
************************************************************/
INSERT INTO ARQCCOR (IDPRIMARIO, NOME, CLINICA, BANCO, AGENCIA, DVAGENCIA, CONTA, DVCONTA, CARTEIRA, CODCEDENTE, MULTA, JUROS, CBOLETO, ULTREMESSA, CONVENIO, VARIACAO, ATIVO, TPIX1, PIX1, TPIX2, PIX2, TPIX3, PIX3, TPIX4, PIX4, TPIX5, PIX5) VALUES (2, 'CAIXA RECEPÇÃO', NULL, NULL, '', '', '', '', 0, '', 0, 0, 0, 0, '', 0, 1, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '');
INSERT INTO ARQCCOR (IDPRIMARIO, NOME, CLINICA, BANCO, AGENCIA, DVAGENCIA, CONTA, DVCONTA, CARTEIRA, CODCEDENTE, MULTA, JUROS, CBOLETO, ULTREMESSA, CONVENIO, VARIACAO, ATIVO, TPIX1, PIX1, TPIX2, PIX2, TPIX3, PIX3, TPIX4, PIX4, TPIX5, PIX5) VALUES (3, 'CAIXA ASSESSOR', NULL, NULL, '', '', '', '', 0, '', 0, 0, 0, 0, '', 0, 1, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '');
COMMIT WORK;

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

/************************************************************
	Arquivo Usuario   
************************************************************/
drop trigger arqUsuario_log;
drop view v_arqUsuario;
commit;

ALTER TABLE arqUsuario drop Medico;
commit;

RECREATE VIEW V_arqUsuario AS 
	SELECT A0.IDPRIMARIO, A0.USUARIO, A0.NOME, A0.SENHA, A0.GRUPO, A1.GRUPO as GRUPO_GRUPO, A0.VERSAO, A0.EMAIL, A0.CRM, A0.PODEAGENDA, A0.ATIVO, A0.NASCIMENTO, A0.FOTO, A2.CHAVE as Foto_CHAVE, A2.DESCRITOR as Foto_DESCRITOR, A0.FOTO_ARQUIVO, A0.EMAILACES, A0.EMAILACESS, A0.EMAILFINAN
	FROM arqUsuario A0
	left join arqGrupo A1 on A1.IDPRIMARIO = A0.GRUPO
	left join tabLanceTipoImg A2 on A2.IDPRIMARIO = A0.FOTO;
commit;

/************************************************************
	Trigger para Log de arqUsuario
************************************************************/

set term ^;

recreate trigger arqUsuario_LOG for arqUsuario
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Usuario,'' );
else
	valorChave = coalesce( NEW.Usuario,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100005 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Usuario', OLD.Usuario, NEW.Usuario );
	execute procedure set_log( 12, NEW.idPrimario, 'Nome', OLD.Nome, NEW.Nome );
	execute procedure set_log( 12, NEW.idPrimario, 'Grupo', OLD.Grupo, NEW.Grupo );
	execute procedure set_log( 12, NEW.idPrimario, 'Email', OLD.Email, NEW.Email );
	execute procedure set_log( 12, NEW.idPrimario, 'CRM', OLD.CRM, NEW.CRM );
	execute procedure set_log( 12, NEW.idPrimario, 'PodeAgenda', OLD.PodeAgenda, NEW.PodeAgenda );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
	execute procedure set_log( 12, NEW.idPrimario, 'Nascimento', OLD.Nascimento, NEW.Nascimento );
	execute procedure set_log( 12, NEW.idPrimario, 'EmailAces', OLD.EmailAces, NEW.EmailAces );
	execute procedure set_log( 12, NEW.idPrimario, 'EmailAcesS', OLD.EmailAcesS, NEW.EmailAcesS );
	execute procedure set_log( 12, NEW.idPrimario, 'EmailFinan', OLD.EmailFinan, NEW.EmailFinan );
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.Senha is distinct from OLD.Senha )  OR 
		( NEW.Versao is distinct from OLD.Versao )  OR 
		( NEW.Foto is distinct from OLD.Foto )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;

/************************************************************
	Arquivo Consulta  
************************************************************/
drop trigger arqConsulta_log;
drop view v_arqConsulta;
commit;

ALTER TABLE arqConsulta
add /* 17*/	VALPTRATA NUMERIC( 8, 2 ), /* Máscara = N */
add /* 18*/	OBSPTRATA BLOB SUB_TYPE 1 COLLATE PT_BR; /* Máscara =  */
commit;

update arqConsulta set ValPTrata = 0;
commit;

RECREATE VIEW V_arqConsulta AS 
	SELECT A0.IDPRIMARIO, A0.NUM, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.TSTCON, A2.CHAVE as TStCon_CHAVE, A2.DESCRITOR as TStCon_DESCRITOR, A0.TIAGENDA, A3.TIAGENDA as TIAGENDA_TIAGENDA, A0.DATA, A0.HORA, A0.HORACHEGA, A0.PESSOA, A4.NOME as PESSOA_NOME, A4.NUMCELULAR as PESSOA_NUMCELULAR, A0.PRONTUARIO, A0.MEDICO, A5.USUARIO as MEDICO_USUARIO, A0.ASSESSOR, A6.USUARIO as ASSESSOR_USUARIO, A0.CALLCENTER, A7.USUARIO as CALLCENTER_USUARIO, A0.MEDICAATUA, A0.TMOTIVO, A8.CHAVE as TMotivo_CHAVE, A8.DESCRITOR as TMotivo_DESCRITOR, A0.PTRATA, A9.PTRATA as PTRATA_PTRATA, A0.VALPTRATA, A0.OBSPTRATA, A0.CONDUTA, A0.MEDICACAO, A0.FORMAPG, A10.FORMAPG as FORMAPG_FORMAPG, A0.OBS, A0.VALOR
	FROM arqConsulta A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA
	left join tabTStCon A2 on A2.IDPRIMARIO=A0.TSTCON
	left join arqTiAgenda A3 on A3.IDPRIMARIO = A0.TIAGENDA
	left join arqPessoa A4 on A4.IDPRIMARIO = A0.PESSOA
	left join arqUsuario A5 on A5.IDPRIMARIO = A0.MEDICO
	left join arqUsuario A6 on A6.IDPRIMARIO = A0.ASSESSOR
	left join arqUsuario A7 on A7.IDPRIMARIO = A0.CALLCENTER
	left join tabTMotivo A8 on A8.IDPRIMARIO=A0.TMOTIVO
	left join arqPTrata A9 on A9.IDPRIMARIO = A0.PTRATA
	left join arqFormaPg A10 on A10.IDPRIMARIO = A0.FORMAPG;
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
	valorChave = coalesce( OLD.Num,'' );
else
	valorChave = coalesce( NEW.Num,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100039 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Num', OLD.Num, NEW.Num );
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'TStCon', OLD.TStCon, NEW.TStCon );
	execute procedure set_log( 12, NEW.idPrimario, 'TiAgenda', OLD.TiAgenda, NEW.TiAgenda );
	execute procedure set_log( 12, NEW.idPrimario, 'Data', OLD.Data, NEW.Data );
	execute procedure set_log( 12, NEW.idPrimario, 'Hora', OLD.Hora, NEW.Hora );
	execute procedure set_log( 12, NEW.idPrimario, 'HoraChega', OLD.HoraChega, NEW.HoraChega );
	execute procedure set_log( 12, NEW.idPrimario, 'Pessoa', OLD.Pessoa, NEW.Pessoa );
	execute procedure set_log( 12, NEW.idPrimario, 'Medico', OLD.Medico, NEW.Medico );
	execute procedure set_log( 12, NEW.idPrimario, 'Assessor', OLD.Assessor, NEW.Assessor );
	execute procedure set_log( 12, NEW.idPrimario, 'CallCenter', OLD.CallCenter, NEW.CallCenter );
	execute procedure set_log( 12, NEW.idPrimario, 'MedicaAtua', substring( OLD.MedicaAtua from 1 for 255 ), substring( NEW.MedicaAtua from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'TMotivo', OLD.TMotivo, NEW.TMotivo );
	execute procedure set_log( 12, NEW.idPrimario, 'PTrata', OLD.PTrata, NEW.PTrata );
	execute procedure set_log( 12, NEW.idPrimario, 'ValPTrata', OLD.ValPTrata, NEW.ValPTrata );
	execute procedure set_log( 12, NEW.idPrimario, 'ObsPTrata', substring( OLD.ObsPTrata from 1 for 255 ), substring( NEW.ObsPTrata from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'Conduta', substring( OLD.Conduta from 1 for 255 ), substring( NEW.Conduta from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'Medicacao', substring( OLD.Medicacao from 1 for 255 ), substring( NEW.Medicacao from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'FormaPg', OLD.FormaPg, NEW.FormaPg );
	execute procedure set_log( 12, NEW.idPrimario, 'Obs', substring( OLD.Obs from 1 for 255 ), substring( NEW.Obs from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'Valor', OLD.Valor, NEW.Valor );
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
add /* 23*/	CCORREC ligadoComArquivo, /* Ligado com o Arquivo CCor */
add /* 24*/	CCORASS ligadoComArquivo, /* Ligado com o Arquivo CCor */
add /* 25*/	SUBPLARREC ligadoComArquivo, /* Ligado com o Arquivo SubPlano */
add /* 26*/	SUBPLARASS ligadoComArquivo; /* Ligado com o Arquivo SubPlano */
commit;

ALTER TABLE cnfXConfig ADD CONSTRAINT cnfXConfig_FK_CCorRec FOREIGN KEY ( CCORREC ) REFERENCES arqCCor ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE cnfXConfig ADD CONSTRAINT cnfXConfig_FK_CCorAss FOREIGN KEY ( CCORASS ) REFERENCES arqCCor ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE cnfXConfig ADD CONSTRAINT cnfXConfig_FK_SubPlaRRec FOREIGN KEY ( SUBPLARREC ) REFERENCES arqSubPlano ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE cnfXConfig ADD CONSTRAINT cnfXConfig_FK_SubPlaRAss FOREIGN KEY ( SUBPLARASS ) REFERENCES arqSubPlano ON DELETE SET NULL ON UPDATE CASCADE;
commit;

RECREATE VIEW V_cnfXConfig AS 
	SELECT A0.IDPRIMARIO, A0.CPF, A0.LOGACESSO, A0.LOGACESSOS, A0.QTD, A0.QTD2, A0.EMPRESA, A0.ENDE_CEP, A0.ENDE_ENDERECO, A0.ENDE_BAIRRO, A1.BAIRRO as ENDE_BAIRRO_BAIRRO, A0.ENDE_CIDADE, A2.UF as ENDE_CIDADE_UF, A3.CHAVE as ENDE_CIDADE_UF_CHAVE, A3.DESCRITOR as ENDE_CIDADE_UF_DESCRITOR, A2.CIDADE as ENDE_CIDADE_CIDADE, A0.ENDE_DDD, A0.ENDE_TELEFONE, A0.ENDE_DDDCELULAR, A0.ENDE_CELULAR, A0.ENDE_WHATSAPP, A0.CNPJ, A0.EMAIL, A0.SITE, A0.QTASDESMAR, A0.DECLINAR, A0.RECORDIA, A0.CCORREC, A4.NOME as CCORREC_NOME, A0.CCORASS, A5.NOME as CCORASS_NOME, A0.SUBPLARREC, A6.PLANO as SUBPLARREC_PLANO, A7.CODPLANO as SUBPLARREC_PLANO_CODPLANO, A7.PLANO as SUBPLARREC_PLANO_PLANO, A6.CODIGO as SUBPLARREC_CODIGO, A6.NOME as SUBPLARREC_NOME, A0.SUBPLARASS, A8.PLANO as SUBPLARASS_PLANO, A9.CODPLANO as SUBPLARASS_PLANO_CODPLANO, A9.PLANO as SUBPLARASS_PLANO_PLANO, A8.CODIGO as SUBPLARASS_CODIGO, A8.NOME as SUBPLARASS_NOME
	FROM cnfXConfig A0
	left join arqBairro A1 on A1.IDPRIMARIO = A0.ENDE_BAIRRO
	left join arqCidade A2 on A2.IDPRIMARIO = A0.ENDE_CIDADE
	left join tabUF A3 on A3.IDPRIMARIO=A2.UF
	left join arqCCor A4 on A4.IDPRIMARIO = A0.CCORREC
	left join arqCCor A5 on A5.IDPRIMARIO = A0.CCORASS
	left join arqSubPlano A6 on A6.IDPRIMARIO = A0.SUBPLARREC
	left join arqPlano A7 on A7.IDPRIMARIO = A6.PLANO
	left join arqSubPlano A8 on A8.IDPRIMARIO = A0.SUBPLARASS
	left join arqPlano A9 on A9.IDPRIMARIO = A8.PLANO;
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

update cnfXConfig set CCorRec=2, CCorAss=3, SubPlaRRec=9, SubPlaRAss=8;
commit;
