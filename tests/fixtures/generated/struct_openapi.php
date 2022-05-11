<?php

declare(strict_types=1);

/**
 * NOTE: This class is auto generated by Tars Generator (https://github.com/wenbinye/tars-generator).
 *
 * Do not edit the class manually.
 * Tars Generator version: 0.6
 */

namespace foo\bar\integration\test;

use kuiper\tars\attribute\TarsProperty;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema
 */
final class SimpleStruct
{
    /**
     * @OA\Property(type="integer", format="int64")
     *
     * @var int
     */
    #[TarsProperty(type: 'long', order: 0)]
    public readonly int $id;

    /**
     * @OA\Property(type="integer", format="int32")
     *
     * @var int
     */
    #[TarsProperty(type: 'int', order: 1)]
    public readonly int $count;

    /**
     * @OA\Property(type="object")
     *
     * @var string[]
     */
    #[TarsProperty(type: 'map<string,string>', order: 2)]
    public readonly array $page;

    /**
     * @OA\Property(ref="#/components/schemas/TE")
     *
     * @var TE|null
     */
    #[TarsProperty(type: 'TE', order: 3)]
    public readonly ?TE $te;

    public function __construct(
        int $id,
        int $count,
        array $page,
        ?TE $te = null
    ) {
        $this->id = $id;
        $this->count = $count;
        $this->page = $page;
        $this->te = $te;
    }
}
