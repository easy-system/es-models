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

use Es\Models\ValueObject;
use Es\Models\ValueObjectInterface;
use ReflectionProperty;

class ValueObjectTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $data = [
            'foo' => 'bar',
            'bat' => 'baz',
        ];
        $object = new ValueObject($data);

        $reflection = new ReflectionProperty($object, 'container');
        $reflection->setAccessible(true);
        $container = $reflection->getValue($object);
        $this->assertSame($data, $container);
    }

    public function testGetItemReturnsValue()
    {
        $object = new ValueObject(['foo' => 'bar']);
        $this->assertSame('bar', $object->getItem('foo'));
    }

    public function testGetItemReturnsDefault()
    {
        $object = new ValueObject([]);
        $this->assertSame('bar', $object->getItem('foo', 'bar'));
    }

    public function testWithItem()
    {
        $object = new ValueObject(['foo' => 'bar']);

        $new = $object->withItem('foo', 'baz');
        $this->assertInstanceOf(ValueObjectInterface::CLASS, $new);
        $this->assertNotSame($new, $object);
        $this->assertSame('baz', $new->getItem('foo'));
    }

    public function testHasItemOnSuccess()
    {
        $object = new ValueObject(['foo' => 'bar']);
        $this->assertTrue($object->hasItem('foo'));
    }

    public function testHasItemOnFailure()
    {
        $object = new ValueObject([]);
        $this->assertFalse($object->hasItem('foo'));
    }

    public function testToArray()
    {
        $data = [
            'foo' => 'bar',
            'bat' => 'baz',
        ];
        $object = new ValueObject($data);
        $this->assertSame($data, $object->toArray());
    }
}
