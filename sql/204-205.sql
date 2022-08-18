--*
--* 2.04 para 2.05

insert into arqLanceOperacao values(200283,2,'Relatório de extrato de consultas','',283,50,0,'');
commit;

/************************************************************
	Arquivo TStCon    
************************************************************/
drop view v_arqTStCon;
commit;

ALTER TABLE arqTStCon
add /* 10*/	EHDESMAPAC campoLogico, /* Lógico: 0=Não 1=Sim */
add /* 11*/	EHFALTOU campoLogico; /* Lógico: 0=Não 1=Sim */
commit;

update arqTStCon set EhDesmaPac=0, EhFaltou=0;
update arqTStCon set EhDesmaPac=1 Where idPrimario = 10; 
update arqTStCon set EhFaltou=1 Where idPrimario = 12;
commit;

RECREATE VIEW V_arqTStCon AS 
	SELECT A0.IDPRIMARIO, A0.STATUS, A0.ORDEM, A0.TCLINICA, A1.CHAVE as TClinica_CHAVE, A1.DESCRITOR as TClinica_DESCRITOR, A0.LEGENDA, A0.HORACHE, A0.VALOROBR, A0.PRONTUOBR, A0.EHDESMARCA, A0.EHDESMAPAC, A0.EHFALTOU, A0.COR, A0.FUNDO, A0.ATIVO
	FROM arqTStCon A0
	left join tabTClinica A1 on A1.IDPRIMARIO=A0.TCLINICA;
commit;

ALTER TABLE arqTStCon
alter IDPRIMARIO position 1,
alter STATUS position 2,
alter ORDEM position 3,
alter TCLINICA position 4,
alter LEGENDA position 5,
alter HORACHE position 6,
alter VALOROBR position 7,
alter PRONTUOBR position 8,
alter EHDESMARCA position 9,
alter EHDESMAPAC position 10,
alter EHFALTOU position 11,
alter COR position 12,
alter FUNDO position 13,
alter ATIVO position 14;
commit;

/************************************************************
	Arquivo TiAgenda  
************************************************************/
drop view v_arqTiAgenda;
commit;

ALTER TABLE arqTiAgenda
add /*  9*/	PRIMAGENDA campoLogico; /* Lógico: 0=Não 1=Sim */
commit;

update arqTiAgenda set PrimAgenda=0;
update arqTiAgenda set PrimAgenda=1 where idPrimario=1;
commit;

RECREATE VIEW V_arqTiAgenda AS 
	SELECT A0.IDPRIMARIO, A0.TIAGENDA, A0.ORDEM, A0.ATIVO, A0.COMPLEMEN, A0.DOBROTEMPO, A0.PAGAMENTO, A0.MIDIA, A0.PRIMAGENDA
	FROM arqTiAgenda A0;
commit;
