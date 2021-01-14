<?php

/*
 * Generated from Tars.g4 by ANTLR 4.8
 */

namespace tars\parse;
use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;

/**
 * This interface defines a complete listener for a parse tree produced by
 * {@see TarsParser}.
 */
interface TarsListener extends ParseTreeListener {
	/**
	 * Enter a parse tree produced by {@see TarsParser::root()}.
	 * @param $context The parse tree.
	 */
	public function enterRoot(Context\RootContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::root()}.
	 * @param $context The parse tree.
	 */
	public function exitRoot(Context\RootContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::includeDef()}.
	 * @param $context The parse tree.
	 */
	public function enterIncludeDef(Context\IncludeDefContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::includeDef()}.
	 * @param $context The parse tree.
	 */
	public function exitIncludeDef(Context\IncludeDefContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::fileName()}.
	 * @param $context The parse tree.
	 */
	public function enterFileName(Context\FileNameContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::fileName()}.
	 * @param $context The parse tree.
	 */
	public function exitFileName(Context\FileNameContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::moduleDef()}.
	 * @param $context The parse tree.
	 */
	public function enterModuleDef(Context\ModuleDefContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::moduleDef()}.
	 * @param $context The parse tree.
	 */
	public function exitModuleDef(Context\ModuleDefContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::moduleName()}.
	 * @param $context The parse tree.
	 */
	public function enterModuleName(Context\ModuleNameContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::moduleName()}.
	 * @param $context The parse tree.
	 */
	public function exitModuleName(Context\ModuleNameContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::definition()}.
	 * @param $context The parse tree.
	 */
	public function enterDefinition(Context\DefinitionContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::definition()}.
	 * @param $context The parse tree.
	 */
	public function exitDefinition(Context\DefinitionContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::constDef()}.
	 * @param $context The parse tree.
	 */
	public function enterConstDef(Context\ConstDefContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::constDef()}.
	 * @param $context The parse tree.
	 */
	public function exitConstDef(Context\ConstDefContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::constName()}.
	 * @param $context The parse tree.
	 */
	public function enterConstName(Context\ConstNameContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::constName()}.
	 * @param $context The parse tree.
	 */
	public function exitConstName(Context\ConstNameContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::enum()}.
	 * @param $context The parse tree.
	 */
	public function enterEnum(Context\EnumContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::enum()}.
	 * @param $context The parse tree.
	 */
	public function exitEnum(Context\EnumContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::enumName()}.
	 * @param $context The parse tree.
	 */
	public function enterEnumName(Context\EnumNameContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::enumName()}.
	 * @param $context The parse tree.
	 */
	public function exitEnumName(Context\EnumNameContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::enumeratorList()}.
	 * @param $context The parse tree.
	 */
	public function enterEnumeratorList(Context\EnumeratorListContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::enumeratorList()}.
	 * @param $context The parse tree.
	 */
	public function exitEnumeratorList(Context\EnumeratorListContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::enumerator()}.
	 * @param $context The parse tree.
	 */
	public function enterEnumerator(Context\EnumeratorContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::enumerator()}.
	 * @param $context The parse tree.
	 */
	public function exitEnumerator(Context\EnumeratorContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::enumeratorName()}.
	 * @param $context The parse tree.
	 */
	public function enterEnumeratorName(Context\EnumeratorNameContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::enumeratorName()}.
	 * @param $context The parse tree.
	 */
	public function exitEnumeratorName(Context\EnumeratorNameContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::struct()}.
	 * @param $context The parse tree.
	 */
	public function enterStruct(Context\StructContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::struct()}.
	 * @param $context The parse tree.
	 */
	public function exitStruct(Context\StructContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::structName()}.
	 * @param $context The parse tree.
	 */
	public function enterStructName(Context\StructNameContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::structName()}.
	 * @param $context The parse tree.
	 */
	public function exitStructName(Context\StructNameContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::structField()}.
	 * @param $context The parse tree.
	 */
	public function enterStructField(Context\StructFieldContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::structField()}.
	 * @param $context The parse tree.
	 */
	public function exitStructField(Context\StructFieldContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::fieldOrder()}.
	 * @param $context The parse tree.
	 */
	public function enterFieldOrder(Context\FieldOrderContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::fieldOrder()}.
	 * @param $context The parse tree.
	 */
	public function exitFieldOrder(Context\FieldOrderContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::fieldRequire()}.
	 * @param $context The parse tree.
	 */
	public function enterFieldRequire(Context\FieldRequireContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::fieldRequire()}.
	 * @param $context The parse tree.
	 */
	public function exitFieldRequire(Context\FieldRequireContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::fieldName()}.
	 * @param $context The parse tree.
	 */
	public function enterFieldName(Context\FieldNameContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::fieldName()}.
	 * @param $context The parse tree.
	 */
	public function exitFieldName(Context\FieldNameContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::interfaceDef()}.
	 * @param $context The parse tree.
	 */
	public function enterInterfaceDef(Context\InterfaceDefContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::interfaceDef()}.
	 * @param $context The parse tree.
	 */
	public function exitInterfaceDef(Context\InterfaceDefContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::interfaceName()}.
	 * @param $context The parse tree.
	 */
	public function enterInterfaceName(Context\InterfaceNameContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::interfaceName()}.
	 * @param $context The parse tree.
	 */
	public function exitInterfaceName(Context\InterfaceNameContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::operation()}.
	 * @param $context The parse tree.
	 */
	public function enterOperation(Context\OperationContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::operation()}.
	 * @param $context The parse tree.
	 */
	public function exitOperation(Context\OperationContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::operationName()}.
	 * @param $context The parse tree.
	 */
	public function enterOperationName(Context\OperationNameContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::operationName()}.
	 * @param $context The parse tree.
	 */
	public function exitOperationName(Context\OperationNameContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::paramList()}.
	 * @param $context The parse tree.
	 */
	public function enterParamList(Context\ParamListContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::paramList()}.
	 * @param $context The parse tree.
	 */
	public function exitParamList(Context\ParamListContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::param()}.
	 * @param $context The parse tree.
	 */
	public function enterParam(Context\ParamContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::param()}.
	 * @param $context The parse tree.
	 */
	public function exitParam(Context\ParamContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::paramName()}.
	 * @param $context The parse tree.
	 */
	public function enterParamName(Context\ParamNameContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::paramName()}.
	 * @param $context The parse tree.
	 */
	public function exitParamName(Context\ParamNameContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::keyMap()}.
	 * @param $context The parse tree.
	 */
	public function enterKeyMap(Context\KeyMapContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::keyMap()}.
	 * @param $context The parse tree.
	 */
	public function exitKeyMap(Context\KeyMapContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::keyList()}.
	 * @param $context The parse tree.
	 */
	public function enterKeyList(Context\KeyListContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::keyList()}.
	 * @param $context The parse tree.
	 */
	public function exitKeyList(Context\KeyListContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::keyName()}.
	 * @param $context The parse tree.
	 */
	public function enterKeyName(Context\KeyNameContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::keyName()}.
	 * @param $context The parse tree.
	 */
	public function exitKeyName(Context\KeyNameContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::type()}.
	 * @param $context The parse tree.
	 */
	public function enterType(Context\TypeContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::type()}.
	 * @param $context The parse tree.
	 */
	public function exitType(Context\TypeContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::vectorType()}.
	 * @param $context The parse tree.
	 */
	public function enterVectorType(Context\VectorTypeContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::vectorType()}.
	 * @param $context The parse tree.
	 */
	public function exitVectorType(Context\VectorTypeContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::mapType()}.
	 * @param $context The parse tree.
	 */
	public function enterMapType(Context\MapTypeContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::mapType()}.
	 * @param $context The parse tree.
	 */
	public function exitMapType(Context\MapTypeContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::customType()}.
	 * @param $context The parse tree.
	 */
	public function enterCustomType(Context\CustomTypeContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::customType()}.
	 * @param $context The parse tree.
	 */
	public function exitCustomType(Context\CustomTypeContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::value()}.
	 * @param $context The parse tree.
	 */
	public function enterValue(Context\ValueContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::value()}.
	 * @param $context The parse tree.
	 */
	public function exitValue(Context\ValueContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::primitiveType()}.
	 * @param $context The parse tree.
	 */
	public function enterPrimitiveType(Context\PrimitiveTypeContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::primitiveType()}.
	 * @param $context The parse tree.
	 */
	public function exitPrimitiveType(Context\PrimitiveTypeContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::voidType()}.
	 * @param $context The parse tree.
	 */
	public function enterVoidType(Context\VoidTypeContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::voidType()}.
	 * @param $context The parse tree.
	 */
	public function exitVoidType(Context\VoidTypeContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::boolType()}.
	 * @param $context The parse tree.
	 */
	public function enterBoolType(Context\BoolTypeContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::boolType()}.
	 * @param $context The parse tree.
	 */
	public function exitBoolType(Context\BoolTypeContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::byteType()}.
	 * @param $context The parse tree.
	 */
	public function enterByteType(Context\ByteTypeContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::byteType()}.
	 * @param $context The parse tree.
	 */
	public function exitByteType(Context\ByteTypeContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::signedByteType()}.
	 * @param $context The parse tree.
	 */
	public function enterSignedByteType(Context\SignedByteTypeContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::signedByteType()}.
	 * @param $context The parse tree.
	 */
	public function exitSignedByteType(Context\SignedByteTypeContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::unsignedByteType()}.
	 * @param $context The parse tree.
	 */
	public function enterUnsignedByteType(Context\UnsignedByteTypeContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::unsignedByteType()}.
	 * @param $context The parse tree.
	 */
	public function exitUnsignedByteType(Context\UnsignedByteTypeContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::shortType()}.
	 * @param $context The parse tree.
	 */
	public function enterShortType(Context\ShortTypeContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::shortType()}.
	 * @param $context The parse tree.
	 */
	public function exitShortType(Context\ShortTypeContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::signedShortType()}.
	 * @param $context The parse tree.
	 */
	public function enterSignedShortType(Context\SignedShortTypeContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::signedShortType()}.
	 * @param $context The parse tree.
	 */
	public function exitSignedShortType(Context\SignedShortTypeContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::unsignedShortType()}.
	 * @param $context The parse tree.
	 */
	public function enterUnsignedShortType(Context\UnsignedShortTypeContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::unsignedShortType()}.
	 * @param $context The parse tree.
	 */
	public function exitUnsignedShortType(Context\UnsignedShortTypeContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::intType()}.
	 * @param $context The parse tree.
	 */
	public function enterIntType(Context\IntTypeContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::intType()}.
	 * @param $context The parse tree.
	 */
	public function exitIntType(Context\IntTypeContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::signedIntType()}.
	 * @param $context The parse tree.
	 */
	public function enterSignedIntType(Context\SignedIntTypeContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::signedIntType()}.
	 * @param $context The parse tree.
	 */
	public function exitSignedIntType(Context\SignedIntTypeContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::unsignedIntType()}.
	 * @param $context The parse tree.
	 */
	public function enterUnsignedIntType(Context\UnsignedIntTypeContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::unsignedIntType()}.
	 * @param $context The parse tree.
	 */
	public function exitUnsignedIntType(Context\UnsignedIntTypeContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::longType()}.
	 * @param $context The parse tree.
	 */
	public function enterLongType(Context\LongTypeContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::longType()}.
	 * @param $context The parse tree.
	 */
	public function exitLongType(Context\LongTypeContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::floatType()}.
	 * @param $context The parse tree.
	 */
	public function enterFloatType(Context\FloatTypeContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::floatType()}.
	 * @param $context The parse tree.
	 */
	public function exitFloatType(Context\FloatTypeContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::doubleType()}.
	 * @param $context The parse tree.
	 */
	public function enterDoubleType(Context\DoubleTypeContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::doubleType()}.
	 * @param $context The parse tree.
	 */
	public function exitDoubleType(Context\DoubleTypeContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see TarsParser::stringType()}.
	 * @param $context The parse tree.
	 */
	public function enterStringType(Context\StringTypeContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see TarsParser::stringType()}.
	 * @param $context The parse tree.
	 */
	public function exitStringType(Context\StringTypeContext $context) : void;
}