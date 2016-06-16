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

use Es\Models\Models;
use Es\Services\Services;
use Es\Services\ServicesTrait;

class ModelsTraitTest extends \PHPUnit_Framework_TestCase
{
    use ServicesTrait;

    public function setUp()
    {
        require_once 'ModelsTraitTemplate.php';
    }

    public function testSetModels()
    {
        $services = new Services();
        $this->setServices($services);

        $models   = new Models();
        $template = new ModelsTraitTemplate();
        $template->setModels($models);
        $this->assertSame($models, $services->get('Models'));
    }

    public function testGetModels()
    {
        $models   = new Models();
        $services = new Services();
        $services->set('Models', $models);

        $this->setServices($services);
        $template = new ModelsTraitTemplate();
        $this->assertSame($models, $template->getModels());
    }
}
