<?php
/**
 * This file is part of the "Easy System" package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Damon Smith <damon.easy.system@gmail.com>
 */
namespace Es\Models;

use Es\Container\AbstractContainer;
use Es\Container\Countable\CountableTrait;
use Es\Container\Iterator\IteratorTrait;

/**
 * The common value object.
 */
class ValueObject extends AbstractContainer implements ValueObjectInterface
{
    use CountableTrait, IteratorTrait;

    /**
     * Constructor.
     *
     * @param array $data The data
     */
    public function __construct(array $data)
    {
        $this->container = $data;
    }

    /**
     * Returns new instance with the item value.
     *
     * @param int|string $key  The key of item
     * @param mixed      $item The item value
     *
     * @return self The new instance with the item value
     */
    public function withItem($key, $item)
    {
        $new = clone $this;

        $new->container[$key] = $item;

        return $new;
    }

    /**
     * Gets the item value.
     *
     * @param int|string $key     The key of item
     * @param mixed      $default Optional; null by default. The default value
     *
     * @return mixed Returns the item value, if any, $default otherwise
     */
    public function getItem($key, $default = null)
    {
        if (isset($this->container[$key])) {
            return $this->container[$key];
        }

        return $default;
    }

    /**
     * Has there a specific item?
     *
     * @param int|string $key The key of item
     *
     * @return bool Returns true on success, false otherwise
     */
    public function hasItem($key)
    {
        return isset($this->container[$key]);
    }

    /**
     * Returns a PHP array from the data container.
     *
     * @return array The array from container
     */
    public function toArray()
    {
        return $this->container;
    }
}
