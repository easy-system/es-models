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

use Es\Container\Accessors\AccessorsInterface;
use Es\Container\Conversion\ConversionInterface;
use Es\Container\Parameters\ParametersInterface;

/**
 * The representation of common model.
 */
interface ModelInterface
    extends AccessorsInterface,
            ConversionInterface,
            ParametersInterface
{
    /**
     * Gets the storage.
     *
     * @return StorageInterface The storage
     */
    public function getStorage();

    /**
     * Sets the storage.
     *
     * @param StorageInterface $storage The storage
     *
     * @return self
     */
    public function setStorage(StorageInterface $storage);

    /**
     * Stores the model.
     *
     * @return self
     */
    public function store();

    /**
     * Restores the model.
     *
     * @return self
     */
    public function restore();
}
