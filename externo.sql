
/**********************************************
	arqPessoa, campo idade
**********************************************/
##calcularIdade##
( cast(
   datediff( year, Nascimento, current_date ) -
   iif(
      current_date <
      lpad( extract( day from Nascimento ), 2, '0' ) || '.' ||
      lpad( extract( month from Nascimento ), 2, '0' ) || '.' ||
      extract( year from current_date ), 1, 0 ) as smallint )
)
