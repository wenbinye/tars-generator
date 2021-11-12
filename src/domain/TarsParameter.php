<?php

declare(strict_types=1);

namespace tars\domain;

class TarsParameter
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var TarsUnionType
     */
    private TarsUnionType $type;

    /**
     * @var bool
     */
    private bool $out;

    /**
     * @var bool
     */
    private bool $routeKey;

    /**
     * TarsParameter constructor.
     *
     * @param string        $name
     * @param TarsUnionType $type
     * @param bool          $out
     * @param bool          $routeKey
     */
    public function __construct(string $name, TarsUnionType $type, bool $out, bool $routeKey)
    {
        $this->name = $name;
        $this->type = $type;
        $this->out = $out;
        $this->routeKey = $routeKey;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return TarsUnionType
     */
    public function getType(): TarsUnionType
    {
        return $this->type;
    }

    /**
     * @return bool
     */
    public function isOut(): bool
    {
        return $this->out && !$this->getType()->isCustomType();
    }

    public function getOut(): bool
    {
        return $this->isOut();
    }

    /**
     * @return bool
     */
    public function isRouteKey(): bool
    {
        return $this->routeKey;
    }

    public function getDeclarationType(): ?string
    {
        $type = $this->getType()->getDeclarationType();
        if (isset($type)) {
            if ($this->isOut() && !$this->getType()->isCustomType()) {
                return '?'.$type;
            }

            return $type;
        } else {
            return null;
        }
    }
}
