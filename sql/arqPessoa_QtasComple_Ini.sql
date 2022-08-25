alter trigger arqConsulta_TrgQtdM inactive;
alter trigger arqConsulta_TrgQtdMEnt inactive;
alter trigger arqPessoa_QtasComple inactive;
alter trigger arqPessoa_log inactive;
commit;

/************************************************************
	Trigger para arqConsulta: Quantos - inicialização de arqPessoa.QtasComple
************************************************************/

set term ^;

create trigger arqPessoa_QtasComple_X for arqConsulta
active after Update
as
declare variable v1 SMALLINT;
begin
Select P.Complemen From arqPtrata P Where P.idPrimario= NEW.PTrata into :v1;
if( ( :v1 = 1 ) ) then begin
update arqPessoa set arqPessoa.QtasComple = arqPessoa.QtasComple + 
1
 where arqPessoa.IDPRIMARIO = NEW.Pessoa;
end
end^

set term ;^
commit;
update arqPessoa set QtasComple=0;
update arqConsulta set IDPRIMARIO=IDPRIMARIO;
commit;
drop trigger arqPessoa_QtasComple_X;
commit;

alter trigger arqConsulta_TrgQtdM active;
alter trigger arqConsulta_TrgQtdMEnt active;
alter trigger arqPessoa_QtasComple active;
alter trigger arqPessoa_log active;
commit;