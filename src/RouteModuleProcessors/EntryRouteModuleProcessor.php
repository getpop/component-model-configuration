<?php
namespace PoP\ConfigurationComponentModel\RouteModuleProcessors;

use PoP\ModuleRouting\AbstractEntryRouteModuleProcessor;

class EntryRouteModuleProcessor extends AbstractEntryRouteModuleProcessor
{
    public function getModulesVarsProperties()
    {
        $ret = array();

        $ret[] = [
            'module' => [PoP_ConfigurationComponentModel_Module_Processor_Elements::class, PoP_ConfigurationComponentModel_Module_Processor_Elements::MODULE_EMPTY],
        ];

        return $ret;
    }
}
