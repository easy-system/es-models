<?php
/**
 * This file is part of the "Easy System" package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Damon Smith <damon.easy.system@gmail.com>
 */
namespace Es\Models\Test;

use Es\Models\Component;

class ComponentTest extends \PHPUnit_Framework_TestCase
{
    protected $requiredServices = [
        'Models',
    ];

    public function testGetVersion()
    {
        $component = new Component();
        $version   = $component->getVersion();
        $this->assertInternalType('string', $version);
        $this->assertRegExp('#\d+.\d+.\d+#', $version);
    }

    public function testGetServicesConfig()
    {
        $component = new Component();
        $config    = $component->getServicesConfig();
        $this->assertInternalType('array', $config);
        foreach ($this->requiredServices as $item) {
            $this->assertArrayHasKey($item, $config);
        }
    }

    public function testGetListenersConfig()
    {
        $component = new Component();
        $config    = $component->getListenersConfig();
        $this->assertInternalType('array', $config);
    }

    public function testGetEventsConfig()
    {
        $component = new Component();
        $config    = $component->getEventsConfig();
        $this->assertInternalType('array', $config);
    }
}
