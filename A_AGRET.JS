/*=========================================================================
  a_agret - AgRet
=========================================================================*/

//------------------------------------------------------------
Campo_arqAgRet_Clinica.prototype = new Lance_CampoHidden;

function Campo_arqAgRet_Clinica()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Clinica", "Clinica", "Clinica", "arqClinica", "a_clini", null, "",31);
}

var Clinica = new Campo_arqAgRet_Clinica;

//------------------------------------------------------------
Campo_arqAgRet_Clinica_Clinica.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqAgRet_Clinica_Clinica()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Clinica_Clinica", "Clinica_Clinica", "Clinica", Clinica, 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Clinica_Clinica = new Campo_arqAgRet_Clinica_Clinica;

//------------------------------------------------------------
Campo_arqAgRet_Data.prototype = new Lance_CampoData;

function Campo_arqAgRet_Data()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Data", "Data", "Data", 8, "dd/mm/aaaa", true);
}

var Data = new Campo_arqAgRet_Data;

//------------------------------------------------------------
Campo_arqAgRet_Dia.prototype = new Lance_CampoCadeia;

function Campo_arqAgRet_Dia()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Dia", "Dia", "Dia", 15, "uuuuuuuuuuuuuuu", false);
}

var Dia = new Campo_arqAgRet_Dia;

//------------------------------------------------------------
Campo_arqAgRet_Hora.prototype = new Lance_CampoHora;

function Campo_arqAgRet_Hora()
{
	this.superClass = Lance_CampoHora;
	this.superClass( "Hora", "Hora", "Hora", 4, "hh:mm", true);
}

var Hora = new Campo_arqAgRet_Hora;

//------------------------------------------------------------
Campo_arqAgRet_Consulta.prototype = new Lance_CampoHidden;

function Campo_arqAgRet_Consulta()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Consulta", "Consulta", "Consulta", "arqConsulta", "a_consul", null, "",39);
}

var Consulta = new Campo_arqAgRet_Consulta;

//------------------------------------------------------------
Campo_arqAgRet_Consulta_Num.prototype = new Lance_CampoNumericoLigado;

function Campo_arqAgRet_Consulta_Num()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "Consulta_Num", "Consulta_Num", "Num", Consulta, 6, "###.##z", true,"", "");
}

var Consulta_Num = new Campo_arqAgRet_Consulta_Num;

//------------------------------------------------------------
Campo_arqAgRet_Prontuario.prototype = new Lance_CampoCadeia;

function Campo_arqAgRet_Prontuario()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Prontuario", "Prontuario", "Prontuario", 9, "uuuuuuuuu", false);
}

var Prontuario = new Campo_arqAgRet_Prontuario;

//------------------------------------------------------------
Campo_arqAgRet_Nome.prototype = new Lance_CampoCadeia;

function Campo_arqAgRet_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Nome", "Nome", "Nome", 60, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Nome = new Campo_arqAgRet_Nome;

//------------------------------------------------------------
Campo_arqAgRet_NumCelular.prototype = new Lance_CampoCadeia;

function Campo_arqAgRet_NumCelular()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "NumCelular", "NumCelular", "NumCelular", 11, "(##) #.####.####", true);
}

var NumCelular = new Campo_arqAgRet_NumCelular;

//------------------------------------------------------------
Campo_arqAgRet_TStAgRet.prototype = new Lance_CampoLigado;

function Campo_arqAgRet_TStAgRet()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TStAgRet", "TStAgRet", "TStAgRet", "tabTStAgRet", "t_tstagr", null, "",0);
}

var TStAgRet = new Campo_arqAgRet_TStAgRet;

//------------------------------------------------------------
Campo_arqAgRet_TStAgRet_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqAgRet_TStAgRet_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TStAgRet_Chave", "TStAgRet_Chave", "TStAgRet", TStAgRet, 1, "u", false);
}

var TStAgRet_Chave = new Campo_arqAgRet_TStAgRet_Chave;

//------------------------------------------------------------
Campo_arqAgRet_TStAgRet_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqAgRet_TStAgRet_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TStAgRet_Descritor", "TStAgRet_Descritor", "TStAgRet", TStAgRet, 11, "xxxxxxxxxxx", false);
}

var TStAgRet_Descritor = new Campo_arqAgRet_TStAgRet_Descritor;

//------------------------------------------------------------
Campo_arqAgRet_Assessor.prototype = new Lance_CampoHidden;

function Campo_arqAgRet_Assessor()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Assessor", "Assessor", "Assessor", "arqUsuario", "a_usuari", null, "",5);
}

var Assessor = new Campo_arqAgRet_Assessor;

//------------------------------------------------------------
Campo_arqAgRet_Assessor_Usuario.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqAgRet_Assessor_Usuario()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Assessor_Usuario", "Assessor_Usuario", "Usuario", Assessor, 40, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Assessor_Usuario = new Campo_arqAgRet_Assessor_Usuario;

//------------------------------------------------------------
Campo_arqAgRet_Obs.prototype = new Lance_CampoTexto;

function Campo_arqAgRet_Obs()
{
	this.superClass = Lance_CampoTexto;
	this.superClass( "Obs", "Obs", "Obs", false);
}

var Obs = new Campo_arqAgRet_Obs;

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqAgRet_Clinica.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A clínica é obrigatória" );
		return( true );
	}
}

Clinica.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqAgRet_Clinica_Clinica.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Clinica.Obrigatorio( p_comMsg ) );
}

Clinica_Clinica.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqAgRet_Data.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A data é obrigatória" );
		return( true );
	}
}

Data.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_arqAgRet_Dia.prototype.Calculou = function()
{
{
	return( this.Atribuiu( diaDaSemanaExtenso( Data ) ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqAgRet_Dia.prototype.Cabecalho = function()
{
		return( "Dia Semana" );
}

Dia.EhCalculado = true;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqAgRet_Hora.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A hora é obrigatória" );
		return( true );
	}
}

Hora.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqAgRet_Consulta.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A consulta é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqAgRet_Consulta_Num.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Consulta.Obrigatorio( p_comMsg ) );
}

Consulta_Num.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_arqAgRet_Prontuario.prototype.Calculou = function()
{
{
{
	if( !Consulta.ValorFoiPreenchido() )
		this.Atribuiu( "" );
	else
		g_strConexao += " ( SELECT Prontuario FROM arqPessoa WHERE arqPessoa.IdPrimario=( COALESCE( ( SELECT Pessoa FROM arqConsulta WHERE arqConsulta.IdPrimario=( " + Consulta + " ) ), 0 ) )  )" + LANCE_SEPARADOR + this.Prefixo + "Prontuario" + LANCE_FIM_PARAMETRO;
	return( true );
}
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqAgRet_Prontuario.prototype.Cabecalho = function()
{
		return( "Prontuário" );
}

Prontuario.EhCalculado = true;
//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_arqAgRet_Nome.prototype.Calculou = function()
{
{
{
	if( !Consulta.ValorFoiPreenchido() )
		this.Atribuiu( "" );
	else
		g_strConexao += " ( SELECT Nome FROM arqPessoa WHERE arqPessoa.IdPrimario=( COALESCE( ( SELECT Pessoa FROM arqConsulta WHERE arqConsulta.IdPrimario=( " + Consulta + " ) ), 0 ) )  )" + LANCE_SEPARADOR + this.Prefixo + "Nome" + LANCE_FIM_PARAMETRO;
	return( true );
}
}
}

Nome.EhCalculado = true;
//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_arqAgRet_NumCelular.prototype.Calculou = function()
{
{
{
	if( !Consulta.ValorFoiPreenchido() )
		this.Atribuiu( "" );
	else
		g_strConexao += " ( SELECT NumCelular FROM arqPessoa WHERE arqPessoa.IdPrimario=( COALESCE( ( SELECT Pessoa FROM arqConsulta WHERE arqConsulta.IdPrimario=( " + Consulta + " ) ), 0 ) )  )" + LANCE_SEPARADOR + this.Prefixo + "NumCelular" + LANCE_FIM_PARAMETRO;
	return( true );
}
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqAgRet_NumCelular.prototype.Cabecalho = function()
{
		return( "Celular" );
}

NumCelular.EhCalculado = true;
//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqAgRet_TStAgRet.prototype.Cabecalho = function()
{
		return( "Status" );
}

TStAgRet_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TStAgRet_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqAgRet_Assessor.prototype.FiltroPai = function()
{
			return( ""+ vijAssessor() + "" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqAgRet_Assessor.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O assessor é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqAgRet_Assessor.prototype.Cabecalho = function()
{
		return( "Assessor" );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqAgRet_Assessor.prototype.Existencia = function()
{
	return( tem( TStAgRet ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqAgRet_Assessor_Usuario.prototype.Existencia = function()
{
	return( tem( TStAgRet ) );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqAgRet_Assessor_Usuario.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Assessor.Obrigatorio( p_comMsg ) );
}

Assessor_Usuario.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqAgRet_Clinica.prototype.ExistenciaEspecial = function()
{
	return( ( !Clinica_Clinica.Obrigatorio( false ) || tem(Clinica_Clinica) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqAgRet_Consulta.prototype.ExistenciaEspecial = function()
{
	return( ( !Consulta_Num.Obrigatorio( false ) || tem(Consulta_Num) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqAgRet_Assessor.prototype.ExistenciaEspecial = function()
{
	return( ( !Assessor_Usuario.Obrigatorio( false ) || tem(Assessor_Usuario) ) );
}

function IniciarDependencias_arqAgRet()
{
Data.CalculosDependentes= [ Dia ];
Consulta.CalculosDependentes= [ Prontuario,Nome,NumCelular ];
Clinica_Clinica.ExistenciasDependentes= [ Clinica ];
Consulta_Num.ExistenciasDependentes= [ Consulta ];
TStAgRet.ExistenciasDependentes= [ Assessor,Assessor_Usuario ];
Assessor_Usuario.ExistenciasDependentes= [ Assessor ];
Clinica_Clinica.ErrosDependentes= [ Clinica ];
Consulta_Num.ErrosDependentes= [ Consulta ];
Assessor_Usuario.ErrosDependentes= [ Assessor ];
Clinica.CamposChave= [ Clinica_Clinica ];
Consulta.CamposChave= [ Consulta_Num ];
Assessor.CamposChave= [ Assessor_Usuario ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqAgRet";
//------------------------------------------------------------
function ListaDeCampos_arqAgRet( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Clinica, Clinica_Clinica, Data, Dia, Hora, Consulta, Consulta_Num, Prontuario, Nome, NumCelular, TStAgRet, TStAgRet_Chave, TStAgRet_Descritor, Assessor, Assessor_Usuario, Obs ]	);
	IniciarDependencias_arqAgRet();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqAgRet( '' );
g_idOperacao = 53;

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
