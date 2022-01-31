/***********************************************
	TRIGGER ARQMOVESTOQUE_NUM
************************************************/

SET TERM ^^ ;
CREATE TRIGGER ARQMOVESTOQUE_NUM FOR ARQMOVESTOQUE ACTIVE BEFORE INSERT POSITION 1 AS

begin
  select coalesce( max( Num ) + 1, 1 ) from ARQMOVESTOQUE into NEW.Num;
end ^^
SET TERM ; ^^

commit;
