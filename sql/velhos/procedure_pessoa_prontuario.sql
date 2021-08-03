/***********************************************
   PROCEDURE PESSOA_PRONTUARIO
************************************************/

--* 03/08/2021 foi excluida porque ele pediram para ela ser alfunumérica e eles controlarem a sequencia


SET TERM ^;
RECREATE PROCEDURE PESSOA_PRONTUARIO
AS
   declare variable idPessoa bigInt;
   declare variable prontuario bigInt;
begin
   for
		Select P.idPrimario as idPessoa, P.Prontuario
      From arqPessoa P
      Where P.Prontuario = 0
      	into :idPessoa, :prontuario
   do begin
      Select gen_id( genProntuario, 1 ) as Prontuario
      From cnfXConfig
      	into :prontuario;

      Update arqPessoa set Prontuario = :prontuario
         Where idPrimario = :idPessoa;
    end
end^

SET TERM ;^

commit;

execute procedure PESSOA_PRONTUARIO;
commit;

drop procedure PESSOA_PRONTUARIO ;
commit;


