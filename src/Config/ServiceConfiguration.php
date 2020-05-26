<?php

declare(strict_types=1);

namespace PoP\ConfigurationComponentModel\Config;

use PoP\ComponentModel\Container\ContainerBuilderUtils;
use PoP\Root\Component\PHPServiceConfigurationTrait;

class ServiceConfiguration
{
    use PHPServiceConfigurationTrait;

    protected static function configure(): void
    {
        // Add RouteModuleProcessors to the Manager
        ContainerBuilderUtils::injectServicesIntoService(
            'route_module_processor_manager',
            'PoP\\ConfigurationComponentModel\\RouteModuleProcessors',
            'add'
        );
    }
}
