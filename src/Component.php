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

use Es\Component\ComponentInterface;
use Es\Modules\ModulesEvent;

/**
 * The system component.
 */
class Component implements ComponentInterface
{
    /**
     * The configuration of services.
     *
     * @var array
     */
    protected $servicesConfig = [
        'Models' => 'Es\Models\Models',
    ];

    /**
     * The configuration of listeners.
     *
     * @var array
     */
    protected $listenersConfig = [
        'Es.Models.Listener.ConfigureModelsListener' => 'Es\Models\Listener\ConfigureModelsListener',
    ];

    /**
     * The configuration of events.
     *
     * @var array
     */
    protected $eventsConfig = [
        'ConfigureModelsListener::__invoke' => [
            ModulesEvent::APPLY_CONFIG,
            'Es.Models.Listener.ConfigureModelsListener',
            '__invoke',
            500,
        ],
    ];

    /**
     * The current version of component.
     *
     * @var string
     */
    protected $version = '0.1.0';

    /**
     * Gets the current version of component.
     *
     * @return string The version of component
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Gets the configuration of services.
     *
     * @return array The configuration of services
     */
    public function getServicesConfig()
    {
        return $this->servicesConfig;
    }

    /**
     * Gets the configuration of listeners.
     *
     * @return array The configuration of listeners
     */
    public function getListenersConfig()
    {
        return $this->listenersConfig;
    }

    /**
     * Gets the configuration of events.
     *
     * @return array The configuration of events
     */
    public function getEventsConfig()
    {
        return $this->eventsConfig;
    }
}
