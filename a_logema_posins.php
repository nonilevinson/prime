<?php

/* incluido em 13/02/2015 para cada base gerenciar a sua própria task de envio
@rem SCHTASKS /?
@rem /Create								=> criar nova task 
@rem /tn kmescolar_[cliente]_[data]_[hora]_[idprimario]  => nome da task
@rem /tr "c:\bat\%1.bat %4 %2 %3"	=> vai executar o comando "%1.bat" passando "%4 %2 %3" como parâmetros
#rem /sd [dd/mm/aaaa]					=> data da execução
@rem /st [hh:mm]						=> começando hh:mm minutos
@rem /sc once							=> rodando apenas uma vez
@rem /ru system							=> como usuário SYSTEM (ou poderia ser KOGUT para a task aparecer na tela)
@rem /rp [senha]						=> se usuário não for SYSTEM, tem que informar a sua senha
@rem /v1								=> alguma compatibilidade com windows antigo (deu erro sem isso)
@rem /z									=> excluir a task após executada
*/

global $g_regAtual;

$idLogEmail = $g_regAtual->IDPRIMARIO;

criarTask( '0_' . CLIENTE_PASTA . '_' . $idLogEmail, 
	$g_regAtual->DATA, $g_regAtual->HORA, 
	'c:\bat\ciasinfonica_email.bat ' . CLIENTE_PASTA . ' ' . $idLogEmail, 
	'noni' );

/* fim gerenciar task */
