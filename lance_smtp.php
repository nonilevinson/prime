<?php

//* A biblioteca lê este arquivo

global $setup, $g_remetentePadrao, $g_httpSistema, $g_rodapeEmail, $g_supervisores, $g_nomeSupervisor,
	$g_tituloTeste, $g_smtp, $g_porta, $g_cripto, $g_login, $g_senha, $g_timeout, $g_loteMax, $g_tempo,
	$g_type, $g_visualizar, $g_nomeEmail;

$g_remetentePadrao = 'info@kogumelo.com.br';
$g_nomeEmail       = 'SWSM';
$g_httpSistema     = 'https://www.swsm.com.br';
$g_nomeSupervisor  = "Sup ";
$g_tituloTeste     = "(teste) ";
$g_supervisores    = [
/*	[ 'kogut@kogumelo.com.br', 'Alexandre' ], */
	[ 'noni@kogumelo.com', 'Noni' ] ];

if( !$g_visualizar )
{
	$g_rodapeEmail = "
		<table>
			<br><br>
			<tr><td>__________________________</td></tr>
			<tr>
				<td style='font-size:7.5pt; font-family:Lucida Sans,sans-serif'>Enviado pelo
					<a href='https://www.swsm.com.br' target='_blank' rel='noreferrer noopener'>
					<img border='0' src='https://www.swsm.com.br/swsm_peq.png' alt='SWSM' align='absbottom' border='0'></a><br>
					Sistema Web Sob Medida
				</td>
			</tr>
		</table>";
}

//* Conexão pelo SMTP da ITM SMTP 20K
$g_smtp    = 'smtp20k1.ipreverso.com';
$g_porta   = 25014;
$g_cripto  = '';
$g_login   = 'smtp1480sc@smtp1480sc.xxx.zz';
$g_senha   = 's054c8d556a#';
$g_timeout = 0;
$g_loteMax = 0;
$g_tempo   = 0;
$g_type    = 'login';
