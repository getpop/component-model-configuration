<?php

declare(strict_types=1);

namespace PoP\ConfigurationComponentModel;

use PoP\Root\Component\AbstractComponent;
use PoP\Root\Component\YAMLServicesTrait;
use PoP\ConfigurationComponentModel\Config\ServiceConfiguration;

/**
 * Initialize component
 */
class Component extends AbstractComponent
{
    use YAMLServicesTrait;
    // const VERSION = '0.1.0';

    public static function getDependedComponentClasses(): array
    {
        return [
            \PoP\Engine\Component::class,
        ];
    }

    public static function getDependedMigrationPlugins(): array
    {
        return [
            'migrate-component-model-configuration',
        ];
    }

    /**
     * Initialize services
     */
    protected static function doInitialize(): void
    {
        parent::doInitialize();
        self::initYAMLServices(dirname(__DIR__));
        ServiceConfiguration::initialize();
    }
}
