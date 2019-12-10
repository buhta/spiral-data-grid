<?php

/**
 * Spiral Framework. PHP Data Grid
 *
 * @author Valentin Vintsukevich (vvval)
 */

declare(strict_types=1);

namespace Spiral\Tests\DataGrid;

use PHPUnit\Framework\TestCase;
use Spiral\DataGrid\Compiler;
use Spiral\DataGrid\Exception\CompilerException;
use Spiral\DataGrid\Specification\Filter\Equals;
use Spiral\DataGrid\WriterInterface;
use Spiral\Tests\DataGrid\Fixture;

class CompilerTest extends TestCase
{
    /**
     * @dataProvider sourceProvider
     * @param $source
     */
    public function testNoSpecifications($source): void
    {
        $compiler = new Compiler();
        $compiler->compile($source);

        $this->assertTrue(true);
    }

    /**
     * @dataProvider sourceProvider
     * @param $source
     */
    public function testNoWriter($source): void
    {
        $this->expectException(CompilerException::class);

        $compiler = new Compiler();
        $compiler->compile($source, new Equals('', ''));
    }

    /**
     * @dataProvider sourceProvider
     * @param $source
     */
    public function testHasWriter($source): void
    {
        $compiler = new Compiler();
        $compiler->addWriter(new Fixture\WriterOne());
        $compiler->compile($source, new Equals('', ''));

        $this->assertTrue(true);
    }

    /**
     * @return iterable
     */
    public function sourceProvider(): iterable
    {
        return [
            ['some source, but not null'],
            [new Fixture\Source()]
        ];
    }

    /**
     * @dataProvider writersProvider
     * @param $expected
     * @param WriterInterface ...$writers
     */
    public function testWriters($expected, WriterInterface ...$writers): void
    {
        $compiler = new Compiler();
        foreach ($writers as $writer) {
            $compiler->addWriter($writer);
        }
        $this->assertSame($expected, $compiler->compile('some source, but not null', new Equals('', '')));
    }

    /**
     * @return iterable
     */
    public function writersProvider(): iterable
    {
        return [
            [Fixture\WriterOne::OUTPUT, new Fixture\WriterOne()],
            [Fixture\WriterOne::OUTPUT, new Fixture\WriterTwo(), new Fixture\WriterOne()],
            [Fixture\WriterTwo::OUTPUT, new Fixture\WriterOne(), new Fixture\WriterTwo()],
        ];
    }
}