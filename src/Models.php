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
use Es\Services\ServiceLocator;

/**
 * The Collection of models. Provides models on demand.
 */
class Models extends ServiceLocator implements ModelsInterface
{
    /**
     * The class of exception, which should be raised if the requested model
     * is not found.
     */
    const NOT_FOUND_EXCEPTION = 'Es\Models\Exception\ModelNotFoundException';

    /**
     * The message of exception, that thrown when unable to find the requested
     * model.
     *
     * @var string
     */
    const NOT_FOUND_MESSAGE = 'Not found; the Model "%s" is unknown.';

    /**
     * The message of exception, that thrown when unable to build the requested
     * model.
     *
     * @var string
     */
    const BUILD_FAILURE_MESSAGE = 'Failed to create the Model "%s".';

    /**
     * The message of exception, that thrown when added of invalid
     * model specification.
     *
     * @var string
     */
    const INVALID_ARGUMENT_MESSAGE = 'Invalid specification of Model "%s"; expects string, "%s" given.';

    /**
     * Merges with other models.
     *
     * @param \Es\Mvc\ModelsInterface $source The data source
     *
     * @return self
     */
    public function merge(ModelsInterface $source)
    {
        $this->registry  = array_merge($this->registry, $source->getRegistry());
        $this->instances = array_merge($this->instances, $source->getInstances());

        return $this;
    }
}
