<html>
<head>
	<title><?php echo SISTEMA_NOME, ' - ', CLIENTE_NOME, ' - Versão ', VERSAO; ?></title>
	<style>
		body
		{
			background-color	: #f0f0f0;
			border				: 0px;
			margin 				: 0px;
			text-align			: center;
		}
		
		.loginGeral{ 
			font-family			: Verdana,Arial,Helvetica,sans-serif; 
			font-size			: 14px;
			margin-top			: 20px; 
			width					: 900px; 
		}

		.loginTable{
			margin-bottom		: 20px; 
			background-color	: #f0f0f0;
		}

		.loginTableCliente{ 
			border				: 0px solid #aabbcc;
			vertical-align		: center;
			text-align			: center;
			background-color	: #f0f0f0;
		}

		.loginTableSistema{ 
			border				: 0px solid #a0a0a0;
			vertical-align		: center;
			background-color	: #f0f0f0;
		}
		
		h1{
			font-family			: arial;
			font-size			: 24px;
			font-weight			: bold;
			text-align			: center;
			color					: #306090;
		}
	</style>
</head>
<body>

<!-- NATAL -->
<!--script src="http://www.lanceweb.com.br/snow.js" type="text/javascript"></script-->

<center>
<div class="loginGeral">
<table class="loginTable" cellspacing="60" border="0">
<tr><td colspan='2'><h1>Sistema de gerenciamento</h1></td></tr>
<tr>
	<td class="loginTableCliente" width='65%'><img src="<?php global $setup; echo $setup["CLIENTE"]["LOGO_ABERTURA"]; ?>" border="0"></td>
	<td class="loginTableSistema" width='35%'><?php global $g_loginCompleto; echo $g_loginCompleto; ?></td>
</tr>
</table>
</div>
</center>
</body>
</html>
