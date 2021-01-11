grammar Tars;

root: includeDef* namespaceDef*;

includeDef: '#include' fileName;

fileName: String;

namespaceDef: 'module' moduleName '{' (definition ';')* '}';

moduleName: Identifier;

definition
    : constDef
    | enum
    | struct
    | interfaceDef
    | keyMap
    ;

constDef: 'const' primitiveType? constName '=' value;

constName: Identifier;

enum: 'enum' enumName '{' enumeratorList* '}';

enumName: Identifier;

enumeratorList
    : enumerator
    | enumeratorList ',' enumerator ','?
    ;

enumerator: enumMember ('=' value)?;

enumMember: Identifier;

struct: 'struct' structName '{' structMember* '}';

structName: Identifier;

structMember: fieldOrder fieldRequire type fieldName ('=' value)? ';';

fieldOrder: Int;

fieldRequire: 'require' | 'optional';

fieldName: Identifier;

interfaceDef: 'interface' interfaceName '{' operation* '}';

interfaceName: Identifier;

operation: type operationName '(' paramList? ')' ';';

operationName: Identifier;

paramList
    : param
    | paramList ',' param
    ;

param: 'out'? 'routekey'? type paramName;

paramName: Identifier;

keyMap: 'key' '[' structName ',' keyList ']';

keyList
    : keyName
    | keyList ',' keyName
    ;

keyName: Identifier;

type: primitiveType
    | vectorType
    | mapType
    | customType
    ;

vectorType: 'vector' '<' type '>';

mapType: 'map' '<' type ',' type '>';

customType: Identifier | moduleName '.' Identifier;

value: Int | Float | String;

primitiveType: voidType
    | boolType
    | byteType
    | shortType
    | intType
    | longType
    | floatType
    | doubleType
    | stringType;

voidType: 'void';

boolType: 'bool';

byteType: 'byte' | 'unsigned byte';

shortType: 'short' | 'unsigned short';

intType: 'int' | 'unsigned int';

longType: 'long';

floatType: 'float';

doubleType: 'double';

stringType: 'string';

//------ Identifiers
Identifier : Identifier_Letter (Identifier_Letter | Digit)* ;
fragment Identifier_Letter : 'a'..'z' | 'A'..'Z' | '_' ;
fragment Digit : '0'..'9';
fragment Number : Digit | '-' Digit;

//------ Numbers
Int   : Number+ ;
Float : Number+ '.' Digit* ;

//------ Strings
String : '"' (ESC | .)*? '"' ;
fragment ESC : '\\' [btnr"\\] ;  // \b, \t, \n, ...
LineComment: '//' .*? '\n' -> skip;
BlockComment : '/*' .*? '*/' -> channel(HIDDEN);
WS: [ \t\n\r]+ -> skip;
