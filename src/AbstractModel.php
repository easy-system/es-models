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
use Es\Container\Accessors\AccessorsTrait;
use Es\Container\Conversion\ConversionTrait;
use Es\Container\Parameters\ParametersTrait;

/**
 * The abstract model.
 */
abstract class AbstractModel extends AbstractContainer implements ModelInterface
{
    use AccessorsTrait,
        ConversionTrait,
        ParametersTrait;

    /**
     * The storage.
     *
     * @var StorageInterface
     */
    protected $storage;

    /**
     * Gets the storage.
     *
     * @return StorageInterface The storage
     */
    abstract public function getStorage();

    /**
     * Sets the storage.
     *
     * @param StorageInterface $storage The storage
     *
     * @return self
     */
    public function setStorage(StorageInterface $storage)
    {
        $this->storage = $storage;

        return $this;
    }

    /**
     * Stores the model.
     *
     * @return self
     */
    public function store()
    {
        $this->getStorage()->storeModel($this);

        return $this;
    }

    /**
     * Restores the model.
     *
     * @return self
     */
    public function restore()
    {
        $this->getStorage()->restoreModel($this);

        return $this;
    }
}
