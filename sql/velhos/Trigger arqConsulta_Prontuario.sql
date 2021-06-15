/***********************************************
	TRIGGER ARQCONSULTA_PRONTUARIO
************************************************/

SET TERM ^^ ;
CREATE TRIGGER ARQCONSULTA_PRONTUARIO FOR ARQCONSULTA ACTIVE BEFORE INSERT POSITION 1 AS

begin
  select coalesce( max( Prontuario ) + 1, 1 ) from ARQCONSULTA into NEW.Prontuario;
end ^^
SET TERM ; ^^

commit;
