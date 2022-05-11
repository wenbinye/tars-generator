<?php

declare(strict_types=1);

namespace tars;

use JsonException;

class TarsGeneratorCache
{
    private const VERSION = TarsGenerator::VERSION.'#1738600ba43a1c4349e5c3553425cf89dd05d5ec';

    /**
     * @var array
     */
    private array $cache;

    /**
     * TarsGeneratorCache constructor.
     *
     * @param string $cacheFile
     *
     * @throws JsonException
     */
    public function __construct(private readonly string $cacheFile)
    {
        if (is_readable($cacheFile)) {
            $json = file_get_contents($cacheFile);
            if (false === $json) {
                throw new \RuntimeException("Cannot read $cacheFile");
            }
            $this->cache = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
        }
        if (!isset($this->cache['version'])
            || self::VERSION !== $this->cache['version']) {
            $this->cache = ['version' => self::VERSION];
        }
    }

    public function isHit(string $file): bool
    {
        return isset($this->cache['hashes'][$file])
            && $this->cache['hashes'][$file] === $this->hash($file);
    }

    /**
     * @throws JsonException
     */
    public function add(string $file): void
    {
        $this->cache['hashes'][$file] = $this->hash($file);
        file_put_contents($this->cacheFile, json_encode($this->cache, JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES));
    }

    private function hash(string $file): string
    {
        return is_readable($file) ? (string) md5_file($file) : '';
    }
}
