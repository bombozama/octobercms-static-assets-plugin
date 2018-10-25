<?php namespace Wiz\StaticDomain;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name' => 'Static Domain',
            'description' => 'Handling assets in a static domain',
            'author' => 'Wiz Comunicaciones',
            'icon' => 'oc-icon-cogs',
            'iconSvg' =>  'plugins/wiz/website/assets/images/plugin-icon.svg',
            'homepage' => 'https://github.com/bombozama/octobercms-static-domain-plugin'
        ];
    }

    public function registerMarkupTags()
    {
        return [
            'filters' => [
                '_static' => ['Wiz\StaticDomain\Classes\StaticDomain', 'replaceDomain'],
            ]
        ];
    }

    public function registerSettings()
    {
        return [
            'wiz_staticdomain_settings' => [
                'label'       => 'Static Domain',
                'description' => 'Gestionar opciones del sistema.',
                'icon'        => 'icon-cogs',
                'class'       => 'Wiz\StaticDomain\Models\Setting',
                'order'       => 1500,
                'keywords'    => 'wiz system static domain configuration',
            ],
        ];
    }
}
