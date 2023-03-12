<?php

declare(strict_types=1);

namespace tars\domain;

class TarsInterfaceContext extends AbstractContext
{
    /**
     * @var bool
     */
    private bool $servant;

    /**
     * @var string
     */
    private string $servantName;

    /**
     * @var TarsInterface
     */
    private TarsInterface $interface;

    public function getClassName(): string
    {
        return $this->generatorContext->getGenerateStrategy()->getInterfaceClassName($this->interface->getName());
    }

    /**
     * @param bool $servant
     */
    public function setServant(bool $servant): void
    {
        $this->servant = $servant;
    }

    /**
     * @param string $servantName
     */
    public function setServantName(string $servantName): void
    {
        $this->servantName = $servantName;
    }

    /**
     * @return bool
     */
    public function isServant(): bool
    {
        return $this->servant;
    }

    public function getServant(): bool
    {
        return $this->servant;
    }

    /**
     * @return string
     */
    public function getServantName(): string
    {
        return $this->servantName;
    }

    public function getServerName(): ?string
    {
        return $this->parseServantName()[1];
    }

    public function getSimpleServantName(): string
    {
        return $this->parseServantName()[0];
    }

    private function parseServantName(): array
    {
        $parts = explode('.', $this->servantName, 2);

        return 2 === count($parts) ? $parts : [$this->servantName, null];
    }

    /**
     * @return TarsInterface
     */
    public function getInterface(): TarsInterface
    {
        return $this->interface;
    }

    /**
     * @param TarsInterface $interface
     */
    public function setInterface(TarsInterface $interface): void
    {
        $this->interface = $interface;
    }
}
