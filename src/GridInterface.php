<?php

/**
 * Spiral Framework.
 *
 * @license   MIT
 * @author    Anton Titov (Wolfy-J)
 */

declare(strict_types=1);

namespace Spiral\DataGrid;

/**
 * Responsible for grid data and specification representation.
 */
interface GridInterface extends \IteratorAggregate
{
    public const FILTERS   = 'filters';
    public const SORTERS   = 'sorters';
    public const PAGINATOR = 'paginator';
    public const COUNT     = 'count';

    /**
     * Associate public value with the grid.
     *
     * @param string $name
     * @param mixed  $value
     * @return GridInterface
     */
    public function withOption(string $name, $value): GridInterface;

    /**
     * Returns associated value.
     *
     * @param string $name
     * @return mixed
     */
    public function getOption(string $name);

    /**
     * Associated input source with the grid view. The source will be iterated using the given mapper.
     *
     * @param iterable $source
     * @return GridInterface
     */
    public function withSource(iterable $source): GridInterface;

    /**
     * Associate mapping class or function with the grid view.
     * All grid source items will be passed thought this function.
     *
     * @param callable $view
     * @return GridInterface
     */
    public function withView(callable $view): GridInterface;
}
