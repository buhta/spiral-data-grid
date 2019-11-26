<?php

/**
 * Spiral Framework. PHP Data Grid
 *
 * @license MIT
 * @author  Anton Tsitou (Wolfy-J)
 * @author  Valentin Vintsukevich (vvval)
 */

declare(strict_types=1);

namespace Spiral\DataGrid\Specification\Value;

use Spiral\DataGrid\Exception\ValueException;
use Spiral\DataGrid\Specification\ValueInterface;

final class BootValue implements ValueInterface
{
    /**
     * @inheritDoc
     */
    public function accepts($value): bool
    {
        if (is_scalar($value)) {
            return in_array(strtolower($value), ['0', '1', 'true', 'false'], true);
        }

        return is_bool($value);
    }

    /**
     * @inheritDoc
     */
    public function convert($value)
    {
        if (is_scalar($value)) {
            switch (strtolower($value)) {
                case '0':
                case 'false':
                    return false;

                case '1':
                case 'true':
                    return true;
            }
        }

        if (is_bool($value)) {
            return $value;
        }

        throw new ValueException(sprintf(
            'Value is expected to be boolean, got `%s`. Check the value with `accepts()` method first.',
            is_object($value) ? get_class($value) : gettype($value)
        ));
    }
}
