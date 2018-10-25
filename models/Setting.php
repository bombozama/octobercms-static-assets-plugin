<?php namespace Wiz\StaticDomain\Models;

use Model;

class Setting extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'wiz_staticdomain_settings';

    public $settingsFields = 'fields.yaml';

    public function afterFetch(){

        if($this->cookie_free_domain === null)
            $this->cookie_free_domain = false;
    }
}