/*=========================================================================
  a_consul - Consulta
=========================================================================*/

//------------------------------------------------------------
Campo_arqConsulta_Num.prototype = new Lance_CampoNumerico;

function Campo_arqConsulta_Num()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Num", "Num", "Num", 6, "###.##z", true,"", "");
}

var Num = new Campo_arqConsulta_Num;

//------------------------------------------------------------
Campo_arqConsulta_Clinica.prototype = new Lance_CampoHidden;

function Campo_arqConsulta_Clinica()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Clinica", "Clinica", "Clinica", "arqClinica", "a_clini", null, "",31);
}

var Clinica = new Campo_arqConsulta_Clinica;

//------------------------------------------------------------
Campo_arqConsulta_Clinica_Clinica.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_Clinica_Clinica()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Clinica_Clinica", "Clinica_Clinica", "Clinica", Clinica, 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Clinica_Clinica = new Campo_arqConsulta_Clinica_Clinica;

//------------------------------------------------------------
Campo_arqConsulta_TStCon.prototype = new Lance_CampoLigado;

function Campo_arqConsulta_TStCon()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TStCon", "TStCon", "TStCon", "tabTStCon", "t_tstcon", null, "",0);
}

var TStCon = new Campo_arqConsulta_TStCon;

//------------------------------------------------------------
Campo_arqConsulta_TStCon_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_TStCon_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TStCon_Chave", "TStCon_Chave", "TStCon", TStCon, 2, "uu", false);
}

var TStCon_Chave = new Campo_arqConsulta_TStCon_Chave;

//------------------------------------------------------------
Campo_arqConsulta_TStCon_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_TStCon_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TStCon_Descritor", "TStCon_Descritor", "TStCon", TStCon, 18, "xxxxxxxxxxxxxxxxxx", false);
}

var TStCon_Descritor = new Campo_arqConsulta_TStCon_Descritor;

//------------------------------------------------------------
Campo_arqConsulta_Data.prototype = new Lance_CampoData;

function Campo_arqConsulta_Data()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Data", "Data", "Data", 8, "dd/mm/aaaa", true);
}

var Data = new Campo_arqConsulta_Data;

//------------------------------------------------------------
Campo_arqConsulta_Hora.prototype = new Lance_CampoHora;

function Campo_arqConsulta_Hora()
{
	this.superClass = Lance_CampoHora;
	this.superClass( "Hora", "Hora", "Hora", 4, "hh:mm", true);
}

var Hora = new Campo_arqConsulta_Hora;

//------------------------------------------------------------
Campo_arqConsulta_HoraChega.prototype = new Lance_CampoHora;

function Campo_arqConsulta_HoraChega()
{
	this.superClass = Lance_CampoHora;
	this.superClass( "HoraChega", "HoraChega", "HoraChega", 4, "hh:mm", true);
}

var HoraChega = new Campo_arqConsulta_HoraChega;

//------------------------------------------------------------
Campo_arqConsulta_Pessoa.prototype = new Lance_CampoHidden;

function Campo_arqConsulta_Pessoa()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Pessoa", "Pessoa", "Pessoa", "arqPessoa", "a_pessoa", null, "",7);
}

var Pessoa = new Campo_arqConsulta_Pessoa;

//------------------------------------------------------------
Campo_arqConsulta_Pessoa_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_Pessoa_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Pessoa_Nome", "Pessoa_Nome", "Nome", Pessoa, 60, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Pessoa_Nome = new Campo_arqConsulta_Pessoa_Nome;

//------------------------------------------------------------
Campo_arqConsulta_Pessoa_Prontuario.prototype = new Lance_CampoNumericoLigado;

function Campo_arqConsulta_Pessoa_Prontuario()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "Pessoa_Prontuario", "Pessoa_Prontuario", "Prontuario", Pessoa, 13, "#.###.###.###.##z", true,"", "");
}

var Pessoa_Prontuario = new Campo_arqConsulta_Pessoa_Prontuario;

//------------------------------------------------------------
Campo_arqConsulta_Medico.prototype = new Lance_CampoHidden;

function Campo_arqConsulta_Medico()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Medico", "Medico", "Medico", "arqUsuario", "a_usuari", null, "",5);
}

var Medico = new Campo_arqConsulta_Medico;

//------------------------------------------------------------
Campo_arqConsulta_Medico_Usuario.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_Medico_Usuario()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Medico_Usuario", "Medico_Usuario", "Usuario", Medico, 40, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Medico_Usuario = new Campo_arqConsulta_Medico_Usuario;

//------------------------------------------------------------
Campo_arqConsulta_Mkt.prototype = new Lance_CampoHidden;

function Campo_arqConsulta_Mkt()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Mkt", "Mkt", "Mkt", "arqUsuario", "a_usuari", null, "",5);
}

var Mkt = new Campo_arqConsulta_Mkt;

//------------------------------------------------------------
Campo_arqConsulta_Mkt_Usuario.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_Mkt_Usuario()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Mkt_Usuario", "Mkt_Usuario", "Usuario", Mkt, 40, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Mkt_Usuario = new Campo_arqConsulta_Mkt_Usuario;

//------------------------------------------------------------
Campo_arqConsulta_Assessor.prototype = new Lance_CampoHidden;

function Campo_arqConsulta_Assessor()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Assessor", "Assessor", "Assessor", "arqUsuario", "a_usuari", null, "",5);
}

var Assessor = new Campo_arqConsulta_Assessor;

//------------------------------------------------------------
Campo_arqConsulta_Assessor_Usuario.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_Assessor_Usuario()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Assessor_Usuario", "Assessor_Usuario", "Usuario", Assessor, 40, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Assessor_Usuario = new Campo_arqConsulta_Assessor_Usuario;

//------------------------------------------------------------
Campo_arqConsulta_MedicaAtua.prototype = new Lance_CampoTexto;

function Campo_arqConsulta_MedicaAtua()
{
	this.superClass = Lance_CampoTexto;
	this.superClass( "MedicaAtua", "MedicaAtua", "MedicaAtua", false);
}

var MedicaAtua = new Campo_arqConsulta_MedicaAtua;

//------------------------------------------------------------
Campo_arqConsulta_TMotivo.prototype = new Lance_CampoLigado;

function Campo_arqConsulta_TMotivo()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TMotivo", "TMotivo", "TMotivo", "tabTMotivo", "t_tmotiv", null, "",0);
}

var TMotivo = new Campo_arqConsulta_TMotivo;

//------------------------------------------------------------
Campo_arqConsulta_TMotivo_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_TMotivo_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TMotivo_Chave", "TMotivo_Chave", "TMotivo", TMotivo, 1, "u", false);
}

var TMotivo_Chave = new Campo_arqConsulta_TMotivo_Chave;

//------------------------------------------------------------
Campo_arqConsulta_TMotivo_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_TMotivo_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TMotivo_Descritor", "TMotivo_Descritor", "TMotivo", TMotivo, 32, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var TMotivo_Descritor = new Campo_arqConsulta_TMotivo_Descritor;

//------------------------------------------------------------
Campo_arqConsulta_TPrograma.prototype = new Lance_CampoLigado;

function Campo_arqConsulta_TPrograma()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TPrograma", "TPrograma", "TPrograma", "tabTPrograma", "t_tprogr", null, "",0);
}

var TPrograma = new Campo_arqConsulta_TPrograma;

//------------------------------------------------------------
Campo_arqConsulta_TPrograma_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_TPrograma_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TPrograma_Chave", "TPrograma_Chave", "TPrograma", TPrograma, 2, "uu", false);
}

var TPrograma_Chave = new Campo_arqConsulta_TPrograma_Chave;

//------------------------------------------------------------
Campo_arqConsulta_TPrograma_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_TPrograma_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TPrograma_Descritor", "TPrograma_Descritor", "TPrograma", TPrograma, 8, "xxxxxxxx", false);
}

var TPrograma_Descritor = new Campo_arqConsulta_TPrograma_Descritor;

//------------------------------------------------------------
Campo_arqConsulta_Conduta.prototype = new Lance_CampoTexto;

function Campo_arqConsulta_Conduta()
{
	this.superClass = Lance_CampoTexto;
	this.superClass( "Conduta", "Conduta", "Conduta", false);
}

var Conduta = new Campo_arqConsulta_Conduta;

//------------------------------------------------------------
Campo_arqConsulta_Medicacao.prototype = new Lance_CampoTexto;

function Campo_arqConsulta_Medicacao()
{
	this.superClass = Lance_CampoTexto;
	this.superClass( "Medicacao", "Medicacao", "Medicacao", false);
}

var Medicacao = new Campo_arqConsulta_Medicacao;

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqConsulta_Num.prototype.PodeAlterar = function()
{
		if( GrupoAtualEm() )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_Num.prototype.Cabecalho = function()
{
		return( "N°" );
}

Num.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqConsulta_Clinica.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A clínica é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_Clinica_Clinica.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Clinica.Obrigatorio( p_comMsg ) );
}

Clinica_Clinica.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqConsulta_TStCon.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqConsulta_TStCon.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O sttaus é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_TStCon.prototype.Cabecalho = function()
{
		return( "Status" );
}

TStCon_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TStCon_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqConsulta_Data.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A data da consulta é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqConsulta_Hora.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O horário da consulta é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqConsulta_HoraChega.prototype.PodeAlterar = function()
{
		if( GrupoAtualEm() )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_HoraChega.prototype.Cabecalho = function()
{
		return( "Chegou às" );
}

//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqConsulta_Pessoa.prototype.FiltroPai = function()
{
		if( g_inserindo )
			return( "A.QtoDesmar < " + g_qtasDesmar + "" );
		return( "" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqConsulta_Pessoa.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O paciente é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_Pessoa.prototype.Cabecalho = function()
{
		return( "Paciente" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_Pessoa_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Pessoa.Obrigatorio( p_comMsg ) );
}

Pessoa_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_Pessoa_Prontuario.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Pessoa.Obrigatorio( p_comMsg ) );
}

Pessoa_Prontuario.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqConsulta_Medico.prototype.FiltroPai = function()
{
		if( g_inserindo )
			return( "A.Medico = 1 and A.Ativo = 1 and A.Grupo is not null" );
			return( "A.Medico = 1 and A.Grupo is not null" );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_Medico.prototype.Cabecalho = function()
{
		return( "Médico" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_Medico_Usuario.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Medico.Obrigatorio( p_comMsg ) );
}

Medico_Usuario.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqConsulta_Mkt.prototype.FiltroPai = function()
{
		if( g_inserindo )
			return( "A.Grupo is not null and A.Ativo = 1" );
			return( "A.Grupo is not null" );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_Mkt.prototype.Cabecalho = function()
{
		return( "MKT" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_Mkt_Usuario.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Mkt.Obrigatorio( p_comMsg ) );
}

Mkt_Usuario.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqConsulta_Assessor.prototype.FiltroPai = function()
{
		if( g_inserindo )
			return( "A.Grupo is not null and A.Ativo == 1" );
			return( "A.Grupo is not null" );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_Assessor.prototype.Cabecalho = function()
{
		return( "Assessor" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_Assessor_Usuario.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Assessor.Obrigatorio( p_comMsg ) );
}

Assessor_Usuario.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_TMotivo.prototype.Cabecalho = function()
{
		return( "Motivo" );
}

TMotivo_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TMotivo_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_TPrograma.prototype.Cabecalho = function()
{
		return( "Programa" );
}

TPrograma_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TPrograma_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqConsulta_Clinica.prototype.ExistenciaEspecial = function()
{
	return( ( !Clinica_Clinica.Obrigatorio( false ) || tem(Clinica_Clinica) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqConsulta_Pessoa.prototype.ExistenciaEspecial = function()
{
	return( ( !Pessoa_Nome.Obrigatorio( false ) || tem(Pessoa_Nome) ) && ( !Pessoa_Prontuario.Obrigatorio( false ) || tem(Pessoa_Prontuario) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqConsulta_Medico.prototype.ExistenciaEspecial = function()
{
	return( ( !Medico_Usuario.Obrigatorio( false ) || tem(Medico_Usuario) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqConsulta_Mkt.prototype.ExistenciaEspecial = function()
{
	return( ( !Mkt_Usuario.Obrigatorio( false ) || tem(Mkt_Usuario) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqConsulta_Assessor.prototype.ExistenciaEspecial = function()
{
	return( ( !Assessor_Usuario.Obrigatorio( false ) || tem(Assessor_Usuario) ) );
}

function IniciarDependencias_arqConsulta()
{
Clinica_Clinica.ExistenciasDependentes= [ Clinica ];
Pessoa_Nome.ExistenciasDependentes= [ Pessoa ];
Pessoa_Prontuario.ExistenciasDependentes= [ Pessoa ];
Medico_Usuario.ExistenciasDependentes= [ Medico ];
Mkt_Usuario.ExistenciasDependentes= [ Mkt ];
Assessor_Usuario.ExistenciasDependentes= [ Assessor ];
Clinica_Clinica.ErrosDependentes= [ Clinica ];
Pessoa_Prontuario.ErrosDependentes= [ Pessoa ];
Medico_Usuario.ErrosDependentes= [ Medico ];
Mkt_Usuario.ErrosDependentes= [ Mkt ];
Assessor_Usuario.ErrosDependentes= [ Assessor ];
Clinica.CamposChave= [ Clinica_Clinica ];
Pessoa.CamposChave= [ Pessoa_Nome,Pessoa_Prontuario ];
Medico.CamposChave= [ Medico_Usuario ];
Mkt.CamposChave= [ Mkt_Usuario ];
Assessor.CamposChave= [ Assessor_Usuario ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqConsulta";
//------------------------------------------------------------
function ListaDeCampos_arqConsulta( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Num, Clinica, Clinica_Clinica, TStCon, TStCon_Chave, TStCon_Descritor, Data, Hora, HoraChega, Pessoa, Pessoa_Nome, Pessoa_Prontuario, Medico, Medico_Usuario, Mkt, Mkt_Usuario, Assessor, Assessor_Usuario, MedicaAtua, TMotivo, TMotivo_Chave, TMotivo_Descritor, TPrograma, TPrograma_Chave, TPrograma_Descritor, Conduta, Medicacao ]	);
	IniciarDependencias_arqConsulta();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqConsulta( '' );
g_idOperacao = 39;

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"Informar Chegada","","h",137,"","",1,"","1", "a_qselec", "parQSelecao", "Alterar", "", "", "", "", "5^^^p_consulta_alterar^^^^^^^^^^^^^^^^^^", "", 0,16,[137],[]);
parent.navegacao.MenuPrincQtdOpcoes=1;
}
