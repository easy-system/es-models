<?php
/**
 * This file is part of the "Easy System" package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Damon Smith <damon.easy.system@gmail.com>
 */
namespace Es\Models\Listener;

use Es\Models\ModelsTrait;
use Es\Modules\ModulesEvent;
use Es\System\ConfigTrait;

/**
 * Configures the models.
 */
class ConfigureModelsListener
{
    use ConfigTrait, ModelsTrait;

    /**
     * Configures the models.
     *
     * @param \Es\Modules\ModulesEvent $event The module event
     */
    public function __invoke(ModulesEvent $event)
    {
        $models       = $this->getModels();
        $systemConfig = $this->getConfig();
        if (isset($systemConfig['models'])) {
            $config = (array) $systemConfig['models'];
            $models->add($config);
        }
    }
}
