<?php

declare(strict_types=1);

/*
 * Generated from src/parse/Tars.g4 by ANTLR 4.10.1
 */

namespace tars\parse {
    use Antlr\Antlr4\Runtime\Atn\ATN;
    use Antlr\Antlr4\Runtime\Atn\ATNDeserializer;
    use Antlr\Antlr4\Runtime\Atn\ParserATNSimulator;
    use Antlr\Antlr4\Runtime\Dfa\DFA;
    use Antlr\Antlr4\Runtime\Error\Exceptions\FailedPredicateException;
    use Antlr\Antlr4\Runtime\Error\Exceptions\NoViableAltException;
    use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;
    use Antlr\Antlr4\Runtime\Parser;
    use Antlr\Antlr4\Runtime\PredictionContexts\PredictionContextCache;
    use Antlr\Antlr4\Runtime\RuleContext;
    use Antlr\Antlr4\Runtime\RuntimeMetaData;
    use Antlr\Antlr4\Runtime\Token;
    use Antlr\Antlr4\Runtime\TokenStream;
    use Antlr\Antlr4\Runtime\Vocabulary;
    use Antlr\Antlr4\Runtime\VocabularyImpl;

    final class TarsParser extends Parser
    {
        public const T__0 = 1;
        public const T__1 = 2;
        public const T__2 = 3;
        public const T__3 = 4;
        public const T__4 = 5;
        public const T__5 = 6;
        public const T__6 = 7;
        public const T__7 = 8;
        public const T__8 = 9;
        public const T__9 = 10;
        public const T__10 = 11;
        public const T__11 = 12;
        public const T__12 = 13;
        public const T__13 = 14;
        public const T__14 = 15;
        public const T__15 = 16;
        public const T__16 = 17;
        public const T__17 = 18;
        public const T__18 = 19;
        public const T__19 = 20;
        public const T__20 = 21;
        public const T__21 = 22;
        public const T__22 = 23;
        public const T__23 = 24;
        public const T__24 = 25;
        public const T__25 = 26;
        public const T__26 = 27;
        public const T__27 = 28;
        public const T__28 = 29;
        public const T__29 = 30;
        public const T__30 = 31;
        public const T__31 = 32;
        public const T__32 = 33;
        public const T__33 = 34;
        public const T__34 = 35;
        public const T__35 = 36;
        public const T__36 = 37;
        public const Identifier = 38;
        public const Int = 39;
        public const Float = 40;
        public const String = 41;
        public const LineComment = 42;
        public const BlockComment = 43;
        public const WS = 44;

        public const RULE_root = 0;
        public const RULE_includeDef = 1;
        public const RULE_fileName = 2;
        public const RULE_moduleDef = 3;
        public const RULE_moduleName = 4;
        public const RULE_definition = 5;
        public const RULE_constDef = 6;
        public const RULE_constName = 7;
        public const RULE_enum = 8;
        public const RULE_enumName = 9;
        public const RULE_enumeratorList = 10;
        public const RULE_enumerator = 11;
        public const RULE_enumeratorName = 12;
        public const RULE_struct = 13;
        public const RULE_structName = 14;
        public const RULE_structField = 15;
        public const RULE_fieldOrder = 16;
        public const RULE_fieldRequire = 17;
        public const RULE_fieldName = 18;
        public const RULE_interfaceDef = 19;
        public const RULE_interfaceName = 20;
        public const RULE_operation = 21;
        public const RULE_operationName = 22;
        public const RULE_paramList = 23;
        public const RULE_param = 24;
        public const RULE_paramName = 25;
        public const RULE_keyMap = 26;
        public const RULE_keyList = 27;
        public const RULE_keyName = 28;
        public const RULE_type = 29;
        public const RULE_vectorType = 30;
        public const RULE_mapType = 31;
        public const RULE_customType = 32;
        public const RULE_value = 33;
        public const RULE_primitiveType = 34;
        public const RULE_voidType = 35;
        public const RULE_boolType = 36;
        public const RULE_byteType = 37;
        public const RULE_signedByteType = 38;
        public const RULE_unsignedByteType = 39;
        public const RULE_shortType = 40;
        public const RULE_signedShortType = 41;
        public const RULE_unsignedShortType = 42;
        public const RULE_intType = 43;
        public const RULE_signedIntType = 44;
        public const RULE_unsignedIntType = 45;
        public const RULE_longType = 46;
        public const RULE_floatType = 47;
        public const RULE_doubleType = 48;
        public const RULE_stringType = 49;

        /**
         * @var array<string>
         */
        public const RULE_NAMES = [
            'root', 'includeDef', 'fileName', 'moduleDef', 'moduleName', 'definition',
            'constDef', 'constName', 'enum', 'enumName', 'enumeratorList', 'enumerator',
            'enumeratorName', 'struct', 'structName', 'structField', 'fieldOrder',
            'fieldRequire', 'fieldName', 'interfaceDef', 'interfaceName', 'operation',
            'operationName', 'paramList', 'param', 'paramName', 'keyMap', 'keyList',
            'keyName', 'type', 'vectorType', 'mapType', 'customType', 'value', 'primitiveType',
            'voidType', 'boolType', 'byteType', 'signedByteType', 'unsignedByteType',
            'shortType', 'signedShortType', 'unsignedShortType', 'intType', 'signedIntType',
            'unsignedIntType', 'longType', 'floatType', 'doubleType', 'stringType',
        ];

        /**
         * @var array<string|null>
         */
        private const LITERAL_NAMES = [
            null, "'#include'", "'module'", "'{'", "'}'", "';'", "'const'", "'='",
            "'enum'", "','", "'struct'", "'require'", "'optional'", "'interface'",
            "'('", "')'", "'out'", "'routekey'", "'key'", "'['", "']'", "'vector'",
            "'<'", "'>'", "'map'", "'.'", "'void'", "'bool'", "'byte'", "'unsigned byte'",
            "'short'", "'unsigned short'", "'int'", "'unsigned int'", "'long'",
            "'float'", "'double'", "'string'",
        ];

        /**
         * @var array<string>
         */
        private const SYMBOLIC_NAMES = [
            null, null, null, null, null, null, null, null, null, null, null,
            null, null, null, null, null, null, null, null, null, null, null,
            null, null, null, null, null, null, null, null, null, null, null,
            null, null, null, null, null, 'Identifier', 'Int', 'Float', 'String',
            'LineComment', 'BlockComment', 'WS',
        ];

        private const SERIALIZED_ATN =
            [4, 1, 44, 360, 2, 0, 7, 0, 2, 1, 7, 1, 2, 2, 7, 2, 2, 3, 7, 3, 2, 4,
            7, 4, 2, 5, 7, 5, 2, 6, 7, 6, 2, 7, 7, 7, 2, 8, 7, 8, 2, 9, 7, 9,
            2, 10, 7, 10, 2, 11, 7, 11, 2, 12, 7, 12, 2, 13, 7, 13, 2, 14, 7,
            14, 2, 15, 7, 15, 2, 16, 7, 16, 2, 17, 7, 17, 2, 18, 7, 18, 2, 19,
            7, 19, 2, 20, 7, 20, 2, 21, 7, 21, 2, 22, 7, 22, 2, 23, 7, 23, 2,
            24, 7, 24, 2, 25, 7, 25, 2, 26, 7, 26, 2, 27, 7, 27, 2, 28, 7, 28,
            2, 29, 7, 29, 2, 30, 7, 30, 2, 31, 7, 31, 2, 32, 7, 32, 2, 33, 7,
            33, 2, 34, 7, 34, 2, 35, 7, 35, 2, 36, 7, 36, 2, 37, 7, 37, 2, 38,
            7, 38, 2, 39, 7, 39, 2, 40, 7, 40, 2, 41, 7, 41, 2, 42, 7, 42, 2,
            43, 7, 43, 2, 44, 7, 44, 2, 45, 7, 45, 2, 46, 7, 46, 2, 47, 7, 47,
            2, 48, 7, 48, 2, 49, 7, 49, 1, 0, 5, 0, 102, 8, 0, 10, 0, 12, 0, 105,
            9, 0, 1, 0, 5, 0, 108, 8, 0, 10, 0, 12, 0, 111, 9, 0, 1, 1, 1, 1,
            1, 1, 1, 2, 1, 2, 1, 3, 1, 3, 1, 3, 1, 3, 5, 3, 122, 8, 3, 10, 3,
            12, 3, 125, 9, 3, 1, 3, 1, 3, 3, 3, 129, 8, 3, 1, 4, 1, 4, 1, 5, 1,
            5, 1, 5, 1, 5, 1, 5, 3, 5, 138, 8, 5, 1, 6, 1, 6, 3, 6, 142, 8, 6,
            1, 6, 1, 6, 1, 6, 1, 6, 1, 6, 1, 7, 1, 7, 1, 8, 1, 8, 1, 8, 1, 8,
            5, 8, 155, 8, 8, 10, 8, 12, 8, 158, 9, 8, 1, 8, 1, 8, 3, 8, 162, 8,
            8, 1, 9, 1, 9, 1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 3,
            10, 173, 8, 10, 5, 10, 175, 8, 10, 10, 10, 12, 10, 178, 9, 10, 1,
            11, 1, 11, 1, 11, 3, 11, 183, 8, 11, 1, 12, 1, 12, 1, 13, 1, 13, 1,
            13, 1, 13, 5, 13, 191, 8, 13, 10, 13, 12, 13, 194, 9, 13, 1, 13, 1,
            13, 3, 13, 198, 8, 13, 1, 14, 1, 14, 1, 15, 1, 15, 1, 15, 1, 15, 1,
            15, 1, 15, 3, 15, 208, 8, 15, 1, 15, 1, 15, 1, 16, 1, 16, 1, 17, 1,
            17, 1, 18, 1, 18, 1, 19, 1, 19, 1, 19, 1, 19, 5, 19, 222, 8, 19, 10,
            19, 12, 19, 225, 9, 19, 1, 19, 1, 19, 3, 19, 229, 8, 19, 1, 20, 1,
            20, 1, 21, 1, 21, 1, 21, 1, 21, 3, 21, 237, 8, 21, 1, 21, 1, 21, 1,
            21, 1, 22, 1, 22, 1, 23, 1, 23, 1, 23, 1, 23, 1, 23, 1, 23, 5, 23,
            250, 8, 23, 10, 23, 12, 23, 253, 9, 23, 1, 24, 3, 24, 256, 8, 24,
            1, 24, 3, 24, 259, 8, 24, 1, 24, 1, 24, 1, 24, 1, 25, 1, 25, 1, 26,
            1, 26, 1, 26, 1, 26, 1, 26, 1, 26, 1, 26, 1, 27, 1, 27, 1, 27, 1,
            27, 1, 27, 1, 27, 5, 27, 279, 8, 27, 10, 27, 12, 27, 282, 9, 27, 1,
            28, 1, 28, 1, 29, 1, 29, 1, 29, 1, 29, 3, 29, 290, 8, 29, 1, 30, 1,
            30, 1, 30, 1, 30, 1, 30, 1, 31, 1, 31, 1, 31, 1, 31, 1, 31, 1, 31,
            1, 31, 1, 32, 1, 32, 1, 32, 1, 32, 1, 32, 3, 32, 309, 8, 32, 1, 33,
            1, 33, 1, 34, 1, 34, 1, 34, 1, 34, 1, 34, 1, 34, 1, 34, 1, 34, 1,
            34, 3, 34, 322, 8, 34, 1, 35, 1, 35, 1, 36, 1, 36, 1, 37, 1, 37, 3,
            37, 330, 8, 37, 1, 38, 1, 38, 1, 39, 1, 39, 1, 40, 1, 40, 3, 40, 338,
            8, 40, 1, 41, 1, 41, 1, 42, 1, 42, 1, 43, 1, 43, 3, 43, 346, 8, 43,
            1, 44, 1, 44, 1, 45, 1, 45, 1, 46, 1, 46, 1, 47, 1, 47, 1, 48, 1,
            48, 1, 49, 1, 49, 1, 49, 0, 3, 20, 46, 54, 50, 0, 2, 4, 6, 8, 10,
            12, 14, 16, 18, 20, 22, 24, 26, 28, 30, 32, 34, 36, 38, 40, 42, 44,
            46, 48, 50, 52, 54, 56, 58, 60, 62, 64, 66, 68, 70, 72, 74, 76, 78,
            80, 82, 84, 86, 88, 90, 92, 94, 96, 98, 0, 2, 1, 0, 11, 12, 1, 0,
            39, 41, 348, 0, 103, 1, 0, 0, 0, 2, 112, 1, 0, 0, 0, 4, 115, 1, 0,
            0, 0, 6, 117, 1, 0, 0, 0, 8, 130, 1, 0, 0, 0, 10, 137, 1, 0, 0, 0,
            12, 139, 1, 0, 0, 0, 14, 148, 1, 0, 0, 0, 16, 150, 1, 0, 0, 0, 18,
            163, 1, 0, 0, 0, 20, 165, 1, 0, 0, 0, 22, 179, 1, 0, 0, 0, 24, 184,
            1, 0, 0, 0, 26, 186, 1, 0, 0, 0, 28, 199, 1, 0, 0, 0, 30, 201, 1,
            0, 0, 0, 32, 211, 1, 0, 0, 0, 34, 213, 1, 0, 0, 0, 36, 215, 1, 0,
            0, 0, 38, 217, 1, 0, 0, 0, 40, 230, 1, 0, 0, 0, 42, 232, 1, 0, 0,
            0, 44, 241, 1, 0, 0, 0, 46, 243, 1, 0, 0, 0, 48, 255, 1, 0, 0, 0,
            50, 263, 1, 0, 0, 0, 52, 265, 1, 0, 0, 0, 54, 272, 1, 0, 0, 0, 56,
            283, 1, 0, 0, 0, 58, 289, 1, 0, 0, 0, 60, 291, 1, 0, 0, 0, 62, 296,
            1, 0, 0, 0, 64, 308, 1, 0, 0, 0, 66, 310, 1, 0, 0, 0, 68, 321, 1,
            0, 0, 0, 70, 323, 1, 0, 0, 0, 72, 325, 1, 0, 0, 0, 74, 329, 1, 0,
            0, 0, 76, 331, 1, 0, 0, 0, 78, 333, 1, 0, 0, 0, 80, 337, 1, 0, 0,
            0, 82, 339, 1, 0, 0, 0, 84, 341, 1, 0, 0, 0, 86, 345, 1, 0, 0, 0,
            88, 347, 1, 0, 0, 0, 90, 349, 1, 0, 0, 0, 92, 351, 1, 0, 0, 0, 94,
            353, 1, 0, 0, 0, 96, 355, 1, 0, 0, 0, 98, 357, 1, 0, 0, 0, 100, 102,
            3, 2, 1, 0, 101, 100, 1, 0, 0, 0, 102, 105, 1, 0, 0, 0, 103, 101,
            1, 0, 0, 0, 103, 104, 1, 0, 0, 0, 104, 109, 1, 0, 0, 0, 105, 103,
            1, 0, 0, 0, 106, 108, 3, 6, 3, 0, 107, 106, 1, 0, 0, 0, 108, 111,
            1, 0, 0, 0, 109, 107, 1, 0, 0, 0, 109, 110, 1, 0, 0, 0, 110, 1, 1,
            0, 0, 0, 111, 109, 1, 0, 0, 0, 112, 113, 5, 1, 0, 0, 113, 114, 3,
            4, 2, 0, 114, 3, 1, 0, 0, 0, 115, 116, 5, 41, 0, 0, 116, 5, 1, 0,
            0, 0, 117, 118, 5, 2, 0, 0, 118, 119, 3, 8, 4, 0, 119, 123, 5, 3,
            0, 0, 120, 122, 3, 10, 5, 0, 121, 120, 1, 0, 0, 0, 122, 125, 1, 0,
            0, 0, 123, 121, 1, 0, 0, 0, 123, 124, 1, 0, 0, 0, 124, 126, 1, 0,
            0, 0, 125, 123, 1, 0, 0, 0, 126, 128, 5, 4, 0, 0, 127, 129, 5, 5,
            0, 0, 128, 127, 1, 0, 0, 0, 128, 129, 1, 0, 0, 0, 129, 7, 1, 0, 0,
            0, 130, 131, 5, 38, 0, 0, 131, 9, 1, 0, 0, 0, 132, 138, 3, 12, 6,
            0, 133, 138, 3, 16, 8, 0, 134, 138, 3, 26, 13, 0, 135, 138, 3, 38,
            19, 0, 136, 138, 3, 52, 26, 0, 137, 132, 1, 0, 0, 0, 137, 133, 1,
            0, 0, 0, 137, 134, 1, 0, 0, 0, 137, 135, 1, 0, 0, 0, 137, 136, 1,
            0, 0, 0, 138, 11, 1, 0, 0, 0, 139, 141, 5, 6, 0, 0, 140, 142, 3, 68,
            34, 0, 141, 140, 1, 0, 0, 0, 141, 142, 1, 0, 0, 0, 142, 143, 1, 0,
            0, 0, 143, 144, 3, 14, 7, 0, 144, 145, 5, 7, 0, 0, 145, 146, 3, 66,
            33, 0, 146, 147, 5, 5, 0, 0, 147, 13, 1, 0, 0, 0, 148, 149, 5, 38,
            0, 0, 149, 15, 1, 0, 0, 0, 150, 151, 5, 8, 0, 0, 151, 152, 3, 18,
            9, 0, 152, 156, 5, 3, 0, 0, 153, 155, 3, 20, 10, 0, 154, 153, 1, 0,
            0, 0, 155, 158, 1, 0, 0, 0, 156, 154, 1, 0, 0, 0, 156, 157, 1, 0,
            0, 0, 157, 159, 1, 0, 0, 0, 158, 156, 1, 0, 0, 0, 159, 161, 5, 4,
            0, 0, 160, 162, 5, 5, 0, 0, 161, 160, 1, 0, 0, 0, 161, 162, 1, 0,
            0, 0, 162, 17, 1, 0, 0, 0, 163, 164, 5, 38, 0, 0, 164, 19, 1, 0, 0,
            0, 165, 166, 6, 10, -1, 0, 166, 167, 3, 22, 11, 0, 167, 176, 1, 0,
            0, 0, 168, 169, 10, 1, 0, 0, 169, 170, 5, 9, 0, 0, 170, 172, 3, 22,
            11, 0, 171, 173, 5, 9, 0, 0, 172, 171, 1, 0, 0, 0, 172, 173, 1, 0,
            0, 0, 173, 175, 1, 0, 0, 0, 174, 168, 1, 0, 0, 0, 175, 178, 1, 0,
            0, 0, 176, 174, 1, 0, 0, 0, 176, 177, 1, 0, 0, 0, 177, 21, 1, 0, 0,
            0, 178, 176, 1, 0, 0, 0, 179, 182, 3, 24, 12, 0, 180, 181, 5, 7, 0,
            0, 181, 183, 3, 66, 33, 0, 182, 180, 1, 0, 0, 0, 182, 183, 1, 0, 0,
            0, 183, 23, 1, 0, 0, 0, 184, 185, 5, 38, 0, 0, 185, 25, 1, 0, 0, 0,
            186, 187, 5, 10, 0, 0, 187, 188, 3, 28, 14, 0, 188, 192, 5, 3, 0,
            0, 189, 191, 3, 30, 15, 0, 190, 189, 1, 0, 0, 0, 191, 194, 1, 0, 0,
            0, 192, 190, 1, 0, 0, 0, 192, 193, 1, 0, 0, 0, 193, 195, 1, 0, 0,
            0, 194, 192, 1, 0, 0, 0, 195, 197, 5, 4, 0, 0, 196, 198, 5, 5, 0,
            0, 197, 196, 1, 0, 0, 0, 197, 198, 1, 0, 0, 0, 198, 27, 1, 0, 0, 0,
            199, 200, 5, 38, 0, 0, 200, 29, 1, 0, 0, 0, 201, 202, 3, 32, 16, 0,
            202, 203, 3, 34, 17, 0, 203, 204, 3, 58, 29, 0, 204, 207, 3, 36, 18,
            0, 205, 206, 5, 7, 0, 0, 206, 208, 3, 66, 33, 0, 207, 205, 1, 0, 0,
            0, 207, 208, 1, 0, 0, 0, 208, 209, 1, 0, 0, 0, 209, 210, 5, 5, 0,
            0, 210, 31, 1, 0, 0, 0, 211, 212, 5, 39, 0, 0, 212, 33, 1, 0, 0, 0,
            213, 214, 7, 0, 0, 0, 214, 35, 1, 0, 0, 0, 215, 216, 5, 38, 0, 0,
            216, 37, 1, 0, 0, 0, 217, 218, 5, 13, 0, 0, 218, 219, 3, 40, 20, 0,
            219, 223, 5, 3, 0, 0, 220, 222, 3, 42, 21, 0, 221, 220, 1, 0, 0, 0,
            222, 225, 1, 0, 0, 0, 223, 221, 1, 0, 0, 0, 223, 224, 1, 0, 0, 0,
            224, 226, 1, 0, 0, 0, 225, 223, 1, 0, 0, 0, 226, 228, 5, 4, 0, 0,
            227, 229, 5, 5, 0, 0, 228, 227, 1, 0, 0, 0, 228, 229, 1, 0, 0, 0,
            229, 39, 1, 0, 0, 0, 230, 231, 5, 38, 0, 0, 231, 41, 1, 0, 0, 0, 232,
            233, 3, 58, 29, 0, 233, 234, 3, 44, 22, 0, 234, 236, 5, 14, 0, 0,
            235, 237, 3, 46, 23, 0, 236, 235, 1, 0, 0, 0, 236, 237, 1, 0, 0, 0,
            237, 238, 1, 0, 0, 0, 238, 239, 5, 15, 0, 0, 239, 240, 5, 5, 0, 0,
            240, 43, 1, 0, 0, 0, 241, 242, 5, 38, 0, 0, 242, 45, 1, 0, 0, 0, 243,
            244, 6, 23, -1, 0, 244, 245, 3, 48, 24, 0, 245, 251, 1, 0, 0, 0, 246,
            247, 10, 1, 0, 0, 247, 248, 5, 9, 0, 0, 248, 250, 3, 48, 24, 0, 249,
            246, 1, 0, 0, 0, 250, 253, 1, 0, 0, 0, 251, 249, 1, 0, 0, 0, 251,
            252, 1, 0, 0, 0, 252, 47, 1, 0, 0, 0, 253, 251, 1, 0, 0, 0, 254, 256,
            5, 16, 0, 0, 255, 254, 1, 0, 0, 0, 255, 256, 1, 0, 0, 0, 256, 258,
            1, 0, 0, 0, 257, 259, 5, 17, 0, 0, 258, 257, 1, 0, 0, 0, 258, 259,
            1, 0, 0, 0, 259, 260, 1, 0, 0, 0, 260, 261, 3, 58, 29, 0, 261, 262,
            3, 50, 25, 0, 262, 49, 1, 0, 0, 0, 263, 264, 5, 38, 0, 0, 264, 51,
            1, 0, 0, 0, 265, 266, 5, 18, 0, 0, 266, 267, 5, 19, 0, 0, 267, 268,
            3, 28, 14, 0, 268, 269, 5, 9, 0, 0, 269, 270, 3, 54, 27, 0, 270, 271,
            5, 20, 0, 0, 271, 53, 1, 0, 0, 0, 272, 273, 6, 27, -1, 0, 273, 274,
            3, 56, 28, 0, 274, 280, 1, 0, 0, 0, 275, 276, 10, 1, 0, 0, 276, 277,
            5, 9, 0, 0, 277, 279, 3, 56, 28, 0, 278, 275, 1, 0, 0, 0, 279, 282,
            1, 0, 0, 0, 280, 278, 1, 0, 0, 0, 280, 281, 1, 0, 0, 0, 281, 55, 1,
            0, 0, 0, 282, 280, 1, 0, 0, 0, 283, 284, 5, 38, 0, 0, 284, 57, 1,
            0, 0, 0, 285, 290, 3, 68, 34, 0, 286, 290, 3, 60, 30, 0, 287, 290,
            3, 62, 31, 0, 288, 290, 3, 64, 32, 0, 289, 285, 1, 0, 0, 0, 289, 286,
            1, 0, 0, 0, 289, 287, 1, 0, 0, 0, 289, 288, 1, 0, 0, 0, 290, 59, 1,
            0, 0, 0, 291, 292, 5, 21, 0, 0, 292, 293, 5, 22, 0, 0, 293, 294, 3,
            58, 29, 0, 294, 295, 5, 23, 0, 0, 295, 61, 1, 0, 0, 0, 296, 297, 5,
            24, 0, 0, 297, 298, 5, 22, 0, 0, 298, 299, 3, 58, 29, 0, 299, 300,
            5, 9, 0, 0, 300, 301, 3, 58, 29, 0, 301, 302, 5, 23, 0, 0, 302, 63,
            1, 0, 0, 0, 303, 309, 5, 38, 0, 0, 304, 305, 3, 8, 4, 0, 305, 306,
            5, 25, 0, 0, 306, 307, 5, 38, 0, 0, 307, 309, 1, 0, 0, 0, 308, 303,
            1, 0, 0, 0, 308, 304, 1, 0, 0, 0, 309, 65, 1, 0, 0, 0, 310, 311, 7,
            1, 0, 0, 311, 67, 1, 0, 0, 0, 312, 322, 3, 70, 35, 0, 313, 322, 3,
            72, 36, 0, 314, 322, 3, 74, 37, 0, 315, 322, 3, 80, 40, 0, 316, 322,
            3, 86, 43, 0, 317, 322, 3, 92, 46, 0, 318, 322, 3, 94, 47, 0, 319,
            322, 3, 96, 48, 0, 320, 322, 3, 98, 49, 0, 321, 312, 1, 0, 0, 0, 321,
            313, 1, 0, 0, 0, 321, 314, 1, 0, 0, 0, 321, 315, 1, 0, 0, 0, 321,
            316, 1, 0, 0, 0, 321, 317, 1, 0, 0, 0, 321, 318, 1, 0, 0, 0, 321,
            319, 1, 0, 0, 0, 321, 320, 1, 0, 0, 0, 322, 69, 1, 0, 0, 0, 323, 324,
            5, 26, 0, 0, 324, 71, 1, 0, 0, 0, 325, 326, 5, 27, 0, 0, 326, 73,
            1, 0, 0, 0, 327, 330, 3, 76, 38, 0, 328, 330, 3, 78, 39, 0, 329, 327,
            1, 0, 0, 0, 329, 328, 1, 0, 0, 0, 330, 75, 1, 0, 0, 0, 331, 332, 5,
            28, 0, 0, 332, 77, 1, 0, 0, 0, 333, 334, 5, 29, 0, 0, 334, 79, 1,
            0, 0, 0, 335, 338, 3, 82, 41, 0, 336, 338, 3, 84, 42, 0, 337, 335,
            1, 0, 0, 0, 337, 336, 1, 0, 0, 0, 338, 81, 1, 0, 0, 0, 339, 340, 5,
            30, 0, 0, 340, 83, 1, 0, 0, 0, 341, 342, 5, 31, 0, 0, 342, 85, 1,
            0, 0, 0, 343, 346, 3, 88, 44, 0, 344, 346, 3, 90, 45, 0, 345, 343,
            1, 0, 0, 0, 345, 344, 1, 0, 0, 0, 346, 87, 1, 0, 0, 0, 347, 348, 5,
            32, 0, 0, 348, 89, 1, 0, 0, 0, 349, 350, 5, 33, 0, 0, 350, 91, 1,
            0, 0, 0, 351, 352, 5, 34, 0, 0, 352, 93, 1, 0, 0, 0, 353, 354, 5,
            35, 0, 0, 354, 95, 1, 0, 0, 0, 355, 356, 5, 36, 0, 0, 356, 97, 1,
            0, 0, 0, 357, 358, 5, 37, 0, 0, 358, 99, 1, 0, 0, 0, 27, 103, 109,
            123, 128, 137, 141, 156, 161, 172, 176, 182, 192, 197, 207, 223, 228,
            236, 251, 255, 258, 280, 289, 308, 321, 329, 337, 345, ];
        protected static $atn;
        protected static $decisionToDFA;
        protected static $sharedContextCache;

        public function __construct(TokenStream $input)
        {
            parent::__construct($input);

            self::initialize();

            $this->interp = new ParserATNSimulator($this, self::$atn, self::$decisionToDFA, self::$sharedContextCache);
        }

        private static function initialize(): void
        {
            if (null !== self::$atn) {
                return;
            }

            RuntimeMetaData::checkVersion('4.10.1', RuntimeMetaData::VERSION);

            $atn = (new ATNDeserializer())->deserialize(self::SERIALIZED_ATN);

            $decisionToDFA = [];
            for ($i = 0, $count = $atn->getNumberOfDecisions(); $i < $count; ++$i) {
                $decisionToDFA[] = new DFA($atn->getDecisionState($i), $i);
            }

            self::$atn = $atn;
            self::$decisionToDFA = $decisionToDFA;
            self::$sharedContextCache = new PredictionContextCache();
        }

        public function getGrammarFileName(): string
        {
            return 'Tars.g4';
        }

        public function getRuleNames(): array
        {
            return self::RULE_NAMES;
        }

        public function getSerializedATN(): array
        {
            return self::SERIALIZED_ATN;
        }

        public function getATN(): ATN
        {
            return self::$atn;
        }

        public function getVocabulary(): Vocabulary
        {
            static $vocabulary;

            return $vocabulary = $vocabulary ?? new VocabularyImpl(self::LITERAL_NAMES, self::SYMBOLIC_NAMES);
        }

        /**
         * @throws RecognitionException
         */
        public function root(): Context\RootContext
        {
            $localContext = new Context\RootContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 0, self::RULE_root);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(103);
                $this->errorHandler->sync($this);

                $_la = $this->input->LA(1);
                while (self::T__0 === $_la) {
                    $this->setState(100);
                    $this->includeDef();
                    $this->setState(105);
                    $this->errorHandler->sync($this);
                    $_la = $this->input->LA(1);
                }
                $this->setState(109);
                $this->errorHandler->sync($this);

                $_la = $this->input->LA(1);
                while (self::T__1 === $_la) {
                    $this->setState(106);
                    $this->moduleDef();
                    $this->setState(111);
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
        public function includeDef(): Context\IncludeDefContext
        {
            $localContext = new Context\IncludeDefContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 2, self::RULE_includeDef);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(112);
                $this->match(self::T__0);
                $this->setState(113);
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
        public function fileName(): Context\FileNameContext
        {
            $localContext = new Context\FileNameContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 4, self::RULE_fileName);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(115);
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
        public function moduleDef(): Context\ModuleDefContext
        {
            $localContext = new Context\ModuleDefContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 6, self::RULE_moduleDef);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(117);
                $this->match(self::T__1);
                $this->setState(118);
                $this->moduleName();
                $this->setState(119);
                $this->match(self::T__2);
                $this->setState(123);
                $this->errorHandler->sync($this);

                $_la = $this->input->LA(1);
                while (((($_la) & ~0x3F) === 0 && ((1 << $_la) & ((1 << self::T__5) | (1 << self::T__7) | (1 << self::T__9) | (1 << self::T__12) | (1 << self::T__17))) !== 0)) {
                    $this->setState(120);
                    $this->definition();
                    $this->setState(125);
                    $this->errorHandler->sync($this);
                    $_la = $this->input->LA(1);
                }
                $this->setState(126);
                $this->match(self::T__3);
                $this->setState(128);
                $this->errorHandler->sync($this);
                $_la = $this->input->LA(1);

                if (self::T__4 === $_la) {
                    $this->setState(127);
                    $this->match(self::T__4);
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
        public function moduleName(): Context\ModuleNameContext
        {
            $localContext = new Context\ModuleNameContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 8, self::RULE_moduleName);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(130);
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
        public function definition(): Context\DefinitionContext
        {
            $localContext = new Context\DefinitionContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 10, self::RULE_definition);

            try {
                $this->setState(137);
                $this->errorHandler->sync($this);

                switch ($this->input->LA(1)) {
                    case self::T__5:
                        $this->enterOuterAlt($localContext, 1);
                        $this->setState(132);
                        $this->constDef();
                        break;

                    case self::T__7:
                        $this->enterOuterAlt($localContext, 2);
                        $this->setState(133);
                        $this->enum();
                        break;

                    case self::T__9:
                        $this->enterOuterAlt($localContext, 3);
                        $this->setState(134);
                        $this->struct();
                        break;

                    case self::T__12:
                        $this->enterOuterAlt($localContext, 4);
                        $this->setState(135);
                        $this->interfaceDef();
                        break;

                    case self::T__17:
                        $this->enterOuterAlt($localContext, 5);
                        $this->setState(136);
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
        public function constDef(): Context\ConstDefContext
        {
            $localContext = new Context\ConstDefContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 12, self::RULE_constDef);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(139);
                $this->match(self::T__5);
                $this->setState(141);
                $this->errorHandler->sync($this);
                $_la = $this->input->LA(1);

                if (((($_la) & ~0x3F) === 0 && ((1 << $_la) & ((1 << self::T__25) | (1 << self::T__26) | (1 << self::T__27) | (1 << self::T__28) | (1 << self::T__29) | (1 << self::T__30) | (1 << self::T__31) | (1 << self::T__32) | (1 << self::T__33) | (1 << self::T__34) | (1 << self::T__35) | (1 << self::T__36))) !== 0)) {
                    $this->setState(140);
                    $this->primitiveType();
                }
                $this->setState(143);
                $this->constName();
                $this->setState(144);
                $this->match(self::T__6);
                $this->setState(145);
                $this->value();
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
        public function constName(): Context\ConstNameContext
        {
            $localContext = new Context\ConstNameContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 14, self::RULE_constName);

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
        public function enum(): Context\EnumContext
        {
            $localContext = new Context\EnumContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 16, self::RULE_enum);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(150);
                $this->match(self::T__7);
                $this->setState(151);
                $this->enumName();
                $this->setState(152);
                $this->match(self::T__2);
                $this->setState(156);
                $this->errorHandler->sync($this);

                $_la = $this->input->LA(1);
                while (self::Identifier === $_la) {
                    $this->setState(153);
                    $this->recursiveEnumeratorList(0);
                    $this->setState(158);
                    $this->errorHandler->sync($this);
                    $_la = $this->input->LA(1);
                }
                $this->setState(159);
                $this->match(self::T__3);
                $this->setState(161);
                $this->errorHandler->sync($this);
                $_la = $this->input->LA(1);

                if (self::T__4 === $_la) {
                    $this->setState(160);
                    $this->match(self::T__4);
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
        public function enumName(): Context\EnumNameContext
        {
            $localContext = new Context\EnumNameContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 18, self::RULE_enumName);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(163);
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
        public function enumeratorList(): Context\EnumeratorListContext
        {
            return $this->recursiveEnumeratorList(0);
        }

        /**
         * @throws RecognitionException
         */
        private function recursiveEnumeratorList(int $precedence): Context\EnumeratorListContext
        {
            $parentContext = $this->ctx;
            $parentState = $this->getState();
            $localContext = new Context\EnumeratorListContext($this->ctx, $parentState);
            $previousContext = $localContext;
            $startState = 20;
            $this->enterRecursionRule($localContext, 20, self::RULE_enumeratorList, $precedence);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(166);
                $this->enumerator();
                $this->ctx->stop = $this->input->LT(-1);
                $this->setState(176);
                $this->errorHandler->sync($this);

                $alt = $this->getInterpreter()->adaptivePredict($this->input, 9, $this->ctx);

                while (2 !== $alt && ATN::INVALID_ALT_NUMBER !== $alt) {
                    if (1 === $alt) {
                        if (null !== $this->getParseListeners()) {
                            $this->triggerExitRuleEvent();
                        }

                        $previousContext = $localContext;
                        $localContext = new Context\EnumeratorListContext($parentContext, $parentState);
                        $this->pushNewRecursionContext($localContext, $startState, self::RULE_enumeratorList);
                        $this->setState(168);

                        if (!($this->precpred($this->ctx, 1))) {
                            throw new FailedPredicateException($this, '\\$this->precpred(\\$this->ctx, 1)');
                        }
                        $this->setState(169);
                        $this->match(self::T__8);
                        $this->setState(170);
                        $this->enumerator();
                        $this->setState(172);
                        $this->errorHandler->sync($this);

                        switch ($this->getInterpreter()->adaptivePredict($this->input, 8, $this->ctx)) {
                            case 1:
                                $this->setState(171);
                                $this->match(self::T__8);
                            break;
                        }
                    }

                    $this->setState(178);
                    $this->errorHandler->sync($this);

                    $alt = $this->getInterpreter()->adaptivePredict($this->input, 9, $this->ctx);
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
        public function enumerator(): Context\EnumeratorContext
        {
            $localContext = new Context\EnumeratorContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 22, self::RULE_enumerator);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(179);
                $this->enumeratorName();
                $this->setState(182);
                $this->errorHandler->sync($this);

                switch ($this->getInterpreter()->adaptivePredict($this->input, 10, $this->ctx)) {
                    case 1:
                        $this->setState(180);
                        $this->match(self::T__6);
                        $this->setState(181);
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
        public function enumeratorName(): Context\EnumeratorNameContext
        {
            $localContext = new Context\EnumeratorNameContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 24, self::RULE_enumeratorName);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(184);
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
        public function struct(): Context\StructContext
        {
            $localContext = new Context\StructContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 26, self::RULE_struct);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(186);
                $this->match(self::T__9);
                $this->setState(187);
                $this->structName();
                $this->setState(188);
                $this->match(self::T__2);
                $this->setState(192);
                $this->errorHandler->sync($this);

                $_la = $this->input->LA(1);
                while (self::Int === $_la) {
                    $this->setState(189);
                    $this->structField();
                    $this->setState(194);
                    $this->errorHandler->sync($this);
                    $_la = $this->input->LA(1);
                }
                $this->setState(195);
                $this->match(self::T__3);
                $this->setState(197);
                $this->errorHandler->sync($this);
                $_la = $this->input->LA(1);

                if (self::T__4 === $_la) {
                    $this->setState(196);
                    $this->match(self::T__4);
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
        public function structName(): Context\StructNameContext
        {
            $localContext = new Context\StructNameContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 28, self::RULE_structName);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(199);
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
        public function structField(): Context\StructFieldContext
        {
            $localContext = new Context\StructFieldContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 30, self::RULE_structField);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(201);
                $this->fieldOrder();
                $this->setState(202);
                $this->fieldRequire();
                $this->setState(203);
                $this->type();
                $this->setState(204);
                $this->fieldName();
                $this->setState(207);
                $this->errorHandler->sync($this);
                $_la = $this->input->LA(1);

                if (self::T__6 === $_la) {
                    $this->setState(205);
                    $this->match(self::T__6);
                    $this->setState(206);
                    $this->value();
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
        public function fieldOrder(): Context\FieldOrderContext
        {
            $localContext = new Context\FieldOrderContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 32, self::RULE_fieldOrder);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(211);
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
        public function fieldRequire(): Context\FieldRequireContext
        {
            $localContext = new Context\FieldRequireContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 34, self::RULE_fieldRequire);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(213);

                $_la = $this->input->LA(1);

                if (!(self::T__10 === $_la || self::T__11 === $_la)) {
                    $this->errorHandler->recoverInline($this);
                } else {
                    if (Token::EOF === $this->input->LA(1)) {
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
        public function fieldName(): Context\FieldNameContext
        {
            $localContext = new Context\FieldNameContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 36, self::RULE_fieldName);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(215);
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
        public function interfaceDef(): Context\InterfaceDefContext
        {
            $localContext = new Context\InterfaceDefContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 38, self::RULE_interfaceDef);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(217);
                $this->match(self::T__12);
                $this->setState(218);
                $this->interfaceName();
                $this->setState(219);
                $this->match(self::T__2);
                $this->setState(223);
                $this->errorHandler->sync($this);

                $_la = $this->input->LA(1);
                while (((($_la) & ~0x3F) === 0 && ((1 << $_la) & ((1 << self::T__20) | (1 << self::T__23) | (1 << self::T__25) | (1 << self::T__26) | (1 << self::T__27) | (1 << self::T__28) | (1 << self::T__29) | (1 << self::T__30) | (1 << self::T__31) | (1 << self::T__32) | (1 << self::T__33) | (1 << self::T__34) | (1 << self::T__35) | (1 << self::T__36) | (1 << self::Identifier))) !== 0)) {
                    $this->setState(220);
                    $this->operation();
                    $this->setState(225);
                    $this->errorHandler->sync($this);
                    $_la = $this->input->LA(1);
                }
                $this->setState(226);
                $this->match(self::T__3);
                $this->setState(228);
                $this->errorHandler->sync($this);
                $_la = $this->input->LA(1);

                if (self::T__4 === $_la) {
                    $this->setState(227);
                    $this->match(self::T__4);
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
        public function interfaceName(): Context\InterfaceNameContext
        {
            $localContext = new Context\InterfaceNameContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 40, self::RULE_interfaceName);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(230);
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
        public function operation(): Context\OperationContext
        {
            $localContext = new Context\OperationContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 42, self::RULE_operation);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(232);
                $this->type();
                $this->setState(233);
                $this->operationName();
                $this->setState(234);
                $this->match(self::T__13);
                $this->setState(236);
                $this->errorHandler->sync($this);
                $_la = $this->input->LA(1);

                if (((($_la) & ~0x3F) === 0 && ((1 << $_la) & ((1 << self::T__15) | (1 << self::T__16) | (1 << self::T__20) | (1 << self::T__23) | (1 << self::T__25) | (1 << self::T__26) | (1 << self::T__27) | (1 << self::T__28) | (1 << self::T__29) | (1 << self::T__30) | (1 << self::T__31) | (1 << self::T__32) | (1 << self::T__33) | (1 << self::T__34) | (1 << self::T__35) | (1 << self::T__36) | (1 << self::Identifier))) !== 0)) {
                    $this->setState(235);
                    $this->recursiveParamList(0);
                }
                $this->setState(238);
                $this->match(self::T__14);
                $this->setState(239);
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
        public function operationName(): Context\OperationNameContext
        {
            $localContext = new Context\OperationNameContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 44, self::RULE_operationName);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(241);
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
        public function paramList(): Context\ParamListContext
        {
            return $this->recursiveParamList(0);
        }

        /**
         * @throws RecognitionException
         */
        private function recursiveParamList(int $precedence): Context\ParamListContext
        {
            $parentContext = $this->ctx;
            $parentState = $this->getState();
            $localContext = new Context\ParamListContext($this->ctx, $parentState);
            $previousContext = $localContext;
            $startState = 46;
            $this->enterRecursionRule($localContext, 46, self::RULE_paramList, $precedence);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(244);
                $this->param();
                $this->ctx->stop = $this->input->LT(-1);
                $this->setState(251);
                $this->errorHandler->sync($this);

                $alt = $this->getInterpreter()->adaptivePredict($this->input, 17, $this->ctx);

                while (2 !== $alt && ATN::INVALID_ALT_NUMBER !== $alt) {
                    if (1 === $alt) {
                        if (null !== $this->getParseListeners()) {
                            $this->triggerExitRuleEvent();
                        }

                        $previousContext = $localContext;
                        $localContext = new Context\ParamListContext($parentContext, $parentState);
                        $this->pushNewRecursionContext($localContext, $startState, self::RULE_paramList);
                        $this->setState(246);

                        if (!($this->precpred($this->ctx, 1))) {
                            throw new FailedPredicateException($this, '\\$this->precpred(\\$this->ctx, 1)');
                        }
                        $this->setState(247);
                        $this->match(self::T__8);
                        $this->setState(248);
                        $this->param();
                    }

                    $this->setState(253);
                    $this->errorHandler->sync($this);

                    $alt = $this->getInterpreter()->adaptivePredict($this->input, 17, $this->ctx);
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
        public function param(): Context\ParamContext
        {
            $localContext = new Context\ParamContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 48, self::RULE_param);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(255);
                $this->errorHandler->sync($this);
                $_la = $this->input->LA(1);

                if (self::T__15 === $_la) {
                    $this->setState(254);
                    $localContext->out = $this->match(self::T__15);
                }
                $this->setState(258);
                $this->errorHandler->sync($this);
                $_la = $this->input->LA(1);

                if (self::T__16 === $_la) {
                    $this->setState(257);
                    $localContext->routeKey = $this->match(self::T__16);
                }
                $this->setState(260);
                $this->type();
                $this->setState(261);
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
        public function paramName(): Context\ParamNameContext
        {
            $localContext = new Context\ParamNameContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 50, self::RULE_paramName);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(263);
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
        public function keyMap(): Context\KeyMapContext
        {
            $localContext = new Context\KeyMapContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 52, self::RULE_keyMap);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(265);
                $this->match(self::T__17);
                $this->setState(266);
                $this->match(self::T__18);
                $this->setState(267);
                $this->structName();
                $this->setState(268);
                $this->match(self::T__8);
                $this->setState(269);
                $this->recursiveKeyList(0);
                $this->setState(270);
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
        public function keyList(): Context\KeyListContext
        {
            return $this->recursiveKeyList(0);
        }

        /**
         * @throws RecognitionException
         */
        private function recursiveKeyList(int $precedence): Context\KeyListContext
        {
            $parentContext = $this->ctx;
            $parentState = $this->getState();
            $localContext = new Context\KeyListContext($this->ctx, $parentState);
            $previousContext = $localContext;
            $startState = 54;
            $this->enterRecursionRule($localContext, 54, self::RULE_keyList, $precedence);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(273);
                $this->keyName();
                $this->ctx->stop = $this->input->LT(-1);
                $this->setState(280);
                $this->errorHandler->sync($this);

                $alt = $this->getInterpreter()->adaptivePredict($this->input, 20, $this->ctx);

                while (2 !== $alt && ATN::INVALID_ALT_NUMBER !== $alt) {
                    if (1 === $alt) {
                        if (null !== $this->getParseListeners()) {
                            $this->triggerExitRuleEvent();
                        }

                        $previousContext = $localContext;
                        $localContext = new Context\KeyListContext($parentContext, $parentState);
                        $this->pushNewRecursionContext($localContext, $startState, self::RULE_keyList);
                        $this->setState(275);

                        if (!($this->precpred($this->ctx, 1))) {
                            throw new FailedPredicateException($this, '\\$this->precpred(\\$this->ctx, 1)');
                        }
                        $this->setState(276);
                        $this->match(self::T__8);
                        $this->setState(277);
                        $this->keyName();
                    }

                    $this->setState(282);
                    $this->errorHandler->sync($this);

                    $alt = $this->getInterpreter()->adaptivePredict($this->input, 20, $this->ctx);
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
        public function keyName(): Context\KeyNameContext
        {
            $localContext = new Context\KeyNameContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 56, self::RULE_keyName);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(283);
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
        public function type(): Context\TypeContext
        {
            $localContext = new Context\TypeContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 58, self::RULE_type);

            try {
                $this->setState(289);
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
                        $this->setState(285);
                        $this->primitiveType();
                        break;

                    case self::T__20:
                        $this->enterOuterAlt($localContext, 2);
                        $this->setState(286);
                        $this->vectorType();
                        break;

                    case self::T__23:
                        $this->enterOuterAlt($localContext, 3);
                        $this->setState(287);
                        $this->mapType();
                        break;

                    case self::Identifier:
                        $this->enterOuterAlt($localContext, 4);
                        $this->setState(288);
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
        public function vectorType(): Context\VectorTypeContext
        {
            $localContext = new Context\VectorTypeContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 60, self::RULE_vectorType);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(291);
                $this->match(self::T__20);
                $this->setState(292);
                $this->match(self::T__21);
                $this->setState(293);
                $this->type();
                $this->setState(294);
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
        public function mapType(): Context\MapTypeContext
        {
            $localContext = new Context\MapTypeContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 62, self::RULE_mapType);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(296);
                $this->match(self::T__23);
                $this->setState(297);
                $this->match(self::T__21);
                $this->setState(298);
                $localContext->keyType = $this->type();
                $this->setState(299);
                $this->match(self::T__8);
                $this->setState(300);
                $localContext->valueType = $this->type();
                $this->setState(301);
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
        public function customType(): Context\CustomTypeContext
        {
            $localContext = new Context\CustomTypeContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 64, self::RULE_customType);

            try {
                $this->setState(308);
                $this->errorHandler->sync($this);

                switch ($this->getInterpreter()->adaptivePredict($this->input, 22, $this->ctx)) {
                    case 1:
                        $this->enterOuterAlt($localContext, 1);
                        $this->setState(303);
                        $this->match(self::Identifier);
                    break;

                    case 2:
                        $this->enterOuterAlt($localContext, 2);
                        $this->setState(304);
                        $this->moduleName();
                        $this->setState(305);
                        $this->match(self::T__24);
                        $this->setState(306);
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
        public function value(): Context\ValueContext
        {
            $localContext = new Context\ValueContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 66, self::RULE_value);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(310);

                $_la = $this->input->LA(1);

                if (!(((($_la) & ~0x3F) === 0 && ((1 << $_la) & ((1 << self::Int) | (1 << self::Float) | (1 << self::String))) !== 0))) {
                    $this->errorHandler->recoverInline($this);
                } else {
                    if (Token::EOF === $this->input->LA(1)) {
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
        public function primitiveType(): Context\PrimitiveTypeContext
        {
            $localContext = new Context\PrimitiveTypeContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 68, self::RULE_primitiveType);

            try {
                $this->setState(321);
                $this->errorHandler->sync($this);

                switch ($this->input->LA(1)) {
                    case self::T__25:
                        $this->enterOuterAlt($localContext, 1);
                        $this->setState(312);
                        $this->voidType();
                        break;

                    case self::T__26:
                        $this->enterOuterAlt($localContext, 2);
                        $this->setState(313);
                        $this->boolType();
                        break;

                    case self::T__27:
                    case self::T__28:
                        $this->enterOuterAlt($localContext, 3);
                        $this->setState(314);
                        $this->byteType();
                        break;

                    case self::T__29:
                    case self::T__30:
                        $this->enterOuterAlt($localContext, 4);
                        $this->setState(315);
                        $this->shortType();
                        break;

                    case self::T__31:
                    case self::T__32:
                        $this->enterOuterAlt($localContext, 5);
                        $this->setState(316);
                        $this->intType();
                        break;

                    case self::T__33:
                        $this->enterOuterAlt($localContext, 6);
                        $this->setState(317);
                        $this->longType();
                        break;

                    case self::T__34:
                        $this->enterOuterAlt($localContext, 7);
                        $this->setState(318);
                        $this->floatType();
                        break;

                    case self::T__35:
                        $this->enterOuterAlt($localContext, 8);
                        $this->setState(319);
                        $this->doubleType();
                        break;

                    case self::T__36:
                        $this->enterOuterAlt($localContext, 9);
                        $this->setState(320);
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
        public function voidType(): Context\VoidTypeContext
        {
            $localContext = new Context\VoidTypeContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 70, self::RULE_voidType);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(323);
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
        public function boolType(): Context\BoolTypeContext
        {
            $localContext = new Context\BoolTypeContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 72, self::RULE_boolType);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(325);
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
        public function byteType(): Context\ByteTypeContext
        {
            $localContext = new Context\ByteTypeContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 74, self::RULE_byteType);

            try {
                $this->setState(329);
                $this->errorHandler->sync($this);

                switch ($this->input->LA(1)) {
                    case self::T__27:
                        $this->enterOuterAlt($localContext, 1);
                        $this->setState(327);
                        $this->signedByteType();
                        break;

                    case self::T__28:
                        $this->enterOuterAlt($localContext, 2);
                        $this->setState(328);
                        $this->unsignedByteType();
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
        public function signedByteType(): Context\SignedByteTypeContext
        {
            $localContext = new Context\SignedByteTypeContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 76, self::RULE_signedByteType);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(331);
                $this->match(self::T__27);
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
        public function unsignedByteType(): Context\UnsignedByteTypeContext
        {
            $localContext = new Context\UnsignedByteTypeContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 78, self::RULE_unsignedByteType);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(333);
                $this->match(self::T__28);
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
        public function shortType(): Context\ShortTypeContext
        {
            $localContext = new Context\ShortTypeContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 80, self::RULE_shortType);

            try {
                $this->setState(337);
                $this->errorHandler->sync($this);

                switch ($this->input->LA(1)) {
                    case self::T__29:
                        $this->enterOuterAlt($localContext, 1);
                        $this->setState(335);
                        $this->signedShortType();
                        break;

                    case self::T__30:
                        $this->enterOuterAlt($localContext, 2);
                        $this->setState(336);
                        $this->unsignedShortType();
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
        public function signedShortType(): Context\SignedShortTypeContext
        {
            $localContext = new Context\SignedShortTypeContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 82, self::RULE_signedShortType);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(339);
                $this->match(self::T__29);
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
        public function unsignedShortType(): Context\UnsignedShortTypeContext
        {
            $localContext = new Context\UnsignedShortTypeContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 84, self::RULE_unsignedShortType);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(341);
                $this->match(self::T__30);
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
        public function intType(): Context\IntTypeContext
        {
            $localContext = new Context\IntTypeContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 86, self::RULE_intType);

            try {
                $this->setState(345);
                $this->errorHandler->sync($this);

                switch ($this->input->LA(1)) {
                    case self::T__31:
                        $this->enterOuterAlt($localContext, 1);
                        $this->setState(343);
                        $this->signedIntType();
                        break;

                    case self::T__32:
                        $this->enterOuterAlt($localContext, 2);
                        $this->setState(344);
                        $this->unsignedIntType();
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
        public function signedIntType(): Context\SignedIntTypeContext
        {
            $localContext = new Context\SignedIntTypeContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 88, self::RULE_signedIntType);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(347);
                $this->match(self::T__31);
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
        public function unsignedIntType(): Context\UnsignedIntTypeContext
        {
            $localContext = new Context\UnsignedIntTypeContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 90, self::RULE_unsignedIntType);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(349);
                $this->match(self::T__32);
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
        public function longType(): Context\LongTypeContext
        {
            $localContext = new Context\LongTypeContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 92, self::RULE_longType);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(351);
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
        public function floatType(): Context\FloatTypeContext
        {
            $localContext = new Context\FloatTypeContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 94, self::RULE_floatType);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(353);
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
        public function doubleType(): Context\DoubleTypeContext
        {
            $localContext = new Context\DoubleTypeContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 96, self::RULE_doubleType);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(355);
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
        public function stringType(): Context\StringTypeContext
        {
            $localContext = new Context\StringTypeContext($this->ctx, $this->getState());

            $this->enterRule($localContext, 98, self::RULE_stringType);

            try {
                $this->enterOuterAlt($localContext, 1);
                $this->setState(357);
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

        public function sempred(?RuleContext $localContext, int $ruleIndex, int $predicateIndex): bool
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

        private function sempredEnumeratorList(?Context\EnumeratorListContext $localContext, int $predicateIndex): bool
        {
            switch ($predicateIndex) {
                case 0:
                    return $this->precpred($this->ctx, 1);
            }

            return true;
        }

        private function sempredParamList(?Context\ParamListContext $localContext, int $predicateIndex): bool
        {
            switch ($predicateIndex) {
                case 1:
                    return $this->precpred($this->ctx, 1);
            }

            return true;
        }

        private function sempredKeyList(?Context\KeyListContext $localContext, int $predicateIndex): bool
        {
            switch ($predicateIndex) {
                case 2:
                    return $this->precpred($this->ctx, 1);
            }

            return true;
        }
    }
}

namespace tars\parse\Context {
    use Antlr\Antlr4\Runtime\ParserRuleContext;
    use Antlr\Antlr4\Runtime\Token;
    use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;
    use Antlr\Antlr4\Runtime\Tree\TerminalNode;
    use tars\parse\TarsListener;
    use tars\parse\TarsParser;

    class RootContext extends ParserRuleContext
    {
        public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
        {
            parent::__construct($parent, $invokingState);
        }

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_root;
        }

        /**
         * @return array<IncludeDefContext>|IncludeDefContext|null
         */
        public function includeDef(?int $index = null)
        {
            if (null === $index) {
                return $this->getTypedRuleContexts(IncludeDefContext::class);
            }

            return $this->getTypedRuleContext(IncludeDefContext::class, $index);
        }

        /**
         * @return array<ModuleDefContext>|ModuleDefContext|null
         */
        public function moduleDef(?int $index = null)
        {
            if (null === $index) {
                return $this->getTypedRuleContexts(ModuleDefContext::class);
            }

            return $this->getTypedRuleContext(ModuleDefContext::class, $index);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterRoot($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_includeDef;
        }

        public function fileName(): ?FileNameContext
        {
            return $this->getTypedRuleContext(FileNameContext::class, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterIncludeDef($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_fileName;
        }

        public function String(): ?TerminalNode
        {
            return $this->getToken(TarsParser::String, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterFileName($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->exitFileName($this);
            }
        }
    }

    class ModuleDefContext extends ParserRuleContext
    {
        public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
        {
            parent::__construct($parent, $invokingState);
        }

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_moduleDef;
        }

        public function moduleName(): ?ModuleNameContext
        {
            return $this->getTypedRuleContext(ModuleNameContext::class, 0);
        }

        /**
         * @return array<DefinitionContext>|DefinitionContext|null
         */
        public function definition(?int $index = null)
        {
            if (null === $index) {
                return $this->getTypedRuleContexts(DefinitionContext::class);
            }

            return $this->getTypedRuleContext(DefinitionContext::class, $index);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterModuleDef($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->exitModuleDef($this);
            }
        }
    }

    class ModuleNameContext extends ParserRuleContext
    {
        public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
        {
            parent::__construct($parent, $invokingState);
        }

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_moduleName;
        }

        public function Identifier(): ?TerminalNode
        {
            return $this->getToken(TarsParser::Identifier, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterModuleName($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_definition;
        }

        public function constDef(): ?ConstDefContext
        {
            return $this->getTypedRuleContext(ConstDefContext::class, 0);
        }

        public function enum(): ?EnumContext
        {
            return $this->getTypedRuleContext(EnumContext::class, 0);
        }

        public function struct(): ?StructContext
        {
            return $this->getTypedRuleContext(StructContext::class, 0);
        }

        public function interfaceDef(): ?InterfaceDefContext
        {
            return $this->getTypedRuleContext(InterfaceDefContext::class, 0);
        }

        public function keyMap(): ?KeyMapContext
        {
            return $this->getTypedRuleContext(KeyMapContext::class, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterDefinition($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_constDef;
        }

        public function constName(): ?ConstNameContext
        {
            return $this->getTypedRuleContext(ConstNameContext::class, 0);
        }

        public function value(): ?ValueContext
        {
            return $this->getTypedRuleContext(ValueContext::class, 0);
        }

        public function primitiveType(): ?PrimitiveTypeContext
        {
            return $this->getTypedRuleContext(PrimitiveTypeContext::class, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterConstDef($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_constName;
        }

        public function Identifier(): ?TerminalNode
        {
            return $this->getToken(TarsParser::Identifier, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterConstName($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_enum;
        }

        public function enumName(): ?EnumNameContext
        {
            return $this->getTypedRuleContext(EnumNameContext::class, 0);
        }

        /**
         * @return array<EnumeratorListContext>|EnumeratorListContext|null
         */
        public function enumeratorList(?int $index = null)
        {
            if (null === $index) {
                return $this->getTypedRuleContexts(EnumeratorListContext::class);
            }

            return $this->getTypedRuleContext(EnumeratorListContext::class, $index);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterEnum($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_enumName;
        }

        public function Identifier(): ?TerminalNode
        {
            return $this->getToken(TarsParser::Identifier, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterEnumName($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_enumeratorList;
        }

        public function enumerator(): ?EnumeratorContext
        {
            return $this->getTypedRuleContext(EnumeratorContext::class, 0);
        }

        public function enumeratorList(): ?EnumeratorListContext
        {
            return $this->getTypedRuleContext(EnumeratorListContext::class, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterEnumeratorList($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_enumerator;
        }

        public function enumeratorName(): ?EnumeratorNameContext
        {
            return $this->getTypedRuleContext(EnumeratorNameContext::class, 0);
        }

        public function value(): ?ValueContext
        {
            return $this->getTypedRuleContext(ValueContext::class, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterEnumerator($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->exitEnumerator($this);
            }
        }
    }

    class EnumeratorNameContext extends ParserRuleContext
    {
        public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
        {
            parent::__construct($parent, $invokingState);
        }

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_enumeratorName;
        }

        public function Identifier(): ?TerminalNode
        {
            return $this->getToken(TarsParser::Identifier, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterEnumeratorName($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->exitEnumeratorName($this);
            }
        }
    }

    class StructContext extends ParserRuleContext
    {
        public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
        {
            parent::__construct($parent, $invokingState);
        }

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_struct;
        }

        public function structName(): ?StructNameContext
        {
            return $this->getTypedRuleContext(StructNameContext::class, 0);
        }

        /**
         * @return array<StructFieldContext>|StructFieldContext|null
         */
        public function structField(?int $index = null)
        {
            if (null === $index) {
                return $this->getTypedRuleContexts(StructFieldContext::class);
            }

            return $this->getTypedRuleContext(StructFieldContext::class, $index);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterStruct($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_structName;
        }

        public function Identifier(): ?TerminalNode
        {
            return $this->getToken(TarsParser::Identifier, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterStructName($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->exitStructName($this);
            }
        }
    }

    class StructFieldContext extends ParserRuleContext
    {
        public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
        {
            parent::__construct($parent, $invokingState);
        }

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_structField;
        }

        public function fieldOrder(): ?FieldOrderContext
        {
            return $this->getTypedRuleContext(FieldOrderContext::class, 0);
        }

        public function fieldRequire(): ?FieldRequireContext
        {
            return $this->getTypedRuleContext(FieldRequireContext::class, 0);
        }

        public function type(): ?TypeContext
        {
            return $this->getTypedRuleContext(TypeContext::class, 0);
        }

        public function fieldName(): ?FieldNameContext
        {
            return $this->getTypedRuleContext(FieldNameContext::class, 0);
        }

        public function value(): ?ValueContext
        {
            return $this->getTypedRuleContext(ValueContext::class, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterStructField($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->exitStructField($this);
            }
        }
    }

    class FieldOrderContext extends ParserRuleContext
    {
        public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
        {
            parent::__construct($parent, $invokingState);
        }

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_fieldOrder;
        }

        public function Int(): ?TerminalNode
        {
            return $this->getToken(TarsParser::Int, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterFieldOrder($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_fieldRequire;
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterFieldRequire($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_fieldName;
        }

        public function Identifier(): ?TerminalNode
        {
            return $this->getToken(TarsParser::Identifier, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterFieldName($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_interfaceDef;
        }

        public function interfaceName(): ?InterfaceNameContext
        {
            return $this->getTypedRuleContext(InterfaceNameContext::class, 0);
        }

        /**
         * @return array<OperationContext>|OperationContext|null
         */
        public function operation(?int $index = null)
        {
            if (null === $index) {
                return $this->getTypedRuleContexts(OperationContext::class);
            }

            return $this->getTypedRuleContext(OperationContext::class, $index);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterInterfaceDef($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_interfaceName;
        }

        public function Identifier(): ?TerminalNode
        {
            return $this->getToken(TarsParser::Identifier, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterInterfaceName($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_operation;
        }

        public function type(): ?TypeContext
        {
            return $this->getTypedRuleContext(TypeContext::class, 0);
        }

        public function operationName(): ?OperationNameContext
        {
            return $this->getTypedRuleContext(OperationNameContext::class, 0);
        }

        public function paramList(): ?ParamListContext
        {
            return $this->getTypedRuleContext(ParamListContext::class, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterOperation($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_operationName;
        }

        public function Identifier(): ?TerminalNode
        {
            return $this->getToken(TarsParser::Identifier, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterOperationName($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_paramList;
        }

        public function param(): ?ParamContext
        {
            return $this->getTypedRuleContext(ParamContext::class, 0);
        }

        public function paramList(): ?ParamListContext
        {
            return $this->getTypedRuleContext(ParamListContext::class, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterParamList($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->exitParamList($this);
            }
        }
    }

    class ParamContext extends ParserRuleContext
    {
        /**
         * @var Token|null
         */
        public $out;

        /**
         * @var Token|null
         */
        public $routeKey;

        public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
        {
            parent::__construct($parent, $invokingState);
        }

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_param;
        }

        public function type(): ?TypeContext
        {
            return $this->getTypedRuleContext(TypeContext::class, 0);
        }

        public function paramName(): ?ParamNameContext
        {
            return $this->getTypedRuleContext(ParamNameContext::class, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterParam($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_paramName;
        }

        public function Identifier(): ?TerminalNode
        {
            return $this->getToken(TarsParser::Identifier, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterParamName($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_keyMap;
        }

        public function structName(): ?StructNameContext
        {
            return $this->getTypedRuleContext(StructNameContext::class, 0);
        }

        public function keyList(): ?KeyListContext
        {
            return $this->getTypedRuleContext(KeyListContext::class, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterKeyMap($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_keyList;
        }

        public function keyName(): ?KeyNameContext
        {
            return $this->getTypedRuleContext(KeyNameContext::class, 0);
        }

        public function keyList(): ?KeyListContext
        {
            return $this->getTypedRuleContext(KeyListContext::class, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterKeyList($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_keyName;
        }

        public function Identifier(): ?TerminalNode
        {
            return $this->getToken(TarsParser::Identifier, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterKeyName($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_type;
        }

        public function primitiveType(): ?PrimitiveTypeContext
        {
            return $this->getTypedRuleContext(PrimitiveTypeContext::class, 0);
        }

        public function vectorType(): ?VectorTypeContext
        {
            return $this->getTypedRuleContext(VectorTypeContext::class, 0);
        }

        public function mapType(): ?MapTypeContext
        {
            return $this->getTypedRuleContext(MapTypeContext::class, 0);
        }

        public function customType(): ?CustomTypeContext
        {
            return $this->getTypedRuleContext(CustomTypeContext::class, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterType($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_vectorType;
        }

        public function type(): ?TypeContext
        {
            return $this->getTypedRuleContext(TypeContext::class, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterVectorType($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->exitVectorType($this);
            }
        }
    }

    class MapTypeContext extends ParserRuleContext
    {
        /**
         * @var TypeContext|null
         */
        public $keyType;

        /**
         * @var TypeContext|null
         */
        public $valueType;

        public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
        {
            parent::__construct($parent, $invokingState);
        }

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_mapType;
        }

        /**
         * @return array<TypeContext>|TypeContext|null
         */
        public function type(?int $index = null)
        {
            if (null === $index) {
                return $this->getTypedRuleContexts(TypeContext::class);
            }

            return $this->getTypedRuleContext(TypeContext::class, $index);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterMapType($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_customType;
        }

        public function Identifier(): ?TerminalNode
        {
            return $this->getToken(TarsParser::Identifier, 0);
        }

        public function moduleName(): ?ModuleNameContext
        {
            return $this->getTypedRuleContext(ModuleNameContext::class, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterCustomType($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_value;
        }

        public function Int(): ?TerminalNode
        {
            return $this->getToken(TarsParser::Int, 0);
        }

        public function Float(): ?TerminalNode
        {
            return $this->getToken(TarsParser::Float, 0);
        }

        public function String(): ?TerminalNode
        {
            return $this->getToken(TarsParser::String, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterValue($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_primitiveType;
        }

        public function voidType(): ?VoidTypeContext
        {
            return $this->getTypedRuleContext(VoidTypeContext::class, 0);
        }

        public function boolType(): ?BoolTypeContext
        {
            return $this->getTypedRuleContext(BoolTypeContext::class, 0);
        }

        public function byteType(): ?ByteTypeContext
        {
            return $this->getTypedRuleContext(ByteTypeContext::class, 0);
        }

        public function shortType(): ?ShortTypeContext
        {
            return $this->getTypedRuleContext(ShortTypeContext::class, 0);
        }

        public function intType(): ?IntTypeContext
        {
            return $this->getTypedRuleContext(IntTypeContext::class, 0);
        }

        public function longType(): ?LongTypeContext
        {
            return $this->getTypedRuleContext(LongTypeContext::class, 0);
        }

        public function floatType(): ?FloatTypeContext
        {
            return $this->getTypedRuleContext(FloatTypeContext::class, 0);
        }

        public function doubleType(): ?DoubleTypeContext
        {
            return $this->getTypedRuleContext(DoubleTypeContext::class, 0);
        }

        public function stringType(): ?StringTypeContext
        {
            return $this->getTypedRuleContext(StringTypeContext::class, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterPrimitiveType($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_voidType;
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterVoidType($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_boolType;
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterBoolType($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_byteType;
        }

        public function signedByteType(): ?SignedByteTypeContext
        {
            return $this->getTypedRuleContext(SignedByteTypeContext::class, 0);
        }

        public function unsignedByteType(): ?UnsignedByteTypeContext
        {
            return $this->getTypedRuleContext(UnsignedByteTypeContext::class, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterByteType($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->exitByteType($this);
            }
        }
    }

    class SignedByteTypeContext extends ParserRuleContext
    {
        public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
        {
            parent::__construct($parent, $invokingState);
        }

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_signedByteType;
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterSignedByteType($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->exitSignedByteType($this);
            }
        }
    }

    class UnsignedByteTypeContext extends ParserRuleContext
    {
        public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
        {
            parent::__construct($parent, $invokingState);
        }

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_unsignedByteType;
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterUnsignedByteType($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->exitUnsignedByteType($this);
            }
        }
    }

    class ShortTypeContext extends ParserRuleContext
    {
        public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
        {
            parent::__construct($parent, $invokingState);
        }

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_shortType;
        }

        public function signedShortType(): ?SignedShortTypeContext
        {
            return $this->getTypedRuleContext(SignedShortTypeContext::class, 0);
        }

        public function unsignedShortType(): ?UnsignedShortTypeContext
        {
            return $this->getTypedRuleContext(UnsignedShortTypeContext::class, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterShortType($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->exitShortType($this);
            }
        }
    }

    class SignedShortTypeContext extends ParserRuleContext
    {
        public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
        {
            parent::__construct($parent, $invokingState);
        }

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_signedShortType;
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterSignedShortType($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->exitSignedShortType($this);
            }
        }
    }

    class UnsignedShortTypeContext extends ParserRuleContext
    {
        public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
        {
            parent::__construct($parent, $invokingState);
        }

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_unsignedShortType;
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterUnsignedShortType($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->exitUnsignedShortType($this);
            }
        }
    }

    class IntTypeContext extends ParserRuleContext
    {
        public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
        {
            parent::__construct($parent, $invokingState);
        }

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_intType;
        }

        public function signedIntType(): ?SignedIntTypeContext
        {
            return $this->getTypedRuleContext(SignedIntTypeContext::class, 0);
        }

        public function unsignedIntType(): ?UnsignedIntTypeContext
        {
            return $this->getTypedRuleContext(UnsignedIntTypeContext::class, 0);
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterIntType($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->exitIntType($this);
            }
        }
    }

    class SignedIntTypeContext extends ParserRuleContext
    {
        public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
        {
            parent::__construct($parent, $invokingState);
        }

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_signedIntType;
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterSignedIntType($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->exitSignedIntType($this);
            }
        }
    }

    class UnsignedIntTypeContext extends ParserRuleContext
    {
        public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
        {
            parent::__construct($parent, $invokingState);
        }

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_unsignedIntType;
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterUnsignedIntType($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->exitUnsignedIntType($this);
            }
        }
    }

    class LongTypeContext extends ParserRuleContext
    {
        public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
        {
            parent::__construct($parent, $invokingState);
        }

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_longType;
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterLongType($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_floatType;
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterFloatType($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_doubleType;
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterDoubleType($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
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

        public function getRuleIndex(): int
        {
            return TarsParser::RULE_stringType;
        }

        public function enterRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->enterStringType($this);
            }
        }

        public function exitRule(ParseTreeListener $listener): void
        {
            if ($listener instanceof TarsListener) {
                $listener->exitStringType($this);
            }
        }
    }
}
