--*
--* 2.00 para 2.01

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

/************************************************************
	Arquivo Usuario   
************************************************************/
drop trigger arqUsuario_log;
drop view v_arqUsuario;
commit;

ALTER TABLE arqUsuario
add /* 18*/	ASSINATURA campoImagem, /* Imagem = Ligado com a Tabela LanceTipoImg */
add /* 19*/	ASSINATURA_ARQUIVO  VARCHAR(128)computed by ( lower( 'Usuario/' || CASE WHEN ( ASSINATURA IS NULL ) THEN ( 'sem_imagem' ) ELSE ( IDPRIMARIO || '_ASSINATURA.' || (select TI.CHAVE from tabLanceTipoImg TI where TI.IDPRIMARIO=ASSINATURA) ) END ) );
commit;

RECREATE VIEW V_arqUsuario AS 
	SELECT A0.IDPRIMARIO, A0.USUARIO, A0.NOME, A0.SENHA, A0.GRUPO, A1.GRUPO as GRUPO_GRUPO, A0.VERSAO, A0.EMAIL, A0.CRM, A0.PODEAGENDA, A0.ATIVO, A0.NASCIMENTO, A0.FOTO, A2.CHAVE as Foto_CHAVE, A2.DESCRITOR as Foto_DESCRITOR, A0.FOTO_ARQUIVO, A0.EMAILACES, A0.EMAILACESS, A0.EMAILFINAN, A0.EMCMEDISEP, A0.ASSINATURA, A3.CHAVE as Assinatura_CHAVE, A3.DESCRITOR as Assinatura_DESCRITOR, A0.ASSINATURA_ARQUIVO
	FROM arqUsuario A0
	left join arqGrupo A1 on A1.IDPRIMARIO = A0.GRUPO
	left join tabLanceTipoImg A2 on A2.IDPRIMARIO = A0.FOTO
	left join tabLanceTipoImg A3 on A3.IDPRIMARIO = A0.ASSINATURA;
commit;

/************************************************************
	Trigger para Log de arqUsuario
************************************************************/

set term ^;

recreate trigger arqUsuario_LOG for arqUsuario
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Usuario,'' );
else
	valorChave = coalesce( NEW.Usuario,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100005 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Usuario', OLD.Usuario, NEW.Usuario );
	execute procedure set_log( 12, NEW.idPrimario, 'Nome', OLD.Nome, NEW.Nome );
	execute procedure set_log( 12, NEW.idPrimario, 'Grupo', OLD.Grupo, NEW.Grupo );
	execute procedure set_log( 12, NEW.idPrimario, 'Email', OLD.Email, NEW.Email );
	execute procedure set_log( 12, NEW.idPrimario, 'CRM', OLD.CRM, NEW.CRM );
	execute procedure set_log( 12, NEW.idPrimario, 'PodeAgenda', OLD.PodeAgenda, NEW.PodeAgenda );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
	execute procedure set_log( 12, NEW.idPrimario, 'Nascimento', OLD.Nascimento, NEW.Nascimento );
	execute procedure set_log( 12, NEW.idPrimario, 'EmailAces', OLD.EmailAces, NEW.EmailAces );
	execute procedure set_log( 12, NEW.idPrimario, 'EmailAcesS', OLD.EmailAcesS, NEW.EmailAcesS );
	execute procedure set_log( 12, NEW.idPrimario, 'EmailFinan', OLD.EmailFinan, NEW.EmailFinan );
	execute procedure set_log( 12, NEW.idPrimario, 'EmCMediSep', OLD.EmCMediSep, NEW.EmCMediSep );
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.Senha is distinct from OLD.Senha )  OR 
		( NEW.Versao is distinct from OLD.Versao )  OR 
		( NEW.Foto is distinct from OLD.Foto )  OR 
		( NEW.Assinatura is distinct from OLD.Assinatura )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;

