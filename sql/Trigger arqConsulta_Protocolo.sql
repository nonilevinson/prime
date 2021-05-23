/***********************************************
	TRIGGER ARQCONSULTA_PROTOCOLO
************************************************/

SET TERM ^^ ;
CREATE TRIGGER ARQCONSULTA_PROTOCOLO FOR ARQCONSULTA ACTIVE BEFORE INSERT POSITION 1 AS

begin
  select coalesce( max( Protocolo ) + 1, 1 ) from ARQCONSULTA into NEW.Protocolo;
end ^^
SET TERM ; ^^

commit;
