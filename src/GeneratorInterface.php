<?php

/**
 * Spiral Framework. PHP Data Grid
 *
 * @license MIT
 * @author  Anton Tsitou (Wolfy-J)
 * @author  Valentin Vintsukevich (vvval)
 */

declare(strict_types=1);

namespace Spiral\DataGrid;

interface GeneratorInterface
{
    /**
     * Generate new grid view using given source and data schema.
     *
     * @param mixed      $source
     * @param GridSchema $schema
     * @return GridInterface
     */
    public function hydrate($source, GridSchema $schema): GridInterface;
}
