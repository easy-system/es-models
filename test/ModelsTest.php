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

use Es\Models\Exception\ModelNotFoundException;
use Es\Models\Models;

class ModelsTest extends \PHPUnit_Framework_TestCase
{
    public function testMergeRegistry()
    {
        $targetConfig = [
            'foo' => 'foo',
            'bar' => 'foo',
        ];
        $target = new Models();
        $target->add($targetConfig);

        $sourceConfig = [
            'bar' => 'bar',
            'baz' => 'baz',
        ];
        $source = new Models();
        $source->add($sourceConfig);

        $return = $target->merge($source);
        $this->assertSame($return, $target);

        $expected = [
            'foo' => $targetConfig['foo'],
            'bar' => $sourceConfig['bar'],
            'baz' => $sourceConfig['baz'],
        ];
        $this->assertSame($expected, $target->getRegistry());
    }

    public function testMergeInstances()
    {
        $targetConfig = [
            'foo' => new \stdClass(),
            'bar' => new \stdClass(),
        ];
        $target = new Models();
        foreach ($targetConfig as $key => $item) {
            $target->set($key, $item);
        }

        $sourceConfig = [
            'bar' => new \stdClass(),
            'baz' => new \stdClass(),
        ];
        $source = new Models();
        foreach ($sourceConfig as $key => $item) {
            $source->set($key, $item);
        }

        $return = $target->merge($source);
        $this->assertSame($return, $target);

        $expected = [
            'foo' => $targetConfig['foo'],
            'bar' => $sourceConfig['bar'],
            'baz' => $sourceConfig['baz'],
        ];
        $this->assertSame($expected, $target->getInstances());
    }

    public function testExteptionClassWhenModelNotFound()
    {
        $plugins = new Models();
        $this->setExpectedException(ModelNotFoundException::CLASS);
        $plugins->get('foo');
    }
}
