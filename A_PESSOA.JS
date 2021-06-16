/*=========================================================================
  a_pessoa - Pessoa
	usa a_endere
=========================================================================*/

//------------------------------------------------------------
Campo_arqPessoa_Nome.prototype = new Lance_CampoCadeia;

function Campo_arqPessoa_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Nome", "Nome", "Nome", 60, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Nome = new Campo_arqPessoa_Nome;

//------------------------------------------------------------
Campo_arqPessoa_Apelido.prototype = new Lance_CampoCadeia;

function Campo_arqPessoa_Apelido()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Apelido", "Apelido", "Apelido", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Apelido = new Campo_arqPessoa_Apelido;

//------------------------------------------------------------
Campo_arqPessoa_TPessoa.prototype = new Lance_CampoLigado;

function Campo_arqPessoa_TPessoa()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TPessoa", "TPessoa", "TPessoa", "tabTPessoa", "t_tpesso", null, "",0);
}

var TPessoa = new Campo_arqPessoa_TPessoa;

//------------------------------------------------------------
Campo_arqPessoa_TPessoa_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqPessoa_TPessoa_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TPessoa_Chave", "TPessoa_Chave", "TPessoa", TPessoa, 1, "u", false);
}

var TPessoa_Chave = new Campo_arqPessoa_TPessoa_Chave;

//------------------------------------------------------------
Campo_arqPessoa_TPessoa_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqPessoa_TPessoa_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TPessoa_Descritor", "TPessoa_Descritor", "TPessoa", TPessoa, 10, "xxxxxxxxxx", false);
}

var TPessoa_Descritor = new Campo_arqPessoa_TPessoa_Descritor;

//------------------------------------------------------------
Campo_arqPessoa_TPFPJ.prototype = new Lance_CampoLigado;

function Campo_arqPessoa_TPFPJ()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TPFPJ", "TPFPJ", "TPFPJ", "tabTPFPJ", "t_tpfpj", null, "",0);
}

var TPFPJ = new Campo_arqPessoa_TPFPJ;

//------------------------------------------------------------
Campo_arqPessoa_TPFPJ_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqPessoa_TPFPJ_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TPFPJ_Chave", "TPFPJ_Chave", "TPFPJ", TPFPJ, 1, "u", false);
}

var TPFPJ_Chave = new Campo_arqPessoa_TPFPJ_Chave;

//------------------------------------------------------------
Campo_arqPessoa_TPFPJ_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqPessoa_TPFPJ_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TPFPJ_Descritor", "TPFPJ_Descritor", "TPFPJ", TPFPJ, 8, "xxxxxxxx", false);
}

var TPFPJ_Descritor = new Campo_arqPessoa_TPFPJ_Descritor;

//------------------------------------------------------------
Campo_arqPessoa_Prontuario.prototype = new Lance_CampoNumerico;

function Campo_arqPessoa_Prontuario()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Prontuario", "Prontuario", "Prontuario", 13, "#.###.###.###.##z", true,"", "");
}

var Prontuario = new Campo_arqPessoa_Prontuario;

//------------------------------------------------------------
IniciarPrefixos_domEndereco( "Ende_" );

//------------------------------------------------------------
Campo_arqPessoa_CNPJ.prototype = new Lance_CampoCadeia;

function Campo_arqPessoa_CNPJ()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "CNPJ", "CNPJ", "CNPJ", 14, "##.###.###/####-##", true);
}

var CNPJ = new Campo_arqPessoa_CNPJ;

//------------------------------------------------------------
Campo_arqPessoa_InscEstad.prototype = new Lance_CampoCadeia;

function Campo_arqPessoa_InscEstad()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "InscEstad", "InscEstad", "InscEstad", 25, "xxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var InscEstad = new Campo_arqPessoa_InscEstad;

//------------------------------------------------------------
Campo_arqPessoa_InscMunic.prototype = new Lance_CampoCadeia;

function Campo_arqPessoa_InscMunic()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "InscMunic", "InscMunic", "InscMunic", 25, "xxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var InscMunic = new Campo_arqPessoa_InscMunic;

//------------------------------------------------------------
Campo_arqPessoa_Nascimento.prototype = new Lance_CampoData;

function Campo_arqPessoa_Nascimento()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Nascimento", "Nascimento", "Nascimento", 8, "dd/mm/aaaa", true);
}

var Nascimento = new Campo_arqPessoa_Nascimento;

//------------------------------------------------------------
Campo_arqPessoa_Idade.prototype = new Lance_CampoNumerico;

function Campo_arqPessoa_Idade()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Idade", "Idade", "Idade", 3, "##z", true,"", "");
}

var Idade = new Campo_arqPessoa_Idade;

//------------------------------------------------------------
Campo_arqPessoa_Sexo.prototype = new Lance_CampoLigado;

function Campo_arqPessoa_Sexo()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "Sexo", "Sexo", "Sexo", "tabSexo", "t_sexo", null, "",0);
}

var Sexo = new Campo_arqPessoa_Sexo;

//------------------------------------------------------------
Campo_arqPessoa_Sexo_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqPessoa_Sexo_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Sexo_Chave", "Sexo_Chave", "Sexo", Sexo, 1, "u", false);
}

var Sexo_Chave = new Campo_arqPessoa_Sexo_Chave;

//------------------------------------------------------------
Campo_arqPessoa_Sexo_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqPessoa_Sexo_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Sexo_Descritor", "Sexo_Descritor", "Sexo", Sexo, 9, "xxxxxxxxx", false);
}

var Sexo_Descritor = new Campo_arqPessoa_Sexo_Descritor;

//------------------------------------------------------------
Campo_arqPessoa_EstCivil.prototype = new Lance_CampoLigado;

function Campo_arqPessoa_EstCivil()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "EstCivil", "EstCivil", "EstCivil", "tabEstCivil", "t_estciv", null, "",0);
}

var EstCivil = new Campo_arqPessoa_EstCivil;

//------------------------------------------------------------
Campo_arqPessoa_EstCivil_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqPessoa_EstCivil_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "EstCivil_Chave", "EstCivil_Chave", "EstCivil", EstCivil, 1, "u", false);
}

var EstCivil_Chave = new Campo_arqPessoa_EstCivil_Chave;

//------------------------------------------------------------
Campo_arqPessoa_EstCivil_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqPessoa_EstCivil_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "EstCivil_Descritor", "EstCivil_Descritor", "EstCivil", EstCivil, 13, "xxxxxxxxxxxxx", false);
}

var EstCivil_Descritor = new Campo_arqPessoa_EstCivil_Descritor;

//------------------------------------------------------------
Campo_arqPessoa_Profissao.prototype = new Lance_CampoHidden;

function Campo_arqPessoa_Profissao()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Profissao", "Profissao", "Profissao", "arqProfissao", "a_profis", null, "",36);
}

var Profissao = new Campo_arqPessoa_Profissao;

//------------------------------------------------------------
Campo_arqPessoa_Profissao_Profissao.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqPessoa_Profissao_Profissao()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Profissao_Profissao", "Profissao_Profissao", "Profissao", Profissao, 40, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Profissao_Profissao = new Campo_arqPessoa_Profissao_Profissao;

//------------------------------------------------------------
Campo_arqPessoa_CPF.prototype = new Lance_CampoCadeia;

function Campo_arqPessoa_CPF()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "CPF", "CPF", "CPF", 11, "###.###.###-##", true);
}

var CPF = new Campo_arqPessoa_CPF;

//------------------------------------------------------------
Campo_arqPessoa_Identidade.prototype = new Lance_CampoCadeia;

function Campo_arqPessoa_Identidade()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Identidade", "Identidade", "Identidade", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Identidade = new Campo_arqPessoa_Identidade;

//------------------------------------------------------------
Campo_arqPessoa_Orgao.prototype = new Lance_CampoCadeia;

function Campo_arqPessoa_Orgao()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Orgao", "Orgao", "Orgão", 20, "xxxxxxxxxxxxxxxxxxxx", false);
}

var Orgao = new Campo_arqPessoa_Orgao;

//------------------------------------------------------------
Campo_arqPessoa_Emissao.prototype = new Lance_CampoData;

function Campo_arqPessoa_Emissao()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Emissao", "Emissao", "Emissão", 8, "dd/mm/aaaa", true);
}

var Emissao = new Campo_arqPessoa_Emissao;

//------------------------------------------------------------
Campo_arqPessoa_Email.prototype = new Lance_CampoCadeia;

function Campo_arqPessoa_Email()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Email", "Email", "Email", 100, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Email = new Campo_arqPessoa_Email;

//------------------------------------------------------------
Campo_arqPessoa_RecEmail.prototype = new Lance_CampoLogico;

function Campo_arqPessoa_RecEmail()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "RecEmail", "RecEmail", "RecEmail");
}

var RecEmail = new Campo_arqPessoa_RecEmail;

//------------------------------------------------------------
Campo_arqPessoa_Ativo.prototype = new Lance_CampoLogico;

function Campo_arqPessoa_Ativo()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Ativo", "Ativo", "Ativo");
}

var Ativo = new Campo_arqPessoa_Ativo;

//------------------------------------------------------------
Campo_arqPessoa_Obs.prototype = new Lance_CampoTexto;

function Campo_arqPessoa_Obs()
{
	this.superClass = Lance_CampoTexto;
	this.superClass( "Obs", "Obs", "Obs", false);
}

var Obs = new Campo_arqPessoa_Obs;

//------------------------------------------------------------
Campo_arqPessoa_Desde.prototype = new Lance_CampoData;

function Campo_arqPessoa_Desde()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Desde", "Desde", "Desde", 8, "dd/mm/aaaa", true);
}

var Desde = new Campo_arqPessoa_Desde;

//------------------------------------------------------------
Campo_arqPessoa_QtoDesmar.prototype = new Lance_CampoNumerico;

function Campo_arqPessoa_QtoDesmar()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "QtoDesmar", "QtoDesmar", "QtoDesmar", 2, "#z", false,"", "");
}

var QtoDesmar = new Campo_arqPessoa_QtoDesmar;

//------------------------------------------------------------
Campo_arqPessoa_Midia.prototype = new Lance_CampoHidden;

function Campo_arqPessoa_Midia()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Midia", "Midia", "Midia", "arqMidia", "a_midia", null, "",30);
}

var Midia = new Campo_arqPessoa_Midia;

//------------------------------------------------------------
Campo_arqPessoa_Midia_Midia.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqPessoa_Midia_Midia()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Midia_Midia", "Midia_Midia", "Midia", Midia, 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Midia_Midia = new Campo_arqPessoa_Midia_Midia;

Nome.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqPessoa_Apelido.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( sugereApelido( Nome ) ) );
}
}

//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_arqPessoa_Apelido.prototype.TemAdvertencia = function()
{
		if( tem(this) && ( Apelido == Apelido.toString().toUpperCase() ) )
	{
		return( !confirm( "Usar CAIXA ALTA em todo o apelido clasificará a empresa como SPAMMER" ) );
	}
	return( Lance_CampoCadeiaLigado.prototype.TemAdvertencia.call( this ) );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqPessoa_TPessoa.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O tipo da pessoa é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqPessoa_TPessoa.prototype.Cabecalho = function()
{
		return( "Tipo" );
}

TPessoa_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TPessoa_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqPessoa_TPFPJ.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqPessoa_TPFPJ.prototype.Cabecalho = function()
{
		return( "PF/PJ" );
}

TPFPJ_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TPFPJ_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqPessoa_Prontuario.prototype.PodeAlterar = function()
{
		if( GrupoAtualEm() )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqPessoa_Prontuario.prototype.Cabecalho = function()
{
		return( "Prontuário" );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqPessoa_Prontuario.prototype.Existencia = function()
{
	return( TPessoa == 2 );
}

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_arqPessoa_CNPJ.prototype.TemErro = function()
{
		if( tem(this) && ( !CnpjOk( CNPJ ) ) )
	{
		alert( "CNPJ inválido" );
		return( true );
	}
	return( Lance_CampoCadeiaLigado.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqPessoa_CNPJ.prototype.Existencia = function()
{
	return( TPFPJ == 2 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqPessoa_InscEstad.prototype.Existencia = function()
{
	return( TPFPJ == 2 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqPessoa_InscMunic.prototype.Existencia = function()
{
	return( TPFPJ == 2 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqPessoa_Nascimento.prototype.Existencia = function()
{
	return( TPFPJ == 1 );
}

//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_arqPessoa_Idade.prototype.Calculou = function()
{
{
		if( tem( Nascimento ) )
	return( this.Atribuiu( idade( Nascimento ) ) );
}
		return( true );
}

Idade.EhCalculado = true;
//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqPessoa_Sexo.prototype.Existencia = function()
{
	return( TPFPJ == 1 );
}

Sexo_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
Sexo_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqPessoa_EstCivil.prototype.Existencia = function()
{
	return( TPFPJ == 1 );
}

EstCivil_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
EstCivil_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqPessoa_Profissao.prototype.Existencia = function()
{
	return( TPFPJ == 1 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqPessoa_Profissao_Profissao.prototype.Existencia = function()
{
	return( TPFPJ == 1 );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqPessoa_Profissao_Profissao.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Profissao.Obrigatorio( p_comMsg ) );
}

Profissao_Profissao.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_arqPessoa_CPF.prototype.TemErro = function()
{
		if( tem(this) && ( !CpfOk( CPF ) ) )
	{
		alert( "CPF inválido" );
		return( true );
	}
	return( Lance_CampoCadeiaLigado.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqPessoa_CPF.prototype.Existencia = function()
{
	return( TPFPJ == 1 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqPessoa_Identidade.prototype.Existencia = function()
{
	return( TPFPJ == 1 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqPessoa_Orgao.prototype.Existencia = function()
{
	return( tem( Identidade ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqPessoa_Emissao.prototype.Existencia = function()
{
	return( tem( Identidade ) );
}

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_arqPessoa_Email.prototype.TemErro = function()
{
		if( tem(this) && ( !EmailOk( Email ) ) )
	{
		alert( "Email inválido" );
		return( true );
	}
	return( Lance_CampoCadeiaLigado.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqPessoa_RecEmail.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqPessoa_RecEmail.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "Recebe email? é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqPessoa_RecEmail.prototype.Existencia = function()
{
	return( tem( Email ) );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqPessoa_Ativo.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqPessoa_Ativo.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "Ativo? é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqPessoa_Ativo.prototype.Cabecalho = function()
{
		return( "Ativo?" );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqPessoa_Desde.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( HOJE ) );
}
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqPessoa_QtoDesmar.prototype.PodeAlterar = function()
{
		if( PodeExecutarOpercao( 3 ) )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqPessoa_QtoDesmar.prototype.Cabecalho = function()
{
		return( "Qtas<br>Desmarcações" );
}

//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqPessoa_Midia.prototype.FiltroPai = function()
{
		if( g_inserindo )
			return( "A.Ativo = 1" );
		return( "" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqPessoa_Midia_Midia.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Midia.Obrigatorio( p_comMsg ) );
}

Midia_Midia.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqPessoa_Profissao.prototype.ExistenciaEspecial = function()
{
	return( ( !Profissao_Profissao.Obrigatorio( false ) || tem(Profissao_Profissao) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqPessoa_Midia.prototype.ExistenciaEspecial = function()
{
	return( ( !Midia_Midia.Obrigatorio( false ) || tem(Midia_Midia) ) );
}

function IniciarDependencias_arqPessoa()
{
Nascimento.CalculosDependentes= [ Idade ];
TPessoa.ExistenciasDependentes= [ Prontuario ];
TPFPJ.ExistenciasDependentes= [ CNPJ,InscEstad,InscMunic,Nascimento,Sexo,EstCivil,Profissao,Profissao_Profissao,CPF,Identidade ];
Profissao_Profissao.ExistenciasDependentes= [ Profissao ];
Identidade.ExistenciasDependentes= [ Orgao,Emissao ];
Email.ExistenciasDependentes= [ RecEmail ];
Midia_Midia.ExistenciasDependentes= [ Midia ];
Profissao_Profissao.ErrosDependentes= [ Profissao ];
Midia_Midia.ErrosDependentes= [ Midia ];
Profissao.CamposChave= [ Profissao_Profissao ];
Midia.CamposChave= [ Midia_Midia ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqPessoa";
//------------------------------------------------------------
function ListaDeCampos_arqPessoa( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Nome, Apelido, TPessoa, TPessoa_Chave, TPessoa_Descritor, TPFPJ, TPFPJ_Chave, TPFPJ_Descritor, Prontuario ], 
		ListaDeCampos_domEndereco( "Ende_" ), 
		[ CNPJ, InscEstad, InscMunic, Nascimento, Idade, Sexo, Sexo_Chave, Sexo_Descritor, EstCivil, EstCivil_Chave, EstCivil_Descritor, Profissao, Profissao_Profissao, CPF, Identidade, Orgao, Emissao, Email, RecEmail, Ativo, Obs, Desde, QtoDesmar, Midia, Midia_Midia ]	);
	IniciarDependencias_arqPessoa();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqPessoa( '' );
g_idOperacao = 7;

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"Emails","","E",50,"","",cnfConfig["EMAIL"] == 1,"","6", "", "", "", "", "", "", "", "", "", 2, 9,[],[12,13] );
var Menu_1_1 = new Array( 1,"Programado","","P",26,"","",1,"","1","a_logema","arqLogEmail","Folhear","Cliente","?","","", "","", 0,10,[],[12]);
var Menu_1_2 = new Array( 1,"Recebeu","","R",25,"","",1,"","1","a_itloge","arqItLogEmail","Folhear","Cliente","?","","", "","", 0,10,[],[13]);
var Menu_2 = new Array( 1,"Contatos","","C",75,"","",1,"","1","a_contpe","arqContPessoa","Folhear","Pessoa","?","","", "","", 0,9,[],[21]);
var Menu_3 = new Array( 1,"Contas","","o",98,"","",1,"","1","a_conta","arqConta","Folhear","Pessoa","?","","", "","", 0,9,[],[33]);
var Menu_4 = new Array( 1,"Consultas","","l",117,"","",1,"","1","a_consul","arqConsulta","Folhear","Pessoa","?","","", "","", 0,9,[],[39]);
parent.navegacao.MenuPrincQtdOpcoes=4;
}
