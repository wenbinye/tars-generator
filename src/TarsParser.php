<?php

/*
 * Generated from Tars.g4 by ANTLR 4.8
 */

namespace tars {
	use Antlr\Antlr4\Runtime\Atn\ATN;
	use Antlr\Antlr4\Runtime\Atn\ATNDeserializer;
	use Antlr\Antlr4\Runtime\Atn\ParserATNSimulator;
	use Antlr\Antlr4\Runtime\Dfa\DFA;
	use Antlr\Antlr4\Runtime\Error\Exceptions\FailedPredicateException;
	use Antlr\Antlr4\Runtime\Error\Exceptions\NoViableAltException;
	use Antlr\Antlr4\Runtime\PredictionContexts\PredictionContextCache;
	use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;
	use Antlr\Antlr4\Runtime\RuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\TokenStream;
	use Antlr\Antlr4\Runtime\Vocabulary;
	use Antlr\Antlr4\Runtime\VocabularyImpl;
	use Antlr\Antlr4\Runtime\RuntimeMetaData;
	use Antlr\Antlr4\Runtime\Parser;

	final class TarsParser extends Parser
	{
		public const T__0 = 1, T__1 = 2, T__2 = 3, T__3 = 4, T__4 = 5, T__5 = 6, 
               T__6 = 7, T__7 = 8, T__8 = 9, T__9 = 10, T__10 = 11, T__11 = 12, 
               T__12 = 13, T__13 = 14, T__14 = 15, T__15 = 16, T__16 = 17, 
               T__17 = 18, T__18 = 19, T__19 = 20, T__20 = 21, T__21 = 22, 
               T__22 = 23, T__23 = 24, T__24 = 25, T__25 = 26, T__26 = 27, 
               T__27 = 28, T__28 = 29, T__29 = 30, T__30 = 31, T__31 = 32, 
               T__32 = 33, T__33 = 34, T__34 = 35, T__35 = 36, T__36 = 37, 
               Identifier = 38, Int = 39, Float = 40, String = 41, LineComment = 42, 
               BlockComment = 43, WS = 44;

		public const RULE_root = 0, RULE_includeDef = 1, RULE_fileName = 2, RULE_namespaceDef = 3, 
               RULE_moduleName = 4, RULE_definition = 5, RULE_constDef = 6, 
               RULE_constName = 7, RULE_enum = 8, RULE_enumName = 9, RULE_enumeratorList = 10, 
               RULE_enumerator = 11, RULE_enumMember = 12, RULE_struct = 13, 
               RULE_structName = 14, RULE_structMember = 15, RULE_fieldOrder = 16, 
               RULE_fieldRequire = 17, RULE_fieldName = 18, RULE_interfaceDef = 19, 
               RULE_interfaceName = 20, RULE_operation = 21, RULE_operationName = 22, 
               RULE_paramList = 23, RULE_param = 24, RULE_paramName = 25, 
               RULE_keyMap = 26, RULE_keyList = 27, RULE_keyName = 28, RULE_type = 29, 
               RULE_vectorType = 30, RULE_mapType = 31, RULE_customType = 32, 
               RULE_value = 33, RULE_primitiveType = 34, RULE_voidType = 35, 
               RULE_boolType = 36, RULE_byteType = 37, RULE_shortType = 38, 
               RULE_intType = 39, RULE_longType = 40, RULE_floatType = 41, 
               RULE_doubleType = 42, RULE_stringType = 43;

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'root', 'includeDef', 'fileName', 'namespaceDef', 'moduleName', 'definition', 
			'constDef', 'constName', 'enum', 'enumName', 'enumeratorList', 'enumerator', 
			'enumMember', 'struct', 'structName', 'structMember', 'fieldOrder', 'fieldRequire', 
			'fieldName', 'interfaceDef', 'interfaceName', 'operation', 'operationName', 
			'paramList', 'param', 'paramName', 'keyMap', 'keyList', 'keyName', 'type', 
			'vectorType', 'mapType', 'customType', 'value', 'primitiveType', 'voidType', 
			'boolType', 'byteType', 'shortType', 'intType', 'longType', 'floatType', 
			'doubleType', 'stringType'
		];

		/**
		 * @var array<string|null>
		 */
		private const LITERAL_NAMES = [
		    null, "'#include'", "'module'", "'{'", "';'", "'}'", "'const'", "'='", 
		    "'enum'", "','", "'struct'", "'require'", "'optional'", "'interface'", 
		    "'('", "')'", "'out'", "'routekey'", "'key'", "'['", "']'", "'vector'", 
		    "'<'", "'>'", "'map'", "'.'", "'void'", "'bool'", "'byte'", "'unsigned byte'", 
		    "'short'", "'unsigned short'", "'int'", "'unsigned int'", "'long'", 
		    "'float'", "'double'", "'string'"
		];

		/**
		 * @var array<string>
		 */
		private const SYMBOLIC_NAMES = [
		    null, null, null, null, null, null, null, null, null, null, null, 
		    null, null, null, null, null, null, null, null, null, null, null, 
		    null, null, null, null, null, null, null, null, null, null, null, 
		    null, null, null, null, null, "Identifier", "Int", "Float", "String", 
		    "LineComment", "BlockComment", "WS"
		];

		/**
		 * @var string
		 */
		private const SERIALIZED_ATN =
			"\u{3}\u{608B}\u{A72A}\u{8133}\u{B9ED}\u{417C}\u{3BE7}\u{7786}\u{5964}" .
		    "\u{3}\u{2E}\u{145}\u{4}\u{2}\u{9}\u{2}\u{4}\u{3}\u{9}\u{3}\u{4}\u{4}" .
		    "\u{9}\u{4}\u{4}\u{5}\u{9}\u{5}\u{4}\u{6}\u{9}\u{6}\u{4}\u{7}\u{9}" .
		    "\u{7}\u{4}\u{8}\u{9}\u{8}\u{4}\u{9}\u{9}\u{9}\u{4}\u{A}\u{9}\u{A}" .
		    "\u{4}\u{B}\u{9}\u{B}\u{4}\u{C}\u{9}\u{C}\u{4}\u{D}\u{9}\u{D}\u{4}" .
		    "\u{E}\u{9}\u{E}\u{4}\u{F}\u{9}\u{F}\u{4}\u{10}\u{9}\u{10}\u{4}\u{11}" .
		    "\u{9}\u{11}\u{4}\u{12}\u{9}\u{12}\u{4}\u{13}\u{9}\u{13}\u{4}\u{14}" .
		    "\u{9}\u{14}\u{4}\u{15}\u{9}\u{15}\u{4}\u{16}\u{9}\u{16}\u{4}\u{17}" .
		    "\u{9}\u{17}\u{4}\u{18}\u{9}\u{18}\u{4}\u{19}\u{9}\u{19}\u{4}\u{1A}" .
		    "\u{9}\u{1A}\u{4}\u{1B}\u{9}\u{1B}\u{4}\u{1C}\u{9}\u{1C}\u{4}\u{1D}" .
		    "\u{9}\u{1D}\u{4}\u{1E}\u{9}\u{1E}\u{4}\u{1F}\u{9}\u{1F}\u{4}\u{20}" .
		    "\u{9}\u{20}\u{4}\u{21}\u{9}\u{21}\u{4}\u{22}\u{9}\u{22}\u{4}\u{23}" .
		    "\u{9}\u{23}\u{4}\u{24}\u{9}\u{24}\u{4}\u{25}\u{9}\u{25}\u{4}\u{26}" .
		    "\u{9}\u{26}\u{4}\u{27}\u{9}\u{27}\u{4}\u{28}\u{9}\u{28}\u{4}\u{29}" .
		    "\u{9}\u{29}\u{4}\u{2A}\u{9}\u{2A}\u{4}\u{2B}\u{9}\u{2B}\u{4}\u{2C}" .
		    "\u{9}\u{2C}\u{4}\u{2D}\u{9}\u{2D}\u{3}\u{2}\u{7}\u{2}\u{5C}\u{A}\u{2}" .
		    "\u{C}\u{2}\u{E}\u{2}\u{5F}\u{B}\u{2}\u{3}\u{2}\u{7}\u{2}\u{62}\u{A}" .
		    "\u{2}\u{C}\u{2}\u{E}\u{2}\u{65}\u{B}\u{2}\u{3}\u{3}\u{3}\u{3}\u{3}" .
		    "\u{3}\u{3}\u{4}\u{3}\u{4}\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}" .
		    "\u{3}\u{5}\u{3}\u{5}\u{7}\u{5}\u{72}\u{A}\u{5}\u{C}\u{5}\u{E}\u{5}" .
		    "\u{75}\u{B}\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}\u{6}\u{3}\u{6}\u{3}\u{7}" .
		    "\u{3}\u{7}\u{3}\u{7}\u{3}\u{7}\u{3}\u{7}\u{5}\u{7}\u{80}\u{A}\u{7}" .
		    "\u{3}\u{8}\u{3}\u{8}\u{5}\u{8}\u{84}\u{A}\u{8}\u{3}\u{8}\u{3}\u{8}" .
		    "\u{3}\u{8}\u{3}\u{8}\u{3}\u{9}\u{3}\u{9}\u{3}\u{A}\u{3}\u{A}\u{3}" .
		    "\u{A}\u{3}\u{A}\u{7}\u{A}\u{90}\u{A}\u{A}\u{C}\u{A}\u{E}\u{A}\u{93}" .
		    "\u{B}\u{A}\u{3}\u{A}\u{3}\u{A}\u{3}\u{B}\u{3}\u{B}\u{3}\u{C}\u{3}" .
		    "\u{C}\u{3}\u{C}\u{3}\u{C}\u{3}\u{C}\u{3}\u{C}\u{3}\u{C}\u{5}\u{C}" .
		    "\u{A0}\u{A}\u{C}\u{7}\u{C}\u{A2}\u{A}\u{C}\u{C}\u{C}\u{E}\u{C}\u{A5}" .
		    "\u{B}\u{C}\u{3}\u{D}\u{3}\u{D}\u{3}\u{D}\u{5}\u{D}\u{AA}\u{A}\u{D}" .
		    "\u{3}\u{E}\u{3}\u{E}\u{3}\u{F}\u{3}\u{F}\u{3}\u{F}\u{3}\u{F}\u{7}" .
		    "\u{F}\u{B2}\u{A}\u{F}\u{C}\u{F}\u{E}\u{F}\u{B5}\u{B}\u{F}\u{3}\u{F}" .
		    "\u{3}\u{F}\u{3}\u{10}\u{3}\u{10}\u{3}\u{11}\u{3}\u{11}\u{3}\u{11}" .
		    "\u{3}\u{11}\u{3}\u{11}\u{3}\u{11}\u{5}\u{11}\u{C1}\u{A}\u{11}\u{3}" .
		    "\u{11}\u{3}\u{11}\u{3}\u{12}\u{3}\u{12}\u{3}\u{13}\u{3}\u{13}\u{3}" .
		    "\u{14}\u{3}\u{14}\u{3}\u{15}\u{3}\u{15}\u{3}\u{15}\u{3}\u{15}\u{7}" .
		    "\u{15}\u{CF}\u{A}\u{15}\u{C}\u{15}\u{E}\u{15}\u{D2}\u{B}\u{15}\u{3}" .
		    "\u{15}\u{3}\u{15}\u{3}\u{16}\u{3}\u{16}\u{3}\u{17}\u{3}\u{17}\u{3}" .
		    "\u{17}\u{3}\u{17}\u{5}\u{17}\u{DC}\u{A}\u{17}\u{3}\u{17}\u{3}\u{17}" .
		    "\u{3}\u{17}\u{3}\u{18}\u{3}\u{18}\u{3}\u{19}\u{3}\u{19}\u{3}\u{19}" .
		    "\u{3}\u{19}\u{3}\u{19}\u{3}\u{19}\u{7}\u{19}\u{E9}\u{A}\u{19}\u{C}" .
		    "\u{19}\u{E}\u{19}\u{EC}\u{B}\u{19}\u{3}\u{1A}\u{5}\u{1A}\u{EF}\u{A}" .
		    "\u{1A}\u{3}\u{1A}\u{5}\u{1A}\u{F2}\u{A}\u{1A}\u{3}\u{1A}\u{3}\u{1A}" .
		    "\u{3}\u{1A}\u{3}\u{1B}\u{3}\u{1B}\u{3}\u{1C}\u{3}\u{1C}\u{3}\u{1C}" .
		    "\u{3}\u{1C}\u{3}\u{1C}\u{3}\u{1C}\u{3}\u{1C}\u{3}\u{1D}\u{3}\u{1D}" .
		    "\u{3}\u{1D}\u{3}\u{1D}\u{3}\u{1D}\u{3}\u{1D}\u{7}\u{1D}\u{106}\u{A}" .
		    "\u{1D}\u{C}\u{1D}\u{E}\u{1D}\u{109}\u{B}\u{1D}\u{3}\u{1E}\u{3}\u{1E}" .
		    "\u{3}\u{1F}\u{3}\u{1F}\u{3}\u{1F}\u{3}\u{1F}\u{5}\u{1F}\u{111}\u{A}" .
		    "\u{1F}\u{3}\u{20}\u{3}\u{20}\u{3}\u{20}\u{3}\u{20}\u{3}\u{20}\u{3}" .
		    "\u{21}\u{3}\u{21}\u{3}\u{21}\u{3}\u{21}\u{3}\u{21}\u{3}\u{21}\u{3}" .
		    "\u{21}\u{3}\u{22}\u{3}\u{22}\u{3}\u{22}\u{3}\u{22}\u{3}\u{22}\u{5}" .
		    "\u{22}\u{124}\u{A}\u{22}\u{3}\u{23}\u{3}\u{23}\u{3}\u{24}\u{3}\u{24}" .
		    "\u{3}\u{24}\u{3}\u{24}\u{3}\u{24}\u{3}\u{24}\u{3}\u{24}\u{3}\u{24}" .
		    "\u{3}\u{24}\u{5}\u{24}\u{131}\u{A}\u{24}\u{3}\u{25}\u{3}\u{25}\u{3}" .
		    "\u{26}\u{3}\u{26}\u{3}\u{27}\u{3}\u{27}\u{3}\u{28}\u{3}\u{28}\u{3}" .
		    "\u{29}\u{3}\u{29}\u{3}\u{2A}\u{3}\u{2A}\u{3}\u{2B}\u{3}\u{2B}\u{3}" .
		    "\u{2C}\u{3}\u{2C}\u{3}\u{2D}\u{3}\u{2D}\u{3}\u{2D}\u{2}\u{5}\u{16}" .
		    "\u{30}\u{38}\u{2E}\u{2}\u{4}\u{6}\u{8}\u{A}\u{C}\u{E}\u{10}\u{12}" .
		    "\u{14}\u{16}\u{18}\u{1A}\u{1C}\u{1E}\u{20}\u{22}\u{24}\u{26}\u{28}" .
		    "\u{2A}\u{2C}\u{2E}\u{30}\u{32}\u{34}\u{36}\u{38}\u{3A}\u{3C}\u{3E}" .
		    "\u{40}\u{42}\u{44}\u{46}\u{48}\u{4A}\u{4C}\u{4E}\u{50}\u{52}\u{54}" .
		    "\u{56}\u{58}\u{2}\u{7}\u{3}\u{2}\u{D}\u{E}\u{3}\u{2}\u{29}\u{2B}\u{3}" .
		    "\u{2}\u{1E}\u{1F}\u{3}\u{2}\u{20}\u{21}\u{3}\u{2}\u{22}\u{23}\u{2}" .
		    "\u{138}\u{2}\u{5D}\u{3}\u{2}\u{2}\u{2}\u{4}\u{66}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{6}\u{69}\u{3}\u{2}\u{2}\u{2}\u{8}\u{6B}\u{3}\u{2}\u{2}\u{2}\u{A}" .
		    "\u{78}\u{3}\u{2}\u{2}\u{2}\u{C}\u{7F}\u{3}\u{2}\u{2}\u{2}\u{E}\u{81}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{10}\u{89}\u{3}\u{2}\u{2}\u{2}\u{12}\u{8B}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{14}\u{96}\u{3}\u{2}\u{2}\u{2}\u{16}\u{98}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{18}\u{A6}\u{3}\u{2}\u{2}\u{2}\u{1A}\u{AB}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{1C}\u{AD}\u{3}\u{2}\u{2}\u{2}\u{1E}\u{B8}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{20}\u{BA}\u{3}\u{2}\u{2}\u{2}\u{22}\u{C4}\u{3}\u{2}\u{2}\u{2}\u{24}" .
		    "\u{C6}\u{3}\u{2}\u{2}\u{2}\u{26}\u{C8}\u{3}\u{2}\u{2}\u{2}\u{28}\u{CA}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{2A}\u{D5}\u{3}\u{2}\u{2}\u{2}\u{2C}\u{D7}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{2E}\u{E0}\u{3}\u{2}\u{2}\u{2}\u{30}\u{E2}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{32}\u{EE}\u{3}\u{2}\u{2}\u{2}\u{34}\u{F6}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{36}\u{F8}\u{3}\u{2}\u{2}\u{2}\u{38}\u{FF}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{3A}\u{10A}\u{3}\u{2}\u{2}\u{2}\u{3C}\u{110}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{3E}\u{112}\u{3}\u{2}\u{2}\u{2}\u{40}\u{117}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{42}\u{123}\u{3}\u{2}\u{2}\u{2}\u{44}\u{125}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{46}\u{130}\u{3}\u{2}\u{2}\u{2}\u{48}\u{132}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{4A}\u{134}\u{3}\u{2}\u{2}\u{2}\u{4C}\u{136}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{4E}\u{138}\u{3}\u{2}\u{2}\u{2}\u{50}\u{13A}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{52}\u{13C}\u{3}\u{2}\u{2}\u{2}\u{54}\u{13E}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{56}\u{140}\u{3}\u{2}\u{2}\u{2}\u{58}\u{142}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{5A}\u{5C}\u{5}\u{4}\u{3}\u{2}\u{5B}\u{5A}\u{3}\u{2}\u{2}\u{2}\u{5C}" .
		    "\u{5F}\u{3}\u{2}\u{2}\u{2}\u{5D}\u{5B}\u{3}\u{2}\u{2}\u{2}\u{5D}\u{5E}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{5E}\u{63}\u{3}\u{2}\u{2}\u{2}\u{5F}\u{5D}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{60}\u{62}\u{5}\u{8}\u{5}\u{2}\u{61}\u{60}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{62}\u{65}\u{3}\u{2}\u{2}\u{2}\u{63}\u{61}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{63}\u{64}\u{3}\u{2}\u{2}\u{2}\u{64}\u{3}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{65}\u{63}\u{3}\u{2}\u{2}\u{2}\u{66}\u{67}\u{7}\u{3}\u{2}\u{2}\u{67}" .
		    "\u{68}\u{5}\u{6}\u{4}\u{2}\u{68}\u{5}\u{3}\u{2}\u{2}\u{2}\u{69}\u{6A}" .
		    "\u{7}\u{2B}\u{2}\u{2}\u{6A}\u{7}\u{3}\u{2}\u{2}\u{2}\u{6B}\u{6C}\u{7}" .
		    "\u{4}\u{2}\u{2}\u{6C}\u{6D}\u{5}\u{A}\u{6}\u{2}\u{6D}\u{73}\u{7}\u{5}" .
		    "\u{2}\u{2}\u{6E}\u{6F}\u{5}\u{C}\u{7}\u{2}\u{6F}\u{70}\u{7}\u{6}\u{2}" .
		    "\u{2}\u{70}\u{72}\u{3}\u{2}\u{2}\u{2}\u{71}\u{6E}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{72}\u{75}\u{3}\u{2}\u{2}\u{2}\u{73}\u{71}\u{3}\u{2}\u{2}\u{2}\u{73}" .
		    "\u{74}\u{3}\u{2}\u{2}\u{2}\u{74}\u{76}\u{3}\u{2}\u{2}\u{2}\u{75}\u{73}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{76}\u{77}\u{7}\u{7}\u{2}\u{2}\u{77}\u{9}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{78}\u{79}\u{7}\u{28}\u{2}\u{2}\u{79}\u{B}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{7A}\u{80}\u{5}\u{E}\u{8}\u{2}\u{7B}\u{80}\u{5}\u{12}" .
		    "\u{A}\u{2}\u{7C}\u{80}\u{5}\u{1C}\u{F}\u{2}\u{7D}\u{80}\u{5}\u{28}" .
		    "\u{15}\u{2}\u{7E}\u{80}\u{5}\u{36}\u{1C}\u{2}\u{7F}\u{7A}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{7F}\u{7B}\u{3}\u{2}\u{2}\u{2}\u{7F}\u{7C}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{7F}\u{7D}\u{3}\u{2}\u{2}\u{2}\u{7F}\u{7E}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{80}\u{D}\u{3}\u{2}\u{2}\u{2}\u{81}\u{83}\u{7}\u{8}\u{2}\u{2}\u{82}" .
		    "\u{84}\u{5}\u{46}\u{24}\u{2}\u{83}\u{82}\u{3}\u{2}\u{2}\u{2}\u{83}" .
		    "\u{84}\u{3}\u{2}\u{2}\u{2}\u{84}\u{85}\u{3}\u{2}\u{2}\u{2}\u{85}\u{86}" .
		    "\u{5}\u{10}\u{9}\u{2}\u{86}\u{87}\u{7}\u{9}\u{2}\u{2}\u{87}\u{88}" .
		    "\u{5}\u{44}\u{23}\u{2}\u{88}\u{F}\u{3}\u{2}\u{2}\u{2}\u{89}\u{8A}" .
		    "\u{7}\u{28}\u{2}\u{2}\u{8A}\u{11}\u{3}\u{2}\u{2}\u{2}\u{8B}\u{8C}" .
		    "\u{7}\u{A}\u{2}\u{2}\u{8C}\u{8D}\u{5}\u{14}\u{B}\u{2}\u{8D}\u{91}" .
		    "\u{7}\u{5}\u{2}\u{2}\u{8E}\u{90}\u{5}\u{16}\u{C}\u{2}\u{8F}\u{8E}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{90}\u{93}\u{3}\u{2}\u{2}\u{2}\u{91}\u{8F}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{91}\u{92}\u{3}\u{2}\u{2}\u{2}\u{92}\u{94}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{93}\u{91}\u{3}\u{2}\u{2}\u{2}\u{94}\u{95}\u{7}\u{7}\u{2}" .
		    "\u{2}\u{95}\u{13}\u{3}\u{2}\u{2}\u{2}\u{96}\u{97}\u{7}\u{28}\u{2}" .
		    "\u{2}\u{97}\u{15}\u{3}\u{2}\u{2}\u{2}\u{98}\u{99}\u{8}\u{C}\u{1}\u{2}" .
		    "\u{99}\u{9A}\u{5}\u{18}\u{D}\u{2}\u{9A}\u{A3}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{9B}\u{9C}\u{C}\u{3}\u{2}\u{2}\u{9C}\u{9D}\u{7}\u{B}\u{2}\u{2}\u{9D}" .
		    "\u{9F}\u{5}\u{18}\u{D}\u{2}\u{9E}\u{A0}\u{7}\u{B}\u{2}\u{2}\u{9F}" .
		    "\u{9E}\u{3}\u{2}\u{2}\u{2}\u{9F}\u{A0}\u{3}\u{2}\u{2}\u{2}\u{A0}\u{A2}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{A1}\u{9B}\u{3}\u{2}\u{2}\u{2}\u{A2}\u{A5}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{A3}\u{A1}\u{3}\u{2}\u{2}\u{2}\u{A3}\u{A4}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{A4}\u{17}\u{3}\u{2}\u{2}\u{2}\u{A5}\u{A3}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{A6}\u{A9}\u{5}\u{1A}\u{E}\u{2}\u{A7}\u{A8}\u{7}\u{9}\u{2}" .
		    "\u{2}\u{A8}\u{AA}\u{5}\u{44}\u{23}\u{2}\u{A9}\u{A7}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{A9}\u{AA}\u{3}\u{2}\u{2}\u{2}\u{AA}\u{19}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{AB}\u{AC}\u{7}\u{28}\u{2}\u{2}\u{AC}\u{1B}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{AD}\u{AE}\u{7}\u{C}\u{2}\u{2}\u{AE}\u{AF}\u{5}\u{1E}\u{10}\u{2}" .
		    "\u{AF}\u{B3}\u{7}\u{5}\u{2}\u{2}\u{B0}\u{B2}\u{5}\u{20}\u{11}\u{2}" .
		    "\u{B1}\u{B0}\u{3}\u{2}\u{2}\u{2}\u{B2}\u{B5}\u{3}\u{2}\u{2}\u{2}\u{B3}" .
		    "\u{B1}\u{3}\u{2}\u{2}\u{2}\u{B3}\u{B4}\u{3}\u{2}\u{2}\u{2}\u{B4}\u{B6}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{B5}\u{B3}\u{3}\u{2}\u{2}\u{2}\u{B6}\u{B7}\u{7}" .
		    "\u{7}\u{2}\u{2}\u{B7}\u{1D}\u{3}\u{2}\u{2}\u{2}\u{B8}\u{B9}\u{7}\u{28}" .
		    "\u{2}\u{2}\u{B9}\u{1F}\u{3}\u{2}\u{2}\u{2}\u{BA}\u{BB}\u{5}\u{22}" .
		    "\u{12}\u{2}\u{BB}\u{BC}\u{5}\u{24}\u{13}\u{2}\u{BC}\u{BD}\u{5}\u{3C}" .
		    "\u{1F}\u{2}\u{BD}\u{C0}\u{5}\u{26}\u{14}\u{2}\u{BE}\u{BF}\u{7}\u{9}" .
		    "\u{2}\u{2}\u{BF}\u{C1}\u{5}\u{44}\u{23}\u{2}\u{C0}\u{BE}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{C0}\u{C1}\u{3}\u{2}\u{2}\u{2}\u{C1}\u{C2}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{C2}\u{C3}\u{7}\u{6}\u{2}\u{2}\u{C3}\u{21}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{C4}\u{C5}\u{7}\u{29}\u{2}\u{2}\u{C5}\u{23}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{C6}\u{C7}\u{9}\u{2}\u{2}\u{2}\u{C7}\u{25}\u{3}\u{2}\u{2}\u{2}\u{C8}" .
		    "\u{C9}\u{7}\u{28}\u{2}\u{2}\u{C9}\u{27}\u{3}\u{2}\u{2}\u{2}\u{CA}" .
		    "\u{CB}\u{7}\u{F}\u{2}\u{2}\u{CB}\u{CC}\u{5}\u{2A}\u{16}\u{2}\u{CC}" .
		    "\u{D0}\u{7}\u{5}\u{2}\u{2}\u{CD}\u{CF}\u{5}\u{2C}\u{17}\u{2}\u{CE}" .
		    "\u{CD}\u{3}\u{2}\u{2}\u{2}\u{CF}\u{D2}\u{3}\u{2}\u{2}\u{2}\u{D0}\u{CE}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{D0}\u{D1}\u{3}\u{2}\u{2}\u{2}\u{D1}\u{D3}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{D2}\u{D0}\u{3}\u{2}\u{2}\u{2}\u{D3}\u{D4}\u{7}\u{7}" .
		    "\u{2}\u{2}\u{D4}\u{29}\u{3}\u{2}\u{2}\u{2}\u{D5}\u{D6}\u{7}\u{28}" .
		    "\u{2}\u{2}\u{D6}\u{2B}\u{3}\u{2}\u{2}\u{2}\u{D7}\u{D8}\u{5}\u{3C}" .
		    "\u{1F}\u{2}\u{D8}\u{D9}\u{5}\u{2E}\u{18}\u{2}\u{D9}\u{DB}\u{7}\u{10}" .
		    "\u{2}\u{2}\u{DA}\u{DC}\u{5}\u{30}\u{19}\u{2}\u{DB}\u{DA}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{DB}\u{DC}\u{3}\u{2}\u{2}\u{2}\u{DC}\u{DD}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{DD}\u{DE}\u{7}\u{11}\u{2}\u{2}\u{DE}\u{DF}\u{7}\u{6}\u{2}" .
		    "\u{2}\u{DF}\u{2D}\u{3}\u{2}\u{2}\u{2}\u{E0}\u{E1}\u{7}\u{28}\u{2}" .
		    "\u{2}\u{E1}\u{2F}\u{3}\u{2}\u{2}\u{2}\u{E2}\u{E3}\u{8}\u{19}\u{1}" .
		    "\u{2}\u{E3}\u{E4}\u{5}\u{32}\u{1A}\u{2}\u{E4}\u{EA}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{E5}\u{E6}\u{C}\u{3}\u{2}\u{2}\u{E6}\u{E7}\u{7}\u{B}\u{2}\u{2}" .
		    "\u{E7}\u{E9}\u{5}\u{32}\u{1A}\u{2}\u{E8}\u{E5}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{E9}\u{EC}\u{3}\u{2}\u{2}\u{2}\u{EA}\u{E8}\u{3}\u{2}\u{2}\u{2}\u{EA}" .
		    "\u{EB}\u{3}\u{2}\u{2}\u{2}\u{EB}\u{31}\u{3}\u{2}\u{2}\u{2}\u{EC}\u{EA}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{ED}\u{EF}\u{7}\u{12}\u{2}\u{2}\u{EE}\u{ED}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{EE}\u{EF}\u{3}\u{2}\u{2}\u{2}\u{EF}\u{F1}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{F0}\u{F2}\u{7}\u{13}\u{2}\u{2}\u{F1}\u{F0}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{F1}\u{F2}\u{3}\u{2}\u{2}\u{2}\u{F2}\u{F3}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{F3}\u{F4}\u{5}\u{3C}\u{1F}\u{2}\u{F4}\u{F5}\u{5}\u{34}" .
		    "\u{1B}\u{2}\u{F5}\u{33}\u{3}\u{2}\u{2}\u{2}\u{F6}\u{F7}\u{7}\u{28}" .
		    "\u{2}\u{2}\u{F7}\u{35}\u{3}\u{2}\u{2}\u{2}\u{F8}\u{F9}\u{7}\u{14}" .
		    "\u{2}\u{2}\u{F9}\u{FA}\u{7}\u{15}\u{2}\u{2}\u{FA}\u{FB}\u{5}\u{1E}" .
		    "\u{10}\u{2}\u{FB}\u{FC}\u{7}\u{B}\u{2}\u{2}\u{FC}\u{FD}\u{5}\u{38}" .
		    "\u{1D}\u{2}\u{FD}\u{FE}\u{7}\u{16}\u{2}\u{2}\u{FE}\u{37}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{FF}\u{100}\u{8}\u{1D}\u{1}\u{2}\u{100}\u{101}\u{5}\u{3A}" .
		    "\u{1E}\u{2}\u{101}\u{107}\u{3}\u{2}\u{2}\u{2}\u{102}\u{103}\u{C}\u{3}" .
		    "\u{2}\u{2}\u{103}\u{104}\u{7}\u{B}\u{2}\u{2}\u{104}\u{106}\u{5}\u{3A}" .
		    "\u{1E}\u{2}\u{105}\u{102}\u{3}\u{2}\u{2}\u{2}\u{106}\u{109}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{107}\u{105}\u{3}\u{2}\u{2}\u{2}\u{107}\u{108}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{108}\u{39}\u{3}\u{2}\u{2}\u{2}\u{109}\u{107}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{10A}\u{10B}\u{7}\u{28}\u{2}\u{2}\u{10B}\u{3B}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{10C}\u{111}\u{5}\u{46}\u{24}\u{2}\u{10D}\u{111}\u{5}" .
		    "\u{3E}\u{20}\u{2}\u{10E}\u{111}\u{5}\u{40}\u{21}\u{2}\u{10F}\u{111}" .
		    "\u{5}\u{42}\u{22}\u{2}\u{110}\u{10C}\u{3}\u{2}\u{2}\u{2}\u{110}\u{10D}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{110}\u{10E}\u{3}\u{2}\u{2}\u{2}\u{110}\u{10F}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{111}\u{3D}\u{3}\u{2}\u{2}\u{2}\u{112}\u{113}" .
		    "\u{7}\u{17}\u{2}\u{2}\u{113}\u{114}\u{7}\u{18}\u{2}\u{2}\u{114}\u{115}" .
		    "\u{5}\u{3C}\u{1F}\u{2}\u{115}\u{116}\u{7}\u{19}\u{2}\u{2}\u{116}\u{3F}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{117}\u{118}\u{7}\u{1A}\u{2}\u{2}\u{118}\u{119}" .
		    "\u{7}\u{18}\u{2}\u{2}\u{119}\u{11A}\u{5}\u{3C}\u{1F}\u{2}\u{11A}\u{11B}" .
		    "\u{7}\u{B}\u{2}\u{2}\u{11B}\u{11C}\u{5}\u{3C}\u{1F}\u{2}\u{11C}\u{11D}" .
		    "\u{7}\u{19}\u{2}\u{2}\u{11D}\u{41}\u{3}\u{2}\u{2}\u{2}\u{11E}\u{124}" .
		    "\u{7}\u{28}\u{2}\u{2}\u{11F}\u{120}\u{5}\u{A}\u{6}\u{2}\u{120}\u{121}" .
		    "\u{7}\u{1B}\u{2}\u{2}\u{121}\u{122}\u{7}\u{28}\u{2}\u{2}\u{122}\u{124}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{123}\u{11E}\u{3}\u{2}\u{2}\u{2}\u{123}\u{11F}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{124}\u{43}\u{3}\u{2}\u{2}\u{2}\u{125}\u{126}" .
		    "\u{9}\u{3}\u{2}\u{2}\u{126}\u{45}\u{3}\u{2}\u{2}\u{2}\u{127}\u{131}" .
		    "\u{5}\u{48}\u{25}\u{2}\u{128}\u{131}\u{5}\u{4A}\u{26}\u{2}\u{129}" .
		    "\u{131}\u{5}\u{4C}\u{27}\u{2}\u{12A}\u{131}\u{5}\u{4E}\u{28}\u{2}" .
		    "\u{12B}\u{131}\u{5}\u{50}\u{29}\u{2}\u{12C}\u{131}\u{5}\u{52}\u{2A}" .
		    "\u{2}\u{12D}\u{131}\u{5}\u{54}\u{2B}\u{2}\u{12E}\u{131}\u{5}\u{56}" .
		    "\u{2C}\u{2}\u{12F}\u{131}\u{5}\u{58}\u{2D}\u{2}\u{130}\u{127}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{130}\u{128}\u{3}\u{2}\u{2}\u{2}\u{130}\u{129}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{130}\u{12A}\u{3}\u{2}\u{2}\u{2}\u{130}\u{12B}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{130}\u{12C}\u{3}\u{2}\u{2}\u{2}\u{130}\u{12D}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{130}\u{12E}\u{3}\u{2}\u{2}\u{2}\u{130}\u{12F}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{131}\u{47}\u{3}\u{2}\u{2}\u{2}\u{132}\u{133}\u{7}" .
		    "\u{1C}\u{2}\u{2}\u{133}\u{49}\u{3}\u{2}\u{2}\u{2}\u{134}\u{135}\u{7}" .
		    "\u{1D}\u{2}\u{2}\u{135}\u{4B}\u{3}\u{2}\u{2}\u{2}\u{136}\u{137}\u{9}" .
		    "\u{4}\u{2}\u{2}\u{137}\u{4D}\u{3}\u{2}\u{2}\u{2}\u{138}\u{139}\u{9}" .
		    "\u{5}\u{2}\u{2}\u{139}\u{4F}\u{3}\u{2}\u{2}\u{2}\u{13A}\u{13B}\u{9}" .
		    "\u{6}\u{2}\u{2}\u{13B}\u{51}\u{3}\u{2}\u{2}\u{2}\u{13C}\u{13D}\u{7}" .
		    "\u{24}\u{2}\u{2}\u{13D}\u{53}\u{3}\u{2}\u{2}\u{2}\u{13E}\u{13F}\u{7}" .
		    "\u{25}\u{2}\u{2}\u{13F}\u{55}\u{3}\u{2}\u{2}\u{2}\u{140}\u{141}\u{7}" .
		    "\u{26}\u{2}\u{2}\u{141}\u{57}\u{3}\u{2}\u{2}\u{2}\u{142}\u{143}\u{7}" .
		    "\u{27}\u{2}\u{2}\u{143}\u{59}\u{3}\u{2}\u{2}\u{2}\u{16}\u{5D}\u{63}" .
		    "\u{73}\u{7F}\u{83}\u{91}\u{9F}\u{A3}\u{A9}\u{B3}\u{C0}\u{D0}\u{DB}" .
		    "\u{EA}\u{EE}\u{F1}\u{107}\u{110}\u{123}\u{130}";

		protected static $atn;
		protected static $decisionToDFA;
		protected static $sharedContextCache;

		public function __construct(TokenStream $input)
		{
			parent::__construct($input);

			self::initialize();

			$this->interp = new ParserATNSimulator($this, self::$atn, self::$decisionToDFA, self::$sharedContextCache);
		}

		private static function initialize() : void
		{
			if (self::$atn !== null) {
				return;
			}

			RuntimeMetaData::checkVersion('4.8', RuntimeMetaData::VERSION);

			$atn = (new ATNDeserializer())->deserialize(self::SERIALIZED_ATN);

			$decisionToDFA = [];
			for ($i = 0, $count = $atn->getNumberOfDecisions(); $i < $count; $i++) {
				$decisionToDFA[] = new DFA($atn->getDecisionState($i), $i);
			}

			self::$atn = $atn;
			self::$decisionToDFA = $decisionToDFA;
			self::$sharedContextCache = new PredictionContextCache();
		}

		public function getGrammarFileName() : string
		{
			return "Tars.g4";
		}

		public function getRuleNames() : array
		{
			return self::RULE_NAMES;
		}

		public function getSerializedATN() : string
		{
			return self::SERIALIZED_ATN;
		}

		public function getATN() : ATN
		{
			return self::$atn;
		}

		public function getVocabulary() : Vocabulary
        {
            static $vocabulary;

			return $vocabulary = $vocabulary ?? new VocabularyImpl(self::LITERAL_NAMES, self::SYMBOLIC_NAMES);
        }

		/**
		 * @throws RecognitionException
		 */
		public function root() : Context\RootContext
		{
		    $localContext = new Context\RootContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 0, self::RULE_root);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(91);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__0) {
		        	$this->setState(88);
		        	$this->includeDef();
		        	$this->setState(93);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(97);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__1) {
		        	$this->setState(94);
		        	$this->namespaceDef();
		        	$this->setState(99);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function includeDef() : Context\IncludeDefContext
		{
		    $localContext = new Context\IncludeDefContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 2, self::RULE_includeDef);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(100);
		        $this->match(self::T__0);
		        $this->setState(101);
		        $this->fileName();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function fileName() : Context\FileNameContext
		{
		    $localContext = new Context\FileNameContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 4, self::RULE_fileName);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(103);
		        $this->match(self::String);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function namespaceDef() : Context\NamespaceDefContext
		{
		    $localContext = new Context\NamespaceDefContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 6, self::RULE_namespaceDef);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(105);
		        $this->match(self::T__1);
		        $this->setState(106);
		        $this->moduleName();
		        $this->setState(107);
		        $this->match(self::T__2);
		        $this->setState(113);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & ((1 << self::T__5) | (1 << self::T__7) | (1 << self::T__9) | (1 << self::T__12) | (1 << self::T__17))) !== 0)) {
		        	$this->setState(108);
		        	$this->definition();
		        	$this->setState(109);
		        	$this->match(self::T__3);
		        	$this->setState(115);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(116);
		        $this->match(self::T__4);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function moduleName() : Context\ModuleNameContext
		{
		    $localContext = new Context\ModuleNameContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 8, self::RULE_moduleName);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(118);
		        $this->match(self::Identifier);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function definition() : Context\DefinitionContext
		{
		    $localContext = new Context\DefinitionContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 10, self::RULE_definition);

		    try {
		        $this->setState(125);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::T__5:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(120);
		            	$this->constDef();
		            	break;

		            case self::T__7:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(121);
		            	$this->enum();
		            	break;

		            case self::T__9:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(122);
		            	$this->struct();
		            	break;

		            case self::T__12:
		            	$this->enterOuterAlt($localContext, 4);
		            	$this->setState(123);
		            	$this->interfaceDef();
		            	break;

		            case self::T__17:
		            	$this->enterOuterAlt($localContext, 5);
		            	$this->setState(124);
		            	$this->keyMap();
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function constDef() : Context\ConstDefContext
		{
		    $localContext = new Context\ConstDefContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 12, self::RULE_constDef);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(127);
		        $this->match(self::T__5);
		        $this->setState(129);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & ((1 << self::T__25) | (1 << self::T__26) | (1 << self::T__27) | (1 << self::T__28) | (1 << self::T__29) | (1 << self::T__30) | (1 << self::T__31) | (1 << self::T__32) | (1 << self::T__33) | (1 << self::T__34) | (1 << self::T__35) | (1 << self::T__36))) !== 0)) {
		        	$this->setState(128);
		        	$this->primitiveType();
		        }
		        $this->setState(131);
		        $this->constName();
		        $this->setState(132);
		        $this->match(self::T__6);
		        $this->setState(133);
		        $this->value();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function constName() : Context\ConstNameContext
		{
		    $localContext = new Context\ConstNameContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 14, self::RULE_constName);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(135);
		        $this->match(self::Identifier);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function enum() : Context\EnumContext
		{
		    $localContext = new Context\EnumContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 16, self::RULE_enum);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(137);
		        $this->match(self::T__7);
		        $this->setState(138);
		        $this->enumName();
		        $this->setState(139);
		        $this->match(self::T__2);
		        $this->setState(143);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::Identifier) {
		        	$this->setState(140);
		        	$this->recursiveEnumeratorList(0);
		        	$this->setState(145);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(146);
		        $this->match(self::T__4);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function enumName() : Context\EnumNameContext
		{
		    $localContext = new Context\EnumNameContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 18, self::RULE_enumName);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(148);
		        $this->match(self::Identifier);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function enumeratorList() : Context\EnumeratorListContext
		{
			return $this->recursiveEnumeratorList(0);
		}

		/**
		 * @throws RecognitionException
		 */
		private function recursiveEnumeratorList(int $precedence) : Context\EnumeratorListContext
		{
			$parentContext = $this->ctx;
			$parentState = $this->getState();
			$localContext = new Context\EnumeratorListContext($this->ctx, $parentState);
			$previousContext = $localContext;
			$startState = 20;
			$this->enterRecursionRule($localContext, 20, self::RULE_enumeratorList, $precedence);

			try {
				$this->enterOuterAlt($localContext, 1);
				$this->setState(151);
				$this->enumerator();
				$this->ctx->stop = $this->input->LT(-1);
				$this->setState(161);
				$this->errorHandler->sync($this);

				$alt = $this->getInterpreter()->adaptivePredict($this->input, 7, $this->ctx);

				while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
					if ($alt === 1) {
						if ($this->getParseListeners() !== null) {
						    $this->triggerExitRuleEvent();
						}

						$previousContext = $localContext;
						$localContext = new Context\EnumeratorListContext($parentContext, $parentState);
						$this->pushNewRecursionContext($localContext, $startState, self::RULE_enumeratorList);
						$this->setState(153);

						if (!($this->precpred($this->ctx, 1))) {
						    throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 1)");
						}
						$this->setState(154);
						$this->match(self::T__8);
						$this->setState(155);
						$this->enumerator();
						$this->setState(157);
						$this->errorHandler->sync($this);

						switch ($this->getInterpreter()->adaptivePredict($this->input, 6, $this->ctx)) {
						    case 1:
							    $this->setState(156);
							    $this->match(self::T__8);
							break;
						} 
					}

					$this->setState(163);
					$this->errorHandler->sync($this);

					$alt = $this->getInterpreter()->adaptivePredict($this->input, 7, $this->ctx);
				}
			} catch (RecognitionException $exception) {
				$localContext->exception = $exception;
				$this->errorHandler->reportError($this, $exception);
				$this->errorHandler->recover($this, $exception);
			} finally {
				$this->unrollRecursionContexts($parentContext);
			}

			return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function enumerator() : Context\EnumeratorContext
		{
		    $localContext = new Context\EnumeratorContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 22, self::RULE_enumerator);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(164);
		        $this->enumMember();
		        $this->setState(167);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 8, $this->ctx)) {
		            case 1:
		        	    $this->setState(165);
		        	    $this->match(self::T__6);
		        	    $this->setState(166);
		        	    $this->value();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function enumMember() : Context\EnumMemberContext
		{
		    $localContext = new Context\EnumMemberContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 24, self::RULE_enumMember);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(169);
		        $this->match(self::Identifier);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function struct() : Context\StructContext
		{
		    $localContext = new Context\StructContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 26, self::RULE_struct);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(171);
		        $this->match(self::T__9);
		        $this->setState(172);
		        $this->structName();
		        $this->setState(173);
		        $this->match(self::T__2);
		        $this->setState(177);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::Int) {
		        	$this->setState(174);
		        	$this->structMember();
		        	$this->setState(179);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(180);
		        $this->match(self::T__4);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function structName() : Context\StructNameContext
		{
		    $localContext = new Context\StructNameContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 28, self::RULE_structName);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(182);
		        $this->match(self::Identifier);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function structMember() : Context\StructMemberContext
		{
		    $localContext = new Context\StructMemberContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 30, self::RULE_structMember);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(184);
		        $this->fieldOrder();
		        $this->setState(185);
		        $this->fieldRequire();
		        $this->setState(186);
		        $this->type();
		        $this->setState(187);
		        $this->fieldName();
		        $this->setState(190);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__6) {
		        	$this->setState(188);
		        	$this->match(self::T__6);
		        	$this->setState(189);
		        	$this->value();
		        }
		        $this->setState(192);
		        $this->match(self::T__3);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function fieldOrder() : Context\FieldOrderContext
		{
		    $localContext = new Context\FieldOrderContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 32, self::RULE_fieldOrder);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(194);
		        $this->match(self::Int);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function fieldRequire() : Context\FieldRequireContext
		{
		    $localContext = new Context\FieldRequireContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 34, self::RULE_fieldRequire);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(196);

		        $_la = $this->input->LA(1);

		        if (!($_la === self::T__10 || $_la === self::T__11)) {
		        $this->errorHandler->recoverInline($this);
		        } else {
		        	if ($this->input->LA(1) === Token::EOF) {
		        	    $this->matchedEOF = true;
		            }

		        	$this->errorHandler->reportMatch($this);
		        	$this->consume();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function fieldName() : Context\FieldNameContext
		{
		    $localContext = new Context\FieldNameContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 36, self::RULE_fieldName);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(198);
		        $this->match(self::Identifier);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function interfaceDef() : Context\InterfaceDefContext
		{
		    $localContext = new Context\InterfaceDefContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 38, self::RULE_interfaceDef);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(200);
		        $this->match(self::T__12);
		        $this->setState(201);
		        $this->interfaceName();
		        $this->setState(202);
		        $this->match(self::T__2);
		        $this->setState(206);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & ((1 << self::T__20) | (1 << self::T__23) | (1 << self::T__25) | (1 << self::T__26) | (1 << self::T__27) | (1 << self::T__28) | (1 << self::T__29) | (1 << self::T__30) | (1 << self::T__31) | (1 << self::T__32) | (1 << self::T__33) | (1 << self::T__34) | (1 << self::T__35) | (1 << self::T__36) | (1 << self::Identifier))) !== 0)) {
		        	$this->setState(203);
		        	$this->operation();
		        	$this->setState(208);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(209);
		        $this->match(self::T__4);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function interfaceName() : Context\InterfaceNameContext
		{
		    $localContext = new Context\InterfaceNameContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 40, self::RULE_interfaceName);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(211);
		        $this->match(self::Identifier);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function operation() : Context\OperationContext
		{
		    $localContext = new Context\OperationContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 42, self::RULE_operation);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(213);
		        $this->type();
		        $this->setState(214);
		        $this->operationName();
		        $this->setState(215);
		        $this->match(self::T__13);
		        $this->setState(217);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & ((1 << self::T__15) | (1 << self::T__16) | (1 << self::T__20) | (1 << self::T__23) | (1 << self::T__25) | (1 << self::T__26) | (1 << self::T__27) | (1 << self::T__28) | (1 << self::T__29) | (1 << self::T__30) | (1 << self::T__31) | (1 << self::T__32) | (1 << self::T__33) | (1 << self::T__34) | (1 << self::T__35) | (1 << self::T__36) | (1 << self::Identifier))) !== 0)) {
		        	$this->setState(216);
		        	$this->recursiveParamList(0);
		        }
		        $this->setState(219);
		        $this->match(self::T__14);
		        $this->setState(220);
		        $this->match(self::T__3);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function operationName() : Context\OperationNameContext
		{
		    $localContext = new Context\OperationNameContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 44, self::RULE_operationName);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(222);
		        $this->match(self::Identifier);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function paramList() : Context\ParamListContext
		{
			return $this->recursiveParamList(0);
		}

		/**
		 * @throws RecognitionException
		 */
		private function recursiveParamList(int $precedence) : Context\ParamListContext
		{
			$parentContext = $this->ctx;
			$parentState = $this->getState();
			$localContext = new Context\ParamListContext($this->ctx, $parentState);
			$previousContext = $localContext;
			$startState = 46;
			$this->enterRecursionRule($localContext, 46, self::RULE_paramList, $precedence);

			try {
				$this->enterOuterAlt($localContext, 1);
				$this->setState(225);
				$this->param();
				$this->ctx->stop = $this->input->LT(-1);
				$this->setState(232);
				$this->errorHandler->sync($this);

				$alt = $this->getInterpreter()->adaptivePredict($this->input, 13, $this->ctx);

				while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
					if ($alt === 1) {
						if ($this->getParseListeners() !== null) {
						    $this->triggerExitRuleEvent();
						}

						$previousContext = $localContext;
						$localContext = new Context\ParamListContext($parentContext, $parentState);
						$this->pushNewRecursionContext($localContext, $startState, self::RULE_paramList);
						$this->setState(227);

						if (!($this->precpred($this->ctx, 1))) {
						    throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 1)");
						}
						$this->setState(228);
						$this->match(self::T__8);
						$this->setState(229);
						$this->param(); 
					}

					$this->setState(234);
					$this->errorHandler->sync($this);

					$alt = $this->getInterpreter()->adaptivePredict($this->input, 13, $this->ctx);
				}
			} catch (RecognitionException $exception) {
				$localContext->exception = $exception;
				$this->errorHandler->reportError($this, $exception);
				$this->errorHandler->recover($this, $exception);
			} finally {
				$this->unrollRecursionContexts($parentContext);
			}

			return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function param() : Context\ParamContext
		{
		    $localContext = new Context\ParamContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 48, self::RULE_param);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(236);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__15) {
		        	$this->setState(235);
		        	$this->match(self::T__15);
		        }
		        $this->setState(239);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__16) {
		        	$this->setState(238);
		        	$this->match(self::T__16);
		        }
		        $this->setState(241);
		        $this->type();
		        $this->setState(242);
		        $this->paramName();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function paramName() : Context\ParamNameContext
		{
		    $localContext = new Context\ParamNameContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 50, self::RULE_paramName);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(244);
		        $this->match(self::Identifier);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function keyMap() : Context\KeyMapContext
		{
		    $localContext = new Context\KeyMapContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 52, self::RULE_keyMap);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(246);
		        $this->match(self::T__17);
		        $this->setState(247);
		        $this->match(self::T__18);
		        $this->setState(248);
		        $this->structName();
		        $this->setState(249);
		        $this->match(self::T__8);
		        $this->setState(250);
		        $this->recursiveKeyList(0);
		        $this->setState(251);
		        $this->match(self::T__19);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function keyList() : Context\KeyListContext
		{
			return $this->recursiveKeyList(0);
		}

		/**
		 * @throws RecognitionException
		 */
		private function recursiveKeyList(int $precedence) : Context\KeyListContext
		{
			$parentContext = $this->ctx;
			$parentState = $this->getState();
			$localContext = new Context\KeyListContext($this->ctx, $parentState);
			$previousContext = $localContext;
			$startState = 54;
			$this->enterRecursionRule($localContext, 54, self::RULE_keyList, $precedence);

			try {
				$this->enterOuterAlt($localContext, 1);
				$this->setState(254);
				$this->keyName();
				$this->ctx->stop = $this->input->LT(-1);
				$this->setState(261);
				$this->errorHandler->sync($this);

				$alt = $this->getInterpreter()->adaptivePredict($this->input, 16, $this->ctx);

				while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
					if ($alt === 1) {
						if ($this->getParseListeners() !== null) {
						    $this->triggerExitRuleEvent();
						}

						$previousContext = $localContext;
						$localContext = new Context\KeyListContext($parentContext, $parentState);
						$this->pushNewRecursionContext($localContext, $startState, self::RULE_keyList);
						$this->setState(256);

						if (!($this->precpred($this->ctx, 1))) {
						    throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 1)");
						}
						$this->setState(257);
						$this->match(self::T__8);
						$this->setState(258);
						$this->keyName(); 
					}

					$this->setState(263);
					$this->errorHandler->sync($this);

					$alt = $this->getInterpreter()->adaptivePredict($this->input, 16, $this->ctx);
				}
			} catch (RecognitionException $exception) {
				$localContext->exception = $exception;
				$this->errorHandler->reportError($this, $exception);
				$this->errorHandler->recover($this, $exception);
			} finally {
				$this->unrollRecursionContexts($parentContext);
			}

			return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function keyName() : Context\KeyNameContext
		{
		    $localContext = new Context\KeyNameContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 56, self::RULE_keyName);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(264);
		        $this->match(self::Identifier);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function type() : Context\TypeContext
		{
		    $localContext = new Context\TypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 58, self::RULE_type);

		    try {
		        $this->setState(270);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::T__25:
		            case self::T__26:
		            case self::T__27:
		            case self::T__28:
		            case self::T__29:
		            case self::T__30:
		            case self::T__31:
		            case self::T__32:
		            case self::T__33:
		            case self::T__34:
		            case self::T__35:
		            case self::T__36:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(266);
		            	$this->primitiveType();
		            	break;

		            case self::T__20:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(267);
		            	$this->vectorType();
		            	break;

		            case self::T__23:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(268);
		            	$this->mapType();
		            	break;

		            case self::Identifier:
		            	$this->enterOuterAlt($localContext, 4);
		            	$this->setState(269);
		            	$this->customType();
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function vectorType() : Context\VectorTypeContext
		{
		    $localContext = new Context\VectorTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 60, self::RULE_vectorType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(272);
		        $this->match(self::T__20);
		        $this->setState(273);
		        $this->match(self::T__21);
		        $this->setState(274);
		        $this->type();
		        $this->setState(275);
		        $this->match(self::T__22);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function mapType() : Context\MapTypeContext
		{
		    $localContext = new Context\MapTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 62, self::RULE_mapType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(277);
		        $this->match(self::T__23);
		        $this->setState(278);
		        $this->match(self::T__21);
		        $this->setState(279);
		        $this->type();
		        $this->setState(280);
		        $this->match(self::T__8);
		        $this->setState(281);
		        $this->type();
		        $this->setState(282);
		        $this->match(self::T__22);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function customType() : Context\CustomTypeContext
		{
		    $localContext = new Context\CustomTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 64, self::RULE_customType);

		    try {
		        $this->setState(289);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 18, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(284);
		        	    $this->match(self::Identifier);
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(285);
		        	    $this->moduleName();
		        	    $this->setState(286);
		        	    $this->match(self::T__24);
		        	    $this->setState(287);
		        	    $this->match(self::Identifier);
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function value() : Context\ValueContext
		{
		    $localContext = new Context\ValueContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 66, self::RULE_value);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(291);

		        $_la = $this->input->LA(1);

		        if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & ((1 << self::Int) | (1 << self::Float) | (1 << self::String))) !== 0))) {
		        $this->errorHandler->recoverInline($this);
		        } else {
		        	if ($this->input->LA(1) === Token::EOF) {
		        	    $this->matchedEOF = true;
		            }

		        	$this->errorHandler->reportMatch($this);
		        	$this->consume();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function primitiveType() : Context\PrimitiveTypeContext
		{
		    $localContext = new Context\PrimitiveTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 68, self::RULE_primitiveType);

		    try {
		        $this->setState(302);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::T__25:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(293);
		            	$this->voidType();
		            	break;

		            case self::T__26:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(294);
		            	$this->boolType();
		            	break;

		            case self::T__27:
		            case self::T__28:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(295);
		            	$this->byteType();
		            	break;

		            case self::T__29:
		            case self::T__30:
		            	$this->enterOuterAlt($localContext, 4);
		            	$this->setState(296);
		            	$this->shortType();
		            	break;

		            case self::T__31:
		            case self::T__32:
		            	$this->enterOuterAlt($localContext, 5);
		            	$this->setState(297);
		            	$this->intType();
		            	break;

		            case self::T__33:
		            	$this->enterOuterAlt($localContext, 6);
		            	$this->setState(298);
		            	$this->longType();
		            	break;

		            case self::T__34:
		            	$this->enterOuterAlt($localContext, 7);
		            	$this->setState(299);
		            	$this->floatType();
		            	break;

		            case self::T__35:
		            	$this->enterOuterAlt($localContext, 8);
		            	$this->setState(300);
		            	$this->doubleType();
		            	break;

		            case self::T__36:
		            	$this->enterOuterAlt($localContext, 9);
		            	$this->setState(301);
		            	$this->stringType();
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function voidType() : Context\VoidTypeContext
		{
		    $localContext = new Context\VoidTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 70, self::RULE_voidType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(304);
		        $this->match(self::T__25);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function boolType() : Context\BoolTypeContext
		{
		    $localContext = new Context\BoolTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 72, self::RULE_boolType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(306);
		        $this->match(self::T__26);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function byteType() : Context\ByteTypeContext
		{
		    $localContext = new Context\ByteTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 74, self::RULE_byteType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(308);

		        $_la = $this->input->LA(1);

		        if (!($_la === self::T__27 || $_la === self::T__28)) {
		        $this->errorHandler->recoverInline($this);
		        } else {
		        	if ($this->input->LA(1) === Token::EOF) {
		        	    $this->matchedEOF = true;
		            }

		        	$this->errorHandler->reportMatch($this);
		        	$this->consume();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function shortType() : Context\ShortTypeContext
		{
		    $localContext = new Context\ShortTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 76, self::RULE_shortType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(310);

		        $_la = $this->input->LA(1);

		        if (!($_la === self::T__29 || $_la === self::T__30)) {
		        $this->errorHandler->recoverInline($this);
		        } else {
		        	if ($this->input->LA(1) === Token::EOF) {
		        	    $this->matchedEOF = true;
		            }

		        	$this->errorHandler->reportMatch($this);
		        	$this->consume();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function intType() : Context\IntTypeContext
		{
		    $localContext = new Context\IntTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 78, self::RULE_intType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(312);

		        $_la = $this->input->LA(1);

		        if (!($_la === self::T__31 || $_la === self::T__32)) {
		        $this->errorHandler->recoverInline($this);
		        } else {
		        	if ($this->input->LA(1) === Token::EOF) {
		        	    $this->matchedEOF = true;
		            }

		        	$this->errorHandler->reportMatch($this);
		        	$this->consume();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function longType() : Context\LongTypeContext
		{
		    $localContext = new Context\LongTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 80, self::RULE_longType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(314);
		        $this->match(self::T__33);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function floatType() : Context\FloatTypeContext
		{
		    $localContext = new Context\FloatTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 82, self::RULE_floatType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(316);
		        $this->match(self::T__34);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function doubleType() : Context\DoubleTypeContext
		{
		    $localContext = new Context\DoubleTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 84, self::RULE_doubleType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(318);
		        $this->match(self::T__35);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function stringType() : Context\StringTypeContext
		{
		    $localContext = new Context\StringTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 86, self::RULE_stringType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(320);
		        $this->match(self::T__36);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		public function sempred(?RuleContext $localContext, int $ruleIndex, int $predicateIndex) : bool
		{
			switch ($ruleIndex) {
					case 10:
						return $this->sempredEnumeratorList($localContext, $predicateIndex);

					case 23:
						return $this->sempredParamList($localContext, $predicateIndex);

					case 27:
						return $this->sempredKeyList($localContext, $predicateIndex);

				default:
					return true;
				}
		}

		private function sempredEnumeratorList(?Context\EnumeratorListContext $localContext, int $predicateIndex) : bool
		{
			switch ($predicateIndex) {
			    case 0:
			        return $this->precpred($this->ctx, 1);
			}

			return true;
		}

		private function sempredParamList(?Context\ParamListContext $localContext, int $predicateIndex) : bool
		{
			switch ($predicateIndex) {
			    case 1:
			        return $this->precpred($this->ctx, 1);
			}

			return true;
		}

		private function sempredKeyList(?Context\KeyListContext $localContext, int $predicateIndex) : bool
		{
			switch ($predicateIndex) {
			    case 2:
			        return $this->precpred($this->ctx, 1);
			}

			return true;
		}
	}
}

namespace tars\Context {
	use Antlr\Antlr4\Runtime\ParserRuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;
	use Antlr\Antlr4\Runtime\Tree\TerminalNode;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;
	use tars\TarsParser;
	use tars\TarsListener;

	class RootContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_root;
	    }

	    /**
	     * @return array<IncludeDefContext>|IncludeDefContext|null
	     */
	    public function includeDef(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(IncludeDefContext::class);
	    	}

	        return $this->getTypedRuleContext(IncludeDefContext::class, $index);
	    }

	    /**
	     * @return array<NamespaceDefContext>|NamespaceDefContext|null
	     */
	    public function namespaceDef(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(NamespaceDefContext::class);
	    	}

	        return $this->getTypedRuleContext(NamespaceDefContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterRoot($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitRoot($this);
		    }
		}
	} 

	class IncludeDefContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_includeDef;
	    }

	    public function fileName() : ?FileNameContext
	    {
	    	return $this->getTypedRuleContext(FileNameContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterIncludeDef($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitIncludeDef($this);
		    }
		}
	} 

	class FileNameContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_fileName;
	    }

	    public function String() : ?TerminalNode
	    {
	        return $this->getToken(TarsParser::String, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterFileName($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitFileName($this);
		    }
		}
	} 

	class NamespaceDefContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_namespaceDef;
	    }

	    public function moduleName() : ?ModuleNameContext
	    {
	    	return $this->getTypedRuleContext(ModuleNameContext::class, 0);
	    }

	    /**
	     * @return array<DefinitionContext>|DefinitionContext|null
	     */
	    public function definition(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(DefinitionContext::class);
	    	}

	        return $this->getTypedRuleContext(DefinitionContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterNamespaceDef($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitNamespaceDef($this);
		    }
		}
	} 

	class ModuleNameContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_moduleName;
	    }

	    public function Identifier() : ?TerminalNode
	    {
	        return $this->getToken(TarsParser::Identifier, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterModuleName($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitModuleName($this);
		    }
		}
	} 

	class DefinitionContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_definition;
	    }

	    public function constDef() : ?ConstDefContext
	    {
	    	return $this->getTypedRuleContext(ConstDefContext::class, 0);
	    }

	    public function enum() : ?EnumContext
	    {
	    	return $this->getTypedRuleContext(EnumContext::class, 0);
	    }

	    public function struct() : ?StructContext
	    {
	    	return $this->getTypedRuleContext(StructContext::class, 0);
	    }

	    public function interfaceDef() : ?InterfaceDefContext
	    {
	    	return $this->getTypedRuleContext(InterfaceDefContext::class, 0);
	    }

	    public function keyMap() : ?KeyMapContext
	    {
	    	return $this->getTypedRuleContext(KeyMapContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterDefinition($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitDefinition($this);
		    }
		}
	} 

	class ConstDefContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_constDef;
	    }

	    public function constName() : ?ConstNameContext
	    {
	    	return $this->getTypedRuleContext(ConstNameContext::class, 0);
	    }

	    public function value() : ?ValueContext
	    {
	    	return $this->getTypedRuleContext(ValueContext::class, 0);
	    }

	    public function primitiveType() : ?PrimitiveTypeContext
	    {
	    	return $this->getTypedRuleContext(PrimitiveTypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterConstDef($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitConstDef($this);
		    }
		}
	} 

	class ConstNameContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_constName;
	    }

	    public function Identifier() : ?TerminalNode
	    {
	        return $this->getToken(TarsParser::Identifier, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterConstName($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitConstName($this);
		    }
		}
	} 

	class EnumContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_enum;
	    }

	    public function enumName() : ?EnumNameContext
	    {
	    	return $this->getTypedRuleContext(EnumNameContext::class, 0);
	    }

	    /**
	     * @return array<EnumeratorListContext>|EnumeratorListContext|null
	     */
	    public function enumeratorList(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(EnumeratorListContext::class);
	    	}

	        return $this->getTypedRuleContext(EnumeratorListContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterEnum($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitEnum($this);
		    }
		}
	} 

	class EnumNameContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_enumName;
	    }

	    public function Identifier() : ?TerminalNode
	    {
	        return $this->getToken(TarsParser::Identifier, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterEnumName($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitEnumName($this);
		    }
		}
	} 

	class EnumeratorListContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_enumeratorList;
	    }

	    public function enumerator() : ?EnumeratorContext
	    {
	    	return $this->getTypedRuleContext(EnumeratorContext::class, 0);
	    }

	    public function enumeratorList() : ?EnumeratorListContext
	    {
	    	return $this->getTypedRuleContext(EnumeratorListContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterEnumeratorList($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitEnumeratorList($this);
		    }
		}
	} 

	class EnumeratorContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_enumerator;
	    }

	    public function enumMember() : ?EnumMemberContext
	    {
	    	return $this->getTypedRuleContext(EnumMemberContext::class, 0);
	    }

	    public function value() : ?ValueContext
	    {
	    	return $this->getTypedRuleContext(ValueContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterEnumerator($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitEnumerator($this);
		    }
		}
	} 

	class EnumMemberContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_enumMember;
	    }

	    public function Identifier() : ?TerminalNode
	    {
	        return $this->getToken(TarsParser::Identifier, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterEnumMember($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitEnumMember($this);
		    }
		}
	} 

	class StructContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_struct;
	    }

	    public function structName() : ?StructNameContext
	    {
	    	return $this->getTypedRuleContext(StructNameContext::class, 0);
	    }

	    /**
	     * @return array<StructMemberContext>|StructMemberContext|null
	     */
	    public function structMember(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(StructMemberContext::class);
	    	}

	        return $this->getTypedRuleContext(StructMemberContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterStruct($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitStruct($this);
		    }
		}
	} 

	class StructNameContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_structName;
	    }

	    public function Identifier() : ?TerminalNode
	    {
	        return $this->getToken(TarsParser::Identifier, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterStructName($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitStructName($this);
		    }
		}
	} 

	class StructMemberContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_structMember;
	    }

	    public function fieldOrder() : ?FieldOrderContext
	    {
	    	return $this->getTypedRuleContext(FieldOrderContext::class, 0);
	    }

	    public function fieldRequire() : ?FieldRequireContext
	    {
	    	return $this->getTypedRuleContext(FieldRequireContext::class, 0);
	    }

	    public function type() : ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

	    public function fieldName() : ?FieldNameContext
	    {
	    	return $this->getTypedRuleContext(FieldNameContext::class, 0);
	    }

	    public function value() : ?ValueContext
	    {
	    	return $this->getTypedRuleContext(ValueContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterStructMember($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitStructMember($this);
		    }
		}
	} 

	class FieldOrderContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_fieldOrder;
	    }

	    public function Int() : ?TerminalNode
	    {
	        return $this->getToken(TarsParser::Int, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterFieldOrder($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitFieldOrder($this);
		    }
		}
	} 

	class FieldRequireContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_fieldRequire;
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterFieldRequire($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitFieldRequire($this);
		    }
		}
	} 

	class FieldNameContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_fieldName;
	    }

	    public function Identifier() : ?TerminalNode
	    {
	        return $this->getToken(TarsParser::Identifier, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterFieldName($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitFieldName($this);
		    }
		}
	} 

	class InterfaceDefContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_interfaceDef;
	    }

	    public function interfaceName() : ?InterfaceNameContext
	    {
	    	return $this->getTypedRuleContext(InterfaceNameContext::class, 0);
	    }

	    /**
	     * @return array<OperationContext>|OperationContext|null
	     */
	    public function operation(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(OperationContext::class);
	    	}

	        return $this->getTypedRuleContext(OperationContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterInterfaceDef($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitInterfaceDef($this);
		    }
		}
	} 

	class InterfaceNameContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_interfaceName;
	    }

	    public function Identifier() : ?TerminalNode
	    {
	        return $this->getToken(TarsParser::Identifier, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterInterfaceName($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitInterfaceName($this);
		    }
		}
	} 

	class OperationContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_operation;
	    }

	    public function type() : ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

	    public function operationName() : ?OperationNameContext
	    {
	    	return $this->getTypedRuleContext(OperationNameContext::class, 0);
	    }

	    public function paramList() : ?ParamListContext
	    {
	    	return $this->getTypedRuleContext(ParamListContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterOperation($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitOperation($this);
		    }
		}
	} 

	class OperationNameContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_operationName;
	    }

	    public function Identifier() : ?TerminalNode
	    {
	        return $this->getToken(TarsParser::Identifier, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterOperationName($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitOperationName($this);
		    }
		}
	} 

	class ParamListContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_paramList;
	    }

	    public function param() : ?ParamContext
	    {
	    	return $this->getTypedRuleContext(ParamContext::class, 0);
	    }

	    public function paramList() : ?ParamListContext
	    {
	    	return $this->getTypedRuleContext(ParamListContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterParamList($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitParamList($this);
		    }
		}
	} 

	class ParamContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_param;
	    }

	    public function type() : ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

	    public function paramName() : ?ParamNameContext
	    {
	    	return $this->getTypedRuleContext(ParamNameContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterParam($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitParam($this);
		    }
		}
	} 

	class ParamNameContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_paramName;
	    }

	    public function Identifier() : ?TerminalNode
	    {
	        return $this->getToken(TarsParser::Identifier, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterParamName($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitParamName($this);
		    }
		}
	} 

	class KeyMapContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_keyMap;
	    }

	    public function structName() : ?StructNameContext
	    {
	    	return $this->getTypedRuleContext(StructNameContext::class, 0);
	    }

	    public function keyList() : ?KeyListContext
	    {
	    	return $this->getTypedRuleContext(KeyListContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterKeyMap($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitKeyMap($this);
		    }
		}
	} 

	class KeyListContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_keyList;
	    }

	    public function keyName() : ?KeyNameContext
	    {
	    	return $this->getTypedRuleContext(KeyNameContext::class, 0);
	    }

	    public function keyList() : ?KeyListContext
	    {
	    	return $this->getTypedRuleContext(KeyListContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterKeyList($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitKeyList($this);
		    }
		}
	} 

	class KeyNameContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_keyName;
	    }

	    public function Identifier() : ?TerminalNode
	    {
	        return $this->getToken(TarsParser::Identifier, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterKeyName($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitKeyName($this);
		    }
		}
	} 

	class TypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_type;
	    }

	    public function primitiveType() : ?PrimitiveTypeContext
	    {
	    	return $this->getTypedRuleContext(PrimitiveTypeContext::class, 0);
	    }

	    public function vectorType() : ?VectorTypeContext
	    {
	    	return $this->getTypedRuleContext(VectorTypeContext::class, 0);
	    }

	    public function mapType() : ?MapTypeContext
	    {
	    	return $this->getTypedRuleContext(MapTypeContext::class, 0);
	    }

	    public function customType() : ?CustomTypeContext
	    {
	    	return $this->getTypedRuleContext(CustomTypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitType($this);
		    }
		}
	} 

	class VectorTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_vectorType;
	    }

	    public function type() : ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterVectorType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitVectorType($this);
		    }
		}
	} 

	class MapTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_mapType;
	    }

	    /**
	     * @return array<TypeContext>|TypeContext|null
	     */
	    public function type(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(TypeContext::class);
	    	}

	        return $this->getTypedRuleContext(TypeContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterMapType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitMapType($this);
		    }
		}
	} 

	class CustomTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_customType;
	    }

	    public function Identifier() : ?TerminalNode
	    {
	        return $this->getToken(TarsParser::Identifier, 0);
	    }

	    public function moduleName() : ?ModuleNameContext
	    {
	    	return $this->getTypedRuleContext(ModuleNameContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterCustomType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitCustomType($this);
		    }
		}
	} 

	class ValueContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_value;
	    }

	    public function Int() : ?TerminalNode
	    {
	        return $this->getToken(TarsParser::Int, 0);
	    }

	    public function Float() : ?TerminalNode
	    {
	        return $this->getToken(TarsParser::Float, 0);
	    }

	    public function String() : ?TerminalNode
	    {
	        return $this->getToken(TarsParser::String, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterValue($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitValue($this);
		    }
		}
	} 

	class PrimitiveTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_primitiveType;
	    }

	    public function voidType() : ?VoidTypeContext
	    {
	    	return $this->getTypedRuleContext(VoidTypeContext::class, 0);
	    }

	    public function boolType() : ?BoolTypeContext
	    {
	    	return $this->getTypedRuleContext(BoolTypeContext::class, 0);
	    }

	    public function byteType() : ?ByteTypeContext
	    {
	    	return $this->getTypedRuleContext(ByteTypeContext::class, 0);
	    }

	    public function shortType() : ?ShortTypeContext
	    {
	    	return $this->getTypedRuleContext(ShortTypeContext::class, 0);
	    }

	    public function intType() : ?IntTypeContext
	    {
	    	return $this->getTypedRuleContext(IntTypeContext::class, 0);
	    }

	    public function longType() : ?LongTypeContext
	    {
	    	return $this->getTypedRuleContext(LongTypeContext::class, 0);
	    }

	    public function floatType() : ?FloatTypeContext
	    {
	    	return $this->getTypedRuleContext(FloatTypeContext::class, 0);
	    }

	    public function doubleType() : ?DoubleTypeContext
	    {
	    	return $this->getTypedRuleContext(DoubleTypeContext::class, 0);
	    }

	    public function stringType() : ?StringTypeContext
	    {
	    	return $this->getTypedRuleContext(StringTypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterPrimitiveType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitPrimitiveType($this);
		    }
		}
	} 

	class VoidTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_voidType;
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterVoidType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitVoidType($this);
		    }
		}
	} 

	class BoolTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_boolType;
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterBoolType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitBoolType($this);
		    }
		}
	} 

	class ByteTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_byteType;
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterByteType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitByteType($this);
		    }
		}
	} 

	class ShortTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_shortType;
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterShortType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitShortType($this);
		    }
		}
	} 

	class IntTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_intType;
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterIntType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitIntType($this);
		    }
		}
	} 

	class LongTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_longType;
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterLongType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitLongType($this);
		    }
		}
	} 

	class FloatTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_floatType;
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterFloatType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitFloatType($this);
		    }
		}
	} 

	class DoubleTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_doubleType;
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterDoubleType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitDoubleType($this);
		    }
		}
	} 

	class StringTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return TarsParser::RULE_stringType;
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->enterStringType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof TarsListener) {
			    $listener->exitStringType($this);
		    }
		}
	} 
}