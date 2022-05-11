<?php

declare(strict_types=1);

namespace tars\domain;

class TarsParameter
{
    public function __construct(
        private readonly string $name,
        private readonly TarsUnionType $type,
        private readonly bool $out,
        private readonly bool $routeKey)
    {
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
        }

        return null;
    }
}
