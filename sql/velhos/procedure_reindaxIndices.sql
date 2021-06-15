--*
set term ^;
recreate procedure reindexarIndices
as
	declare variable sql varchar(100);
	declare variable nomeIndex varchar(100);
	declare variable estatistica numeric(7,6);
begin
    for
      select r.rdb$index_name, r.rdb$statistics
      from rdb$indices r
      where r.rdb$system_flag = 0
        into :nomeIndex, :estatistica
    do
    begin
      if(not exists(select I.idPrimario
          from arqIndexAtua I
          where I.Indice = :nomeIndex ) ) then
      begin
        insert into arqIndexAtua values( gen_id( GENIDPRIMARIO, 1 ), trim(:nomeIndex), current_date,
          15, :estatistica );
      end

      if (exists(select I.idPrimario from arqIndexAtua I
                where I.Data + I.Dias <= current_date)) then
      begin
        sql = 'SET STATISTICS INDEX ' || nomeIndex;
        execute statement :sql;

        update arqIndexAtua I set I.Data=current_date, I.Estatis=:estatistica
          Where I.Indice = :nomeIndex;

        if( ( position('_FK', nomeIndex) = 0 ) and
          ( position('_PK', nomeIndex) = 0 ) and
          ( position('_UK', nomeIndex) = 0 ) ) then
        begin
          sql = 'alter index ' || nomeIndex || ' inactive';
          execute statement :sql;
          sql = 'alter index ' || nomeIndex || ' active';
          execute statement :sql;
        end
      end
    end
end^
set term ;^
commit;
