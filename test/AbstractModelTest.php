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

use Es\Models\AbstractModel;
use ReflectionProperty;

class AbstractModelTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        require_once 'FakeStorage.php';
    }

    public function testSetStorage()
    {
        $model   = $this->getMock(AbstractModel::CLASS, ['getStorage']);
        $storage = $this->getMock(FakeStorage::CLASS);

        $return = $model->setStorage($storage);
        $this->assertSame($return, $model);

        $reflection = new ReflectionProperty($model, 'storage');
        $reflection->setAccessible(true);
        $this->assertSame($storage, $reflection->getValue($model));
    }

    public function testRestore()
    {
        $model   = $this->getMock(AbstractModel::CLASS, ['getStorage']);
        $storage = $this->getMock(FakeStorage::CLASS, ['restoreModel']);

        $model
            ->expects($this->once())
            ->method('getStorage')
            ->will($this->returnValue($storage));

        $storage
            ->expects($this->once())
            ->method('restoreModel')
            ->with($this->identicalTo($model));

        $return = $model->restore();
        $this->assertSame($return, $model);
    }

    public function testStore()
    {
        $model   = $this->getMock(AbstractModel::CLASS, ['getStorage']);
        $storage = $this->getMock(FakeStorage::CLASS, ['storeModel']);

        $model
            ->expects($this->once())
            ->method('getStorage')
            ->will($this->returnValue($storage));

        $storage
            ->expects($this->once())
            ->method('storeModel')
            ->with($this->identicalTo($model));

        $return = $model->store();
        $this->assertSame($return, $model);
    }
}
