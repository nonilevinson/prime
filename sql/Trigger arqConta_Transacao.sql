/***********************************************
	TRIGGER ARQCONTA_TRANSACAO
************************************************/

SET TERM ^^ ;
CREATE TRIGGER ARQCONTA_TRANSACAO FOR ARQCONTA ACTIVE BEFORE INSERT POSITION 1 AS

begin
  select coalesce( max( Transacao ) + 1, 1 ) from ARQCONTA into NEW.Transacao;
end ^^
SET TERM ; ^^

commit;
