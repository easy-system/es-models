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

/**
 * The representation of model storage.
 */
interface StorageInterface
{
    /**
     * Stores the model.
     *
     * @param ModelInterface $model The model
     */
    public function storeModel(ModelInterface $model);

    /**
     * Retores the model.
     * 
     * @param ModelInterface $model The model
     */
    public function restoreModel(ModelInterface $model);
}
