/*=========================================================================
  a_consul - Consulta
=========================================================================*/

//------------------------------------------------------------
Campo_arqConsulta_Protocolo.prototype = new Lance_CampoNumerico;

function Campo_arqConsulta_Protocolo()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Protocolo", "Protocolo", "Protocolo", 6, "###.##z", true,"", "");
}

var Protocolo = new Campo_arqConsulta_Protocolo;

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
Campo_arqConsulta_Assesor.prototype = new Lance_CampoHidden;

function Campo_arqConsulta_Assesor()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Assesor", "Assesor", "Assesor", "arqUsuario", "a_usuari", null, "",5);
}

var Assesor = new Campo_arqConsulta_Assesor;

//------------------------------------------------------------
Campo_arqConsulta_Assesor_Usuario.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_Assesor_Usuario()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Assesor_Usuario", "Assesor_Usuario", "Usuario", Assesor, 40, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Assesor_Usuario = new Campo_arqConsulta_Assesor_Usuario;

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
Campo_arqConsulta_Recepcao.prototype = new Lance_CampoHidden;

function Campo_arqConsulta_Recepcao()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Recepcao", "Recepcao", "Recepcao", "arqUsuario", "a_usuari", null, "",5);
}

var Recepcao = new Campo_arqConsulta_Recepcao;

//------------------------------------------------------------
Campo_arqConsulta_Recepcao_Usuario.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_Recepcao_Usuario()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Recepcao_Usuario", "Recepcao_Usuario", "Usuario", Recepcao, 40, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Recepcao_Usuario = new Campo_arqConsulta_Recepcao_Usuario;

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqConsulta_Protocolo.prototype.PodeAlterar = function()
{
		if( GrupoAtualEm() )
		return( true );
	return( false );
}

Protocolo.TipoCampo |= CAMPO_CHAVE;
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
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_HoraChega.prototype.Cabecalho = function()
{
		return( "Chegou às" );
}

//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqConsulta_Medico.prototype.FiltroPai = function()
{
		if( g_inserindo )
			return( "A.Grupo is not null and A.Ativo == 1 and A.Medico == 1" );
			return( "A.Grupo is not null and A.Medico == 1" );
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
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_Pessoa_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Pessoa.Obrigatorio( p_comMsg ) );
}

Pessoa_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqConsulta_Assesor.prototype.FiltroPai = function()
{
		if( g_inserindo )
			return( "A.Grupo is not null and A.Ativo == 1" );
			return( "A.Grupo is not null" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_Assesor_Usuario.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Assesor.Obrigatorio( p_comMsg ) );
}

Assesor_Usuario.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqConsulta_Mkt.prototype.FiltroPai = function()
{
		if( g_inserindo )
			return( "A.Grupo is not null and A.Ativo == 1" );
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
Campo_arqConsulta_Recepcao.prototype.FiltroPai = function()
{
		if( g_inserindo )
			return( "A.Grupo is not null and A.Ativo == 1" );
			return( "A.Grupo is not null" );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_Recepcao.prototype.Cabecalho = function()
{
		return( "Recepção" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_Recepcao_Usuario.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Recepcao.Obrigatorio( p_comMsg ) );
}

Recepcao_Usuario.TipoCampo |= CAMPO_CHAVE_PAI;
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
Campo_arqConsulta_Medico.prototype.ExistenciaEspecial = function()
{
	return( ( !Medico_Usuario.Obrigatorio( false ) || tem(Medico_Usuario) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqConsulta_Pessoa.prototype.ExistenciaEspecial = function()
{
	return( ( !Pessoa_Nome.Obrigatorio( false ) || tem(Pessoa_Nome) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqConsulta_Assesor.prototype.ExistenciaEspecial = function()
{
	return( ( !Assesor_Usuario.Obrigatorio( false ) || tem(Assesor_Usuario) ) );
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
Campo_arqConsulta_Recepcao.prototype.ExistenciaEspecial = function()
{
	return( ( !Recepcao_Usuario.Obrigatorio( false ) || tem(Recepcao_Usuario) ) );
}

function IniciarDependencias_arqConsulta()
{
Clinica_Clinica.ExistenciasDependentes= [ Clinica ];
Medico_Usuario.ExistenciasDependentes= [ Medico ];
Pessoa_Nome.ExistenciasDependentes= [ Pessoa ];
Assesor_Usuario.ExistenciasDependentes= [ Assesor ];
Mkt_Usuario.ExistenciasDependentes= [ Mkt ];
Recepcao_Usuario.ExistenciasDependentes= [ Recepcao ];
Clinica_Clinica.ErrosDependentes= [ Clinica ];
Medico_Usuario.ErrosDependentes= [ Medico ];
Pessoa_Nome.ErrosDependentes= [ Pessoa ];
Assesor_Usuario.ErrosDependentes= [ Assesor ];
Mkt_Usuario.ErrosDependentes= [ Mkt ];
Recepcao_Usuario.ErrosDependentes= [ Recepcao ];
Clinica.CamposChave= [ Clinica_Clinica ];
Medico.CamposChave= [ Medico_Usuario ];
Pessoa.CamposChave= [ Pessoa_Nome ];
Assesor.CamposChave= [ Assesor_Usuario ];
Mkt.CamposChave= [ Mkt_Usuario ];
Recepcao.CamposChave= [ Recepcao_Usuario ];
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

		[ Protocolo, Clinica, Clinica_Clinica, Data, Hora, HoraChega, Medico, Medico_Usuario, Pessoa, Pessoa_Nome, Assesor, Assesor_Usuario, Mkt, Mkt_Usuario, Recepcao, Recepcao_Usuario ]	);
	IniciarDependencias_arqConsulta();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqConsulta( '' );
g_idOperacao = 39;

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
