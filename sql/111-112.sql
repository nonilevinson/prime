--*
--* 1.11 para 1.12

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

insert into arqLanceOperacao values(200176,2,'Rotina para criar Saída de caixa da Recepção','',176,10,0,'');
insert into arqLanceOperacao values(200177,2,'Rotina para criar Entrada de caixa da Recepção','',177,10,0,'');
insert into arqLanceOperacao values(200180,2,'Rotina para criar Saída de caixa de Assesor','',180,10,0,'');
insert into arqLanceOperacao values(200181,2,'Rotina para criar Entrada de caixa de Assesor','',181,10,0,'');
insert into arqLanceOperacao values(200184,2,'Rotina para criar o a receber de tratamento de uma consulta','',184,10,0,'');
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
add /* 18*/	OBSPTRATA BLOB SUB_TYPE 1 COLLATE PT_BR, /* Máscara =  */
add /* 24*/	CONTACONS ligadoComArquivo, /* Ligado com o Arquivo Conta */
add /* 25*/	CONTAPTRA ligadoComArquivo; /* Ligado com o Arquivo Conta */
commit;

update arqConsulta set ValPTrata = 0;
commit;

ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_ContaCons FOREIGN KEY ( CONTACONS ) REFERENCES arqConta ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_ContaPTra FOREIGN KEY ( CONTAPTRA ) REFERENCES arqConta ON DELETE NO ACTION ON UPDATE CASCADE;
commit;

RECREATE VIEW V_arqConsulta AS 
	SELECT A0.IDPRIMARIO, A0.NUM, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.TSTCON, A2.CHAVE as TStCon_CHAVE, A2.DESCRITOR as TStCon_DESCRITOR, A0.TIAGENDA, A3.TIAGENDA as TIAGENDA_TIAGENDA, A0.DATA, A0.HORA, A0.HORACHEGA, A0.PESSOA, A4.NOME as PESSOA_NOME, A4.NUMCELULAR as PESSOA_NUMCELULAR, A0.PRONTUARIO, A0.MEDICO, A5.USUARIO as MEDICO_USUARIO, A0.ASSESSOR, A6.USUARIO as ASSESSOR_USUARIO, A0.CALLCENTER, A7.USUARIO as CALLCENTER_USUARIO, A0.MEDICAATUA, A0.TMOTIVO, A8.CHAVE as TMotivo_CHAVE, A8.DESCRITOR as TMotivo_DESCRITOR, A0.PTRATA, A9.PTRATA as PTRATA_PTRATA, A0.VALPTRATA, A0.OBSPTRATA, A0.CONDUTA, A0.MEDICACAO, A0.FORMAPG, A10.FORMAPG as FORMAPG_FORMAPG, A0.OBS, A0.VALOR, A0.CONTACONS, A11.TRANSACAO as CONTACONS_TRANSACAO, A0.CONTAPTRA, A12.TRANSACAO as CONTAPTRA_TRANSACAO
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
	left join arqFormaPg A10 on A10.IDPRIMARIO = A0.FORMAPG
	left join arqConta A11 on A11.IDPRIMARIO = A0.CONTACONS
	left join arqConta A12 on A12.IDPRIMARIO = A0.CONTAPTRA;
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
	execute procedure set_log( 12, NEW.idPrimario, 'ContaCons', OLD.ContaCons, NEW.ContaCons );
	execute procedure set_log( 12, NEW.idPrimario, 'ContaPTra', OLD.ContaPTra, NEW.ContaPTra );
end
end^

set term ;^

commit;

ALTER TABLE arqConsulta
alter IDPRIMARIO position 1,
alter NUM position 2,
alter CLINICA position 3,
alter TSTCON position 4,
alter TIAGENDA position 5,
alter DATA position 6,
alter HORA position 7,
alter HORACHEGA position 8,
alter PESSOA position 9,
alter PRONTUARIO position 10,
alter MEDICO position 11,
alter ASSESSOR position 12,
alter CALLCENTER position 13,
alter MEDICAATUA position 14,
alter TMOTIVO position 15,
alter FORMAPG position 16,
alter VALOR position 17,
alter PTRATA position 18,
alter VALPTRATA position 19,
alter OBSPTRATA position 20,
alter CONDUTA position 21,
alter MEDICACAO position 22,
alter OBS position 23,
alter CONTACONS position 24,
alter CONTAPTRA position 25;
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

/************************************************************
	Arquivo FormaPg   
************************************************************/
drop trigger arqFormaPg_log;
drop view v_arqFormaPg;
commit;

ALTER TABLE arqFormaPg
add /*  3*/	DINHEIRO campoLogico, /* Lógico: 0=Não 1=Sim */
add /*  4*/	CARTAO campoLogico, /* Lógico: 0=Não 1=Sim */
add /*  5*/	DIAS SMALLINT, /* Máscara = N */
add /*  6*/	TAXADEB NUMERIC( 4, 2 ), /* Máscara = N */
add /*  7*/	TAXA2 NUMERIC( 4, 2 ), /* Máscara = N */
add /*  8*/	TAXA3 NUMERIC( 4, 2 ); /* Máscara = N */
commit;

update arqFormaPg set Dinheiro =1, Cartao=0, Dias=0, TaxaDeb=0,Taxa2=0, Taxa3=0 Where idPrimario = 1;
update arqFormaPg set Dinheiro =0, Cartao=1, Dias=1, TaxaDeb=0.94,Taxa2=0, Taxa3=0 Where idPrimario = 2;
update arqFormaPg set Dinheiro =0, Cartao=1, Dias=1, TaxaDeb=0,Taxa2=3.33, Taxa3=4.07 Where idPrimario = 3;
update arqFormaPg set Dinheiro =0, Cartao=0, Dias=0, TaxaDeb=0,Taxa2=0, Taxa3=0 Where idPrimario = 4;
update arqFormaPg set Dinheiro =0, Cartao=0, Dias=0, TaxaDeb=0,Taxa2=0, Taxa3=0 Where idPrimario = 5;
commit;

RECREATE VIEW V_arqFormaPg AS 
	SELECT A0.IDPRIMARIO, A0.FORMAPG, A0.DINHEIRO, A0.CARTAO, A0.DIAS, A0.TAXADEB, A0.TAXA2, A0.TAXA3, A0.ATIVO
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
	execute procedure set_log( 12, NEW.idPrimario, 'Dinheiro', OLD.Dinheiro, NEW.Dinheiro );
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

ALTER TABLE arqFormaPg
alter IDPRIMARIO position 1,
alter FORMAPG position 2,
alter DINHEIRO position 3,
alter CARTAO position 4,
alter DIAS position 5,
alter TAXADEB position 6,
alter TAXA2 position 7,
alter TAXA3 position 8,
alter ATIVO position 9;
commit;

/************************************************************
	Arquivo PTrata    
************************************************************/
drop trigger arqPTrata_log;
drop view v_arqPTrata;
commit;

ALTER TABLE arqPTrata
add /*  3*/	APELIDO VARCHAR( 10 ) COLLATE PT_BR; /* Máscara = M */
commit;

update arqPTrata set Apelido = left( Ptrata, 10 );
commit;

RECREATE VIEW V_arqPTrata AS 
	SELECT A0.IDPRIMARIO, A0.PTRATA, A0.APELIDO, A0.VALOR, A0.DESCRICAO, A0.ATIVO
	FROM arqPTrata A0;
commit;

/************************************************************
	Trigger para Log de arqPTrata
************************************************************/

set term ^;

recreate trigger arqPTrata_LOG for arqPTrata
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.PTrata,'' );
else
	valorChave = coalesce( NEW.PTrata,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100032 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'PTrata', OLD.PTrata, NEW.PTrata );
	execute procedure set_log( 12, NEW.idPrimario, 'Apelido', OLD.Apelido, NEW.Apelido );
	execute procedure set_log( 12, NEW.idPrimario, 'Valor', OLD.Valor, NEW.Valor );
	execute procedure set_log( 12, NEW.idPrimario, 'Descricao', substring( OLD.Descricao from 1 for 255 ), substring( NEW.Descricao from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
end
end^

set term ;^

commit;

ALTER TABLE arqPTrata
alter IDPRIMARIO position 1,
alter PTRATA position 2,
alter APELIDO position 3,
alter VALOR position 4,
alter DESCRICAO position 5,
alter ATIVO position 6;
commit;

/************************************************************
	Arquivo Parcela   
************************************************************/
drop trigger arqParcela_log;
drop view v_arqParcela;
commit;

ALTER TABLE arqParcela
add /* 23*/	FORMAPG ligadoComArquivo; /* Ligado com o Arquivo FormaPg */
commit;

ALTER TABLE arqParcela ADD CONSTRAINT arqParcela_FK_FormaPg FOREIGN KEY ( FORMAPG ) REFERENCES arqFormaPg ON DELETE NO ACTION ON UPDATE CASCADE;
commit;

RECREATE VIEW V_arqParcela AS 
	SELECT A0.IDPRIMARIO, A0.CONTA, A1.TRANSACAO as CONTA_TRANSACAO, A0.CLINICACAL, A0.TPGRECCAL, A0.PESSOACAL, A0.PARCELA, A0.VENCIMENTO, A0.VENCEST, A0.VALOR, A0.VALORLIQ, A0.ESTIMADO, A0.TFCOBRA, A2.CHAVE as TFCobra_CHAVE, A2.DESCRITOR as TFCobra_DESCRITOR, A0.EMISSAO, A0.NUMBOLETO, A0.LINHADIG, A0.NOMEPDF, A0.CCOR, A3.NOME as CCOR_NOME, A0.SUBPLANO, A4.PLANO as SUBPLANO_PLANO, A5.CODPLANO as SUBPLANO_PLANO_CODPLANO, A5.PLANO as SUBPLANO_PLANO_PLANO, A4.CODIGO as SUBPLANO_CODIGO, A4.NOME as SUBPLANO_NOME, A0.DATAPAGTO, A0.DATACOMP, A0.TFPAGTO, A6.CHAVE as TFPagto_CHAVE, A6.DESCRITOR as TFPagto_DESCRITOR, A0.TDETPG, A7.CHAVE as TDetPg_CHAVE, A7.DESCRITOR as TDetPg_DESCRITOR, A0.FORMAPG, A8.FORMAPG as FORMAPG_FORMAPG, A0.CHEQUE, A0.ARQ1, A0.Arq1_ARQUIVO, A0.STRETORNO, A0.REMESSA, A0.DATAREM
	FROM arqParcela A0
	left join arqConta A1 on A1.IDPRIMARIO = A0.CONTA
	left join tabTFCobra A2 on A2.IDPRIMARIO=A0.TFCOBRA
	left join arqCCor A3 on A3.IDPRIMARIO = A0.CCOR
	left join arqSubPlano A4 on A4.IDPRIMARIO = A0.SUBPLANO
	left join arqPlano A5 on A5.IDPRIMARIO = A4.PLANO
	left join tabTFPagto A6 on A6.IDPRIMARIO=A0.TFPAGTO
	left join tabTDetPg A7 on A7.IDPRIMARIO=A0.TDETPG
	left join arqFormaPg A8 on A8.IDPRIMARIO = A0.FORMAPG;
commit;

/************************************************************
	Trigger para Log de arqParcela
************************************************************/

set term ^;

recreate trigger arqParcela_LOG for arqParcela
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
select coalesce( Conta_Transacao, ' ' ) || '-' || coalesce( Parcela, ' ' ) from v_arqParcela where idPrimario=( case when(deleting) then (OLD.idPrimario) else (NEW.idPrimario) end ) into :valorChave;
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100034 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Conta', OLD.Conta, NEW.Conta );
	execute procedure set_log( 12, NEW.idPrimario, 'Parcela', OLD.Parcela, NEW.Parcela );
	execute procedure set_log( 12, NEW.idPrimario, 'Vencimento', OLD.Vencimento, NEW.Vencimento );
	execute procedure set_log( 12, NEW.idPrimario, 'VencEst', OLD.VencEst, NEW.VencEst );
	execute procedure set_log( 12, NEW.idPrimario, 'Valor', OLD.Valor, NEW.Valor );
	execute procedure set_log( 12, NEW.idPrimario, 'ValorLiq', OLD.ValorLiq, NEW.ValorLiq );
	execute procedure set_log( 12, NEW.idPrimario, 'Estimado', OLD.Estimado, NEW.Estimado );
	execute procedure set_log( 12, NEW.idPrimario, 'TFCobra', OLD.TFCobra, NEW.TFCobra );
	execute procedure set_log( 12, NEW.idPrimario, 'Emissao', OLD.Emissao, NEW.Emissao );
	execute procedure set_log( 12, NEW.idPrimario, 'CCor', OLD.CCor, NEW.CCor );
	execute procedure set_log( 12, NEW.idPrimario, 'SubPlano', OLD.SubPlano, NEW.SubPlano );
	execute procedure set_log( 12, NEW.idPrimario, 'DataPagto', OLD.DataPagto, NEW.DataPagto );
	execute procedure set_log( 12, NEW.idPrimario, 'DataComp', OLD.DataComp, NEW.DataComp );
	execute procedure set_log( 12, NEW.idPrimario, 'TFPagto', OLD.TFPagto, NEW.TFPagto );
	execute procedure set_log( 12, NEW.idPrimario, 'TDetPg', OLD.TDetPg, NEW.TDetPg );
	execute procedure set_log( 12, NEW.idPrimario, 'FormaPg', OLD.FormaPg, NEW.FormaPg );
	execute procedure set_log( 12, NEW.idPrimario, 'Cheque', OLD.Cheque, NEW.Cheque );
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.LinhaDig is distinct from OLD.LinhaDig )  OR 
		( NEW.NomePdf is distinct from OLD.NomePdf )  OR 
		( NEW.Arq1 is distinct from OLD.Arq1 )  OR 
		( NEW.StRetorno is distinct from OLD.StRetorno )  OR 
		( NEW.Remessa is distinct from OLD.Remessa )  OR 
		( NEW.DataRem is distinct from OLD.DataRem )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;

ALTER TABLE arqParcela
alter IDPRIMARIO position 1,
alter CONTA position 2,
alter CLINICACAL position 3,
alter TPGRECCAL position 4,
alter PESSOACAL position 5,
alter PARCELA position 6,
alter VENCIMENTO position 7,
alter VENCEST position 8,
alter VALOR position 9,
alter VALORLIQ position 10,
alter ESTIMADO position 11,
alter TFCOBRA position 12,
alter EMISSAO position 13,
alter NUMBOLETO position 14,
alter LINHADIG position 15,
alter NOMEPDF position 16,
alter CCOR position 17,
alter SUBPLANO position 18,
alter DATAPAGTO position 19,
alter DATACOMP position 20,
alter TFPAGTO position 21,
alter TDETPG position 22,
alter FORMAPG position 23,
alter CHEQUE position 24,
alter ARQ1 position 25,
alter ARQ1_ARQUIVO position 26,
alter STRETORNO position 27,
alter REMESSA position 28,
alter DATAREM position 29;
commit;
