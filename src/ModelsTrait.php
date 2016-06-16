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

use Es\Mvc\ModelsInterface;
use Es\Services\Provider;

/**
 * The accessors of Models.
 */
trait ModelsTrait
{
    /**
     * Sets the models.
     *
     * @param \Es\Mvc\ModelsInterface $models The models
     */
    public function setModels(ModelsInterface $models)
    {
        Provider::getServices()->set('Models', $models);
    }

    /**
     * Gets the models.
     *
     * @return \Es\Mvc\ModelsInterface The models
     */
    public function getModels()
    {
        return Provider::getServices()->get('Models');
    }
}
