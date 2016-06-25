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

use Es\Models\ModelInterface;
use Es\Models\StorageInterface;
use LogicException;

class FakeStorage implements StorageInterface
{
    public function storeModel(ModelInterface $model)
    {
        throw new LogicException(sprintf('The "%s" is stub.', __METHOD__));
    }

    public function restoreModel(ModelInterface $model)
    {
        throw new LogicException(sprintf('The "%s" is stub.', __METHOD__));
    }
}
