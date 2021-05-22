<?php

/*
	Defini��es dos campos necess�rios para administra��o de avisos online
	- como nossos sistemas permitem mais de um cadastro de usu�rios, os campos abaixo
		que identificam o ligado com o remetente, com o destinat�rio e com quem leu
		o aviso podem ser, tamb�m, mais de um. Os nomes das constantes, neste caso,
		devem seguir a ordem em $g_vetPerfil em versaoSistema/SETUP.php (de 0 em diante)
*/

	// Arquivo de avisos e seus campos
	define( "ARQ_AVISOS", "arqAvisos" );
	define( "ARQ_AVISOS_NUMERO", "Numero" );				// Identifica��o �nica do aviso
	define( "ARQ_AVISOS_DATA", "Data" );					// Data de publica��o do aviso
	define( "ARQ_AVISOS_AVISARDIA", "Data" );			// A partir de quando o aviso deve ser exibido
	define( "ARQ_AVISOS_AVISARDIA", "Data" );				// A partir de quando o aviso deve ser exibido
	define( "ARQ_AVISOS_PRIORIDADE", "Prioridade" );	// Priorit�rio? s/n
	define( "ARQ_AVISOS_PRIORIDADE0", 1 );					// Maior prioridade
	define( "ARQ_AVISOS_PRIORIDADE1", 2 );					// Segunda maior prioridade
	define( "ARQ_AVISOS_PRIORIDADE2", 0 );					// Terceira maior prioridade (0= null no campo)
	define( "ARQ_AVISOS_USUARIO0", "Quem" );				// Usu�rio remetente que postou o aviso
	define( "ARQ_AVISOS_ASSUNTO", "Assunto" ); 			// Assunto do aviso
	define( "ARQ_AVISOS_TEXTO", "Texto" ); 				// Texto do aviso
	define( "ARQ_AVISOS_AVISOPAI", "AvisoPai" );			// Se esta � uma Resposta, qual � o Aviso Pai? (opcional)

	// Arquivo com os destinat�rios do aviso (geralmente filho de arqAvisos) e seus campos
	define( "ARQ_DESTINATARIOS", "arqParaGrupo" );
	define( "ARQ_DESTINATARIOS_AVISO", "Avisos" );		// Ligado entre arqDestinatarios e arqAvisos
	define( "ARQ_DESTINATARIOS_GRUPO", "Grupo" );		//	Ligado com arqGrupo para quem foi destinado o aviso
	define( "ARQ_DESTINATARIOS_USUARIO0", "Usuario" );	//	Ligado com 1o arqUsuario para quem foi destinado o aviso

	// Arquivo com informa��o de quem j� leu o aviso (filho de arqAvisos) e seus campos
	define( "ARQ_LIDOS", "arqLido" );
	define( "ARQ_LIDOS_AVISO", "Avisos" );					// Ligado entre arqLidos e arqAvisos
	define( "ARQ_LIDOS_DATA", "Data" );						// Data de leitura do aviso
	define( "ARQ_LIDOS_USUARIO0", "Usuario" );			// Ligado com 1o arqUsuario que j� leu o aviso
	define( "ARQ_LIDOS_USUARIO1", "Usuario" );			// Ligado com 2o arqUsuario que j� leu o aviso
//	define( "ARQ_LIDOS_USUARIO2", "Responsav" );			// Ligado com 3o arqUsuario que j� leu o aviso

	// Arquivo com os grupos
	define( "ARQ_GRUPOS", "arqGrupo" );
	define( "ARQ_GRUPOS_GRUPO", "Grupo" );		// Campo com o nome do Grupo

	// Campos dos arquivos-pai (Remetente/Destinat�rio) que cont�m uma foto da pessoa
	define( "CAMPO_FOTO_PAI0", "FOTO" );	// arqFonte (opcional)

	// Tempo (em minutos) para refresh de leitura de mais avisos no servidor (padr�o, se n�o definido, = 1 minuto )
	define( "TEMPOAVISOS",	0.5 );

	// M�ximo de respostas que aparecem de cada vez junto com o aviso
	define( "MAX_RESPOSTAS", 2 ); // (opcional)

	// Exibe fotos junto com os avisos?
	define( "QUER_FOTOS_AVISO", true );
