<?php

/**
 * Spiral Framework. PHP Data Grid
 *
 * @author Valentin Vintsukevich (vvval)
 */

declare(strict_types=1);

namespace Spiral\Tests\DataGrid\Fixture;

use Spiral\DataGrid\Specification\SequenceInterface;
use Spiral\DataGrid\SpecificationInterface;

class NullPaginator implements SequenceInterface
{
    /**
     * {@inheritDoc}
     */
    public function getValue()
    {
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function withValue($value): ?SpecificationInterface
    {
        return null;
    }

    public function getSpecifications(): array
    {
        return [];
    }
}
