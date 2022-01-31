/***********************************************
	PROCEDURE CONTA_TRANSACAO_NUMERAR
************************************************/

-- * usada para renumerar Transacao de arqConta depois de excluir as contas zeradas

SET TERM ^;
RECREATE PROCEDURE CONTA_TRANSACAO_NUMERAR 
AS
    declare variable idConta bigInt;
    declare variable NUM bigInt;
begin 
    NUM=1;
    for select C.idPrimario
        from arqConta C
        order by idPrimario
        into :idConta
    do begin        
        update arqConta set Transacao = :NUM
        Where idPrimario = :idConta;
        NUM=NUM+1;    
    end
end^
SET TERM ;^

commit;

execute procedure CONTA_TRANSACAO_NUMERAR;
commit;

drop PROCEDURE CONTA_TRANSACAO_NUMERAR;
commit;
