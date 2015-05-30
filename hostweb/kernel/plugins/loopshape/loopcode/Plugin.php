<?php namespace Loopshape\Loopcode;

use System\Classes\PluginBase;

/**
 * Loopcode Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Loopcode',
            'description' => 'An Indexed-Archive Collector',
            'author'      => 'Arjuna Noorsanto',
            'icon'        => 'icon-leaf'
        ];
    }

}
