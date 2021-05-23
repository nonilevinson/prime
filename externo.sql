
/**********************************************
	arqPessoa, campo idade
**********************************************/
##calcularIdade##
( cast(
   datediff( year, (Select P.Nascimento From arqPessoa P), current_date ) -
   iif(
      current_date <
      extract( day from (Select P.Nascimento From arqPessoa P) ) ||
      extract( month from (Select P.Nascimento From arqPessoa P) ) ||
      extract( year from (Select P.Nascimento From arqPessoa P) ), 1, 0 ) as smallint )
)
