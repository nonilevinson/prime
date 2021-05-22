<?php

require_once( 'ext_email_para_usuario.php' );

class EmailUsuario extends EmailParaUsuario 
{
	//------------------------------------------------------------------------
	function Inicio()
	{	
        $this->segunda = formatarData( incDia( $this->hoje, -7 ) );
        $this->terca   = formatarData( incDia( $this->hoje, -6 ) );
        $this->quarta  = formatarData( incDia( $this->hoje, -5 ) );
        $this->quinta  = formatarData( incDia( $this->hoje, -4 ) );
        $this->sexta   = formatarData( incDia( $this->hoje, -3 ) );
        $this->sabado  = formatarData( incDia( $this->hoje, -2 ) );
        $this->domingo = formatarData( incDia( $this->hoje, -1 ) );

		$this->msgEmail .=
			"<tr>
                <td colspan='8' align='center'>" . $this->tituloEmail . " entre " . 
				    formatarData( incDia( $this->hoje, -7 ) ) . " e " .
                    formatarData( incDia( $this->hoje, -1 ) ) . 
                "</td>
            </tr>
			<tr class='" . $this->estilo . "'>
                <td>Usuário</td>
                <td align='center'>Segunda<br>" . $this->segunda . "</td>
                <td align='center'>Terça<br>" . $this->terca . "</td>
                <td align='center'>Quarta<br>" . $this->quarta . "</td>
                <td align='center'>Quinta<br>" . $this->quinta . "</td>
                <td align='center'>Sexta<br>" . $this->sexta . "</td>
                <td align='center'>Sábado<br>" . $this->sabado . "</td>
                <td align='center'>Domingo<br>" . $this->domingo . "</td>
                <td align='right'>Total</td>
			</tr>";
			
		parent::Inicio();
	}

	//------------------------------------------------------------------------
	function Fim()
	{
		parent::Fim();
	}

    //------------------------------------------------------------------------
	function PeQuebra( $p_cabTotal )
	{
        $tot1 = $this->ValorTotal( "tot1" );
        $tot2 = $this->ValorTotal( "tot2" );
        $tot3 = $this->ValorTotal( "tot3" );
        $tot4 = $this->ValorTotal( "tot4" );
        $tot5 = $this->ValorTotal( "tot5" );
        $tot6 = $this->ValorTotal( "tot6" );
        $tot7 = $this->ValorTotal( "tot7" );
        $tot = $tot1 + $tot2 + $tot3 + $tot4 + $tot5 + $tot6 + $tot7;

        $this->msgEmail .= 
            "<tr class='" . $this->estilo . "'><td>" . $p_cabTotal . "</td>
                <td align='center'>" . ( $tot7 > 0 ? formatarNum( $tot7 ) : " " ) . "</td>
                <td align='center'>" . ( $tot6 > 0 ? formatarNum( $tot6 ) : " " ) . "</td>
                <td align='center'>" . ( $tot5 > 0 ? formatarNum( $tot5 ) : " " ) . "</td>
                <td align='center'>" . ( $tot4 > 0 ? formatarNum( $tot4 ) : " " ) . "</td>
                <td align='center'>" . ( $tot3 > 0 ? formatarNum( $tot3 ) : " " ) . "</td>
                <td align='center'>" . ( $tot2 > 0 ? formatarNum( $tot2 ) : " " ) . "</td>
                <td align='center'>" . ( $tot1 > 0 ? formatarNum( $tot1 ) : " " ) . "</td>
                <td align='right'>" . formatarNum( $tot ) . "</td>
            </tr>";
            
        $this->estilo = ( $this->estilo == 'regPar' ? 'regImpar' : 'regPar' );
    }

  	//------------------------------------------------------------------------
	function Total()
	{
        $this->PeQuebra( "Total" );
    }

	//------------------------------------------------------------------------
	//	Quebra por Login
	//------------------------------------------------------------------------
	function QuebraPorLogin()
	{ 
		return( $this->regAtual->LOGIN );
	}

	//------------------------------------------------------------------------
	function PeQuebraPorLogin()
	{
        $regA = &$this->regAtual;
        $this->PeQuebra( $regA->LOGIN );
		parent::Basico();
    }

	//------------------------------------------------------------------------
	function Basico()
	{
		$regA = &$this->regAtual;
        $this->AcumularTotal( "tot" . $regA->QTOS, $regA->QTD );
	}
}

//------------------------------------------------------------------------
// Declaração do Relatório
//------------------------------------------------------------------------
global $g_debugProcesso;
$proc = new EmailUsuario();

$proc->hoje = HOJE;
// if( $g_debugProcesso ) echo '<br><b>GR0 diaDaSemana=</b> '.diaDaSemana( $proc->hoje );

if( diaDaSemana( $proc->hoje ) == 1 )
{
    global $g_debugProcesso, $g_horaIni;
    $g_horaIni = AGORA();

    sql_abrirBD( false );

    $proc->campoHabilitado = "EmailAcesS"; 
    $proc->tituloEmail     = CLIENTE_NOME . ": Acessos na semana";
 
    $select = "Select LogAcessoS
        From cnfXConfig";
    $logAcessoS = sql_lerUmRegistro( $select )->LOGACESSOS;
    $proc->comSupervisor = $logAcessoS;

    $proc->DefinirQuebras( 
        [ 'QuebraPorLogin', NAO, NAO, SIM ] );

    $proc->DefinirTotais( "tot1", "tot2", "tot3", "tot4", "tot5", "tot6", "tot7" );

    $select = "Select L.Login, L.Data, 
            ( current_date - L.Data ) as Qtos,
            count(*) as Qtd
        From arqLanceLogAcesso L
        Where L.Data < current_date and
            ( current_date - L.Data ) < 7
            and ( L.Login not like '%Noni%' and L.Login not like '%Kogut%' and L.Login != 'null' )
        Group by 1,2,3";
    $reg = sql_lerRegistros( $select );
if( $g_debugProcesso ) echo '<br><b>GR0 arqLanceLogAcesso S=</b> '.$select;

    sql_fecharBD();

    if( $reg )
        $proc->Processar( $select );
}
