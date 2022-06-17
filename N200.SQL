/*
  TBUDF - Tecnobyte UDF for FireBird

  Author...: Daniel Pereira Guimarães
  E-mail...: tecnobyte@ulbrajp.com.br
  Home-Page: www.ulbrajp.com.br/~tecnobyte

  This library is Open-Source!
*/

declare external function udf_Ver
returns double precision by value
entry_point 'udf_Ver' module_name 'tbudf';

declare external function udf_Len
cstring(254)
returns integer by value
entry_point 'udf_Len' module_name 'tbudf';

declare external function udf_Pos
cstring(254), cstring(254)
returns integer by value
entry_point 'udf_Pos' module_name 'tbudf';

declare external function udf_Copy
cstring(254), integer, integer
returns cstring(254)
entry_point 'udf_Copy' module_name 'tbudf';

declare external function udf_Left
cstring(254), integer
returns cstring(254)
entry_point 'udf_Left' module_name 'tbudf';

declare external function udf_Right
cstring(254), integer
returns cstring(254)
entry_point 'udf_Right' module_name 'tbudf';

declare external function udf_Replace
cstring(254), cstring(254), cstring(254)
returns cstring(254)
entry_point 'udf_Replace' module_name 'tbudf';

declare external function udf_Stuff
cstring(254), integer, integer, cstring(254)
returns cstring(254)
entry_point 'udf_Stuff' module_name 'tbudf';

declare external function udf_Strip
cstring(254), cstring(254)
returns cstring(254)
entry_point 'udf_Strip' module_name 'tbudf';

declare external function udf_Upper
cstring(254)
returns cstring(254)
entry_point 'udf_Upper' module_name 'tbudf';

declare external function udf_Lower
cstring(254)
returns cstring(254)
entry_point 'udf_Lower' module_name 'tbudf';

declare external function udf_AnsiUpper
cstring(254)
returns cstring(254)
entry_point 'udf_AnsiUpper' module_name 'tbudf';

declare external function udf_AnsiLower
cstring(254)
returns cstring(254)
entry_point 'udf_AnsiLower' module_name 'tbudf';

declare external function udf_StrOfChr
cstring(254), cstring(1), integer
returns parameter 1
entry_point 'udf_StrOfChr' module_name 'tbudf';

declare external function udf_Space
cstring(254), integer
returns parameter 1
entry_point 'udf_Space' module_name 'tbudf';

declare external function udf_Repeat
cstring(254), cstring(254), integer
returns parameter 1
entry_point 'udf_Repeat' module_name 'tbudf';

declare external function udf_Digits
cstring(254)
returns cstring(254)
entry_point 'udf_Digits' module_name 'tbudf';

declare external function udf_LTrim
cstring(254)
returns cstring(254)
entry_point 'udf_LTrim' module_name 'tbudf';

declare external function udf_RTrim
cstring(254)
returns cstring(254)
entry_point 'udf_RTrim' module_name 'tbudf';

declare external function udf_Trim
cstring(254)
returns cstring(254)
entry_point 'udf_Trim' module_name 'tbudf';

declare external function udf_PadL
cstring(254), cstring(254), integer
returns cstring(254)
entry_point 'udf_PadL' module_name 'tbudf';

declare external function udf_PadR
cstring(254), cstring(254), integer
returns cstring(254)
entry_point 'udf_PadR' module_name 'tbudf';

declare external function udf_StrZero
cstring(20), integer, integer
returns parameter 1
entry_point 'udf_StrZero' module_name 'tbudf';

declare external function udf_Chr
cstring(1), smallint
returns parameter 1
entry_point 'udf_Chr' module_name 'tbudf';

declare external function udf_Ord
cstring(254)
returns smallint by value
entry_point 'udf_Ord' module_name 'tbudf';

declare external function udf_IsLower
cstring(254)
returns smallint by value
entry_point 'udf_IsLower' module_name 'tbudf';

declare external function udf_IsUpper
cstring(254)
returns smallint by value
entry_point 'udf_IsUpper' module_name 'tbudf';

declare external function udf_IsDigit
cstring(254)
returns smallint by value
entry_point 'udf_IsDigit' module_name 'tbudf';

declare external function udf_IsAlpha
cstring(254)
returns smallint by value
entry_point 'udf_IsAlpha' module_name 'tbudf';

declare external function udf_CollateBr
cstring(254)
returns cstring(254)
entry_point 'udf_CollateBr' module_name 'tbudf';

declare external function udf_IntToHex
cstring(20), integer, integer
returns parameter 1
entry_point 'udf_IntToHex' module_name 'tbudf';

declare external function udf_HexToInt
cstring(20)
returns integer by value
entry_point 'udf_HexToInt' module_name 'tbudf';

declare external function udf_Year
timestamp
returns smallint by value
entry_point 'udf_Year' module_name 'tbudf';

declare external function udf_Month
timestamp
returns smallint by value
entry_point 'udf_Month' module_name 'tbudf';

declare external function udf_Day
timestamp
returns smallint by value
entry_point 'udf_Day' module_name 'tbudf';

declare external function udf_Hour
timestamp
returns smallint by value
entry_point 'udf_Hour' module_name 'tbudf';

declare external function udf_Minute
timestamp
returns smallint by value
entry_point 'udf_Minute' module_name 'tbudf';

declare external function udf_Second
timestamp
returns smallint by value
entry_point 'udf_Second' module_name 'tbudf';

declare external function udf_EncDate
timestamp, smallint, smallint, smallint
returns parameter 1
entry_point 'udf_EncDate' module_name 'tbudf';

declare external function udf_EncTime
timestamp, smallint, smallint, smallint
returns parameter 1
entry_point 'udf_EncTime' module_name 'tbudf';

declare external function udf_EncTS
timestamp, smallint, smallint, smallint, smallint, smallint, smallint
returns parameter 1
entry_point 'udf_EncTS' module_name 'tbudf';

declare external function udf_YearSpan
timestamp, timestamp
returns double precision by value
entry_point 'udf_YearSpan' module_name 'tbudf';

declare external function udf_MonthSpan
timestamp, timestamp
returns double precision by value
entry_point 'udf_MonthSpan' module_name 'tbudf';

declare external function udf_WeekSpan
timestamp, timestamp
returns double precision by value
entry_point 'udf_WeekSpan' module_name 'tbudf';

declare external function udf_DaySpan
timestamp, timestamp
returns double precision by value
entry_point 'udf_DaySpan' module_name 'tbudf';

declare external function udf_HourSpan
timestamp, timestamp
returns double precision by value
entry_point 'udf_HourSpan' module_name 'tbudf';

declare external function udf_MinuteSpan
timestamp, timestamp
returns double precision by value
entry_point 'udf_MinuteSpan' module_name 'tbudf';

declare external function udf_SecondSpan
timestamp, timestamp
returns double precision by value
entry_point 'udf_SecondSpan' module_name 'tbudf';

declare external function udf_YearsBetween
timestamp, timestamp
returns integer by value
entry_point 'udf_YearsBetween' module_name 'tbudf';

declare external function udf_MonthsBetween
timestamp, timestamp
returns integer by value
entry_point 'udf_MonthsBetween' module_name 'tbudf';

declare external function udf_WeeksBetween
timestamp, timestamp
returns integer by value
entry_point 'udf_WeeksBetween' module_name 'tbudf';

declare external function udf_DaysBetween
timestamp, timestamp
returns integer by value
entry_point 'udf_DaysBetween' module_name 'tbudf';

declare external function udf_HoursBetween
timestamp, timestamp
returns numeric(18,0) by value
entry_point 'udf_HoursBetween' module_name 'tbudf';

declare external function udf_MinutesBetween
timestamp, timestamp
returns numeric(18,0) by value
entry_point 'udf_MinutesBetween' module_name 'tbudf';

declare external function udf_SecondsBetween
timestamp, timestamp
returns numeric(18,0) by value
entry_point 'udf_SecondsBetween' module_name 'tbudf';

declare external function udf_Age
timestamp
returns integer by value
entry_point 'udf_Age' module_name 'tbudf';

declare external function udf_Age2
timestamp, timestamp
returns integer by value
entry_point 'udf_Age2' module_name 'tbudf';

declare external function udf_IncYear
timestamp, integer
returns timestamp
entry_point 'udf_IncYear' module_name 'tbudf';

declare external function udf_IncMonth
timestamp, integer
returns timestamp
entry_point 'udf_IncMonth' module_name 'tbudf';

declare external function udf_IncWeek
timestamp, integer
returns timestamp
entry_point 'udf_IncWeek' module_name 'tbudf';

declare external function udf_IncDay
timestamp, integer
returns timestamp
entry_point 'udf_IncDay' module_name 'tbudf';

declare external function udf_IncHour
timestamp, integer
returns timestamp
entry_point 'udf_IncHour' module_name 'tbudf';

declare external function udf_IncMinute
timestamp, integer
returns timestamp
entry_point 'udf_IncMinute' module_name 'tbudf';

declare external function udf_IncSecond
timestamp, integer
returns timestamp
entry_point 'udf_IncSecond' module_name 'tbudf';

declare external function udf_IncDate
timestamp, integer, integer, integer
returns timestamp
entry_point 'udf_IncDate' module_name 'tbudf';

declare external function udf_IncTime
timestamp, integer, integer, integer
returns timestamp
entry_point 'udf_IncTime' module_name 'tbudf';

declare external function udf_IncTS
timestamp, integer, integer, integer, integer, integer, integer
returns timestamp
entry_point 'udf_IncTS' module_name 'tbudf';

declare external function udf_MaxDate
timestamp, timestamp
returns timestamp
entry_point 'udf_MaxDate' module_name 'tbudf';

declare external function udf_MaxTime
timestamp, timestamp
returns timestamp
entry_point 'udf_MaxTime' module_name 'tbudf';

declare external function udf_MaxTS
timestamp, timestamp
returns timestamp
entry_point 'udf_MaxTS' module_name 'tbudf';

declare external function udf_MinDate
timestamp, timestamp
returns timestamp
entry_point 'udf_MinDate' module_name 'tbudf';

declare external function udf_MinTime
timestamp, timestamp
returns timestamp
entry_point 'udf_MinTime' module_name 'tbudf';

declare external function udf_MinTS
timestamp, timestamp
returns timestamp
entry_point 'udf_MinTS' module_name 'tbudf';

declare external function udf_MonthStart
timestamp, smallint, smallint
returns parameter 1
entry_point 'udf_MonthStart' module_name 'tbudf';

declare external function udf_MonthEnd
timestamp, smallint, smallint
returns parameter 1
entry_point 'udf_MonthEnd' module_name 'tbudf';

declare external function udf_LastDay
smallint, smallint
returns smallint by value
entry_point 'udf_LastDay' module_name 'tbudf';

declare external function udf_DayFrac
timestamp
returns double precision by value
entry_point 'udf_DayFrac' module_name 'tbudf';

declare external function udf_YearDay
timestamp
returns smallint by value
entry_point 'udf_YearDay' module_name 'tbudf';

declare external function udf_WeekDay
timestamp
returns smallint by value
entry_point 'udf_WeekDay' module_name 'tbudf';

declare external function udf_DayName
cstring(15), timestamp
returns parameter 1
entry_point 'udf_DayName' module_name 'tbudf';

declare external function udf_SDayName
cstring(5), timestamp
returns parameter 1
entry_point 'udf_SDayName' module_name 'tbudf';

declare external function udf_MonthName
cstring(15), timestamp
returns parameter 1
entry_point 'udf_MonthName' module_name 'tbudf';

declare external function udf_SMonthName
cstring(5), timestamp
returns parameter 1
entry_point 'udf_SMonthName' module_name 'tbudf';

declare external function udf_NVL
double precision
returns double precision by value
entry_point 'udf_NVL' module_name 'tbudf';

declare external function udf_Frac
double precision
returns double precision by value
entry_point 'udf_Frac' module_name 'tbudf';

declare external function udf_Int
double precision
returns double precision by value
entry_point 'udf_Int' module_name 'tbudf';

declare external function udf_Trunc
double precision
returns integer by value
entry_point 'udf_Trunc' module_name 'tbudf';

declare external function udf_TruncDec
double precision, smallint
returns double precision by value
entry_point 'udf_TruncDec' module_name 'tbudf';

declare external function udf_Round
double precision
returns integer by value
entry_point 'udf_Round' module_name 'tbudf';

declare external function udf_RoundDec
double precision, smallint
returns double precision by value
entry_point 'udf_RoundDec' module_name 'tbudf';

declare external function udf_Ceil
double precision
returns integer by value
entry_point 'udf_Ceil' module_name 'tbudf';

declare external function udf_Floor
double precision
returns integer by value
entry_point 'udf_Floor' module_name 'tbudf';

declare external function udf_Max
double precision, double precision
returns double precision by value
entry_point 'udf_Max' module_name 'tbudf';

declare external function udf_Min
double precision, double precision
returns double precision by value
entry_point 'udf_Min' module_name 'tbudf';

declare external function udf_Abs
double precision
returns double precision by value
entry_point 'udf_Abs' module_name 'tbudf';

declare external function udf_Sign
double precision
returns smallint by value
entry_point 'udf_Sign' module_name 'tbudf';

declare external function udf_Odd
integer
returns smallint by value
entry_point 'udf_Odd' module_name 'tbudf';

declare external function udf_Div
integer, integer
returns integer by value
entry_point 'udf_Div' module_name 'tbudf';

declare external function udf_Mod
integer, integer
returns integer by value
entry_point 'udf_Mod' module_name 'tbudf';

declare external function udf_DZero
double precision, double precision
returns double precision by value
entry_point 'udf_DZero' module_name 'tbudf';

declare external function udf_Exp
double precision
returns double precision by value
entry_point 'udf_Exp' module_name 'tbudf';

declare external function udf_Factorial
integer
returns numeric(18,0) by value
entry_point 'udf_Factorial' module_name 'tbudf';

declare external function udf_Sqr
double precision
returns double precision by value
entry_point 'udf_Sqr' module_name 'tbudf';

declare external function udf_Sqrt
double precision
returns double precision by value
entry_point 'udf_Sqrt' module_name 'tbudf';

declare external function udf_Power
double precision, double precision
returns double precision by value
entry_point 'udf_Power' module_name 'tbudf';

declare external function udf_LnXP1
double precision
returns double precision by value
entry_point 'udf_LnXP1' module_name 'tbudf';

declare external function udf_Log10
double precision
returns double precision by value
entry_point 'udf_Log10' module_name 'tbudf';

declare external function udf_Log2
double precision
returns double precision by value
entry_point 'udf_Log2' module_name 'tbudf';

declare external function udf_LogN
double precision, double precision
returns double precision by value
entry_point 'udf_LogN' module_name 'tbudf';

declare external function udf_Rand
returns double precision by value
entry_point 'udf_Rand' module_name 'tbudf';

declare external function udf_RandInt
integer, integer
returns integer by value
entry_point 'udf_RandInt' module_name 'tbudf';

/*------------------------------------------------------------------*/

declare external function udf_Pi
returns double precision by value
entry_point 'udf_Pi' module_name 'tbudf';

declare external function udf_DegToRad
double precision
returns double precision by value
entry_point 'udf_DegToRad' module_name 'tbudf';

declare external function udf_RadToDeg
double precision
returns double precision by value
entry_point 'udf_RadToDeg' module_name 'tbudf';

declare external function udf_Cos
double precision
returns double precision by value
entry_point 'udf_Cos' module_name 'tbudf';

declare external function udf_Sin
double precision
returns double precision by value
entry_point 'udf_Sin' module_name 'tbudf';

declare external function udf_Tan
double precision
returns double precision by value
entry_point 'udf_Tan' module_name 'tbudf';

declare external function udf_CoTan
double precision
returns double precision by value
entry_point 'udf_CoTan' module_name 'tbudf';

declare external function udf_ACos
double precision
returns double precision by value
entry_point 'udf_ACos' module_name 'tbudf';

declare external function udf_ASin
double precision
returns double precision by value
entry_point 'udf_ASin' module_name 'tbudf';

declare external function udf_ATan
double precision
returns double precision by value
entry_point 'udf_ATan' module_name 'tbudf';

declare external function udf_Hypot
double precision, double precision
returns double precision by value
entry_point 'udf_Hypot' module_name 'tbudf';

/*------------------------------------------------------------------*/

declare external function udf_Not
integer
returns integer by value
entry_point 'udf_Not' module_name 'tbudf';

declare external function udf_And
integer, integer
returns integer by value
entry_point 'udf_And' module_name 'tbudf';

declare external function udf_Or
integer, integer
returns integer by value
entry_point 'udf_Or' module_name 'tbudf';

declare external function udf_Xor
integer, integer
returns integer by value
entry_point 'udf_Xor' module_name 'tbudf';

declare external function udf_ShL
integer, integer
returns integer by value
entry_point 'udf_ShL' module_name 'tbudf';

declare external function udf_ShR
integer, integer
returns integer by value
entry_point 'udf_ShR' module_name 'tbudf';

declare external function udf_GetBit
integer, smallint
returns integer by value
entry_point 'udf_GetBit' module_name 'tbudf';

declare external function udf_SetBit
integer, smallint, smallint
returns integer by value
entry_point 'udf_SetBit' module_name 'tbudf';

/************************************************************
	DOMÍNIOS
************************************************************/
/* Chave Primária de todos os arquivos */
CREATE DOMAIN chavePrimaria AS BIGINT NOT NULL;

/* Chave Primária de todas as tabelas */
CREATE DOMAIN chavePrimariaTab AS SMALLINT NOT NULL;

/* Campo Ligado com Arquivo */
CREATE DOMAIN ligadoComArquivo AS BIGINT;

/* Campo Ligado com Tabela */
CREATE DOMAIN ligadoComTabela AS SMALLINT;

/* Campo Lógico 0=Não 1=Sim */
CREATE DOMAIN campoLogico AS SMALLINT;

/* Campo Imagem 0=Não tem 1=gif 2=png 3=jpg 4=bmp */
/* Quando > 0, a imagem estará em <dirAtual>/<nomeArq>/<IdPrimario>_<nomeCampo>.<tipo> */
CREATE DOMAIN campoImagem AS SMALLINT;
commit;

/************************************************************
	DEFAULT COLLATION
************************************************************/
alter character set iso8859_1
  set default collation pt_br;
commit;

/************************************************************
	GENERATOR PARA IDPRIMARIO DOS ARQUIVOS
************************************************************/
CREATE GENERATOR genIdPrimario;

/************************************************************
	TABELA tabLanceLogStatus
************************************************************/
CREATE TABLE tabLanceLogStatus
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabLanceLogStatus_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabLanceLogStatus_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabLanceLogStatus VALUES ( 1, '1', 'Erro - Conexão Inválida' );
INSERT INTO tabLanceLogStatus VALUES ( 2, '2', 'Erro - Usuário Não Cadastrado' );
INSERT INTO tabLanceLogStatus VALUES ( 3, '3', 'Erro - Usuário Desabilitado' );
INSERT INTO tabLanceLogStatus VALUES ( 4, '4', 'Erro - Senha Inválida' );
INSERT INTO tabLanceLogStatus VALUES ( 5, '5', 'Erro - IP Não Autorizado' );
INSERT INTO tabLanceLogStatus VALUES ( 6, '6', 'Erro - interno' );
INSERT INTO tabLanceLogStatus VALUES ( 7, '7', 'Erro - interno' );
INSERT INTO tabLanceLogStatus VALUES ( 8, '8', 'Erro - interno' );
INSERT INTO tabLanceLogStatus VALUES ( 9, '9', 'Erro - interno' );
INSERT INTO tabLanceLogStatus VALUES ( 10, '0', 'Erro - interno' );
INSERT INTO tabLanceLogStatus VALUES ( 11, 'N', 'Acesso Normal' );
INSERT INTO tabLanceLogStatus VALUES ( 12, 'A', 'Alteração de Dado específica' );
INSERT INTO tabLanceLogStatus VALUES ( 13, 'I', 'Inclusão de Dado' );
INSERT INTO tabLanceLogStatus VALUES ( 14, 'E', 'Exclusão de Dado' );
INSERT INTO tabLanceLogStatus VALUES ( 15, 'P', 'Processamento de Dado' );
INSERT INTO tabLanceLogStatus VALUES ( 16, 'U', 'Alteração de Dado genérica' );
commit;

/************************************************************
	TABELA tabLanceTipoImg
************************************************************/
CREATE TABLE tabLanceTipoImg
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 4 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabLanceTipoImg_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabLanceTipoImg_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabLanceTipoImg VALUES ( 1, 'GIF', 'Imagem GIF' );
INSERT INTO tabLanceTipoImg VALUES ( 2, 'JPG', 'Imagem JPG' );
INSERT INTO tabLanceTipoImg VALUES ( 3, 'PNG', 'Imagem PNG' );
INSERT INTO tabLanceTipoImg VALUES ( 4, 'BMP', 'Imagem BMP' );
INSERT INTO tabLanceTipoImg VALUES ( 5, 'JPEG', 'Imagem BMP' );
commit;

/************************************************************
	Arquivo arqLanceRegMarca 
************************************************************/
CREATE TABLE arqLanceRegMarca
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	ARQUIVO VARCHAR( 10 ) COLLATE PT_BR, /* Máscara = X */
	/*  3*/	REGISTRO BIGINT, /* Máscara = N */
	/*  4*/	TIPO SMALLINT, /* Máscara = N */
	/*  5*/	PERFIL SMALLINT, /* Máscara = N */
	/*  6*/	USUARIO BIGINT, /* Máscara = N */
	CONSTRAINT arqLanceRegMarca_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqLanceRegMarca_UK UNIQUE ( ARQUIVO, REGISTRO, TIPO, PERFIL, USUARIO )
);
commit;

/************************************************************
	TABELA tabLanceTipoOperacao
************************************************************/
CREATE TABLE tabLanceTipoOperacao
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 3 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabLanceTipoOperacao_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabLanceTipoOperacao_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabLanceTipoOperacao VALUES ( 1, 'A', 'Arquivo' );
INSERT INTO tabLanceTipoOperacao VALUES ( 2, 'O', 'Opção' );
INSERT INTO tabLanceTipoOperacao VALUES ( 3, 'D', 'Diversos' );
commit;

/************************************************************
	Arquivo arqLanceAssunto
************************************************************/
CREATE TABLE arqLanceAssunto
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	ASSUNTO VARCHAR( 50 ) COLLATE PT_BR, /* Máscara = X */
	CONSTRAINT arqLanceAssunto_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqLanceAssunto_UK UNIQUE ( ASSUNTO )
);
commit;

create desc index arqLanceAssunto_IdPrim_Desc on arqLanceAssunto ( IDPRIMARIO );
commit;

/************************************************************
	Arquivo arqLanceOperacao
************************************************************/
CREATE TABLE arqLanceOperacao
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	TIPO ligadoComTabela, /* Ligado com tabTipoOper */
	/*  3*/	OPERACAO VARCHAR( 100 ) COLLATE PT_BR, /* Máscara = X */
	/*  4*/	ARQUIVO VARCHAR( 100 ) COLLATE PT_BR, /* Máscara = X */
	/*  5*/	NUMERO INTEGER, /* Máscara = N */
	/*  6*/	ASSUNTO ligadoComArquivo, /* Ligado com arqLanceAssunto */
	/*  7*/  SOZERO SMALLINT,
	/*  8*/  VISIVEL VARCHAR( 100 ) COLLATE PT_BR, /* Máscara = X */
	CONSTRAINT arqLanceOperacao_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqLanceOperacao_UK UNIQUE ( TIPO, OPERACAO, NUMERO )
);
commit;

create desc index arqLanceOperacao_IdPrim_Desc on arqLanceOperacao ( IDPRIMARIO );
commit;

/************************************************************
	Arquivo arqLanceLogAcesso
************************************************************/
CREATE TABLE arqLanceLogAcesso
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	STATUS ligadoComTabela, /* Ligado com a Tabela LanceLogStatus */
	/*  3*/	MASTER campoLogico, /* Lógico: 0=Não 1=Sim */
	/*  4*/	LOGIN VARCHAR( 255 ) COLLATE PT_BR, /* Máscara = M */
	/*  5*/	ACESSO VARCHAR( 255 ) COMPUTED BY( CASE WHEN( MASTER=0 ) THEN( LOGIN ) ELSE( '(Master)' ) END  ),
	/*  6*/	DATA DATE, /* Máscara = 4ano */
	/*  7*/	HORA TIME, /* Máscara = Seg */
	/*  8*/	PERFIL SMALLINT, /* Máscara = N */
	/*  9*/	USUARIO BIGINT, /* Máscara = N */
	/* 10*/	IP VARCHAR( 15 ) COLLATE PT_BR, /* Máscara = M */
	/* 11*/	OPERACAO ligadoComArquivo, /* Máscara = X */
	/* 12*/	QUEM VARCHAR( 255 ) COLLATE PT_BR, /* Máscara = X */
	/* 13*/	IDQUEM BIGINT, /* Máscara = N */
	/* 14*/	OPERPROC ligadoComArquivo, /* Máscara = X */
	/* 15*/	OBSERVACAO VARCHAR( 255 ) COLLATE PT_BR, /* Máscara = X */
	/* 16*/	CAMPO VARCHAR( 255 ) COLLATE PT_BR, /* Máscara = X */
	/* 17*/	ANTES VARCHAR( 255 ) COLLATE PT_BR, /* Máscara = X */
	/* 18*/	DEPOIS VARCHAR( 255 ) COLLATE PT_BR, /* Máscara = X */
	CONSTRAINT arqLanceLogAcesso_PK PRIMARY KEY ( IDPRIMARIO )
);
commit;

CREATE VIEW V_arqLanceLogAcesso as 
	SELECT L.IDPRIMARIO, L.STATUS,  T.CHAVE AS STATUS_CHAVE, T.DESCRITOR AS STATUS_DESCRITOR, L.MASTER, L.LOGIN, L.ACESSO,
		L.DATA, L.HORA, L.PERFIL, L.USUARIO, L.IP, L.OPERACAO, O1.OPERACAO AS OPERACAO_OPERACAO, L.QUEM,
		L.IDQUEM, L.OPERPROC, O2.OPERACAO AS OPERPROC_OPERACAO, L.OBSERVACAO, L.CAMPO, L.ANTES, L.DEPOIS 
	from arqLanceLogAcesso L 
		left join tabLanceLogStatus T on T.IDPRIMARIO = L.STATUS
		left join arqLanceOperacao O1 on O1.IDPRIMARIO=L.OPERACAO
		left join arqLanceOperacao O2 on O2.IDPRIMARIO=L.OPERPROC;
commit;

CREATE VIEW V_arqLanceOperacao as 
	select L.IDPRIMARIO, L.TIPO, T.CHAVE AS TIPO_CHAVE, T.DESCRITOR AS TIPO_DESCRITOR, L.OPERACAO,
		L.ARQUIVO, L.NUMERO, L.ASSUNTO, A1.Assunto as ASSUNTO_ASSUNTO, L.SOZERO, L.VISIVEL 
	from arqLanceOperacao L
		left join tabLanceTipoOperacao T on T.IDPRIMARIO = L.TIPO
		left join arqLanceASSUNTO A1 on A1.IDPRIMARIO=L.ASSUNTO;
commit;

/************************************************************
	INDEX
************************************************************/
create desc index arqLanceLogAcesso_IdPrim_Desc on arqLanceLogAcesso ( IDPRIMARIO );
create desc index arqLanceLogAcesso_IdQuem on arqLanceLogAcesso ( IDQUEM );
create desc index arqLanceLogAcesso_Operacao on arqLanceLogAcesso ( OPERACAO );
commit;

/************************************************************
	CAMPOS LIGADOS - FOREIGN KEYS
************************************************************/
ALTER TABLE arqLanceOperacao ADD CONSTRAINT arqLanceOperacao_FK_Status FOREIGN KEY ( TIPO ) REFERENCES tabLanceTipoOperacao ON DELETE SET NULL;
ALTER TABLE arqLanceOperacao ADD CONSTRAINT arqLanceOperacao_FK_Assunto FOREIGN KEY ( ASSUNTO ) REFERENCES arqLanceAssunto ON DELETE SET NULL ON UPDATE Cascade;
ALTER TABLE arqLanceLogAcesso ADD CONSTRAINT arqLanceLogAcesso_FK_Status FOREIGN KEY ( STATUS ) REFERENCES tabLanceLogStatus ON DELETE SET NULL;
ALTER TABLE arqLanceLogAcesso ADD CONSTRAINT arqLanceLogAcesso_FK_Operacao FOREIGN KEY ( OPERACAO ) REFERENCES arqLanceOperacao ON DELETE SET NULL ON UPDATE Cascade;
ALTER TABLE arqLanceLogAcesso ADD CONSTRAINT arqLanceLogAcesso_FK_OperProc FOREIGN KEY ( OPERPROC ) REFERENCES arqLanceOperacao ON DELETE SET NULL ON UPDATE Cascade;

/************************************************************
	PROCEDURE PARA REAVALIAR TODOS OS INDICES
************************************************************/

set term ^;
recreate procedure reindexarTudo
as
	declare variable sql varchar(255);
	declare variable nomeIndex varchar(255);
begin
	for 
		select rdb$index_name from rdb$indices
		into :nomeIndex
	do
	begin
		sql = 'SET STATISTICS INDEX ' || nomeIndex;
		execute statement :sql;
		if( ( position('_FK', nomeIndex) = 0 ) and
			 ( position('_PK', nomeIndex) = 0 ) and 
			 ( position('_UK', nomeIndex) = 0 ) ) then
		begin
			sql = 'alter index ' || nomeIndex || ' inactive';
			execute statement :sql;
			sql = 'alter index ' || nomeIndex || ' active';
			execute statement :sql;
		end
	end
end^
set term ;^
commit;

/************************************************************
	PROCEDURE PARA DEFINIR DADOS DA CONEXÃO
************************************************************/

set term ^;
recreate procedure set_conexao(
	p_Master campoLogico,
	p_Login VARCHAR( 255 ),
	p_Perfil SMALLINT,
	p_Usuario BIGINT,
	p_Operacao ligadoComArquivo,
	p_Txt VARCHAR( 255 )	)
AS
BEGIN
	RDB$SET_CONTEXT( 'USER_SESSION', 'MASTER', :p_MASTER );
	RDB$SET_CONTEXT( 'USER_SESSION', 'LOGIN', :p_LOGIN );
	RDB$SET_CONTEXT( 'USER_SESSION', 'PERFIL', :p_PERFIL );
	RDB$SET_CONTEXT( 'USER_SESSION', 'USUARIO', :p_USUARIO );
	RDB$SET_CONTEXT( 'USER_SESSION', 'OPERACAO', :p_OPERACAO ); 
END^
set term ;^
commit;

/************************************************************
	PROCEDURE PARA CRIAR LOG
************************************************************/

set term ^;
recreate procedure set_log(
   p_tipoOperacao SMALLINT,
   p_idPrimario BIGINT,
   p_campo VARCHAR(255),
   p_valorOLD VARCHAR(255),
   p_valorNEW VARCHAR(255) )
AS
BEGIN
 if( ( p_tipoOperacao in (13,14,16) ) or ( p_valorOLD is distinct from p_valorNEW ) ) then begin
   insert into arqLanceLogAcesso values( 
      gen_Id( genIdPrimario, 1), 
      :p_tipoOperacao, 
      RDB$GET_CONTEXT( 'USER_SESSION', 'MASTER' ), 
      RDB$GET_CONTEXT( 'USER_SESSION', 'LOGIN' ),
      CURRENT_DATE, CURRENT_TIME, 
      RDB$GET_CONTEXT( 'USER_SESSION', 'PERFIL' ), 
      RDB$GET_CONTEXT( 'USER_SESSION', 'USUARIO' ), 
      RDB$GET_CONTEXT( 'SYSTEM', 'CLIENT_ADDRESS' ), 
      RDB$GET_CONTEXT( 'USER_SESSION', 'IDOPERACAO' ), 
      RDB$GET_CONTEXT( 'USER_SESSION', 'VALORCHAVE' ),
      :p_idPrimario, 
      RDB$GET_CONTEXT( 'USER_SESSION', 'OPERACAO' ), 
      RDB$GET_CONTEXT( 'USER_SESSION', 'TXT' ), 
      :p_campo, :p_valorOLD, :p_valorNEW );
   RDB$SET_CONTEXT( 'USER_SESSION', 'FEITO', 1 );
 end
END^
set term ;^ 
commit;

/************************************************************
	TABELA tabUF
************************************************************/

CREATE TABLE tabUF
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 2 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabUF_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabUF_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabUF VALUES ( 1, 'AC', 'Acre' );
INSERT INTO tabUF VALUES ( 2, 'AL', 'Alagoas' );
INSERT INTO tabUF VALUES ( 3, 'AM', 'Amazonas' );
INSERT INTO tabUF VALUES ( 4, 'AP', 'Amapá' );
INSERT INTO tabUF VALUES ( 5, 'BA', 'Bahia' );
INSERT INTO tabUF VALUES ( 6, 'CE', 'Ceará' );
INSERT INTO tabUF VALUES ( 7, 'DF', 'Distrito Federal' );
INSERT INTO tabUF VALUES ( 8, 'ES', 'Espírito Santo' );
INSERT INTO tabUF VALUES ( 9, 'GO', 'Goiás' );
INSERT INTO tabUF VALUES ( 10, 'MA', 'Maranhão' );
INSERT INTO tabUF VALUES ( 11, 'MG', 'Minas Gerais' );
INSERT INTO tabUF VALUES ( 12, 'MS', 'Mato Grosso do Sul' );
INSERT INTO tabUF VALUES ( 13, 'MT', 'Mato Grosso' );
INSERT INTO tabUF VALUES ( 14, 'PA', 'Pará' );
INSERT INTO tabUF VALUES ( 15, 'PB', 'Paraíba' );
INSERT INTO tabUF VALUES ( 16, 'PE', 'Pernambuco' );
INSERT INTO tabUF VALUES ( 17, 'PI', 'Piauí' );
INSERT INTO tabUF VALUES ( 18, 'PR', 'Paraná' );
INSERT INTO tabUF VALUES ( 19, 'RJ', 'Rio de Janeiro' );
INSERT INTO tabUF VALUES ( 20, 'RN', 'Rio Grande do Norte' );
INSERT INTO tabUF VALUES ( 21, 'RO', 'Rondônia' );
INSERT INTO tabUF VALUES ( 22, 'RR', 'Roraima' );
INSERT INTO tabUF VALUES ( 23, 'RS', 'Rio Grande do Sul' );
INSERT INTO tabUF VALUES ( 24, 'SC', 'Santa Catarina' );
INSERT INTO tabUF VALUES ( 25, 'SE', 'Sergipe' );
INSERT INTO tabUF VALUES ( 26, 'SP', 'São Paulo' );
INSERT INTO tabUF VALUES ( 27, 'TO', 'Tocantins' );
commit;


/************************************************************
	TABELA tabSexo
************************************************************/

CREATE TABLE tabSexo
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabSexo_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabSexo_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabSexo VALUES ( 1, 'M', 'MASCULINO' );
INSERT INTO tabSexo VALUES ( 2, 'F', 'FEMININO' );
commit;


/************************************************************
	TABELA tabEstCivil
************************************************************/

CREATE TABLE tabEstCivil
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabEstCivil_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabEstCivil_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabEstCivil VALUES ( 1, '1', 'SOLTEIRO(A)' );
INSERT INTO tabEstCivil VALUES ( 2, '2', 'CASADO(A)' );
INSERT INTO tabEstCivil VALUES ( 3, '3', 'VIÚVO(A)' );
INSERT INTO tabEstCivil VALUES ( 4, '4', 'DIVORCIADO(A)' );
INSERT INTO tabEstCivil VALUES ( 5, '5', 'OUTRO' );
commit;


/************************************************************
	TABELA tabInstrucao
************************************************************/

CREATE TABLE tabInstrucao
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 2 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabInstrucao_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabInstrucao_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabInstrucao VALUES ( 1, '1', 'Fundamental incompleto' );
INSERT INTO tabInstrucao VALUES ( 2, '2', 'Fundamental' );
INSERT INTO tabInstrucao VALUES ( 3, '3', 'Médio incompleto' );
INSERT INTO tabInstrucao VALUES ( 4, '4', 'Médio' );
INSERT INTO tabInstrucao VALUES ( 5, '5', 'Superior incompleto' );
INSERT INTO tabInstrucao VALUES ( 6, '6', 'Superior' );
INSERT INTO tabInstrucao VALUES ( 7, '7', 'Especialização incompleta' );
INSERT INTO tabInstrucao VALUES ( 8, '8', 'Especialização' );
INSERT INTO tabInstrucao VALUES ( 9, '9', 'Mestrado incompleto' );
INSERT INTO tabInstrucao VALUES ( 10, '10', 'Mestrado' );
INSERT INTO tabInstrucao VALUES ( 11, '11', 'Doutorado incompleto' );
INSERT INTO tabInstrucao VALUES ( 12, '12', 'Doutorado' );
commit;


/************************************************************
	TABELA tabTPFPJ
************************************************************/

CREATE TABLE tabTPFPJ
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabTPFPJ_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabTPFPJ_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabTPFPJ VALUES ( 1, 'F', 'Física' );
INSERT INTO tabTPFPJ VALUES ( 2, 'J', 'Jurídica' );
commit;


/************************************************************
	TABELA tabTipoAcao
************************************************************/

CREATE TABLE tabTipoAcao
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabTipoAcao_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabTipoAcao_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabTipoAcao VALUES ( 1, '1', 'Sem texto' );
INSERT INTO tabTipoAcao VALUES ( 2, '2', 'Interno' );
INSERT INTO tabTipoAcao VALUES ( 3, '3', 'Externo' );
commit;


/************************************************************
	TABELA tabPadraoAcao
************************************************************/

CREATE TABLE tabPadraoAcao
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabPadraoAcao_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabPadraoAcao_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabPadraoAcao VALUES ( 1, '1', 'Aniversário do cliente' );
commit;


/************************************************************
	TABELA tabStatusLog
************************************************************/

CREATE TABLE tabStatusLog
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 2 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabStatusLog_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabStatusLog_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabStatusLog VALUES ( 1, '11', 'Acesso' );
INSERT INTO tabStatusLog VALUES ( 2, '12', 'Alteração' );
INSERT INTO tabStatusLog VALUES ( 3, '13', 'Inclusão' );
INSERT INTO tabStatusLog VALUES ( 4, '14', 'Exclusão' );
INSERT INTO tabStatusLog VALUES ( 5, '15', 'Processamento' );
commit;


/************************************************************
	TABELA tabPrioridade
************************************************************/

CREATE TABLE tabPrioridade
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabPrioridade_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabPrioridade_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabPrioridade VALUES ( 1, '1', 'Urgente' );
INSERT INTO tabPrioridade VALUES ( 2, '2', 'Normal' );
commit;


/************************************************************
	TABELA tabTSimNao
************************************************************/

CREATE TABLE tabTSimNao
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabTSimNao_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabTSimNao_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabTSimNao VALUES ( 1, '1', 'Não' );
INSERT INTO tabTSimNao VALUES ( 2, '2', 'Sim' );
commit;


/************************************************************
	TABELA tabTCor
************************************************************/

CREATE TABLE tabTCor
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 4 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabTCor_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabTCor_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabTCor VALUES ( 1, 'VM', 'Vermelho' );
INSERT INTO tabTCor VALUES ( 2, 'AM', 'Amarelo' );
INSERT INTO tabTCor VALUES ( 3, 'VDc', 'Verde claro' );
INSERT INTO tabTCor VALUES ( 4, 'VDe', 'Verde escuro' );
INSERT INTO tabTCor VALUES ( 5, 'AZc', 'Azul claro' );
INSERT INTO tabTCor VALUES ( 6, 'AZe', 'Azul escuro' );
INSERT INTO tabTCor VALUES ( 7, 'LJ', 'Laranja' );
INSERT INTO tabTCor VALUES ( 8, 'CZ', 'Cinza' );
INSERT INTO tabTCor VALUES ( 9, 'PT', 'Preto com negrito' );
INSERT INTO tabTCor VALUES ( 10, 'BR', 'Branco' );
INSERT INTO tabTCor VALUES ( 11, 'MR', 'Marrom' );
INSERT INTO tabTCor VALUES ( 12, 'RS', 'Rosa' );
INSERT INTO tabTCor VALUES ( 13, 'RX', 'Roxo' );
INSERT INTO tabTCor VALUES ( 14, 'PRsB', 'Preto sem negrito' );
INSERT INTO tabTCor VALUES ( 15, '15', 'Chocolate' );
INSERT INTO tabTCor VALUES ( 16, '16', 'Cinza escuro' );
INSERT INTO tabTCor VALUES ( 17, '17', 'Coral' );
INSERT INTO tabTCor VALUES ( 18, '18', 'Salmão' );
INSERT INTO tabTCor VALUES ( 19, '19', 'Siena' );
INSERT INTO tabTCor VALUES ( 20, '20', 'Violeta' );
INSERT INTO tabTCor VALUES ( 21, '21', 'Dourado' );
INSERT INTO tabTCor VALUES ( 22, '22', 'Rosa escuro' );
INSERT INTO tabTCor VALUES ( 23, '23', 'Fucsia' );
commit;


/************************************************************
	TABELA tabTOrDoc
************************************************************/

CREATE TABLE tabTOrDoc
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabTOrDoc_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabTOrDoc_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabTOrDoc VALUES ( 1, '1', 'Arquivo externo' );
INSERT INTO tabTOrDoc VALUES ( 2, '2', 'Texto interno' );
INSERT INTO tabTOrDoc VALUES ( 3, '3', 'Lista de campos' );
commit;


/************************************************************
	TABELA tabTArqDoc
************************************************************/

CREATE TABLE tabTArqDoc
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabTArqDoc_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabTArqDoc_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabTArqDoc VALUES ( 1, '1', 'Pessoas' );
commit;


/************************************************************
	TABELA tabTPapel
************************************************************/

CREATE TABLE tabTPapel
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabTPapel_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabTPapel_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabTPapel VALUES ( 1, '1', 'A4' );
INSERT INTO tabTPapel VALUES ( 2, '2', 'Oficio' );
INSERT INTO tabTPapel VALUES ( 3, '3', 'Carta' );
commit;


/************************************************************
	TABELA tabTOrienta
************************************************************/

CREATE TABLE tabTOrienta
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabTOrienta_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabTOrienta_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabTOrienta VALUES ( 1, '1', 'Retrato' );
INSERT INTO tabTOrienta VALUES ( 2, '2', 'Paisagem' );
commit;


/************************************************************
	TABELA tabTPix
************************************************************/

CREATE TABLE tabTPix
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabTPix_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabTPix_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabTPix VALUES ( 1, '1', 'Aleatória' );
INSERT INTO tabTPix VALUES ( 2, '2', 'Celular' );
INSERT INTO tabTPix VALUES ( 3, '3', 'CNPJ' );
INSERT INTO tabTPix VALUES ( 4, '4', 'CPF' );
INSERT INTO tabTPix VALUES ( 5, '5', 'Email' );
commit;


/************************************************************
	TABELA tabTPgRec
************************************************************/

CREATE TABLE tabTPgRec
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabTPgRec_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabTPgRec_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabTPgRec VALUES ( 1, '1', 'Pagar' );
INSERT INTO tabTPgRec VALUES ( 2, '2', 'Receber' );
commit;


/************************************************************
	TABELA tabTFCobra
************************************************************/

CREATE TABLE tabTFCobra
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabTFCobra_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabTFCobra_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabTFCobra VALUES ( 1, '1', 'Boleto' );
INSERT INTO tabTFCobra VALUES ( 2, '2', 'Cartão' );
INSERT INTO tabTFCobra VALUES ( 3, '3', 'Carteira' );
INSERT INTO tabTFCobra VALUES ( 4, '4', 'Formulário' );
commit;


/************************************************************
	TABELA tabTFPagto
************************************************************/

CREATE TABLE tabTFPagto
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabTFPagto_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabTFPagto_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabTFPagto VALUES ( 1, '1', 'Banco' );
INSERT INTO tabTFPagto VALUES ( 2, '2', 'Dinheiro' );
INSERT INTO tabTFPagto VALUES ( 3, '3', 'Nenhum' );
commit;


/************************************************************
	TABELA tabTDetPg
************************************************************/

CREATE TABLE tabTDetPg
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabTDetPg_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabTDetPg_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabTDetPg VALUES ( 1, '1', 'Cheque' );
INSERT INTO tabTDetPg VALUES ( 2, '2', 'Depósito' );
INSERT INTO tabTDetPg VALUES ( 3, '3', 'DOC' );
INSERT INTO tabTDetPg VALUES ( 4, '4', 'PIX' );
INSERT INTO tabTDetPg VALUES ( 5, '5', 'TED' );
INSERT INTO tabTDetPg VALUES ( 6, '6', 'Tr. Eletrônica' );
commit;


/************************************************************
	TABELA tabTPessoa
************************************************************/

CREATE TABLE tabTPessoa
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabTPessoa_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabTPessoa_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabTPessoa VALUES ( 1, '1', 'Fornecedor' );
INSERT INTO tabTPessoa VALUES ( 2, '2', 'Paciente' );
INSERT INTO tabTPessoa VALUES ( 3, '3', 'Outros' );
commit;


/************************************************************
	TABELA tabTMov
************************************************************/

CREATE TABLE tabTMov
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabTMov_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabTMov_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabTMov VALUES ( 1, '1', 'Devolução' );
INSERT INTO tabTMov VALUES ( 2, '2', 'Entrada' );
INSERT INTO tabTMov VALUES ( 3, '3', 'Perda Diversa' );
INSERT INTO tabTMov VALUES ( 4, '4', 'Perda pela validade' );
INSERT INTO tabTMov VALUES ( 5, '5', 'Quebra' );
INSERT INTO tabTMov VALUES ( 6, '6', 'Saída consulta' );
INSERT INTO tabTMov VALUES ( 7, '7', 'Saída diversa' );
commit;


/************************************************************
	TABELA tabTStCon
************************************************************/

CREATE TABLE tabTStCon
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 2 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabTStCon_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabTStCon_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabTStCon VALUES ( 1, '1', 'AGENDADO' );
INSERT INTO tabTStCon VALUES ( 2, '2', 'RECEPÇÃO' );
INSERT INTO tabTStCon VALUES ( 3, '3', 'MÉDICO' );
INSERT INTO tabTStCon VALUES ( 4, '4', 'TESTE' );
INSERT INTO tabTStCon VALUES ( 5, '5', 'AG. ASSESSOR' );
INSERT INTO tabTStCon VALUES ( 6, '6', 'ASSESSOR' );
INSERT INTO tabTStCon VALUES ( 7, '7', 'ATENDIDO' );
INSERT INTO tabTStCon VALUES ( 8, '8', 'LIBERADO' );
INSERT INTO tabTStCon VALUES ( 9, '9', 'CLÍNICA DESMARCOU' );
INSERT INTO tabTStCon VALUES ( 10, '10', 'PACIENTE DESMARCOU' );
INSERT INTO tabTStCon VALUES ( 11, '11', 'MÉDICO DESMARCOU' );
commit;


/************************************************************
	TABELA tabTDiaSem
************************************************************/

CREATE TABLE tabTDiaSem
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabTDiaSem_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabTDiaSem_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabTDiaSem VALUES ( 1, 'D', 'Domingo' );
INSERT INTO tabTDiaSem VALUES ( 2, '2', '2ª feira' );
INSERT INTO tabTDiaSem VALUES ( 3, '3', '3ª feira' );
INSERT INTO tabTDiaSem VALUES ( 4, '4', '4ª feira' );
INSERT INTO tabTDiaSem VALUES ( 5, '5', '5ª feira' );
INSERT INTO tabTDiaSem VALUES ( 6, '6', '6ª feira' );
INSERT INTO tabTDiaSem VALUES ( 7, 'S', 'Sábado' );
commit;


/************************************************************
	TABELA tabTMotivo
************************************************************/

CREATE TABLE tabTMotivo
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabTMotivo_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabTMotivo_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabTMotivo VALUES ( 1, '1', 'Dificuldade de obter uma ereção' );
INSERT INTO tabTMotivo VALUES ( 2, '2', 'Dificuldade de manter uma ereção' );
INSERT INTO tabTMotivo VALUES ( 3, '3', 'Libido' );
INSERT INTO tabTMotivo VALUES ( 4, '4', 'Ejaculação precoce' );
commit;


/************************************************************
	TABELA tabTCompete
************************************************************/

CREATE TABLE tabTCompete
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabTCompete_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabTCompete_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabTCompete VALUES ( 1, '1', 'Anterior' );
INSERT INTO tabTCompete VALUES ( 2, '2', 'Atual' );
INSERT INTO tabTCompete VALUES ( 3, '3', 'Próximo' );
commit;


/************************************************************
	TABELA tabTData
************************************************************/

CREATE TABLE tabTData
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabTData_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabTData_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabTData VALUES ( 1, '1', 'Pagamento' );
INSERT INTO tabTData VALUES ( 2, '2', 'Vencimento' );
commit;


/************************************************************
	TABELA tabTStAgRet
************************************************************/

CREATE TABLE tabTStAgRet
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabTStAgRet_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabTStAgRet_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabTStAgRet VALUES ( 1, '1', 'RECEPÇÃO' );
INSERT INTO tabTStAgRet VALUES ( 2, '2', 'EM PROCESSO' );
INSERT INTO tabTStAgRet VALUES ( 3, '3', 'ENTREGUE' );
commit;


/************************************************************
	TABELA tabTCMedica
************************************************************/

CREATE TABLE tabTCMedica
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabTCMedica_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabTCMedica_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabTCMedica VALUES ( 1, '1', 'Nada separado' );
INSERT INTO tabTCMedica VALUES ( 2, '2', 'Parcialmente separado' );
INSERT INTO tabTCMedica VALUES ( 3, '3', 'Totalmente separado e não entregue' );
INSERT INTO tabTCMedica VALUES ( 4, '4', 'Totalmente separado e entregue' );
commit;


/************************************************************
	TABELA tabTCCor
************************************************************/

CREATE TABLE tabTCCor
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabTCCor_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabTCCor_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabTCCor VALUES ( 1, '1', 'Financeiro' );
INSERT INTO tabTCCor VALUES ( 2, '2', 'Assessor' );
INSERT INTO tabTCCor VALUES ( 3, '3', 'Recepção' );
commit;


/************************************************************
	Arquivo Bairro    
************************************************************/

CREATE TABLE arqBairro
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	BAIRRO VARCHAR( 60 ) COLLATE PT_BR, /* Máscara = M */
	CONSTRAINT arqBairro_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqBairro_UK UNIQUE ( Bairro )
);
commit;

CREATE DESC INDEX arqBairro_IdPrimario_Desc ON arqBairro (IDPRIMARIO);
commit;


/************************************************************
	Arquivo Cidade    
************************************************************/

CREATE TABLE arqCidade
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	UF ligadoComTabela, /* Ligado com a Tabela UF */
	/*  3*/	CIDADE VARCHAR( 60 ) COLLATE PT_BR, /* Máscara = M */
	/*  4*/	DDD SMALLINT, /* Máscara = N */
	CONSTRAINT arqCidade_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqCidade_UK UNIQUE ( UF, Cidade )
);
commit;

CREATE DESC INDEX arqCidade_IdPrimario_Desc ON arqCidade (IDPRIMARIO);
commit;


/************************************************************
	Arquivo Midia     
************************************************************/

CREATE TABLE arqMidia
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	MIDIA VARCHAR( 30 ) COLLATE PT_BR, /* Máscara = M */
	/*  3*/	ATIVO campoLogico, /* Lógico: 0=Não 1=Sim */
	CONSTRAINT arqMidia_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqMidia_UK UNIQUE ( Midia )
);
commit;

CREATE DESC INDEX arqMidia_IdPrimario_Desc ON arqMidia (IDPRIMARIO);
commit;


/************************************************************
	Arquivo Profissao 
************************************************************/

CREATE TABLE arqProfissao
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	PROFISSAO VARCHAR( 40 ) COLLATE PT_BR, /* Máscara = M */
	/*  3*/	ATIVO campoLogico, /* Lógico: 0=Não 1=Sim */
	CONSTRAINT arqProfissao_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqProfissao_UK UNIQUE ( Profissao )
);
commit;

CREATE DESC INDEX arqProfissao_IdPrimario_Desc ON arqProfissao (IDPRIMARIO);
commit;


/************************************************************
	Arquivo TiConsulta
************************************************************/

CREATE TABLE arqTiConsulta
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	TICONSULTA VARCHAR( 15 ) COLLATE PT_BR, /* Máscara = I */
	/*  3*/	ATIVO campoLogico, /* Lógico: 0=Não 1=Sim */
	CONSTRAINT arqTiConsulta_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqTiConsulta_UK UNIQUE ( TiConsulta )
);
commit;

CREATE DESC INDEX arqTiConsulta_IdPrimario_Desc ON arqTiConsulta (IDPRIMARIO);
commit;


/************************************************************
	Arquivo Grupo     
************************************************************/

CREATE TABLE arqGrupo
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	GRUPO VARCHAR( 50 ) COLLATE PT_BR, /* Máscara = M */
	/*  3*/	CALLCENTER campoLogico, /* Lógico: 0=Não 1=Sim */
	/*  4*/	MEDICO campoLogico, /* Lógico: 0=Não 1=Sim */
	/*  5*/	ASSESSOR campoLogico, /* Lógico: 0=Não 1=Sim */
	/*  6*/	AVRETIRA campoLogico, /* Lógico: 0=Não 1=Sim */
	CONSTRAINT arqGrupo_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqGrupo_UK UNIQUE ( Grupo )
);
commit;

CREATE DESC INDEX arqGrupo_IdPrimario_Desc ON arqGrupo (IDPRIMARIO);
commit;


/************************************************************
	Arquivo Clinica   
************************************************************/

CREATE TABLE arqClinica
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	CLINICA VARCHAR( 30 ) COLLATE PT_BR, /* Máscara = M */
	/*  3*/	RAZAO VARCHAR( 80 ) COLLATE PT_BR, /* Máscara = M */
	/*  4*/	EMAIL VARCHAR( 80 ) COLLATE PT_BR, /* Máscara = X */
	/*  5*/	CNPJ VARCHAR( 14 ) COLLATE PT_BR, /* Máscara = nn.nnn.nnn/nnnn */
	/*  6*/	ENDE_CEP VARCHAR( 8 ) COLLATE PT_BR, /* Máscara = nnnnn-nnn */
	/*  7*/	ENDE_ENDERECO VARCHAR( 80 ) COLLATE PT_BR, /* Máscara = M */
	/*  8*/	ENDE_BAIRRO ligadoComArquivo, /* Ligado com o Arquivo Bairro */
	/*  9*/	ENDE_CIDADE ligadoComArquivo, /* Ligado com o Arquivo Cidade */
	/* 10*/	/* ENDE_DDD */
	/* 11*/	ENDE_TELEFONE VARCHAR( 50 ) COLLATE PT_BR, /* Máscara = M */
	/* 12*/	ENDE_DDDCELULAR SMALLINT, /* Máscara = N */
	/* 13*/	ENDE_CELULAR VARCHAR( 9 ) COLLATE PT_BR, /* Máscara = n.nnnn.nnnn */
	/* 14*/	ENDE_WHATSAPP campoLogico, /* Lógico: 0=Não 1=Sim */
	/* 15*/	TICONSULTA ligadoComArquivo, /* Ligado com o Arquivo TiConsulta */
	/* 16*/	DATAINI DATE, /* Máscara = 4ano */
	/* 17*/	DATAFIM DATE, /* Máscara = 4ano */
	/* 18*/	/* ATIVO */
	/* 19*/	MAXAGENDA INTEGER, /* Máscara = N */
	/* 20*/	SIGLA VARCHAR( 3 ) COLLATE PT_BR, /* Máscara = M */
	CONSTRAINT arqClinica_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqClinica_UK UNIQUE ( Clinica )
);
commit;

CREATE DESC INDEX arqClinica_IdPrimario_Desc ON arqClinica (IDPRIMARIO);
commit;


/************************************************************
	Arquivo Pessoa    
************************************************************/

CREATE TABLE arqPessoa
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	NOME VARCHAR( 60 ) COLLATE PT_BR, /* Máscara = M */
	/*  3*/	APELIDO VARCHAR( 30 ) COLLATE PT_BR, /* Máscara = M */
	/*  4*/	NUMCELULAR VARCHAR( 11 ) COLLATE PT_BR, /* Máscara = (nn) n.nnnn.nnn */
	/*  5*/	PRONTUARIO VARCHAR( 9 ) COLLATE PT_BR, /* Máscara = M */
	/*  6*/	ENDE_CEP VARCHAR( 8 ) COLLATE PT_BR, /* Máscara = nnnnn-nnn */
	/*  7*/	ENDE_ENDERECO VARCHAR( 80 ) COLLATE PT_BR, /* Máscara = M */
	/*  8*/	ENDE_BAIRRO ligadoComArquivo, /* Ligado com o Arquivo Bairro */
	/*  9*/	ENDE_CIDADE ligadoComArquivo, /* Ligado com o Arquivo Cidade */
	/* 10*/	/* ENDE_DDD */
	/* 11*/	ENDE_TELEFONE VARCHAR( 50 ) COLLATE PT_BR, /* Máscara = M */
	/* 12*/	ENDE_DDDCELULAR SMALLINT, /* Máscara = N */
	/* 13*/	ENDE_CELULAR VARCHAR( 9 ) COLLATE PT_BR, /* Máscara = n.nnnn.nnnn */
	/* 14*/	ENDE_WHATSAPP campoLogico, /* Lógico: 0=Não 1=Sim */
	/* 15*/	NASCIMENTO DATE, /* Máscara = 4ano */
	/* 16*/	/* IDADE */
	/* 17*/	SEXO ligadoComTabela, /* Ligado com a Tabela Sexo */
	/* 18*/	ESTCIVIL ligadoComTabela, /* Ligado com a Tabela EstCivil */
	/* 19*/	PROFISSAO ligadoComArquivo, /* Ligado com o Arquivo Profissao */
	/* 20*/	CPF VARCHAR( 11 ) COLLATE PT_BR, /* Máscara = nnn.nnn.nnn-nn */
	/* 21*/	IDENTIDADE VARCHAR( 30 ) COLLATE PT_BR, /* Máscara = M */
	/* 22*/	ORGAO VARCHAR( 20 ) COLLATE PT_BR, /* Máscara = M */
	/* 23*/	EMISSAO DATE, /* Máscara = 4ano */
	/* 24*/	EMAIL VARCHAR( 100 ) COLLATE PT_BR, /* Máscara = X */
	/* 25*/	RECEMAIL campoLogico, /* Lógico: 0=Não 1=Sim */
	/* 26*/	ATIVO campoLogico, /* Lógico: 0=Não 1=Sim */
	/* 27*/	OBS BLOB SUB_TYPE 1 COLLATE PT_BR, /* Máscara =  */
	/* 28*/	DESDE DATE, /* Máscara = 4ano */
	/* 29*/	QTODESMAR SMALLINT, /* Máscara = N */
	/* 30*/	MIDIA ligadoComArquivo, /* Ligado com o Arquivo Midia */
	/* 31*/	QTASCOMPLE INTEGER, /* Máscara = N */
	CONSTRAINT arqPessoa_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqPessoa_UK UNIQUE ( Nome, NumCelular )
);
commit;

CREATE DESC INDEX arqPessoa_IdPrimario_Desc ON arqPessoa (IDPRIMARIO);
commit;


/************************************************************
	Arquivo Fornecedor
************************************************************/

CREATE TABLE arqFornecedor
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	NOME VARCHAR( 60 ) COLLATE PT_BR, /* Máscara = M */
	/*  3*/	APELIDO VARCHAR( 30 ) COLLATE PT_BR, /* Máscara = M */
	/*  4*/	TPFPJ ligadoComTabela, /* Ligado com a Tabela TPFPJ */
	/*  5*/	ENDE_CEP VARCHAR( 8 ) COLLATE PT_BR, /* Máscara = nnnnn-nnn */
	/*  6*/	ENDE_ENDERECO VARCHAR( 80 ) COLLATE PT_BR, /* Máscara = M */
	/*  7*/	ENDE_BAIRRO ligadoComArquivo, /* Ligado com o Arquivo Bairro */
	/*  8*/	ENDE_CIDADE ligadoComArquivo, /* Ligado com o Arquivo Cidade */
	/*  9*/	/* ENDE_DDD */
	/* 10*/	ENDE_TELEFONE VARCHAR( 50 ) COLLATE PT_BR, /* Máscara = M */
	/* 11*/	ENDE_DDDCELULAR SMALLINT, /* Máscara = N */
	/* 12*/	ENDE_CELULAR VARCHAR( 9 ) COLLATE PT_BR, /* Máscara = n.nnnn.nnnn */
	/* 13*/	ENDE_WHATSAPP campoLogico, /* Lógico: 0=Não 1=Sim */
	/* 14*/	CNPJ VARCHAR( 14 ) COLLATE PT_BR, /* Máscara = nn.nnn.nnn/nnnn */
	/* 15*/	INSCESTAD VARCHAR( 25 ) COLLATE PT_BR, /* Máscara = M */
	/* 16*/	INSCMUNIC VARCHAR( 25 ) COLLATE PT_BR, /* Máscara = M */
	/* 17*/	CPF VARCHAR( 11 ) COLLATE PT_BR, /* Máscara = nnn.nnn.nnn-nn */
	/* 18*/	IDENTIDADE VARCHAR( 30 ) COLLATE PT_BR, /* Máscara = M */
	/* 19*/	ORGAO VARCHAR( 20 ) COLLATE PT_BR, /* Máscara = M */
	/* 20*/	EMISSAO DATE, /* Máscara = 4ano */
	/* 21*/	ATIVO campoLogico, /* Lógico: 0=Não 1=Sim */
	/* 22*/	OBS BLOB SUB_TYPE 1 COLLATE PT_BR, /* Máscara =  */
	/* 23*/	DESDE DATE, /* Máscara = 4ano */
	CONSTRAINT arqFornecedor_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqFornecedor_UK UNIQUE ( Nome )
);
commit;

CREATE DESC INDEX arqFornecedor_IdPrimario_Desc ON arqFornecedor (IDPRIMARIO);
commit;


/************************************************************
	Arquivo Unidade   
************************************************************/

CREATE TABLE arqUnidade
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	UNIDADE VARCHAR( 10 ) COLLATE PT_BR, /* Máscara = M */
	/*  3*/	ATIVO campoLogico, /* Lógico: 0=Não 1=Sim */
	CONSTRAINT arqUnidade_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqUnidade_UK UNIQUE ( Unidade )
);
commit;

CREATE DESC INDEX arqUnidade_IdPrimario_Desc ON arqUnidade (IDPRIMARIO);
commit;


/************************************************************
	Arquivo Template  
************************************************************/

CREATE TABLE arqTemplate
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	NOME VARCHAR( 60 ) COLLATE PT_BR, /* Máscara = M */
	/*  3*/	TEMPLATE BLOB SUB_TYPE 1 COLLATE PT_BR, /* Máscara =  */
	CONSTRAINT arqTemplate_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqTemplate_UK UNIQUE ( Nome )
);
commit;

CREATE DESC INDEX arqTemplate_IdPrimario_Desc ON arqTemplate (IDPRIMARIO);
commit;


/************************************************************
	Arquivo PTrata    
************************************************************/

CREATE TABLE arqPTrata
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	PTRATA VARCHAR( 80 ) COLLATE PT_BR, /* Máscara = M */
	/*  3*/	APELIDO VARCHAR( 10 ) COLLATE PT_BR, /* Máscara = M */
	/*  4*/	VALOR NUMERIC( 8, 2 ), /* Máscara = N */
	/*  5*/	MRGDESC NUMERIC( 4, 2 ), /* Máscara = N */
	/*  6*/	/* VALMINIMO */
	/*  7*/	COMPLEMEN campoLogico, /* Lógico: 0=Não 1=Sim */
	/*  8*/	ATIVO campoLogico, /* Lógico: 0=Não 1=Sim */
	/*  9*/	TEMPO VARCHAR( 10 ) COLLATE PT_BR, /* Máscara = M */
	CONSTRAINT arqPTrata_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqPTrata_UK UNIQUE ( PTrata )
);
commit;

CREATE DESC INDEX arqPTrata_IdPrimario_Desc ON arqPTrata (IDPRIMARIO);
commit;


/************************************************************
	Arquivo Conta     
************************************************************/

CREATE TABLE arqConta
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	TRANSACAO NUMERIC(18,0), /* Máscara = N */
	/*  3*/	CLINICA ligadoComArquivo, /* Ligado com o Arquivo Clinica */
	/*  4*/	TPGREC ligadoComTabela, /* Ligado com a Tabela TPgRec */
	/*  5*/	FORNECEDOR ligadoComArquivo, /* Ligado com o Arquivo Fornecedor */
	/*  6*/	PESSOA ligadoComArquivo, /* Ligado com o Arquivo Pessoa */
	/*  7*/	/* NOME */
	/*  8*/	TRGVALOR NUMERIC( 11, 2 ), /* Máscara = N */
	/*  9*/	TRGVALLIQ NUMERIC( 11, 2 ), /* Máscara = N */
	/* 10*/	TRGQTDPARC SMALLINT, /* Máscara = N */
	/* 11*/	TRGQPARCPG SMALLINT, /* Máscara = N */
	/* 12*/	PROXVENC DATE, /* Máscara = 4ano */
	/* 13*/	TRGPAGO NUMERIC( 11, 2 ), /* Máscara = N */
	/* 14*/	/* SALDO */
	/* 15*/	DOCUMENTO NUMERIC(18,0), /* Máscara = N */
	/* 16*/	EMISSAO DATE, /* Máscara = 4ano */
	/* 17*/	RECENVIA DATE, /* Máscara = 4ano */
	/* 18*/	COMPETE DATE, /* Máscara = A4mm */
	/* 19*/	HISTORICO VARCHAR( 60 ) COLLATE PT_BR, /* Máscara = M */
	/* 20*/	ARQ1 VARCHAR( 10 ), /* Arquivo = nome da extensão do mesmo */
	/* 21*/	ARQ1_ARQUIVO VARCHAR(128) computed by ( lower( 'Conta/' || CASE WHEN ( ARQ1 IS NULL ) THEN ( '' ) ELSE ( IDPRIMARIO || '_ARQ1.' || ARQ1 ) END ) ),
	CONSTRAINT arqConta_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqConta_UK UNIQUE ( Transacao )
);
commit;

CREATE DESC INDEX arqConta_IdPrimario_Desc ON arqConta (IDPRIMARIO);
commit;


/************************************************************
	Arquivo Banco     
************************************************************/

CREATE TABLE arqBanco
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	NUM NUMERIC(18,0), /* Máscara = N */
	/*  3*/	BANCO VARCHAR( 50 ) COLLATE PT_BR, /* Máscara = M */
	CONSTRAINT arqBanco_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqBanco_UK UNIQUE ( Num )
);
commit;

CREATE DESC INDEX arqBanco_IdPrimario_Desc ON arqBanco (IDPRIMARIO);
commit;


/************************************************************
	Arquivo Plano     
************************************************************/

CREATE TABLE arqPlano
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	CODPLANO SMALLINT, /* Máscara = Z */
	/*  3*/	PLANO VARCHAR( 30 ) COLLATE PT_BR, /* Máscara = M */
	/*  4*/	TPGREC ligadoComTabela, /* Ligado com a Tabela TPgRec */
	CONSTRAINT arqPlano_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqPlano_UK UNIQUE ( CodPlano )
);
commit;

CREATE DESC INDEX arqPlano_IdPrimario_Desc ON arqPlano (IDPRIMARIO);
commit;


/************************************************************
	Arquivo TiAgenda  
************************************************************/

CREATE TABLE arqTiAgenda
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	TIAGENDA VARCHAR( 20 ) COLLATE PT_BR, /* Máscara = M */
	/*  3*/	ATIVO campoLogico, /* Lógico: 0=Não 1=Sim */
	/*  4*/	DOBROTEMPO campoLogico, /* Lógico: 0=Não 1=Sim */
	/*  5*/	PAGAMENTO campoLogico, /* Lógico: 0=Não 1=Sim */
	/*  6*/	MIDIA campoLogico, /* Lógico: 0=Não 1=Sim */
	CONSTRAINT arqTiAgenda_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqTiAgenda_UK UNIQUE ( TiAgenda )
);
commit;

CREATE DESC INDEX arqTiAgenda_IdPrimario_Desc ON arqTiAgenda (IDPRIMARIO);
commit;


/************************************************************
	Arquivo FormaPg   
************************************************************/

CREATE TABLE arqFormaPg
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	FORMAPG VARCHAR( 30 ) COLLATE PT_BR, /* Máscara = M */
	/*  3*/	PODEENTRA campoLogico, /* Lógico: 0=Não 1=Sim */
	/*  4*/	DINHEIRO campoLogico, /* Lógico: 0=Não 1=Sim */
	/*  5*/	BOLETO campoLogico, /* Lógico: 0=Não 1=Sim */
	/*  6*/	CARTAO campoLogico, /* Lógico: 0=Não 1=Sim */
	/*  7*/	DIAS SMALLINT, /* Máscara = N */
	/*  8*/	TAXADEB NUMERIC( 4, 2 ), /* Máscara = N */
	/*  9*/	TAXA2 NUMERIC( 4, 2 ), /* Máscara = N */
	/* 10*/	TAXA3 NUMERIC( 4, 2 ), /* Máscara = N */
	/* 11*/	ATIVO campoLogico, /* Lógico: 0=Não 1=Sim */
	CONSTRAINT arqFormaPg_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqFormaPg_UK UNIQUE ( FormaPg )
);
commit;

CREATE DESC INDEX arqFormaPg_IdPrimario_Desc ON arqFormaPg (IDPRIMARIO);
commit;


/************************************************************
	Arquivo Usuario   
************************************************************/

CREATE TABLE arqUsuario
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	USUARIO VARCHAR( 40 ) COLLATE PT_BR, /* Máscara = M */
	/*  3*/	NOME VARCHAR( 60 ) COLLATE PT_BR, /* Máscara = M */
	/*  4*/	SENHA VARCHAR( 20 ) COLLATE PT_BR, /* Máscara = ? */
	/*  5*/	GRUPO ligadoComArquivo, /* Ligado com o Arquivo Grupo */
	/*  6*/	VERSAO VARCHAR( 10 ) COLLATE PT_BR, /* Máscara = X */
	/*  7*/	EMAIL VARCHAR( 70 ) COLLATE PT_BR, /* Máscara = X */
	/*  8*/	CRM VARCHAR( 10 ) COLLATE PT_BR, /* Máscara = M */
	/*  9*/	PODEAGENDA campoLogico, /* Lógico: 0=Não 1=Sim */
	/* 10*/	ATIVO campoLogico, /* Lógico: 0=Não 1=Sim */
	/* 11*/	NASCIMENTO DATE, /* Máscara = 4ano */
	/* 12*/	FOTO campoImagem, /* Imagem = Ligado com a Tabela LanceTipoImg */
	/* 13*/	FOTO_ARQUIVO  VARCHAR(128)computed by ( lower( 'Usuario/' || CASE WHEN ( FOTO IS NULL ) THEN ( 'sem_imagem.gif' ) ELSE ( IDPRIMARIO || '_FOTO.' || (select TI.CHAVE from tabLanceTipoImg TI where TI.IDPRIMARIO=FOTO) ) END ) ),
	/* 14*/	EMAILACES campoLogico, /* Lógico: 0=Não 1=Sim */
	/* 15*/	EMAILACESS campoLogico, /* Lógico: 0=Não 1=Sim */
	/* 16*/	EMAILFINAN campoLogico, /* Lógico: 0=Não 1=Sim */
	/* 17*/	EMCMEDISEP campoLogico, /* Lógico: 0=Não 1=Sim */
	CONSTRAINT arqUsuario_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqUsuario_UK UNIQUE ( Usuario )
);
commit;

CREATE DESC INDEX arqUsuario_IdPrimario_Desc ON arqUsuario (IDPRIMARIO);
commit;


/************************************************************
	Arquivo Medicamen 
************************************************************/

CREATE TABLE arqMedicamen
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	MEDICAMEN VARCHAR( 50 ) COLLATE PT_BR, /* Máscara = M */
	/*  3*/	UNIDADE ligadoComArquivo, /* Ligado com o Arquivo Unidade */
	/*  4*/	TRGITLOTE NUMERIC(18,0), /* Máscara = N */
	/*  5*/	TRGCMLOTE NUMERIC(18,0), /* Máscara = N */
	/*  6*/	/* ESTOQUE */
	/*  7*/	ATIVO campoLogico, /* Lógico: 0=Não 1=Sim */
	CONSTRAINT arqMedicamen_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqMedicamen_UK UNIQUE ( Medicamen )
);
commit;

CREATE DESC INDEX arqMedicamen_IdPrimario_Desc ON arqMedicamen (IDPRIMARIO);
commit;


/************************************************************
	Arquivo AcaoEmail 
************************************************************/

CREATE TABLE arqAcaoEmail
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	TITULO VARCHAR( 100 ) COLLATE PT_BR, /* Máscara = I */
	/*  3*/	VERSAO VARCHAR( 20 ) COLLATE PT_BR, /* Máscara = X */
	/*  4*/	TIPOACAO ligadoComTabela, /* Ligado com a Tabela TipoAcao */
	/*  5*/	TEMPLATE ligadoComArquivo, /* Ligado com o Arquivo Template */
	/*  6*/	PADRAOACAO ligadoComTabela, /* Ligado com a Tabela PadraoAcao */
	/*  7*/	ATIVO campoLogico, /* Lógico: 0=Não 1=Sim */
	/*  8*/	ARQUIVO VARCHAR( 10 ), /* Arquivo = nome da extensão do mesmo */
	/*  9*/	ARQUIVO_ARQUIVO VARCHAR(128) computed by ( lower( 'AcaoEmail/' || CASE WHEN ( ARQUIVO IS NULL ) THEN ( '' ) ELSE ( IDPRIMARIO || '_ARQUIVO.' || ARQUIVO ) END ) ),
	/* 10*/	HTML BLOB SUB_TYPE 1 COLLATE PT_BR, /* Máscara = Edit */
	/* 11*/	IMAGEM campoImagem, /* Imagem = Ligado com a Tabela LanceTipoImg */
	/* 12*/	IMAGEM_ARQUIVO  VARCHAR(128)computed by ( lower( 'AcaoEmail/' || CASE WHEN ( IMAGEM IS NULL ) THEN ( 'sem_imagem.gif' ) ELSE ( IDPRIMARIO || '_IMAGEM.' || (select TI.CHAVE from tabLanceTipoImg TI where TI.IDPRIMARIO=IMAGEM) ) END ) ),
	/* 13*/	LINK VARCHAR( 200 ) COLLATE PT_BR, /* Máscara = X */
	/* 14*/	IMAGEMALT VARCHAR( 50 ) COLLATE PT_BR, /* Máscara = I */
	/* 15*/	QTDTESTE SMALLINT, /* Máscara = N */
	CONSTRAINT arqAcaoEmail_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqAcaoEmail_UK UNIQUE ( Titulo, Versao )
);
commit;

CREATE DESC INDEX arqAcaoEmail_IdPrimario_Desc ON arqAcaoEmail (IDPRIMARIO);
commit;


/************************************************************
	Arquivo Consulta  
************************************************************/

CREATE TABLE arqConsulta
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	NUM NUMERIC(18,0), /* Máscara = N */
	/*  3*/	TICONSULTA ligadoComArquivo, /* Ligado com o Arquivo TiConsulta */
	/*  4*/	CLINICA ligadoComArquivo, /* Ligado com o Arquivo Clinica */
	/*  5*/	TSTCON ligadoComTabela, /* Ligado com a Tabela TStCon */
	/*  6*/	TIAGENDA ligadoComArquivo, /* Ligado com o Arquivo TiAgenda */
	/*  7*/	DATA DATE, /* Máscara = 4ano */
	/*  8*/	HORA TIME, /* Máscara = Hhmm */
	/*  9*/	HORACHEGA TIME, /* Máscara = Hhmm */
	/* 10*/	PESSOA ligadoComArquivo, /* Ligado com o Arquivo Pessoa */
	/* 11*/	/* PRONTUARIO */
	/* 12*/	MEDICO ligadoComArquivo, /* Ligado com o Arquivo Usuario */
	/* 13*/	ASSESSOR ligadoComArquivo, /* Ligado com o Arquivo Usuario */
	/* 14*/	CALLCENTER ligadoComArquivo, /* Ligado com o Arquivo Usuario */
	/* 15*/	MEDICAATUA BLOB SUB_TYPE 1 COLLATE PT_BR, /* Máscara =  */
	/* 16*/	TMOTIVO ligadoComTabela, /* Ligado com a Tabela TMotivo */
	/* 17*/	CORTESIA campoLogico, /* Lógico: 0=Não 1=Sim */
	/* 18*/	VALOR NUMERIC( 8, 2 ), /* Máscara = N */
	/* 19*/	FORMAPG ligadoComArquivo, /* Ligado com o Arquivo FormaPg */
	/* 20*/	VALOR2 NUMERIC( 8, 2 ), /* Máscara = N */
	/* 21*/	FORMAPG2 ligadoComArquivo, /* Ligado com o Arquivo FormaPg */
	/* 22*/	PTRATA ligadoComArquivo, /* Ligado com o Arquivo PTrata */
	/* 23*/	VALPTRATA NUMERIC( 8, 2 ), /* Máscara = N */
	/* 24*/	ENTRAFPG ligadoComArquivo, /* Ligado com o Arquivo FormaPg */
	/* 25*/	ENTRAVAL NUMERIC( 8, 2 ), /* Máscara = N */
	/* 26*/	ENTRAPARCE SMALLINT, /* Máscara = N */
	/* 27*/	ENTRAPARC SMALLINT, /* Máscara = N */
	/* 28*/	SDENTRFPG ligadoComArquivo, /* Ligado com o Arquivo FormaPg */
	/* 29*/	SDVENC1PAR DATE, /* Máscara = 4ano */
	/* 30*/	SDCOND SMALLINT, /* Máscara = N */
	/* 31*/	ENTRAVALP NUMERIC( 8, 2 ), /* Máscara = N */
	/* 32*/	/* ENTRATOTP */
	/* 33*/	/* ENTRATOTAL */
	/* 34*/	BOLETOMIN NUMERIC( 8, 2 ), /* Máscara = N */
	/* 35*/	ENTRAOBS VARCHAR( 100 ) COLLATE PT_BR, /* Máscara = M */
	/* 36*/	SALDOFPG ligadoComArquivo, /* Ligado com o Arquivo FormaPg */
	/* 37*/	SALDOPARC SMALLINT, /* Máscara = N */
	/* 38*/	SALDOCOND SMALLINT, /* Máscara = N */
	/* 39*/	/* SALDOVAL */
	/* 40*/	SALDOOBS VARCHAR( 100 ) COLLATE PT_BR, /* Máscara = M */
	/* 41*/	CONDUTA BLOB SUB_TYPE 1 COLLATE PT_BR, /* Máscara =  */
	/* 42*/	MEDICACAO BLOB SUB_TYPE 1 COLLATE PT_BR, /* Máscara =  */
	/* 43*/	OBS BLOB SUB_TYPE 1 COLLATE PT_BR, /* Máscara =  */
	/* 44*/	CONTACONS ligadoComArquivo, /* Ligado com o Arquivo Conta */
	/* 45*/	CONTAPTRA ligadoComArquivo, /* Ligado com o Arquivo Conta */
	/* 46*/	TRGQTDM NUMERIC(18,0), /* Máscara = N */
	/* 47*/	TRGQTDMENT NUMERIC(18,0), /* Máscara = N */
	/* 48*/	/* SALDO */
	/* 49*/	QUEMAGRET ligadoComArquivo, /* Ligado com o Arquivo Usuario */
	/* 50*/	QDOAGRET DATE, /* Máscara = 4ano */
	/* 51*/	DATARET DATE, /* Máscara = 4ano */
	/* 52*/	/* DIARET */
	/* 53*/	HORARET TIME, /* Máscara = Hhmm */
	/* 54*/	TSTAGRET ligadoComTabela, /* Ligado com a Tabela TStAgRet */
	/* 55*/	ASSESRET ligadoComArquivo, /* Ligado com o Arquivo Usuario */
	/* 56*/	OBSRET BLOB SUB_TYPE 1 COLLATE PT_BR, /* Máscara =  */
	CONSTRAINT arqConsulta_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqConsulta_UK UNIQUE ( Num )
);
commit;

CREATE DESC INDEX arqConsulta_IdPrimario_Desc ON arqConsulta (IDPRIMARIO);
commit;


/************************************************************
	Arquivo SubPlano  
************************************************************/

CREATE TABLE arqSubPlano
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	PLANO ligadoComArquivo, /* Ligado com o Arquivo Plano */
	/*  3*/	CODIGO VARCHAR( 6 ) COLLATE PT_BR, /* Máscara = nn.nn.nn */
	/*  4*/	NOME VARCHAR( 30 ) COLLATE PT_BR, /* Máscara = M */
	CONSTRAINT arqSubPlano_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqSubPlano_UK UNIQUE ( Plano, Codigo )
);
commit;

CREATE DESC INDEX arqSubPlano_IdPrimario_Desc ON arqSubPlano (IDPRIMARIO);
commit;


/************************************************************
	Arquivo Avisos    
************************************************************/

CREATE TABLE arqAvisos
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	NUMERO INTEGER, /* Máscara = N */
	/*  3*/	DATA DATE, /* Máscara = 4ano */
	/*  4*/	HORA TIME, /* Máscara = Hhmm */
	/*  5*/	QUEM ligadoComArquivo, /* Ligado com o Arquivo Usuario */
	/*  6*/	ASSUNTO VARCHAR( 100 ) COLLATE PT_BR, /* Máscara = M */
	/*  7*/	PRIORIDADE ligadoComTabela, /* Ligado com a Tabela Prioridade */
	/*  8*/	TEXTO BLOB SUB_TYPE 1 COLLATE PT_BR, /* Máscara = Edit */
	/*  9*/	/* IDQUEM */
	/* 10*/	AVISOPAI ligadoComArquivo, /* Ligado com o Arquivo Avisos */
	CONSTRAINT arqAvisos_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqAvisos_UK UNIQUE ( Numero )
);
commit;

CREATE DESC INDEX arqAvisos_IdPrimario_Desc ON arqAvisos (IDPRIMARIO);
commit;

CREATE DESC INDEX arqAvisos_PNum ON arqAvisos(Numero);
commit;


/************************************************************
	Arquivo EmailRemet
************************************************************/

CREATE TABLE arqEmailRemet
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	EMAIL VARCHAR( 100 ) COLLATE PT_BR, /* Máscara = X */
	/*  3*/	NOMEEMAIL VARCHAR( 100 ) COLLATE PT_BR, /* Máscara = M */
	/*  4*/	PADRAO campoLogico, /* Lógico: 0=Não 1=Sim */
	/*  5*/	ATIVO campoLogico, /* Lógico: 0=Não 1=Sim */
	CONSTRAINT arqEmailRemet_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqEmailRemet_UK UNIQUE ( Email )
);
commit;

CREATE DESC INDEX arqEmailRemet_IdPrimario_Desc ON arqEmailRemet (IDPRIMARIO);
commit;


/************************************************************
	Arquivo ComCall   
************************************************************/

CREATE TABLE arqComCall
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	CLINICA ligadoComArquivo, /* Ligado com o Arquivo Clinica */
	/*  3*/	MES DATE, /* Máscara = A4mm */
	/*  4*/	TRGQTOFX INTEGER, /* Máscara = N */
	CONSTRAINT arqComCall_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqComCall_UK UNIQUE ( Clinica, Mes )
);
commit;

CREATE DESC INDEX arqComCall_IdPrimario_Desc ON arqComCall (IDPRIMARIO);
commit;


/************************************************************
	Arquivo CCor      
************************************************************/

CREATE TABLE arqCCor
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	NOME VARCHAR( 30 ) COLLATE PT_BR, /* Máscara = M */
	/*  3*/	CLINICA ligadoComArquivo, /* Ligado com o Arquivo Clinica */
	/*  4*/	TCCOR ligadoComTabela, /* Ligado com a Tabela TCCor */
	/*  5*/	BANCO ligadoComArquivo, /* Ligado com o Arquivo Banco */
	/*  6*/	AGENCIA VARCHAR( 4 ) COLLATE PT_BR, /* Máscara = M */
	/*  7*/	DVAGENCIA VARCHAR( 1 ) COLLATE PT_BR, /* Máscara = M */
	/*  8*/	CONTA VARCHAR( 10 ) COLLATE PT_BR, /* Máscara = M */
	/*  9*/	DVCONTA VARCHAR( 1 ) COLLATE PT_BR, /* Máscara = M */
	/* 10*/	CARTEIRA INTEGER, /* Máscara = N */
	/* 11*/	CODCEDENTE VARCHAR( 11 ) COLLATE PT_BR, /* Máscara = M */
	/* 12*/	MULTA NUMERIC( 5, 2 ), /* Máscara = N */
	/* 13*/	JUROS NUMERIC( 5, 2 ), /* Máscara = N */
	/* 14*/	CBOLETO NUMERIC( 5, 2 ), /* Máscara = N */
	/* 15*/	INSTRUCOES BLOB SUB_TYPE 1 COLLATE PT_BR, /* Máscara =  */
	/* 16*/	ULTREMESSA NUMERIC(18,0), /* Máscara = N */
	/* 17*/	CONVENIO VARCHAR( 7 ) COLLATE PT_BR, /* Máscara = N */
	/* 18*/	VARIACAO NUMERIC(18,0), /* Máscara = N */
	/* 19*/	ATIVO campoLogico, /* Lógico: 0=Não 1=Sim */
	/* 20*/	TPIX1 ligadoComTabela, /* Ligado com a Tabela TPix */
	/* 21*/	PIX1 VARCHAR( 60 ) COLLATE PT_BR, /* Máscara = X */
	/* 22*/	TPIX2 ligadoComTabela, /* Ligado com a Tabela TPix */
	/* 23*/	PIX2 VARCHAR( 60 ) COLLATE PT_BR, /* Máscara = X */
	/* 24*/	TPIX3 ligadoComTabela, /* Ligado com a Tabela TPix */
	/* 25*/	PIX3 VARCHAR( 60 ) COLLATE PT_BR, /* Máscara = X */
	/* 26*/	TPIX4 ligadoComTabela, /* Ligado com a Tabela TPix */
	/* 27*/	PIX4 VARCHAR( 60 ) COLLATE PT_BR, /* Máscara = X */
	/* 28*/	TPIX5 ligadoComTabela, /* Ligado com a Tabela TPix */
	/* 29*/	PIX5 VARCHAR( 60 ) COLLATE PT_BR, /* Máscara = X */
	CONSTRAINT arqCCor_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqCCor_UK UNIQUE ( Nome )
);
commit;

CREATE DESC INDEX arqCCor_IdPrimario_Desc ON arqCCor (IDPRIMARIO);
commit;


/************************************************************
	Arquivo DocMod    
************************************************************/

CREATE TABLE arqDocMod
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	DOCUMENTO VARCHAR( 50 ) COLLATE PT_BR, /* Máscara = M */
	/*  3*/	TARQDOC ligadoComTabela, /* Ligado com a Tabela TArqDoc */
	/*  4*/	TORDOC ligadoComTabela, /* Ligado com a Tabela TOrDoc */
	/*  5*/	LOGO campoLogico, /* Lógico: 0=Não 1=Sim */
	/*  6*/	MARCA campoLogico, /* Lógico: 0=Não 1=Sim */
	/*  7*/	NOMEARQ VARCHAR( 30 ) COLLATE PT_BR, /* Máscara = X */
	/*  8*/	RODAPE campoLogico, /* Lógico: 0=Não 1=Sim */
	/*  9*/	ALTRODAPE SMALLINT, /* Máscara = N */
	/* 10*/	TEMPLATE ligadoComArquivo, /* Ligado com o Arquivo Template */
	/* 11*/	ATIVO campoLogico, /* Lógico: 0=Não 1=Sim */
	/* 12*/	HEADER VARCHAR( 10 ), /* Arquivo = nome da extensão do mesmo */
	/* 13*/	HEADER_ARQUIVO VARCHAR(128) computed by ( lower( 'DocMod/' || CASE WHEN ( HEADER IS NULL ) THEN ( '' ) ELSE ( IDPRIMARIO || '_HEADER.' || HEADER ) END ) ),
	/* 14*/	ARQUIVO VARCHAR( 10 ), /* Arquivo = nome da extensão do mesmo */
	/* 15*/	ARQUIVO_ARQUIVO VARCHAR(128) computed by ( lower( 'DocMod/' || CASE WHEN ( ARQUIVO IS NULL ) THEN ( '' ) ELSE ( IDPRIMARIO || '_ARQUIVO.' || ARQUIVO ) END ) ),
	/* 16*/	FOOTER VARCHAR( 10 ), /* Arquivo = nome da extensão do mesmo */
	/* 17*/	FOOTER_ARQUIVO VARCHAR(128) computed by ( lower( 'DocMod/' || CASE WHEN ( FOOTER IS NULL ) THEN ( '' ) ELSE ( IDPRIMARIO || '_FOOTER.' || FOOTER ) END ) ),
	/* 18*/	HTML BLOB SUB_TYPE 1 COLLATE PT_BR, /* Máscara = Edit */
	/* 19*/	IMAGEM campoImagem, /* Imagem = Ligado com a Tabela LanceTipoImg */
	/* 20*/	IMAGEM_ARQUIVO  VARCHAR(128)computed by ( lower( 'DocMod/' || CASE WHEN ( IMAGEM IS NULL ) THEN ( 'sem_imagem.gif' ) ELSE ( IDPRIMARIO || '_IMAGEM.' || (select TI.CHAVE from tabLanceTipoImg TI where TI.IDPRIMARIO=IMAGEM) ) END ) ),
	/* 21*/	LISTA BLOB SUB_TYPE 1 COLLATE PT_BR, /* Máscara =  */
	/* 22*/	MARGEMESQ SMALLINT, /* Máscara = N */
	/* 23*/	MARGEMDIR SMALLINT, /* Máscara = N */
	/* 24*/	MARGEMTOP SMALLINT, /* Máscara = N */
	/* 25*/	TPAPEL ligadoComTabela, /* Ligado com a Tabela TPapel */
	/* 26*/	TORIENTA ligadoComTabela, /* Ligado com a Tabela TOrienta */
	CONSTRAINT arqDocMod_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqDocMod_UK UNIQUE ( Documento )
);
commit;

CREATE DESC INDEX arqDocMod_IdPrimario_Desc ON arqDocMod (IDPRIMARIO);
commit;


/************************************************************
	Arquivo Lote      
************************************************************/

CREATE TABLE arqLote
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	MEDICAMEN ligadoComArquivo, /* Ligado com o Arquivo Medicamen */
	/*  3*/	LOTE VARCHAR( 15 ) COLLATE PT_BR, /* Máscara = M */
	/*  4*/	CLINICA ligadoComArquivo, /* Ligado com o Arquivo Clinica */
	/*  5*/	FORNECEDOR ligadoComArquivo, /* Ligado com o Arquivo Fornecedor */
	/*  6*/	FABRICA DATE, /* Máscara = 4ano */
	/*  7*/	VALIDADE DATE, /* Máscara = 4ano */
	/*  8*/	TRGITMOV NUMERIC(18,0), /* Máscara = N */
	/*  9*/	TRGCMEDICA NUMERIC(18,0), /* Máscara = N */
	/* 10*/	/* ESTOQUE */
	/* 11*/	ATIVO campoLogico, /* Lógico: 0=Não 1=Sim */
	CONSTRAINT arqLote_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqLote_UK UNIQUE ( Medicamen, Lote )
);
commit;

CREATE DESC INDEX arqLote_IdPrimario_Desc ON arqLote (IDPRIMARIO);
commit;


/************************************************************
	Arquivo MovEstoque
************************************************************/

CREATE TABLE arqMovEstoque
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	NUM NUMERIC(18,0), /* Máscara = N */
	/*  3*/	DATA DATE, /* Máscara = 4ano */
	/*  4*/	CLINICA ligadoComArquivo, /* Ligado com o Arquivo Clinica */
	/*  5*/	FORNECEDOR ligadoComArquivo, /* Ligado com o Arquivo Fornecedor */
	/*  6*/	NUMDOC NUMERIC(18,0), /* Máscara = N */
	/*  7*/	OBS BLOB SUB_TYPE 1 COLLATE PT_BR, /* Máscara =  */
	/*  8*/	FECHADO campoLogico, /* Lógico: 0=Não 1=Sim */
	CONSTRAINT arqMovEstoque_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqMovEstoque_UK UNIQUE ( Num )
);
commit;

CREATE DESC INDEX arqMovEstoque_IdPrimario_Desc ON arqMovEstoque (IDPRIMARIO);
commit;


/************************************************************
	Arquivo LogEmail  
************************************************************/

CREATE TABLE arqLogEmail
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	TITULO ligadoComArquivo, /* Ligado com o Arquivo AcaoEmail */
	/*  3*/	DATA DATE, /* Máscara = 4ano */
	/*  4*/	HORA TIME, /* Máscara = Seg */
	/*  5*/	USUARIO ligadoComArquivo, /* Ligado com o Arquivo Usuario */
	/*  6*/	ENVIADOS INTEGER, /* Máscara = N */
	/*  7*/	NENVIADOS INTEGER, /* Máscara = N */
	/*  8*/	/* TOTAL */
	/*  9*/	LIDOS NUMERIC(18,0), /* Máscara = N */
	/* 10*/	/* PERCLIDOS */
	/* 11*/	EMAILREMET VARCHAR( 100 ) COLLATE PT_BR, /* Máscara = X */
	/* 12*/	HORAINI TIME, /* Máscara = Seg */
	/* 13*/	HORAFIM TIME, /* Máscara = Seg */
	/* 14*/	HORAREENV TIME, /* Máscara = Seg */
	/* 15*/	ENVIOU campoLogico, /* Lógico: 0=Não 1=Sim */
	/* 16*/	OPCAO NUMERIC(18,0), /* Máscara = N */
	/* 17*/	CLIENTE ligadoComArquivo, /* Ligado com o Arquivo Pessoa */
	CONSTRAINT arqLogEmail_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqLogEmail_UK UNIQUE ( Titulo, Data, Hora )
);
commit;

CREATE DESC INDEX arqLogEmail_IdPrimario_Desc ON arqLogEmail (IDPRIMARIO);
commit;

CREATE DESC INDEX arqLogEmail_PDataDesc ON arqLogEmail(Data);
commit;


/************************************************************
	Arquivo ContPessoa
************************************************************/

CREATE TABLE arqContPessoa
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	FORNECEDOR ligadoComArquivo, /* Ligado com o Arquivo Fornecedor */
	/*  3*/	PESSOA ligadoComArquivo, /* Ligado com o Arquivo Pessoa */
	/*  4*/	NOME VARCHAR( 60 ) COLLATE PT_BR, /* Máscara = M */
	/*  5*/	APELIDO VARCHAR( 20 ) COLLATE PT_BR, /* Máscara = M */
	/*  6*/	FUNCAO VARCHAR( 60 ) COLLATE PT_BR, /* Máscara = M */
	/*  7*/	CELULAR VARCHAR( 60 ) COLLATE PT_BR, /* Máscara = X */
	/*  8*/	TELEFONE VARCHAR( 60 ) COLLATE PT_BR, /* Máscara = X */
	/*  9*/	EMAIL VARCHAR( 80 ) COLLATE PT_BR, /* Máscara = X */
	/* 10*/	RECEMAIL campoLogico, /* Lógico: 0=Não 1=Sim */
	/* 11*/	NASCIMENTO DATE, /* Máscara = 4ano */
	/* 12*/	SEXO ligadoComTabela, /* Ligado com a Tabela Sexo */
	/* 13*/	OBS BLOB SUB_TYPE 1 COLLATE PT_BR, /* Máscara =  */
	/* 14*/	ATIVO campoLogico, /* Lógico: 0=Não 1=Sim */
	CONSTRAINT arqContPessoa_PK PRIMARY KEY ( IDPRIMARIO )
);
commit;

CREATE DESC INDEX arqContPessoa_IdPrimario_Desc ON arqContPessoa (IDPRIMARIO);
commit;


/************************************************************
	Arquivo Parcela   
************************************************************/

CREATE TABLE arqParcela
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	CONTA ligadoComArquivo, /* Ligado com o Arquivo Conta */
	/*  3*/	PARCELA SMALLINT, /* Máscara = N */
	/*  4*/	VENCIMENTO DATE, /* Máscara = 4ano */
	/*  5*/	VENCEST campoLogico, /* Lógico: 0=Não 1=Sim */
	/*  6*/	VALOR NUMERIC( 11, 2 ), /* Máscara = N */
	/*  7*/	VALORLIQ NUMERIC( 11, 2 ), /* Máscara = N */
	/*  8*/	ESTIMADO campoLogico, /* Lógico: 0=Não 1=Sim */
	/*  9*/	TFCOBRA ligadoComTabela, /* Ligado com a Tabela TFCobra */
	/* 10*/	EMISSAO DATE, /* Máscara = 4ano */
	/* 11*/	/* NUMBOLETO */
	/* 12*/	LINHADIG VARCHAR( 54 ) COLLATE PT_BR, /* Máscara = X */
	/* 13*/	NOMEPDF VARCHAR( 80 ) COLLATE PT_BR, /* Máscara = X */
	/* 14*/	CCOR ligadoComArquivo, /* Ligado com o Arquivo CCor */
	/* 15*/	SUBPLANO ligadoComArquivo, /* Ligado com o Arquivo SubPlano */
	/* 16*/	DATAPAGTO DATE, /* Máscara = 4ano */
	/* 17*/	DATACOMP DATE, /* Máscara = 4ano */
	/* 18*/	TFPAGTO ligadoComTabela, /* Ligado com a Tabela TFPagto */
	/* 19*/	TDETPG ligadoComTabela, /* Ligado com a Tabela TDetPg */
	/* 20*/	FORMAPG ligadoComArquivo, /* Ligado com o Arquivo FormaPg */
	/* 21*/	CHEQUE NUMERIC(18,0), /* Máscara = Z */
	/* 22*/	ARQ1 VARCHAR( 10 ), /* Arquivo = nome da extensão do mesmo */
	/* 23*/	ARQ1_ARQUIVO VARCHAR(128) computed by ( lower( 'Parcela/' || CASE WHEN ( ARQ1 IS NULL ) THEN ( '' ) ELSE ( IDPRIMARIO || '_ARQ1.' || ARQ1 ) END ) ),
	/* 24*/	STRETORNO VARCHAR( 50 ) COLLATE PT_BR, /* Máscara = X */
	/* 25*/	REMESSA NUMERIC(18,0), /* Máscara = N */
	/* 26*/	DATAREM DATE, /* Máscara = 4ano */
	/* 27*/	HISTORICO VARCHAR( 60 ) COLLATE PT_BR, /* Máscara = M */
	CONSTRAINT arqParcela_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqParcela_UK UNIQUE ( Conta, Parcela )
);
commit;

CREATE DESC INDEX arqParcela_IdPrimario_Desc ON arqParcela (IDPRIMARIO);
commit;


/************************************************************
	Arquivo UsuCli    
************************************************************/

CREATE TABLE arqUsuCli
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	USUARIO ligadoComArquivo, /* Ligado com o Arquivo Usuario */
	/*  3*/	CLINICA ligadoComArquivo, /* Ligado com o Arquivo Clinica */
	CONSTRAINT arqUsuCli_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqUsuCli_UK UNIQUE ( Usuario, Clinica )
);
commit;

CREATE DESC INDEX arqUsuCli_IdPrimario_Desc ON arqUsuCli (IDPRIMARIO);
commit;


/************************************************************
	Arquivo ImagemCRM 
************************************************************/

CREATE TABLE arqImagemCRM
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	ACAOEMAIL ligadoComArquivo, /* Ligado com o Arquivo AcaoEmail */
	/*  3*/	NUMIMG NUMERIC(18,0), /* Máscara = N */
	/*  4*/	NOME VARCHAR( 50 ) COLLATE PT_BR, /* Máscara = I */
	/*  5*/	IMAGEM campoImagem, /* Imagem = Ligado com a Tabela LanceTipoImg */
	/*  6*/	IMAGEM_ARQUIVO  VARCHAR(128)computed by ( lower( 'ImagemCRM/' || CASE WHEN ( IMAGEM IS NULL ) THEN ( '' ) ELSE ( IDPRIMARIO || '_IMAGEM.' || (select TI.CHAVE from tabLanceTipoImg TI where TI.IDPRIMARIO=IMAGEM) ) END ) ),
	/*  7*/	LINK VARCHAR( 200 ) COLLATE PT_BR, /* Máscara = X */
	CONSTRAINT arqImagemCRM_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqImagemCRM_UK UNIQUE ( AcaoEmail, NumImg )
);
commit;

CREATE DESC INDEX arqImagemCRM_IdPrimario_Desc ON arqImagemCRM (IDPRIMARIO);
commit;


/************************************************************
	Arquivo HoraBloq  
************************************************************/

CREATE TABLE arqHoraBloq
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	CLINICA ligadoComArquivo, /* Ligado com o Arquivo Clinica */
	/*  3*/	NOME VARCHAR( 30 ) COLLATE PT_BR, /* Máscara = M */
	/*  4*/	DATAINI DATE, /* Máscara = 4ano */
	/*  5*/	HORAINI TIME, /* Máscara = Hhmm */
	/*  6*/	DATAFIM DATE, /* Máscara = 4ano */
	/*  7*/	HORAFIM TIME, /* Máscara = Hhmm */
	/*  8*/	MEDICO ligadoComArquivo, /* Ligado com o Arquivo Usuario */
	CONSTRAINT arqHoraBloq_PK PRIMARY KEY ( IDPRIMARIO )
);
commit;

CREATE DESC INDEX arqHoraBloq_IdPrimario_Desc ON arqHoraBloq (IDPRIMARIO);
commit;


/************************************************************
	Arquivo Duracao   
************************************************************/

CREATE TABLE arqDuracao
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	CLINICA ligadoComArquivo, /* Ligado com o Arquivo Clinica */
	/*  3*/	INICIO DATE, /* Máscara = 4ano */
	/*  4*/	HORAINI TIME, /* Máscara = Hhmm */
	/*  5*/	HORAFIM TIME, /* Máscara = Hhmm */
	/*  6*/	CONSSAB campoLogico, /* Lógico: 0=Não 1=Sim */
	/*  7*/	CONSDOM campoLogico, /* Lógico: 0=Não 1=Sim */
	/*  8*/	DURACAO SMALLINT, /* Máscara = N */
	CONSTRAINT arqDuracao_PK PRIMARY KEY ( IDPRIMARIO )
);
commit;

CREATE DESC INDEX arqDuracao_IdPrimario_Desc ON arqDuracao (IDPRIMARIO);
commit;


/************************************************************
	Arquivo Plantao   
************************************************************/

CREATE TABLE arqPlantao
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	CLINICA ligadoComArquivo, /* Ligado com o Arquivo Clinica */
	/*  3*/	DATAINI DATE, /* Máscara = 4ano */
	/*  4*/	DATAFIM DATE, /* Máscara = 4ano */
	/*  5*/	TDIASEM ligadoComTabela, /* Ligado com a Tabela TDiaSem */
	/*  6*/	USUARIO ligadoComArquivo, /* Ligado com o Arquivo Usuario */
	CONSTRAINT arqPlantao_PK PRIMARY KEY ( IDPRIMARIO )
);
commit;

CREATE DESC INDEX arqPlantao_IdPrimario_Desc ON arqPlantao (IDPRIMARIO);
commit;


/************************************************************
	Parâmetro Config    
************************************************************/

CREATE TABLE cnfConfig
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	EMAIL campoLogico, /* Lógico: 0=Não 1=Sim */
	/*  3*/	AVISO campoLogico, /* Lógico: 0=Não 1=Sim */
	/*  4*/	DOCMOD campoLogico, /* Lógico: 0=Não 1=Sim */
	CONSTRAINT cnfConfig_PK PRIMARY KEY ( IDPRIMARIO )
);
commit;

INSERT INTO cnfConfig (idprimario) VALUES (0);
CREATE DESC INDEX cnfConfig_IdPrimario_Desc ON cnfConfig (IDPRIMARIO);
commit;


/************************************************************
	Arquivo Recorrente
************************************************************/

CREATE TABLE arqRecorrente
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	CLINICA ligadoComArquivo, /* Ligado com o Arquivo Clinica */
	/*  3*/	FORNECEDOR ligadoComArquivo, /* Ligado com o Arquivo Fornecedor */
	/*  4*/	PESSOA ligadoComArquivo, /* Ligado com o Arquivo Pessoa */
	/*  5*/	/* NOME */
	/*  6*/	TPGREC ligadoComTabela, /* Ligado com a Tabela TPgRec */
	/*  7*/	TCOMPETE ligadoComTabela, /* Ligado com a Tabela TCompete */
	/*  8*/	VENC SMALLINT, /* Máscara = Z */
	/*  9*/	ANTECIPA campoLogico, /* Lógico: 0=Não 1=Sim */
	/* 10*/	VALOR NUMERIC( 8, 2 ), /* Máscara = N */
	/* 11*/	ESTIMADO campoLogico, /* Lógico: 0=Não 1=Sim */
	/* 12*/	TFCOBRA ligadoComTabela, /* Ligado com a Tabela TFCobra */
	/* 13*/	HISTORICO VARCHAR( 60 ) COLLATE PT_BR, /* Máscara = M */
	/* 14*/	SUBPLANO ligadoComArquivo, /* Ligado com o Arquivo SubPlano */
	/* 15*/	ATIVO campoLogico, /* Lógico: 0=Não 1=Sim */
	CONSTRAINT arqRecorrente_PK PRIMARY KEY ( IDPRIMARIO )
);
commit;

CREATE DESC INDEX arqRecorrente_IdPrimario_Desc ON arqRecorrente (IDPRIMARIO);
commit;


/************************************************************
	Arquivo CliMidia  
************************************************************/

CREATE TABLE arqCliMidia
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	CLINICA ligadoComArquivo, /* Ligado com o Arquivo Clinica */
	/*  3*/	MIDIA ligadoComArquivo, /* Ligado com o Arquivo Midia */
	/*  4*/	ATIVO campoLogico, /* Lógico: 0=Não 1=Sim */
	CONSTRAINT arqCliMidia_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqCliMidia_UK UNIQUE ( Clinica, Midia )
);
commit;

CREATE DESC INDEX arqCliMidia_IdPrimario_Desc ON arqCliMidia (IDPRIMARIO);
commit;


/************************************************************
	Arquivo ParaGrupo 
************************************************************/

CREATE TABLE arqParaGrupo
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	AVISOS ligadoComArquivo, /* Ligado com o Arquivo Avisos */
	/*  3*/	GRUPO ligadoComArquivo, /* Ligado com o Arquivo Grupo */
	/*  4*/	USUARIO ligadoComArquivo, /* Ligado com o Arquivo Usuario */
	CONSTRAINT arqParaGrupo_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqParaGrupo_UK UNIQUE ( Avisos, Grupo, Usuario )
);
commit;

CREATE DESC INDEX arqParaGrupo_IdPrimario_Desc ON arqParaGrupo (IDPRIMARIO);
commit;


/************************************************************
	Arquivo FxComCall 
************************************************************/

CREATE TABLE arqFxComCall
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	COMCALL ligadoComArquivo, /* Ligado com o Arquivo ComCall */
	/*  3*/	FAIXA INTEGER, /* Máscara = N */
	/*  4*/	PERCATE NUMERIC( 4, 2 ), /* Máscara = N */
	/*  5*/	COMISSAO NUMERIC( 4, 2 ), /* Máscara = N */
	CONSTRAINT arqFxComCall_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqFxComCall_UK UNIQUE ( ComCall, Faixa )
);
commit;

CREATE DESC INDEX arqFxComCall_IdPrimario_Desc ON arqFxComCall (IDPRIMARIO);
commit;


/************************************************************
	Arquivo Lido      
************************************************************/

CREATE TABLE arqLido
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	AVISOS ligadoComArquivo, /* Ligado com o Arquivo Avisos */
	/*  3*/	USUARIO ligadoComArquivo, /* Ligado com o Arquivo Usuario */
	/*  4*/	/* GRUPO */
	/*  5*/	DATA DATE, /* Máscara = 4ano */
	CONSTRAINT arqLido_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqLido_UK UNIQUE ( Avisos, Usuario )
);
commit;

CREATE DESC INDEX arqLido_IdPrimario_Desc ON arqLido (IDPRIMARIO);
commit;


/************************************************************
	Arquivo IndexAtua 
************************************************************/

CREATE TABLE arqIndexAtua
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	INDICE VARCHAR( 50 ) COLLATE PT_BR, /* Máscara = I */
	/*  3*/	DATA DATE, /* Máscara = 4ano */
	/*  4*/	DIAS SMALLINT, /* Máscara = N */
	/*  5*/	/* DATAPROX */
	/*  6*/	ESTATIS NUMERIC( 7, 6 ), /* Máscara = N */
	CONSTRAINT arqIndexAtua_PK PRIMARY KEY ( IDPRIMARIO )
);
commit;

CREATE DESC INDEX arqIndexAtua_IdPrimario_Desc ON arqIndexAtua (IDPRIMARIO);
commit;


/************************************************************
	Arquivo AgRet     
************************************************************/

CREATE TABLE arqAgRet
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	CLINICA ligadoComArquivo, /* Ligado com o Arquivo Clinica */
	/*  3*/	DATA DATE, /* Máscara = 4ano */
	/*  4*/	/* DIA */
	/*  5*/	HORA TIME, /* Máscara = Hhmm */
	/*  6*/	CONSULTA ligadoComArquivo, /* Ligado com o Arquivo Consulta */
	/*  7*/	PESSOA ligadoComArquivo, /* Ligado com o Arquivo Pessoa */
	/*  8*/	/* PRONTUARIO */
	/*  9*/	/* NOME */
	/* 10*/	/* NUMCELULAR */
	/* 11*/	TSTAGRET ligadoComTabela, /* Ligado com a Tabela TStAgRet */
	/* 12*/	ASSESSOR ligadoComArquivo, /* Ligado com o Arquivo Usuario */
	/* 13*/	OBS BLOB SUB_TYPE 1 COLLATE PT_BR, /* Máscara =  */
	CONSTRAINT arqAgRet_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqAgRet_UK UNIQUE ( Clinica, Data, Hora )
);
commit;

CREATE DESC INDEX arqAgRet_IdPrimario_Desc ON arqAgRet (IDPRIMARIO);
commit;


/************************************************************
	Arquivo CMedica   
************************************************************/

CREATE TABLE arqCMedica
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	CONSULTA ligadoComArquivo, /* Ligado com o Arquivo Consulta */
	/*  3*/	MEDICAMEN ligadoComArquivo, /* Ligado com o Arquivo Medicamen */
	/*  4*/	/* UNIDADECAL */
	/*  5*/	QTD NUMERIC(18,0), /* Máscara = N */
	/*  6*/	LOTE ligadoComArquivo, /* Ligado com o Arquivo Lote */
	/*  7*/	DATASEPARA DATE, /* Máscara = 4ano */
	/*  8*/	QTDENTREG NUMERIC(18,0), /* Máscara = N */
	/*  9*/	/* SALDO */
	/* 10*/	OBSENTREG VARCHAR( 60 ) COLLATE PT_BR, /* Máscara = M */
	CONSTRAINT arqCMedica_PK PRIMARY KEY ( IDPRIMARIO )
);
commit;

CREATE DESC INDEX arqCMedica_IdPrimario_Desc ON arqCMedica (IDPRIMARIO);
commit;


/************************************************************
	Parâmetro XConfig   
************************************************************/

CREATE TABLE cnfXConfig
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	CPF VARCHAR( 11 ) COLLATE PT_BR, /* Máscara = nnn.nnn.nnn-nn */
	/*  3*/	LOGACESSO campoLogico, /* Lógico: 0=Não 1=Sim */
	/*  4*/	LOGACESSOS campoLogico, /* Lógico: 0=Não 1=Sim */
	/*  5*/	QTD NUMERIC(18,0), /* Máscara = N */
	/*  6*/	QTD2 NUMERIC(18,0), /* Máscara = N */
	/*  7*/	EMPRESA VARCHAR( 100 ) COLLATE PT_BR, /* Máscara = M */
	/*  8*/	ENDE_CEP VARCHAR( 8 ) COLLATE PT_BR, /* Máscara = nnnnn-nnn */
	/*  9*/	ENDE_ENDERECO VARCHAR( 80 ) COLLATE PT_BR, /* Máscara = M */
	/* 10*/	ENDE_BAIRRO ligadoComArquivo, /* Ligado com o Arquivo Bairro */
	/* 11*/	ENDE_CIDADE ligadoComArquivo, /* Ligado com o Arquivo Cidade */
	/* 12*/	/* ENDE_DDD */
	/* 13*/	ENDE_TELEFONE VARCHAR( 50 ) COLLATE PT_BR, /* Máscara = M */
	/* 14*/	ENDE_DDDCELULAR SMALLINT, /* Máscara = N */
	/* 15*/	ENDE_CELULAR VARCHAR( 9 ) COLLATE PT_BR, /* Máscara = n.nnnn.nnnn */
	/* 16*/	ENDE_WHATSAPP campoLogico, /* Lógico: 0=Não 1=Sim */
	/* 17*/	CNPJ VARCHAR( 14 ) COLLATE PT_BR, /* Máscara = nn.nnn.nnn/nnnn */
	/* 18*/	EMAIL VARCHAR( 80 ) COLLATE PT_BR, /* Máscara = X */
	/* 19*/	SITE VARCHAR( 80 ) COLLATE PT_BR, /* Máscara = X */
	/* 20*/	QTASDESMAR SMALLINT, /* Máscara = N */
	/* 21*/	DECLINAR SMALLINT, /* Máscara = N */
	/* 22*/	RECORDIA SMALLINT, /* Máscara = N */
	/* 23*/	SUBPLARREC ligadoComArquivo, /* Ligado com o Arquivo SubPlano */
	/* 24*/	SUBPLARASS ligadoComArquivo, /* Ligado com o Arquivo SubPlano */
	/* 25*/	FORNREC ligadoComArquivo, /* Ligado com o Arquivo Fornecedor */
	/* 26*/	BOLETOMIN NUMERIC( 8, 2 ), /* Máscara = N */
	/* 27*/	DIASSDENTR SMALLINT, /* Máscara = N */
	CONSTRAINT cnfXConfig_PK PRIMARY KEY ( IDPRIMARIO )
);
commit;

INSERT INTO cnfXConfig (idprimario) VALUES (0);
CREATE DESC INDEX cnfXConfig_IdPrimario_Desc ON cnfXConfig (IDPRIMARIO);
commit;


/************************************************************
	Arquivo ItemMov   
************************************************************/

CREATE TABLE arqItemMov
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	MOVESTOQUE ligadoComArquivo, /* Ligado com o Arquivo MovEstoque */
	/*  3*/	ITEM INTEGER, /* Máscara = N */
	/*  4*/	LOTE ligadoComArquivo, /* Ligado com o Arquivo Lote */
	/*  5*/	TMOV ligadoComTabela, /* Ligado com a Tabela TMov */
	/*  6*/	QTD INTEGER, /* Máscara = N */
	/*  7*/	/* QTDCALC */
	/*  8*/	/* CUNIDADE */
	CONSTRAINT arqItemMov_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqItemMov_UK UNIQUE ( MovEstoque, Item )
);
commit;

CREATE DESC INDEX arqItemMov_IdPrimario_Desc ON arqItemMov (IDPRIMARIO);
commit;


/************************************************************
	Arquivo UsuCCor   
************************************************************/

CREATE TABLE arqUsuCCor
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	USUARIO ligadoComArquivo, /* Ligado com o Arquivo Usuario */
	/*  3*/	CCOR ligadoComArquivo, /* Ligado com o Arquivo CCor */
	CONSTRAINT arqUsuCCor_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqUsuCCor_UK UNIQUE ( Usuario, CCor )
);
commit;

CREATE DESC INDEX arqUsuCCor_IdPrimario_Desc ON arqUsuCCor (IDPRIMARIO);
commit;


/************************************************************
	Arquivo ItLogEmail
************************************************************/

CREATE TABLE arqItLogEmail
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	LOGEMAIL ligadoComArquivo, /* Ligado com o Arquivo LogEmail */
	/*  3*/	CLIENTE ligadoComArquivo, /* Ligado com o Arquivo Pessoa */
	/*  4*/	EMAIL VARCHAR( 100 ) COLLATE PT_BR, /* Máscara = X */
	/*  5*/	ENVIADO campoLogico, /* Lógico: 0=Não 1=Sim */
	/*  6*/	LIDO DATE, /* Máscara = 4ano */
	/*  7*/	LINKEMP DATE, /* Máscara = 4ano */
	/*  8*/	LINKKM DATE, /* Máscara = 4ano */
	CONSTRAINT arqItLogEmail_PK PRIMARY KEY ( IDPRIMARIO )
);
commit;

CREATE DESC INDEX arqItLogEmail_IdPrimario_Desc ON arqItLogEmail (IDPRIMARIO);
commit;


/************************************************************
	CAMPOS CALCULADOS
************************************************************/

ALTER TABLE arqPessoa ADD ENDE_DDD SMALLINT computed by ( ( COALESCE( ( SELECT DDD FROM arqCidade WHERE arqCidade.IdPrimario=( arqPessoa.Ende_Cidade )  ), 0 ) ) ); 
ALTER TABLE arqPessoa ALTER ENDE_DDD POSITION 10;
ALTER TABLE cnfXConfig ADD ENDE_DDD SMALLINT computed by ( ( COALESCE( ( SELECT DDD FROM arqCidade WHERE arqCidade.IdPrimario=( cnfXConfig.Ende_Cidade )  ), 0 ) ) ); 
ALTER TABLE cnfXConfig ALTER ENDE_DDD POSITION 12;
ALTER TABLE arqClinica ADD ENDE_DDD SMALLINT computed by ( ( COALESCE( ( SELECT DDD FROM arqCidade WHERE arqCidade.IdPrimario=( arqClinica.Ende_Cidade )  ), 0 ) ) ); 
ALTER TABLE arqClinica ALTER ENDE_DDD POSITION 10;
ALTER TABLE arqFornecedor ADD ENDE_DDD SMALLINT computed by ( ( COALESCE( ( SELECT DDD FROM arqCidade WHERE arqCidade.IdPrimario=( arqFornecedor.Ende_Cidade )  ), 0 ) ) ); 
ALTER TABLE arqFornecedor ALTER ENDE_DDD POSITION 9;
ALTER TABLE arqPessoa ADD IDADE INTEGER computed by ( CASE
	WHEN( Nascimento is not null ) THEN( ( cast(
   datediff( year, Nascimento, current_date ) -
   iif(
      current_date <
      lpad( extract( day from Nascimento ), 2, '0' ) || '.' ||
      lpad( extract( month from Nascimento ), 2, '0' ) || '.' ||
      extract( year from current_date ), 1, 0 ) as smallint )
)
 )
	END  ); 
ALTER TABLE arqPessoa ALTER IDADE POSITION 16;
ALTER TABLE arqLogEmail ADD TOTAL INTEGER computed by ( Enviados + NEnviados ); 
ALTER TABLE arqLogEmail ALTER TOTAL POSITION 8;
ALTER TABLE arqLogEmail ADD PERCLIDOS NUMERIC( 5, 2 ) computed by ( CASE
	WHEN( Enviados > 0 ) THEN( ( Lidos * 100.0 ) / Enviados )
	ELSE ( 0 )
	END  ); 
ALTER TABLE arqLogEmail ALTER PERCLIDOS POSITION 10;
ALTER TABLE arqAvisos ADD IDQUEM NUMERIC(18,0) computed by ( ( COALESCE( ( SELECT idPrimario FROM arqUsuario WHERE arqUsuario.IdPrimario=( arqAvisos.Quem )  ), 0 ) ) ); 
ALTER TABLE arqAvisos ALTER IDQUEM POSITION 9;
ALTER TABLE arqLido ADD GRUPO VARCHAR( 50 ) computed by ( ( COALESCE( ( SELECT Grupo FROM arqGrupo WHERE arqGrupo.IdPrimario=( COALESCE( ( SELECT Grupo FROM arqUsuario WHERE arqUsuario.IdPrimario=( arqLido.Usuario ) ), 0 ) )  ), '' ) ) ); 
ALTER TABLE arqLido ALTER GRUPO POSITION 4;
ALTER TABLE arqIndexAtua ADD DATAPROX DATE computed by ( dateadd( Dias day to Data ) ); 
ALTER TABLE arqIndexAtua ALTER DATAPROX POSITION 5;
ALTER TABLE arqPTrata ADD VALMINIMO NUMERIC( 8, 2 ) computed by ( Valor - ( Valor * MrgDesc ) / 100.0 ); 
ALTER TABLE arqPTrata ALTER VALMINIMO POSITION 6;
ALTER TABLE arqParcela ADD NUMBOLETO NUMERIC(18,0) computed by ( CASE
	WHEN( Emissao is not null ) THEN( IdPrimario )
	ELSE ( 0 )
	END  ); 
ALTER TABLE arqParcela ALTER NUMBOLETO POSITION 11;
ALTER TABLE arqConta ADD NOME VARCHAR( 60 ) computed by ( CASE
	WHEN( Pessoa > 0 ) THEN( ( COALESCE( ( SELECT Nome FROM arqPessoa WHERE arqPessoa.IdPrimario=( arqConta.Pessoa )  ), '' ) ) )
	ELSE ( ( COALESCE( ( SELECT Nome FROM arqFornecedor WHERE arqFornecedor.IdPrimario=( arqConta.Fornecedor )  ), '' ) ) )
	END  ); 
ALTER TABLE arqConta ALTER NOME POSITION 7;
ALTER TABLE arqConta ADD SALDO NUMERIC( 11, 2 ) computed by ( TrgValLiq - TrgPago ); 
ALTER TABLE arqConta ALTER SALDO POSITION 14;
ALTER TABLE arqConsulta ADD PRONTUARIO VARCHAR( 9 ) computed by ( ( COALESCE( ( SELECT Prontuario FROM arqPessoa WHERE arqPessoa.IdPrimario=( arqConsulta.Pessoa )  ), '' ) ) ); 
ALTER TABLE arqConsulta ALTER PRONTUARIO POSITION 11;
ALTER TABLE arqClinica ADD ATIVO SMALLINT computed by ( CASE
	WHEN( DataFim is null ) THEN( 1 )
	WHEN( current_date between DataIni and DataFim ) THEN( 1 )
	ELSE ( 0 )
	END  ); 
ALTER TABLE arqClinica ALTER ATIVO POSITION 18;
ALTER TABLE arqConsulta ADD ENTRATOTP NUMERIC( 8, 2 ) computed by ( EntraParc * EntraValP ); 
ALTER TABLE arqConsulta ALTER ENTRATOTP POSITION 32;
ALTER TABLE arqConsulta ADD ENTRATOTAL NUMERIC( 8, 2 ) computed by ( EntraVal + EntraTotP ); 
ALTER TABLE arqConsulta ALTER ENTRATOTAL POSITION 33;
ALTER TABLE arqConsulta ADD SALDOVAL NUMERIC( 8, 2 ) computed by ( CASE WHEN ( PTrata is not null ) THEN ( CASE
	WHEN( SaldoParc > 0 ) THEN( ( ValPTrata - EntraVal - ( EntraParc * EntraValP ) ) / SaldoParc )
	ELSE ( 0 )
	END  ) ELSE ( 0 ) END ); 
ALTER TABLE arqConsulta ALTER SALDOVAL POSITION 39;
ALTER TABLE arqRecorrente ADD NOME VARCHAR( 60 ) computed by ( CASE
	WHEN( Pessoa > 0 ) THEN( ( COALESCE( ( SELECT Nome FROM arqPessoa WHERE arqPessoa.IdPrimario=( arqRecorrente.Pessoa )  ), '' ) ) )
	ELSE ( ( COALESCE( ( SELECT Nome FROM arqFornecedor WHERE arqFornecedor.IdPrimario=( arqRecorrente.Fornecedor )  ), '' ) ) )
	END  ); 
ALTER TABLE arqRecorrente ALTER NOME POSITION 5;
ALTER TABLE arqMedicamen ADD ESTOQUE NUMERIC(18,0) computed by ( TrgItLote - TrgCMLote ); 
ALTER TABLE arqMedicamen ALTER ESTOQUE POSITION 6;
ALTER TABLE arqAgRet ADD DIA VARCHAR( 15 ) computed by ( CASE
	WHEN( extract( weekday from Data ) = 0 ) THEN( 'DOMINGO' )
	WHEN( extract( weekday from Data ) = 1 ) THEN( 'SEGUNDA-FEIRA' )
	WHEN( extract( weekday from Data ) = 2 ) THEN( 'TERÇA-FEIRA' )
	WHEN( extract( weekday from Data ) = 3 ) THEN( 'QUARTA-FEIRA' )
	WHEN( extract( weekday from Data ) = 4 ) THEN( 'QUINTA-FEIRA' )
	WHEN( extract( weekday from Data ) = 5 ) THEN( 'SEXTA-FEIRA' )
	ELSE ( 'SÁBADO' )
	END  ); 
ALTER TABLE arqAgRet ALTER DIA POSITION 4;
ALTER TABLE arqAgRet ADD PRONTUARIO VARCHAR( 9 ) computed by ( CASE
	WHEN( Consulta > 0 ) THEN( ( COALESCE( ( SELECT Prontuario FROM arqPessoa WHERE arqPessoa.IdPrimario=( COALESCE( ( SELECT Pessoa FROM arqConsulta WHERE arqConsulta.IdPrimario=( arqAgRet.Consulta ) ), 0 ) )  ), '' ) ) )
	ELSE ( ( COALESCE( ( SELECT Prontuario FROM arqPessoa WHERE arqPessoa.IdPrimario=( arqAgRet.Pessoa )  ), '' ) ) )
	END  ); 
ALTER TABLE arqAgRet ALTER PRONTUARIO POSITION 8;
ALTER TABLE arqAgRet ADD NOME VARCHAR( 60 ) computed by ( CASE
	WHEN( Consulta > 0 ) THEN( ( COALESCE( ( SELECT Nome FROM arqPessoa WHERE arqPessoa.IdPrimario=( COALESCE( ( SELECT Pessoa FROM arqConsulta WHERE arqConsulta.IdPrimario=( arqAgRet.Consulta ) ), 0 ) )  ), '' ) ) )
	ELSE ( ( COALESCE( ( SELECT Nome FROM arqPessoa WHERE arqPessoa.IdPrimario=( arqAgRet.Pessoa )  ), '' ) ) )
	END  ); 
ALTER TABLE arqAgRet ALTER NOME POSITION 9;
ALTER TABLE arqAgRet ADD NUMCELULAR VARCHAR( 11 ) computed by ( CASE
	WHEN( Consulta > 0 ) THEN( ( COALESCE( ( SELECT NumCelular FROM arqPessoa WHERE arqPessoa.IdPrimario=( COALESCE( ( SELECT Pessoa FROM arqConsulta WHERE arqConsulta.IdPrimario=( arqAgRet.Consulta ) ), 0 ) )  ), '' ) ) )
	ELSE ( ( COALESCE( ( SELECT NumCelular FROM arqPessoa WHERE arqPessoa.IdPrimario=( arqAgRet.Pessoa )  ), '' ) ) )
	END  ); 
ALTER TABLE arqAgRet ALTER NUMCELULAR POSITION 10;
ALTER TABLE arqCMedica ADD UNIDADECAL VARCHAR( 10 ) computed by ( (Select U.Unidade From arqMedicamen M join arqUnidade U on U.idPrimario=M.Unidade Where M.idPrimario=arqCMedica.Medicamen) ); 
ALTER TABLE arqCMedica ALTER UNIDADECAL POSITION 4;
ALTER TABLE arqLote ADD ESTOQUE NUMERIC(18,0) computed by ( TrgItMov - TrgCMedica ); 
ALTER TABLE arqLote ALTER ESTOQUE POSITION 10;
ALTER TABLE arqItemMov ADD QTDCALC NUMERIC(18,0) computed by ( CASE
	WHEN( TMov in( 2 ) ) THEN( Qtd )
	ELSE ( -Qtd )
	END  ); 
ALTER TABLE arqItemMov ALTER QTDCALC POSITION 7;
ALTER TABLE arqItemMov ADD CUNIDADE VARCHAR( 10 ) computed by ( ( COALESCE( ( SELECT Unidade FROM arqUnidade WHERE arqUnidade.IdPrimario=( COALESCE( ( SELECT Unidade FROM arqMedicamen WHERE arqMedicamen.IdPrimario=( COALESCE( ( SELECT Medicamen FROM arqLote WHERE arqLote.IdPrimario=( arqItemMov.Lote ) ), 0 ) ) ), 0 ) )  ), '' ) ) ); 
ALTER TABLE arqItemMov ALTER CUNIDADE POSITION 8;
ALTER TABLE arqCMedica ADD SALDO NUMERIC(18,0) computed by ( Qtd - QtdEntreg ); 
ALTER TABLE arqCMedica ALTER SALDO POSITION 9;
ALTER TABLE arqConsulta ADD SALDO NUMERIC(18,0) computed by ( TrgQtdM - TrgQtdMEnt ); 
ALTER TABLE arqConsulta ALTER SALDO POSITION 48;
ALTER TABLE arqConsulta ADD DIARET VARCHAR( 15 ) computed by ( CASE WHEN ( DataRet is not null ) THEN ( CASE
	WHEN( extract( weekday from Data ) = 0 ) THEN( 'DOMINGO' )
	WHEN( extract( weekday from Data ) = 1 ) THEN( 'SEGUNDA-FEIRA' )
	WHEN( extract( weekday from Data ) = 2 ) THEN( 'TERÇA-FEIRA' )
	WHEN( extract( weekday from Data ) = 3 ) THEN( 'QUARTA-FEIRA' )
	WHEN( extract( weekday from Data ) = 4 ) THEN( 'QUINTA-FEIRA' )
	WHEN( extract( weekday from Data ) = 5 ) THEN( 'SEXTA-FEIRA' )
	ELSE ( 'SÁBADO' )
	END  ) ELSE ( '' ) END ); 
ALTER TABLE arqConsulta ALTER DIARET POSITION 52;
commit;


/************************************************************
	VIEWS
************************************************************/

RECREATE VIEW V_arqBairro AS 
	SELECT A0.IDPRIMARIO, A0.BAIRRO
	FROM arqBairro A0;
commit;

RECREATE VIEW V_arqCidade AS 
	SELECT A0.IDPRIMARIO, A0.UF, A1.CHAVE as UF_CHAVE, A1.DESCRITOR as UF_DESCRITOR, A0.CIDADE, A0.DDD
	FROM arqCidade A0
	left join tabUF A1 on A1.IDPRIMARIO=A0.UF;
commit;

RECREATE VIEW V_arqGrupo AS 
	SELECT A0.IDPRIMARIO, A0.GRUPO, A0.CALLCENTER, A0.MEDICO, A0.ASSESSOR, A0.AVRETIRA
	FROM arqGrupo A0;
commit;

RECREATE VIEW V_arqUsuario AS 
	SELECT A0.IDPRIMARIO, A0.USUARIO, A0.NOME, A0.SENHA, A0.GRUPO, A1.GRUPO as GRUPO_GRUPO, A0.VERSAO, A0.EMAIL, A0.CRM, A0.PODEAGENDA, A0.ATIVO, A0.NASCIMENTO, A0.FOTO, A2.CHAVE as Foto_CHAVE, A2.DESCRITOR as Foto_DESCRITOR, A0.FOTO_ARQUIVO, A0.EMAILACES, A0.EMAILACESS, A0.EMAILFINAN, A0.EMCMEDISEP
	FROM arqUsuario A0
	left join arqGrupo A1 on A1.IDPRIMARIO = A0.GRUPO
	left join tabLanceTipoImg A2 on A2.IDPRIMARIO = A0.FOTO;
commit;

RECREATE VIEW V_arqPessoa AS 
	SELECT A0.IDPRIMARIO, A0.NOME, A0.APELIDO, A0.NUMCELULAR, A0.PRONTUARIO, A0.ENDE_CEP, A0.ENDE_ENDERECO, A0.ENDE_BAIRRO, A1.BAIRRO as ENDE_BAIRRO_BAIRRO, A0.ENDE_CIDADE, A2.UF as ENDE_CIDADE_UF, A3.CHAVE as ENDE_CIDADE_UF_CHAVE, A3.DESCRITOR as ENDE_CIDADE_UF_DESCRITOR, A2.CIDADE as ENDE_CIDADE_CIDADE, A0.ENDE_DDD, A0.ENDE_TELEFONE, A0.ENDE_DDDCELULAR, A0.ENDE_CELULAR, A0.ENDE_WHATSAPP, A0.NASCIMENTO, A0.IDADE, A0.SEXO, A4.CHAVE as Sexo_CHAVE, A4.DESCRITOR as Sexo_DESCRITOR, A0.ESTCIVIL, A5.CHAVE as EstCivil_CHAVE, A5.DESCRITOR as EstCivil_DESCRITOR, A0.PROFISSAO, A6.PROFISSAO as PROFISSAO_PROFISSAO, A0.CPF, A0.IDENTIDADE, A0.ORGAO, A0.EMISSAO, A0.EMAIL, A0.RECEMAIL, A0.ATIVO, A0.OBS, A0.DESDE, A0.QTODESMAR, A0.MIDIA, A7.MIDIA as MIDIA_MIDIA, A0.QTASCOMPLE
	FROM arqPessoa A0
	left join arqBairro A1 on A1.IDPRIMARIO = A0.ENDE_BAIRRO
	left join arqCidade A2 on A2.IDPRIMARIO = A0.ENDE_CIDADE
	left join tabUF A3 on A3.IDPRIMARIO=A2.UF
	left join tabSexo A4 on A4.IDPRIMARIO=A0.SEXO
	left join tabEstCivil A5 on A5.IDPRIMARIO=A0.ESTCIVIL
	left join arqProfissao A6 on A6.IDPRIMARIO = A0.PROFISSAO
	left join arqMidia A7 on A7.IDPRIMARIO = A0.MIDIA;
commit;

RECREATE VIEW V_arqTemplate AS 
	SELECT A0.IDPRIMARIO, A0.NOME, A0.TEMPLATE
	FROM arqTemplate A0;
commit;

RECREATE VIEW V_arqEmailRemet AS 
	SELECT A0.IDPRIMARIO, A0.EMAIL, A0.NOMEEMAIL, A0.PADRAO, A0.ATIVO
	FROM arqEmailRemet A0;
commit;

RECREATE VIEW V_arqAcaoEmail AS 
	SELECT A0.IDPRIMARIO, A0.TITULO, A0.VERSAO, A0.TIPOACAO, A1.CHAVE as TipoAcao_CHAVE, A1.DESCRITOR as TipoAcao_DESCRITOR, A0.TEMPLATE, A2.NOME as TEMPLATE_NOME, A0.PADRAOACAO, A3.CHAVE as PadraoAcao_CHAVE, A3.DESCRITOR as PadraoAcao_DESCRITOR, A0.ATIVO, A0.ARQUIVO, A0.Arquivo_ARQUIVO, A0.HTML, A0.IMAGEM, A4.CHAVE as Imagem_CHAVE, A4.DESCRITOR as Imagem_DESCRITOR, A0.IMAGEM_ARQUIVO, A0.LINK, A0.IMAGEMALT, A0.QTDTESTE
	FROM arqAcaoEmail A0
	left join tabTipoAcao A1 on A1.IDPRIMARIO=A0.TIPOACAO
	left join arqTemplate A2 on A2.IDPRIMARIO = A0.TEMPLATE
	left join tabPadraoAcao A3 on A3.IDPRIMARIO=A0.PADRAOACAO
	left join tabLanceTipoImg A4 on A4.IDPRIMARIO = A0.IMAGEM;
commit;

RECREATE VIEW V_arqImagemCRM AS 
	SELECT A0.IDPRIMARIO, A0.ACAOEMAIL, A1.TITULO as ACAOEMAIL_TITULO, A1.VERSAO as ACAOEMAIL_VERSAO, A0.NUMIMG, A0.NOME, A0.IMAGEM, A2.CHAVE as Imagem_CHAVE, A2.DESCRITOR as Imagem_DESCRITOR, A0.IMAGEM_ARQUIVO, A0.LINK
	FROM arqImagemCRM A0
	left join arqAcaoEmail A1 on A1.IDPRIMARIO = A0.ACAOEMAIL
	left join tabLanceTipoImg A2 on A2.IDPRIMARIO = A0.IMAGEM;
commit;

RECREATE VIEW V_arqLogEmail AS 
	SELECT A0.IDPRIMARIO, A0.TITULO, A1.TITULO as TITULO_TITULO, A1.VERSAO as TITULO_VERSAO, A0.DATA, A0.HORA, A0.USUARIO, A2.USUARIO as USUARIO_USUARIO, A0.ENVIADOS, A0.NENVIADOS, A0.TOTAL, A0.LIDOS, A0.PERCLIDOS, A0.EMAILREMET, A0.HORAINI, A0.HORAFIM, A0.HORAREENV, A0.ENVIOU, A0.OPCAO, A0.CLIENTE, A3.NOME as CLIENTE_NOME, A3.NUMCELULAR as CLIENTE_NUMCELULAR
	FROM arqLogEmail A0
	left join arqAcaoEmail A1 on A1.IDPRIMARIO = A0.TITULO
	left join arqUsuario A2 on A2.IDPRIMARIO = A0.USUARIO
	left join arqPessoa A3 on A3.IDPRIMARIO = A0.CLIENTE;
commit;

RECREATE VIEW V_arqItLogEmail AS 
	SELECT A0.IDPRIMARIO, A0.LOGEMAIL, A1.TITULO as LOGEMAIL_TITULO, A2.TITULO as LOGEMAIL_TITULO_TITULO, A2.VERSAO as LOGEMAIL_TITULO_VERSAO, A1.DATA as LOGEMAIL_DATA, A1.HORA as LOGEMAIL_HORA, A0.CLIENTE, A3.NOME as CLIENTE_NOME, A3.NUMCELULAR as CLIENTE_NUMCELULAR, A0.EMAIL, A0.ENVIADO, A0.LIDO, A0.LINKEMP, A0.LINKKM
	FROM arqItLogEmail A0
	left join arqLogEmail A1 on A1.IDPRIMARIO = A0.LOGEMAIL
	left join arqAcaoEmail A2 on A2.IDPRIMARIO = A1.TITULO
	left join arqPessoa A3 on A3.IDPRIMARIO = A0.CLIENTE;
commit;

RECREATE VIEW V_arqAvisos AS 
	SELECT A0.IDPRIMARIO, A0.NUMERO, A0.DATA, A0.HORA, A0.QUEM, A1.USUARIO as QUEM_USUARIO, A0.ASSUNTO, A0.PRIORIDADE, A2.CHAVE as Prioridade_CHAVE, A2.DESCRITOR as Prioridade_DESCRITOR, A0.TEXTO, A0.IDQUEM, A0.AVISOPAI, A3.NUMERO as AVISOPAI_NUMERO
	FROM arqAvisos A0
	left join arqUsuario A1 on A1.IDPRIMARIO = A0.QUEM
	left join tabPrioridade A2 on A2.IDPRIMARIO=A0.PRIORIDADE
	left join arqAvisos A3 on A3.IDPRIMARIO = A0.AVISOPAI;
commit;

RECREATE VIEW V_arqParaGrupo AS 
	SELECT A0.IDPRIMARIO, A0.AVISOS, A1.NUMERO as AVISOS_NUMERO, A0.GRUPO, A2.GRUPO as GRUPO_GRUPO, A0.USUARIO, A3.USUARIO as USUARIO_USUARIO
	FROM arqParaGrupo A0
	left join arqAvisos A1 on A1.IDPRIMARIO = A0.AVISOS
	left join arqGrupo A2 on A2.IDPRIMARIO = A0.GRUPO
	left join arqUsuario A3 on A3.IDPRIMARIO = A0.USUARIO;
commit;

RECREATE VIEW V_arqLido AS 
	SELECT A0.IDPRIMARIO, A0.AVISOS, A1.NUMERO as AVISOS_NUMERO, A0.USUARIO, A2.USUARIO as USUARIO_USUARIO, A0.GRUPO, A0.DATA
	FROM arqLido A0
	left join arqAvisos A1 on A1.IDPRIMARIO = A0.AVISOS
	left join arqUsuario A2 on A2.IDPRIMARIO = A0.USUARIO;
commit;

RECREATE VIEW V_cnfXConfig AS 
	SELECT A0.IDPRIMARIO, A0.CPF, A0.LOGACESSO, A0.LOGACESSOS, A0.QTD, A0.QTD2, A0.EMPRESA, A0.ENDE_CEP, A0.ENDE_ENDERECO, A0.ENDE_BAIRRO, A1.BAIRRO as ENDE_BAIRRO_BAIRRO, A0.ENDE_CIDADE, A2.UF as ENDE_CIDADE_UF, A3.CHAVE as ENDE_CIDADE_UF_CHAVE, A3.DESCRITOR as ENDE_CIDADE_UF_DESCRITOR, A2.CIDADE as ENDE_CIDADE_CIDADE, A0.ENDE_DDD, A0.ENDE_TELEFONE, A0.ENDE_DDDCELULAR, A0.ENDE_CELULAR, A0.ENDE_WHATSAPP, A0.CNPJ, A0.EMAIL, A0.SITE, A0.QTASDESMAR, A0.DECLINAR, A0.RECORDIA, A0.SUBPLARREC, A4.PLANO as SUBPLARREC_PLANO, A5.CODPLANO as SUBPLARREC_PLANO_CODPLANO, A5.PLANO as SUBPLARREC_PLANO_PLANO, A4.CODIGO as SUBPLARREC_CODIGO, A4.NOME as SUBPLARREC_NOME, A0.SUBPLARASS, A6.PLANO as SUBPLARASS_PLANO, A7.CODPLANO as SUBPLARASS_PLANO_CODPLANO, A7.PLANO as SUBPLARASS_PLANO_PLANO, A6.CODIGO as SUBPLARASS_CODIGO, A6.NOME as SUBPLARASS_NOME, A0.FORNREC, A8.NOME as FORNREC_NOME, A0.BOLETOMIN, A0.DIASSDENTR
	FROM cnfXConfig A0
	left join arqBairro A1 on A1.IDPRIMARIO = A0.ENDE_BAIRRO
	left join arqCidade A2 on A2.IDPRIMARIO = A0.ENDE_CIDADE
	left join tabUF A3 on A3.IDPRIMARIO=A2.UF
	left join arqSubPlano A4 on A4.IDPRIMARIO = A0.SUBPLARREC
	left join arqPlano A5 on A5.IDPRIMARIO = A4.PLANO
	left join arqSubPlano A6 on A6.IDPRIMARIO = A0.SUBPLARASS
	left join arqPlano A7 on A7.IDPRIMARIO = A6.PLANO
	left join arqFornecedor A8 on A8.IDPRIMARIO = A0.FORNREC;
commit;

RECREATE VIEW V_arqBanco AS 
	SELECT A0.IDPRIMARIO, A0.NUM, A0.BANCO
	FROM arqBanco A0;
commit;

RECREATE VIEW V_arqCCor AS 
	SELECT A0.IDPRIMARIO, A0.NOME, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.TCCOR, A2.CHAVE as TCCor_CHAVE, A2.DESCRITOR as TCCor_DESCRITOR, A0.BANCO, A3.NUM as BANCO_NUM, A3.BANCO as BANCO_BANCO, A0.AGENCIA, A0.DVAGENCIA, A0.CONTA, A0.DVCONTA, A0.CARTEIRA, A0.CODCEDENTE, A0.MULTA, A0.JUROS, A0.CBOLETO, A0.INSTRUCOES, A0.ULTREMESSA, A0.CONVENIO, A0.VARIACAO, A0.ATIVO, A0.TPIX1, A4.CHAVE as TPix1_CHAVE, A4.DESCRITOR as TPix1_DESCRITOR, A0.PIX1, A0.TPIX2, A5.CHAVE as TPix2_CHAVE, A5.DESCRITOR as TPix2_DESCRITOR, A0.PIX2, A0.TPIX3, A6.CHAVE as TPix3_CHAVE, A6.DESCRITOR as TPix3_DESCRITOR, A0.PIX3, A0.TPIX4, A7.CHAVE as TPix4_CHAVE, A7.DESCRITOR as TPix4_DESCRITOR, A0.PIX4, A0.TPIX5, A8.CHAVE as TPix5_CHAVE, A8.DESCRITOR as TPix5_DESCRITOR, A0.PIX5
	FROM arqCCor A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA
	left join tabTCCor A2 on A2.IDPRIMARIO=A0.TCCOR
	left join arqBanco A3 on A3.IDPRIMARIO = A0.BANCO
	left join tabTPix A4 on A4.IDPRIMARIO=A0.TPIX1
	left join tabTPix A5 on A5.IDPRIMARIO=A0.TPIX2
	left join tabTPix A6 on A6.IDPRIMARIO=A0.TPIX3
	left join tabTPix A7 on A7.IDPRIMARIO=A0.TPIX4
	left join tabTPix A8 on A8.IDPRIMARIO=A0.TPIX5;
commit;

RECREATE VIEW V_arqContPessoa AS 
	SELECT A0.IDPRIMARIO, A0.FORNECEDOR, A1.NOME as FORNECEDOR_NOME, A0.PESSOA, A2.NOME as PESSOA_NOME, A2.NUMCELULAR as PESSOA_NUMCELULAR, A0.NOME, A0.APELIDO, A0.FUNCAO, A0.CELULAR, A0.TELEFONE, A0.EMAIL, A0.RECEMAIL, A0.NASCIMENTO, A0.SEXO, A3.CHAVE as Sexo_CHAVE, A3.DESCRITOR as Sexo_DESCRITOR, A0.OBS, A0.ATIVO
	FROM arqContPessoa A0
	left join arqFornecedor A1 on A1.IDPRIMARIO = A0.FORNECEDOR
	left join arqPessoa A2 on A2.IDPRIMARIO = A0.PESSOA
	left join tabSexo A3 on A3.IDPRIMARIO=A0.SEXO;
commit;

RECREATE VIEW V_arqDocMod AS 
	SELECT A0.IDPRIMARIO, A0.DOCUMENTO, A0.TARQDOC, A1.CHAVE as TArqDoc_CHAVE, A1.DESCRITOR as TArqDoc_DESCRITOR, A0.TORDOC, A2.CHAVE as TOrDoc_CHAVE, A2.DESCRITOR as TOrDoc_DESCRITOR, A0.LOGO, A0.MARCA, A0.NOMEARQ, A0.RODAPE, A0.ALTRODAPE, A0.TEMPLATE, A3.NOME as TEMPLATE_NOME, A0.ATIVO, A0.HEADER, A0.Header_ARQUIVO, A0.ARQUIVO, A0.Arquivo_ARQUIVO, A0.FOOTER, A0.Footer_ARQUIVO, A0.HTML, A0.IMAGEM, A4.CHAVE as Imagem_CHAVE, A4.DESCRITOR as Imagem_DESCRITOR, A0.IMAGEM_ARQUIVO, A0.LISTA, A0.MARGEMESQ, A0.MARGEMDIR, A0.MARGEMTOP, A0.TPAPEL, A5.CHAVE as TPapel_CHAVE, A5.DESCRITOR as TPapel_DESCRITOR, A0.TORIENTA, A6.CHAVE as TOrienta_CHAVE, A6.DESCRITOR as TOrienta_DESCRITOR
	FROM arqDocMod A0
	left join tabTArqDoc A1 on A1.IDPRIMARIO=A0.TARQDOC
	left join tabTOrDoc A2 on A2.IDPRIMARIO=A0.TORDOC
	left join arqTemplate A3 on A3.IDPRIMARIO = A0.TEMPLATE
	left join tabLanceTipoImg A4 on A4.IDPRIMARIO = A0.IMAGEM
	left join tabTPapel A5 on A5.IDPRIMARIO=A0.TPAPEL
	left join tabTOrienta A6 on A6.IDPRIMARIO=A0.TORIENTA;
commit;

RECREATE VIEW V_cnfConfig AS 
	SELECT A0.IDPRIMARIO, A0.EMAIL, A0.AVISO, A0.DOCMOD
	FROM cnfConfig A0;
commit;

RECREATE VIEW V_arqPlano AS 
	SELECT A0.IDPRIMARIO, A0.CODPLANO, A0.PLANO, A0.TPGREC, A1.CHAVE as TPgRec_CHAVE, A1.DESCRITOR as TPgRec_DESCRITOR
	FROM arqPlano A0
	left join tabTPgRec A1 on A1.IDPRIMARIO=A0.TPGREC;
commit;

RECREATE VIEW V_arqSubPlano AS 
	SELECT A0.IDPRIMARIO, A0.PLANO, A1.CODPLANO as PLANO_CODPLANO, A1.PLANO as PLANO_PLANO, A0.CODIGO, A0.NOME
	FROM arqSubPlano A0
	left join arqPlano A1 on A1.IDPRIMARIO = A0.PLANO;
commit;

RECREATE VIEW V_arqIndexAtua AS 
	SELECT A0.IDPRIMARIO, A0.INDICE, A0.DATA, A0.DIAS, A0.DATAPROX, A0.ESTATIS
	FROM arqIndexAtua A0;
commit;

RECREATE VIEW V_arqMidia AS 
	SELECT A0.IDPRIMARIO, A0.MIDIA, A0.ATIVO
	FROM arqMidia A0;
commit;

RECREATE VIEW V_arqClinica AS 
	SELECT A0.IDPRIMARIO, A0.CLINICA, A0.RAZAO, A0.EMAIL, A0.CNPJ, A0.ENDE_CEP, A0.ENDE_ENDERECO, A0.ENDE_BAIRRO, A1.BAIRRO as ENDE_BAIRRO_BAIRRO, A0.ENDE_CIDADE, A2.UF as ENDE_CIDADE_UF, A3.CHAVE as ENDE_CIDADE_UF_CHAVE, A3.DESCRITOR as ENDE_CIDADE_UF_DESCRITOR, A2.CIDADE as ENDE_CIDADE_CIDADE, A0.ENDE_DDD, A0.ENDE_TELEFONE, A0.ENDE_DDDCELULAR, A0.ENDE_CELULAR, A0.ENDE_WHATSAPP, A0.TICONSULTA, A4.TICONSULTA as TICONSULTA_TICONSULTA, A0.DATAINI, A0.DATAFIM, A0.ATIVO, A0.MAXAGENDA, A0.SIGLA
	FROM arqClinica A0
	left join arqBairro A1 on A1.IDPRIMARIO = A0.ENDE_BAIRRO
	left join arqCidade A2 on A2.IDPRIMARIO = A0.ENDE_CIDADE
	left join tabUF A3 on A3.IDPRIMARIO=A2.UF
	left join arqTiConsulta A4 on A4.IDPRIMARIO = A0.TICONSULTA;
commit;

RECREATE VIEW V_arqPTrata AS 
	SELECT A0.IDPRIMARIO, A0.PTRATA, A0.APELIDO, A0.VALOR, A0.MRGDESC, A0.VALMINIMO, A0.COMPLEMEN, A0.ATIVO, A0.TEMPO
	FROM arqPTrata A0;
commit;

RECREATE VIEW V_arqConta AS 
	SELECT A0.IDPRIMARIO, A0.TRANSACAO, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.TPGREC, A2.CHAVE as TPgRec_CHAVE, A2.DESCRITOR as TPgRec_DESCRITOR, A0.FORNECEDOR, A3.NOME as FORNECEDOR_NOME, A0.PESSOA, A4.NOME as PESSOA_NOME, A4.NUMCELULAR as PESSOA_NUMCELULAR, A0.NOME, A0.TRGVALOR, A0.TRGVALLIQ, A0.TRGQTDPARC, A0.TRGQPARCPG, A0.PROXVENC, A0.TRGPAGO, A0.SALDO, A0.DOCUMENTO, A0.EMISSAO, A0.RECENVIA, A0.COMPETE, A0.HISTORICO, A0.ARQ1, A0.Arq1_ARQUIVO
	FROM arqConta A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA
	left join tabTPgRec A2 on A2.IDPRIMARIO=A0.TPGREC
	left join arqFornecedor A3 on A3.IDPRIMARIO = A0.FORNECEDOR
	left join arqPessoa A4 on A4.IDPRIMARIO = A0.PESSOA;
commit;

RECREATE VIEW V_arqParcela AS 
	SELECT A0.IDPRIMARIO, A0.CONTA, A1.TRANSACAO as CONTA_TRANSACAO, (Select V.Clinica_Clinica From v_arqConta V Where V.idPrimario = A0.Conta) as VCLINICA, (Select V.TPgRec_Descritor From v_arqConta V Where V.idPrimario=A0.Conta) as VTPGREC, CASE
	WHEN( (Select C.Fornecedor From arqConta C Where C.idPrimario=A0.Conta) is not null ) THEN( (Select F.Nome From arqConta C join arqFornecedor F on F.idPrimario=C.Fornecedor Where C.idPrimario=A0.Conta) )
	ELSE ( (Select P.Nome From arqConta C join arqPessoa P on P.idPrimario=C.Pessoa Where C.idPrimario=A0.Conta) )
	END  as VPESSOA, A0.PARCELA, A0.VENCIMENTO, A0.VENCEST, A0.VALOR, A0.VALORLIQ, A0.ESTIMADO, A0.TFCOBRA, A2.CHAVE as TFCobra_CHAVE, A2.DESCRITOR as TFCobra_DESCRITOR, A0.EMISSAO, A0.NUMBOLETO, A0.LINHADIG, A0.NOMEPDF, A0.CCOR, A3.NOME as CCOR_NOME, A0.SUBPLANO, A4.PLANO as SUBPLANO_PLANO, A5.CODPLANO as SUBPLANO_PLANO_CODPLANO, A5.PLANO as SUBPLANO_PLANO_PLANO, A4.CODIGO as SUBPLANO_CODIGO, A4.NOME as SUBPLANO_NOME, A0.DATAPAGTO, A0.DATACOMP, A0.TFPAGTO, A6.CHAVE as TFPagto_CHAVE, A6.DESCRITOR as TFPagto_DESCRITOR, A0.TDETPG, A7.CHAVE as TDetPg_CHAVE, A7.DESCRITOR as TDetPg_DESCRITOR, A0.FORMAPG, A8.FORMAPG as FORMAPG_FORMAPG, A0.CHEQUE, A0.ARQ1, A0.Arq1_ARQUIVO, A0.STRETORNO, A0.REMESSA, A0.DATAREM, (Select C.Historico From arqConta C Where C.idPrimario=A0.Conta) as VHISTCONTA, A0.HISTORICO
	FROM arqParcela A0
	left join arqConta A1 on A1.IDPRIMARIO = A0.CONTA
	left join tabTFCobra A2 on A2.IDPRIMARIO=A0.TFCOBRA
	left join arqCCor A3 on A3.IDPRIMARIO = A0.CCOR
	left join arqSubPlano A4 on A4.IDPRIMARIO = A0.SUBPLANO
	left join arqPlano A5 on A5.IDPRIMARIO = A4.PLANO
	left join tabTFPagto A6 on A6.IDPRIMARIO=A0.TFPAGTO
	left join tabTDetPg A7 on A7.IDPRIMARIO=A0.TDETPG
	left join arqFormaPg A8 on A8.IDPRIMARIO = A0.FORMAPG;
commit;

RECREATE VIEW V_arqUsuCli AS 
	SELECT A0.IDPRIMARIO, A0.USUARIO, A1.USUARIO as USUARIO_USUARIO, A0.CLINICA, A2.CLINICA as CLINICA_CLINICA
	FROM arqUsuCli A0
	left join arqUsuario A1 on A1.IDPRIMARIO = A0.USUARIO
	left join arqClinica A2 on A2.IDPRIMARIO = A0.CLINICA;
commit;

RECREATE VIEW V_arqProfissao AS 
	SELECT A0.IDPRIMARIO, A0.PROFISSAO, A0.ATIVO
	FROM arqProfissao A0;
commit;

RECREATE VIEW V_arqHoraBloq AS 
	SELECT A0.IDPRIMARIO, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.NOME, A0.DATAINI, A0.HORAINI, A0.DATAFIM, A0.HORAFIM, A0.MEDICO, A2.USUARIO as MEDICO_USUARIO
	FROM arqHoraBloq A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA
	left join arqUsuario A2 on A2.IDPRIMARIO = A0.MEDICO;
commit;

RECREATE VIEW V_arqDuracao AS 
	SELECT A0.IDPRIMARIO, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.INICIO, A0.HORAINI, A0.HORAFIM, A0.CONSSAB, A0.CONSDOM, A0.DURACAO
	FROM arqDuracao A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA;
commit;

RECREATE VIEW V_arqConsulta AS 
	SELECT A0.IDPRIMARIO, A0.NUM, A0.TICONSULTA, A1.TICONSULTA as TICONSULTA_TICONSULTA, A0.CLINICA, A2.CLINICA as CLINICA_CLINICA, A0.TSTCON, A3.CHAVE as TStCon_CHAVE, A3.DESCRITOR as TStCon_DESCRITOR, A0.TIAGENDA, A4.TIAGENDA as TIAGENDA_TIAGENDA, A0.DATA, A0.HORA, A0.HORACHEGA, A0.PESSOA, A5.NOME as PESSOA_NOME, A5.NUMCELULAR as PESSOA_NUMCELULAR, A0.PRONTUARIO, A0.MEDICO, A6.USUARIO as MEDICO_USUARIO, A0.ASSESSOR, A7.USUARIO as ASSESSOR_USUARIO, A0.CALLCENTER, A8.USUARIO as CALLCENTER_USUARIO, A0.MEDICAATUA, A0.TMOTIVO, A9.CHAVE as TMotivo_CHAVE, A9.DESCRITOR as TMotivo_DESCRITOR, A0.CORTESIA, A0.VALOR, A0.FORMAPG, A10.FORMAPG as FORMAPG_FORMAPG, A0.VALOR2, A0.FORMAPG2, A11.FORMAPG as FORMAPG2_FORMAPG, A0.PTRATA, A12.PTRATA as PTRATA_PTRATA, A0.VALPTRATA, A0.ENTRAFPG, A13.FORMAPG as ENTRAFPG_FORMAPG, A0.ENTRAVAL, A0.ENTRAPARCE, A0.ENTRAPARC, A0.SDENTRFPG, A14.FORMAPG as SDENTRFPG_FORMAPG, A0.SDVENC1PAR, A0.SDCOND, A0.ENTRAVALP, A0.ENTRATOTP, A0.ENTRATOTAL, A0.BOLETOMIN, A0.ENTRAOBS, A0.SALDOFPG, A15.FORMAPG as SALDOFPG_FORMAPG, A0.SALDOPARC, A0.SALDOCOND, A0.SALDOVAL, A0.SALDOOBS, A0.CONDUTA, A0.MEDICACAO, A0.OBS, A0.CONTACONS, A16.TRANSACAO as CONTACONS_TRANSACAO, A0.CONTAPTRA, A17.TRANSACAO as CONTAPTRA_TRANSACAO, A0.TRGQTDM, A0.TRGQTDMENT, A0.SALDO, A0.QUEMAGRET, A18.USUARIO as QUEMAGRET_USUARIO, A0.QDOAGRET, A0.DATARET, A0.DIARET, A0.HORARET, A0.TSTAGRET, A19.CHAVE as TStAgRet_CHAVE, A19.DESCRITOR as TStAgRet_DESCRITOR, A0.ASSESRET, A20.USUARIO as ASSESRET_USUARIO, A0.OBSRET
	FROM arqConsulta A0
	left join arqTiConsulta A1 on A1.IDPRIMARIO = A0.TICONSULTA
	left join arqClinica A2 on A2.IDPRIMARIO = A0.CLINICA
	left join tabTStCon A3 on A3.IDPRIMARIO=A0.TSTCON
	left join arqTiAgenda A4 on A4.IDPRIMARIO = A0.TIAGENDA
	left join arqPessoa A5 on A5.IDPRIMARIO = A0.PESSOA
	left join arqUsuario A6 on A6.IDPRIMARIO = A0.MEDICO
	left join arqUsuario A7 on A7.IDPRIMARIO = A0.ASSESSOR
	left join arqUsuario A8 on A8.IDPRIMARIO = A0.CALLCENTER
	left join tabTMotivo A9 on A9.IDPRIMARIO=A0.TMOTIVO
	left join arqFormaPg A10 on A10.IDPRIMARIO = A0.FORMAPG
	left join arqFormaPg A11 on A11.IDPRIMARIO = A0.FORMAPG2
	left join arqPTrata A12 on A12.IDPRIMARIO = A0.PTRATA
	left join arqFormaPg A13 on A13.IDPRIMARIO = A0.ENTRAFPG
	left join arqFormaPg A14 on A14.IDPRIMARIO = A0.SDENTRFPG
	left join arqFormaPg A15 on A15.IDPRIMARIO = A0.SALDOFPG
	left join arqConta A16 on A16.IDPRIMARIO = A0.CONTACONS
	left join arqConta A17 on A17.IDPRIMARIO = A0.CONTAPTRA
	left join arqUsuario A18 on A18.IDPRIMARIO = A0.QUEMAGRET
	left join tabTStAgRet A19 on A19.IDPRIMARIO=A0.TSTAGRET
	left join arqUsuario A20 on A20.IDPRIMARIO = A0.ASSESRET;
commit;

RECREATE VIEW V_arqPlantao AS 
	SELECT A0.IDPRIMARIO, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.DATAINI, A0.DATAFIM, A0.TDIASEM, A2.CHAVE as TDiaSem_CHAVE, A2.DESCRITOR as TDiaSem_DESCRITOR, A0.USUARIO, A3.USUARIO as USUARIO_USUARIO
	FROM arqPlantao A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA
	left join tabTDiaSem A2 on A2.IDPRIMARIO=A0.TDIASEM
	left join arqUsuario A3 on A3.IDPRIMARIO = A0.USUARIO;
commit;

RECREATE VIEW V_arqFornecedor AS 
	SELECT A0.IDPRIMARIO, A0.NOME, A0.APELIDO, A0.TPFPJ, A1.CHAVE as TPFPJ_CHAVE, A1.DESCRITOR as TPFPJ_DESCRITOR, A0.ENDE_CEP, A0.ENDE_ENDERECO, A0.ENDE_BAIRRO, A2.BAIRRO as ENDE_BAIRRO_BAIRRO, A0.ENDE_CIDADE, A3.UF as ENDE_CIDADE_UF, A4.CHAVE as ENDE_CIDADE_UF_CHAVE, A4.DESCRITOR as ENDE_CIDADE_UF_DESCRITOR, A3.CIDADE as ENDE_CIDADE_CIDADE, A0.ENDE_DDD, A0.ENDE_TELEFONE, A0.ENDE_DDDCELULAR, A0.ENDE_CELULAR, A0.ENDE_WHATSAPP, A0.CNPJ, A0.INSCESTAD, A0.INSCMUNIC, A0.CPF, A0.IDENTIDADE, A0.ORGAO, A0.EMISSAO, A0.ATIVO, A0.OBS, A0.DESDE
	FROM arqFornecedor A0
	left join tabTPFPJ A1 on A1.IDPRIMARIO=A0.TPFPJ
	left join arqBairro A2 on A2.IDPRIMARIO = A0.ENDE_BAIRRO
	left join arqCidade A3 on A3.IDPRIMARIO = A0.ENDE_CIDADE
	left join tabUF A4 on A4.IDPRIMARIO=A3.UF;
commit;

RECREATE VIEW V_arqTiAgenda AS 
	SELECT A0.IDPRIMARIO, A0.TIAGENDA, A0.ATIVO, A0.DOBROTEMPO, A0.PAGAMENTO, A0.MIDIA
	FROM arqTiAgenda A0;
commit;

RECREATE VIEW V_arqFormaPg AS 
	SELECT A0.IDPRIMARIO, A0.FORMAPG, A0.PODEENTRA, A0.DINHEIRO, A0.BOLETO, A0.CARTAO, A0.DIAS, A0.TAXADEB, A0.TAXA2, A0.TAXA3, A0.ATIVO
	FROM arqFormaPg A0;
commit;

RECREATE VIEW V_arqRecorrente AS 
	SELECT A0.IDPRIMARIO, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.FORNECEDOR, A2.NOME as FORNECEDOR_NOME, A0.PESSOA, A3.NOME as PESSOA_NOME, A3.NUMCELULAR as PESSOA_NUMCELULAR, A0.NOME, A0.TPGREC, A4.CHAVE as TPgRec_CHAVE, A4.DESCRITOR as TPgRec_DESCRITOR, A0.TCOMPETE, A5.CHAVE as TCompete_CHAVE, A5.DESCRITOR as TCompete_DESCRITOR, A0.VENC, A0.ANTECIPA, A0.VALOR, A0.ESTIMADO, A0.TFCOBRA, A6.CHAVE as TFCobra_CHAVE, A6.DESCRITOR as TFCobra_DESCRITOR, A0.HISTORICO, A0.SUBPLANO, A7.PLANO as SUBPLANO_PLANO, A8.CODPLANO as SUBPLANO_PLANO_CODPLANO, A8.PLANO as SUBPLANO_PLANO_PLANO, A7.CODIGO as SUBPLANO_CODIGO, A7.NOME as SUBPLANO_NOME, A0.ATIVO
	FROM arqRecorrente A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA
	left join arqFornecedor A2 on A2.IDPRIMARIO = A0.FORNECEDOR
	left join arqPessoa A3 on A3.IDPRIMARIO = A0.PESSOA
	left join tabTPgRec A4 on A4.IDPRIMARIO=A0.TPGREC
	left join tabTCompete A5 on A5.IDPRIMARIO=A0.TCOMPETE
	left join tabTFCobra A6 on A6.IDPRIMARIO=A0.TFCOBRA
	left join arqSubPlano A7 on A7.IDPRIMARIO = A0.SUBPLANO
	left join arqPlano A8 on A8.IDPRIMARIO = A7.PLANO;
commit;

RECREATE VIEW V_arqCliMidia AS 
	SELECT A0.IDPRIMARIO, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.MIDIA, A2.MIDIA as MIDIA_MIDIA, A0.ATIVO
	FROM arqCliMidia A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA
	left join arqMidia A2 on A2.IDPRIMARIO = A0.MIDIA;
commit;

RECREATE VIEW V_arqComCall AS 
	SELECT A0.IDPRIMARIO, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.MES, A0.TRGQTOFX
	FROM arqComCall A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA;
commit;

RECREATE VIEW V_arqFxComCall AS 
	SELECT A0.IDPRIMARIO, A0.COMCALL, A1.CLINICA as COMCALL_CLINICA, A2.CLINICA as COMCALL_CLINICA_CLINICA, A1.MES as COMCALL_MES, A0.FAIXA, A0.PERCATE, A0.COMISSAO
	FROM arqFxComCall A0
	left join arqComCall A1 on A1.IDPRIMARIO = A0.COMCALL
	left join arqClinica A2 on A2.IDPRIMARIO = A1.CLINICA;
commit;

RECREATE VIEW V_arqUnidade AS 
	SELECT A0.IDPRIMARIO, A0.UNIDADE, A0.ATIVO
	FROM arqUnidade A0;
commit;

RECREATE VIEW V_arqMedicamen AS 
	SELECT A0.IDPRIMARIO, A0.MEDICAMEN, A0.UNIDADE, A1.UNIDADE as UNIDADE_UNIDADE, A0.TRGITLOTE, A0.TRGCMLOTE, A0.ESTOQUE, A0.ATIVO
	FROM arqMedicamen A0
	left join arqUnidade A1 on A1.IDPRIMARIO = A0.UNIDADE;
commit;

RECREATE VIEW V_arqAgRet AS 
	SELECT A0.IDPRIMARIO, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.DATA, A0.DIA, A0.HORA, A0.CONSULTA, A2.NUM as CONSULTA_NUM, A0.PESSOA, A3.NOME as PESSOA_NOME, A3.NUMCELULAR as PESSOA_NUMCELULAR, A0.PRONTUARIO, A0.NOME, A0.NUMCELULAR, A0.TSTAGRET, A4.CHAVE as TStAgRet_CHAVE, A4.DESCRITOR as TStAgRet_DESCRITOR, A0.ASSESSOR, A5.USUARIO as ASSESSOR_USUARIO, A0.OBS
	FROM arqAgRet A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA
	left join arqConsulta A2 on A2.IDPRIMARIO = A0.CONSULTA
	left join arqPessoa A3 on A3.IDPRIMARIO = A0.PESSOA
	left join tabTStAgRet A4 on A4.IDPRIMARIO=A0.TSTAGRET
	left join arqUsuario A5 on A5.IDPRIMARIO = A0.ASSESSOR;
commit;

RECREATE VIEW V_arqCMedica AS 
	SELECT A0.IDPRIMARIO, A0.CONSULTA, A1.NUM as CONSULTA_NUM, A0.MEDICAMEN, A2.MEDICAMEN as MEDICAMEN_MEDICAMEN, A0.UNIDADECAL, A0.QTD, A0.LOTE, A3.MEDICAMEN as LOTE_MEDICAMEN, A4.MEDICAMEN as LOTE_MEDICAMEN_MEDICAMEN, A3.LOTE as LOTE_LOTE, A0.DATASEPARA, A0.QTDENTREG, A0.SALDO, A0.OBSENTREG
	FROM arqCMedica A0
	left join arqConsulta A1 on A1.IDPRIMARIO = A0.CONSULTA
	left join arqMedicamen A2 on A2.IDPRIMARIO = A0.MEDICAMEN
	left join arqLote A3 on A3.IDPRIMARIO = A0.LOTE
	left join arqMedicamen A4 on A4.IDPRIMARIO = A3.MEDICAMEN;
commit;

RECREATE VIEW V_arqLote AS 
	SELECT A0.IDPRIMARIO, A0.MEDICAMEN, A1.MEDICAMEN as MEDICAMEN_MEDICAMEN, A0.LOTE, A0.CLINICA, A2.CLINICA as CLINICA_CLINICA, A0.FORNECEDOR, A3.NOME as FORNECEDOR_NOME, A0.FABRICA, A0.VALIDADE, A0.TRGITMOV, A0.TRGCMEDICA, A0.ESTOQUE, A0.ATIVO
	FROM arqLote A0
	left join arqMedicamen A1 on A1.IDPRIMARIO = A0.MEDICAMEN
	left join arqClinica A2 on A2.IDPRIMARIO = A0.CLINICA
	left join arqFornecedor A3 on A3.IDPRIMARIO = A0.FORNECEDOR;
commit;

RECREATE VIEW V_arqMovEstoque AS 
	SELECT A0.IDPRIMARIO, A0.NUM, A0.DATA, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.FORNECEDOR, A2.NOME as FORNECEDOR_NOME, A0.NUMDOC, A0.OBS, A0.FECHADO
	FROM arqMovEstoque A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA
	left join arqFornecedor A2 on A2.IDPRIMARIO = A0.FORNECEDOR;
commit;

RECREATE VIEW V_arqItemMov AS 
	SELECT A0.IDPRIMARIO, A0.MOVESTOQUE, A1.NUM as MOVESTOQUE_NUM, A0.ITEM, A0.LOTE, A2.MEDICAMEN as LOTE_MEDICAMEN, A3.MEDICAMEN as LOTE_MEDICAMEN_MEDICAMEN, A2.LOTE as LOTE_LOTE, A0.TMOV, A4.CHAVE as TMov_CHAVE, A4.DESCRITOR as TMov_DESCRITOR, A0.QTD, A0.QTDCALC, A0.CUNIDADE
	FROM arqItemMov A0
	left join arqMovEstoque A1 on A1.IDPRIMARIO = A0.MOVESTOQUE
	left join arqLote A2 on A2.IDPRIMARIO = A0.LOTE
	left join arqMedicamen A3 on A3.IDPRIMARIO = A2.MEDICAMEN
	left join tabTMov A4 on A4.IDPRIMARIO=A0.TMOV;
commit;

RECREATE VIEW V_arqUsuCCor AS 
	SELECT A0.IDPRIMARIO, A0.USUARIO, A1.USUARIO as USUARIO_USUARIO, A0.CCOR, A2.NOME as CCOR_NOME
	FROM arqUsuCCor A0
	left join arqUsuario A1 on A1.IDPRIMARIO = A0.USUARIO
	left join arqCCor A2 on A2.IDPRIMARIO = A0.CCOR;
commit;

RECREATE VIEW V_arqTiConsulta AS 
	SELECT A0.IDPRIMARIO, A0.TICONSULTA, A0.ATIVO
	FROM arqTiConsulta A0;
commit;


/************************************************************
	ARQUIVO DE PERMISSÕES
************************************************************/

CREATE TABLE ARQLANCEPERMISSAO
(
	IDPRIMARIO chavePrimaria,
	Operacao ligadoComArquivo,
	Grupo ligadoComArquivo,
	Usuario ligadoComArquivo,
	PodeConsultar campoLogico,
	PodeVerFrm campoLogico,
	PodeIncluir campoLogico,
	PodeAlterar campoLogico,
	PodeExcluir campoLogico,
	PodeMarcar campoLogico,
	PodeImprimir campoLogico,
	PodeExportar campoLogico,
	CONSTRAINT ArqLancePermissao_PK PRIMARY KEY( IDPRIMARIO )
);
commit;

ALTER TABLE ARQLANCEPERMISSAO ADD CONSTRAINT ARQLANCEPERMISSAO_FK_OPERACAO FOREIGN KEY ( OPERACAO ) REFERENCES ARQLANCEOPERACAO ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE ARQLANCEPERMISSAO ADD CONSTRAINT ARQLANCEPERMISSAO_FK_Usuario FOREIGN KEY ( Usuario ) REFERENCES ARQUsuario ON DELETE CASCADE ON UPDATE CASCADE;

/************************************************************
	ASSUNTOS
************************************************************/

insert into arqLanceAssunto values (1,'Cadastros' );
insert into arqLanceAssunto values (2,'Estoque' );
insert into arqLanceAssunto values (10,'Financeiro' );
insert into arqLanceAssunto values (20,'Emails' );
insert into arqLanceAssunto values (50,'Relatórios' );
insert into arqLanceAssunto values (85,'Avisos Internos' );
insert into arqLanceAssunto values (90,'Manutenção' );
insert into arqLanceAssunto values (99,'Supervisor' );

/************************************************************
	PERMISSÕES
************************************************************/

insert into arqLanceOperacao values(100001,1,'Cadastro de bairros','arqBairro',1,1,0,'');
insert into arqLanceOperacao values(100002,1,'Cadastro de cidades','arqCidade',2,1,0,'');
insert into arqLanceOperacao values(100004,1,'Cadastro de grupos de acesso','arqGrupo',4,90,0,'');
insert into arqLanceOperacao values(100005,1,'Cadastro de usuários','arqUsuario',5,90,0,'');
insert into arqLanceOperacao values(100007,1,'Cadastro de pacientes','arqPessoa',7,1,0,'');
insert into arqLanceOperacao values(100008,1,'Cadastro de templates de ações de email','arqTemplate',8,20,0,'');
insert into arqLanceOperacao values(100009,1,'Cadastro de emails remetentes','arqEmailRemet',9,20,0,'');
insert into arqLanceOperacao values(100010,1,'Cadastro de ações de email','arqAcaoEmail',10,20,0,'');
insert into arqLanceOperacao values(100011,1,'Cadastro de imagens de ações de email','arqImagemCRM',11,20,0,'');
insert into arqLanceOperacao values(100012,1,'Cadastro das programações e registros de emails enviados','arqLogEmail',12,20,0,'');
insert into arqLanceOperacao values(100013,1,'Cadastro de destinatário de emails enviados','arqItLogEmail',13,20,0,'');
insert into arqLanceOperacao values(100014,1,'Cadastro de avisos internos','arqAvisos',14,85,0,'');
insert into arqLanceOperacao values(100015,1,'Cadastro de Para de avisos internos','arqParaGrupo',15,85,0,'');
insert into arqLanceOperacao values(100016,1,'Cadastro de avisos internos lidos','arqLido',16,85,0,'');
insert into arqLanceOperacao values(100017,1,'Cadastro do configurador geral do sistema','cnfXConfig',17,90,0,'');
insert into arqLanceOperacao values(100019,1,'Cadastro de bancos','arqBanco',19,1,0,'');
insert into arqLanceOperacao values(100020,1,'Cadastro de contas correntes da empresa','arqCCor',20,1,0,'');
insert into arqLanceOperacao values(100021,1,'Cadastro dos contatos das pessoas','arqContPessoa',21,1,0,'');
insert into arqLanceOperacao values(100022,1,'Cadastro de modelo de documentos','arqDocMod',22,1,0,'');
insert into arqLanceOperacao values(100025,1,'Acesso ao Config','cnfConfig',25,99,1,'');
insert into arqLanceOperacao values(100027,1,'Cadastro de planos de contas','arqPlano',27,10,0,'');
insert into arqLanceOperacao values(100028,1,'Cadastro de subplanos de contas','arqSubPlano',28,10,0,'');
insert into arqLanceOperacao values(100029,1,'Cadastro de atualizações de índices','arqIndexAtua',29,99,1,'');
insert into arqLanceOperacao values(100030,1,'Cadastro de mídias','arqMidia',30,1,0,'');
insert into arqLanceOperacao values(100031,1,'Cadastro das clínicas','arqClinica',31,1,0,'');
insert into arqLanceOperacao values(100032,1,'Cadastro de planos de tratamento','arqPTrata',32,1,0,'');
insert into arqLanceOperacao values(100033,1,'Cadastro de contas a pagar e a receber','arqConta',33,10,0,'');
insert into arqLanceOperacao values(100034,1,'Cadastro de parcelas de contas a pagar e a reecber','arqParcela',34,10,0,'');
insert into arqLanceOperacao values(100035,1,'Cadastro da relação entre usuários e clínicas','arqUsuCli',35,90,0,'');
insert into arqLanceOperacao values(100036,1,'Cadastro de profissões','arqProfissao',36,1,0,'');
insert into arqLanceOperacao values(100037,1,'Cadastro de horários bloqueados nas clínicas','arqHoraBloq',37,1,0,'');
insert into arqLanceOperacao values(100038,1,'Cadastro de duração de uma consulta do médico','arqDuracao',38,1,0,'');
insert into arqLanceOperacao values(100039,1,'Cadastro de consultas','arqConsulta',39,1,0,'');
insert into arqLanceOperacao values(100041,1,'Cadastro de plantonistas nas clínicas','arqPlantao',41,1,0,'');
insert into arqLanceOperacao values(100042,1,'Cadastro de fornecedores','arqFornecedor',42,1,0,'');
insert into arqLanceOperacao values(100043,1,'Cadastro de tipos de agendas [0]','arqTiAgenda',43,99,1,'');
insert into arqLanceOperacao values(100044,1,'Cadastro de formas de pagamento de consultas','arqFormaPg',44,1,0,'');
insert into arqLanceOperacao values(100046,1,'Cadastro de contas recorrentes a pagar e a receber','arqRecorrente',46,10,0,'');
insert into arqLanceOperacao values(100047,1,'Cadastro da relação de mídias e clínicas','arqCliMidia',47,1,0,'');
insert into arqLanceOperacao values(100049,1,'Cadastro de comissionamento do Call Center','arqComCall',49,1,0,'');
insert into arqLanceOperacao values(100050,1,'Cadastro das faixas de comissionamento do Call Center','arqFxComCall',50,1,0,'');
insert into arqLanceOperacao values(100051,1,'Cadastro de unidades de medidas','arqUnidade',51,2,0,'');
insert into arqLanceOperacao values(100052,1,'Cadastro de medicamentos','arqMedicamen',52,1,0,'');
insert into arqLanceOperacao values(100053,1,'Cadastro das agendas de retirada de medicação','arqAgRet',53,99,1,'');
insert into arqLanceOperacao values(100054,1,'Cadastro as medicação da consulta','arqCMedica',54,1,0,'');
insert into arqLanceOperacao values(100055,1,'Cadastro de lotes de medicamentos','arqLote',55,2,0,'');
insert into arqLanceOperacao values(100056,1,'Cadastro de movimentos de estoque','arqMovEstoque',56,2,0,'');
insert into arqLanceOperacao values(100057,1,'Cadastro de itens de movimento de estoque','arqItemMov',57,2,0,'');
insert into arqLanceOperacao values(100059,1,'Cadastro da relação entre usuários e contas correntes','arqUsuCCor',59,90,0,'');
insert into arqLanceOperacao values(100060,1,'Cadastro de tipos de consultas','arqTiConsulta',60,99,1,'');
insert into arqLanceOperacao values(200193,2,'Rotina para excluir permissões de grupos de acesso','',193,null,0,'');
insert into arqLanceOperacao values(200009,2,'Rotina para criar ou alterar permissões de grupos de acesso','',9,90,0,'');
insert into arqLanceOperacao values(200010,2,'Rotina para copiar permisões de grupos de acesso','',10,90,0,'');
insert into arqLanceOperacao values(200011,2,'Rotina para excluir permissões de grupos de acesso','',11,90,0,'');
insert into arqLanceOperacao values(200019,2,'Rotina para envio de teste de ação de email','',19,20,0,'');
insert into arqLanceOperacao values(200020,2,'Visualizar ação de email','',20,20,0,'');
insert into arqLanceOperacao values(200175,2,'Relatório da relação de consultas','',175,50,0,'');
insert into arqLanceOperacao values(200203,2,'Relatório das agendas de retirada de medicação por dia','',203,50,0,'');
insert into arqLanceOperacao values(200190,2,'Relatório de comissionamento do Call Center','',190,50,0,'');
insert into arqLanceOperacao values(200258,2,'Relatório da relação de consultas com valores','',258,50,0,'');
insert into arqLanceOperacao values(200170,2,'Relatório de consultas dispensadas por médicos','',170,50,0,'');
insert into arqLanceOperacao values(200030,2,'Rotina para ver as operações do sistema','',30,null,0,'');
insert into arqLanceOperacao values(200038,2,'Relatório avisos internos','',38,50,0,'');
insert into arqLanceOperacao values(200039,2,'Relatório de avisos internos lidos','',39,50,0,'');
insert into arqLanceOperacao values(200041,2,'Rotina para ver as operações do sistema','',41,90,0,'');
insert into arqLanceOperacao values(200040,2,'Acesso ao configurador geral do sistema','',40,90,0,'');
insert into arqLanceOperacao values(200053,2,'Rotina para programar envio de ações de email','',53,20,0,'');
insert into arqLanceOperacao values(200234,2,'Envia o m_cmedica_separado','',234,99,1,'');
insert into arqLanceOperacao values(200169,2,'Envia o m_clinica_ativa','',169,99,1,'');
insert into arqLanceOperacao values(200242,2,'Envia o m_clinica_consulta_ativa','',242,99,1,'');
insert into arqLanceOperacao values(200167,2,'Envia o m_parcela_padrao Hojes','',167,99,1,'');
insert into arqLanceOperacao values(200168,2,'Envia o m_parcela_aberta','',168,99,1,'');
insert into arqLanceOperacao values(200055,2,'Envio de emails programados','',55,99,1,'');
insert into arqLanceOperacao values(200047,2,'Rotina de envio de email Log Acesso','',47,99,1,'');
insert into arqLanceOperacao values(200071,2,'Rotina de envio de email Log Acesso Semanal','',71,99,1,'');
insert into arqLanceOperacao values(200052,2,'Rotina de envio de m_logemail_mensal','',52,99,1,'');
insert into arqLanceOperacao values(200054,2,'Rotina de envio de email para clientes aniversariantes','',54,99,1,'');
insert into arqLanceOperacao values(200048,2,'Rotina de envio de email Funcionário Niver Dia','',48,99,1,'');
insert into arqLanceOperacao values(200049,2,'Rotina de envio de email Avisa Niver Dia','',49,99,1,'');
insert into arqLanceOperacao values(200028,2,'Relatório de log de acessos ao sistema','',28,90,0,'');
insert into arqLanceOperacao values(200107,2,'Rotina para alterar as senhas dos usuários','',107,null,0,'');
insert into arqLanceOperacao values(200254,2,'Rotina para atualizar o vencimento','',254,99,1,'');
insert into arqLanceOperacao values(200163,2,'Rotina para criar contas recorrentes','',163,99,1,'');
insert into arqLanceOperacao values(200083,2,'Rotina para reindexar os índices','',83,99,1,'');
insert into arqLanceOperacao values(200073,2,'Relatório analítico de interações no sistema','',73,90,0,'');
insert into arqLanceOperacao values(200074,2,'Relatório resumido de interações no sistema','',74,90,0,'');
insert into arqLanceOperacao values(200129,2,'Rotina para baixar parcelas','',129,10,0,'');
insert into arqLanceOperacao values(200068,2,'Rotina para alterar as senhas dos usuários','',68,90,0,'');
insert into arqLanceOperacao values(200151,2,'Rotina para gerar plantões médicos','',151,1,0,'');
insert into arqLanceOperacao values(200130,2,'Rotina para criar conta e parcelas pelo menu Financeiro','',130,10,0,'');
insert into arqLanceOperacao values(200162,2,'Gerar conta e parcela de recorrentes','',162,10,0,'');
insert into arqLanceOperacao values(200061,2,'Rotina 1','',61,99,1,'GrupoAtualEm()');
insert into arqLanceOperacao values(200056,2,'Relatório resumido de emails enviados','',56,50,0,'cnfConfig["EMAIL"] == 1');
insert into arqLanceOperacao values(200166,2,'Relatório de parcelas de contas a pagar e a receber pelo menu Relatórios','',166,50,0,'');
insert into arqLanceOperacao values(200176,2,'Rotina para criar Saída de caixa da Recepção','',176,10,0,'');
insert into arqLanceOperacao values(200177,2,'Rotina para criar Entrada de caixa da Recepção','',177,10,0,'');
insert into arqLanceOperacao values(200180,2,'Rotina para criar Saída de caixa de Assesor','',180,10,0,'');
insert into arqLanceOperacao values(200181,2,'Rotina para criar Entrada de caixa de Assesor','',181,10,0,'');
insert into arqLanceOperacao values(200189,2,'Rotina para copiar Comissão do Call Center','',189,1,0,'');
insert into arqLanceOperacao values(200184,2,'Rotina para criar o a receber de tratamento de uma consulta','',184,10,0,'');
insert into arqLanceOperacao values(200191,2,'Relatório do contrato de uma consulta','',191,50,0,'');
insert into arqLanceOperacao values(200249,2,'Rotina para criar aviso de que pode agendar a retirada da medicação','',249,1,0,'');
insert into arqLanceOperacao values(200156,2,'Rotina para informar que o paciente chegou','',156,null,0,'');
insert into arqLanceOperacao values(200256,2,'Rotina para excluir pessoas que tenham histórico de atividades - relação','',256,null,0,'');
insert into arqLanceOperacao values(200220,2,'Rotina para fechar um movimento de estoque','',220,2,0,'');
insert into arqLanceOperacao values(200221,2,'Rotina para abrir um movimento de estoque','',221,2,0,'');
insert into arqLanceOperacao values(200223,2,'Relatório analítico de medicação prescrita','',223,50,0,'');
insert into arqLanceOperacao values(200226,2,'Relatório de lotes por validade','',226,50,0,'');
insert into arqLanceOperacao values(200225,2,'Relatório de posição de estoque','',225,50,0,'');
insert into arqLanceOperacao values(200230,2,'Relatório resumido de medicação prescrita','',230,50,0,'');
insert into arqLanceOperacao values(200233,2,'Relatório das agendas de retirada de medicação por quem agendou','',233,50,0,'');
insert into arqLanceOperacao values(200236,2,'Rotina para dividir uma parcela','',236,10,0,'');
insert into arqLanceOperacao values(200237,2,'Rotina para criar transferências entre contas','',237,10,0,'');
insert into arqLanceOperacao values(200137,2,'Rotina para informar que o paciente chegou','',137,1,0,'GrupoAtualEm()');
insert into arqLanceOperacao values(200253,2,'Rotina para excluir pessoas que tenham histórico de atividades - relação','',253,90,0,'');
insert into arqLanceOperacao values(200257,2,'Relatório de hístorico de estoque','',257,50,0,'');
insert into arqLanceOperacao values(300001,3,'Pode ver todos os avisos internos?','',1,85,0,'');
insert into arqLanceOperacao values(300002,3,'Pode alterar campos de login?','',2,90,0,'');
insert into arqLanceOperacao values(300003,3,'Pode alterar o campo de quantas desmarcações um paciente efetuou?','',3,1,0,'');
insert into arqLanceOperacao values(300004,3,'Gravação pelo Portal da Agenda','',4,99,1,'');
insert into arqLanceOperacao values(300005,3,'Pode alterar campos de separação de medicação da consulta - Estoque?','',5,1,0,'');


/************************************************************
	CAMPOS LIGADOS - FOREIGN KEYS
************************************************************/

ALTER TABLE arqCidade ADD CONSTRAINT arqCidade_FK_UF FOREIGN KEY ( UF ) REFERENCES tabUF ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqPessoa ADD CONSTRAINT arqPessoa_FK_Ende_Bairro FOREIGN KEY ( ENDE_BAIRRO ) REFERENCES arqBairro ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE cnfXConfig ADD CONSTRAINT cnfXConfig_FK_Ende_Bairro FOREIGN KEY ( ENDE_BAIRRO ) REFERENCES arqBairro ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqClinica ADD CONSTRAINT arqClinica_FK_Ende_Bairro FOREIGN KEY ( ENDE_BAIRRO ) REFERENCES arqBairro ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqFornecedor ADD CONSTRAINT arqFornecedor_FK_Ende_Bairro FOREIGN KEY ( ENDE_BAIRRO ) REFERENCES arqBairro ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqPessoa ADD CONSTRAINT arqPessoa_FK_Ende_Cidade FOREIGN KEY ( ENDE_CIDADE ) REFERENCES arqCidade ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE cnfXConfig ADD CONSTRAINT cnfXConfig_FK_Ende_Cidade FOREIGN KEY ( ENDE_CIDADE ) REFERENCES arqCidade ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqClinica ADD CONSTRAINT arqClinica_FK_Ende_Cidade FOREIGN KEY ( ENDE_CIDADE ) REFERENCES arqCidade ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqFornecedor ADD CONSTRAINT arqFornecedor_FK_Ende_Cidade FOREIGN KEY ( ENDE_CIDADE ) REFERENCES arqCidade ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqUsuario ADD CONSTRAINT arqUsuario_FK_Grupo FOREIGN KEY ( GRUPO ) REFERENCES arqGrupo ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqPessoa ADD CONSTRAINT arqPessoa_FK_Sexo FOREIGN KEY ( SEXO ) REFERENCES tabSexo ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqPessoa ADD CONSTRAINT arqPessoa_FK_EstCivil FOREIGN KEY ( ESTCIVIL ) REFERENCES tabEstCivil ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqPessoa ADD CONSTRAINT arqPessoa_FK_Profissao FOREIGN KEY ( PROFISSAO ) REFERENCES arqProfissao ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqAcaoEmail ADD CONSTRAINT arqAcaoEmail_FK_TipoAcao FOREIGN KEY ( TIPOACAO ) REFERENCES tabTipoAcao ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqAcaoEmail ADD CONSTRAINT arqAcaoEmail_FK_Template FOREIGN KEY ( TEMPLATE ) REFERENCES arqTemplate ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqAcaoEmail ADD CONSTRAINT arqAcaoEmail_FK_PadraoAcao FOREIGN KEY ( PADRAOACAO ) REFERENCES tabPadraoAcao ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqImagemCRM ADD CONSTRAINT arqImagemCRM_FK_AcaoEmail FOREIGN KEY ( ACAOEMAIL ) REFERENCES arqAcaoEmail ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqLogEmail ADD CONSTRAINT arqLogEmail_FK_Titulo FOREIGN KEY ( TITULO ) REFERENCES arqAcaoEmail ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqLogEmail ADD CONSTRAINT arqLogEmail_FK_Usuario FOREIGN KEY ( USUARIO ) REFERENCES arqUsuario ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqItLogEmail ADD CONSTRAINT arqItLogEmail_FK_LogEmail FOREIGN KEY ( LOGEMAIL ) REFERENCES arqLogEmail ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqItLogEmail ADD CONSTRAINT arqItLogEmail_FK_Cliente FOREIGN KEY ( CLIENTE ) REFERENCES arqPessoa ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqLogEmail ADD CONSTRAINT arqLogEmail_FK_Cliente FOREIGN KEY ( CLIENTE ) REFERENCES arqPessoa ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqAvisos ADD CONSTRAINT arqAvisos_FK_Quem FOREIGN KEY ( QUEM ) REFERENCES arqUsuario ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqAvisos ADD CONSTRAINT arqAvisos_FK_Prioridade FOREIGN KEY ( PRIORIDADE ) REFERENCES tabPrioridade ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqParaGrupo ADD CONSTRAINT arqParaGrupo_FK_Avisos FOREIGN KEY ( AVISOS ) REFERENCES arqAvisos ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqParaGrupo ADD CONSTRAINT arqParaGrupo_FK_Grupo FOREIGN KEY ( GRUPO ) REFERENCES arqGrupo ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqLido ADD CONSTRAINT arqLido_FK_Avisos FOREIGN KEY ( AVISOS ) REFERENCES arqAvisos ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqLido ADD CONSTRAINT arqLido_FK_Usuario FOREIGN KEY ( USUARIO ) REFERENCES arqUsuario ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqParaGrupo ADD CONSTRAINT arqParaGrupo_FK_Usuario FOREIGN KEY ( USUARIO ) REFERENCES arqUsuario ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqCCor ADD CONSTRAINT arqCCor_FK_Clinica FOREIGN KEY ( CLINICA ) REFERENCES arqClinica ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqCCor ADD CONSTRAINT arqCCor_FK_TCCor FOREIGN KEY ( TCCOR ) REFERENCES tabTCCor ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqCCor ADD CONSTRAINT arqCCor_FK_Banco FOREIGN KEY ( BANCO ) REFERENCES arqBanco ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqAvisos ADD CONSTRAINT arqAvisos_FK_AvisoPai FOREIGN KEY ( AVISOPAI ) REFERENCES arqAvisos ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqDocMod ADD CONSTRAINT arqDocMod_FK_TArqDoc FOREIGN KEY ( TARQDOC ) REFERENCES tabTArqDoc ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqDocMod ADD CONSTRAINT arqDocMod_FK_TOrDoc FOREIGN KEY ( TORDOC ) REFERENCES tabTOrDoc ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqDocMod ADD CONSTRAINT arqDocMod_FK_Template FOREIGN KEY ( TEMPLATE ) REFERENCES arqTemplate ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqDocMod ADD CONSTRAINT arqDocMod_FK_TPapel FOREIGN KEY ( TPAPEL ) REFERENCES tabTPapel ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqDocMod ADD CONSTRAINT arqDocMod_FK_TOrienta FOREIGN KEY ( TORIENTA ) REFERENCES tabTOrienta ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqContPessoa ADD CONSTRAINT arqContPessoa_FK_Fornecedor FOREIGN KEY ( FORNECEDOR ) REFERENCES arqFornecedor ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqContPessoa ADD CONSTRAINT arqContPessoa_FK_Pessoa FOREIGN KEY ( PESSOA ) REFERENCES arqPessoa ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqContPessoa ADD CONSTRAINT arqContPessoa_FK_Sexo FOREIGN KEY ( SEXO ) REFERENCES tabSexo ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqCCor ADD CONSTRAINT arqCCor_FK_TPix1 FOREIGN KEY ( TPIX1 ) REFERENCES tabTPix ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqCCor ADD CONSTRAINT arqCCor_FK_TPix2 FOREIGN KEY ( TPIX2 ) REFERENCES tabTPix ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqCCor ADD CONSTRAINT arqCCor_FK_TPix3 FOREIGN KEY ( TPIX3 ) REFERENCES tabTPix ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqCCor ADD CONSTRAINT arqCCor_FK_TPix4 FOREIGN KEY ( TPIX4 ) REFERENCES tabTPix ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqCCor ADD CONSTRAINT arqCCor_FK_TPix5 FOREIGN KEY ( TPIX5 ) REFERENCES tabTPix ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqPlano ADD CONSTRAINT arqPlano_FK_TPgRec FOREIGN KEY ( TPGREC ) REFERENCES tabTPgRec ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqSubPlano ADD CONSTRAINT arqSubPlano_FK_Plano FOREIGN KEY ( PLANO ) REFERENCES arqPlano ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqClinica ADD CONSTRAINT arqClinica_FK_TiConsulta FOREIGN KEY ( TICONSULTA ) REFERENCES arqTiConsulta ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqConta ADD CONSTRAINT arqConta_FK_Clinica FOREIGN KEY ( CLINICA ) REFERENCES arqClinica ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqConta ADD CONSTRAINT arqConta_FK_TPgRec FOREIGN KEY ( TPGREC ) REFERENCES tabTPgRec ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqConta ADD CONSTRAINT arqConta_FK_Fornecedor FOREIGN KEY ( FORNECEDOR ) REFERENCES arqFornecedor ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqParcela ADD CONSTRAINT arqParcela_FK_Conta FOREIGN KEY ( CONTA ) REFERENCES arqConta ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqParcela ADD CONSTRAINT arqParcela_FK_TFCobra FOREIGN KEY ( TFCOBRA ) REFERENCES tabTFCobra ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqParcela ADD CONSTRAINT arqParcela_FK_CCor FOREIGN KEY ( CCOR ) REFERENCES arqCCor ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqParcela ADD CONSTRAINT arqParcela_FK_SubPlano FOREIGN KEY ( SUBPLANO ) REFERENCES arqSubPlano ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqParcela ADD CONSTRAINT arqParcela_FK_TFPagto FOREIGN KEY ( TFPAGTO ) REFERENCES tabTFPagto ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqParcela ADD CONSTRAINT arqParcela_FK_TDetPg FOREIGN KEY ( TDETPG ) REFERENCES tabTDetPg ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqParcela ADD CONSTRAINT arqParcela_FK_FormaPg FOREIGN KEY ( FORMAPG ) REFERENCES arqFormaPg ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqConta ADD CONSTRAINT arqConta_FK_Pessoa FOREIGN KEY ( PESSOA ) REFERENCES arqPessoa ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqUsuCli ADD CONSTRAINT arqUsuCli_FK_Usuario FOREIGN KEY ( USUARIO ) REFERENCES arqUsuario ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqUsuCli ADD CONSTRAINT arqUsuCli_FK_Clinica FOREIGN KEY ( CLINICA ) REFERENCES arqClinica ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_TiConsulta FOREIGN KEY ( TICONSULTA ) REFERENCES arqTiConsulta ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_Clinica FOREIGN KEY ( CLINICA ) REFERENCES arqClinica ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqHoraBloq ADD CONSTRAINT arqHoraBloq_FK_Clinica FOREIGN KEY ( CLINICA ) REFERENCES arqClinica ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqDuracao ADD CONSTRAINT arqDuracao_FK_Clinica FOREIGN KEY ( CLINICA ) REFERENCES arqClinica ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_TStCon FOREIGN KEY ( TSTCON ) REFERENCES tabTStCon ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_TiAgenda FOREIGN KEY ( TIAGENDA ) REFERENCES arqTiAgenda ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_Pessoa FOREIGN KEY ( PESSOA ) REFERENCES arqPessoa ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_Medico FOREIGN KEY ( MEDICO ) REFERENCES arqUsuario ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_Assessor FOREIGN KEY ( ASSESSOR ) REFERENCES arqUsuario ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqPessoa ADD CONSTRAINT arqPessoa_FK_Midia FOREIGN KEY ( MIDIA ) REFERENCES arqMidia ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_CallCenter FOREIGN KEY ( CALLCENTER ) REFERENCES arqUsuario ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_TMotivo FOREIGN KEY ( TMOTIVO ) REFERENCES tabTMotivo ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_FormaPg FOREIGN KEY ( FORMAPG ) REFERENCES arqFormaPg ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_FormaPg2 FOREIGN KEY ( FORMAPG2 ) REFERENCES arqFormaPg ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_PTrata FOREIGN KEY ( PTRATA ) REFERENCES arqPTrata ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqPlantao ADD CONSTRAINT arqPlantao_FK_Clinica FOREIGN KEY ( CLINICA ) REFERENCES arqClinica ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqPlantao ADD CONSTRAINT arqPlantao_FK_TDiaSem FOREIGN KEY ( TDIASEM ) REFERENCES tabTDiaSem ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqPlantao ADD CONSTRAINT arqPlantao_FK_Usuario FOREIGN KEY ( USUARIO ) REFERENCES arqUsuario ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqFornecedor ADD CONSTRAINT arqFornecedor_FK_TPFPJ FOREIGN KEY ( TPFPJ ) REFERENCES tabTPFPJ ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_EntraFPg FOREIGN KEY ( ENTRAFPG ) REFERENCES arqFormaPg ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_SdEntrFPg FOREIGN KEY ( SDENTRFPG ) REFERENCES arqFormaPg ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_SaldoFPg FOREIGN KEY ( SALDOFPG ) REFERENCES arqFormaPg ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqRecorrente ADD CONSTRAINT arqRecorrente_FK_Clinica FOREIGN KEY ( CLINICA ) REFERENCES arqClinica ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqRecorrente ADD CONSTRAINT arqRecorrente_FK_Fornecedor FOREIGN KEY ( FORNECEDOR ) REFERENCES arqFornecedor ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqRecorrente ADD CONSTRAINT arqRecorrente_FK_Pessoa FOREIGN KEY ( PESSOA ) REFERENCES arqPessoa ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqRecorrente ADD CONSTRAINT arqRecorrente_FK_TPgRec FOREIGN KEY ( TPGREC ) REFERENCES tabTPgRec ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqRecorrente ADD CONSTRAINT arqRecorrente_FK_TCompete FOREIGN KEY ( TCOMPETE ) REFERENCES tabTCompete ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqRecorrente ADD CONSTRAINT arqRecorrente_FK_TFCobra FOREIGN KEY ( TFCOBRA ) REFERENCES tabTFCobra ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqRecorrente ADD CONSTRAINT arqRecorrente_FK_SubPlano FOREIGN KEY ( SUBPLANO ) REFERENCES arqSubPlano ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqCliMidia ADD CONSTRAINT arqCliMidia_FK_Clinica FOREIGN KEY ( CLINICA ) REFERENCES arqClinica ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqCliMidia ADD CONSTRAINT arqCliMidia_FK_Midia FOREIGN KEY ( MIDIA ) REFERENCES arqMidia ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE cnfXConfig ADD CONSTRAINT cnfXConfig_FK_SubPlaRRec FOREIGN KEY ( SUBPLARREC ) REFERENCES arqSubPlano ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE cnfXConfig ADD CONSTRAINT cnfXConfig_FK_SubPlaRAss FOREIGN KEY ( SUBPLARASS ) REFERENCES arqSubPlano ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_ContaCons FOREIGN KEY ( CONTACONS ) REFERENCES arqConta ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_ContaPTra FOREIGN KEY ( CONTAPTRA ) REFERENCES arqConta ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE cnfXConfig ADD CONSTRAINT cnfXConfig_FK_FornRec FOREIGN KEY ( FORNREC ) REFERENCES arqFornecedor ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqComCall ADD CONSTRAINT arqComCall_FK_Clinica FOREIGN KEY ( CLINICA ) REFERENCES arqClinica ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqFxComCall ADD CONSTRAINT arqFxComCall_FK_ComCall FOREIGN KEY ( COMCALL ) REFERENCES arqComCall ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqMedicamen ADD CONSTRAINT arqMedicamen_FK_Unidade FOREIGN KEY ( UNIDADE ) REFERENCES arqUnidade ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqAgRet ADD CONSTRAINT arqAgRet_FK_Clinica FOREIGN KEY ( CLINICA ) REFERENCES arqClinica ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqAgRet ADD CONSTRAINT arqAgRet_FK_Consulta FOREIGN KEY ( CONSULTA ) REFERENCES arqConsulta ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqAgRet ADD CONSTRAINT arqAgRet_FK_Pessoa FOREIGN KEY ( PESSOA ) REFERENCES arqPessoa ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqAgRet ADD CONSTRAINT arqAgRet_FK_TStAgRet FOREIGN KEY ( TSTAGRET ) REFERENCES tabTStAgRet ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqAgRet ADD CONSTRAINT arqAgRet_FK_Assessor FOREIGN KEY ( ASSESSOR ) REFERENCES arqUsuario ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqCMedica ADD CONSTRAINT arqCMedica_FK_Consulta FOREIGN KEY ( CONSULTA ) REFERENCES arqConsulta ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqCMedica ADD CONSTRAINT arqCMedica_FK_Medicamen FOREIGN KEY ( MEDICAMEN ) REFERENCES arqMedicamen ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqLote ADD CONSTRAINT arqLote_FK_Medicamen FOREIGN KEY ( MEDICAMEN ) REFERENCES arqMedicamen ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqLote ADD CONSTRAINT arqLote_FK_Clinica FOREIGN KEY ( CLINICA ) REFERENCES arqClinica ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqLote ADD CONSTRAINT arqLote_FK_Fornecedor FOREIGN KEY ( FORNECEDOR ) REFERENCES arqFornecedor ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqMovEstoque ADD CONSTRAINT arqMovEstoque_FK_Clinica FOREIGN KEY ( CLINICA ) REFERENCES arqClinica ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqMovEstoque ADD CONSTRAINT arqMovEstoque_FK_Fornecedor FOREIGN KEY ( FORNECEDOR ) REFERENCES arqFornecedor ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqItemMov ADD CONSTRAINT arqItemMov_FK_MovEstoque FOREIGN KEY ( MOVESTOQUE ) REFERENCES arqMovEstoque ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqItemMov ADD CONSTRAINT arqItemMov_FK_Lote FOREIGN KEY ( LOTE ) REFERENCES arqLote ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqItemMov ADD CONSTRAINT arqItemMov_FK_TMov FOREIGN KEY ( TMOV ) REFERENCES tabTMov ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqCMedica ADD CONSTRAINT arqCMedica_FK_Lote FOREIGN KEY ( LOTE ) REFERENCES arqLote ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_QuemAgRet FOREIGN KEY ( QUEMAGRET ) REFERENCES arqUsuario ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_TStAgRet FOREIGN KEY ( TSTAGRET ) REFERENCES tabTStAgRet ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_AssesRet FOREIGN KEY ( ASSESRET ) REFERENCES arqUsuario ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqHoraBloq ADD CONSTRAINT arqHoraBloq_FK_Medico FOREIGN KEY ( MEDICO ) REFERENCES arqUsuario ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqUsuCCor ADD CONSTRAINT arqUsuCCor_FK_Usuario FOREIGN KEY ( USUARIO ) REFERENCES arqUsuario ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqUsuCCor ADD CONSTRAINT arqUsuCCor_FK_CCor FOREIGN KEY ( CCOR ) REFERENCES arqCCor ON DELETE CASCADE ON UPDATE CASCADE;
commit;


/************************************************************
	Trigger para Log de arqBairro
************************************************************/

set term ^;

recreate trigger arqBairro_LOG for arqBairro
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Bairro,'' );
else
	valorChave = coalesce( NEW.Bairro,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100001 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Bairro', OLD.Bairro, NEW.Bairro );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqCidade
************************************************************/

set term ^;

recreate trigger arqCidade_LOG for arqCidade
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
select coalesce( UF_chave, ' ' ) || '-' || coalesce( Cidade, ' ' ) from v_arqCidade where idPrimario=( case when(deleting) then (OLD.idPrimario) else (NEW.idPrimario) end ) into :valorChave;
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100002 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'UF', OLD.UF, NEW.UF );
	execute procedure set_log( 12, NEW.idPrimario, 'Cidade', OLD.Cidade, NEW.Cidade );
	execute procedure set_log( 12, NEW.idPrimario, 'DDD', OLD.DDD, NEW.DDD );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqGrupo
************************************************************/

set term ^;

recreate trigger arqGrupo_LOG for arqGrupo
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Grupo,'' );
else
	valorChave = coalesce( NEW.Grupo,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100004 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Grupo', OLD.Grupo, NEW.Grupo );
	execute procedure set_log( 12, NEW.idPrimario, 'CallCenter', OLD.CallCenter, NEW.CallCenter );
	execute procedure set_log( 12, NEW.idPrimario, 'Medico', OLD.Medico, NEW.Medico );
	execute procedure set_log( 12, NEW.idPrimario, 'Assessor', OLD.Assessor, NEW.Assessor );
	execute procedure set_log( 12, NEW.idPrimario, 'AvRetira', OLD.AvRetira, NEW.AvRetira );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqUsuario
************************************************************/

set term ^;

recreate trigger arqUsuario_LOG for arqUsuario
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Usuario,'' );
else
	valorChave = coalesce( NEW.Usuario,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100005 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Usuario', OLD.Usuario, NEW.Usuario );
	execute procedure set_log( 12, NEW.idPrimario, 'Nome', OLD.Nome, NEW.Nome );
	execute procedure set_log( 12, NEW.idPrimario, 'Grupo', OLD.Grupo, NEW.Grupo );
	execute procedure set_log( 12, NEW.idPrimario, 'Email', OLD.Email, NEW.Email );
	execute procedure set_log( 12, NEW.idPrimario, 'CRM', OLD.CRM, NEW.CRM );
	execute procedure set_log( 12, NEW.idPrimario, 'PodeAgenda', OLD.PodeAgenda, NEW.PodeAgenda );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
	execute procedure set_log( 12, NEW.idPrimario, 'Nascimento', OLD.Nascimento, NEW.Nascimento );
	execute procedure set_log( 12, NEW.idPrimario, 'EmailAces', OLD.EmailAces, NEW.EmailAces );
	execute procedure set_log( 12, NEW.idPrimario, 'EmailAcesS', OLD.EmailAcesS, NEW.EmailAcesS );
	execute procedure set_log( 12, NEW.idPrimario, 'EmailFinan', OLD.EmailFinan, NEW.EmailFinan );
	execute procedure set_log( 12, NEW.idPrimario, 'EmCMediSep', OLD.EmCMediSep, NEW.EmCMediSep );
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.Senha is distinct from OLD.Senha )  OR 
		( NEW.Versao is distinct from OLD.Versao )  OR 
		( NEW.Foto is distinct from OLD.Foto )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqPessoa
************************************************************/

set term ^;

recreate trigger arqPessoa_LOG for arqPessoa
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Nome,'' ) || coalesce( OLD.NumCelular,'' );
else
	valorChave = coalesce( NEW.Nome,'' ) || coalesce( NEW.NumCelular,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100007 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Nome', OLD.Nome, NEW.Nome );
	execute procedure set_log( 12, NEW.idPrimario, 'Apelido', OLD.Apelido, NEW.Apelido );
	execute procedure set_log( 12, NEW.idPrimario, 'NumCelular', OLD.NumCelular, NEW.NumCelular );
	execute procedure set_log( 12, NEW.idPrimario, 'Prontuario', OLD.Prontuario, NEW.Prontuario );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_CEP', OLD.Ende_CEP, NEW.Ende_CEP );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Endereco', OLD.Ende_Endereco, NEW.Ende_Endereco );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Bairro', OLD.Ende_Bairro, NEW.Ende_Bairro );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Cidade', OLD.Ende_Cidade, NEW.Ende_Cidade );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Telefone', OLD.Ende_Telefone, NEW.Ende_Telefone );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_DDDCelular', OLD.Ende_DDDCelular, NEW.Ende_DDDCelular );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Celular', OLD.Ende_Celular, NEW.Ende_Celular );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_WhatsApp', OLD.Ende_WhatsApp, NEW.Ende_WhatsApp );
	execute procedure set_log( 12, NEW.idPrimario, 'Nascimento', OLD.Nascimento, NEW.Nascimento );
	execute procedure set_log( 12, NEW.idPrimario, 'Sexo', OLD.Sexo, NEW.Sexo );
	execute procedure set_log( 12, NEW.idPrimario, 'EstCivil', OLD.EstCivil, NEW.EstCivil );
	execute procedure set_log( 12, NEW.idPrimario, 'Profissao', OLD.Profissao, NEW.Profissao );
	execute procedure set_log( 12, NEW.idPrimario, 'CPF', OLD.CPF, NEW.CPF );
	execute procedure set_log( 12, NEW.idPrimario, 'Identidade', OLD.Identidade, NEW.Identidade );
	execute procedure set_log( 12, NEW.idPrimario, 'Orgao', OLD.Orgao, NEW.Orgao );
	execute procedure set_log( 12, NEW.idPrimario, 'Emissao', OLD.Emissao, NEW.Emissao );
	execute procedure set_log( 12, NEW.idPrimario, 'Email', OLD.Email, NEW.Email );
	execute procedure set_log( 12, NEW.idPrimario, 'RecEmail', OLD.RecEmail, NEW.RecEmail );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
	execute procedure set_log( 12, NEW.idPrimario, 'Obs', substring( OLD.Obs from 1 for 255 ), substring( NEW.Obs from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'Desde', OLD.Desde, NEW.Desde );
	execute procedure set_log( 12, NEW.idPrimario, 'QtoDesmar', OLD.QtoDesmar, NEW.QtoDesmar );
	execute procedure set_log( 12, NEW.idPrimario, 'Midia', OLD.Midia, NEW.Midia );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqTemplate
************************************************************/

set term ^;

recreate trigger arqTemplate_LOG for arqTemplate
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Nome,'' );
else
	valorChave = coalesce( NEW.Nome,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100008 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Nome', OLD.Nome, NEW.Nome );
	execute procedure set_log( 12, NEW.idPrimario, 'Template', substring( OLD.Template from 1 for 255 ), substring( NEW.Template from 1 for 255 ) );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqEmailRemet
************************************************************/

set term ^;

recreate trigger arqEmailRemet_LOG for arqEmailRemet
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Email,'' );
else
	valorChave = coalesce( NEW.Email,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100009 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Email', OLD.Email, NEW.Email );
	execute procedure set_log( 12, NEW.idPrimario, 'NomeEmail', OLD.NomeEmail, NEW.NomeEmail );
	execute procedure set_log( 12, NEW.idPrimario, 'Padrao', OLD.Padrao, NEW.Padrao );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqAcaoEmail
************************************************************/

set term ^;

recreate trigger arqAcaoEmail_LOG for arqAcaoEmail
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Titulo,'' ) || coalesce( OLD.Versao,'' );
else
	valorChave = coalesce( NEW.Titulo,'' ) || coalesce( NEW.Versao,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100010 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Titulo', OLD.Titulo, NEW.Titulo );
	execute procedure set_log( 12, NEW.idPrimario, 'Versao', OLD.Versao, NEW.Versao );
	execute procedure set_log( 12, NEW.idPrimario, 'TipoAcao', OLD.TipoAcao, NEW.TipoAcao );
	execute procedure set_log( 12, NEW.idPrimario, 'Template', OLD.Template, NEW.Template );
	execute procedure set_log( 12, NEW.idPrimario, 'PadraoAcao', OLD.PadraoAcao, NEW.PadraoAcao );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
	execute procedure set_log( 12, NEW.idPrimario, 'Link', OLD.Link, NEW.Link );
	execute procedure set_log( 12, NEW.idPrimario, 'ImagemAlt', OLD.ImagemAlt, NEW.ImagemAlt );
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.Arquivo is distinct from OLD.Arquivo )  OR 
		( NEW.Html is distinct from OLD.Html )  OR 
		( NEW.Imagem is distinct from OLD.Imagem )  OR 
		( NEW.QtdTeste is distinct from OLD.QtdTeste )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqImagemCRM
************************************************************/

set term ^;

recreate trigger arqImagemCRM_LOG for arqImagemCRM
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
select coalesce( AcaoEmail_Titulo, ' ' ) || '-' || coalesce( AcaoEmail_Versao, ' ' ) || '-' || coalesce( NumImg, ' ' ) from v_arqImagemCRM where idPrimario=( case when(deleting) then (OLD.idPrimario) else (NEW.idPrimario) end ) into :valorChave;
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100011 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'AcaoEmail', OLD.AcaoEmail, NEW.AcaoEmail );
	execute procedure set_log( 12, NEW.idPrimario, 'NumImg', OLD.NumImg, NEW.NumImg );
	execute procedure set_log( 12, NEW.idPrimario, 'Nome', OLD.Nome, NEW.Nome );
	execute procedure set_log( 12, NEW.idPrimario, 'Link', OLD.Link, NEW.Link );
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.Imagem is distinct from OLD.Imagem )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqLogEmail
************************************************************/

set term ^;

recreate trigger arqLogEmail_LOG for arqLogEmail
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
select coalesce( Titulo_Titulo, ' ' ) || '-' || coalesce( Titulo_Versao, ' ' ) || '-' || coalesce( Data, ' ' ) || '-' || coalesce( Hora, ' ' ) from v_arqLogEmail where idPrimario=( case when(deleting) then (OLD.idPrimario) else (NEW.idPrimario) end ) into :valorChave;
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100012 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Titulo', OLD.Titulo, NEW.Titulo );
	execute procedure set_log( 12, NEW.idPrimario, 'Data', OLD.Data, NEW.Data );
	execute procedure set_log( 12, NEW.idPrimario, 'Hora', OLD.Hora, NEW.Hora );
	execute procedure set_log( 12, NEW.idPrimario, 'Usuario', OLD.Usuario, NEW.Usuario );
	execute procedure set_log( 12, NEW.idPrimario, 'EmailRemet', OLD.EmailRemet, NEW.EmailRemet );
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.Enviados is distinct from OLD.Enviados )  OR 
		( NEW.NEnviados is distinct from OLD.NEnviados )  OR 
		( NEW.HoraIni is distinct from OLD.HoraIni )  OR 
		( NEW.HoraFim is distinct from OLD.HoraFim )  OR 
		( NEW.HoraReenv is distinct from OLD.HoraReenv )  OR 
		( NEW.Enviou is distinct from OLD.Enviou )  OR 
		( NEW.Opcao is distinct from OLD.Opcao )  OR 
		( NEW.Cliente is distinct from OLD.Cliente )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqAvisos
************************************************************/

set term ^;

recreate trigger arqAvisos_LOG for arqAvisos
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Numero,'' );
else
	valorChave = coalesce( NEW.Numero,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100014 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Numero', OLD.Numero, NEW.Numero );
	execute procedure set_log( 12, NEW.idPrimario, 'Data', OLD.Data, NEW.Data );
	execute procedure set_log( 12, NEW.idPrimario, 'Hora', OLD.Hora, NEW.Hora );
	execute procedure set_log( 12, NEW.idPrimario, 'Quem', OLD.Quem, NEW.Quem );
	execute procedure set_log( 12, NEW.idPrimario, 'Assunto', OLD.Assunto, NEW.Assunto );
	execute procedure set_log( 12, NEW.idPrimario, 'Prioridade', OLD.Prioridade, NEW.Prioridade );
	execute procedure set_log( 12, NEW.idPrimario, 'Texto', substring( OLD.Texto from 1 for 255 ), substring( NEW.Texto from 1 for 255 ) );
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.AvisoPai is distinct from OLD.AvisoPai )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqParaGrupo
************************************************************/

set term ^;

recreate trigger arqParaGrupo_LOG for arqParaGrupo
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
select coalesce( Avisos_Numero, ' ' ) || '-' || coalesce( Grupo_Grupo, ' ' ) || '-' || coalesce( Usuario_Usuario, ' ' ) from v_arqParaGrupo where idPrimario=( case when(deleting) then (OLD.idPrimario) else (NEW.idPrimario) end ) into :valorChave;
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100015 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Avisos', OLD.Avisos, NEW.Avisos );
	execute procedure set_log( 12, NEW.idPrimario, 'Grupo', OLD.Grupo, NEW.Grupo );
	execute procedure set_log( 12, NEW.idPrimario, 'Usuario', OLD.Usuario, NEW.Usuario );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqLido
************************************************************/

set term ^;

recreate trigger arqLido_LOG for arqLido
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
select coalesce( Avisos_Numero, ' ' ) || '-' || coalesce( Usuario_Usuario, ' ' ) from v_arqLido where idPrimario=( case when(deleting) then (OLD.idPrimario) else (NEW.idPrimario) end ) into :valorChave;
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100016 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Avisos', OLD.Avisos, NEW.Avisos );
	execute procedure set_log( 12, NEW.idPrimario, 'Usuario', OLD.Usuario, NEW.Usuario );
	execute procedure set_log( 12, NEW.idPrimario, 'Data', OLD.Data, NEW.Data );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de cnfXConfig
************************************************************/

set term ^;

recreate trigger cnfXConfig_LOG for cnfXConfig
active after Insert or Delete or Update
position 999
as
begin
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100017 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', '' );
begin
	execute procedure set_log( 12, NEW.idPrimario, 'Empresa', OLD.Empresa, NEW.Empresa );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_CEP', OLD.Ende_CEP, NEW.Ende_CEP );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Endereco', OLD.Ende_Endereco, NEW.Ende_Endereco );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Bairro', OLD.Ende_Bairro, NEW.Ende_Bairro );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Cidade', OLD.Ende_Cidade, NEW.Ende_Cidade );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Telefone', OLD.Ende_Telefone, NEW.Ende_Telefone );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_DDDCelular', OLD.Ende_DDDCelular, NEW.Ende_DDDCelular );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Celular', OLD.Ende_Celular, NEW.Ende_Celular );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_WhatsApp', OLD.Ende_WhatsApp, NEW.Ende_WhatsApp );
	execute procedure set_log( 12, NEW.idPrimario, 'Email', OLD.Email, NEW.Email );
	execute procedure set_log( 12, NEW.idPrimario, 'Site', OLD.Site, NEW.Site );
	execute procedure set_log( 12, NEW.idPrimario, 'QtasDesmar', OLD.QtasDesmar, NEW.QtasDesmar );
	execute procedure set_log( 12, NEW.idPrimario, 'Declinar', OLD.Declinar, NEW.Declinar );
	execute procedure set_log( 12, NEW.idPrimario, 'RecorDia', OLD.RecorDia, NEW.RecorDia );
	execute procedure set_log( 12, NEW.idPrimario, 'SubPlaRRec', OLD.SubPlaRRec, NEW.SubPlaRRec );
	execute procedure set_log( 12, NEW.idPrimario, 'SubPlaRAss', OLD.SubPlaRAss, NEW.SubPlaRAss );
	execute procedure set_log( 12, NEW.idPrimario, 'FornRec', OLD.FornRec, NEW.FornRec );
	execute procedure set_log( 12, NEW.idPrimario, 'BoletoMin', OLD.BoletoMin, NEW.BoletoMin );
	execute procedure set_log( 12, NEW.idPrimario, 'DiasSdEntr', OLD.DiasSdEntr, NEW.DiasSdEntr );
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.CPF is distinct from OLD.CPF )  OR 
		( NEW.LogAcesso is distinct from OLD.LogAcesso )  OR 
		( NEW.LogAcessoS is distinct from OLD.LogAcessoS )  OR 
		( NEW.Qtd is distinct from OLD.Qtd )  OR 
		( NEW.Qtd2 is distinct from OLD.Qtd2 )  OR 
		( NEW.CNPJ is distinct from OLD.CNPJ )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqBanco
************************************************************/

set term ^;

recreate trigger arqBanco_LOG for arqBanco
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Num,'' );
else
	valorChave = coalesce( NEW.Num,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100019 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Num', OLD.Num, NEW.Num );
	execute procedure set_log( 12, NEW.idPrimario, 'Banco', OLD.Banco, NEW.Banco );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqCCor
************************************************************/

set term ^;

recreate trigger arqCCor_LOG for arqCCor
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Nome,'' );
else
	valorChave = coalesce( NEW.Nome,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100020 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Nome', OLD.Nome, NEW.Nome );
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'TCCor', OLD.TCCor, NEW.TCCor );
	execute procedure set_log( 12, NEW.idPrimario, 'Banco', OLD.Banco, NEW.Banco );
	execute procedure set_log( 12, NEW.idPrimario, 'Agencia', OLD.Agencia, NEW.Agencia );
	execute procedure set_log( 12, NEW.idPrimario, 'DvAgencia', OLD.DvAgencia, NEW.DvAgencia );
	execute procedure set_log( 12, NEW.idPrimario, 'Conta', OLD.Conta, NEW.Conta );
	execute procedure set_log( 12, NEW.idPrimario, 'DvConta', OLD.DvConta, NEW.DvConta );
	execute procedure set_log( 12, NEW.idPrimario, 'Carteira', OLD.Carteira, NEW.Carteira );
	execute procedure set_log( 12, NEW.idPrimario, 'CodCedente', OLD.CodCedente, NEW.CodCedente );
	execute procedure set_log( 12, NEW.idPrimario, 'Multa', OLD.Multa, NEW.Multa );
	execute procedure set_log( 12, NEW.idPrimario, 'Juros', OLD.Juros, NEW.Juros );
	execute procedure set_log( 12, NEW.idPrimario, 'CBoleto', OLD.CBoleto, NEW.CBoleto );
	execute procedure set_log( 12, NEW.idPrimario, 'Instrucoes', substring( OLD.Instrucoes from 1 for 255 ), substring( NEW.Instrucoes from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'UltRemessa', OLD.UltRemessa, NEW.UltRemessa );
	execute procedure set_log( 12, NEW.idPrimario, 'Convenio', OLD.Convenio, NEW.Convenio );
	execute procedure set_log( 12, NEW.idPrimario, 'Variacao', OLD.Variacao, NEW.Variacao );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
	execute procedure set_log( 12, NEW.idPrimario, 'TPix1', OLD.TPix1, NEW.TPix1 );
	execute procedure set_log( 12, NEW.idPrimario, 'Pix1', OLD.Pix1, NEW.Pix1 );
	execute procedure set_log( 12, NEW.idPrimario, 'TPix2', OLD.TPix2, NEW.TPix2 );
	execute procedure set_log( 12, NEW.idPrimario, 'Pix2', OLD.Pix2, NEW.Pix2 );
	execute procedure set_log( 12, NEW.idPrimario, 'TPix3', OLD.TPix3, NEW.TPix3 );
	execute procedure set_log( 12, NEW.idPrimario, 'Pix3', OLD.Pix3, NEW.Pix3 );
	execute procedure set_log( 12, NEW.idPrimario, 'TPix4', OLD.TPix4, NEW.TPix4 );
	execute procedure set_log( 12, NEW.idPrimario, 'Pix4', OLD.Pix4, NEW.Pix4 );
	execute procedure set_log( 12, NEW.idPrimario, 'TPix5', OLD.TPix5, NEW.TPix5 );
	execute procedure set_log( 12, NEW.idPrimario, 'Pix5', OLD.Pix5, NEW.Pix5 );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqContPessoa
************************************************************/

set term ^;

recreate trigger arqContPessoa_LOG for arqContPessoa
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
	valorChave='';
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100021 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Fornecedor', OLD.Fornecedor, NEW.Fornecedor );
	execute procedure set_log( 12, NEW.idPrimario, 'Pessoa', OLD.Pessoa, NEW.Pessoa );
	execute procedure set_log( 12, NEW.idPrimario, 'Nome', OLD.Nome, NEW.Nome );
	execute procedure set_log( 12, NEW.idPrimario, 'Apelido', OLD.Apelido, NEW.Apelido );
	execute procedure set_log( 12, NEW.idPrimario, 'Funcao', OLD.Funcao, NEW.Funcao );
	execute procedure set_log( 12, NEW.idPrimario, 'Celular', OLD.Celular, NEW.Celular );
	execute procedure set_log( 12, NEW.idPrimario, 'Telefone', OLD.Telefone, NEW.Telefone );
	execute procedure set_log( 12, NEW.idPrimario, 'Email', OLD.Email, NEW.Email );
	execute procedure set_log( 12, NEW.idPrimario, 'RecEmail', OLD.RecEmail, NEW.RecEmail );
	execute procedure set_log( 12, NEW.idPrimario, 'Nascimento', OLD.Nascimento, NEW.Nascimento );
	execute procedure set_log( 12, NEW.idPrimario, 'Sexo', OLD.Sexo, NEW.Sexo );
	execute procedure set_log( 12, NEW.idPrimario, 'Obs', substring( OLD.Obs from 1 for 255 ), substring( NEW.Obs from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqDocMod
************************************************************/

set term ^;

recreate trigger arqDocMod_LOG for arqDocMod
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Documento,'' );
else
	valorChave = coalesce( NEW.Documento,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100022 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Documento', OLD.Documento, NEW.Documento );
	execute procedure set_log( 12, NEW.idPrimario, 'TArqDoc', OLD.TArqDoc, NEW.TArqDoc );
	execute procedure set_log( 12, NEW.idPrimario, 'TOrDoc', OLD.TOrDoc, NEW.TOrDoc );
	execute procedure set_log( 12, NEW.idPrimario, 'Logo', OLD.Logo, NEW.Logo );
	execute procedure set_log( 12, NEW.idPrimario, 'Marca', OLD.Marca, NEW.Marca );
	execute procedure set_log( 12, NEW.idPrimario, 'NomeArq', OLD.NomeArq, NEW.NomeArq );
	execute procedure set_log( 12, NEW.idPrimario, 'Rodape', OLD.Rodape, NEW.Rodape );
	execute procedure set_log( 12, NEW.idPrimario, 'AltRodape', OLD.AltRodape, NEW.AltRodape );
	execute procedure set_log( 12, NEW.idPrimario, 'Template', OLD.Template, NEW.Template );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
	execute procedure set_log( 12, NEW.idPrimario, 'Html', substring( OLD.Html from 1 for 255 ), substring( NEW.Html from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'Lista', substring( OLD.Lista from 1 for 255 ), substring( NEW.Lista from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'MargemEsq', OLD.MargemEsq, NEW.MargemEsq );
	execute procedure set_log( 12, NEW.idPrimario, 'MargemDir', OLD.MargemDir, NEW.MargemDir );
	execute procedure set_log( 12, NEW.idPrimario, 'MargemTop', OLD.MargemTop, NEW.MargemTop );
	execute procedure set_log( 12, NEW.idPrimario, 'TPapel', OLD.TPapel, NEW.TPapel );
	execute procedure set_log( 12, NEW.idPrimario, 'TOrienta', OLD.TOrienta, NEW.TOrienta );
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.Header is distinct from OLD.Header )  OR 
		( NEW.Arquivo is distinct from OLD.Arquivo )  OR 
		( NEW.Footer is distinct from OLD.Footer )  OR 
		( NEW.Imagem is distinct from OLD.Imagem )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqPlano
************************************************************/

set term ^;

recreate trigger arqPlano_LOG for arqPlano
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.CodPlano,'' );
else
	valorChave = coalesce( NEW.CodPlano,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100027 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'CodPlano', OLD.CodPlano, NEW.CodPlano );
	execute procedure set_log( 12, NEW.idPrimario, 'Plano', OLD.Plano, NEW.Plano );
	execute procedure set_log( 12, NEW.idPrimario, 'TPgRec', OLD.TPgRec, NEW.TPgRec );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqSubPlano
************************************************************/

set term ^;

recreate trigger arqSubPlano_LOG for arqSubPlano
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
select coalesce( Plano_CodPlano, ' ' ) || '-' || coalesce( Codigo, ' ' ) from v_arqSubPlano where idPrimario=( case when(deleting) then (OLD.idPrimario) else (NEW.idPrimario) end ) into :valorChave;
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100028 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Plano', OLD.Plano, NEW.Plano );
	execute procedure set_log( 12, NEW.idPrimario, 'Codigo', OLD.Codigo, NEW.Codigo );
	execute procedure set_log( 12, NEW.idPrimario, 'Nome', OLD.Nome, NEW.Nome );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqMidia
************************************************************/

set term ^;

recreate trigger arqMidia_LOG for arqMidia
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Midia,'' );
else
	valorChave = coalesce( NEW.Midia,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100030 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Midia', OLD.Midia, NEW.Midia );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqClinica
************************************************************/

set term ^;

recreate trigger arqClinica_LOG for arqClinica
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Clinica,'' );
else
	valorChave = coalesce( NEW.Clinica,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100031 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'Razao', OLD.Razao, NEW.Razao );
	execute procedure set_log( 12, NEW.idPrimario, 'Email', OLD.Email, NEW.Email );
	execute procedure set_log( 12, NEW.idPrimario, 'CNPJ', OLD.CNPJ, NEW.CNPJ );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_CEP', OLD.Ende_CEP, NEW.Ende_CEP );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Endereco', OLD.Ende_Endereco, NEW.Ende_Endereco );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Bairro', OLD.Ende_Bairro, NEW.Ende_Bairro );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Cidade', OLD.Ende_Cidade, NEW.Ende_Cidade );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Telefone', OLD.Ende_Telefone, NEW.Ende_Telefone );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_DDDCelular', OLD.Ende_DDDCelular, NEW.Ende_DDDCelular );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Celular', OLD.Ende_Celular, NEW.Ende_Celular );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_WhatsApp', OLD.Ende_WhatsApp, NEW.Ende_WhatsApp );
	execute procedure set_log( 12, NEW.idPrimario, 'TiConsulta', OLD.TiConsulta, NEW.TiConsulta );
	execute procedure set_log( 12, NEW.idPrimario, 'DataIni', OLD.DataIni, NEW.DataIni );
	execute procedure set_log( 12, NEW.idPrimario, 'DataFim', OLD.DataFim, NEW.DataFim );
	execute procedure set_log( 12, NEW.idPrimario, 'MaxAgenda', OLD.MaxAgenda, NEW.MaxAgenda );
	execute procedure set_log( 12, NEW.idPrimario, 'Sigla', OLD.Sigla, NEW.Sigla );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqPTrata
************************************************************/

set term ^;

recreate trigger arqPTrata_LOG for arqPTrata
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.PTrata,'' );
else
	valorChave = coalesce( NEW.PTrata,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100032 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'PTrata', OLD.PTrata, NEW.PTrata );
	execute procedure set_log( 12, NEW.idPrimario, 'Apelido', OLD.Apelido, NEW.Apelido );
	execute procedure set_log( 12, NEW.idPrimario, 'Valor', OLD.Valor, NEW.Valor );
	execute procedure set_log( 12, NEW.idPrimario, 'MrgDesc', OLD.MrgDesc, NEW.MrgDesc );
	execute procedure set_log( 12, NEW.idPrimario, 'Complemen', OLD.Complemen, NEW.Complemen );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
	execute procedure set_log( 12, NEW.idPrimario, 'Tempo', OLD.Tempo, NEW.Tempo );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqConta
************************************************************/

set term ^;

recreate trigger arqConta_LOG for arqConta
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Transacao,'' );
else
	valorChave = coalesce( NEW.Transacao,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100033 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Transacao', OLD.Transacao, NEW.Transacao );
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'TPgRec', OLD.TPgRec, NEW.TPgRec );
	execute procedure set_log( 12, NEW.idPrimario, 'Fornecedor', OLD.Fornecedor, NEW.Fornecedor );
	execute procedure set_log( 12, NEW.idPrimario, 'Pessoa', OLD.Pessoa, NEW.Pessoa );
	execute procedure set_log( 12, NEW.idPrimario, 'Documento', OLD.Documento, NEW.Documento );
	execute procedure set_log( 12, NEW.idPrimario, 'Emissao', OLD.Emissao, NEW.Emissao );
	execute procedure set_log( 12, NEW.idPrimario, 'RecEnvia', OLD.RecEnvia, NEW.RecEnvia );
	execute procedure set_log( 12, NEW.idPrimario, 'Compete', OLD.Compete, NEW.Compete );
	execute procedure set_log( 12, NEW.idPrimario, 'Historico', OLD.Historico, NEW.Historico );
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.Arq1 is distinct from OLD.Arq1 )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqParcela
************************************************************/

set term ^;

recreate trigger arqParcela_LOG for arqParcela
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
select coalesce( Conta_Transacao, ' ' ) || '-' || coalesce( Parcela, ' ' ) from v_arqParcela where idPrimario=( case when(deleting) then (OLD.idPrimario) else (NEW.idPrimario) end ) into :valorChave;
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100034 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Conta', OLD.Conta, NEW.Conta );
	execute procedure set_log( 12, NEW.idPrimario, 'Parcela', OLD.Parcela, NEW.Parcela );
	execute procedure set_log( 12, NEW.idPrimario, 'Vencimento', OLD.Vencimento, NEW.Vencimento );
	execute procedure set_log( 12, NEW.idPrimario, 'VencEst', OLD.VencEst, NEW.VencEst );
	execute procedure set_log( 12, NEW.idPrimario, 'Valor', OLD.Valor, NEW.Valor );
	execute procedure set_log( 12, NEW.idPrimario, 'ValorLiq', OLD.ValorLiq, NEW.ValorLiq );
	execute procedure set_log( 12, NEW.idPrimario, 'Estimado', OLD.Estimado, NEW.Estimado );
	execute procedure set_log( 12, NEW.idPrimario, 'TFCobra', OLD.TFCobra, NEW.TFCobra );
	execute procedure set_log( 12, NEW.idPrimario, 'Emissao', OLD.Emissao, NEW.Emissao );
	execute procedure set_log( 12, NEW.idPrimario, 'CCor', OLD.CCor, NEW.CCor );
	execute procedure set_log( 12, NEW.idPrimario, 'SubPlano', OLD.SubPlano, NEW.SubPlano );
	execute procedure set_log( 12, NEW.idPrimario, 'DataPagto', OLD.DataPagto, NEW.DataPagto );
	execute procedure set_log( 12, NEW.idPrimario, 'DataComp', OLD.DataComp, NEW.DataComp );
	execute procedure set_log( 12, NEW.idPrimario, 'TFPagto', OLD.TFPagto, NEW.TFPagto );
	execute procedure set_log( 12, NEW.idPrimario, 'TDetPg', OLD.TDetPg, NEW.TDetPg );
	execute procedure set_log( 12, NEW.idPrimario, 'FormaPg', OLD.FormaPg, NEW.FormaPg );
	execute procedure set_log( 12, NEW.idPrimario, 'Cheque', OLD.Cheque, NEW.Cheque );
	execute procedure set_log( 12, NEW.idPrimario, 'Historico', OLD.Historico, NEW.Historico );
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.LinhaDig is distinct from OLD.LinhaDig )  OR 
		( NEW.NomePdf is distinct from OLD.NomePdf )  OR 
		( NEW.Arq1 is distinct from OLD.Arq1 )  OR 
		( NEW.StRetorno is distinct from OLD.StRetorno )  OR 
		( NEW.Remessa is distinct from OLD.Remessa )  OR 
		( NEW.DataRem is distinct from OLD.DataRem )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqUsuCli
************************************************************/

set term ^;

recreate trigger arqUsuCli_LOG for arqUsuCli
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
select coalesce( Usuario_Usuario, ' ' ) || '-' || coalesce( Clinica_Clinica, ' ' ) from v_arqUsuCli where idPrimario=( case when(deleting) then (OLD.idPrimario) else (NEW.idPrimario) end ) into :valorChave;
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100035 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Usuario', OLD.Usuario, NEW.Usuario );
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqProfissao
************************************************************/

set term ^;

recreate trigger arqProfissao_LOG for arqProfissao
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Profissao,'' );
else
	valorChave = coalesce( NEW.Profissao,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100036 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Profissao', OLD.Profissao, NEW.Profissao );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqHoraBloq
************************************************************/

set term ^;

recreate trigger arqHoraBloq_LOG for arqHoraBloq
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
	valorChave='';
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100037 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'Nome', OLD.Nome, NEW.Nome );
	execute procedure set_log( 12, NEW.idPrimario, 'DataIni', OLD.DataIni, NEW.DataIni );
	execute procedure set_log( 12, NEW.idPrimario, 'HoraIni', OLD.HoraIni, NEW.HoraIni );
	execute procedure set_log( 12, NEW.idPrimario, 'DataFim', OLD.DataFim, NEW.DataFim );
	execute procedure set_log( 12, NEW.idPrimario, 'HoraFim', OLD.HoraFim, NEW.HoraFim );
	execute procedure set_log( 12, NEW.idPrimario, 'Medico', OLD.Medico, NEW.Medico );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqDuracao
************************************************************/

set term ^;

recreate trigger arqDuracao_LOG for arqDuracao
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
	valorChave='';
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100038 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'Inicio', OLD.Inicio, NEW.Inicio );
	execute procedure set_log( 12, NEW.idPrimario, 'HoraIni', OLD.HoraIni, NEW.HoraIni );
	execute procedure set_log( 12, NEW.idPrimario, 'HoraFim', OLD.HoraFim, NEW.HoraFim );
	execute procedure set_log( 12, NEW.idPrimario, 'ConsSab', OLD.ConsSab, NEW.ConsSab );
	execute procedure set_log( 12, NEW.idPrimario, 'ConsDom', OLD.ConsDom, NEW.ConsDom );
	execute procedure set_log( 12, NEW.idPrimario, 'Duracao', OLD.Duracao, NEW.Duracao );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqConsulta
************************************************************/

set term ^;

recreate trigger arqConsulta_LOG for arqConsulta
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Num,'' );
else
	valorChave = coalesce( NEW.Num,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100039 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Num', OLD.Num, NEW.Num );
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'TStCon', OLD.TStCon, NEW.TStCon );
	execute procedure set_log( 12, NEW.idPrimario, 'TiAgenda', OLD.TiAgenda, NEW.TiAgenda );
	execute procedure set_log( 12, NEW.idPrimario, 'Data', OLD.Data, NEW.Data );
	execute procedure set_log( 12, NEW.idPrimario, 'Hora', OLD.Hora, NEW.Hora );
	execute procedure set_log( 12, NEW.idPrimario, 'HoraChega', OLD.HoraChega, NEW.HoraChega );
	execute procedure set_log( 12, NEW.idPrimario, 'Pessoa', OLD.Pessoa, NEW.Pessoa );
	execute procedure set_log( 12, NEW.idPrimario, 'Medico', OLD.Medico, NEW.Medico );
	execute procedure set_log( 12, NEW.idPrimario, 'Assessor', OLD.Assessor, NEW.Assessor );
	execute procedure set_log( 12, NEW.idPrimario, 'CallCenter', OLD.CallCenter, NEW.CallCenter );
	execute procedure set_log( 12, NEW.idPrimario, 'MedicaAtua', substring( OLD.MedicaAtua from 1 for 255 ), substring( NEW.MedicaAtua from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'TMotivo', OLD.TMotivo, NEW.TMotivo );
	execute procedure set_log( 12, NEW.idPrimario, 'Cortesia', OLD.Cortesia, NEW.Cortesia );
	execute procedure set_log( 12, NEW.idPrimario, 'Valor', OLD.Valor, NEW.Valor );
	execute procedure set_log( 12, NEW.idPrimario, 'FormaPg', OLD.FormaPg, NEW.FormaPg );
	execute procedure set_log( 12, NEW.idPrimario, 'Valor2', OLD.Valor2, NEW.Valor2 );
	execute procedure set_log( 12, NEW.idPrimario, 'FormaPg2', OLD.FormaPg2, NEW.FormaPg2 );
	execute procedure set_log( 12, NEW.idPrimario, 'PTrata', OLD.PTrata, NEW.PTrata );
	execute procedure set_log( 12, NEW.idPrimario, 'ValPTrata', OLD.ValPTrata, NEW.ValPTrata );
	execute procedure set_log( 12, NEW.idPrimario, 'EntraFPg', OLD.EntraFPg, NEW.EntraFPg );
	execute procedure set_log( 12, NEW.idPrimario, 'EntraVal', OLD.EntraVal, NEW.EntraVal );
	execute procedure set_log( 12, NEW.idPrimario, 'EntraParcE', OLD.EntraParcE, NEW.EntraParcE );
	execute procedure set_log( 12, NEW.idPrimario, 'EntraParc', OLD.EntraParc, NEW.EntraParc );
	execute procedure set_log( 12, NEW.idPrimario, 'SdEntrFPg', OLD.SdEntrFPg, NEW.SdEntrFPg );
	execute procedure set_log( 12, NEW.idPrimario, 'SdVenc1Par', OLD.SdVenc1Par, NEW.SdVenc1Par );
	execute procedure set_log( 12, NEW.idPrimario, 'SdCond', OLD.SdCond, NEW.SdCond );
	execute procedure set_log( 12, NEW.idPrimario, 'EntraValP', OLD.EntraValP, NEW.EntraValP );
	execute procedure set_log( 12, NEW.idPrimario, 'EntraObs', OLD.EntraObs, NEW.EntraObs );
	execute procedure set_log( 12, NEW.idPrimario, 'SaldoFPg', OLD.SaldoFPg, NEW.SaldoFPg );
	execute procedure set_log( 12, NEW.idPrimario, 'SaldoParc', OLD.SaldoParc, NEW.SaldoParc );
	execute procedure set_log( 12, NEW.idPrimario, 'SaldoCond', OLD.SaldoCond, NEW.SaldoCond );
	execute procedure set_log( 12, NEW.idPrimario, 'SaldoObs', OLD.SaldoObs, NEW.SaldoObs );
	execute procedure set_log( 12, NEW.idPrimario, 'Conduta', substring( OLD.Conduta from 1 for 255 ), substring( NEW.Conduta from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'Medicacao', substring( OLD.Medicacao from 1 for 255 ), substring( NEW.Medicacao from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'Obs', substring( OLD.Obs from 1 for 255 ), substring( NEW.Obs from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'ContaCons', OLD.ContaCons, NEW.ContaCons );
	execute procedure set_log( 12, NEW.idPrimario, 'ContaPTra', OLD.ContaPTra, NEW.ContaPTra );
	execute procedure set_log( 12, NEW.idPrimario, 'QuemAgRet', OLD.QuemAgRet, NEW.QuemAgRet );
	execute procedure set_log( 12, NEW.idPrimario, 'QdoAgRet', OLD.QdoAgRet, NEW.QdoAgRet );
	execute procedure set_log( 12, NEW.idPrimario, 'DataRet', OLD.DataRet, NEW.DataRet );
	execute procedure set_log( 12, NEW.idPrimario, 'HoraRet', OLD.HoraRet, NEW.HoraRet );
	execute procedure set_log( 12, NEW.idPrimario, 'TStAgRet', OLD.TStAgRet, NEW.TStAgRet );
	execute procedure set_log( 12, NEW.idPrimario, 'AssesRet', OLD.AssesRet, NEW.AssesRet );
	execute procedure set_log( 12, NEW.idPrimario, 'ObsRet', substring( OLD.ObsRet from 1 for 255 ), substring( NEW.ObsRet from 1 for 255 ) );
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.TiConsulta is distinct from OLD.TiConsulta )  OR 
		( NEW.BoletoMin is distinct from OLD.BoletoMin )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqPlantao
************************************************************/

set term ^;

recreate trigger arqPlantao_LOG for arqPlantao
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
	valorChave='';
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100041 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'DataIni', OLD.DataIni, NEW.DataIni );
	execute procedure set_log( 12, NEW.idPrimario, 'DataFim', OLD.DataFim, NEW.DataFim );
	execute procedure set_log( 12, NEW.idPrimario, 'TDiaSem', OLD.TDiaSem, NEW.TDiaSem );
	execute procedure set_log( 12, NEW.idPrimario, 'Usuario', OLD.Usuario, NEW.Usuario );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqFornecedor
************************************************************/

set term ^;

recreate trigger arqFornecedor_LOG for arqFornecedor
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Nome,'' );
else
	valorChave = coalesce( NEW.Nome,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100042 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Nome', OLD.Nome, NEW.Nome );
	execute procedure set_log( 12, NEW.idPrimario, 'Apelido', OLD.Apelido, NEW.Apelido );
	execute procedure set_log( 12, NEW.idPrimario, 'TPFPJ', OLD.TPFPJ, NEW.TPFPJ );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_CEP', OLD.Ende_CEP, NEW.Ende_CEP );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Endereco', OLD.Ende_Endereco, NEW.Ende_Endereco );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Bairro', OLD.Ende_Bairro, NEW.Ende_Bairro );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Cidade', OLD.Ende_Cidade, NEW.Ende_Cidade );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Telefone', OLD.Ende_Telefone, NEW.Ende_Telefone );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_DDDCelular', OLD.Ende_DDDCelular, NEW.Ende_DDDCelular );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Celular', OLD.Ende_Celular, NEW.Ende_Celular );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_WhatsApp', OLD.Ende_WhatsApp, NEW.Ende_WhatsApp );
	execute procedure set_log( 12, NEW.idPrimario, 'CNPJ', OLD.CNPJ, NEW.CNPJ );
	execute procedure set_log( 12, NEW.idPrimario, 'InscEstad', OLD.InscEstad, NEW.InscEstad );
	execute procedure set_log( 12, NEW.idPrimario, 'InscMunic', OLD.InscMunic, NEW.InscMunic );
	execute procedure set_log( 12, NEW.idPrimario, 'CPF', OLD.CPF, NEW.CPF );
	execute procedure set_log( 12, NEW.idPrimario, 'Identidade', OLD.Identidade, NEW.Identidade );
	execute procedure set_log( 12, NEW.idPrimario, 'Orgao', OLD.Orgao, NEW.Orgao );
	execute procedure set_log( 12, NEW.idPrimario, 'Emissao', OLD.Emissao, NEW.Emissao );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
	execute procedure set_log( 12, NEW.idPrimario, 'Obs', substring( OLD.Obs from 1 for 255 ), substring( NEW.Obs from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'Desde', OLD.Desde, NEW.Desde );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqFormaPg
************************************************************/

set term ^;

recreate trigger arqFormaPg_LOG for arqFormaPg
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.FormaPg,'' );
else
	valorChave = coalesce( NEW.FormaPg,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100044 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'FormaPg', OLD.FormaPg, NEW.FormaPg );
	execute procedure set_log( 12, NEW.idPrimario, 'PodeEntra', OLD.PodeEntra, NEW.PodeEntra );
	execute procedure set_log( 12, NEW.idPrimario, 'Dinheiro', OLD.Dinheiro, NEW.Dinheiro );
	execute procedure set_log( 12, NEW.idPrimario, 'Boleto', OLD.Boleto, NEW.Boleto );
	execute procedure set_log( 12, NEW.idPrimario, 'Cartao', OLD.Cartao, NEW.Cartao );
	execute procedure set_log( 12, NEW.idPrimario, 'Dias', OLD.Dias, NEW.Dias );
	execute procedure set_log( 12, NEW.idPrimario, 'TaxaDeb', OLD.TaxaDeb, NEW.TaxaDeb );
	execute procedure set_log( 12, NEW.idPrimario, 'Taxa2', OLD.Taxa2, NEW.Taxa2 );
	execute procedure set_log( 12, NEW.idPrimario, 'Taxa3', OLD.Taxa3, NEW.Taxa3 );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqRecorrente
************************************************************/

set term ^;

recreate trigger arqRecorrente_LOG for arqRecorrente
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
	valorChave='';
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100046 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'Fornecedor', OLD.Fornecedor, NEW.Fornecedor );
	execute procedure set_log( 12, NEW.idPrimario, 'Pessoa', OLD.Pessoa, NEW.Pessoa );
	execute procedure set_log( 12, NEW.idPrimario, 'TPgRec', OLD.TPgRec, NEW.TPgRec );
	execute procedure set_log( 12, NEW.idPrimario, 'TCompete', OLD.TCompete, NEW.TCompete );
	execute procedure set_log( 12, NEW.idPrimario, 'Venc', OLD.Venc, NEW.Venc );
	execute procedure set_log( 12, NEW.idPrimario, 'Antecipa', OLD.Antecipa, NEW.Antecipa );
	execute procedure set_log( 12, NEW.idPrimario, 'Valor', OLD.Valor, NEW.Valor );
	execute procedure set_log( 12, NEW.idPrimario, 'Estimado', OLD.Estimado, NEW.Estimado );
	execute procedure set_log( 12, NEW.idPrimario, 'TFCobra', OLD.TFCobra, NEW.TFCobra );
	execute procedure set_log( 12, NEW.idPrimario, 'Historico', OLD.Historico, NEW.Historico );
	execute procedure set_log( 12, NEW.idPrimario, 'SubPlano', OLD.SubPlano, NEW.SubPlano );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqCliMidia
************************************************************/

set term ^;

recreate trigger arqCliMidia_LOG for arqCliMidia
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
select coalesce( Clinica_Clinica, ' ' ) || '-' || coalesce( Midia_Midia, ' ' ) from v_arqCliMidia where idPrimario=( case when(deleting) then (OLD.idPrimario) else (NEW.idPrimario) end ) into :valorChave;
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100047 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'Midia', OLD.Midia, NEW.Midia );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqComCall
************************************************************/

set term ^;

recreate trigger arqComCall_LOG for arqComCall
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
select coalesce( Clinica_Clinica, ' ' ) || '-' || coalesce( Mes, ' ' ) from v_arqComCall where idPrimario=( case when(deleting) then (OLD.idPrimario) else (NEW.idPrimario) end ) into :valorChave;
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100049 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'Mes', OLD.Mes, NEW.Mes );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqFxComCall
************************************************************/

set term ^;

recreate trigger arqFxComCall_LOG for arqFxComCall
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
select coalesce( ComCall_Clinica_Clinica, ' ' ) || '-' || coalesce( ComCall_Mes, ' ' ) || '-' || coalesce( Faixa, ' ' ) from v_arqFxComCall where idPrimario=( case when(deleting) then (OLD.idPrimario) else (NEW.idPrimario) end ) into :valorChave;
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100050 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'ComCall', OLD.ComCall, NEW.ComCall );
	execute procedure set_log( 12, NEW.idPrimario, 'Faixa', OLD.Faixa, NEW.Faixa );
	execute procedure set_log( 12, NEW.idPrimario, 'PercAte', OLD.PercAte, NEW.PercAte );
	execute procedure set_log( 12, NEW.idPrimario, 'Comissao', OLD.Comissao, NEW.Comissao );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqUnidade
************************************************************/

set term ^;

recreate trigger arqUnidade_LOG for arqUnidade
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Unidade,'' );
else
	valorChave = coalesce( NEW.Unidade,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100051 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Unidade', OLD.Unidade, NEW.Unidade );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqMedicamen
************************************************************/

set term ^;

recreate trigger arqMedicamen_LOG for arqMedicamen
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Medicamen,'' );
else
	valorChave = coalesce( NEW.Medicamen,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100052 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Medicamen', OLD.Medicamen, NEW.Medicamen );
	execute procedure set_log( 12, NEW.idPrimario, 'Unidade', OLD.Unidade, NEW.Unidade );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqAgRet
************************************************************/

set term ^;

recreate trigger arqAgRet_LOG for arqAgRet
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
select coalesce( Clinica_Clinica, ' ' ) || '-' || coalesce( Data, ' ' ) || '-' || coalesce( Hora, ' ' ) from v_arqAgRet where idPrimario=( case when(deleting) then (OLD.idPrimario) else (NEW.idPrimario) end ) into :valorChave;
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100053 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'Data', OLD.Data, NEW.Data );
	execute procedure set_log( 12, NEW.idPrimario, 'Hora', OLD.Hora, NEW.Hora );
	execute procedure set_log( 12, NEW.idPrimario, 'Consulta', OLD.Consulta, NEW.Consulta );
	execute procedure set_log( 12, NEW.idPrimario, 'Pessoa', OLD.Pessoa, NEW.Pessoa );
	execute procedure set_log( 12, NEW.idPrimario, 'TStAgRet', OLD.TStAgRet, NEW.TStAgRet );
	execute procedure set_log( 12, NEW.idPrimario, 'Assessor', OLD.Assessor, NEW.Assessor );
	execute procedure set_log( 12, NEW.idPrimario, 'Obs', substring( OLD.Obs from 1 for 255 ), substring( NEW.Obs from 1 for 255 ) );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqCMedica
************************************************************/

set term ^;

recreate trigger arqCMedica_LOG for arqCMedica
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
	valorChave='';
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100054 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Consulta', OLD.Consulta, NEW.Consulta );
	execute procedure set_log( 12, NEW.idPrimario, 'Medicamen', OLD.Medicamen, NEW.Medicamen );
	execute procedure set_log( 12, NEW.idPrimario, 'Qtd', OLD.Qtd, NEW.Qtd );
	execute procedure set_log( 12, NEW.idPrimario, 'Lote', OLD.Lote, NEW.Lote );
	execute procedure set_log( 12, NEW.idPrimario, 'DataSepara', OLD.DataSepara, NEW.DataSepara );
	execute procedure set_log( 12, NEW.idPrimario, 'QtdEntreg', OLD.QtdEntreg, NEW.QtdEntreg );
	execute procedure set_log( 12, NEW.idPrimario, 'ObsEntreg', OLD.ObsEntreg, NEW.ObsEntreg );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqLote
************************************************************/

set term ^;

recreate trigger arqLote_LOG for arqLote
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
select coalesce( Medicamen_Medicamen, ' ' ) || '-' || coalesce( Lote, ' ' ) from v_arqLote where idPrimario=( case when(deleting) then (OLD.idPrimario) else (NEW.idPrimario) end ) into :valorChave;
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100055 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Medicamen', OLD.Medicamen, NEW.Medicamen );
	execute procedure set_log( 12, NEW.idPrimario, 'Lote', OLD.Lote, NEW.Lote );
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'Fornecedor', OLD.Fornecedor, NEW.Fornecedor );
	execute procedure set_log( 12, NEW.idPrimario, 'Fabrica', OLD.Fabrica, NEW.Fabrica );
	execute procedure set_log( 12, NEW.idPrimario, 'Validade', OLD.Validade, NEW.Validade );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqMovEstoque
************************************************************/

set term ^;

recreate trigger arqMovEstoque_LOG for arqMovEstoque
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Num,'' );
else
	valorChave = coalesce( NEW.Num,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100056 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Num', OLD.Num, NEW.Num );
	execute procedure set_log( 12, NEW.idPrimario, 'Data', OLD.Data, NEW.Data );
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'Fornecedor', OLD.Fornecedor, NEW.Fornecedor );
	execute procedure set_log( 12, NEW.idPrimario, 'NumDoc', OLD.NumDoc, NEW.NumDoc );
	execute procedure set_log( 12, NEW.idPrimario, 'Obs', substring( OLD.Obs from 1 for 255 ), substring( NEW.Obs from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'Fechado', OLD.Fechado, NEW.Fechado );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqItemMov
************************************************************/

set term ^;

recreate trigger arqItemMov_LOG for arqItemMov
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
select coalesce( MovEstoque_Num, ' ' ) || '-' || coalesce( Item, ' ' ) from v_arqItemMov where idPrimario=( case when(deleting) then (OLD.idPrimario) else (NEW.idPrimario) end ) into :valorChave;
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100057 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'MovEstoque', OLD.MovEstoque, NEW.MovEstoque );
	execute procedure set_log( 12, NEW.idPrimario, 'Item', OLD.Item, NEW.Item );
	execute procedure set_log( 12, NEW.idPrimario, 'Lote', OLD.Lote, NEW.Lote );
	execute procedure set_log( 12, NEW.idPrimario, 'TMov', OLD.TMov, NEW.TMov );
	execute procedure set_log( 12, NEW.idPrimario, 'Qtd', OLD.Qtd, NEW.Qtd );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para Log de arqUsuCCor
************************************************************/

set term ^;

recreate trigger arqUsuCCor_LOG for arqUsuCCor
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
select coalesce( Usuario_Usuario, ' ' ) || '-' || coalesce( CCor_Nome, ' ' ) from v_arqUsuCCor where idPrimario=( case when(deleting) then (OLD.idPrimario) else (NEW.idPrimario) end ) into :valorChave;
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100059 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Usuario', OLD.Usuario, NEW.Usuario );
	execute procedure set_log( 12, NEW.idPrimario, 'CCor', OLD.CCor, NEW.CCor );
end
end^

set term ;^

commit;


/************************************************************
	TRIGGERS DE TOTALIZADORES
************************************************************/



/************************************************************
	Trigger para arqItLogEmail: Quantos - atua em arqLogEmail.Lidos
************************************************************/

set term ^;

recreate trigger arqLogEmail_Lidos for arqItLogEmail
active after Insert or Update or Delete
as
begin
if( updating or inserting ) then begin
if( ( NEW.Lido is not null ) ) then begin
update arqLogEmail set arqLogEmail.Lidos = arqLogEmail.Lidos + 
1
 where arqLogEmail.IDPRIMARIO = NEW.LogEmail;
end
end
if( updating or deleting ) then begin
if( ( OLD.Lido is not null ) ) then begin
update arqLogEmail set arqLogEmail.Lidos = arqLogEmail.Lidos - 
1
 where arqLogEmail.IDPRIMARIO = OLD.LogEmail;
end
end
end^

set term ;^
commit;


/************************************************************
	Trigger para arqParcela: Total - atua em arqConta.TrgValor
************************************************************/

set term ^;

recreate trigger arqConta_TrgValor for arqParcela
active after Insert or Update or Delete
as
begin
if( updating or inserting ) then begin
update arqConta set arqConta.TrgValor = arqConta.TrgValor + 
NEW.Valor where arqConta.IDPRIMARIO = NEW.Conta;
end
if( updating or deleting ) then begin
update arqConta set arqConta.TrgValor = arqConta.TrgValor - 
OLD.Valor where arqConta.IDPRIMARIO = OLD.Conta;
end
end^

set term ;^
commit;


/************************************************************
	Trigger para arqParcela: Total - atua em arqConta.TrgValLiq
************************************************************/

set term ^;

recreate trigger arqConta_TrgValLiq for arqParcela
active after Insert or Update or Delete
as
begin
if( updating or inserting ) then begin
update arqConta set arqConta.TrgValLiq = arqConta.TrgValLiq + 
NEW.ValorLiq where arqConta.IDPRIMARIO = NEW.Conta;
end
if( updating or deleting ) then begin
update arqConta set arqConta.TrgValLiq = arqConta.TrgValLiq - 
OLD.ValorLiq where arqConta.IDPRIMARIO = OLD.Conta;
end
end^

set term ;^
commit;


/************************************************************
	Trigger para arqParcela: Quantos - atua em arqConta.TrgQtdParc
************************************************************/

set term ^;

recreate trigger arqConta_TrgQtdParc for arqParcela
active after Insert or Update or Delete
as
begin
if( updating or inserting ) then begin
update arqConta set arqConta.TrgQtdParc = arqConta.TrgQtdParc + 
1
 where arqConta.IDPRIMARIO = NEW.Conta;
end
if( updating or deleting ) then begin
update arqConta set arqConta.TrgQtdParc = arqConta.TrgQtdParc - 
1
 where arqConta.IDPRIMARIO = OLD.Conta;
end
end^

set term ;^
commit;


/************************************************************
	Trigger para arqParcela: Quantos - atua em arqConta.TrgQParcPg
************************************************************/

set term ^;

recreate trigger arqConta_TrgQParcPg for arqParcela
active after Insert or Update or Delete
as
begin
if( updating or inserting ) then begin
if( ( NEW.DataPagto is not null ) ) then begin
update arqConta set arqConta.TrgQParcPg = arqConta.TrgQParcPg + 
1
 where arqConta.IDPRIMARIO = NEW.Conta;
end
end
if( updating or deleting ) then begin
if( ( OLD.DataPagto is not null ) ) then begin
update arqConta set arqConta.TrgQParcPg = arqConta.TrgQParcPg - 
1
 where arqConta.IDPRIMARIO = OLD.Conta;
end
end
end^

set term ;^
commit;


/************************************************************
	Trigger para arqParcela: Inferior - atua em arqConta.ProxVenc
************************************************************/

set term ^;

recreate trigger arqConta_ProxVenc for arqParcela
active after Insert or Update or Delete
as
begin
if( updating or inserting ) then
update arqConta set arqConta.ProxVenc = (
( COALESCE( ( SELECT MIN ( Vencimento ) FROM arqParcela
 WHERE arqParcela.Conta=arqConta.IDPRIMARIO AND DataPagto is null ), null ) ) )
where arqConta.IDPRIMARIO = NEW.Conta;
if( ( updating and ( OLD.idPrimario <> NEW.idPrimario ) ) or deleting ) then
update arqConta set arqConta.ProxVenc = (
( COALESCE( ( SELECT MIN ( Vencimento ) FROM arqParcela
 WHERE arqParcela.Conta=arqConta.IDPRIMARIO AND DataPagto is null ), null ) ) )
where arqConta.IDPRIMARIO = OLD.Conta;
end^

set term ;^
commit;


/************************************************************
	Trigger para arqParcela: Total - atua em arqConta.TrgPago
************************************************************/

set term ^;

recreate trigger arqConta_TrgPago for arqParcela
active after Insert or Update or Delete
as
begin
if( updating or inserting ) then begin
if( ( NEW.DataPagto is not null ) ) then begin
update arqConta set arqConta.TrgPago = arqConta.TrgPago + 
NEW.ValorLiq where arqConta.IDPRIMARIO = NEW.Conta;
end
end
if( updating or deleting ) then begin
if( ( OLD.DataPagto is not null ) ) then begin
update arqConta set arqConta.TrgPago = arqConta.TrgPago - 
OLD.ValorLiq where arqConta.IDPRIMARIO = OLD.Conta;
end
end
end^

set term ;^
commit;


/************************************************************
	Trigger para arqFxComCall: Quantos - atua em arqComCall.TrgQtoFx
************************************************************/

set term ^;

recreate trigger arqComCall_TrgQtoFx for arqFxComCall
active after Insert or Update or Delete
as
begin
if( updating or inserting ) then begin
update arqComCall set arqComCall.TrgQtoFx = arqComCall.TrgQtoFx + 
1
 where arqComCall.IDPRIMARIO = NEW.ComCall;
end
if( updating or deleting ) then begin
update arqComCall set arqComCall.TrgQtoFx = arqComCall.TrgQtoFx - 
1
 where arqComCall.IDPRIMARIO = OLD.ComCall;
end
end^

set term ;^
commit;


/************************************************************
	Trigger para arqLote: Total - atua em arqMedicamen.TrgItLote
************************************************************/

set term ^;

recreate trigger arqMedicamen_TrgItLote for arqLote
active after Insert or Update or Delete
as
begin
if( updating or inserting ) then begin
update arqMedicamen set arqMedicamen.TrgItLote = arqMedicamen.TrgItLote + 
NEW.TrgItMov where arqMedicamen.IDPRIMARIO = NEW.Medicamen;
end
if( updating or deleting ) then begin
update arqMedicamen set arqMedicamen.TrgItLote = arqMedicamen.TrgItLote - 
OLD.TrgItMov where arqMedicamen.IDPRIMARIO = OLD.Medicamen;
end
end^

set term ;^
commit;


/************************************************************
	Trigger para arqLote: Total - atua em arqMedicamen.TrgCMLote
************************************************************/

set term ^;

recreate trigger arqMedicamen_TrgCMLote for arqLote
active after Insert or Update or Delete
as
begin
if( updating or inserting ) then begin
update arqMedicamen set arqMedicamen.TrgCMLote = arqMedicamen.TrgCMLote + 
NEW.TrgCMedica where arqMedicamen.IDPRIMARIO = NEW.Medicamen;
end
if( updating or deleting ) then begin
update arqMedicamen set arqMedicamen.TrgCMLote = arqMedicamen.TrgCMLote - 
OLD.TrgCMedica where arqMedicamen.IDPRIMARIO = OLD.Medicamen;
end
end^

set term ;^
commit;


/************************************************************
	Trigger para arqItemMov: Total - atua em arqLote.TrgItMov
************************************************************/

set term ^;

recreate trigger arqLote_TrgItMov for arqItemMov
active after Insert or Update or Delete
as
begin
if( updating or inserting ) then begin
update arqLote set arqLote.TrgItMov = arqLote.TrgItMov + 
NEW.QtdCalc where arqLote.IDPRIMARIO = NEW.Lote;
end
if( updating or deleting ) then begin
update arqLote set arqLote.TrgItMov = arqLote.TrgItMov - 
OLD.QtdCalc where arqLote.IDPRIMARIO = OLD.Lote;
end
end^

set term ;^
commit;


/************************************************************
	Trigger para arqCMedica: Total - atua em arqLote.TrgCMedica
************************************************************/

set term ^;

recreate trigger arqLote_TrgCMedica for arqCMedica
active after Insert or Update or Delete
as
begin
if( updating or inserting ) then begin
update arqLote set arqLote.TrgCMedica = arqLote.TrgCMedica + 
NEW.QtdEntreg where arqLote.IDPRIMARIO = NEW.Lote;
end
if( updating or deleting ) then begin
update arqLote set arqLote.TrgCMedica = arqLote.TrgCMedica - 
OLD.QtdEntreg where arqLote.IDPRIMARIO = OLD.Lote;
end
end^

set term ;^
commit;


/************************************************************
	Trigger para arqCMedica: Total - atua em arqConsulta.TrgQtdM
************************************************************/

set term ^;

recreate trigger arqConsulta_TrgQtdM for arqCMedica
active after Insert or Update or Delete
as
begin
if( updating or inserting ) then begin
update arqConsulta set arqConsulta.TrgQtdM = arqConsulta.TrgQtdM + 
NEW.Qtd where arqConsulta.IDPRIMARIO = NEW.Consulta;
end
if( updating or deleting ) then begin
update arqConsulta set arqConsulta.TrgQtdM = arqConsulta.TrgQtdM - 
OLD.Qtd where arqConsulta.IDPRIMARIO = OLD.Consulta;
end
end^

set term ;^
commit;


/************************************************************
	Trigger para arqCMedica: Total - atua em arqConsulta.TrgQtdMEnt
************************************************************/

set term ^;

recreate trigger arqConsulta_TrgQtdMEnt for arqCMedica
active after Insert or Update or Delete
as
begin
if( updating or inserting ) then begin
update arqConsulta set arqConsulta.TrgQtdMEnt = arqConsulta.TrgQtdMEnt + 
NEW.QtdEntreg where arqConsulta.IDPRIMARIO = NEW.Consulta;
end
if( updating or deleting ) then begin
update arqConsulta set arqConsulta.TrgQtdMEnt = arqConsulta.TrgQtdMEnt - 
OLD.QtdEntreg where arqConsulta.IDPRIMARIO = OLD.Consulta;
end
end^

set term ;^
commit;


/************************************************************
	Trigger para arqConsulta: Quantos - atua em arqPessoa.QtasComple
************************************************************/

set term ^;

recreate trigger arqPessoa_QtasComple for arqConsulta
active after Insert or Update or Delete
as
begin
if( updating or inserting ) then begin
update arqPessoa set arqPessoa.QtasComple = arqPessoa.QtasComple + 
1
 where arqPessoa.IDPRIMARIO = NEW.Pessoa;
end
if( updating or deleting ) then begin
update arqPessoa set arqPessoa.QtasComple = arqPessoa.QtasComple - 
1
 where arqPessoa.IDPRIMARIO = OLD.Pessoa;
end
end^

set term ;^
commit;

