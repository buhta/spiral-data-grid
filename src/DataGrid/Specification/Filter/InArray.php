<?php

/**
 * Spiral Framework. PHP Data Grid
 *
 * @license MIT
 * @author  Anton Tsitou (Wolfy-J)
 * @author  Valentin Vintsukevich (vvval)
 */

declare(strict_types=1);

namespace Spiral\DataGrid\Specification\Filter;

use Spiral\DataGrid\Specification\Value\ArrayValue;
use Spiral\DataGrid\Specification\ValueInterface;

final class InArray extends Expression
{
    /**
     * @param string $expression
     * @param null   $value
     */
    public function __construct(string $expression, $value = null)
    {
        if ($value instanceof ValueInterface && !$value instanceof ArrayValue) {
            $value = new ArrayValue($value);
        }

        parent::__construct($expression, $value);
    }
}