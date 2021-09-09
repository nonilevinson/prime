/*=========================================================================
  a_ccor - CCor
=========================================================================*/

//------------------------------------------------------------
Campo_arqCCor_Nome.prototype = new Lance_CampoCadeia;

function Campo_arqCCor_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Nome", "Nome", "Nome", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Nome = new Campo_arqCCor_Nome;

//------------------------------------------------------------
Campo_arqCCor_Clinica.prototype = new Lance_CampoHidden;

function Campo_arqCCor_Clinica()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Clinica", "Clinica", "Clinica", "arqClinica", "a_clini", null, "",31);
}

var Clinica = new Campo_arqCCor_Clinica;

//------------------------------------------------------------
Campo_arqCCor_Clinica_Clinica.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqCCor_Clinica_Clinica()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Clinica_Clinica", "Clinica_Clinica", "Clinica", Clinica, 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Clinica_Clinica = new Campo_arqCCor_Clinica_Clinica;

//------------------------------------------------------------
Campo_arqCCor_Banco.prototype = new Lance_CampoHidden;

function Campo_arqCCor_Banco()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Banco", "Banco", "Banco", "arqBanco", "a_banco", null, "",19);
}

var Banco = new Campo_arqCCor_Banco;

//------------------------------------------------------------
Campo_arqCCor_Banco_Num.prototype = new Lance_CampoNumericoLigado;

function Campo_arqCCor_Banco_Num()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "Banco_Num", "Banco_Num", "Num", Banco, 3, "##z", true,"", "");
}

var Banco_Num = new Campo_arqCCor_Banco_Num;

//------------------------------------------------------------
Campo_arqCCor_Banco_Banco.prototype = new Lance_CampoCadeia;

function Campo_arqCCor_Banco_Banco()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Banco_Banco", "Banco_Banco", "Banco", 50, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Banco_Banco = new Campo_arqCCor_Banco_Banco;

//------------------------------------------------------------
Campo_arqCCor_Agencia.prototype = new Lance_CampoCadeia;

function Campo_arqCCor_Agencia()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Agencia", "Agencia", "Agencia", 4, "uuuu", false);
}

var Agencia = new Campo_arqCCor_Agencia;

//------------------------------------------------------------
Campo_arqCCor_DvAgencia.prototype = new Lance_CampoCadeia;

function Campo_arqCCor_DvAgencia()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "DvAgencia", "DvAgencia", "DvAgencia", 1, "u", false);
}

var DvAgencia = new Campo_arqCCor_DvAgencia;

//------------------------------------------------------------
Campo_arqCCor_Conta.prototype = new Lance_CampoCadeia;

function Campo_arqCCor_Conta()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Conta", "Conta", "Conta", 10, "uuuuuuuuuu", false);
}

var Conta = new Campo_arqCCor_Conta;

//------------------------------------------------------------
Campo_arqCCor_DvConta.prototype = new Lance_CampoCadeia;

function Campo_arqCCor_DvConta()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "DvConta", "DvConta", "DvConta", 1, "u", false);
}

var DvConta = new Campo_arqCCor_DvConta;

//------------------------------------------------------------
Campo_arqCCor_Carteira.prototype = new Lance_CampoNumerico;

function Campo_arqCCor_Carteira()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Carteira", "Carteira", "Carteira", 3, "##z", true,"", "");
}

var Carteira = new Campo_arqCCor_Carteira;

//------------------------------------------------------------
Campo_arqCCor_CodCedente.prototype = new Lance_CampoCadeia;

function Campo_arqCCor_CodCedente()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "CodCedente", "CodCedente", "CodCedente", 11, "uuuuuuuuuuu", false);
}

var CodCedente = new Campo_arqCCor_CodCedente;

//------------------------------------------------------------
Campo_arqCCor_Multa.prototype = new Lance_CampoNumerico;

function Campo_arqCCor_Multa()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Multa", "Multa", "Multa", 5, "##z,zz", true,"", "");
}

var Multa = new Campo_arqCCor_Multa;

//------------------------------------------------------------
Campo_arqCCor_Juros.prototype = new Lance_CampoNumerico;

function Campo_arqCCor_Juros()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Juros", "Juros", "Juros", 5, "##z,zz", true,"", "");
}

var Juros = new Campo_arqCCor_Juros;

//------------------------------------------------------------
Campo_arqCCor_CBoleto.prototype = new Lance_CampoNumerico;

function Campo_arqCCor_CBoleto()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "CBoleto", "CBoleto", "CBoleto", 5, "##z,zz", true,"", "");
}

var CBoleto = new Campo_arqCCor_CBoleto;

//------------------------------------------------------------
Campo_arqCCor_Instrucoes.prototype = new Lance_CampoTexto;

function Campo_arqCCor_Instrucoes()
{
	this.superClass = Lance_CampoTexto;
	this.superClass( "Instrucoes", "Instrucoes", "Instrucoes", false);
}

var Instrucoes = new Campo_arqCCor_Instrucoes;

//------------------------------------------------------------
Campo_arqCCor_UltRemessa.prototype = new Lance_CampoNumerico;

function Campo_arqCCor_UltRemessa()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "UltRemessa", "UltRemessa", "UltRemessa", 6, "###.##z", true,"", "");
}

var UltRemessa = new Campo_arqCCor_UltRemessa;

//------------------------------------------------------------
Campo_arqCCor_Convenio.prototype = new Lance_CampoCadeia;

function Campo_arqCCor_Convenio()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Convenio", "Convenio", "Convenio", 7, "nnnnnnn", false);
}

var Convenio = new Campo_arqCCor_Convenio;

//------------------------------------------------------------
Campo_arqCCor_Variacao.prototype = new Lance_CampoNumerico;

function Campo_arqCCor_Variacao()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Variacao", "Variacao", "Variacao", 3, "##z", true,"", "");
}

var Variacao = new Campo_arqCCor_Variacao;

//------------------------------------------------------------
Campo_arqCCor_Ativo.prototype = new Lance_CampoLogico;

function Campo_arqCCor_Ativo()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Ativo", "Ativo", "Ativo");
}

var Ativo = new Campo_arqCCor_Ativo;

//------------------------------------------------------------
Campo_arqCCor_TPix1.prototype = new Lance_CampoLigado;

function Campo_arqCCor_TPix1()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TPix1", "TPix1", "TPix1", "tabTPix", "t_tpix", null, "",0);
}

var TPix1 = new Campo_arqCCor_TPix1;

//------------------------------------------------------------
Campo_arqCCor_TPix1_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqCCor_TPix1_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TPix1_Chave", "TPix1_Chave", "TPix1", TPix1, 1, "u", false);
}

var TPix1_Chave = new Campo_arqCCor_TPix1_Chave;

//------------------------------------------------------------
Campo_arqCCor_TPix1_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqCCor_TPix1_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TPix1_Descritor", "TPix1_Descritor", "TPix1", TPix1, 9, "xxxxxxxxx", false);
}

var TPix1_Descritor = new Campo_arqCCor_TPix1_Descritor;

//------------------------------------------------------------
Campo_arqCCor_Pix1.prototype = new Lance_CampoCadeia;

function Campo_arqCCor_Pix1()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Pix1", "Pix1", "Pix1", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Pix1 = new Campo_arqCCor_Pix1;

//------------------------------------------------------------
Campo_arqCCor_TPix2.prototype = new Lance_CampoLigado;

function Campo_arqCCor_TPix2()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TPix2", "TPix2", "TPix2", "tabTPix", "t_tpix", null, "",0);
}

var TPix2 = new Campo_arqCCor_TPix2;

//------------------------------------------------------------
Campo_arqCCor_TPix2_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqCCor_TPix2_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TPix2_Chave", "TPix2_Chave", "TPix2", TPix2, 1, "u", false);
}

var TPix2_Chave = new Campo_arqCCor_TPix2_Chave;

//------------------------------------------------------------
Campo_arqCCor_TPix2_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqCCor_TPix2_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TPix2_Descritor", "TPix2_Descritor", "TPix2", TPix2, 9, "xxxxxxxxx", false);
}

var TPix2_Descritor = new Campo_arqCCor_TPix2_Descritor;

//------------------------------------------------------------
Campo_arqCCor_Pix2.prototype = new Lance_CampoCadeia;

function Campo_arqCCor_Pix2()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Pix2", "Pix2", "Pix2", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Pix2 = new Campo_arqCCor_Pix2;

//------------------------------------------------------------
Campo_arqCCor_TPix3.prototype = new Lance_CampoLigado;

function Campo_arqCCor_TPix3()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TPix3", "TPix3", "TPix3", "tabTPix", "t_tpix", null, "",0);
}

var TPix3 = new Campo_arqCCor_TPix3;

//------------------------------------------------------------
Campo_arqCCor_TPix3_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqCCor_TPix3_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TPix3_Chave", "TPix3_Chave", "TPix3", TPix3, 1, "u", false);
}

var TPix3_Chave = new Campo_arqCCor_TPix3_Chave;

//------------------------------------------------------------
Campo_arqCCor_TPix3_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqCCor_TPix3_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TPix3_Descritor", "TPix3_Descritor", "TPix3", TPix3, 9, "xxxxxxxxx", false);
}

var TPix3_Descritor = new Campo_arqCCor_TPix3_Descritor;

//------------------------------------------------------------
Campo_arqCCor_Pix3.prototype = new Lance_CampoCadeia;

function Campo_arqCCor_Pix3()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Pix3", "Pix3", "Pix3", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Pix3 = new Campo_arqCCor_Pix3;

//------------------------------------------------------------
Campo_arqCCor_TPix4.prototype = new Lance_CampoLigado;

function Campo_arqCCor_TPix4()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TPix4", "TPix4", "TPix4", "tabTPix", "t_tpix", null, "",0);
}

var TPix4 = new Campo_arqCCor_TPix4;

//------------------------------------------------------------
Campo_arqCCor_TPix4_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqCCor_TPix4_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TPix4_Chave", "TPix4_Chave", "TPix4", TPix4, 1, "u", false);
}

var TPix4_Chave = new Campo_arqCCor_TPix4_Chave;

//------------------------------------------------------------
Campo_arqCCor_TPix4_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqCCor_TPix4_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TPix4_Descritor", "TPix4_Descritor", "TPix4", TPix4, 9, "xxxxxxxxx", false);
}

var TPix4_Descritor = new Campo_arqCCor_TPix4_Descritor;

//------------------------------------------------------------
Campo_arqCCor_Pix4.prototype = new Lance_CampoCadeia;

function Campo_arqCCor_Pix4()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Pix4", "Pix4", "Pix4", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Pix4 = new Campo_arqCCor_Pix4;

//------------------------------------------------------------
Campo_arqCCor_TPix5.prototype = new Lance_CampoLigado;

function Campo_arqCCor_TPix5()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TPix5", "TPix5", "TPix5", "tabTPix", "t_tpix", null, "",0);
}

var TPix5 = new Campo_arqCCor_TPix5;

//------------------------------------------------------------
Campo_arqCCor_TPix5_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqCCor_TPix5_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TPix5_Chave", "TPix5_Chave", "TPix5", TPix5, 1, "u", false);
}

var TPix5_Chave = new Campo_arqCCor_TPix5_Chave;

//------------------------------------------------------------
Campo_arqCCor_TPix5_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqCCor_TPix5_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TPix5_Descritor", "TPix5_Descritor", "TPix5", TPix5, 9, "xxxxxxxxx", false);
}

var TPix5_Descritor = new Campo_arqCCor_TPix5_Descritor;

//------------------------------------------------------------
Campo_arqCCor_Pix5.prototype = new Lance_CampoCadeia;

function Campo_arqCCor_Pix5()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Pix5", "Pix5", "Pix5", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Pix5 = new Campo_arqCCor_Pix5;

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqCCor_Nome.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O nome da conta corrente é obrigatório" );
		return( true );
	}
}

Nome.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqCCor_Clinica.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A clínica é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqCCor_Clinica.prototype.Cabecalho = function()
{
		return( "Clínica" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqCCor_Clinica_Clinica.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Clinica.Obrigatorio( p_comMsg ) );
}

Clinica_Clinica.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqCCor_Banco_Num.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Banco.Obrigatorio( p_comMsg ) );
}

Banco_Num.TipoCampo |= CAMPO_CHAVE_PAI;
Banco_Banco.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqCCor_Agencia.prototype.Cabecalho = function()
{
		return( "Agência" );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqCCor_DvAgencia.prototype.Cabecalho = function()
{
		return( "DV" );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqCCor_DvConta.prototype.Cabecalho = function()
{
		return( "DV" );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqCCor_CodCedente.prototype.Existencia = function()
{
	return( tem( Carteira ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqCCor_Multa.prototype.Existencia = function()
{
	return( tem( Carteira ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqCCor_Juros.prototype.Existencia = function()
{
	return( tem( Carteira ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqCCor_CBoleto.prototype.Existencia = function()
{
	return( tem( Carteira ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqCCor_Instrucoes.prototype.Existencia = function()
{
	return( tem( Carteira ) );
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqCCor_UltRemessa.prototype.PodeAlterar = function()
{
		if( GrupoAtualEm() )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqCCor_Convenio.prototype.Existencia = function()
{
	return( tem( Carteira ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqCCor_Variacao.prototype.Existencia = function()
{
	return( tem( Carteira ) );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqCCor_Ativo.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqCCor_Ativo.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "Ativa é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqCCor_Ativo.prototype.Cabecalho = function()
{
		return( "Ativa?" );
}

TPix1_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TPix1_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqCCor_Pix1.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A chave é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqCCor_Pix1.prototype.Existencia = function()
{
	return( tem( TPix1 ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqCCor_TPix2.prototype.Existencia = function()
{
	return( tem( TPix1 ) );
}

TPix2_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TPix2_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqCCor_Pix2.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A chave é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqCCor_Pix2.prototype.Existencia = function()
{
	return( tem( TPix2 ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqCCor_TPix3.prototype.Existencia = function()
{
	return( tem( TPix2 ) );
}

TPix3_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TPix3_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqCCor_Pix3.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A chave é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqCCor_Pix3.prototype.Existencia = function()
{
	return( tem( TPix3 ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqCCor_TPix4.prototype.Existencia = function()
{
	return( tem( TPix3 ) );
}

TPix4_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TPix4_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqCCor_Pix4.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A chave é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqCCor_Pix4.prototype.Existencia = function()
{
	return( tem( TPix4 ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqCCor_TPix5.prototype.Existencia = function()
{
	return( tem( TPix4 ) );
}

TPix5_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TPix5_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqCCor_Pix5.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A chave é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqCCor_Pix5.prototype.Existencia = function()
{
	return( tem( TPix5 ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqCCor_Clinica.prototype.ExistenciaEspecial = function()
{
	return( ( !Clinica_Clinica.Obrigatorio( false ) || tem(Clinica_Clinica) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqCCor_Banco.prototype.ExistenciaEspecial = function()
{
	return( ( !Banco_Num.Obrigatorio( false ) || tem(Banco_Num) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqCCor_Banco_Banco.prototype.ExistenciaEspecial = function()
{
	return( ( !Banco.Obrigatorio( false ) || tem(Banco) ) );
}

function IniciarDependencias_arqCCor()
{
Clinica_Clinica.ExistenciasDependentes= [ Clinica ];
Banco_Num.ExistenciasDependentes= [ Banco ];
Banco.ExistenciasDependentes= [ Banco_Banco ];
Carteira.ExistenciasDependentes= [ CodCedente,Multa,Juros,CBoleto,Instrucoes,Convenio,Variacao ];
TPix1.ExistenciasDependentes= [ Pix1,TPix2 ];
TPix2.ExistenciasDependentes= [ Pix2,TPix3 ];
TPix3.ExistenciasDependentes= [ Pix3,TPix4 ];
TPix4.ExistenciasDependentes= [ Pix4,TPix5 ];
TPix5.ExistenciasDependentes= [ Pix5 ];
Clinica_Clinica.ErrosDependentes= [ Clinica ];
Banco_Num.ErrosDependentes= [ Banco ];
Banco.DescritoresDependentes= [ Banco_Banco ];
Clinica.CamposChave= [ Clinica_Clinica ];
Banco.CamposChave= [ Banco_Num ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqCCor";
//------------------------------------------------------------
function ListaDeCampos_arqCCor( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Nome, Clinica, Clinica_Clinica, Banco, Banco_Num, Banco_Banco, Agencia, DvAgencia, Conta, DvConta, Carteira, CodCedente, Multa, Juros, CBoleto, Instrucoes, UltRemessa, Convenio, Variacao, Ativo, TPix1, TPix1_Chave, TPix1_Descritor, Pix1, TPix2, TPix2_Chave, TPix2_Descritor, Pix2, TPix3, TPix3_Chave, TPix3_Descritor, Pix3, TPix4, TPix4_Chave, TPix4_Descritor, Pix4, TPix5, TPix5_Chave, TPix5_Descritor, Pix5 ]	);
	IniciarDependencias_arqCCor();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqCCor( '' );
g_idOperacao = 20;

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"Parcelas","","P",101,"","",1,"","1","a_parcel","arqParcela","Folhear","CCor","?","","", "","", 0,8,[],[34]);
parent.navegacao.MenuPrincQtdOpcoes=1;
}
