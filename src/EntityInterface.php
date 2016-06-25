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

use Es\Container\Conversion\ConversionInterface;
use Es\Container\Property\PropertyInterface;
use Iterator;

/**
 * The representation of common entity.
 */
interface EntityInterface
    extends ConversionInterface,
            Iterator,
            PropertyInterface
{
}
