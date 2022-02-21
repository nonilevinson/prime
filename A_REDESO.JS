/*=========================================================================
  a_redeso - RedeSocial
=========================================================================*/

//------------------------------------------------------------
Campo_domRedeSocial_Facebook.prototype = new Lance_CampoCadeia;

function Campo_domRedeSocial_Facebook()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Facebook", "Facebook", "Facebook", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Facebook = new Campo_domRedeSocial_Facebook;

//------------------------------------------------------------
Campo_domRedeSocial_YouTube.prototype = new Lance_CampoCadeia;

function Campo_domRedeSocial_YouTube()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "YouTube", "YouTube", "YouTube", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var YouTube = new Campo_domRedeSocial_YouTube;

//------------------------------------------------------------
Campo_domRedeSocial_Instagram.prototype = new Lance_CampoCadeia;

function Campo_domRedeSocial_Instagram()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Instagram", "Instagram", "Instagram", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Instagram = new Campo_domRedeSocial_Instagram;

//------------------------------------------------------------
Campo_domRedeSocial_Twitter.prototype = new Lance_CampoCadeia;

function Campo_domRedeSocial_Twitter()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Twitter", "Twitter", "Twitter", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Twitter = new Campo_domRedeSocial_Twitter;

//------------------------------------------------------------
Campo_domRedeSocial_LinkedIn.prototype = new Lance_CampoCadeia;

function Campo_domRedeSocial_LinkedIn()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "LinkedIn", "LinkedIn", "LinkedIn", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var LinkedIn = new Campo_domRedeSocial_LinkedIn;

//------------------------------------------------------------
Campo_domRedeSocial_SnapChat.prototype = new Lance_CampoCadeia;

function Campo_domRedeSocial_SnapChat()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "SnapChat", "SnapChat", "SnapChat", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var SnapChat = new Campo_domRedeSocial_SnapChat;

//------------------------------------------------------------
Campo_domRedeSocial_Pinterest.prototype = new Lance_CampoCadeia;

function Campo_domRedeSocial_Pinterest()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Pinterest", "Pinterest", "Pinterest", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Pinterest = new Campo_domRedeSocial_Pinterest;

function IniciarDependencias_domRedeSocial()
{
}

//------------------------------------------------------------
function ListaDeCampos_domRedeSocial( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = []
	l_lista = l_lista.concat(

		[ eval( this.Prefixo + 'Facebook' ), eval( this.Prefixo + 'YouTube' ), eval( this.Prefixo + 'Instagram' ), eval( this.Prefixo + 'Twitter' ), eval( this.Prefixo + 'LinkedIn' ), eval( this.Prefixo + 'SnapChat' ), eval( this.Prefixo + 'Pinterest' ) ]	);
	IniciarDependencias_domRedeSocial();
	g_prefixo = l_prefixo;
	return( l_lista );
}

//------------------------------------------------------------
function IniciarPrefixos_domRedeSocial( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
eval( g_prefixo + "Facebook = new Campo_domRedeSocial_Facebook;" );
eval( g_prefixo + "YouTube = new Campo_domRedeSocial_YouTube;" );
eval( g_prefixo + "Instagram = new Campo_domRedeSocial_Instagram;" );
eval( g_prefixo + "Twitter = new Campo_domRedeSocial_Twitter;" );
eval( g_prefixo + "LinkedIn = new Campo_domRedeSocial_LinkedIn;" );
eval( g_prefixo + "SnapChat = new Campo_domRedeSocial_SnapChat;" );
eval( g_prefixo + "Pinterest = new Campo_domRedeSocial_Pinterest;" );
	g_prefixo = l_prefixo;
}
