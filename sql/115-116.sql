--*
--* 1.15 para 1.16

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

insert into arqLanceOperacao values(100054,1,'Cadastro as medicação da consulta','arqCMedica',54,1,0,'');
commit;

/************************************************************
	Arquivo CMedica   
************************************************************/

CREATE TABLE arqCMedica
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	CONSULTA ligadoComArquivo, /* Ligado com o Arquivo Consulta */
	/*  3*/	MEDICAMEN ligadoComArquivo, /* Ligado com o Arquivo Medicamen */
	/*  4*/	/* UNIDADECAL */
	/*  5*/	QTD INTEGER, /* Máscara = N */
	CONSTRAINT arqCMedica_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqCMedica_UK UNIQUE ( Consulta, Medicamen )
);
commit;

CREATE DESC INDEX arqCMedica_IdPrimario_Desc ON arqCMedica (IDPRIMARIO);
commit;

ALTER TABLE arqCMedica ADD UNIDADECAL VARCHAR( 10 ) computed by ( (Select U.Unidade From arqMedicamen M join arqUnidade U on U.idPrimario=M.Unidade Where M.idPrimario=arqCMedica.Medicamen) ); 
ALTER TABLE arqCMedica ALTER UNIDADECAL POSITION 4;
commit;

ALTER TABLE arqCMedica ADD CONSTRAINT arqCMedica_FK_Consulta FOREIGN KEY ( CONSULTA ) REFERENCES arqConsulta ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqCMedica ADD CONSTRAINT arqCMedica_FK_Medicamen FOREIGN KEY ( MEDICAMEN ) REFERENCES arqMedicamen ON DELETE NO ACTION ON UPDATE CASCADE;
commit;

RECREATE VIEW V_arqCMedica AS 
	SELECT A0.IDPRIMARIO, A0.CONSULTA, A1.NUM as CONSULTA_NUM, A0.MEDICAMEN, A2.MEDICAMEN as MEDICAMEN_MEDICAMEN, A0.UNIDADECAL, A0.QTD
	FROM arqCMedica A0
	left join arqConsulta A1 on A1.IDPRIMARIO = A0.CONSULTA
	left join arqMedicamen A2 on A2.IDPRIMARIO = A0.MEDICAMEN;
commit;

/************************************************************
	Trigger para Log de arqCMedica
************************************************************/

set term ^;

recreate trigger arqCMedica_LOG for arqCMedica
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
select coalesce( Consulta_Num, ' ' ) || '-' || coalesce( Medicamen_Medicamen, ' ' ) from v_arqCMedica where idPrimario=( case when(deleting) then (OLD.idPrimario) else (NEW.idPrimario) end ) into :valorChave;
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100054 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Consulta', OLD.Consulta, NEW.Consulta );
	execute procedure set_log( 12, NEW.idPrimario, 'Medicamen', OLD.Medicamen, NEW.Medicamen );
	execute procedure set_log( 12, NEW.idPrimario, 'Qtd', OLD.Qtd, NEW.Qtd );
end
end^

set term ;^

commit;
