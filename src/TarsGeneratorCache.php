<?php


namespace tars;


class TarsGeneratorCache
{
    private const VERSION = TarsGenerator::VERSION . '#429df7c73fb1213665c4b3cbab2d9a5cbae13475';

    /**
     * @var string
     */
    private $cacheFile;

    /**
     * @var array
     */
    private $cache;

    /**
     * TarsGeneratorCache constructor.
     * @param string $cacheFile
     */
    public function __construct(string $cacheFile)
    {
        $this->cacheFile = $cacheFile;
        if (is_readable($cacheFile)) {
            $this->cache = json_decode(file_get_contents($this->cacheFile), true);
        }
        if (!isset($this->cache['version'])
            || $this->cache['version'] !== self::VERSION) {
            $this->cache = ['version' => self::VERSION];
        }
    }

    public function isHit(string $file): bool
    {
        return isset($this->cache['hashes'][$file])
            && $this->cache['hashes'][$file] === $this->hash($file);
    }

    public function add(string $file): void
    {
        $this->cache['hashes'][$file] = $this->hash($file);
        file_put_contents($this->cacheFile, json_encode($this->cache, JSON_UNESCAPED_SLASHES));
    }

    private function hash(string $file): string
    {
        return is_readable($file) ? crc32(file_get_contents($file)) : '';
    }
}