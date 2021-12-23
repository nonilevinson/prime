alter trigger arqLogEmail_Lidos inactive;
alter trigger arqConta_TrgValor inactive;
alter trigger arqConta_TrgValLiq inactive;
alter trigger arqConta_TrgQtdParc inactive;
alter trigger arqConta_TrgQParcPg inactive;
alter trigger arqConta_ProxVenc inactive;
alter trigger arqConta_TrgPago inactive;
alter trigger arqComCall_TrgQtoFx inactive;
alter trigger arqMedicamen_TrgItLote inactive;
alter trigger arqMedicamen_TrgCMLote inactive;
alter trigger arqLote_TrgItMov inactive;
alter trigger arqLote_TrgCMedica inactive;
alter trigger arqConsulta_TrgQtdM inactive;
alter trigger arqConsulta_TrgQtdMEnt inactive;
alter trigger arqBairro_log inactive;
alter trigger arqCidade_log inactive;
alter trigger arqGrupo_log inactive;
alter trigger arqUsuario_log inactive;
alter trigger arqPessoa_log inactive;
alter trigger arqTemplate_log inactive;
alter trigger arqEmailRemet_log inactive;
alter trigger arqAcaoEmail_log inactive;
alter trigger arqImagemCRM_log inactive;
alter trigger arqLogEmail_log inactive;
alter trigger arqAvisos_log inactive;
alter trigger arqParaGrupo_log inactive;
alter trigger arqLido_log inactive;
alter trigger cnfXConfig_log inactive;
alter trigger arqBanco_log inactive;
alter trigger arqCCor_log inactive;
alter trigger arqContPessoa_log inactive;
alter trigger arqDocMod_log inactive;
alter trigger arqPlano_log inactive;
alter trigger arqSubPlano_log inactive;
alter trigger arqMidia_log inactive;
alter trigger arqClinica_log inactive;
alter trigger arqPTrata_log inactive;
alter trigger arqConta_log inactive;
alter trigger arqParcela_log inactive;
alter trigger arqUsuCli_log inactive;
alter trigger arqProfissao_log inactive;
alter trigger arqHoraBloq_log inactive;
alter trigger arqDuracao_log inactive;
alter trigger arqConsulta_log inactive;
alter trigger arqPlantao_log inactive;
alter trigger arqFornecedor_log inactive;
alter trigger arqFormaPg_log inactive;
alter trigger arqRecorrente_log inactive;
alter trigger arqCliMidia_log inactive;
alter trigger arqComCall_log inactive;
alter trigger arqFxComCall_log inactive;
alter trigger arqUnidade_log inactive;
alter trigger arqMedicamen_log inactive;
alter trigger arqAgRet_log inactive;
alter trigger arqCMedica_log inactive;
alter trigger arqLote_log inactive;
alter trigger arqMovEstoque_log inactive;
alter trigger arqItemMov_log inactive;
commit;

/************************************************************
	Trigger para arqCMedica: Total - inicialização de arqConsulta.TrgQtdM
************************************************************/

set term ^;

create trigger arqConsulta_TrgQtdM_X for arqCMedica
active after Update
as
begin
update arqConsulta set arqConsulta.TrgQtdM = arqConsulta.TrgQtdM + 
NEW.Qtd where arqConsulta.IDPRIMARIO = NEW.Consulta;
end^

set term ;^
commit;
update arqConsulta set TrgQtdM=0;
update arqCMedica set IDPRIMARIO=IDPRIMARIO;
commit;
drop trigger arqConsulta_TrgQtdM_X;
commit;



/************************************************************
	Trigger para arqCMedica: Total - inicialização de arqConsulta.TrgQtdMEnt
************************************************************/

set term ^;

create trigger arqConsulta_TrgQtdMEnt_X for arqCMedica
active after Update
as
begin
update arqConsulta set arqConsulta.TrgQtdMEnt = arqConsulta.TrgQtdMEnt + 
NEW.QtdEntreg where arqConsulta.IDPRIMARIO = NEW.Consulta;
end^

set term ;^
commit;
update arqConsulta set TrgQtdMEnt=0;
update arqCMedica set IDPRIMARIO=IDPRIMARIO;
commit;
drop trigger arqConsulta_TrgQtdMEnt_X;
commit;

alter trigger arqLogEmail_Lidos active;
alter trigger arqConta_TrgValor active;
alter trigger arqConta_TrgValLiq active;
alter trigger arqConta_TrgQtdParc active;
alter trigger arqConta_TrgQParcPg active;
alter trigger arqConta_ProxVenc active;
alter trigger arqConta_TrgPago active;
alter trigger arqComCall_TrgQtoFx active;
alter trigger arqMedicamen_TrgItLote active;
alter trigger arqMedicamen_TrgCMLote active;
alter trigger arqLote_TrgItMov active;
alter trigger arqLote_TrgCMedica active;
alter trigger arqConsulta_TrgQtdM active;
alter trigger arqConsulta_TrgQtdMEnt active;
alter trigger arqBairro_log active;
alter trigger arqCidade_log active;
alter trigger arqGrupo_log active;
alter trigger arqUsuario_log active;
alter trigger arqPessoa_log active;
alter trigger arqTemplate_log active;
alter trigger arqEmailRemet_log active;
alter trigger arqAcaoEmail_log active;
alter trigger arqImagemCRM_log active;
alter trigger arqLogEmail_log active;
alter trigger arqAvisos_log active;
alter trigger arqParaGrupo_log active;
alter trigger arqLido_log active;
alter trigger cnfXConfig_log active;
alter trigger arqBanco_log active;
alter trigger arqCCor_log active;
alter trigger arqContPessoa_log active;
alter trigger arqDocMod_log active;
alter trigger arqPlano_log active;
alter trigger arqSubPlano_log active;
alter trigger arqMidia_log active;
alter trigger arqClinica_log active;
alter trigger arqPTrata_log active;
alter trigger arqConta_log active;
alter trigger arqParcela_log active;
alter trigger arqUsuCli_log active;
alter trigger arqProfissao_log active;
alter trigger arqHoraBloq_log active;
alter trigger arqDuracao_log active;
alter trigger arqConsulta_log active;
alter trigger arqPlantao_log active;
alter trigger arqFornecedor_log active;
alter trigger arqFormaPg_log active;
alter trigger arqRecorrente_log active;
alter trigger arqCliMidia_log active;
alter trigger arqComCall_log active;
alter trigger arqFxComCall_log active;
alter trigger arqUnidade_log active;
alter trigger arqMedicamen_log active;
alter trigger arqAgRet_log active;
alter trigger arqCMedica_log active;
alter trigger arqLote_log active;
alter trigger arqMovEstoque_log active;
alter trigger arqItemMov_log active;
commit;

