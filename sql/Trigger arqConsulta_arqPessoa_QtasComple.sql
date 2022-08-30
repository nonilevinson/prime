/************************************************************
	Trigger para arqConsulta: Quantos - atua em arqPessoa.QtasComple
************************************************************/

set term ^;

recreate trigger arqPessoa_QtasComple for arqConsulta
active after Insert or Update or Delete
as
declare variable v1 SMALLINT;
begin
if( ( updating and ( NEW.PTrata <> OLD.PTrata or OLD.PTrata is null ) ) or inserting ) then begin
Select P.Complemen From arqPtrata P Where P.idPrimario= NEW.PTrata into :v1;
if( ( :v1 = 1 ) ) then begin
update arqPessoa set arqPessoa.QtasComple = arqPessoa.QtasComple + 
1
 where arqPessoa.IDPRIMARIO = NEW.Pessoa;
end
end
if( deleting ) then begin
Select P.Complemen From arqPtrata P Where P.idPrimario= OLD.PTrata into :v1;
if( ( :v1 = 1 ) ) then begin
update arqPessoa set arqPessoa.QtasComple = arqPessoa.QtasComple - 
1
 where arqPessoa.IDPRIMARIO = OLD.Pessoa;
end
end
end^

set term ;^
commit;
