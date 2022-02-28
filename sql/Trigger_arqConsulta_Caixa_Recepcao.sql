--*
--* Trigger para manipular Conta e Parcela em função do pagamento de uma Consulta (não do Tratamento)
--* ARQCONSULTA_AD > Achei melhor ter critério de acionamento na tecla DEL
--* ARQCONSULTA_AI_AU

--* 07/01/2022 A Patricia me informou que somente as consulta de TiAgenda = 1 "NOVO" é que sao cobradas

set term ^;

recreate trigger ARQCONSULTA_AU for ARQCONSULTA
active before Update position 101 as
	declare idConta bigInt;
	declare idParcela bigInt;
	declare vencimento date;
	declare dataPagto date;
	declare dataComp date;
	declare valor numeric(18,2);
	declare valorLiq numeric(18,2);
	declare transacao bigInt;
	declare idCCor bigInt;
	declare idSubPlano bigInt;
	declare idTFCobra bigInt;
	declare idTFPagto bigInt;
	declare dinheiro smallint;
	declare cartao smallint;
	declare dias smallint;
	declare taxaDeb numeric(18,2);
	declare txCartao numeric(18,2);
	declare taxa2 numeric(18,2);
	declare taxa3 numeric(18,2);

	declare vencimento2 date;
	declare dataPagto2 date;
	declare dataComp2 date;
	declare valor2 numeric(18,2);
	declare valorLiq2 numeric(18,2);
	declare idTFCobra2 bigInt;
	declare idTFPagto2 bigInt;
	declare dinheiro2 smallint;
	declare cartao2 smallint;
	declare dias2 smallint;
	declare taxaDeb2 numeric(18,2);
	declare txCartao2 numeric(18,2);
	declare taxa22 numeric(18,2);
	declare taxa23 numeric(18,2);

begin
-- exception TESTE '1 NEWvalor= ' || NEW.Valor || ' OLDvalor= ' || OLD.Valor || ' NEWFormaPg= ' || NEW.FormaPg || ' OLDformaPg= ' || coalesce( OLD.FormaPg, 0 ) || ' NEWFormaPg2= ' || coalesce( NEW.FormaPg2, 0 ) || ' OLDformaPg2= ' || coalesce( OLD.FormaPg2, 0 );
	if( NEW.TiAgenda = 1 and NEW.Cortesia = 0 and 
		( NEW.Valor <> OLD.Valor or coalesce( NEW.FormaPg, 0 ) <> coalesce( OLD.FormaPg, 0 ) or
			NEW.Valor2 <> OLD.Valor2 or coalesce( NEW.FormaPg2, 0 ) <> coalesce( OLD.FormaPg2, 0 ) ) 
		) then
	begin
-- exception TESTE '2 NEWvalor= ' || NEW.Valor || ' OLDvalor= ' || OLD.Valor || ' NEWFormaPg= ' || NEW.FormaPg || ' OLDformaPg= ' || coalesce( OLD.FormaPg, 0 ) || ' NEWFormaPg2= ' || coalesce( NEW.FormaPg2, 0 ) || ' OLDformaPg2= ' || coalesce( OLD.FormaPg2, 0 );
		if( NEW.ContaCons > 0 ) then
		begin
			if( NEW.Valor <> OLD.Valor or coalesce( NEW.FormaPg, 0 ) <> coalesce( OLD.FormaPg, 0 ) ) then
			begin 
				select idPrimario, Valor, ValorLiq, 100 - ( ValorLiq / Valor * 100.0 )
				from arqParcela
				where Parcela = 1 and Conta = OLD.ContaCons
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

			if( NEW.Valor2 <> OLD.Valor2 or coalesce( NEW.FormaPg2, 0 ) <> coalesce( OLD.FormaPg2, 0 ) ) then
			begin 
				select idPrimario, Valor, ValorLiq, 100 - ( ValorLiq / Valor * 100.0 )
				from arqParcela
				where Parcela = 2 and Conta = OLD.ContaCons
				into :idParcela, :valor, :valorLiq, :txCartao;

				if( :valor <> :valorLiq ) then
				begin
					valorLiq = NEW.Valor2 * ( 100 - :txCartao ) / 100.0;
				end
				else
				begin
					valorLiq = NEW.Valor2;
				end

				update arqParcela set Valor = NEW.Valor2, ValorLiq = :valorLiq, FormaPg = NEW.FormaPg2
					where idPrimario = :idParcela;
			end
		end
		else
		if( OLD.FormaPg is null ) then
		begin
			idConta = gen_id( GENIDPRIMARIO, 1 );

			select coalesce( max( Transacao ), 0 ) + 1
			from arqConta
			into :transacao;

			select SubPlaRRec
			from cnfXConfig
			into :idSubPlano;

			select idPrimario
			from arqCCor
			where Clinica = NEW.Clinica and TCCor = 3
			into :idCCor;

			--* para a primeira parcela que sempre existe
			select Dinheiro, Cartao, Dias, TaxaDeb, Taxa2, Taxa3
			from arqFormaPg
			where idPrimario = NEW.FORMAPG
			into :dinheiro, :cartao, :dias, :taxaDeb, :taxa2, :taxa3;

			--* idTFCobra: 2=Cartão 3=Carteira
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
				valorLiq   = NEW.Valor;
				idTFPagto  = 2;
			end
			else
			begin
				if( taxaDeb > 0 ) then
				begin
					txCartao = taxaDeb;
				end
				else
            if( taxa2 > 0 ) then
            begin
               txCartao = taxa2;
            end
            else
            begin
               txCartao = taxa3;
            end

				vencimento = dateadd( day, :dias, current_date );
				dataPagto  = null;
				dataComp   = null;
				valorLiq   = NEW.Valor * ( 100 - txCartao ) / 100.0;
				idTFPagto  = 1;
			end

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
				Cheque, Arq1, StRetorno, Remessa, DataRem, Historico )
				values( gen_id( GENIDPRIMARIO, 1 ), :idConta, 1, :vencimento, 0, NEW.Valor, :valorLiq, 0,
				:idTFCobra, null, '', '', :idCCor, :idSubPlano, :dataPagto, :dataComp, :idTFPagto, null, NEW.FormaPg,
				0, null, '', null, null, '' );

			--* para a segunda parcela que NEM sempre existe
			if( NEW.Valor2 > 0 ) then
			begin
				select Dinheiro, Cartao, Dias, TaxaDeb, Taxa2, Taxa3
				from arqFormaPg
				where idPrimario = NEW.FORMAPG2
				into :dinheiro2, :cartao2, :dias2, :taxaDeb2, :taxa22, :taxa23;

				--* idTFCobra: 2=Cartão 3=Carteira
				if( cartao2 = 1 ) then
				begin
					idTFCobra2 = 2;
				end
				else
				begin
					idTFCobra2 = 3;
				end

				if( dinheiro2 = 1 ) then
				begin
					vencimento2 = current_date;
					dataPagto2  = current_date;
					dataComp2   = current_date;
					valorLiq2   = NEW.Valor2;
					idTFPagto2  = 2;
				end
				else
				begin
					if( taxaDeb2 > 0 ) then
					begin
						txCartao2 = taxaDeb2;
					end
					else
					if( taxa22 > 0 ) then
					begin
						txCartao2 = taxa22;
					end
					else
					begin
						txCartao2 = taxa23;
					end

					vencimento2 = dateadd( day, :dias2, current_date );
					dataPagto2  = null;
					dataComp2   = null;
					valorLiq2   = NEW.Valor2 * ( 100 - txCartao2 ) / 100.0;
					idTFPagto2  = 1;
				end

				insert into arqParcela (idPrimario, Conta, Parcela, Vencimento, VencEst, Valor, ValorLiq, Estimado,
					TFCobra, Emissao, LinhaDig, NomePdf, CCor, SubPlano, DataPagto, DataComp, TFPagto, TDetPg, FormaPg,
					Cheque, Arq1, StRetorno, Remessa, DataRem, Historico )
					values( gen_id( GENIDPRIMARIO, 1 ), :idConta, 2, :vencimento2, 0, NEW.Valor2, :valorLiq2, 0,
					:idTFCobra2, null, '', '', :idCCor, :idSubPlano, :dataPagto2, :dataComp2, :idTFPagto2, null, NEW.FormaPg,
					0, null, '', null, null, '' );
			end

			NEW.ContaCons = :idConta;
		end
	end
end^

set term ;^

commit;
