--*
--* Trigger para manipular Conta e Parcela em função do pagamento de uma Consulta (não do Tratamento)

--* ARQCONSULTA_AD_AU
/*
set term ^;

recreate trigger ARQCONSULTA_AD_AU for ARQLOCALIZA
active after Delete or Update position 100 as
	declare idConsulta bigInt;
	declare idConta bigInt;
	declare idParcela bigInt;
	declare vencimento date;
	declare dataPagto date;
	declare dataComp date;
	declare valor numeric(18,2);
	declare valorLiq numeric(18,2);
	declare txCartao numeric(18,2);
	declare idFormaPg bigInt;
	declare transacao bigInt;
	declare idCCor bigInt;
	declare idSubPlano bigInt;
	declare idTFCobra bigInt;
	declare idTFPagto bigInt;
	declare dinheiro smallint;
	declare cartao smallint;
	declare dias smallint;
	declare taxaDeb numeric(18,2);
	declare taxa2 numeric(18,2);
	declare taxa3 numeric(18,2);
begin
	--* verifca se tem um Localiza do mesmo mês e anterior ao OLD.Data
	select first 1 Data
		from arqLocaliza
		where Animal=OLD.Animal
		order by Data
		into :firstDataLocaliza;

	if( :firstDataLocaliza is null ) then
	begin
		--* Se o OLD.Animal não tem mais regstros em arqLocaliza, podemos excluir tudo em arqConsulta
		delete from arqConsulta where Animal=OLD.Animal;
	end
	else
	if( OLD.Data <= :firstDataLocaliza ) then
	begin
		if( OLD.Data = ( select first 1 Data
				from arqConsulta
				where Animal=OLD.Animal
				order by Data ) ) then
		begin
				--* estou excluindo o primeiro registro, preciso excluir todos os registros até o primeiro onde FOIUSU=SIM
				--* pois esse animal deixou de estar em uma das instalacoes neste período
				select first 1 Data
					from arqConsulta
					where Animal = OLD.Animal and FoiUsu = 1 and Data > OLD.Data
					order by Data
					into :dataFutura;
	--exception teste 'dataFutura= ' || dataFutura;
				if( :dataFutura is null ) then
					delete from arqConsulta where Animal=OLD.Animal;
				else
					delete from arqConsulta where Animal=OLD.Animal and data < :dataFutura;
		end
	end
	else
	begin
		--* Nao estou excluindo a primeira data, faz o procedimento "normal"
		--* procura em arqConsulta onde estava o animal no mes/ano da OLD.Data que esta sendo excluida ou alterada

		oldMes = extract( month from OLD.Data );
		oldAno = extract( year from OLD.Data );

		--* procura em arqConsulta onde estava o animal no mes/ano da OLD.Data que esta sendo excluida ou alterada
		select idPrimario, Data, Instalacao
				from arqConsulta
				where Animal = OLD.Animal and
							extract( year from Data ) = :oldAno and
							extract( month from Data )= :oldMes
				into :idLocaMes, :ultData, :idInstalacao;

		--* se achou a mesma data: atualizar o animal de data/instalacao
		if( :ultData = OLD.Data ) then
		begin
			--* verifica se existe arqLocaliza deste animal no mesmo mes/ano de OLD.Data
			select first 1 L.Data, L.Instalacao, 1
				from arqLocaliza L
				where Animal = OLD.Animal and
							extract( year from L.Data ) = :oldAno and
							extract( month from L.Data ) = :oldMes
				order by L.Data desc
				into :novaData, :novaInstalacao, :ehUsu;

			if( :novaData is null ) then
			begin
				--* não encontrou no mes/ano: pega a mesma instalacao do mes anterior
				novaData    = cast( :oldAno || '/' || lpad( :oldMes, 2, '0') || '/01' as date );
				mesAnterior = dateAdd( -1 month to OLD.Data );
				ehUsu       = 0;

				select LL.Instalacao
					from arqConsulta LL
					where LL.animal = OLD.Animal and
							extract( year from LL.Data ) = extract( year from :mesAnterior ) and
							extract( month from LL.Data ) = extract( month from :mesAnterior )
					into :novaInstalacao;
			end

			update arqConsulta set Instalacao = :novaInstalacao, Data = :novaData, FoiUsu = :ehUsu
				where idPrimario = :idLocaMes;

			--* Localizar o primeiro arqConsulta futuro que FoiUsu=1
			--* Tudo que foi colocado no sistema entre o que achou e o primeiro registro criado pelo
			--*         usuário precisa ser alterado

			--* Precisamos do primeiro dia do mês seguinte a novadata do update da linha 98
			novaData = cast( extract( year from :novaData ) || '/' || lpad( extract( month from :novaData ), 2, '0') || '/01' as date );
			novaData = dateAdd( 1 month to :novaData );

			select first 1 Data
				from arqConsulta
				where FoiUsu = 1 and Data >  :novaData
				order by Data
				into :dataFutura;
--exception teste 'update where inst <> ' ||  :novaInstalacao || ' data >= ' || :novaData || ' < ' || coalesce( :dataFutura, '2100/12/31' );
			update arqConsulta set Instalacao = :novaInstalacao, FoiUsu = 0
						where Instalacao != :novaInstalacao and
									Data >= :novaData and Data < coalesce( :dataFutura, '2100/12/31' );
		end
	end
end^

set term ;^

commit;
*/
--*************************************************
--* ARQCONSULTA_AI_AU
set term ^;

recreate trigger ARQCONSULTA_AI_AU for ARQLOCALIZA
active after Insert or Update position 101 as
	declare idConsulta bigInt;
	declare idConta bigInt;
	declare idParcela bigInt;
	declare vencimento date;
	declare dataPagto date;
	declare dataComp date;
	declare valor numeric(18,2);
	declare valorLiq numeric(18,2);
	declare txCartao numeric(18,2);
	declare idFormaPg bigInt;
	declare transacao bigInt;
	declare idCCor bigInt;
	declare idSubPlano bigInt;
	declare idTFCobra bigInt;
	declare idTFPagto bigInt;
	declare dinheiro smallint;
	declare cartao smallint;
	declare dias smallint;
	declare taxaDeb numeric(18,2);
	declare taxa2 numeric(18,2);
	declare taxa3 numeric(18,2);
begin
	--* procurar se já tem um arqConta
	select ContaCons, Valor, FormaPg
		from arqConsulta C
		where idPrimario = NEW.idPrimario
		into :idConta, :valor, :idFormaPg;

	--* achou um arqConta
	if( idConta is not null ) then
	begin
		if( valor != NEW.Valor || idFormaPg != NEW.FormaPg ) then
		begin
			select idPrimario, Valor, ValorLiq, 100 - ( ValorLiq / Valor * 100.0 )
				from arqParcela
			where Conta = :idConta
			into :idParcela, :valor, :valorLiq, :txCartao

			if( :valor != :valorLiq ) then
			begin
				valorLiq = NEW.Valor ( 100 - :txCartao ) / 100.0;
			end

			update arqParcela set Valor = NEW.Valor, ValorLiq = :valorLiq, FormaPg = NEW.FormaPg
				where idPrimario = :idParcela;
		end
	end
	else
	begin
		idConta = gen_id( GENIDPRIMARIO, 1 );

		select coalesce( max( Transacao ), 0 ) + 1
		from arqConta
		into :transacao;

		select Dinheiro, Cartao, Dias, TaxaDeb, Taxa2, Taxa3
		from arqFormaPg
		where idPrimario = NEW.FORMAPG
		into :dinheiro, :cartao, :dias, :taxaDeb, :taxa2, :taxa3

		if( cartao == 1 ) then
		begin
			idTFCobra = 2;
		end
		else
			idTFCobra = 3;

		if( dinheiro == 1 ) then
		begin
			vencimento = current_date;
			dataPagto  = current_date;
			dataComp   = current_date;
			valorLiq   = valor;
			idTFPagto  = 2;
		end
		else
			if( taxaDeb > 0 ) then
			begin
				txCartao = taxaDeb;
			end
			else
				txCartao = taxa2;
							
			vencimento = dateadd( day, dias, current_date );
			dataPagto  = null;
			dataComp   = null;
			valorLiq   = NEW.Valor * ( 100 - txCartao ) / 100.0;
			idTFPagto  = 1;
		end

		select CCorRec, SubPlaRRec
		from cnfXConfig
		into :idCCor, :idSubPlano;

		insert into arqConta (idPrimario, Transacao, Clinica, TPgRec, Fornecedor, Pessoa, TrgValor,
			TrgValLiq, TrgQtdParc, TrgQParcPg, ProxVenc, TrgPago, Documento, Emissao, RecEnvia, Compete,
			Histrico, Arq1  )
			values( :idConta, :transacao, NEW.Clinica, 2, null, NEW.Pessoa, 0,
			0, 0, 0, null, 0, 0, current_date, current_date, current_date, 'Consulta ' . NEW.NUM, null );

		--? o Vencimento precisa ser calculado em função de Dias de arqFormaPg
		--? o ValorLiq precisa ser calculado em função da Taxa de arqFormaPg
		--? o TFCobra precisa ser calculado em função dos Logicos de arqFormaPg
		--? o CCor precisa ser calculado em função de CCorRec de cnfXConfig
		--? o SubPlano precisa ser calculado em função de SubPlaRRec de cnfXConfig
		--? o TFPagto precisa ser calculado em função dos Logicos de arqFormaPg

		insert into arqParcela (idPrimario, Conta, Parcela, Vencimento, VencEst, Valor, ValorLiq, Estimado,
			TFCobra, Emissao, LinhaDig, NomePdf, CCor, Sublano, DataPagto, DataComp, TFPagto, TDetPg, FormaPg
			Cheque, Arq1, StRetorno, Remessa, DataRem )
			values( gen_id( GENIDPRIMARIO, 1 ), :idConta, 1, :vencimento, 0, NEW.Valor, NEW.Valor, 0,
			:idTFCobra, null, '', '', :idCCor, :idSubPlano, :dataPagto, :dataComp, :idTFPagto, null, NEW.FormaPg,
			0, null, '', null, null );
	end
end^

set term ;^

commit;
