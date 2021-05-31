--*
--* 1.00 para 1.00A
/*
delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;
*/
/************************************************************
	Arquivo Consulta
************************************************************/
drop trigger arqConsulta_log;
drop view v_arqConsulta;
drop TABLE arqConsulta;
commit;

CREATE TABLE arqConsulta
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	PRONTUARIO NUMERIC(18,0), /* Máscara = N */
	/*  3*/	CLINICA ligadoComArquivo, /* Ligado com o Arquivo Clinica */
	/*  4*/	DATA DATE, /* Máscara = 4ano */
	/*  5*/	HORA TIME, /* Máscara = Hhmm */
	/*  6*/	HORACHEGA TIME, /* Máscara = Hhmm */
	/*  7*/	MEDICO ligadoComArquivo, /* Ligado com o Arquivo Usuario */
	/*  8*/	PESSOA ligadoComArquivo, /* Ligado com o Arquivo Pessoa */
	/*  9*/	ASSESSOR ligadoComArquivo, /* Ligado com o Arquivo Usuario */
	/* 10*/	MKT ligadoComArquivo, /* Ligado com o Arquivo Usuario */
	/* 11*/	RECEPCAO ligadoComArquivo, /* Ligado com o Arquivo Usuario */
	/* 12*/	MEDICAATUA BLOB SUB_TYPE 1 COLLATE PT_BR, /* Máscara =  */
	/* 13*/	TMOTIVO ligadoComTabela, /* Ligado com a Tabela TMotivo */
	/* 14*/	TPROGRAMA ligadoComTabela, /* Ligado com a Tabela TPrograma */
	/* 15*/	CONDUTA BLOB SUB_TYPE 1 COLLATE PT_BR, /* Máscara =  */
	/* 16*/	MEDICACAO BLOB SUB_TYPE 1 COLLATE PT_BR, /* Máscara =  */
	CONSTRAINT arqConsulta_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqConsulta_UK UNIQUE ( PRONTUARIO )
);
commit;

CREATE DESC INDEX arqConsulta_IdPrimario_Desc ON arqConsulta (IDPRIMARIO);
commit;

ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_Clinica FOREIGN KEY ( CLINICA ) REFERENCES arqClinica ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_Medico FOREIGN KEY ( MEDICO ) REFERENCES arqUsuario ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_Pessoa FOREIGN KEY ( PESSOA ) REFERENCES arqPessoa ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_Assessor FOREIGN KEY ( ASSESSOR ) REFERENCES arqUsuario ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_Mkt FOREIGN KEY ( MKT ) REFERENCES arqUsuario ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_Recepcao FOREIGN KEY ( RECEPCAO ) REFERENCES arqUsuario ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_TMotivo FOREIGN KEY ( TMOTIVO ) REFERENCES tabTMotivo ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_TPrograma FOREIGN KEY ( TPROGRAMA ) REFERENCES tabTPrograma ON DELETE SET NULL ON UPDATE CASCADE;
commit;

RECREATE VIEW V_arqConsulta AS
	SELECT A0.IDPRIMARIO, A0.PRONTUARIO, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.DATA, A0.HORA, A0.HORACHEGA, A0.MEDICO, A2.USUARIO as MEDICO_USUARIO, A0.PESSOA, A3.NOME as PESSOA_NOME, A0.ASSESSOR, A4.USUARIO as ASSESSOR_USUARIO, A0.MKT, A5.USUARIO as MKT_USUARIO, A0.RECEPCAO, A6.USUARIO as RECEPCAO_USUARIO, A0.MEDICAATUA, A0.TMOTIVO, A7.CHAVE as TMotivo_CHAVE, A7.DESCRITOR as TMotivo_DESCRITOR, A0.TPROGRAMA, A8.CHAVE as TPrograma_CHAVE, A8.DESCRITOR as TPrograma_DESCRITOR, A0.CONDUTA, A0.MEDICACAO
	FROM arqConsulta A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA
	left join arqUsuario A2 on A2.IDPRIMARIO = A0.MEDICO
	left join arqPessoa A3 on A3.IDPRIMARIO = A0.PESSOA
	left join arqUsuario A4 on A4.IDPRIMARIO = A0.ASSESSOR
	left join arqUsuario A5 on A5.IDPRIMARIO = A0.MKT
	left join arqUsuario A6 on A6.IDPRIMARIO = A0.RECEPCAO
	left join tabTMotivo A7 on A7.IDPRIMARIO=A0.TMOTIVO
	left join tabTPrograma A8 on A8.IDPRIMARIO=A0.TPROGRAMA;
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
	valorChave = coalesce( OLD.PRONTUARIO,'' );
else
	valorChave = coalesce( NEW.PRONTUARIO,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100039 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null );
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null );
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'PRONTUARIO', OLD.PRONTUARIO, NEW.PRONTUARIO );
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'Data', OLD.Data, NEW.Data );
	execute procedure set_log( 12, NEW.idPrimario, 'Hora', OLD.Hora, NEW.Hora );
	execute procedure set_log( 12, NEW.idPrimario, 'HoraChega', OLD.HoraChega, NEW.HoraChega );
	execute procedure set_log( 12, NEW.idPrimario, 'Medico', OLD.Medico, NEW.Medico );
	execute procedure set_log( 12, NEW.idPrimario, 'Pessoa', OLD.Pessoa, NEW.Pessoa );
	execute procedure set_log( 12, NEW.idPrimario, 'Assessor', OLD.Assessor, NEW.Assessor );
	execute procedure set_log( 12, NEW.idPrimario, 'Mkt', OLD.Mkt, NEW.Mkt );
	execute procedure set_log( 12, NEW.idPrimario, 'Recepcao', OLD.Recepcao, NEW.Recepcao );
	execute procedure set_log( 12, NEW.idPrimario, 'MedicaAtua', substring( OLD.MedicaAtua from 1 for 255 ), substring( NEW.MedicaAtua from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'TMotivo', OLD.TMotivo, NEW.TMotivo );
	execute procedure set_log( 12, NEW.idPrimario, 'TPrograma', OLD.TPrograma, NEW.TPrograma );
	execute procedure set_log( 12, NEW.idPrimario, 'Conduta', substring( OLD.Conduta from 1 for 255 ), substring( NEW.Conduta from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'Medicacao', substring( OLD.Medicacao from 1 for 255 ), substring( NEW.Medicacao from 1 for 255 ) );
end
end^

set term ;^

commit;
