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
Campo_arqConsulta_TiAgenda.prototype = new Lance_CampoLigado;

function Campo_arqConsulta_TiAgenda()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TiAgenda", "TiAgenda", "TiAgenda", "arqTiAgenda", "a_tiagen", null, "",43);
}

var TiAgenda = new Campo_arqConsulta_TiAgenda;

//------------------------------------------------------------
Campo_arqConsulta_TiAgenda_TiAgenda.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_TiAgenda_TiAgenda()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TiAgenda_TiAgenda", "TiAgenda_TiAgenda", "TiAgenda", TiAgenda, 20, "uxxxxxxxxxxxxxxxxxxx", false);
}

var TiAgenda_TiAgenda = new Campo_arqConsulta_TiAgenda_TiAgenda;

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
Campo_arqConsulta_Pessoa_NumCelular.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_Pessoa_NumCelular()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Pessoa_NumCelular", "Pessoa_NumCelular", "NumCelular", Pessoa, 11, "(##) #.####.####", true);
}

var Pessoa_NumCelular = new Campo_arqConsulta_Pessoa_NumCelular;

//------------------------------------------------------------
Campo_arqConsulta_Prontuario.prototype = new Lance_CampoCadeia;

function Campo_arqConsulta_Prontuario()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Prontuario", "Prontuario", "Prontuario", 9, "uuuuuuuuu", false);
}

var Prontuario = new Campo_arqConsulta_Prontuario;

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

//------------------------------------------------------------
Campo_arqConsulta_FormaPg.prototype = new Lance_CampoHidden;

function Campo_arqConsulta_FormaPg()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "FormaPg", "FormaPg", "FormaPg", "arqFormaPg", "a_formap", null, "",44);
}

var FormaPg = new Campo_arqConsulta_FormaPg;

//------------------------------------------------------------
Campo_arqConsulta_FormaPg_FormaPg.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_FormaPg_FormaPg()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "FormaPg_FormaPg", "FormaPg_FormaPg", "FormaPg", FormaPg, 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var FormaPg_FormaPg = new Campo_arqConsulta_FormaPg_FormaPg;

//------------------------------------------------------------
Campo_arqConsulta_Obs.prototype = new Lance_CampoTexto;

function Campo_arqConsulta_Obs()
{
	this.superClass = Lance_CampoTexto;
	this.superClass( "Obs", "Obs", "Obs", false);
}

var Obs = new Campo_arqConsulta_Obs;

//------------------------------------------------------------
Campo_arqConsulta_Valor.prototype = new Lance_CampoNumerico;

function Campo_arqConsulta_Valor()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Valor", "Valor", "Valor", 8, "###.##z,zz", true,"", "");
}

var Valor = new Campo_arqConsulta_Valor;

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
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqConsulta_Clinica.prototype.FiltroPai = function()
{
		if( g_temMaisDeUmClinica )
			return( "A.idPrimario in ( " + g_vetIdClinica + " )" );
		return( "" );
}

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
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqConsulta_TiAgenda.prototype.FiltroPai = function()
{
		if( g_inserindo )
			return( "A.Ativo = 1" );
		return( "" );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_TiAgenda.prototype.Cabecalho = function()
{
		return( "Tipo" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_TiAgenda_TiAgenda.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( TiAgenda.Obrigatorio( p_comMsg ) );
}

TiAgenda_TiAgenda.TipoCampo |= CAMPO_CHAVE_PAI;
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
Campo_arqConsulta_Pessoa_NumCelular.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Pessoa.Obrigatorio( p_comMsg ) );
}

Pessoa_NumCelular.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_arqConsulta_Prontuario.prototype.Calculou = function()
{
{
{
	if( !Pessoa.ValorFoiPreenchido() )
		this.Atribuiu( "" );
	else
		g_strConexao += " ( SELECT Prontuario FROM arqPessoa WHERE arqPessoa.IdPrimario=( " + Pessoa + " )  )" + LANCE_SEPARADOR + this.Prefixo + "Prontuario" + LANCE_FIM_PARAMETRO;
	return( true );
}
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_Prontuario.prototype.Cabecalho = function()
{
		return( "Prontuário" );
}

Prontuario.EhCalculado = true;
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
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_FormaPg.prototype.Cabecalho = function()
{
		return( "Forma Pagto" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_FormaPg_FormaPg.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( FormaPg.Obrigatorio( p_comMsg ) );
}

FormaPg_FormaPg.TipoCampo |= CAMPO_CHAVE_PAI;
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
	return( ( !Pessoa_Nome.Obrigatorio( false ) || tem(Pessoa_Nome) ) && ( !Pessoa_NumCelular.Obrigatorio( false ) || tem(Pessoa_NumCelular) ) );
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
Campo_arqConsulta_Assessor.prototype.ExistenciaEspecial = function()
{
	return( ( !Assessor_Usuario.Obrigatorio( false ) || tem(Assessor_Usuario) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqConsulta_FormaPg.prototype.ExistenciaEspecial = function()
{
	return( ( !FormaPg_FormaPg.Obrigatorio( false ) || tem(FormaPg_FormaPg) ) );
}

function IniciarDependencias_arqConsulta()
{
Pessoa.CalculosDependentes= [ Prontuario ];
Clinica_Clinica.ExistenciasDependentes= [ Clinica ];
Pessoa_Nome.ExistenciasDependentes= [ Pessoa ];
Pessoa_NumCelular.ExistenciasDependentes= [ Pessoa ];
Medico_Usuario.ExistenciasDependentes= [ Medico ];
Assessor_Usuario.ExistenciasDependentes= [ Assessor ];
FormaPg_FormaPg.ExistenciasDependentes= [ FormaPg ];
Clinica_Clinica.ErrosDependentes= [ Clinica ];
TiAgenda_TiAgenda.ErrosDependentes= [ TiAgenda ];
Pessoa_NumCelular.ErrosDependentes= [ Pessoa ];
Medico_Usuario.ErrosDependentes= [ Medico ];
Assessor_Usuario.ErrosDependentes= [ Assessor ];
FormaPg_FormaPg.ErrosDependentes= [ FormaPg ];
Clinica.CamposChave= [ Clinica_Clinica ];
Pessoa.CamposChave= [ Pessoa_Nome,Pessoa_NumCelular ];
Medico.CamposChave= [ Medico_Usuario ];
Assessor.CamposChave= [ Assessor_Usuario ];
FormaPg.CamposChave= [ FormaPg_FormaPg ];
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

		[ Num, Clinica, Clinica_Clinica, TStCon, TStCon_Chave, TStCon_Descritor, TiAgenda, TiAgenda_TiAgenda, Data, Hora, HoraChega, Pessoa, Pessoa_Nome, Pessoa_NumCelular, Prontuario, Medico, Medico_Usuario, Assessor, Assessor_Usuario, MedicaAtua, TMotivo, TMotivo_Chave, TMotivo_Descritor, TPrograma, TPrograma_Chave, TPrograma_Descritor, Conduta, Medicacao, FormaPg, FormaPg_FormaPg, Obs, Valor ]	);
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
