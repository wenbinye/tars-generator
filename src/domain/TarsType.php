<?php

declare(strict_types=1);

namespace tars\domain;

interface TarsType
{
    /**
     * 返回 php 类型表示.
     *
     * @return string
     */
    public function __toString(): string;

    /**
     * 返回 tars 类型表示.
     *
     * @return string
     */
    public function getTarsType(): string;

    /**
     * 返回 php 类型声明表示.
     *
     * @return string|null
     */
    public function getDeclarationType(): ?string;

    /**
     * 返回 php docblock 类型声明表示.
     *
     * @return string|null
     */
    public function getDocBlockType(): ?string;

    /**
     * 返回 openapi 类型声明.
     *
     * @return string
     */
    public function getOpenapiDeclaration(): string;

    /**
     * 返回类型默认值表示.
     *
     * @return string|null
     */
    public function getDefaultValue(): ?string;
}
