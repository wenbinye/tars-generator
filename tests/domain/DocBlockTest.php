<?php

declare(strict_types=1);

namespace tars\domain;

use PHPUnit\Framework\TestCase;

class DocBlockTest extends TestCase
{
    public function testGetSummary(): void
    {
        $doc = DocBlock::create(<<<'DOC'
/**
 * 精确查询单个员工。
 *
 * 根据员工姓名精确查询，返回员工对象。
 * @throws InvalidArgumentException $40001 "姓名不能为空"
 */
DOC);
        $this->assertSame('精确查询单个员工。', $doc->getSummary());
    }

    public function testGetSummaryWithOnlySummary(): void
    {
        $doc = DocBlock::create(<<<'DOC'
/**
 * 精确查询单个员工。
 * @throws InvalidArgumentException $40001 "姓名不能为空"
 */
DOC);
        // No blank line → no description, summary is the first content line
        $this->assertSame('精确查询单个员工。', $doc->getSummary());
    }

    public function testGetSummaryReturnsNullForEmptyDocBlock(): void
    {
        $doc = DocBlock::create(<<<'DOC'
/**
 */
DOC);
        $this->assertNull($doc->getSummary());
    }

    public function testGetDescription(): void
    {
        $doc = DocBlock::create(<<<'DOC'
/**
 * 精确查询单个员工。
 *
 * 根据员工姓名精确查询，返回员工对象。
 * @throws InvalidArgumentException $40001 "姓名不能为空"
 */
DOC);
        $this->assertSame("根据员工姓名精确查询，返回员工对象。", $doc->getDescription());
    }

    public function testGetDescriptionMultiLine(): void
    {
        $doc = DocBlock::create(<<<'DOC'
/**
 * 精确查询单个员工。
 *
 * 根据员工姓名精确查询，返回员工对象。
 * 支持模糊匹配。
 * @throws InvalidArgumentException $40001 "姓名不能为空"
 */
DOC);
        $this->assertSame(
            "根据员工姓名精确查询，返回员工对象。\n支持模糊匹配。",
            $doc->getDescription()
        );
    }

    public function testGetDescriptionEmptyWhenNoBlankLine(): void
    {
        $doc = DocBlock::create(<<<'DOC'
/**
 * 精确查询单个员工。
 * @throws InvalidArgumentException $40001 "姓名不能为空"
 */
DOC);
        // No blank line between summary and @throws → no description
        $this->assertSame('', $doc->getDescription());
    }

    public function testGetDescriptionEmptyWhenOnlySummary(): void
    {
        $doc = DocBlock::create(<<<'DOC'
/**
 * Summary only.
 */
DOC);
        $this->assertSame('', $doc->getDescription());
    }

    public function testGetThrows(): void
    {
        $doc = DocBlock::create(<<<'DOC'
/**
 * 精确查询单个员工。
 *
 * @throws InvalidArgumentException $40001 "姓名不能为空"
 * @throws RuntimeException $40401 "User not found"
 */
DOC);
        $throws = $doc->getThrows();
        $this->assertCount(2, $throws);
        $this->assertSame('InvalidArgumentException', $throws[0]['class']);
        $this->assertSame('40001', $throws[0]['code']);
        $this->assertSame('姓名不能为空', $throws[0]['message']);
        $this->assertSame('RuntimeException', $throws[1]['class']);
        $this->assertSame('40401', $throws[1]['code']);
        $this->assertSame('User not found', $throws[1]['message']);
    }

    public function testGetThrowsWithLeadingBackslash(): void
    {
        $doc = DocBlock::create(<<<'DOC'
/**
 * @throws \InvalidArgumentException $40001 "姓名不能为空"
 */
DOC);
        $throws = $doc->getThrows();
        $this->assertCount(1, $throws);
        // Class name includes the leading backslash from input
        $this->assertSame('\InvalidArgumentException', $throws[0]['class']);
    }

    public function testGetThrowsEmptyWhenNoThrowsTag(): void
    {
        $doc = DocBlock::create(<<<'DOC'
/**
 * Summary only.
 */
DOC);
        $this->assertSame([], $doc->getThrows());
    }

    public function testGetThrowsMalformedLineNotMatched(): void
    {
        // No quotes around message → not matched by regex
        $doc = DocBlock::create(<<<'DOC'
/**
 * @throws InvalidArgumentException $40001 姓名不能为空
 */
DOC);
        $this->assertSame([], $doc->getThrows());
    }

    public function testFullDocBlockHappyPath(): void
    {
        $doc = DocBlock::create(<<<'DOC'
/**
 * 精确查询单个员工。
 *
 * 根据员工姓名精确查询，返回员工对象。
 * @throws InvalidArgumentException $40001 "姓名不能为空"
 * @throws RuntimeException $40401 "User not found"
 */
DOC);
        $this->assertSame('精确查询单个员工。', $doc->getSummary());
        $this->assertSame("根据员工姓名精确查询，返回员工对象。", $doc->getDescription());
        $this->assertCount(2, $doc->getThrows());
    }

    public function testIteratorStillWorks(): void
    {
        $doc = DocBlock::create(<<<'DOC'
/**
 * Summary line.
 *
 * Description line.
 * @throws Exception $500 "error"
 */
DOC);
        $lines = [];
        foreach ($doc as $line) {
            $lines[] = $line;
        }
        // Lines are normalized (no @tars-* here since no @var/@return/@param)
        $this->assertSame('Summary line.', $lines[0]);
        $this->assertSame('', $lines[1]); // blank line
        $this->assertSame('Description line.', $lines[2]);
        $this->assertSame('@throws Exception $500 "error"', $lines[3]);
    }
}
