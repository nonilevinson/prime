/***********************************************
	TRIGGER ARQCONSULTA_NUM
************************************************/

SET TERM ^^ ;
CREATE TRIGGER ARQCONSULTA_NUM FOR ARQCONSULTA ACTIVE BEFORE INSERT POSITION 1 AS

begin
  select coalesce( max( Num ) + 1, 1 ) from ARQCONSULTA into NEW.Num;
end ^^
SET TERM ; ^^

commit;
