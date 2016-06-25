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

use Es\Container\AbstractContainer;
use Es\Container\Conversion\ConversionTrait;
use Es\Container\Iterator\IteratorTrait;
use Es\Container\Property\PropertyTrait;

/**
 * The common entity.
 */
class Entity extends AbstractContainer implements EntityInterface
{
    use ConversionTrait,
        IteratorTrait,
        PropertyTrait;
}
