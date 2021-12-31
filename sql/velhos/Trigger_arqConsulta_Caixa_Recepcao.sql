--*
--* Trigger para manipular Conta e Parcela em função do pagamento de uma Consulta (não do Tratamento)

--* ARQCONSULTA_AD > Achei melhor ter critério de acionamento na tecla DEL

--* ARQCONSULTA_AI_AU
set term ^;

recreate trigger ARQCONSULTA_AI_AU for ARQCONSULTA
active before Insert or Update position 101 as
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

--exception teste 'idConta= ' || coalesce( :idConta, 'null' ) || 'NEW valor= ' || NEW.Valor || ' old valor= ' || OLD.VALOR || ' NEW FormaPg= ' || NEW.FormaPg || ' OLD formaPg= ' || OLD.FormaPg;
	if( updating and NEW.ContaCons > 0 and ( NEW.Valor <> OLD.Valor or NEW.FormaPg <> OLD.FormaPg ) ) then
	begin
		select idPrimario, Valor, ValorLiq, 100 - ( ValorLiq / Valor * 100.0 )
		from arqParcela
		where Conta = OLD.ContaCons
		into :idParcela, :valor, :valorLiq, :txCartao;

		if( :valor <> :valorLiq ) then
		begin
			valorLiq = NEW.Valor * ( 100 - :txCartao ) / 100.0;
		end
		else
		begin
			valorLiq = NEW.Valor;
		end

		update arqParcela set Valor = NEW.Valor, ValorLiq = :valorLiq, FormaPg = NEW.FormaPg
			where idPrimario = :idParcela;
	end
	else
	if( updating and OLD.FormaPg is null and NEW.ContaCons > 0 ) then
	begin
		idConta = gen_id( GENIDPRIMARIO, 1 );

		select coalesce( max( Transacao ), 0 ) + 1
		from arqConta
		into :transacao;

		select Dinheiro, Cartao, Dias, TaxaDeb, Taxa2, Taxa3
		from arqFormaPg
		where idPrimario = NEW.FORMAPG
		into :dinheiro, :cartao, :dias, :taxaDeb, :taxa2, :taxa3;

		if( cartao = 1 ) then
		begin
			idTFCobra = 2;
		end
		else
		begin
			idTFCobra = 3;
		end

		if( dinheiro = 1 ) then
		begin
			vencimento = current_date;
			dataPagto  = current_date;
			dataComp   = current_date;
			valorLiq   = valor;
			idTFPagto  = 2;
		end
		else
		begin
			if( taxaDeb > 0 ) then
			begin
				txCartao = taxaDeb;
			end
			else
			begin
				txCartao = taxa2;
			end

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
			Historico, Arq1  )
			values( :idConta, :transacao, NEW.Clinica, 2, null, NEW.Pessoa, 0,
			0, 0, 0, null, 0, 0, current_date, current_date, current_date, 'Consulta ' || NEW.NUM, null );

		--? o Vencimento precisa ser calculado em função de Dias de arqFormaPg
		--? o ValorLiq precisa ser calculado em função da Taxa de arqFormaPg
		--? o TFCobra precisa ser calculado em função dos Logicos de arqFormaPg
		--? o CCor precisa ser calculado em função de CCorRec de cnfXConfig
		--? o SubPlano precisa ser calculado em função de SubPlaRRec de cnfXConfig
		--? o TFPagto precisa ser calculado em função dos Logicos de arqFormaPg

		insert into arqParcela (idPrimario, Conta, Parcela, Vencimento, VencEst, Valor, ValorLiq, Estimado,
			TFCobra, Emissao, LinhaDig, NomePdf, CCor, SubPlano, DataPagto, DataComp, TFPagto, TDetPg, FormaPg,
			Cheque, Arq1, StRetorno, Remessa, DataRem )
			values( gen_id( GENIDPRIMARIO, 1 ), :idConta, 1, :vencimento, 0, NEW.Valor, NEW.Valor, 0,
			:idTFCobra, null, '', '', :idCCor, :idSubPlano, :dataPagto, :dataComp, :idTFPagto, null, NEW.FormaPg,
			0, null, '', null, null );

		NEW.ContaCons = :idConta;
	end
end^

set term ;^

commit;
