<?php
/**
 * This file is part of the "Easy System" package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Damon Smith <damon.easy.system@gmail.com>
 */
namespace Es\Models\Test\Listener;

use Es\Models\Listener\ConfigureModelsListener;
use Es\Models\Models;
use Es\Modules\ModulesEvent;
use Es\System\SystemConfig;

class ConfigureModelsListenerTest extends \PHPUnit_Framework_TestCase
{
    public function testInvoke()
    {
        $config = new SystemConfig();
        $models = $this->getMock(Models::CLASS);

        $modelsConfig = [
            'foo' => 'bar',
            'bat' => 'baz',
        ];
        $config['models'] = $modelsConfig;

        $listener = new ConfigureModelsListener();
        $listener->setModels($models);
        $listener->setConfig($config);

        $models
            ->expects($this->once())
            ->method('add')
            ->with($this->identicalTo($modelsConfig));

        $listener(new ModulesEvent());
    }
}
