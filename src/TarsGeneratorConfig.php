<?php


namespace tars;


class TarsGeneratorConfig
{
    /**
     * @var string[]|null
     */
    private $servants;

    /**
     * @var string
     */
    private $tarsPath;

    /**
     * @var string|null
     */
    private $namespace;

    /**
     * @var string|null
     */
    private $output;

    /**
     * @var bool|null
     */
    private $flat;

    /**
     * @return string[]|null
     */
    public function getServants(): ?array
    {
        return $this->servants;
    }

    /**
     * @return string
     */
    public function getTarsPath(): string
    {
        return $this->tarsPath;
    }

    /**
     * @return string|null
     */
    public function getNamespace(): ?string
    {
        return $this->namespace;
    }

    /**
     * @return string|null
     */
    public function getOutput(): ?string
    {
        return $this->output;
    }

    /**
     * @return bool|null
     */
    public function getFlat(): ?bool
    {
        return $this->flat;
    }
}
